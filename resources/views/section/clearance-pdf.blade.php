<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <style>

        body{
            margin: 0;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
        }

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
            width: 250px;;
            height: 2px;
            background-color: black;
        }
        .container{
            /* width: 100%; */
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        .d-flex{
            display: flex;
        }

        .align-items-center{
            align-items: center;
        }

        .justify-content-center{
            justify-content: center;
        }

        .justify-content-between{
            justify-content: space-between;
        }
        .justify-content-end{
            justify-content: flex-end !important;
        }

        .px-5{
            padding-left: 3rem !important;
            padding-right: 3rem !important;
        }

        .pb-5{
            padding-bottom: 3rem !important;
        }
        
        .mt-4{
            margin-top: 1rem !important;
        }

        .mt-5{
            margin-top: 5rem !important;
        }
        .mb-5{
            margin-bottom: 5rem !important;
        }

        .mb-0 {
            margin-bottom: 0 !important;
        }

        .font-weight-bold{
            font-weight: bold !important;
        }

        .border{
            border: 1px solid #dee2e6!important;
        }

        table{
            display: table;
            border-collapse: collapse;
        }

        .w-100{
            width: 100%;
        }
        .text-center{
            text-align: center;
        }

        .badge{
            font-size: 0.75rem;
            display: inline-block;
            padding: .25em .4em;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            margin-left: 8px;
        }

        .badge-success{
            color: #fff;
            background-color: #28a745;
        }

        .badge-danger{
            color: #fff;
            background-color: #dc3545;
        }

    </style>
</head>
<body>
    @foreach ($students as $student)
    <div class="" style="font-family: Arial, Helvetica, sans-serif; font-size: 0.8rem;">
        <div style="width: 100%;">
            <img src="img/logo_xl.png" style="height: 130px; margin-top: 11px;" >
            <p class="font-weight-bold" style="font-size: 1rem; float: right; margin-top: 45px;">STUDENT'S CLEARANCE</p>
        </div>
        <div style="width: 100%; height: 50px;">
            <table class="simple-table" style="float: right;">
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
        <div style="">
            <p class="font-weight-bold mb-3">STUDENT INFORMATION </p>
            <table class="table-space-half simple-table-border" style="width: 100%; font-size: 0.8rem;" >
                <tr>
                    <td colspan="3">
                        <div>
                            <div class=" font-weight-bold" style="font-size: 0.6rem;">STUDENT NAME (Last, First, Middle)</div>
                            <p class="mb-0" style="margin-top: 0px;">{{ strtoupper($student->last_name . ", " . $student->first_name . " " . $student->middle_name) }}</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <span class=" font-weight-bold" style="font-size: 0.6rem">LRN</span>
                            <p class="mb-0" style="margin-top: 0px;">{{ $student->lrn }}</p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <span class=" font-weight-bold" style="font-size: 0.6rem">STRAND</span>
                            <p class="mb-0" style="margin-top: 0px;">{{ strtoupper($student->strand->strand_name) }}</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <span class=" font-weight-bold" style="font-size: 0.6rem">GRADE LEVEL</span>
                            <p class="mb-0" style="margin-top: 0px;">{{ $student->grade_level }}</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <span class=" font-weight-bold" style="font-size: 0.6rem">SECTION</span>
                            <p class="mb-0" style="margin-top: 0px;">{{ strtoupper($student->section->section_name) }}</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <span class=" font-weight-bold" style="font-size: 0.6rem">MOBILE NUMBER</span>
                            <p class="mb-0" style="margin-top: 0px;">09126126901</p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div>
                            <span class=" font-weight-bold" style="font-size: 0.6rem">ADDRESS</span>
                            <p class="mb-0" style="margin-top: 0px;">#29 ASTORIAS STREET BARANGGAY SAN JUAN, CAINTA RIZAL</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <span class=" font-weight-bold" style="font-size: 0.6rem">EMAIL</span>
                            <p class="mb-0" style="margin-top: 0px;">{{ isset($student->user->email) ? $student->user->email : 'N/A' }}</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="mt-4" style="width: 100%;">
            <p class="font-weight-bold mb-3">SUBJECT CLEARANCE </p>
            <table class="table-space-half simple-table-border" style="width: 100%;">
                <tr>
                    <td class="text-center font-weight-bold">SUBJECT NAME</td>
                    <td class="text-center font-weight-bold">PROFESSOR</td>
                    <td class="text-center font-weight-bold" width="15%">STATUS</td>
                    <td class="text-center font-weight-bold" width="15%">DATE</td>
                </tr>
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

        <div class="mt-4" style="width: 100%;">
            <p class="font-weight-bold mb-3">ADVISER CLEARANCE </p>
            <table class="table-space-half simple-table-border w-100" style="width: 100%;">
                <tr class="text-center">
                    <td class="text-center font-weight-bold">ADVISER</td>
                    <td class="text-center font-weight-bold" width="15%">STATUS</td>
                    <td class="text-center font-weight-bold" width="15%">DATE</td>
                </tr>
                <tr>
                        <td>{{ $student->section->adviser->full_name }}</td>
                        <td class="text-center">
                            <div class="badge badge-{{ $student->adviser_clearance->status == 'complete' ? 'success' : 'danger'  }}">
                                {{ $student->adviser_clearance->status == 'complete' ? 'Complete' : 'Incomplete'  }}
                            </div>
                        </td>
                        <td class="text-center">{{ $student->adviser_clearance->status == 'complete' ? $student->adviser_clearance->updated_at->format('m-d-Y') : 'N/A' }}</td>
                </tr>
            </table>
        </div>
        <div class="mt-4">
            <p class="font-weight-bold mb-3">DEPARTMENT CLEARANCE </p>
            <table class="table-space-half simple-table-border w-100" style="width: 100%">
                <tr class="text-center">
                    <td class="text-center font-weight-bold">DEPARTMENT</td>
                    <td class="text-center font-weight-bold">PERSONNEL</td>
                    <td class="text-center font-weight-bold" width="15%">STATUS</td>
                    <td class="text-center font-weight-bold" width="15%">DATE</td>
                </tr>
                @foreach ($student->department_clearances as $department_clearance)
                <tr>
                        <td>{{ $department_clearance->department_name }}</td>
                        <td>{{ $department_clearance->role->assigned_officer->full_name }}</td>
                        <td class="text-center">
                            <span class="badge badge-{{ $department_clearance->status == 'complete' ? 'success' : 'danger'  }}">
                                {{ $department_clearance->status == 'complete' ? 'Complete' : 'Incomplete'  }}
                            </span>
                        </td>
                        <td class="text-center">{{ $department_clearance->completion_date }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="mt-5">
            <table class="w-100">
                <tr>
                    <td>
                        <div style="margin:auto;">
                            <p class="mb-5 font-weight-bold">Conforme:</p>
                            <div class="text-center">
                                <p class="mb-0">{{ strtoupper($student->first_name . " " . $student->middle_name . " " . $student->last_name) }}</p>
                                <div class="signature-line" style="margin: auto;"></div>
                                <p>Student's Signature and Date</p>
                            </div>
                        </div>
                    </td>
                    <td width="20%"></td>
                    <td>
                        <div style="margin:auto;">
                            <p class="mb-5 font-weight-bold">Received by:</p>
                            <div class="text-center">
                                <p class="mb-0">{{ strtoupper($registrar_name) }}</p>
                                <div class="signature-line" style="margin: auto;"></div>
                                <p>Registrar's Signature and Date</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div style="page-break-before: always;"></div>
    @endforeach
    <script type="text/javascript"> try { this.print(); } catch (e) { window.onload = window.print; } </script>
</body>
</html>