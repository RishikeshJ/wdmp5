@extends('layouts.base_admin')

@section('title')
    <title>Admin | Users</title>
@endsection

@section('main')
<div class="container">
    <div class="row">
        
        <div class="col justify-content-center">
            @isset($message)
                <span>{{$message}}</span>
            @endisset
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Available</th>
                        <th>Visible</th>
                        <th>Vegan Product</th>
                        <th>Label</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                                <td>P00{{ $product->id }}</td>
                                <td class="nowrap">P00{{ $product->name }}</td>
                                <td>
                                    {{$product->get_category->name}}
                                </td>
                                <td>
                                    {{$product->price_label}}{{$product->price}}
                                </td>
                                <td>
                                    <img src="{{$product->image_url}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="image">
                                </td>
                                <td>
                                <span>{{$product->description}}</span>
                                </td>
                                <td>
                                    @if ($product->available)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>
                                    @if ($product->displayed)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>
                                    @if ($product->vegan)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>
                                    {{$product->label}}
                                </td>
                        
                        <td>
                            <form action="/admin/products/{{$product->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-block btn-danger">Delete</button>
                            </form>

                            <a href="/admin/products/{{ $product->id }}/edit" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Modify</a>
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