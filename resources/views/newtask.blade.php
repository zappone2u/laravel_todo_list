@extends('master')

@section('content')
        @if (Auth::guest())
            <div class="text-center">
                <h1>Bienvenue sur MyTodoList</h1>
                <hr/>
                <h3>Vous devez être connecté (ou créer un compte) pour de pouvoir créer votre liste de tâches</h1>
            </div>
        @else
            <h1>Création de votre tâche</h1>
            <hr/>

            {!! Form::open(['url' => '/newtask', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                <!-- Email Field -->
                <div class="form-group">
                    {!! Form::label('nameTask', 'Description', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('state', 'Niveau importance', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-4">              
                        <select name ="state" id="state" class="form-control" >
                            <option value="0">Normal</option>
                            <option value="1">Important</option>
                            <option value="2">Urgent</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        {!! Form::submit('Créer', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        @endif

        <script>
            function change()
                {
                var doc = document.getElementById("select");
                var val = doc.options[doc.selectedIndex].value;
                var input = document.getElementById("inpuTxt");
                if(val=="autre")
                {
                input.style.display="block";
                }
                else
                {
                input.style.display="none";
                }
                }
        </script>
@endsection