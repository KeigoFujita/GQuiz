@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 px-5">
    <div class="mb-4">
        <h1 class="display-4 title">Strands</h1>
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
        <a href="{{ route('strands.create') }}" class="btn btn-success">Add Strand</a>
    </div>
    <table class="table table-bordered table-centered table-hover shadow-sm px-5">
        <thead>
            <th>Strand Name</th>
            <th>Description</th>
            <th>No. of Students</th>
            <th width="10%">Actions</th>
        </thead>
        <tbody>

            @foreach ($strands as $strand)
            <tr>
                <td>{{ $strand->strand_name }}</td>
                <td>{{ $strand->strand_description }}</td>
                <td>{{ $strand->students->count() }}</td>
                <td>
                    <a type="button" class="btn btn-success btn-sm"
                        href="{{route('strands.edit',$strand->id)}}">Manage</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection