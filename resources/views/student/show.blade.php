@extends('layouts.app')

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
                            <a class="nav-link" id="clearance-tab" data-toggle="tab" href="#clearance" role="tab"
                                aria-controls="clearance" aria-selected="false">
                                @if (Auth::user()->role == 'student')
                                    My Pending Quiz
                                @else
                                    Pending Quiz
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
                    <div class="tab-pane fade show active" id="classes" role="tabpanel" aria-labelledby="classes-tab">

                        <h1 class="display-4 mt-3 mb-3 default-font" style="font-size:2rem;">
                            @if (Auth::user()->role == 'student')
                                My Classes
                            @else
                                Classes
                            @endif
                        </h1>


                        <div class="container-fluid py-5 px-5 font-inter">

                            <div class="w-100 card shadow-sm">
                                <div class="card-header py-3"></div>
                                <div class="card-body">
                                    <img src="https://img.icons8.com/cotton/344/empty-box.png" class="d-block mx-auto mb-3"
                                        alt="" style="width: 100px;">
                                    <p class="text-center" style="font-size: 1.5rem;">You don't have any classes
                                        yet!</p>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="clearance" role="tabpanel" aria-labelledby="clearance-tab">

                        Pending Quiz

                    </div>
                    {{-- Others --}}
                    <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                        <table class="table table-bordered table-centered   table-hover shadow-sm custom-table">
                            <thead>
                                <th width="20%" scope="col">Name</th>
                                <th scope="col">Details</th>

                            </thead>
                            <tbody>

                                <tr>
                                    <td scope="row" data-label="Name">Year Level</td>
                                    
                                </tr>

                                <tr>
                                    <td data-label="Name">Course</td>
                                    <td data-label="Details">
                                        {{ $student->strand->strand_name . ' | ' . $student->strand->strand_description }}
                                    </td>
                                </tr>

                                {{-- <tr>
                                    <td data-label="Name">Section</td>
                                    <td data-label="Details"></td>
                                </tr> --}}
{{-- 
                                <tr>
                                    <td data-label="Name">Adviser</td>
                                    <td data-label="Details"></td>
                                </tr> --}}

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



                                <tr>
                                    <td data-label="Name">Subjects</td>
                                    <td data-label="Details"></td>
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
@endsection
