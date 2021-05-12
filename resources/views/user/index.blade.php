@extends('layouts.app')

@section('content')
<div class="container-fluid p-5">

    <div class="mb-5">
        <h1 class="display-4 title">Accounts</h1>
    </div>
    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show">
        {{ session()-> get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif


    @error('email')
    <div class="alert alert-danger alert-dismissible fade show">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    <div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="students-tab" data-toggle="tab" href="#students" role="tab"
                    aria-controls="students" aria-selected="true">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="employees-tab" data-toggle="tab" href="#employees" role="tab"
                    aria-controls="employees" aria-selected="false">Teachers</a>
            </li>
        </ul>
    </div>

    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="students" role="tabpanel" aria-labelledby="classes-tab">

            <div class="mt-5">
                {{-- <div class="row px-3 mb-5">
                    <button class="btn btn-success btn-sm">Add Account</button>
                </div> --}}
                <table class="table table-bordered table-centered table-hover shadow-sm " style="margin-bottom:100px"
                    id="table">
                    <thead>
                        <th>Image</th>
                        <th>Course</th>
                        <th>Student Number</th>
                        <th>Year Level</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>

                        <th width="5%">Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>
                                <div class="portrait-sm" style="background-color: {{ $student->color }};">
                                    <p class="default-font my-0">
                                        {{ $student->two_initials }}</p>
                                </div>
                            </td>
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
                            <td>{{ $student->gender == "male" ? "Male": "Female" }}</td>
                            <td>
                                @if (isset($student->user))
                                {{-- <button class='btn btn-outline-success btn-sm' data-toggle="modal"
                                    data-target="#manageAccount">Manage Account</button> --}}
                                <span class="badge badge-success section-name" data-toggle="tooltip"
                                    data-placement="top"
                                    title="
                                    {{-- {{ $student->user->created_at }} --}}
                                    Verified at {{ \Carbon\Carbon::parse($student->user->created_at)->format('m/d/Y') }}">Account
                                    Verified</span>
                                @else
                                <button class='btn btn-outline-danger btn-sm' data-toggle="modal"
                                    data-target="#setupAccount" data-student_id="{{ $student->id }}"
                                    onclick="settype('student')">Setup
                                    Account</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="employees" role="tabpanel" aria-labelledby="classes-tab">
            <div class="table-responsive mt-5">
                <table class="table table-bordered table-centered table-hover shadow-sm" id="table2">
                    <thead>
                        <th width="5%">Image</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Mobile Number</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>

                        @foreach ($employees as $employee)
                        <tr>
                            <td>
                                <div class="portrait-sm" style="background-color: {{ $employee->color }};">
                                    <p class="default-font my-0">
                                        {{ $employee->two_initials }}</p>
                                </div>
                            </td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->middle_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ "+63" . $employee->mobile_number }}</td>
                            <td>{{ $employee->gender == "male" ? "Male": "Female" }}</td>
                            <td>
                                @if (isset($employee->user))
                                <span class="badge badge-success section-name" data-toggle="tooltip"
                                    data-placement="top"
                                    title="Verified at {{ \Carbon\Carbon::parse($employee->user->created_at)->format('m/d/Y') }}">
                                    Account Verified
                                </span>
                                {{-- <button class='btn btn-outline-success btn-sm' data-toggle="modal"
                                        data-target="#manageAccount">Manage Account</button> --}}
                                @else
                                <button class='btn btn-outline-danger btn-sm' data-toggle="modal"
                                    data-target="#setupAccount" data-employee_id="{{ $employee->id }}"
                                    onclick="settype('employee')">Setup
                                    Account</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="setupAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('users.store')}}" method="post" id="setup_form">
                <input type="hidden" name="account_type" value="student">
                <input type="hidden" name="student_id" value="">
                @csrf
            </form>

            <form action="{{ route('users.store')}}" method="post" id="setup_form_employee">
                <input type="hidden" name="account_type" value="employee">
                <input type="hidden" name="employee_id" value="">
                @csrf
            </form>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Setup Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" required id="email" form="setup_form">
                    <span class="invalid-feedback" role="alert" id="email_error">
                        <strong></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" required id="password"
                        form="setup_form">
                    <span class="invalid-feedback" role="alert" id="password_error">
                        <strong></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label for="">Retype Password</label>
                    <input type="password" class="form-control" name="repassword" required id="repassword"
                        form="setup_form">
                    <span class="invalid-feedback" role="alert" id="repassword_error">
                        <strong></strong>
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" style="color:white" id="submit_setup_form">Create
                    Account</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    var valid_email = false;
    var valid_password = false;
    var valid_repassword = false;

    var acc_type = 'student';

    function settype(str){
        console.log(str);
        this.acc_type = str;


        if(str == 'student'){
            $('input[name=email]').attr('form','setup_form');
            $('input[name=username]').attr('form','setup_form');
            $('input[name=password]').attr('form','setup_form');
        }else{

            $('input[name=email]').attr('form','setup_form_employee');
            $('input[name=username]').attr('form','setup_form_employee');
            $('input[name=password]').attr('form','setup_form_employee');

        }
    }

    var errors = [];
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $('#table').DataTable({
    });

    $('#table2').DataTable({
    });

    $('#setupAccount').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var student_id = button.data('student_id');
        var employee_id = button.data('employee_id');
        $('input[name=employee_id]').val(employee_id);
        $('input[name=student_id]').val(student_id);
      //  console.log(student_id);
    });


    $('#setupAccount').find('#email').on('keyup',function(){

        var email_val = $(this).val();
        var error = $('#setupAccount').find('#email_error');
       
        if(validateEmail(email_val)){
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
            error.html('');
            valid_email = true;
        }else{
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
            error.html('Invalid email given');
            valid_email = false;
        }

    })


    $('#setupAccount').find('#password').on('keyup',function(){

        var password_val = $(this).val();
        var error = $('#setupAccount').find('#password_error');

        if(validatePassword(password_val)){
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
            error.html('');
            valid_password = true;
        }else{
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
            
            errors.forEach(function(value){
                error.html(value + "<br>");
            })
            valid_password = false;
        }

    })


    $('#setupAccount').find('#repassword').on('keyup',function(){

        var password = $('#setupAccount').find('#password').val();
        var repassword_val = $(this).val();
        var error = $('#setupAccount').find('#repassword_error');

        if( password == repassword_val){
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
            error.html('');
            valid_repassword = true;
        }else{
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
            error.html("Passwords do not match");
            valid_repassword = false;
        }

    })


    function validatePassword(val) {
        errors = [];
        if (val.length < 8) {
            errors.push("Your password must be at least 8 characters");
        }
        if (val.search(/[a-z]/i) < 0) {
            errors.push("Your password must contain at least one letter."); 
        }
        if (val.search(/[0-9]/) < 0) {
            errors.push("Your password must contain at least one digit.");
        }
        if (errors.length > 0) {
            return false;
        }
         return true;
    }   


    function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
    }


    $('#submit_setup_form').click(function(){
        if(valid_email && valid_password && valid_repassword){
           if(acc_type == 'student'){
                $('#setup_form').submit();
           }else{
            $('#setup_form_employee').submit();
            console.log('im called')
           }
        }
    });


</script>
@endsection
@section('custom-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<style>
    .section-name {
        font-size: 0.8rem !important;
    }

    .select2-selection--single {
        height: 35px !important;
    }

    .select2-selection__rendered {
        line-height: 35px !important;
    }

    .select2-selection__arrow {
        height: 35px !important;
    }
</style>
@endsection