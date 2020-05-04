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
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                                <td>P00{{ $product->id }}</td>
                                <td>P00{{ $product->id }}</td>
                                
                        
                        <td>
                            <form action="/admin/users/{{$product->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-block btn-danger">Delete</button>
                            </form>

                            <a href="/admin/users/{{ $product->id }}/edit" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Modify</a>
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