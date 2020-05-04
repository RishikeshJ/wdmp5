@extends('layouts.base_admin')

@section('title')
    <title>Admin | View Orders</title>
@endsection

@section('main')
<div class="container-fluid" style="zoom:0.7">
    <div class="row">
        <div class="col justify-content-center">
            @isset($message)
                <span>{{$message}}</span>
            @endisset
            <div style="padding-top:10px"></div>
            <a name="" id="" class="btn btn-primary" href="/admin/orders/create" role="button">Create New Order</a>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>OrderID</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Tax</th>
                        <th>Final Price (Entered)</th>
                        <th>Final Price (Calculated) </th>
                        <th>address</th>
                        <th>pickup</th>
                        <th>delivery</th>
                        <th>Actions</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>ORDER00{{ $order->id }}</td>
                            <td>
                                {{$order->get_user->name}}
                            </td>
                            <td>
                                {{$order->get_user->email}}
                            </td>
                            <td>
                                {{$order->get_user->phone}}
                            </td>
                            <td>
                                @foreach ($order->order_items as $order_item)
                                    {{$order_item->get_product->name}} <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($order->order_items as $order_item)
                                {{$order_item->get_product->price_label}}{{$order_item->get_product->price}} <br>
                                @endforeach
                            </td>
                            <td>
                                {{$order_item->get_product->price_label}}{{$order->discount}}
                            </td>
                            <td>
                                {{$order_item->get_product->price_label}}{{$order->tax}}
                            </td>
                            <td>
                                {{$order_item->get_product->price_label}}{{$order->final_price}}
                            </td>
                            <td>
                                {{$order_item->get_product->price_label}}{{$order->get_active_final_price()}}
                            </td>
                            <td>
                                {{$order->address}}
                            </td>
                            <td>
                                @if ($order->pickup)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            <td>
                                @if ($order->delivery)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                        
                        <td>
                            <form action="/admin/orders/{{$order->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-block btn-danger">Delete</button>
                            </form>

                            <a href="/admin/orders/{{ $order->id }}/edit" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Modify</a>
                            {{-- <button type="button" class="btn btn-sm btn-block btn-primary">Modify</button> --}}
                        </td>
                    </tr>
                    @endforeach
                        
                    </tbody>
            </table>
        </div>
    </div>
        
    
</div>
@endsection