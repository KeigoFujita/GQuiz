<!-- Edit Question Modal -->
<div class="modal fade font-inter" id="test" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Definition</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('teachers.quizzes-update-definition',[$class,$quiz]) }}" method="post" id="update-quiz">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="term">Term</label>
                        <input type="text" class="form-control" name="term" id="edit-txt-term"
                               placeholder="E.g. 12">
                    </div>
                    <div class="form-group">
                        <label for="definition">Definition</label>
                        <textarea rows="5" type="text" class="form-control" name="definition" id="edit-txt-definition"
                                  placeholder="E.g.What is the square root of 144?"></textarea>
                    </div>
                    <input type="hidden" name="item_id" value="" id="edit-txt-id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" form="update-quiz">Save Changes</button>
            </div>
        </div>
    </div>
</div>
