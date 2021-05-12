@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 px-5">

    <div class="mb-5">
        <p class="display-4 title">Teachers</p>
    </div>
    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show">
        {{ session()-> get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif

    <div class="d-flex justify-content-start align-items-center mb-5">
        <a href="{{ route('employees.create') }}" class="btn btn-success">Add Teacher</a>
    </div>

    <table class="table table-bordered table-centered table-hover shadow-sm" id="table">
        <thead>
            <th width="5%">Image</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Classes</th>
            <th>Actions</th>
        </thead>
        <tbody>

            @foreach ($teachers as $teacher)
            <tr>
                <td>
                    <div class="portrait-sm" style="background-color: {{ $teacher->color }};">
                        <p class="default-font my-0">
                            {{ $teacher->two_initials }}</p>
                    </div>
                </td>
                <td>{{ $teacher->first_name }}</td>
                <td>{{ $teacher->middle_name }}</td>
                <td>{{ $teacher->last_name }}</td>
                <td>{{ $teacher->gender == "male" ? "Male": "Female" }}</td>
                <td>{{ $teacher->school_classes->count() }}</td>
                <td>
                    <a type="button" class="btn btn-success btn-sm"
                        href="{{route('employees.edit',$teacher->id)}}">Edit Data</a>
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
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $('#table').DataTable({
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