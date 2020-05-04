@extends('layouts.base_admin')


@section('title')
    <title>Admin | Order Edit</title>
@endsection


@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="alert alert-primary" role="alert">
                @if (@isset($order_user))
                <strong>Editing ORDER000{{$order->id}}</strong>
                @else
                <strong>Creating Order</strong>
                @endif
                
            </div>
            {!! Form::open(['action' => $action]) !!}
            <div class="form-group row">
                @method('PUT')
                {!! Form::token() !!}
            </div>
                <div class="form-group row">
                {!! Form::label('discount', "Discount", ['class' => 'col-sm-2 col-form-label']) !!}
                <div class="col-sm-10">
                    {!! Form::number('discount', $order->discount, ['class' => 'form-control', 'step' => 'any']) !!}
                </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('tax', "Tax", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('tax', $order->tax, ['class' => 'form-control', 'readonly' => 'true']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('pickup', "pickup", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::checkbox('pickup', $order->pickup, $order->pickup, ['class' => '',]) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('delivery', "delivery", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::checkbox('delivery', $order->delivery, $order->delivery, ['class' => '',]) !!}
                    </div>
                </div>
                
                <div class="form-group row">
                    {!! Form::label('address', "address", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('address', $order->address, ['class' => 'form-control', 'step' => 'any']) !!}
                    </div>
                </div>
                
                <div class="form-group row">
                    {!! Form::label('fulfilled', "fulfilled", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::checkbox('fulfilled', $order->fulfilled, $order->fulfilled, ['class' => '',]) !!}
                    </div>
                </div>
                
                
                <div class="form-group row">
                    {!! Form::label('final_price', "final_price", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('final_price', $order->final_price, ['class' => 'form-control', 'readonly' => 'true']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('user', "User", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::select('user', $users_list, $order_user, ['placeholder' => 'Select a user', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <button type="Submit" class="btn btn-primary">Submit</button>
                </div>
            
            {!! Form::close() !!}
        </div>
        <div class="col-12"></div>
        <div class="col-12">
            @if (@isset($order_user))
            {{-- editiing an order item --}}
            <div class="alert alert-primary" role="alert">
                @if (@isset($order_user))
                <strong>Editing order items for ORDER000{{$order->id}}</strong>
                @else
                <strong>Creating item orders</strong>
                @endif
                
            </div>

            <div class="container-fluid">
                <div class="row">
                    @foreach ($order->order_items as $item)
                    <div class="col-4">
                        {!! Form::open(['action' => ['AdminOrderItemController@update', $item->id]]) !!}
                        <div class="form-group row">
                            @method('PUT')
                            {!! Form::token() !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('product', "product", ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('product', $product_list, $item->product, ['placeholder' => 'Select a user', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('price', "price", ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::number('price', $item->price, ['class' => 'form-control', 'readonly' => 'true']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('quantity', "quantity", ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::number('quantity', $item->quantity, ['class' => 'form-control', 'step' => '1']) !!}
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <button type="Submit" class="btn btn-primary">Update</button>
                        </div>
                        
                        {!! Form::close() !!}
                    </div>
                    @endforeach
                    <div class="col-4">
                        {!! Form::open(['action' => ['AdminOrderItemController@store']]) !!}
                        <div class="form-group row">
                            @method('POST')
                            {!! Form::token() !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('product', "product", ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('product', $product_list, null, ['placeholder' => 'Select a product', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            {!! Form::label('price', "price", ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::number('price', $item->price, ['class' => 'form-control', 'readonly' => 'true']) !!}
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            {!! Form::label('quantity', "quantity", ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::number('quantity', $item->quantity, ['class' => 'form-control', 'step' => '1']) !!}
                            </div>
                        </div>

                        <div class="form-group row hidden">
                            {!! Form::label('order', "order", ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::number('order', $order->id, ['class' => 'form-control', 'step' => '1']) !!}
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <button type="Submit" class="btn btn-primary">Add product</button>
                        </div>
                        
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            @endif
        </div>
    </div>
</div>

@endsection