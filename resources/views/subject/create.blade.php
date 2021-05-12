@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">

    <div class="row ">
        <div class="col-md-6">
            <h1 class="mb-5 display-4 title">Add Subject</h1>



            <form action="{{ route('subjects.store')}}" method="post">
                @csrf

                <div class="form-group">
                    <label for="subject_code">Subject Code</label>
                    <input type="text" class="form-control @error('subject_code') is-invalid @enderror"
                        name="subject_code" value="{{ old('subject_code') }}">
                    @error('subject_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="subject_name">Subject Name</label>
                    <input type="text" class="form-control @error('subject_name') is-invalid @enderror"
                        name="subject_name" value="{{ old('subject_name') }}">
                    @error('subject_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="subject_description">Subject Description</label>
                    <input type="text" class="form-control @error('subject_description') is-invalid @enderror"
                        name="subject_description" value="{{ old('subject_description') }}">
                    @error('subject_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success mt-5" name="submit">Submit</button>
            </form>
        </div>

    </div>
</div>
@endsection