@extends('layouts.student-app')

@section('content')
    <div class="container-fluid p-5 main-content">
        @if (Auth::user()->role == 'employee' && Auth::user()->employee->is_teacher == false)
            <nav aria-label="breadcrumb" style="background-color:transparent;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('students.index') }}" class="text-info">Students</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $student->full_name }}</li>
                </ol>
            </nav>
        @endif

        @if (Auth::user()->role == 'employee' && Auth::user()->employee->is_teacher)
            <nav aria-label="breadcrumb" style="background-color:transparent;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('sections.show', $student->section) }}"
                            class="text-info">{{ $student->section->section_name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $student->full_name }}</li>
                </ol>
            </nav>
        @endif

        <div class="row">

            <div class="col-12">


                <div class="container-fluid mt-1">
                    @if (Auth::user()->role == 'employee')
                        <div class="row justify-content-end">
                            <a href="{{ route('students.clearance', $student) }}"
                                class="btn btn-outline-success btn-sm mr-1">
                                Print Clearance
                            </a>
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-success btn-sm">
                                Edit Information
                            </a>
                        </div>
                    @endif
                </div>

            </div>
            <div class="col-12">
                {{-- Tabs --}}
                <div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="classes-tab" data-toggle="tab" href="#classes" role="tab"
                                aria-controls="classes" aria-selected="true">

                                @if (Auth::user()->role == 'student')
                                    My Classes
                                @else
                                    Classes
                                @endif

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab"
                                aria-controls="other" aria-selected="false">
                                @if (Auth::user()->role == 'student')
                                    My Information
                                @else
                                    Other Information
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Tab Content --}}
                <div class="tab-content" id="myTabContent">

                    {{-- Classes --}}
                    @include('student.partials.classes')

                    {{-- My Information --}}
                    <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                        <table class="table table-bordered table-centered   table-hover shadow-sm custom-table">
                            <thead>
                                <th width="20%" scope="col">Name</th>
                                <th scope="col">Details</th>

                            </thead>
                            <tbody>

                                <tr>
                                    <td scope="row" data-label="Name">Year Level</td>
                                    <td data-label="Year Level">{{ $student->grade_level == 1 ? '1st year' : '3rd year' }}</td>
                                </tr>

                                <tr>
                                    <td data-label="Name">Course</td>
                                    <td data-label="Details">
                                        {{ $student->strand->strand_name . ' | ' . $student->strand->strand_description }}
                                    </td>
                                </tr>

                                <tr>
                                    <td data-label="Name">Gender</td>
                                    <td data-label="Details">{{ $student->gender == 'female' ? 'Female' : 'Male' }}</td>
                                </tr>


                                <tr>
                                    <td data-label="Name">First Name</td>
                                    <td data-label="Details">{{ $student->first_name }}</td>
                                </tr>

                                <tr>
                                    <td data-label="Name">Middle Name</td>
                                    <td data-label="Details">{{ $student->middle_name }}</td>
                                </tr>

                                <tr>
                                    <td data-label="Name">Last Name</td>
                                    <td data-label="Details">{{ $student->last_name }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>


            </div>



        </div>
    </div>
@endsection

@section('scripts')
@endsection

@section('custom-css')
    <style>
        .portrait {
            height: 180px;
            width: 180px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .portrait .initial {
            margin: 0px;
            font-size: 5rem;
            color: white;
            line-height: 5rem;
            margin-top: -5px;
            font-weight: 300;
        }

        @media (max-width: 768px) {

            .main {
                margin-top: 50px;
            }

        }


        @media only screen and (max-width: 760px) {

            .custom-table {
                border: 0;
            }

            .custom-table caption {
                font-size: 0.5em;
            }

            .custom-table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            .custom-table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }

            .custom-table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: 1em;
                text-align: right;
            }

            .custom-table td::before {

                position: relative;
                top: 4px;
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
                font-size: 0.8em;
            }

            .custom-table td:last-child {
                border-bottom: 0;
            }

        }

    </style>
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
