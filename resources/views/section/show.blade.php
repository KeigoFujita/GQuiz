@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">


    <div class="row ">
        <div class="col-md-12">
            <h1 class="display-3 title">{{ $section->section_name }}</h1>
            <p class="adviser">{{$section->employee['full_name']}}</p>

            <div class="mt-5">
                @if (session()->has('success'))

                <div class="alert alert-success alert-dismissible fade show">
                    {{ session()-> get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @endif

                @if (session()->has('error'))

                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session()-> get('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @endif
                <div class="container-fluid">

                    <div class="row justify-content-end">

                        @if (Auth::user()->employee->isTeacher == false)
                        <a type="button" href="{{ route('sections.assign_class_view',$section->id) }}"
                            class="btn btn-success btn-sm mr-1 add-class">Add Class</a>
                        @endif
                        <a type="button" href="{{ route('students.create') }}"
                            class="btn btn-success btn-sm mr-1 add-students">Add Student</a>


                        <div class="dropdown" style="display:inline-block">
                            <a class="btn btn-outline-success dropdown-toggle btn-sm" href="#" role="button"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                More Options
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item text-success"
                                    href="{{ route('sections.clearances',$section) }}">Manage Clearances</a>
                                @if (Auth::user()->employee->isTeacher == false)
                                <a type="button" href="{{ route('sections.edit',$section) }}"
                                    class="dropdown-item text-info">
                                    Edit Section
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div>
                    <ul class="nav nav-tabs w-100" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="classes-tab" data-toggle="tab" href="#classes" role="tab"
                                aria-controls="classes" aria-selected="true">Classes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="students-tab" data-toggle="tab" href="#students" role="tab"
                                aria-controls="students" aria-selected="false">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab"
                                aria-controls="other" aria-selected="false">Other Information</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="classes" role="tabpanel" aria-labelledby="classes-tab">
                        <div class="table-responsive">

                            @if ($section->school_classes->count() == 0)
                            <table class="table table-bordered table-centered   table-hover shadow-sm">
                                <thead>
                                    <th>Class Code</th>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                    <th>Schedule</th>
                                    <th>Actions</th>
                                </thead>
                            </table>
                            <div class="row justify-content-center align-items-center border shadow default-font mx-auto"
                                style="height:350px; margin-top:-15px; width:100%;">
                                <h4 class="font-weight-normal">No classes assigned</h4>
                            </div>
                            @else
                            <table class="table table-bordered table-centered   table-hover shadow-sm">
                                <thead>
                                    <th>Class Code</th>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                    <th>Schedule</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>

                                    @foreach ($section->school_classes as $class)
                                    <tr>
                                        <td>{{ $class->class_code }}</td>
                                        <td>{{ $class->subject->subject_name }}</td>
                                        <td>{{ $class->employee->full_name  }}</td>
                                        <td>{{ $class->schedule }}</td>
                                        <td>
                                        @if (Auth::user()->employee->isRegistrar || $class->employee->id == Auth::user()->employee->id)
                                            <a type="button" class="btn btn-success btn-sm"
                                                href="{{route('schoolClass.edit',$class->id)}}">
                                                Manage
                                            </a> 
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif


                        </div>
                    </div>
                    <div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="students-tab ">
                        <div class="py-5">

                            <div class="d-flex align-items-center justify-content-start mb-5">
                                <a href="{{ route('sections.clearance',$section) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-print mr-1"></i>
                                    Print Clearance
                                </a>
                            </div>

                            @if ($section->students->count() == 0)
                            <table class="table table-bordered table-centered table-hover shadow-sm">
                                <thead>
                                    <th width="5%">Image</th>
                                    <th>LRN</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th width="5%">Actions</th>
                                </thead>
                            </table>
                            <div class="row justify-content-center align-items-center border default-font mx-auto"
                                style="height:350px; margin-top:-15px; width:100%;">
                                <h4 class="font-weight-normal">No students</h4>
                            </div>
                            @else
                            <table class="table table-bordered table-centered table-hover shadow-sm mt-5 pt-5" id="table">
                                <thead>
                                    <th width="5%">Image</th>
                                    <th>LRN</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th width="5%">Actions</th>
                                </thead>
                                <tbody>
    
                                    @foreach ($section->students as $student)
    
                                    <tr>
                                        <td>
                                            <div class="portrait-sm" style="background-color: {{ $student->color }};">
                                                <p class="default-font my-0">
                                                    {{ $student->two_initials }}</p>
                                            </div>
                                        </td>
                                        <td>{{$student->lrn}}</td>
                                        <td>{{$student->first_name}}</td>
                                        <td>{{$student->middle_name}}</td>
                                        <td>{{$student->last_name}}</td>
                                        <td>{{$student->gender == "male" ? "Male": "Female"}}</td>
                                        <td>
                                            <a type=" button" class="btn btn-success btn-sm"
                                                href="{{ route('students.show',$student) }}">View</a>
                                        </td>
                                    </tr>
    
                                    @endforeach
    
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                        <table class="table table-bordered table-centered   table-hover shadow-sm">
                            <thead>
                                <th>Name</th>
                                <th>Details</th>

                            </thead>
                            <tbody>
                                <tr>
                                    <td>Grade Level</td>
                                    <td>{{ $section->grade_level == "11" ? "Grade 11" : "Grade 12"  }}</td>
                                </tr>

                                <tr>
                                    <td>Strand</td>
                                    <td>{{ $section->strand->strand_name . " | " . $section->strand->strand_description}}
                                    </td>
                                </tr>


                                <tr>
                                    <td>No of Students</td>
                                    <td>{{ $section->students->count()}}</td>
                                </tr>

                                <tr>
                                    <td>No of Classes</td>
                                    <td>{{ $section->school_classes->count() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>

    $(document).ready(function() {

        $('#table').DataTable({
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $('#select').select2({ width: '100%' });


        $('#myTab').click(function(e){
            
            var target = $(e.target);
            if (target.is('#students-tab')) {
                $('.add-students').css({
                "display":"inline-block"
                });
            }else{
                $('.add-students').css({
                "display":"none"
                });
            }


            if (target.is('#classes-tab')) {
                $('.add-class').css({
                "display":"inline-block"
                });
            }else{
                $('.add-class').css({
                "display":"none"
                });
            }

        });

    });

   

</script>
@endsection

@section('custom-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<style>
    .select2-selection--single {
        height: 35px !important;
    }

    .select2-selection__rendered {
        line-height: 35px !important;
    }

    .select2-selection__arrow {
        height: 35px !important;
    }

    .add-students {
        display: none;
    }

    #myTab {
        width: fit-content;
    }
    .section-name {
        font-size: 0.8rem !important;
    }
</style>
@endsection