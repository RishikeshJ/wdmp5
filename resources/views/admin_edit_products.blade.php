@extends('layouts.base_admin')


@section('title')
    <title>Admin | Products Edit</title>
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
            {!! Form::open(['action' => ['AdminProductController@update', $product->id],
            ]) !!}
            <div class="form-group row">
                @method('PUT')
                {!! Form::token() !!}
            </div>

                <div class="form-group row">
                    {!! Form::label('name', "Name", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('image_url', "Image", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('image_url', $product->image_url, ['class' => 'form-control']) !!}
                        <img src="{{$product->image_url}}" class="img-fluid" alt="" height="20">
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('description', "Desc", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('description', $product->description, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('long_description', "Long Desc", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('long_description', $product->long_description, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('price_label', "Price Label", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('price_label', $product->price_label, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('available', "available", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::checkbox('available', $product->available, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('displayed', "displayed", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::checkbox('displayed', $product->displayed, ['class' => 'form-control']) !!}
                    </div>
                </div>
                

                <div class="form-group row">
                    {!! Form::label('vegan', "vegan", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::checkbox('vegan', $product->vegan, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('price', "price", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('price', $product->price, ['class' => 'form-control', 'step' => 'any']) !!}
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