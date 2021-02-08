<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    function buynow($product_id, $quantity)
    {
        $product = Product::find($product_id);
        $product['image_path'] = Image::where('product_id', $product_id)->value('path');
        $product['quantity'] = $quantity;
        return view('buynow')->with('product', $product->toJson());
    }

    function checkout()
    {
        if (Auth::check())
            return view('checkout');

        return view('login');
    }
}
