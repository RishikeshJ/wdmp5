@extends('layouts.base_admin')


@section('title')
    <title>Admin | Edit Users</title>
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
            {!! Form::open(['action' => ['AdminUserController@update', $user->id],
            ]) !!}
            <div class="form-group row">
                @method('PUT')
                {!! Form::token() !!}
            </div>

                <div class="form-group row">
                    {!! Form::label('name', "Name", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('email', "Email", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('email', $user->email, ['class' => 'form-control-plaintext', 'readonly' => '']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('age', "age", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('age', $user->age, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('phone', "phone", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('phone', $user->phone, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('notes', "notes", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('notes', $user->notes, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('address', "address", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('state', "state", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('state', $user->state, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('role_id', "role_id", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::select('role_id', ["0" => 'Admin' , '1' => 'Manager', '2' => 'User', '3' => 'Staff'], 
                            $user->role_id, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('is_admin', "is_admin", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::checkbox('is_admin', $user->is_admin, ['class' => 'form-control']) !!}
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