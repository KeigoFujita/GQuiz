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

                <img src="/img/piclogo1.jpg" alt="">
            </div>
            <p class="default-font display-1 mb-0"
                style=" font-size:40px;margin-top: 40px;margin-left: 250px; margin-right: 200px;family-font:arial">Get
                More
                Time To Teach
                and Inspire Learners
                with GQuiz.

            <p class="default-font display-1 mb-0"
                style=" font-size:25px; margin-top: 25px;margin-left:150px; color:gray; margin-right: 150px;family-font:arial">
                A free and easy tool helping educators efficiently manage and assess progress,while enhancing
                connections

            </p>

            <p class="default-font display-1 mb-0"
                style=" font-size:25px;margin-left: 500px;color:gray; margin-right: 150px;family-font:arial">

                with learners from school, from home, or on the go.
            </p>
            @if (Route::has('login'))

                <b>
                    <div class="mt-5" style="margin-left:550px;">
                        @auth
                            <div class="mt-5" style="margin-left: 100px;">
                                <a href="{{ url('/home') }}" class="btn btn-outline-dark   "
                                    style="font-famiy: Rounded MT Bold; font-size:20px; color: gray"> Home
                                </a>

                            </div>
                        @else

                            <a href="{{ route('login') }}" class="btn btn-outline-dark   "
                                style="font-famiy: Rounded MT Bold; font-size:20px; color: gray"> I am Admin
                            </a>
                            <a href="{{ route('login') }}" class="btn btn-outline-dark  "
                                style="font-famiy: Rounded MT Bold;margin-left:5px; font-size:20px; color:gray">I'am
                                Teacher
                            </a>

                            <a href="{{ route('login') }}" class="btn btn-outline-dark "
                                style="font-famiy: Rounded MT Bold; font-size:20px;  color:gray">I am Student
                            </a>
                        @endauth
                    </div>

                </b>
            @endif

            <div class="col-12 mt-2">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-6">

                            <div class="mb-3">

                                <div class="" style="margin-left:20px; margin-top: 100px;width: 500px;">

                                    <img src="/img/pic.jpg" alt="">

                                </div>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="mb-3">

                                <p class="default-font display-1 mb-0"
                                    style=" font-size:35px;margin-top: 100px;color: black; margin-right: 150px;family-font:arial">


                                    Simplify teaching and learning

                                </p>

                                <p class="default-font display-1 mb-0"
                                    style=" font-size:25px;margin-top: 50px;color:gray; margin-right: 150px;family-font:arial">


                                    * Add students directly, and admin give an account
                                </p>

                                <p class="default-font display-1 mb-0"
                                    style=" font-size:25px;margin-top: 50px;color:gray; margin-right: 150px;family-font:arial">


                                    * Set up a class in minutes and create class work that appear on students’ account

                                <p class="default-font display-1 mb-0"
                                    style=" font-size:25px;margin-top: 50px;color:gray; margin-right: 150px;family-font:arial">


                                    * Easily communicate with guardians and automatically send them updates

                                </p>


                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 mt-5">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-5">

                            <div class="mb-3">

                                <div class="" style="margin-left:20px; margin-top: 100px;width: 500px;">
                                    <p class="default-font display-1 mb-0"
                                        style=" font-size:35px;margin-top: 50px;;color: black;family-font:arial">

                                        Strengthen student connections

                                    </p>

                                    <p class="default-font display-1 mb-0"
                                        style=" font-size:25px;margin-top: 50px;color:gray;family-font:arial">


                                        * Connect with your students from anywhere with a hybrid approach for in-class

                                    </p>

                                    <p class="default-font display-1 mb-0"
                                        style=" font-size:25px;margin-top: 50px;color:gray;family-font:arial">


                                        * Communicate important announcements to the Stream page

                                    <p class="default-font display-1 mb-0"
                                        style=" font-size:25px;margin-top: 50px;color:gray;family-font:arial">


                                        * Enable check the score of the students

                                    </p>



                                </div>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="mb-3">
                                <div class="" style="margin-left:0px; margin-top: 50px; height:500px;">
                                    <img src="/img/pic2.jpg" alt="">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-12 mt-6">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-6">

                            <div class="">
                                <div class="" style="margin-left:0px; margin-top: 100px; height:500px;">
                                    <img src="/img/three.jpg" alt="">

                                </div>
                            </div>

                        </div>

                        <div class="col-6">

                            <div class="">

                                <p class="default-font display-1 mb-0"
                                    style=" font-size:35px;margin-top: 100px;color: black; margin-right: 150px;family-font:arial">


                                    Keep your data protected

                                </p>

                                <p class="default-font display-1 mb-0"
                                    style=" font-size:25px;margin-top: 50px;color:gray; margin-right: 150px;family-font:arial">


                                    * Ensure each user has a unique sign-in to keep individual accounts secure
                                </p>

                                <p class="default-font display-1 mb-0"
                                    style=" font-size:25px;margin-top: 50px;color:gray; margin-right: 150px;family-font:arial">


                                    * Restrict Classroom activity to members of the class

                                <p class="default-font display-1 mb-0"
                                    style=" font-size:25px;margin-top: 50px;color:gray; margin-right: 150px;family-font:arial">


                                    * Protect student privacy - student data is never used for advertising purposes

                                </p>


                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <p class="default-font display-1 mb-5"
        style=" font-size:30px;margin-top: 0px;margin-left: 250px; margin-right: 200px;family-font:arial">
        “By allowing students to submit their work with Classroom, I can keep track of my sections, view Scores easily,
        and mark Quizes during any free time I have, without having to carry stacks of paper around. Classroom has
        made this process so easy and convenient.”
    </p>

    <p class="default-font display-1 mb-5"
        style=" font-size:30px;margin-top: 0px;margin-left: 500px; margin-right: 200px;family-font:arial">
        Ready to start getting better results?
    </p>

    <a href="{{ route('login') }}" class="btn btn-outline-dark "
        style="font-famiy: Rounded MT Bold; font-size:20px;margin-left: 650px;  color:gray">Go started
    </a>

    ...
    <style>
        .owl-carousel .item {
            height: 18rem;
            background: white;
            padding: 1rem;
        }

        .owl-carousel .item h4 {
            color: #FFF;
            font-weight: 400;
            margin-top: 0rem;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" />
    <script>
        jQuery(document).ready(function($) {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        })

    </script>
    ...

    <div class="owl-carousel owl-theme mt-5">
        <div class="item">
            <h4><img src="/img/set1.jpg" alt="" style="width:250px;"></h4>
        </div>
        <div class="item">
            <h4><img src="/img/set2.jpg" alt="" style="width:250px;"></h4>
        </div>
        <div class="item">
            <h4><img src="/img/set3.jpg" alt="" style="width:250px;"></h4>
        </div>
        <div class="item">
            <h4><img src="/img/set4.jpg" alt="" style="width:250px;"></h4>
        </div>
        <div class="item">
            <h4><img src="/img/set5.jpg" alt="" style="width:250px;"></h4>
        </div>
        <div class="item">
            <h4><img src="/img/set6.jpg" alt="" style="width:250px;"></h4>
        </div>
        <div class="item">
            <h4><img src="/img/set7.jpg" alt="" style="width:250px;"></h4>
        </div>
        <div class="item">
            <h4><img src="/img/set8.jpg" alt="" style="width:250px;"></h4>
        </div>
        <div class="item">
            <h4><img src="/img/set9.jpg" alt="" style="width:250px;"></h4>
        </div>
        <div class="item">
            <h4><img src="/img/set10.jpg" alt="" style="width:250px;"></h4>
        </div>

    </div>
    <div cl <div class="card text-center mt-5">

        <div class="card-body">

        </div>
        <div class="card-footer text-muted">
            © 2021 GardnerCollege.ph
            | Terms and Conditions | Privacy Policy | Sitemap
        </div>
    </div>


</body>

</html>
