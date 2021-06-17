<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/druglogo.jpg">
    <title>ADA Drugstore</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- Styles -->
    <style>
        body {

            color: black;
            font-weight: 200;
            margin: 0;
            overflow: auto;
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
            width: 600px;
        }

        .login {
            margin: auto;
            margin-top: 50px;
            width: 180px;
            height: 50px;
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

    </style>
</head>

<body>

    <div class="d-flex align-content-center justify-content-center">
        <div class="my-5">



            <div class="" style="margin-left:50px; ">

                <img src="/img/pics.jpg" alt="" style=" width : 1400px ;  height : 500px">
            </div>
            <p class="default-font display-1 mb-0"
                style=" font-size:40px;margin-top: 40px;margin-left: 680px; margin-right: 200px;family-font:arial">
                Mission

            <p class="default-font display-1 mb-0"
                style=" font-size:25px; margin-top: 25px;margin-left:150px; color:gray; margin-right: 150px;family-font:arial">
                To provide safe, high quality patient care in an atmosphere of professionalism, respect, and effective
                communication

            </p>
            <p class="default-font display-1 mb-0"
                style=" font-size:40px;margin-top: 40px;margin-left: 680px; margin-right: 200px;family-font:arial">
                Vision

            <p class="default-font display-1 mb-0"
                style=" font-size:25px; margin-top: 25px;margin-left:180px; color:gray; margin-right: 150px;family-font:arial">
                The Department of Pharmacy is committed to: Patient Care: Being an integral member of the healthcare
                team

            </p>

            <p class="default-font display-1 mb-0"
                style=" font-size:25px;margin-left: 400px;color:gray; margin-right: 80px;family-font:arial">

                responsible for the outcomes associated with the medication use process.
            </p>
            @if (Route::has('login'))

                <b>
                    <div class="mt-5" style="margin-left:470px;">
                        @auth
                            <div class="mt-5" style="margin-left: 50px;">

                                <a href="{{ url('/home') }}" class="btn btn-outline-dark   "
                                    style="font-famiy: Rounded MT Bold; font-size:20px; color: gray"> Home
                                </a>

                            </div>
                        @else

                            <a href="{{ url('/login/admin') }}" class="btn btn-outline-danger   "
                                style="font-famiy: Rounded MT Bold; font-size:20px;width: 250px; "> Admin
                            </a>

                            <a href="{{ url('/login/cashier') }}" class="btn btn-outline-danger  "
                                style="font-famiy: Rounded MT Bold;margin-left:10px; font-size:20px;width: 250px; ">Cashier

                            </a>


                        @endauth
                    </div>

                </b>
            @endif

        </div>

    </div>

</body>

</html>
