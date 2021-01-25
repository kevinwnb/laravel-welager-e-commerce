<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use App\Models\Image;

class CartController extends Controller
{
    function index()
    {
        return view('cart');
    }

    function delete()
    {
        Session::forget('cart');
    }

    function bindCartToAccount()
    {
        $cart = Session::get('cart');
        $cart->user_id = Auth::id();
        $cart->save();
    }

    function create()
    {
        $cart = new Cart();
        $cart->user_id = Auth::check() ? Auth::id() : null;
        //$cart->session_id = Auth::check() ? null : Session::getId();
        $cart->save();
        Session::put('cart', $cart);
        return $cart;
    }

    function add(Request $request)
    {
        if (Auth::check()) {
            $body = json_decode($request->getContent());
            $cart = Cart::where('user_id', Auth::id())->first();
            $cart_item = new CartItem();
            $cart_item->cart_id = $cart->id;
            $cart_item->product_id = $body->product_id;
            $cart_item->quantity = $body->quantity;
            $cart_item->save();

            $product = Product::select('name')->where('id', $body->product_id)->get();
            return response()->json([
                'product_name' => $product[0]->name,
                'quantity' => intval($body->quantity),
            ]);
        } else {
            $body = json_decode($request->getContent());
            $cart_item = new CartItem();
            $cart_item->cart_id = null;
            $cart_item->product_id = $body->product_id;
            $cart_item->quantity = $body->quantity;
            if (Session::has('cart_items')) {
                $cart_items = Session::get('cart_items');
                $equal_product_id = false;
                foreach ($cart_items as $item) {
                    if ($item->product_id == $body->product_id) {
                        $item->quantity += $body->quantity;
                        $equal_product_id = true;
                    }
                }
                if ($equal_product_id === false) {
                    $cart_items[] = $cart_item;
                }
                Session::put('cart_items', $cart_items);
            } else {
                Session::put('cart_items', [$cart_item]);
            }

            $product = Product::select('name')->where('id', $body->product_id)->get();

            return response()->json([
                'product_name' => $product[0]->name,
                'quantity' => intval($body->quantity),
            ]);
        }
    }

    function getCartItems()
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->get();
            $cart_items = CartItem::select(['cart_items.id', 'cart_items.quantity', 'products.name', 'products.price'])->join('products', 'cart_items.product_id', '=', 'products.id')->where('cart_id', $cart[0]->id)->get();
            foreach ($cart_items as $item) {
                $item->image = Image::where('product_id', $item->product_id)->first();
            }
            return Response::json($cart_items, 200);
        } else {
            if (Session::has('cart_items')) {
                // if (count(Session::get('cart_items')) == 0) {
                //     return Response::json(['quantity' => 0], 200);
                // }
                $cart_items = Session::get('cart_items');
                foreach ($cart_items as $item) {
                    $item->name = Product::select('name')->where('id', $item->product_id)->get()[0]->name;
                    $item->price = Product::select('price')->where('id', $item->product_id)->get()[0]->price;
                    $item->image = Image::where('product_id', $item->product_id)->first();
                }
                return Response::json($cart_items, 200);
            }

            return Response::json(['message' => 'No items in your cart', 'quantity' => 0], 200);
        }
    }

    function updateCartItemQuantity(Request $request)
    {
        if (Auth::check()) {
            $body = json_decode($request->getContent());
            $cart_item = CartItem::find($body->id);
            $cart_item->quantity = $body->quantity;
            $cart_item->save();
            return Response::json(['message' => 'Update successful'], 200);
        } else {
            if (Session::has('cart_items')) {
                $body = json_decode($request->getContent());
                $cart_items = Session::get('cart_items');
                foreach ($cart_items as $item) {
                    if ($item->product_id == $body->product_id) {
                        $item->quantity = $body->quantity;
                    }
                }
                Session::put('cart_items', $cart_items);
                return Response::json(['message' => 'Update successful'], 200);
            }
        }
    }

    function deleteItemFromCart(Request $request)
    {
        if (Auth::check()) {
            $body = json_decode($request->getContent());
            $cart_item = CartItem::find($body->id);
            $cart_item->delete();
            return Response::json(['message' => 'Deletion successful'], 200);
        } else {
            if (Session::has('cart_items')) {
                $body = json_decode($request->getContent());
                $cart_items = Session::get('cart_items');
                foreach ($cart_items as $item) {
                    if ($item->product_id == $body->product_id) {
                        unset($cart_items[array_search($item, $cart_items)]);
                    }
                }
                Session::put('cart_items', $cart_items);
                if(count(Session::get('cart_items')) == 0){
                    Session::forget('cart_items');
                }
                return Response::json(['message' => 'Deletion successful'], 200);
            }
        }
    }
}
