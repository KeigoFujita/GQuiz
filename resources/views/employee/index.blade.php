@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 px-5">
    <div class="row">
        <div class="mb-5">
            <h1 class="display-4 title px-3">Employees</h1>
        </div>
    </div>
    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show">
        {{ session()-> get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif
    <div class="d-flex justify-content-start align-items-center">
        <a href="{{ route('employees.create') }}" class="btn btn-success">Add Employee</a>
    </div>
    <div class="table-responsive py-5">
        <table class="table table-bordered table-centered table-hover shadow-sm" id="table">
            <thead>
                <th width="5%">Image</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Mobile Number</th>
                <th>Gender</th>
                <th width="20%">Roles</th>
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

                        @foreach ($employee->roles as $role)
                        <span class="badge badge-primary">{{ $role->role_name }}</span>
                        @endforeach

                    </td>
                    <td>

                        <a type="button" class="btn btn-success btn-sm"
                            href="{{route('employees.edit',$employee->id)}}">Manage</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('#table').DataTable({
    });

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
</style>
@endsection