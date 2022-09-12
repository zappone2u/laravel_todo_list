<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
        @if(\Auth::guest())
            <a class="navbar-brand" href="/">Bienvenue sur MyTodoList</a>
        @else
            <a class="navbar-brand" href="/">Bonjour {{ \Auth::user()->name }}</a>
        @endif
        
    </div>
    <ul class="nav navbar-nav navbar-right">
        @if(\Auth::guest())
            <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Créer un compte</a></li>
            <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
        @else
            <li><a href="{{ url('/tasks') }}"> <span class="glyphicon glyphicon-tasks"></span> Mes tâches</a></li>
            <li><a href="{{ url('/user') }}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
            <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
        @endif
    </ul>
  </div>
</nav>
