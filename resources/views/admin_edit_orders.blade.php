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

            <span>Editing ORDER000{{$order->id}}</span>
            {!! Form::open(['action' => ['AdminOrderController@update', $order->id],
            ]) !!}
            <div class="form-group row">
                @method('PUT')
                {!! Form::token() !!}
            </div>

                <div class="form-group row">
                    {!! Form::label('price', "price", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('price', $order->price, ['class' => 'form-control', 'step' => 'any']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('final_price', "final_price", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('final_price', $order->final_price, ['class' => 'form-control', 'step' => 'any']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('discount', "discount", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('discount', $order->discount, ['class' => 'form-control', 'step' => 'any']) !!}
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
                    <button type="Submit" class="btn btn-primary">Submit</button>
                </div>
            
            {!! Form::close() !!}
        </div>
    </div>
</div>
    
@endsection