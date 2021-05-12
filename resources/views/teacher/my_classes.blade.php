@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 px-5">

    <div class="mb-5">
        <h1 class="display-4 title px-3">My Classes</h1>
    </div>
    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show">
        {{ session()-> get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif
    <div class="container-fluid justify-content-center">

        <div class="container-fluid px-0 table-responsive py-5">
            <table class="table table-bordered table-centered table-hover shadow-sm" id="table">
                <thead>
                    <th>Class Code</th>
                    <th>Subject Name</th>
                    <th>Lecturer</th>
                    <th>Schedule</th>
                    <th>Requirements</th>
                    <th width="5%">Actions</th>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                    <tr>
                        <td>{{ $class->class_code }}</td>
                        <td>{{ $class->subject->subject_name }}</td>
                        <td>{{ $class->employee->full_name  }}</td>
                        <td>{{ $class->schedule }}</td>
                        <td>{{ $class->class_requirements->count()  }} </td>
                        <td>
                            <a type="button" class="btn btn-success btn-sm"
                                href="{{route('teachers.schoolClass',$class)}}">Manage</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
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
</style>
@endsection