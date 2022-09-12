@extends('master')

@section('content')
    <h1>Page de connexion</h1>
    <hr/>
    @include('partials.flash_notification')
    {!! Form::open(['url' => '/login', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <!-- Email Field -->
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'Adresse mail', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                <span class="help-block text-danger">
                        {{ $errors -> first('email') }}
                    </span>
            </div>
        </div>

        <!-- Password Field -->
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password', 'Mot de passe', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::password('password', ['class' => 'form-control']) !!}
                <span class="help-block text-danger">
                        {{ $errors -> first('password') }}
                    </span>
            </div>
        </div>

        <!-- remember_me Field -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::label('remember', 'Se souvenir de moi', [] ) !!}
                {!! Form::checkbox('remember', 1, null, ['class' => 'pull-left remember']) !!}
            </div>
        </div>

        <!-- Log In! Field -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                {!! Form::submit('Connexion', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection
