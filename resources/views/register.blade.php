@extends('master')

@section('content')
    <h1>Créez votre compte !</h1>
    <hr/>

    {!! Form::open(['url' => '/user', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nom', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                <span class="help-block text-danger">
                    @if ($errors -> first('name') =="The name field is required.")
                        Ce champs ne peut pas être vide
                    @else 
                        {{ $errors -> first('name') }}
                    @endif
                </span>
            </div>
        </div>


        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'Adresse mail', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                <span class="help-block text-danger">
                    @if($errors -> first('email') =="The email must be a valid email address.")
                        L'adresse mail n'est pas valide
                    @elseif ($errors -> first('email') =="The email field is required.")
                        Ce champs ne peut pas être vide
                    @else 
                        {{ $errors -> first('email') }}
                    @endif
                </span>
            </div>
        </div>

        <!-- Password Field -->
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password', 'Mot de passe', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::password('password', ['class' => 'form-control']) !!}
                <span class="help-block text-danger">
                    @if($errors -> first('password') =="The password confirmation does not match.")
                        Le mot de passe de confirmation ne correspond pas
                    @elseif ($errors -> first('password') =="The password field is required.")
                        Ce champs ne peut pas être vide
                    @elseif ($errors -> first('password_confirmation') =="The password confirmation and password must match.")
                        Le mot de passe de confirmation et le mot de passe doivent être identique
                    @else 
                        {{ $errors -> first('password') }}
                    @endif
                </span>
            </div>
        </div>

        <!-- Password Confirmation Field -->
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            {!! Form::label('password_confirmation', 'Confirmation mot de passe', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                <span class="help-block text-danger">
                    @if($errors -> first('password_confirmation') =="The password confirmation does not match.")
                        Le mot de passe de confirmation ne correspond pas
                    @elseif ($errors -> first('password_confirmation') =="The password confirmation field is required.")
                        Ce champs ne peut pas être vide
                    @elseif ($errors -> first('password') =="The password confirmation and password must match.")
                        Le mot de passe de confirmation et le mot de passe doivent être identique
                    @else 
                        {{ $errors -> first('password_confirmation') }}
                    @endif
                </span>
            </div>
        </div>

        <!-- submit button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                {!! Form::submit('Créer son compte', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection
