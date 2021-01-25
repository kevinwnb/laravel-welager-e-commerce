<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderPagesController extends Controller
{
    function buynow($product_id, $quantity)
    {
        $product = Product::find($product_id);
        $product['image_path'] = Image::where('product_id', $product_id)->value('path');
        $product['quantity'] = $quantity;
        return view('buynow')->with('product', $product->toJson());
    }
}
