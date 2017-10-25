<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('home') }}">Chatty</a>
    </div>
    <div class="collapse navbar-collapse">
      @if (Auth::check())
        <ul class="nav navbar-nav">
          <li class="nav-item"> <a class="nav-link" href="#">Timeline</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#">Friends</a> </li>
        </ul>
        <form class="navbar-form navbar-left" role="search" action="{{ route('search.results') }}">
          <div class="form-group">
            <input type="text" name="query" class="form-control" placeholder="Find people">
          </div>
          <button type="submit" class="btn btn-default">search</button>
        </form>
      @endif 
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check()) 
          <li><a href="{{ route('profile.index', ['username' => Auth::user()->username]) }}">{{ Auth::user()->getNameOrUserName()}}</a></li>
          <li><a href="{{ route('profile.edit') }}">Update profile</a></li>
          <li><a href="{{ route('auth.signout') }}">Sign out</a></li>
        @else 
          <li><a href="{{ route('auth.signup') }}">Sign up</a></li>
          <li><a href="{{ route('auth.signin') }}">Sign in</a></li>
        @endif 
      </ul>
    </div>
  </nav>
  