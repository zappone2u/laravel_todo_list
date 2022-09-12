@extends('master')

@section('content')
    <h1>Nouveau mot de passe</h1>
    <hr/>
    
    
    {!! Form::open(['url' => '/reset-password', 'class' => 'form-horizontal', 'role' => 'form','method' => 'put']) !!}
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password', 'Nouveau mot de passe', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::password('password', ['class' => 'form-control']) !!}
                <span class="help-block text-danger">
                @if($errors -> first('password') =="The password confirmation does not match.")
                    Le mot de passe de confirmation ne correspond pas
                @elseif ($errors -> first('password') =="The password field is required.")
                    Ce champs ne peut pas être vide
                @elseif ($errors -> first('password') =="The password confirmation and password must match.")
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
                @elseif ($errors -> first('password_confirmation') =="The password confirmation and password must match.")
                    Le mot de passe de confirmation et le mot de passe doivent être identique
                @else 
                    {{ $errors -> first('password_confirmation') }}
                @endif
                </span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                {!! Form::submit('Mettre à jour', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url('/user') }}" class="btn btn-default">Retour</a>
            </div>
        </div>
    {!! Form::close() !!}
@endsection