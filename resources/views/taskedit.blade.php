@extends('master')

@section('content')
        @if (Auth::guest())
            <div class="text-center">
                <h1>Bienvenue sur MyTodoList</h1>
                <hr/>
                <h3>Vous devez être connecté (ou créer un compte) pour de pouvoir créer votre liste de tâches</h1>
            </div>
        @else
            <h1>Modification de votre tâche</h1>
            <hr/>

            {!! Form::open(['url' => '/taskedit', 'class' => 'form-horizontal', 'role' => 'form','method' => 'put']) !!}
                <!-- Email Field -->
                <div class="form-group">
                    {!! Form::label('nameTask', 'Description', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('name', $task->description, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('state', 'Niveau importance', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-4">  
                        @if($task->state == 1)
                            <select name ="state" id="state" class="form-control" >
                                <option value="0">Normal</option>
                                <option value="1" selected>Important</option>
                                <option value="2">Urgent</option>
                            </select>
                        @elseif($task->state == 2)
                            <select name ="state" id="state" class="form-control" >
                                <option value="0">Normal</option>
                                <option value="1">Important</option>
                                <option value="2" selected>Urgent</option>
                            </select>
                        @else
                            <select name ="state" id="state" class="form-control" >
                                <option value="0" selected>Normal</option>
                                <option value="1">Important</option>
                                <option value="2">Urgent</option>
                            </select>
                        @endif          
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        {!! Form::hidden('id', $task->id) !!}
                        {!! Form::submit('Mettre à jour', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ url('/tasks') }}" class="btn btn-default">Annuler</a>
                    </div>
                </div>
            {!! Form::close() !!}
        @endif
@endsection