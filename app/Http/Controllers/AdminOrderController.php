<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Order;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();

        return view('admin_view_orders', [
            'products' => $products,
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  redirect()->action('AdminOrderController@index');
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
    public function show(Order $order)
    {
        return view('admin_manage_user', [
            'order' => $order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin_edit_orders', [
            'order' => $order,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'price' => 'required',
            'final_price' => 'required',
            'discount' => 'required',
            'tax' => 'required',
            'address' => 'required',
        ]);

        $order->price = $request->input("price");
        $order->final_price = $request->input("final_price");
        $order->discount = $request->input("discount");
        $order->tax = $request->input("tax");
        $order->pickup = $request->input("pickup");
        $order->delivery = $request->input("delivery");
        $order->address = $request->input("address");
        $order->fulfilled = $request->input("fulfilled");
        
        $order->save();

        return  redirect()->action('AdminOrderController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $message = "Failed to delete user";
        if($order){
            $order->forceDelete();
            $message = "Order was deleted";
        }

        return view('admin_view_orders', [
            'products' => Product::all(),
            'orders' => Order::all(),
            'message' => $message,
        ]);
    }
}
