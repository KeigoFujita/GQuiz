{{-- Edit Modal --}}
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="department" class="font-weight-bold">Department</label>
                    <input type="text" name="department_name" class="form-control" form="edit-form">
                    <input type="hidden" name="department_id" value="" form="edit-form">
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('departments.update') }}" id="edit-form" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" style="color:white">Update</a>
                </form>
            </div>
        </div>
    </div>
</div>
