<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/logo_burned.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('custom-meta')
    <title>{{ config('app.name', 'Gardner') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/lib/font-awesome/css/font-awesome.min.css') }}"> --}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    @yield('custom-css')
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
    @error('section')
    <style>
        .select2-selection--single{
            border: 1px solid #dc3545 !important;
        }    
    </style>    
    @enderror
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container-fluid">


                <a class="navbar-brand" href="{{ url('/') }}" style="font-weight:400;">
                    <img src="/img/logo_burned.png" alt="" style="height:30px; margin-top:-6px;" class="mr-2">
                    Gardner College
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"
                        style="color:white; display:flex; align-items:center; justify-content:center; ">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->



                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        @isset(Auth::user()->role)
                        @if (Auth::user()->role == 'student')
                        <ul class="navbar-nav mr-auto">
                            <div class="portrait-xsm mr-1"
                                style="background-color: {{ Auth::user()->student->color }}; ">
                                <p class="default-font my-0">
                                    {{ Auth::user()->student->two_initials }}</p>
                            </div>
                        </ul>
                        @else

                        <ul class="navbar-nav mr-auto">
                            <div class="portrait-xsm mr-1"
                                style="background-color: {{ Auth::user()->employee->color }};">
                                <p class="default-font my-0">
                                    {{ Auth::user()->employee->two_initials }}</p>
                            </div>
                        </ul>
                        @endif
                        @endisset

                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                @if (Auth::user()->role == 'student')
                                {{ Auth::user()->student->full_name}}
                                @else
                                {{ Auth::user()->employee->full_name}}
                                @endif

                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            <div class="container-fluid">

                <div class="row">
                    @auth

                    @if (Auth::user()->role == 'employee')

                    @if (Auth::user()->employee->is_teacher)
                    <div class="col-lg-2 pad-0">
                        @include('components.teacher_sidebar')
                    </div>
                    <div class="col-lg-10 pad-0 main-content">
                        @yield('content')
                    </div>

                    @else

                    @if (Auth::user()->employee->is_registrar)
                    <div class="col-lg-2 pad-0">
                        @include('components.sidebar')
                    </div>
                    <div class="col-lg-10 pad-0 main-content">
                        @yield('content')
                    </div>
                    @else
                    <div class="col-lg-12 pad-0 main-content">
                        @yield('content')
                    </div>

                    @endif

                    @endif

                    @else

                    <div class="col-lg-12 pad-0 main-content">
                        @yield('content')
                    </div>
                    @endauth
                    @endif
                    @guest
                    <div class="col-lg-12 pt-5">
                        @yield('content')
                    </div>
                    @endguest
                </div>
            </div>

        </main>
    </div>
</body>
<!-- Scripts -->
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
@yield('scripts')

</html>
