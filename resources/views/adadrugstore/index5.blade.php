@extends('layouts.app')

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
    <div class="container-fluid py-5 px-5 font-inter">

        <div class="d-flex justify-content-between align-items-center">
            <p class="title mb-5">
                Reports
            </p>

            <div class="d-flex align-items-center justify-content-center">
                <div class="dropdown show mr-2">
                    <a class="btn btn-outline-secondary px-4 -py-2 dropdown-toggle" href="#" role="button"
                       id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-filter mr-2" aria-hidden="true"></i>
                        Filter
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('teachers.my-classes') }}">Active</a>
                        <a class="dropdown-item" href="{{ route('teachers.my-classes-archived') }}">Archived</a>
                    </div>
                </div>

                <div>
                    <button type="button" class="btn btn-success" href="#" data-toggle="modal" data-target="#add-modal">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i>
                        Create Report
                    </button>

                </div>
            </div>
        </div>

        @if (session()->has('success'))

            <div class="alert alert-success alert-dismissible fade show">
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        @endif


        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        @endif

        <div class="row">

                <div class="px-3 mb-3">
                <div class="card" style="width: 25rem;">
                    <div class="card-header text-white py-4"
                         style="background-color: {{ $colors[array_rand($colors)] }} !important;">
                        <a href="#"
                           class="mb-0">Product Lists</a>
                        <span class="d-block">Overall Product Lists</span>
                    </div>
                    <div class="card-body">

                        <p class="card-text heading-text text-secondary mb-0">
                            <i class="fa fa-check mr-2" aria-hidden="true"></i>
                            Last check {{ now()->subDays(rand(1,5))->format("M d, Y") }}
                        </p>
                        <p class="card-text heading-text text-secondary mb-0">
                            <i class="fa fa-file-text mr-2" aria-hidden="true" style="width: 1rem;"></i>
                            2 printouts made
                        </p>
                    </div>
                    <div class="card-footer py-3">
                        <a href="#" class="btn btn-success btn-sm">
                            <i class="fa fa-eye mr-2 "></i>
                            View Report
                        </a>
                        <a href="#" class="btn btn-outline-success btn-sm">
                            <i class="fa fa-print mr-2 "></i>
                            Print Report
                        </a>
                    </div>
                </div>
            </div>
                <div class="px-3 mb-3">
                    <div class="card" style="width: 25rem;">
                        <div class="card-header text-white py-4"
                             style="background-color: {{ $colors[array_rand($colors)] }} !important;">
                            <a href="#"
                               class="mb-0">Daily Sales</a>
                            <span class="d-block">Estimated Daily Sales and returns</span>
                        </div>
                        <div class="card-body">

                            <p class="card-text heading-text text-secondary mb-0">
                                <i class="fa fa-check mr-2" aria-hidden="true"></i>
                                Last check {{ now()->subDays(rand(1,5))->format("M d, Y") }}
                            </p>
                            <p class="card-text heading-text text-secondary mb-0">
                                <i class="fa fa-file-text mr-2" aria-hidden="true" style="width: 1rem;"></i>
                                5 printouts made
                            </p>
                        </div>
                        <div class="card-footer py-3">
                            <a href="#" class="btn btn-success btn-sm">
                                <i class="fa fa-eye mr-2 "></i>
                                View Report
                            </a>
                            <a href="#" class="btn btn-outline-success btn-sm">
                                <i class="fa fa-print mr-2 "></i>
                                Print Report
                            </a>
                        </div>
                    </div>
                </div>

                <div class="px-3 mb-3">
                <div class="card" style="width: 25rem;">
                    <div class="card-header text-white py-4"
                         style="background-color: {{ $colors[array_rand($colors)] }} !important;">
                        <a href="#"
                           class="mb-0">Monthly Sales</a>
                        <span class="d-block">Estimated Monthly Sales and returns</span>
                    </div>
                    <div class="card-body">

                        <p class="card-text heading-text text-secondary mb-0">
                            <i class="fa fa-check mr-2" aria-hidden="true"></i>
                            Last check {{ now()->subDays(rand(1,5))->format("M d, Y") }}
                        </p>
                        <p class="card-text heading-text text-secondary mb-0">
                            <i class="fa fa-file-text mr-2" aria-hidden="true" style="width: 1rem;"></i>
                            2 printouts made
                        </p>
                    </div>
                    <div class="card-footer py-3">
                        <a href="#" class="btn btn-success btn-sm">
                            <i class="fa fa-eye mr-2 "></i>
                            View Report
                        </a>
                        <a href="#" class="btn btn-outline-success btn-sm">
                            <i class="fa fa-print mr-2 "></i>
                            Print Report
                        </a>
                    </div>
                </div>
            </div>



        </div>
    </div>

@endsection
