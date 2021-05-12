<div class="container-fluid p-5">
    @include('department.partials.alerts.alert')
    <div class="card shadow-small pb-4">
        <div class="p-3 d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <p class="table-title">Departments</p>
            </div>
            <div class="d-flex">
                <div class="mr-4">
                    <div class="search d-flex align-items-center">
                        <i class="fa fa-search mr-2 icon"></i>
                        <input type="text" class="form-control form-control-sm" wire:model.debounce.500ms="search"
                            wire:keyup="update" placeholder="Search">
                    </div>
                </div>
                <div>
                    <a class="btn btn-success btn-sm text-white mb-0 float-right" data-toggle="modal"
                        data-target="#add-modal">
                        <i class="fa fa-plus mr-1" data-toggle="tooltip" data-placement="top"
                            title="Add Department"></i>
                        Add Department
                    </a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-centered table-hover mb-0" id="table">
                <thead class="thead-light border">
                    <th>Department Name</th>
                    <th width="30%">Assigned Officer</th>
                    <th>Role</th>
                    <th width="10%" class="no-sort">Actions</th>
                </thead>
                <tbody>

                    @foreach ($departments as $department)
                    <tr>
                        <td @if(!isset($department->role) || !isset($department->role->assigned_officer))
                            class="border-left-warning" @endif>
                            {{ $department->department_name }}
                        </td>

                        @if (!isset($department->role->assigned_officer))
                        <td data-toggle='tooltip' class="no-officer">
                            N / A
                            <a href="" data-toggle="modal" data-target="#assign-modal"
                                data-department-id="{{ $department->id }}">
                                <span class="badge badge-info float-right">Assign officer</span>
                            </a>
                        </td>
                        @else
                        <td class="no-officer">
                            {{ $department->role->assigned_officer['full_name']}}
                            <a href="" data-toggle="modal" data-target="#assign-modal"
                                data-department-id="{{ $department->id }}"
                                data-employee-id="{{ $department->role->assigned_officer->id }}">
                                <span class="badge badge-info float-right">Assign officer</span>
                            </a>
                        </td>
                        @endif


                        @if (!isset($department->role))
                        <td data-toggle='tooltip' data-placement='top' title='No Role Assigned'>
                            N / A
                        </td>
                        @else
                        <td>
                            {{ $department->role->role_name }}
                        </td>
                        @endif

                        <td>
                            @include('department.partials.menu.menu')
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
