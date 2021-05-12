@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">

    <div class="row ">
        <div class="col-md-6">
            <h1 class="mb-5">Manage Section</h1>


            <form action="{{ route('sections.update',$section)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Section Name</label>
                    <input type="text" class="form-control @error('section_name') is-invalid @enderror"
                        name="section_name"
                        value="@if ($errors->has('section_name')){{ old('section_name') }}@else{{ $section->section_name }}@endif">
                    @error('section_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="grade_level">Grade Level</label>
                    <select name="grade_level" id="" class="form-control">
                        <option value="11" @if($section->grade_level == 11) selected @endif>Grade 11</option>
                        <option value="12" @if($section->grade_level == 12) selected @endif>Grade 12</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="strand_id">Strand</label>
                    <select name="strand_id" id="" class="form-control">
                        @foreach ($strands as $strand)
                        <option value="{{ $strand->id}}" @if($section->strand->id == $strand->id) selected @endif
                            >{{   $strand->strand_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="strand_id">Teacher</label>
                    <select name="employee_id" id="" class="form-control">
                        @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id}}" @if ($section->employee->id == $teacher->id)
                            selected
                            @endif
                            >{{$teacher->full_name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success mt-5" name="submit">Update</button>
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