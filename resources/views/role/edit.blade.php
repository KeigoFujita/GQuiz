@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">

    <div class="row ">
        <div class="col-md-6">
            <h1 class="mb-5">Manage Role</h1>
            <form action="{{ route('roles.update',$role)}}" method="post" id="main_form">
                @csrf
                @method('PUT')


                <div class="form-group">
                    <label for="exampleInputPassword1">Role Name</label>
                    <input type="text" class="form-control @error('role_name') is-invalid @enderror" name="role_name"
                        value="@if ($errors->has('role_name')){{ old('role_name') }}@else{{ $role->role_name }}@endif">
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="department_name">Department</label>
                    <select name="department_id" id=""
                        class="form-control @error('department_id') is-invalid @enderror">
                        @foreach ($departments as $department)

                        @if ($department->id == 1)
                        <option value="{{ $department->id}}">None</option>
                        @else

                        <option value="{{ $department->id}}" @if ($errors->has('department_id'))
                            @if ($department->id == old('department_id'))
                            selected
                            @endif
                            @else
                            @if (isset($role->department) && $role->department->id ==
                            $department->id )
                            selected
                            @endif
                            @endif
                            @endif
                            >{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ "The department has already been taken." }}</strong>
                    </span>
                    @enderror
                </div>


            </form>
            <button type="submit" class="btn btn-success mt-5" name="submit" form="main_form">Update</button>
            <button class='btn btn-outline-danger mt-5 ml-1' data-toggle="modal"
                data-target="#exampleModalCenter">Delete</button>
        </div>

    </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you really want to delete this role? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <form action="{{ route('roles.destroy',$role)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" style="color:white">Delete Permanently</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection