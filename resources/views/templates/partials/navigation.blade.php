<!-- <nav class="navbar navbar-light navbar-toggleable-md" role="navigation">
  <a class="navbar-brand" href="#">Chatty</a>
  <div class="collapse navbar-collapse">
   {{-- @if (auth::check()) --}}
   <ul class="navbar-nav">
    <li class="nav-item"> <a class="nav-link" href="#">timeline</a> </li>
    <li class="nav-item"> <a class="nav-link" href="#">friends</a> </li>
  </ul>
  <form class="navbar-form navbar-toggler-left" role="search" action="#">
    <div class="form-group">
      <input type="text" name="query" class="form-control" placeholder="find people">
    </div>
    <button type="submit" class="btn btn-default">search</button>
  </form>
  {{-- @endif --}}

  <ul class="nav navbar-nav navbar-toggler-right">
    {{-- @if (auth::check()) --}}
    <li><a href="#">dayle{{-- {{auth::user()->getnameorusername()}} --}}</a></li>
    <li><a href="#">update profile</a></li>
    <li><a href="#">sign out</a></li>
    {{-- @else --}}
    <li><a href="#">sign up</a></li>
    <li><a href="#">sign in</a></li>
    {{-- @endif --}}
  </ul>
</div> 
</nav> -->
<nav class="navbar navbar-default navbar-toggleable-md">
  <div class="container">

    <a class="navbar-brand" href="#">Chatty</a>
    <div class="collapse navbar-collapse">
      <!--@if (Auth::check()) -->
      <ul class="navbar-nav">
        <li class="nav-item"> <a class="nav-link" href="#">Timeline</a> </li>
        <li class="nav-item"> <a class="nav-link" href="#">Friends</a> </li>
      </ul>
      <form class="navbar-form navbar-toggler-left" role="search" action="#">
        <div class="form-group">
          <input type="text" name="query" class="form-control" placeholder="find people">
        </div>
        <button type="submit" class="btn btn-default">search</button>
      </form>
      <!-- @endif -->

     
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <!--@if (Auth::check()) -->
          <li><a href="#">Dayle{{-- {{auth::user()->getnameorusername()}} --}}</a></li>
          <li><a href="#">Update profile</a></li>
          <li><a href="#">Sign out</a></li>
          <!-- @else -->
          <li><a href="#">Sign up</a></li>
          <li><a href="#">Sign in</a></li>
          <!-- @endif -->
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>