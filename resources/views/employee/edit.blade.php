@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">
    <nav aria-label="breadcrumb" style="background-color:transparent;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('teachers.index') }}" class="text-info">Teachers</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $employee->full_name }}</li>
        </ol>
    </nav>
    <div class="row ">
        <div class="col-md-12">
            <h1 class="display-4 title mb-5">Edit Teacher</h1>
            <form action="{{ route('employees.update',$employee)}}" method="post" id="form_main">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                name="first_name"
                                value="@if ($errors->has('first_name')){{ old('first_name') }}@else{{ $employee->first_name }}@endif">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Middle Name</label>
                            <input type="text" class="form-control  @error('middle_name') is-invalid @enderror"
                                name="middle_name"
                                value="@if ($errors->has('middle_name')){{ old('middle_name') }}@else{{ $employee->middle_name }}@endif">

                            @error('middle_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Last Name</label>
                            <input type="text" class="form-control  @error('last_name') is-invalid @enderror"
                                name="last_name"
                                value="@if ($errors->has('last_name')){{ old('last_name') }}@else{{ $employee->last_name }}@endif">

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="mobile_number">Mobile Number</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+63</div>
                                </div>
                                <input type="text" class="form-control  @error('mobile_number') is-invalid @enderror"
                                    name="mobile_number"
                                    value="@if ($errors->has('mobile_number')){{ old('mobile_number') }}@else{{ $employee->mobile_number }}@endif">
                                @error('mobile_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="my-1 mr-2" for="gender">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="male" {{ $employee->gender  == 'male' ? "selected":""}}>Male</option>
                                <option value="female" {{  $employee->gender == 'female' ? "selected":""}}>Female
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-5" name="submit">Update</button>
                <button type="submit" class="btn btn-danger mt-5" name="submit" form="delete-form">Delete</button>
            </form>
            <form action="{{ route('employees.destroy',$employee) }}" method="POST" id="delete-form">
                @csrf
                @method('DELETE')
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
    .select2-selection__choice {
        border-radius: 0px !important;
        background-color: #3490DC !important;
        color: white !important;
        border: none !important;
    }

    .select2-selection__choice__remove {
        margin-right: 5px !important;
        color: white !important;
    }

    .form-group label {
        font-weight: bold;
    }
</style>
@endsection
