@extends('layouts.base')

@section('main')
<div class="container" style="background: #08080842">
    <div class="row justify-content-center">
        <div class="col-12 justify-content-center" style="padding:100px 0 50px 0">
            <h5 class="text-center">Di Hola</h5>
            <h3 class="text-center">Contacto</h3>
        </div>
        <div class="col-12">
            <div class="mx-auto">
                <div class="row">
                    <img class="mx-auto" src="images/Burguer.png" alt="" style="height: 30px;">
                </div>
                <br><br>
                <h2 class="text-center"> Di Hola </h2>
                <h5 class="text-center">Do hita, envianos un mensaje</h5>
    
            </div>
        </div>
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

            <h5 class="text-center" style="padding: 30px 0 30px 0">
                @isset($message)
                    {{$message}}
                @endisset
            </h5>

            {!! Form::open(['action' => ['CustomerQueryController@store']]) !!}
                <div class="form-group row">
                    {!! Form::label('name', "Name", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Name']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('email', "Email", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Email', 'pattern'=>"[^@]+@[^@]+\.[a-zA-Z]{2,6}" ,'type'=>'tel' ]) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('phone', "Phone", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('phone', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Phone', 'pattern'=>"[0-9]{3}-[0-9]{3}-[0-9]{4}" ,'type'=>'tel' ]) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('address', "Address", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Name']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('text', "Text", ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('text', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Feedback / Query']) !!}
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <button type="Submit" class="btn btn-sm" style="background:red; color: white">Submit Feedback / Query</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
    
@endsection