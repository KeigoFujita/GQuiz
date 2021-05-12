@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">
    <div class="row ">
        <div class="col-md-12">
            <h1 class="display-4 title mb-0">{{ $department->department_name }}</h1>
        </div>

        <div class="col-md-12 mt-5" style="padding-bottom:400px;">

            @if (session()->has('success'))

            <div class="alert alert-success alert-dismissible fade show">
                {{ session()-> get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @endif

            @if (session()->has('error'))

            <div class="alert alert-danger alert-dismissible fade show">
                {{ session()-> get('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @endif


            <div class="row flex px-3 mb-2 mt-1" style="justify-content:space-between; align-items:center;">
                <p class="title default-font mb-0" style="font-size:2rem; font-weight:300;">Requirements</p>
                <div class="align-items-center" style="display:flex;">
                    <button type="submit" class="btn btn-success btn-sm mt-3" name="submit" data-toggle="modal"
                        data-target="#add-requirement-modal">Add Requirement</button>
                </div>
            </div>
            @error('requirement')
            <div class="alert alert-danger alert-dismissible fade show">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror

            @error('description')
            <div class="alert alert-danger alert-dismissible fade show">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror


            @if ($department->department_requirements->count() == 0)
            <table class="table table-bordered table-centered table-hover ">
                <thead>
                    <th>Requirement</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th width="15%">Actions</th>
                </thead>
            </table>
            <div class="row justify-content-center align-items-center border shadow default-font mx-auto"
                style="height:350px; margin-top:-15px; width:100%;">
                <h4 class="font-weight-normal">No Requirements</h4>
            </div>
            @else
            <table class="table table-bordered table-centered table-hover shadow-sm">
                <thead>
                    <th>Requirement</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th>Complied</th>
                    <th width="12%">Actions</th>
                </thead>
                <tbody>

                    @foreach ($department->department_requirements as $requirement)
                    <tr>
                        <td>{{ $requirement->requirement }}</td>
                        <td>{{ $requirement->requirement_description }}</td>
                        <td>{{ $requirement->deadline  }}</td>
                        <td class="py-0">
                            <div style="margin-top:-5px;">
                                <label for="" style="font-size:0.8rem"
                                    class="mb-0">{{$requirement->completed_department_clearances->count()}} /
                                    {{ $requirement->department_clearances->count() }} students</label>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width: {{ $requirement->percentage }}%"
                                        aria-valuenow="{{ $requirement->percentage }}" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm" href="#" data-toggle="modal"
                                data-target="#edit-requirement-modal" data-id="{{ $requirement->id }}"
                                data-requirement="{{ $requirement->requirement }}"
                                data-description="{{ $requirement->requirement_description }}"
                                data-deadline="{{ $requirement->deadline }}">Edit
                            </button>

                            {{-- <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal"
                                data-id="{{ $requirement->id }}">Delete</button> --}}


                            <div class="dropdown show" style="display:inline-block">
                                <a class="btn btn-secondary dropdown-toggle btn-sm" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    More
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    {{-- <button class="btn btn-outline-danger btn-sm">Delete</button> --}}
                                    <form action="{{ route('departments.clearances') }}" method="GET"
                                        style="display:inline-block">
                                        @csrf
                                        <input type="hidden" name="requirement_id" value="{{ $requirement->id }}">
                                        <button class="dropdown-item text-success" type="submit"
                                            class="text-success">Manage
                                            Clearance</button>
                                    </form>
                                    {{-- <a class="dropdown-item text-success"
                                        href=" id='{{ $requirement->id }}'">Manage
                                    Clearance</a> --}}

                                    <a class="dropdown-item text-danger" href="#" data-toggle="modal"
                                        data-target="#delete-modal" data-id="{{ $requirement->id }}">Delete</a>
                                </div>
                            </div>




                        </td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal For Adding Requirement -->
<div class=" modal fade" id="add-requirement-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Requirement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form action="{{route('departmentRequirements.store')}}" method="post" id="add_requirement_form">
                    @csrf
                    <div class="form-group">
                        <label for="requirement">Requirement</label>
                        <input type="text" class="form-control" name="requirement" value="">
                    </div>

                    <div class="form-group">
                        <label for="class_code">Notes</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="deadline">Deadline</label>
                        <input type="text" class="form-control " id="deadline" placeholder="" name="deadline">
                    </div>
                    <input type="hidden" name="department" value="{{ $department->id }}">
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" form="add_requirement_form">Add
                    Requirement</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal For Editing Requirement -->
<div class="modal fade" id="edit-requirement-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Requirement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form action="{{route('departmentRequirements.update')}}" method="post" id="update_form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="requirement">Requirement</label>
                        <input type="text" class="form-control" name="requirement" id="edit_requirement" value="">
                    </div>

                    <div class="form-group">
                        <label for="class_code">Notes</label>
                        <textarea name="description" id="description" cols="30" rows="10"
                            class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="deadline">Deadline</label>
                        <input type="text" class="form-control" id="deadline" placeholder="" name="deadline">
                    </div>
                    <input type="hidden" name="department" value="{{ $department->id }}">
                    <input type="hidden" name="requirement_id" id="edit_id" value="">
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" form="update_form">Update Requirement</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal For Deleting the Requirement-->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Requirement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you really want to delete this requirement? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <form action="{{ route('departmentRequirements.destroy')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="requirement_id" value="" id="delete_id">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" style="color:white">Delete Permanently</a>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you really want to delete this department? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <form action="{{ route('departments.destroy',$department)}}" method="post">
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

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $("input[name=deadline]").flatpickr({
        defaultDate: "today"
    });


    $('#edit-requirement-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var requirement = button.data('requirement')
        var description = button.data('description')
        var deadline = button.data('deadline')
        var id = button.data('id')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
       
        console.log(requirement);
       
        var modal = $(this)
        modal.find('#edit_requirement').val(requirement)
        modal.find('#description').val(description)
        modal.find('#deadline').val(deadline)
        modal.find('#edit_id').val(id)

        console.log($('#edit_requirement').val());
        //modal.find('.modal-body input').val(recipient)
    });


    $('#delete-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('#delete_id').val(id)
    });
</script>
@endsection

@section('custom-css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection