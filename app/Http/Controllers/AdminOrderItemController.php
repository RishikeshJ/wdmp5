<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\User;

class AdminOrderItemController extends Controller
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
        // $userList = [];
        // $users = User::all();
        // foreach ($users as $user) {
        //     $userList[$user->id] = $user->email;
        // }

        // return view('admin_create_order',[
        //     'users' => User::all(),
        //     'users_list' => $userList,
        // ]);
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
            // 'price' => 'required',
            'quantity' => 'required|regex:/^[0-9]+$/|digits_between:0,10',
            'product' => 'required|numeric',
        ]);
        $item = new OrderItem();
        
        $item->quantity = $request->input("quantity");
        $item->product = $request->input("product");
        $item->order = $request->input("order");
        
        $item->price = Product::find($item->product)->price;

        $item->save();
        $item->get_order->updatePrice();

        return redirect('/admin/orders/'.$item->order.'/edit');
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
    public function update(Request $request, OrderItem $item)
    {
        $validatedData = $request->validate([
            // 'price' => 'required',
            'quantity' => 'required|regex:/^[0-9]+$/|digits_between:0,10',
            'product' => 'required|numeric',
        ]);

        
        $item->quantity = $request->input("quantity");
        $item->product = $request->input("product");
        
        $item->price = Product::find($item->product)->price;

        $item->save();
        $item->get_order->updatePrice();

        return redirect('/admin/orders/'.$item->get_order->id.'/edit');
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
