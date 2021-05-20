@extends('layouts.app')

@section('content')
    <div class="container-fluid p-5 main-content">
        <nav aria-label="breadcrumb" style="background-color:transparent;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('teachers.index') }}" class="text-info">Teachers</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Teacher</li>
            </ol>
        </nav>
        <div class="row ">

            <div class="col-md-12">

                <h1 class="display-4 title mb-5">Add Teacher</h1>

                @if (session()->has('success'))

                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session()->get('success') }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                @endif
                <form action="{{ route('employees.store') }}" method="post" id="form_main">
                    @csrf


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    name="first_name" value="{{ old('first_name') }}">
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
                                    name="middle_name" value="{{ old('middle_name') }}">

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
                                    name="last_name" value="{{ old('last_name') }}">

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
                                        name="mobile_number" value="{{ old('mobile_number') }}">
                                    @error('mobile_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="my-1 mr-2" for="gender">Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success mt-3 btn-sm" name="submit">Add Teacher</button>
                </form>
            </div>
        </div>
    </div>
    {{-- <div>

    @foreach ($roles as $role)
    <div>
        @if (collect(old('roles'))->contains($role->id))
        <h1>Selected</h1>
        @endif
    </div>
    @endforeach

</div> --}}
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
