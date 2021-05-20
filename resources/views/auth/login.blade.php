{{-- @extends('layouts.app')


<style>
    html,
    body {
        background-image: url('/img/pic.jpg');
        background-attachment: fixed;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: scroll;
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

            <div class="col-md-5" style=" margin-left:400px;">

                <div class="card" style="background-color:blue;opacity: 0.3;">
                    ">

                    <div class="card-header" STYLE="background-image: url('/img/blurr.png'); ">
                        {{ __('Login') }}
                    </div>

                    <div class="card-body" style=" height: 300px; ">


                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row" style="margin-top:50px;">
                                <label for="email" class="col-md-4 col-form-label text-md-right"
                                    style="color:gray;">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"
                                    style="color:gray;">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

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

<div class="form-group row mb-0 mt-4">
    <div class="col-md-8 offset-md-4">
        <button type="submit" class="btn btn-outline-secondary bg-gardner text-white" style="width:100px;">
            {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
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







</body> --}}
