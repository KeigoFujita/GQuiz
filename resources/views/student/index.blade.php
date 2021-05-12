@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 px-5 ">

    <div class="mb-3">
        <h1 class="display-4 title">Students</h1>
    </div>
    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show">
        {{ session()-> get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif

    <div class="row justify-content-start mb-5 px-3">

        <a type="button" href="{{ route('students.create') }}" class="btn btn-success">
            Add Student
        </a>

    </div>

    <table class="table table-bordered table-centered table-hover shadow-sm " style="margin-bottom:100px" id="table">
        <thead>
            <th>Image</th>
            <th>Course</th>
            <th>Student Number</th>
            <th>Year</th>
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

                    <div class="d-flex align-items-center">
                        <a type="button" class="btn btn-success btn-sm mr-1"
                            href="{{route('students.edit',$student->id)}}">Edit</a>
                        <form action="{{ route('students.destroy',$student) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('#table').DataTable({
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection
@section('custom-css')
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

    .section-name {
        font-size: 0.8rem !important;
    }
</style>
@endsection