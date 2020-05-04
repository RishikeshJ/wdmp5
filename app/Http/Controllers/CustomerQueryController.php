<?php

namespace App\Http\Controllers;

use App\CustomerQuery;
use Illuminate\Http\Request;

class CustomerQueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $item = new CustomerQuery();
        return view('customer_query', [
            'new_item' => $item,
        ]);
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
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:10,12',
            'address' => 'required',
            'text' => 'required|min:10',
        ]);

        $item = new CustomerQuery();
        $item->name = $request->input('name');
        $item->email = $request->input('email');
        $item->phone = $request->input('phone');
        $item->address = $request->input('address');
        $item->text = $request->input('text');

        $item->save();


        return view('customer_query', [
            'message' => 'Thank you for reaching out. We will contact you soon.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerQuery  $customerQuery
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerQuery $customerQuery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerQuery  $customerQuery
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerQuery $customerQuery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerQuery  $customerQuery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerQuery $customerQuery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerQuery  $customerQuery
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerQuery $customerQuery)
    {
        //
    }
}
