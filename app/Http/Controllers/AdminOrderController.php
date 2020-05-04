<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Order;
use App\User;
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
        $userList = [];
        $users = User::all();
        foreach ($users as $user) {
            $userList[$user->id] = $user->email;
        }
        
        $order = new Order();
        return view('admin_edit_orders',[
            'order' => $order,
            'users_list' => $userList,
            'action' => ['AdminOrderController@store'],
            'order_user' => NULL,
            'products' => Product::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'price' => 'required',
            'final_price' => 'required',
            'discount' => 'required',
            'address' => 'required',
        ]);

        $order = new Order();

        $order->price = $request->input("price");
        $order->final_price = $request->input("final_price");
        $order->discount = $request->input("discount");
        if($request->has("pickup")){
            $order->pickup = true;
        } else {
            $order->pickup = false;
        }
        if($request->has("delivery")){
            $order->delivery = true;
        } else {
            $order->delivery = false;
        }

        $order->user = $request->input("user");
        $order->address = $request->input("address");
        $order->fulfilled = $request->input("fulfilled");
        
        $order->save();

        return  redirect()->action('AdminOrderController@edit', ['id' => $order->id]);
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
        $userList = [];
        $users = User::all();
        foreach ($users as $user) {
            $userList[$user->id] = $user->email;
        }

        $productList = [];
        $list = Product::all();
        foreach ($list as $item) {
            $productList[$item->id] = $item->name.' - $'.$item->price;
        }

        return view('admin_edit_orders', [
            'order' => $order,
            'users_list' => $userList,
            'action' => ['AdminOrderController@update', $order->id],
            'order_user' => $order->get_user->id,
            'product_list' => $productList,
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
            'user' => 'required',
            // 'final_price' => 'required',
            'discount' => 'required',
            'address' => 'required',
        ]);

        $order->price = $request->input("price");
        $order->final_price = $request->input("final_price");
        $order->discount = $request->input("discount");
        if($request->has("pickup")){
            $order->pickup = true;
        } else {
            $order->pickup = false;
        }
        if($request->has("delivery")){
            $order->delivery = true;
        } else {
            $order->delivery = false;
        }
        $order->address = $request->input("address");
        $order->user = $request->input("user");
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
