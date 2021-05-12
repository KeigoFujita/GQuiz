@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">

    <div class="row ">
        <div class="col-md-6">
            <h1 class="mb-5">Add Role</h1>
            <form action="{{ route('roles.store')}}" method="post">
                @csrf


                <div class="form-group">
                    <label for="exampleInputPassword1">Role Name</label>
                    <input type="text" class="form-control @error('role_name') is-invalid @enderror" name="role_name"
                        value="{{ old('role_name') }}">
                    @error('role_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="department_name">Department</label>
                    <select name="department_id" id="" class="form-control">
                        @foreach ($departments as $department)
                        @if ($department->id == 1)
                        <option value="{{ $department->id}}">None</option>
                        @else
                        <option value="{{ $department->id}}">{{   $department->department_name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success mt-5" name="submit">Submit</button>
            </form>
        </div>

    </div>
</div>
@endsection