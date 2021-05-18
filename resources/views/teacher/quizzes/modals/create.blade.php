<!-- Create Question Modal -->
<div class="modal fade font-inter" id="create-quiz-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Definition</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('teachers.quizzes-create-definition',[$class,$quiz]) }}" method="post"
                      id="create-quiz">
                    @csrf
                    <div class="form-group">
                        <label for="term">Term</label>
                        <input type="text" class="form-control" name="term"
                               placeholder="E.g. Photosynthesis">
                    </div>
                    <div class="form-group">
                        <label for="definition">Definition</label>
                        <textarea rows="5" type="text" class="form-control" name="definition"
                                  placeholder="The process by which green plants and certain other organisms transform light energy into chemical energy."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" form="create-quiz">Create Definition</button>
            </div>
        </div>
    </div>
</div>
