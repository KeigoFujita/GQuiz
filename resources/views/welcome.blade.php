<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/logo_burned.png">
    <title>Gardner</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .sub p {
            font-size: 2rem;
        }

        .logo img {
            width: 130px;
        }

        .login {
            margin: auto;
            margin-top: 50px;
            width: 120px;
            height: 35px;
            background-color: #14394C;
            text-align: center;

            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.3rem;
            cursor: pointer;
        }

        .login a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            text-decoration: none;
            color: white;
            font-size: 1rem;
        }


        @media (max-width: 768px) {
            .display-1 {
                font-size: 3.5rem;
            }

            .sub p {
                font-size: 1.3rem;
            }
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">



        <div class="content">

            <div class="logo">
                <img src="/img/logo.jpg" alt="">
            </div>
            <div class=" mb-1">
                <p class="default-font display-1 mb-0">Gardner College</p>
            </div>

            <div class="sub">
                <p class="default-font">Clearance System</p>
            </div>


            @if (Route::has('login'))
            <div class="login">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>
                @endauth
            </div>
            @endif
        </div>
    </div>
</body>

</html>