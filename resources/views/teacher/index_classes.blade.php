@extends('layouts.teacher-app')

@section('custom-css')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <style>
        .title {
            font-size: 3rem;
            letter-spacing: -0.01ch;
        }

        .card-header a {
            font-size: 2rem;
            text-decoration: none;
            color: white !important;
            margin-bottom: 0;
        }

        .card-header i {
            font-size: 1rem;
            text-decoration: none;
            color: white !important;
        }

        .card-header a:hover {
            border-bottom: 2px solid white;
            color: white !important;
        }

        .font-inter {
            font-family: 'Inter', sans-serif !important;
        }

        .card-body .heading-text {
            font-weight: 500;
            margin-bottom: 0.5rem !important;
        }

        .card-body .heading-label {
            font-weight: 400;
            color: black !important;
            display: block;
        }

    </style>
@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            Search Drugs
        </div>
        <div class="card-body">

            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            style="width: 1350px">
                        <button class="btn btn-outline-danger" type="submit">Search</button>
                    </form>


                </div>
            </nav>
            <style>
                .owl-carousel .item {
                    height: 12rem;
                    background: whitesmoke;
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
                                items: 6
                            },
                            1000: {
                                items: 8
                            }
                        }
                    })
                })

            </script>


            <div class="owl-carousel owl-theme mt-5">
                <div class="item">
                    <h4><img src="/img/D1.jpg" alt="" style="width:150px;"></h4>
                </div>
                <div class="item">
                    <h4><img src="/img/D12.jfif" alt="" style="width:150px;"></h4>
                </div>
                <div class="item">
                    <h4><img src="/img/D3.jpg" alt="" style="width:150px;"></h4>
                </div>
                <div class="item">
                    <h4><img src="/img/D4.jfif" alt="" style="width:150px;"></h4>
                </div>
                <div class="item">
                    <h4><img src="/img/D5.jpg" alt="" style="width:150px;"></h4>
                </div>
                <div class="item">
                    <h4><img src="/img/D7.jpg" alt="" style="width:150px;"></h4>
                </div>
                <div class="item">
                    <h4><img src="/img/D8.jpg" alt="" style="width:150px;"></h4>
                </div>
                <div class="item">
                    <h4><img src="/img/D9.jpg" alt="" style="width:150px;"></h4>
                </div>
                <div class="item">
                    <h4><img src="/img/D10.jpg" alt="" style="width:150px;"></h4>
                </div>
                <div class="item">
                    <h4><img src="/img/D11.jpg" alt="" style="width:150px;"></h4>
                </div>

            </div>
            <table class="table table-bordered table-centered table-hover shadow-sm" id="table">
                <thead>

                    <th>Brand ID</th>
                    <th>Brand Name</th>
                    <th>Generic Name</th>
                    <th>Brand Type</th>
                    <th>Expiry Date</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>On Hand</th>
                    <th>Actions</th>
                </thead>
                <tbody>


                    <td>PRD-30{{ $teacher->id }}</td>
                    <td>{{ ['Altace', 'Amaryl', 'Ambien', 'Mevacor', 'Zestril', 'Zocor', 'Zovirax'][rand(0, 6)] }}</td>
                    <td>{{ ['NAPROXEN 500MG TABLET', 'ASCORBIC ACID + ZINC 100MG', 'ASCORBIC ACID 100MG/5ML 120ML', 'NAPROXEN 500MG TABLET', 'NNAPROXEN 500MG TABLET '][rand(0, 4)] }}
                    </td>
                    <td>{{ ['Rx', 'Non-Rx', 'Rx', 'Non-Rx', 'Non-Rx '][rand(0, 4)] }}</td>
                    <td>{{ now()->addDays(rand(0, 30))->format('M  d,Y ') }}</td>
                    <td>
                        @php
                            $status = rand(0, 1);
                        @endphp

                        @if ($status === 0)
                            <span class="badge badge-pill badge-danger">Out of Stock</span>
                        @else
                            <span class="badge badge-pill badge-success">Available</span>
                        @endif
                    </td>
                    <td>{{ $status * rand(0, 2312) }}</td>
                    <td>{{ $status * rand(0, 2312) }}</td>

                    <td>{{ $status * rand(0, 2312) }}</td>
                    <td>
                        <a type="button" class="btn btn-danger btn-sm">Add to
                            Cart</a>
                    </td>
                    </tr>


            </table>


            <div class="card ">
                <div class="card-header">
                    </h1>Bills</h1>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row align-items-start">
                            <div class="col-6">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Brand Name</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>KIDNEY CARE CAPSULE</td>
                                            <td>20</td>
                                            <td>63</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>SANGOBION + IRON SYRUP 100ML</td>
                                            <td>62</td>
                                            <td>32</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td colspan="2">PROPAN TLC SYRUP ORANGE FLAVOR 250ML</td>

                                            <td colspan="2">23</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-5">
                                <h4> Payment</h4>
                                <br>
                                <h4> One of three columns </h4>

                            </div>
                            <a href="#" class="btn btn-danger">Print</a>
                        </div>
                    </div>

                </div>


            </div>





            <!-- Modal -->

        @endsection
