@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 px-4">

    <div class="mb-4">
        <h1 class="display-4 title">Subjects</h1>
    </div>
    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show">
        {{ session()-> get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif
    <div class="d-flex align-items-center justify-content-start mb-2">
        <a href="{{ route('subjects.create') }}" class="btn btn-success">Add Subject</a>
    </div>
    <div class="table-responsive py-4">
        <table class="table table-bordered table-centered table-hover shadow-sm" id="table">
            <thead>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Description</th>
                <th>Actions</th>
            </thead>
            <tbody>

                @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->subject_code }}</td>
                    <td>{{ $subject->subject_name }}</td>
                    <td>{{ $subject->subject_description }}</td>
                    <td>

                        <a type="button" class="btn btn-success btn-sm"
                            href="{{route('subjects.edit',$subject->id)}}">Edit</a>

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