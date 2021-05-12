@extends('layouts.teacher-app')

@section('content')

<div class="container-fluid py-5 px-5 font-inter">
    
    
    <div class="container rounded px-4 pt-3 pb-5 mb-3 " style="background-color: {{ $colors[array_rand($colors)] }} !important;">
        <p class="title text-white mb-0">{{ $class->class_code }}</p>
        <p class="text-white">{{ $class->schedule }}</p>
    </div>

    <div class="container px-0">
        @if (session()->has('success'))

        <div class="alert alert-success alert-dismissible fade show">
            {{ session()-> get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        @endif

        @if (session()->has('danger'))

        <div class="alert alert-danger alert-dismissible fade show">
            {{ session()-> get('danger')}}
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
    </div>

    <div class="container px-0">
        <div class="row no-gutters">
            <div class="col-2">
              <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-students" role="tab" aria-controls="home">
                    <i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i>
                    Students
                </a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-quizzes" role="tab" aria-controls="profile">
                    <i class="fa fa-pencil mr-2" aria-hidden="true"></i>
                    Quizzes
                </a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">
                    <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                    Settings
                </a>
              </div>
            </div>
            <div class="col-10">
              <div class="tab-content pl-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-students" role="tabpanel" aria-labelledby="list-home-list">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-2 pb-3">
                                <div class="d-flex justify-content-end align-items-center mb-5">
                                    <button class="btn btn-success btn-sm px-3 py-2" data-toggle="modal"
                                    data-target="#add-modal">
                                        <i class="fa fa-user-plus mr-2" aria-hidden="true"></i>
                                        Invite Student
                                    </button>
                                </div>
                                <table class="table table-bordered table-centered table-hover shadow-sm " style="margin-bottom:100px" id="table">
                                    <thead>
                                        <th>Course</th>
                                        <th>Student Number</th>
                                        <th>Year</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th width="5%">Actions</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        <tr>
                                            <td>{{$student->strand->strand_name}}</td>
                                            <td>{{ $student->lrn }}</td>
                                            <td>
                                            @php
                            
                                            if($student->grade_level == "1"){
                                                echo "1st Year";
                                            }else if($student->grade_level == "2"){
                                                echo "2nd Year";
                                            }else{
                                                echo "3rd Year";
                                            }
                                            @endphp
                                            </td>
                                            <td>{{ $student->first_name }}</td>
                                            <td>{{ $student->middle_name }}</td>
                                            <td>{{ $student->last_name }}</td>
                                            <td>
                            
                                                <div class="d-flex align-items-center">
                                                    <form action="{{ route('teachers.my-classes-remove-student',[$class,$student]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                    </form>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-quizzes" role="tabpanel" aria-labelledby="list-profile-list">
                    <div class="card">
                        <div class="card-body"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-messages-list">
                    <div class="card">
                        <div class="card-body"></div>
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade font-inter" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Invite Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="class_code">Student Name or Student ID</label>
                    <input type="text" class="form-control" name="class_code" id="search">
                    <input type="hidden" class="form-control" name="class_id" value="{{ $class->id }}">
                </div>
                <div  id="result-set"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
        });

        $('#search').on('keypress',function(e){
            if(e.which == 13) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.post("/teacher/search-student",{
                    'query' : $('#search').val(),
                    'class' : $('input[name="class_id"]').val()
                }, function(data, status){
                    $('#result-set').empty();
                    $('#result-set').append(data);
                });
            }
        })
    } );
</script>
@endsection
@section('custom-css')

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">


<style>
    .title{
        font-size: 2rem;
        text-transform: uppercase;
        letter-spacing: -0.01ch;
    }

    .card-header a{
        font-size: 2rem;
        text-decoration: none;
        color: white !important;
        margin-bottom: 0;
    }

    .card-header i{
        font-size: 1rem;
        text-decoration: none;
        color: white !important;
    }

    .card-header a:hover{
        border-bottom: 2px solid white;
        color: white !important;
    }

    .font-inter{
        font-family: 'Inter', sans-serif !important;
    }

</style>
@endsection