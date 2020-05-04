<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Order;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin_view_products', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  redirect()->action('AdminProductController@index');
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin_edit_products', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image_url' => 'required',
            'description' => 'required',
            'long_description' => 'required',
            'price' => 'required',
            'price_label' => 'required',
        ]);

        $product->name = $request->input("name");
        $product->image_url = $request->input("image_url");
        $product->description = $request->input("description");
        $product->long_description = $request->input("long_description");
        $product->price = $request->input("price");
        $product->price_label = $request->input("price_label");

        $product->save();

        return  redirect()->action('AdminProductController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $message = "Failed to delete product";
        if($product){
            $product->forceDelete();
            $message = "Product was deleted";
        }

        return view('admin_view_Products', [
            'products' => Product::all(),
            'message' => $message,
        ]);
    }
}
