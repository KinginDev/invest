<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link href="https://fonts.googleapis.com/css?family=Jua|Raleway" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">


    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                     </ul>
                   
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                         <li><a  class="nav-link {{ active('admin.dashboard') }}"  href="{{route('admin.dashboard')}}">Users</a></li>
                          
                          <li><a   class="nav-link {{ active('transactions.index') }}"  href="{{route('transactions.index')}}">Transactions</a></li>
                            
                             <li><a   class="nav-link {{ active('withdraw.index') }}"  href="{{route('withdraw.index')}}">Withdraws</a></li>
                               <li><a   class="nav-link {{ active('cards.index') }}"  href="{{route('cards.index')}}">Cards</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::guard('admin')->check())
                                    {{ Auth::guard('admin')->user()->name }}
                                    @endif
                                 <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container">
             @if(Auth::guard('admin')->check())
            <div class="container" style="margin: 10px;">
                  <form action="{{route('search.index')}}" method="GET" class="navbar-form navbar-left">
                         <div class="form-group">
                            @csrf
                            <input type="text" class="form-control" name="search" value="@isset($_GET['search'])  {{$_GET['search'] }}@endisset" placeholder="Who you want to search">
                        </div>
                            <div class="clearfix"></div>
                           <center> <button class="btn btn-primary " type="submit">Submit</button></center>
                       
                    </form>

            </div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-success">
                <p>{{Session::get('success')}}</p>
            </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
