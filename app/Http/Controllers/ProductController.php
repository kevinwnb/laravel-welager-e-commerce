<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Http\Resources\Product as ProductResource;
use App\Models\ProductDetail;
use App\Models\ProductProperty;
use App\Models\ProductSummary;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function autocomplete($search_string, $category_id)
    {
        $results = Product::where('name', 'like', $search_string . '%')->get();
        return Response::json($results, 200);
    }

    /**
     * Return resources that match search criteria.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($search_string, $category_id)
    {
        $products = NULL;
        if (intval($category_id) == NULL) {
            $products['items'] = Product::select(['products.*'])
                ->distinct()
                ->join('images', 'products.id', '=', 'images.product_id')
                ->where('keywords', 'like', '%' . $search_string . '%')
                ->orWhere('name', 'like', '%' . $search_string . '%')
                ->get();
            $ids = [];
            foreach ($products['items'] as $p) {
                $ids[] = $p->id;
            }
            $products['images'] = Image::whereIn('product_id', $ids)->get();
        } else {
            $products['items'] = Product::select(['products.*'])
                ->distinct()
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('images', 'products.id', '=', 'images.product_id')
                ->where(function ($query) use ($category_id) {
                    $query->where('categories.id', $category_id)
                        ->orWhere('categories.parent_id', $category_id);
                })
                ->where(function ($query) use ($search_string) {
                    $query->where('keywords', 'like', '%' . $search_string . '%')
                        ->orWhere('products.name', 'like', '%' . $search_string . '%');
                })
                ->get();
            $ids = [];
            foreach ($products['items'] as $p) {
                $ids[] = $p->id;
            }
            $products['images'] = Image::whereIn('product_id', $ids)->get();
        }

        return view('search')->with(['products' => json_encode($products), 'search_string' => $search_string, 'category_id' => $category_id]);
    }

    /**
     * Return resources that match search criteria.
     *
     * @return \Illuminate\Http\Response
     */
    public function browse($category_id)
    {
        $products['items'] = Product::select(['products.*'])
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where(function ($query) use ($category_id) {
                $query->where('categories.id', $category_id)
                    ->orWhere('categories.parent_id', $category_id);
            })
            ->get();
        $ids = [];
        foreach ($products['items'] as $p) {
            $ids[] = $p->id;
        }
        $products['images'] = Image::whereIn('product_id', $ids)->get();

        return view('browse')->with(['products' => json_encode($products), 'category_id' => $category_id]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return new ProductResource($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = intval($id);
        $product = Product::where('id', '=', $id)->get();
        $images = Image::where('product_id', '=', $id)->get();
        $product['images'] = $images;
        //ProductDetail::on("mongodb")->create(['id' => 2, 'brand' => 'bla']);
        $product_details = ProductDetail::where('product_id', $id)->get();
        $product_summary = ProductSummary::where('product_id', $id)->get();
        $product_properties = ProductProperty::where('product_id', $id)->get();
        $product['details'] = $product_details;
        $product['summary'] = $product_summary;
        $product['properties'] = $product_properties;
        $product['reviews'] = Review::where('product_id', $id)->get();
        return view('product')->with(['product' => json_encode($product), 'ship_to' => Auth::check() ? json_encode(User::where('id', Auth::id())->first()) : json_encode(['results' => 0])]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
