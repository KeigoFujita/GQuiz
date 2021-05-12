@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 px-5">

    <div class="mb-5">
        <h1 class="display-4 title">Sections</h1>
    </div>
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
    <div class="d-flex justify-content-start align-items-center mb-3">
        <a href="{{ route('sections.create') }}" class="btn btn-success">Add Section</a>
    </div>
    <div class="table-responsive py-3">
        <table class="table table-bordered table-centered table-hover shadow-sm" id="table">
            <thead>
                <th>Section Name</th>
                <th width="15%">Grade Level</th>
                <th width="20%">Strand</th>
                <th>Adviser</th>
                <th>Students</th>
                <th>Classes</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @if(isset($sections))
                @foreach ($sections as $section)
                <tr>
                    <td>{{ $section->section_name }}</td>
                    <td>{{ $section->grade_level == "11" ? "Grade 11" : "Grade 12"  }}</td>
                    <td>{{ $section->strand->strand_name }}</td>
                    <td>{{ $section->employee['full_name'] }}</td>
                    <td>{{ $section->students_count }}  </td>
                    <td>{{ $section->school_classes_count }} </td>
                    <td>
                        <div class="flex" style="display:inline-block;">
                            <a type="button" class="btn btn-success btn-sm"
                                href="{{route('sections.show',$section->id)}}">View</a>
                            <a type="button" class="btn btn-info btn-sm"
                                href="{{route('sections.edit',$section->id)}}">Edit</a>
                        </div>

                        <div class="dropdown show" style="display:inline-block">
                            <a class="btn btn-secondary dropdown-toggle btn-sm" href="#" role="button"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                More
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item text-success"
                                    href="{{ route('sections.clearances',$section) }}">Manage Clearance</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
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