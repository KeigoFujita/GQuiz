@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">

    <div class="row ">
        <div class="col-md-6">
            <h1 class="mb-5 display-4 title">Add Class</h1>
            <form action="{{ route('schoolClass.store')}}" method="post">
                @csrf

                <div class="form-group">
                    <label for="class_code">Class Code</label>
                    <input type="text" class="form-control @error('class_code') is-invalid @enderror" name="class_code"
                        value="{{ old('class_code') }}">
                    @error('class_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="strand_id">Subject</label>
                    <select name="subject_id" id="" class="form-control tag-selector">
                        @foreach ($subjects as $subject)
                        <option value="{{ $subject->id}}">{{  $subject->subject_code ." | ". $subject->subject_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="employee_id">Lecturer</label>
                    <select name="employee_id" id="" class="form-control tag-selector">
                        @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id}}">{{   $teacher->full_name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="class_schedule">Schedule</label>
                    <input type="text" class="form-control @error('class_schedule') is-invalid @enderror"
                        name="class_schedule">
                    @error('class_schedule')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success mt-5" name="submit">Add Class</button>
            </form>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $('.tag-selector').select2();
</script>
@endsection

@section('custom-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection--single {
        height: 37px !important;
    }

    .select2-selection__rendered {
        line-height: 37px !important;
    }

    .select2-selection__arrow {
        height: 37px !important;
    }

    .form-group label {
        font-weight: bold;
    }
</style>
@endsection