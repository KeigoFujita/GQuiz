@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">

    <div class="row ">
        <div class="col-md-6">
            <h1 class="mb-5 display-4 title">Edit Subject</h1>
            @if (session()->has('success'))

            <div class="alert alert-success alert-dismissible fade show">
                {{ session()-> get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @endif
            <form action="{{ route('subjects.update',$subject)}}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="subject_code">Subject Code</label>
                    <input type="text" class="form-control @error('subject_code') is-invalid @enderror"
                        name="subject_code"
                        value="@if ($errors->has('subject_code')){{ old('subject_code') }}@else{{ $subject->subject_code }}@endif">
                    @error('subject_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="subject_name">Subject Name</label>
                    <input type="text" class="form-control @error('subject_name') is-invalid @enderror"
                        name="subject_name"
                        value="@if ($errors->has('subject_name')){{ old('subject_name') }}@else{{ $subject->subject_name }}@endif">
                    @error('subject_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="subject_description">Subject Description</label>
                    <input type="text" class="form-control @error('subject_description') is-invalid @enderror"
                        name="subject_description"
                        value="@if ($errors->has('subject_description')){{ old('subject_description') }}@else{{ $subject->subject_description }}@endif">
                    @error('subject_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success mt-5" name="submit">Update</button>
            </form>
        </div>

    </div>
</div>
@endsection