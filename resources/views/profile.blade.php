@extends('master')

@section('content')
    <h1>Profile</h1>
    <hr/>
    @include('partials.flash_notification')
    {!! Form::open(['url' => '/user', 'class' => 'form-horizontal', 'role' => 'form','method' => 'put']) !!}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nom', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
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
                {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
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

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                {!! Form::submit('Mettre à jour', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url('/reset-password') }}" class="btn btn-primary">Changer de mot de passe</a>
                <a href="{{ url('/tasks') }}" class="btn btn-default">Retour</a>
            </div>
        </div>
    {!! Form::close() !!}
@endsection