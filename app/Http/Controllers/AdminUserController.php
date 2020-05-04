<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\User;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $users = User::all();

        return view('admin_view_users', [
            'products' => $products,
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  redirect()->action('AdminUserController@index');
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
    public function show(User $user)
    {
        return view('admin_manage_user', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin_edit_users', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'age' => 'required|min:0|max:100',
            'phone' => 'required|digits_between:10,12',
            'address' => 'required',
            'state' => 'required',
            'role_id' => 'required|digits_between:0,3',
        ]);

        $user->name = $request->input("name");
        $user->age = $request->input("age");
        $user->phone = $request->input("phone");
        $user->address = $request->input("address");
        $user->state = $request->input("state");
        $user->role_id = $request->input("role_id");
        $user->save();

        return  redirect()->action('AdminUserController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $message = "Failed to delete user";
        if($user){
            $user->forceDelete();
            $message = "User was deleted";
        }

        return view('admin_view_users', [
            'products' => Product::all(),
            'users' => User::all(),
            'message' => $message,
        ]);
    }
}
