@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-start">
              <a href="{{ route('sections.show',$section) }}" class="btn btn-outline-secondary">
                <i class="fa fa-arrow-left mr-1"></i>
                Back
              </a>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ route('sections.clearance.print',$section) }}" onclick="" class="btn btn-outline-main mr-1">Print</a>
                <a href="{{ route('sections.clearance.pdf',$section) }}" class="btn btn-main">Save as PDF</a>
            </div>
        </div>
    </div>

    @foreach ($students as $student)
    <div class="container border px-5 mt-5 pb-5" style="font-family: Arial, Helvetica, sans-serif;">
        <div class="d-flex justify-content-between align-items-center">
            <img src="/img/logo_xl.png" >
            <p class="font-weight-bold" style="font-size: 1.2rem;">STUDENT'S CLEARANCE</p>
        </div>
        <div class="d-flex justify-content-end">
            <table class="simple-table">
                <tr>
                    <td class="font-weight-bold">SCHOOL YEAR :</td>
                    <td>2018 - 2019</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">SEMESTER :</td>
                    <td>2ND</td>
                </tr>
            </table>
        </div>
        <div class="mt-4">
            <p class="font-weight-bold mb-3">STUDENT INFORMATION </p>
            <table class="table-space-half simple-table-border w-100">
                <tr>
                    <td colspan="3">
                        <div>
                            <span class=" font-weight-bold" style="font-size: 0.6rem">STUDENT NAME (Last, First, Middle)</span>
                            <p class="mb-0">{{ strtoupper($student->last_name . ", " . $student->first_name . " " . $student->middle_name) }}</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <span class=" font-weight-bold" style="font-size: 0.6rem">LRN</span>
                            <p class="mb-0">{{ $student->lrn }}</p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <span class=" font-weight-bold" style="font-size: 0.6rem">STRAND</span>
                            <p class="mb-0">{{ strtoupper($student->strand->strand_name) }}</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <span class=" font-weight-bold" style="font-size: 0.6rem">GRADE LEVEL</span>
                            <p class="mb-0">{{ $student->grade_level }}</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <span class=" font-weight-bold" style="font-size: 0.6rem">SECTION</span>
                            <p class="mb-0">{{ strtoupper($student->section->section_name) }}</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <span class=" font-weight-bold" style="font-size: 0.6rem">MOBILE NUMBER</span>
                            <p class="mb-0">09126126901</p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div>
                            <span class=" font-weight-bold" style="font-size: 0.6rem">ADDRESS</span>
                            <p class="mb-0">#29 ASTORIAS STREET BARANGGAY SAN JUAN, CAINTA RIZAL</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <span class=" font-weight-bold" style="font-size: 0.6rem">EMAIL</span>
                            <p class="mb-0">{{ isset($student->user->email) ? $student->user->email : 'N/A' }}</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="mt-4">
            <p class="font-weight-bold mb-3">SUBJECT CLEARANCE </p>
            <table class="table-space-half simple-table-border w-100">
                <thead class="text-center">
                    <th>SUBJECT NAME</th>
                    <th>PROFESSOR</th>
                    <th width="15%">STATUS</th>
                    <th width="15%">DATE</th>
                </thead>
                <tbody>
                    @foreach ($student->subject_clearances as $subject_clearance)
                    <tr>
                         <td>{{ $subject_clearance->subject->subject_name }}</td>
                         <td>{{ $subject_clearance->employee->full_name }}</td>
                         <td class="text-center">
                             <span class="badge badge-{{ $subject_clearance->status == 'complete' ? 'success' : 'danger'  }}">
                                  {{ $subject_clearance->status == 'complete' ? 'Complete' : 'Incomplete'  }}
                             </span>
                          </td>
                         <td class="text-center">{{ $subject_clearance->completion_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <p class="font-weight-bold mb-3">ADVISER CLEARANCE </p>
            <table class="table-space-half simple-table-border w-100">
                <thead class="text-center">
                    <th>ADVISER</th>
                    <th width="15%">STATUS</th>
                    <th width="15%">DATE</th>
                </thead>
                <tbody>
                    <tr>
                         <td>{{ $student->section->adviser->full_name }}</td>
                         <td class="text-center">
                            <span class="badge badge-{{ $student->adviser_clearance->status == 'complete' ? 'success' : 'danger'  }}">
                                {{ $student->adviser_clearance->status == 'complete' ? 'Complete' : 'Incomplete'  }}
                            </span>
                          </td>
                         <td class="text-center">{{ $student->adviser_clearance->status == 'complete' ? $student->adviser_clearance->updated_at->format('m-d-Y') : 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <p class="font-weight-bold mb-3">DEPARTMENT CLEARANCE </p>
            <table class="table-space-half simple-table-border w-100">
                <thead class="text-center">
                    <th>DEPARTMENT</th>
                    <th>PERSONNEL</th>
                    <th width="15%">STATUS</th>
                    <th width="15%">DATE</th>
                </thead>
                <tbody>
                    @foreach ($student->department_clearances as $department_clearance)
                    <tr>
                         <td>{{ $department_clearance['department_name'] }}</td>
                         <td>{{ $department_clearance['lecturer'] }}</td>
                         <td class="text-center">
                             <span class="badge badge-{{ $department_clearance['status'] == 'complete' ? 'success' : 'danger'  }}">
                                  {{ $department_clearance['status'] == 'complete' ? 'Complete' : 'Incomplete'  }}
                             </span>
                          </td>
                         <td class="text-center">{{ $department_clearance['completion_date'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-5 d-flex justify-content-between">
            <div>
                <p class="mb-5 font-weight-bold">Conforme:</p>
                <div class="text-center">
                    <p class="mb-0">{{ strtoupper($student->first_name . " " . $student->middle_name . " " . $student->last_name) }}</p>
                    <div class="signature-line"></div>
                    <p>Student's Signature and Date</p>
                </div>
            </div>
            <div>
                <p class="mb-5 font-weight-bold">Received by:</p>
                <div class="text-center">
                    <p class="mb-0">{{ strtoupper($registrar_name) }}</p>
                    <div class="signature-line"></div>
                    <p>Registrar's Signature and Date</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection

@section('scripts')
@endsection

@section('custom-css')
    <style>
        .simple-table td{
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .table-space-half td{
            padding-left: 0.5rem;
            padding-right: 0.5rem;
            padding-top: 0.2rem;
            padding-bottom: 0.2rem;
        }


        .simple-table-border tr, .simple-table-border td, .simple-table-border th{
            border: 1px solid black;
        }

        .signature-line{
            width: 350px;;
            height: 2px;
            background-color: black;
        }

        .btn-main{
            background-color: #0F3349;
            color: white !important;
        }

        .btn-outline-main{
            color: #0F3349;
            background-color: white !important;
            border: 2px solid rgba(3, 31, 49, 0.658);;
        }
    </style>
@endsection
