@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">

    <div class="row ">
        <div>
            <h1 class="display-3 title mb-5">{{ $section->section_name }}</h1>
        </div>
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-6">
                    <h1 class="display-4 title" style="font-size:2rem">Assigned Classes</h1>
                </div>
                <div class="col-6">
                    <a href="{{ route('sections.show',$section) }}" class="btn btn-success btn-sm float-right">View
                        Section</a>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-3 px-0">


            @if ($assigned_classes->count() == 0)


            <table class="table table-bordered table-centered table-hover ">
                <thead>
                    <th>Class Code</th>
                    <th>Subject Name</th>
                    <th>Lecturer</th>
                    <th>Schedule</th>
                    <th>Actions</th>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div class="row justify-content-center align-items-center border shadow default-font mx-auto"
                style="height:350px; margin-top:-15px; width:100%;">
                <h4 class="font-weight-normal">No classes assigned</h4>
            </div>

            @else
            <table class="table table-bordered table-centered table-hover shadow-sm">
                <thead>
                    <th>Class Code</th>
                    <th>Subject Name</th>
                    <th>Lecturer</th>
                    <th>Schedule</th>
                    <th width="5%">Actions</th>
                </thead>
                <tbody>

                    @foreach ($assigned_classes as $assigned_class)
                    <tr>
                        <td>{{ $assigned_class->class_code }}</td>
                        <td>{{ $assigned_class->subject->subject_name }}</td>
                        <td>{{ $assigned_class->employee->full_name  }}</td>
                        <td>{{ $assigned_class->schedule }}</td>
                        <td>
                            <form action="{{route('sections.remove_assign_class')}}" method="post">
                                @csrf
                                <input type="hidden" name="section_id" value="{{ $section->id }}">
                                <input type="hidden" name="class_id" value="{{ $assigned_class->id }}">
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @endif
        </div>

        <h1 class="display-4 title mt-5" style="font-size:2rem">Other Classes</h1>
        <div class="container-fluid mt-3 px-0">

            @if ($not_assigned_classes->count() == 0)


            <table class="table table-bordered table-centered table-hover ">
                <thead>
                    <th>Class Code</th>
                    <th>Subject Name</th>
                    <th>Lecturer</th>
                    <th>Schedule</th>
                    <th>Actions</th>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div class="row justify-content-center align-items-center border shadow default-font mx-auto"
                style="height:350px; margin-top:-16px; width:100%;">
                <h4 class="font-weight-normal">No classes to assign</h4>
            </div>

            @else
            <table class="table table-bordered table-centered table-hover shadow-sm">
                <thead>
                    <th>Class Code</th>
                    <th>Subject Name</th>
                    <th>Lecturer</th>
                    <th>Schedule</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($not_assigned_classes as $not_assigned_class)
                    <tr>
                        <td>{{ $not_assigned_class->class_code }}</td>
                        <td>{{ $not_assigned_class->subject->subject_name }}</td>
                        <td>{{ $not_assigned_class->employee->full_name  }}</td>
                        <td>{{ $not_assigned_class->schedule }}</td>
                        <td>
                            <form action="{{route('sections.assign_class')}}" method="post">
                                @csrf
                                <input type="hidden" name="section_id" value="{{ $section->id }}">
                                <input type="hidden" name="class_id" value="{{ $not_assigned_class->id }}">
                                <button type="submit" class="btn btn-info btn-sm">Assign</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> --}}
<script>
    var classes = [];
    $('.tag-selector').select2();

</script>
@endsection

@section('custom-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> --}}

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