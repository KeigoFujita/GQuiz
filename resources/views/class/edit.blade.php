@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">

    <div class="row ">
        
        @if (Auth::user()->employee->isRegistrar)
        <div class="col-md-12 mb-5">
            <h1 class="mb-5 display-4 title">Manage Class</h1>

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
            <form action="{{ route('schoolClass.update',$school_class)}}" method="post">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="class_code">Class Code</label>
                            <input type="text" class="form-control @error('class_code') is-invalid @enderror"
                                name="class_code"
                                value="@if ($errors->has('class_code')){{ old('class_code') }}@else{{ $school_class->class_code }}@endif">
                            @error('class_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="strand_id">Subject</label>
                            <select name="subject_id" id="" class="form-control">
                                @foreach ($subjects as $subject)
                                <option value="{{ $subject->id}}" @if ($school_class_subject->id == $subject->id)
                                    selected
                                    @endif

                                    >{{   $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_id">Lecturer</label>
                            <select name="employee_id" id="" class="form-control">
                                @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id}}" @if ($school_class_employee->id == $teacher->id)
                                    selected
                                    @endif

                                    >{{   $teacher->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="class_schedule">Schedule</label>
                            <input type="text" class="form-control @error('class_schedule') is-invalid @enderror"
                                name="class_schedule"
                                value="@if ($errors->has('class_schedule')){{ old('class_schedule') }}@else{{ $school_class->schedule }}@endif">
                            @error('class_schedule')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row flex justify-content-end px-3">
                    <button type="submit" class="btn btn-success mt-5" name="submit">Update Class</button>
                </div>
            </form>
        </div>    
        @endif


        <div class="col-md-12" style="padding-bottom:400px;">

            <h1 class="mb-5 display-4 title">Requirements</h1>


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
            <div class="row flex justify-content-end px-3 mb-4">
                <button type="submit" class="btn btn-success" name="submit" data-toggle="modal"
                    data-target="#add-requirement-modal">Add Requirement</button>
            </div>

            @if ($school_class->class_requirements->count() == 0)
            <table class="table table-bordered table-centered table-hover ">
                <thead>
                    <th>Requirement</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th width="20%">Actions</th>
                </thead>
            </table>
            <div class="row justify-content-center align-items-center border shadow default-font mx-auto"
                style="height:350px; margin-top:-15px; width:100%;">
                <h4 class="font-weight-normal">No Requirements</h4>
            </div>
            @else
            {{-- 
            <table class="table table-bordered table-centered table-hover shadow-sm">
                <thead>
                    <th>Student</th>
                    <th width="10%">Actions</th>
                </thead>
                <tbody>

                    @foreach ($school_class->students as $student)
                    <tr>
                        <td>{{ $student->full_name }}</td>
            <td> <button class="btn btn-outline-success btn-sm">View</button></td>
            </tr>
            @endforeach
            </tbody>
            </table> --}}

            <table class="table table-bordered table-centered table-hover shadow-sm">
                <thead>
                    <th>Requirement</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th>Complied</th>
                    <th width="12%">Actions</th>
                </thead>
                <tbody>

                    @foreach ($school_class->class_requirements as $requirement)
                    <tr>
                        <td>{{ $requirement->requirement }}</td>
                        <td>{{ $requirement->requirement_description }}</td>
                        <td>{{ $requirement->deadline  }}</td>
                        <td class="py-0">
                            <div style="margin-top:-5px;">
                                <label for="" style="font-size:0.8rem"
                                    class="mb-0">{{$requirement->completed_clearances_count}} /
                                    {{ $requirement->clearances_count }} students</label>
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

                            <div class="dropdown show" style="display:inline-block">
                                <a class="btn btn-secondary dropdown-toggle btn-sm" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    More
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    {{-- <button class="btn btn-outline-danger btn-sm">Delete</button> --}}
                                    <a class="dropdown-item text-success" href="{{ route('classRequirements.show', $requirement) }}">Manage Clearance</a>
                                    <a class="dropdown-item text-danger" href="#" data-toggle="modal"
                                        data-target="#delete-modal" data-id="{{ $requirement->id }}">Delete</a>
                                </div>
                            </div>

                        </td>

                    </tr>
                    @endforeach


                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>

<!-- Modal -->
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


                <form action="{{route('classRequirements.store')}}" method="post" id="main_form">
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
                    <input type="hidden" name="class" value="{{ $school_class->id }}">
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" form="main_form">Add
                    Requirement</button>
            </div>
        </div>
    </div>
</div>




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


                <form action="{{route('classRequirements.update_requirement')}}" method="post" id="update_form">
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
                    <input type="hidden" name="class" value="{{ $school_class->id }}">
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

<!-- Modal -->
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
                <form action="{{ route('classRequirements.destroy')}}" method="post">
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection