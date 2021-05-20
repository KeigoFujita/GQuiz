@extends('layouts.app')


<style>
    html,
    body {
        background-image: url('/img/admin3.png');
        background-attachment: fixed;
        background-size: 100%;
        object-fit: scale-down;
        background-repeat: no-repeat;

        color: white;
        font-weight: 200;

        margin: 0;

    }

</style>


<body>

    @section('content')

        <div class="container-fluid">
            <div class=" row justify-content-center">
                <div class="col-md-12" style="margin-top:100px;">
                    <div class="row justify-content-center">
                        <div class="logo mb-4">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-5" style=" margin-left:400px; position: relative;">
                <div class="rounded" style="background-color: black; opacity: 0.5; height: 350px;"></div>
                <div class="card" style="background-color:transparent; position: relative; top: -350px;">
                    <h3 style="color:white; margin-top: 40px;margin-left:230px;font-family:Arial Narrow"> ADMIN </h3>


                    <div class="card-body " style=" height: 300px;  ">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row" style="margin-top:5px; margin-left:100px;">
                                <div class="col-md-9">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email" name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="margin-left:100px;">

                                <div class=" col-md-9">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                </div>
            </div>
        </div> --}}

                            <div class="form-group row mb-0 mt-2">
                                <div class="col-md-8 offset-md-0">
                                    <button type="submit" class="btn btn-outline-secondary bg-gardner text-white"
                                        style="width:320px;margin-left:110;">
                                        {{ __('Login') }}
                                    </button>
                                    <a href="/" class="btn btn-outline-danger bg-danger  text-white"
                                        style="width:320px;margin-left:110; margin-top:5px;">
                                        {{ __('Cancel') }}
                                    </a>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}"
                                            style="margin-left:160;">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        </div>



    @endsection







</body>
