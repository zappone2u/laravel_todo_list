@extends('master')

@section('content')
    @if (Auth::guest())
        <div class="text-center">
            <h1>Bienvenue sur MyTodoList</h1>
            @include('partials.flash_notification')
            <hr/>
            <h3>Vous devez être connecté (ou créer un compte) pour de pouvoir créer votre liste de tâches</h1>
        </div>
    @else
        <div class="text-center">
            <h1>Bienvenue sur MyTodoList</h1>
            <hr/>
            <h3>Pour visualiser vos tâches aller dans "Mes tâches"</h1>
        </div>
    @endif
@endsection