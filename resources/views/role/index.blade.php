@extends('layouts.app')

@section('content')
<div class="container-fluid p-5">

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

    @error('department_id')
    <div class="alert alert-danger alert-dismissible fade show">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    @error('role_name')
    <div class="alert alert-danger alert-dismissible fade show">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    <div class="card shadow-small pb-4">
        <div class="p-3 d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <p class="table-title">Roles</p>
            </div>
            <div>
                <a class="btn btn-success btn-sm text-white mb-0 float-right" data-toggle="modal"
                    data-target="#add-modal">
                    <i class="fa fa-plus mr-1"></i>
                    Add Role
                </a>
            </div>
        </div>

        <div class="table-responsive" style="margin-left: -1px; width: calc(100% + 2px);">

            <table class="table table-centered table-hover mb-0" id="table">
                <thead class="thead-light border">
                    <th>Role Name</th>
                    <th>Department</th>
                    <th>No. Employees</th>
                    <th width="10%" class="no-sort">Actions</th>
                </thead>
                <tbody>

                    @foreach ($roles as $role)
                    <tr>
                        <td @if(!isset($role->assigned_officer))class="border-left-warning"
                            @endif>{{ $role->role_name }}</td>
                        <td>

                            @if($role->department->id == 1)
                            N / A
                            @else
                            {{ $role->department->department_name}}
                            @endif

                        </td>
                        <td @if(!isset($role->assigned_officer))data-toggle='tooltip' data-placement='left' title='No
                            Officer Assigned' @endif>{{ $role->employees->count() }}</td>
                        <td>
                            <div class="d-flex align-items-center menu">
                                <a data-toggle="modal" data-target="#edit-modal" class="text-success"
                                    data-role-name="{{ $role->role_name }}" data-role-id="{{ $role->id }}">
                                    <i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                </a>

                                <a href="#" data-toggle="modal" data-target="#delete-modal" class="text-danger">
                                    <i class="fa fa-trash" data-toggle="tooltip" data-placement="top"
                                        title="Delete"></i>
                                </a>

                                <div class="dropdown action">
                                    <a class="text-dark menu-link" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Add Modal --}}
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="role" class="font-weight-bold">Role</label>
                    <input type="text" name="role_name" class="form-control" form="add-form">
                </div>

                <label for="department_id" class="font-weight-bold">Department</label>
                <select name="department_id" class="form-control tag-selector" style="width:100%" form="add-form">
                    <option value="none">None</option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id}}">{{ $department->department_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <form action="{{ route('roles.store') }}" id="add-form" method="POST">
                    @csrf
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" style="color:white">Add Role</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Edit Modal --}}
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="role_name" class="font-weight-bold">Role</label>
                    <input type="text" name="role_name" class="form-control" form="edit-form">
                    <input type="hidden" name="role_id" value="" form="edit-form">
                </div>

                <label for="department_id" class="font-weight-bold">Department</label>
                <select name="department_id" class="form-control tag-selector" style="width:100%" form="edit-form">
                    <option value="none">None</option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id}}">{{ $department->department_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <form action="{{ route('roles.update') }}" id="edit-form" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" style="color:white">Update</a>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Delete Modal --}}
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
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

@section('custom-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<style>
    body {
        background-color: #f9fafb;
    }

    #table {
        font-size: 0.9rem;
        min-width: 800px;
    }

    .shadow-small {
        box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.5);
    }

    .border-left-warning {
        border-left: 5px solid #ffc107 !important;
    }

    .action .menu-link i {
        font-size: 1rem;
        text-align: center;
        line-height: 34px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
    }


    .table-title {
        margin-bottom: 0px;
        font-size: 1.5rem;
        line-height: 1.5rem;
        height: 1.5rem;
    }

    .action .menu-link i:hover {
        background-color: #44444433;
        color: black;
    }

    .menu>a i {
        font-size: 1rem;
        text-align: center;
        line-height: 32px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
    }

    .menu>a i:hover {
        background-color: #44444433;
    }

    .dataTables_info {
        padding-left: 20px;
        font-weight: bold;
    }

    #table_wrapper {
        margin-top: -10px;
    }

    .no-officer a {
        opacity: 0;
    }

    .no-officer:hover>a {
        opacity: 1;
    }

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


@section('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $('#table').DataTable({
        "bPaginate": false,
        "searching": false,
        "columnDefs": [{
            "targets": 'no-sort',
            "orderable": false,
        }]
    });

    $('.tag-selector').select2();
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $('#delete-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('#delete_id').val(id)
    });


    $('#edit-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var role_name = button.data('role-name');
        var role_id = button.data('role-id');
        var modal = $(this);
        modal.find('input[name=role_name]').val(role_name)
        modal.find('input[name=role_id]').val(role_id)
    });

</script>


@endsection
