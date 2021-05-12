{{-- Assign Officer Modal --}}
<div class="modal fade" id="assign-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Assign Officer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="employee_id" class="font-weight-bold">Employee</label>
                    <select name="employee_id" class="form-control tag-selector" style="width:100%" form="assign-form">
                        <option value="none">None</option>
                        @foreach ($employees as $employee)
                        <option value="{{ $employee->id}}">{{ $employee->full_name }}</option>
                        @endforeach
                    </select>

                    <label for="department_id" class="font-weight-bold">Department</label>
                    <select name="department_id" class="form-control tag-selector" style="width:100%"
                        form="assign-form">
                        @foreach ($departments as $department)
                        <option value="{{ $department->id}}">{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('assign_officer') }}" id="assign-form" method="POST">
                    @csrf
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" style="color:white">Assign Officer</a>
                </form>
            </div>
        </div>
    </div>
</div>
