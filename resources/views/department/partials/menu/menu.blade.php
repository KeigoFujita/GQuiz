<div class="d-flex align-items-center menu">
    <a data-toggle="modal" data-target="#edit-modal" class="text-success"
        data-department-name="{{ $department->department_name }}" data-department-id="{{ $department->id }}">
        <i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i>
    </a>

    <a href="#" data-toggle="modal" data-target="#delete-modal" class="text-danger"
        data-department-id="{{ $department->id }}">
        <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
    </a>

    <div class="dropdown action">
        <a class="text-dark menu-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ route('departments.edit',$department) }}">View
                Requirements</a>
        </div>
    </div>
</div>
