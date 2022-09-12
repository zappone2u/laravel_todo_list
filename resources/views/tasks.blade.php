@extends('master')

@section('content')

        @if (Auth::guest())
            <div class="text-center">
                <h1>Bienvenue sur MyTodoList</h1>
                <hr/>
                <h3>Vous devez être connecté (ou créer un compte) pour de pouvoir créer votre liste de tâches</h1>
            </div>
        @else
            @include('partials.flash_notification')
            <div>
                @if(count($tasks))
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-9">
                                <input class="form-control" id="myInput" type="text" placeholder="Rechercher...">
                            </div>
                            <div class="col-sm-3">
                                <form method="get" action="{{ route('tasks.newtask') }}">
                                    <button type="submit" class="btn btn-warning" href="{{ url('/newtasks') }}">Nouvelle tâche</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group" id="myList">
                        <table class="table mb-4">
                            <thead>
                                <tr>
                                    <th scope="col">Tâche</th>
                                    <th scope="col">Niveau d'importance</th>
                                    <th style="width:100px;"scope="col">Statue</th>
                                    <th scope="col">Date de création</th>
                                    <th scope="col">Date de modification</th>
                                    <th scope="col">Modifier</th>
                                    <th scope="col">Supprimer</th>
                                    <th scope="col">Terminé / A faire</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr id="myListS" draggable='true' ondragstart='start()' ondragover='dragover()'>
                                    @if($task->status == 0)
                                        <td>{{$task->description}}</td>
                                        @if($task->state == 1)
                                            <td style="background-color:orange; text-align:center">Important</td>
                                        @elseif($task->state == 2)
                                            <td style="background-color:red; text-align:center">Urgent</td>
                                        @else
                                            <td style="text-align:center">Normal</td>
                                        @endif
                                        <td style="text-align:center;">En cours</td>
                                        <td>{{$task->created_at}}</td>
                                        <td>{{$task->updated_at}}</td>
                                        <td>
                                            <form method="get" action="{{ route('tasks.taskedit') }}">
                                                {!! Form::hidden('id', $task->id) !!}
                                                <button type="submit" class="btn btn-info glyphicon glyphicon-pencil ms-1"></button>
                                            </form>
                                        </td>
                                        <td>
                                            {!! Form::open(['url' => '/deletetask', 'class' => 'form-inline']) !!}
                                                {!! Form::hidden('id', $task->id) !!}
                                                <button type="submit" class="btn btn-danger glyphicon glyphicon-remove ms-1"></button>
                                            {!! Form::close() !!}
                                        </td>
                                        <td>
                                            {!! Form::open(['url' => '/finishtask', 'class' => 'form-inline']) !!} 
                                                {!! Form::hidden('id', $task->id) !!} 
                                                <button type="submit" class="btn btn-success glyphicon glyphicon-ok ms-1"></button>
                                            {!! Form::close() !!}
                                        </td>
                                    @else
                                        <td class="strike">{{$task->description}}</td>
                                        @if($task->state == 1)
                                            <td style="background-color:green; text-align:center">Important</td>
                                        @elseif($task->state == 2)
                                            <td style="background-color:green; text-align:center">Urgent</td>
                                        @else
                                            <td style="background-color:green; text-align:center">Normal</td>
                                        @endif
                                        <td style="background-color:green; text-align:center">Fait</td>
                                        <td>{{$task->created_at}}</td>
                                        <td>{{$task->updated_at}}</td>
                                        <td>
                                            <form method="get" action="{{ route('tasks.taskedit') }}">
                                                {!! Form::hidden('id', $task->id) !!}
                                                <button type="submit" class="btn btn-info glyphicon glyphicon-pencil ms-1"></button>
                                            </form>
                                        </td>
                                        <td>
                                            {!! Form::open(['url' => '/deletetask', 'class' => 'form-inline']) !!}
                                                {!! Form::hidden('id', $task->id) !!}
                                                <button type="submit" class="btn btn-danger glyphicon glyphicon-remove ms-1"></button>
                                            {!! Form::close() !!}
                                        </td>
                                        <td>
                                            {!! Form::open(['url' => '/progresstask', 'class' => 'form-horizontal', 'role' => 'form']) !!} 
                                                {!! Form::hidden('id', $task->id) !!}
                                                <button type="submit" class="btn btn-success glyphicon glyphicon-arrow-left ms-1"></button>
                                            {!! Form::close() !!}
                                        </td>
                                    @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </ul>  
                @else
                    <div class="text-center">
                        <h3>Vous avez aucune tâche à faire ! Féliciations !!!</h3>
                        <p><a href="{{ url('/newtask')}}">Créer une nouvelle tâche</a></p>
                    </div>
                @endif
            </div>
        @endif

        <script>
            $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myList #myListS").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
            var row;
            function start(){
            row = event.target;
            }
            function dragover(){
            var e = event;
            e.preventDefault();

            let children= Array.from(e.target.parentNode.parentNode.children);
            if(children.indexOf(e.target.parentNode)>children.indexOf(row))
                e.target.parentNode.after(row);
            else
                e.target.parentNode.before(row);
            }
        </script>
@endsection