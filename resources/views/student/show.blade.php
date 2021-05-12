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

        <div class="row main">
            <div class="col-md-2">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="portrait" style="background-color: {{ $color }}">
                        <p class="initial default-font ">{{ $student->two_initials }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <h1 class="display-3 title student-name">{{ $student->full_name }}</h1>
                <p class="adviser student-lrn">{{ $student->lrn }}</p>
            </div>
        </div>

        <div class="row">

            <div class="col-12">


                <div class="container-fluid mt-5">
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
                                    My Clearance
                                @else
                                    Clearance
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

                        @if (!isset($student->section))
                            <div class="table-responsive">
                                <table class="table table-bordered table-centered  table-hover custom-table mb-0">
                                    <thead>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Teacher</th>
                                        <th scope="col">Schedule</th>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div class="align-items-center justify-content-center h-15 border border-top-0"
                                    style="display:flex;">
                                    <h1 class="default-font display-4" style="font-size:2rem;">No class</h1>
                                </div>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-centered   table-hover shadow-sm custom-table">
                                    <thead>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Teacher</th>
                                        <th scope="col">Schedule</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($student->section->school_classes as $class)
                                            <tr>
                                                <td scope="row" data-label="Subject">{{ $class->subject->subject_name }}
                                                </td>
                                                <td data-label="Teacher">{{ $class->employee->full_name }}</td>
                                                <td data-label="Schedule">{{ $class->schedule }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>


                    {{-- Class Clearance --}}


                    <div class="tab-pane fade" id="clearance" role="tabpanel" aria-labelledby="clearance-tab">


                        <h1 class="display-4 mt-5 mb-3 default-font" style="font-size:2rem;">Subject Clearance</h1>
                        @if ($class_clearances)
                            <div class="container-fluid px-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-centered table-hover mx-0 mb-0 custom-table">
                                        <thead>
                                            <th>Subject</th>
                                            <th>Lecturer</th>
                                            <th>Requirement</th>
                                            <th>Details</th>
                                            <th>Deadline</th>
                                            <th>Status</th>
                                        </thead>
                                    </table>
                                    <div class="align-items-center justify-content-center h-15 border border-top-0"
                                        style="display:flex;">
                                        <h1 class="default-font display-4" style="font-size:2rem;">No clearance</h1>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-centered table-hover shadow-sm  custom-table">
                                    <thead>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Lecturer</th>
                                        <th scope="col">Requirement</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Status</th>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        @endif

                        <h1 class="display-4 mt-5 mb-3 default-font" style="font-size:2rem;">Adviser Clearance</h1>
                        @if ($student->adviser_clearance->count() == 0)
                            <div class="container-fluid px-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-centered table-hover mx-0 mb-0 custom-table">
                                        <thead>
                                            <th>Subject</th>
                                            <th>Lecturer</th>
                                            <th>Requirement</th>
                                            <th>Details</th>
                                            <th>Deadline</th>
                                            <th>Status</th>
                                        </thead>
                                    </table>
                                    <div class="align-items-center justify-content-center h-15 border border-top-0"
                                        style="display:flex;">
                                        <h1 class="default-font display-4" style="font-size:2rem;">No clearance</h1>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-centered table-hover shadow-sm custom-table">
                                    <thead>
                                        <th scope="col">Section</th>
                                        <th scope="col">Adviser</th>
                                        <th scope="col">Status</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row" data-label="Section"></td>
                                            <td data-label="Adviser"></td>
                                            <td data-label="Status">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif


                        <h1 class="display-4 mt-5 mb-3 default-font" style="font-size:2rem;">Department Clearance</h1>
                        @if (isset($department_clearances))
                            <div class="container-fluid px-0">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-centered table-hover shadow-sm custom-table">
                                        <thead>
                                            <th>Department</th>
                                            <th>Officer</th>
                                            <th>Requirement</th>
                                            <th>Details</th>
                                            <th>Deadline</th>
                                            <th>Status</th>
                                        </thead>
                                    </table>
                                    <div class="align-items-center justify-content-center h-15 border border-top-0"
                                        style="display:flex; margin-top:-20px">
                                        <h1 class="default-font display-4" style="font-size:2rem;">No clearance</h1>
                                    </div>
                                </div>

                            </div>
                        @else
                            <div class="table-resposive">
                                <table class="table table-bordered table-centered table-hover shadow-sm custom-table">
                                    <thead>
                                        <th scope="col">Department</th>
                                        <th scope="col">Officer</th>
                                        <th scope="col">Requirement</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Status</th>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        @endif

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
                                    <td scope="row" data-label="Name">Grade Level</td>
                                    <td data-label="Details">
                                        {{ $student->grade_level == '11' ? 'Grade 11' : 'Grade 12' }}
                                    </td>
                                </tr>

                                <tr>
                                    <td data-label="Name">Strand</td>
                                    <td data-label="Details">
                                        {{ $student->strand->strand_name . ' | ' . $student->strand->strand_description }}
                                    </td>
                                </tr>

                                <tr>
                                    <td data-label="Name">Section</td>
                                    <td data-label="Details"></td>
                                </tr>

                                <tr>
                                    <td data-label="Name">Adviser</td>
                                    <td data-label="Details"></td>
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
