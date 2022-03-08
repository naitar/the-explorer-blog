<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',env('APP_NAME'))</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('head')
    <style>
       
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white top-0 shadow-sm w-100">    
        <div class="container">
          <a class="navbar-brand" href="#">The Explorer Blog</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            @guest
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login</a>
                </li>
            @endguest
                
            @auth
                
                            
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ auth()->user()->name }}
                  <img src="{{ asset(auth()->user()->photo) }}" class="user-img rounded-circle border border-white border-2 shadwo-sm" alt="">
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                  <li><a class="dropdown-item" href="#">Change Password</a></li>
                  <li><hr class="dropdown-divider"> </li>
                  <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </ul>
              </li>
            @endauth
              
            </ul>

        </div>
      </nav>

      <div class="py-4"></div>
      @yield('content')



     

      <footer class="bg-primary py-5">

      </footer>


    </body>
   
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</html>