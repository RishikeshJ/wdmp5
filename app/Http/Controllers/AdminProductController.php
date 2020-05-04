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
        return view('admin_edit_orders', [
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
            'price' => 'required',
            'final_price' => 'required',
            'discount' => 'required',
            'tax' => 'required',
            'address' => 'required',
        ]);

        $product->price = $request->input("price");
        $product->final_price = $request->input("final_price");
        $product->discount = $request->input("discount");
        $product->tax = $request->input("tax");
        $product->pickup = $request->input("pickup");
        $product->delivery = $request->input("delivery");
        $product->address = $request->input("address");
        $product->fulfilled = $request->input("fulfilled");
        
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
