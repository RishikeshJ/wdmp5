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
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Purchase History</th>
                        <th>Active Since</th>
                        <th>Last Purchase on</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                                <td>C00{{ $user->id }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td class="flex-nowrap">
                            @foreach ($user->orders as $order)
                                000{{ $order->id }} <br>
                            @endforeach
                        </td>
                        <td>{{ $user->joined }}</td>
                        <td>{{ $user->last_ordered_on() }}</td>
                        <td>
                            <form action="/admin/users/{{$user->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-block btn-danger">Delete</button>
                            </form>

                            <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Modify</a>
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