{{-- Delete Modal --}}
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                <form action="{{ route('departments.destroy') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="department_id" value="">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" style="color:white">Delete Permanently</a>
                </form>
            </div>
        </div>
    </div>
</div>
