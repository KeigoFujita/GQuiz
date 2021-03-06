<div class="tab-pane fade " id="list-settings" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card">
        <div class="card-body px-4 py-4">

            <p class="mb-3" style="font-size: 1.2rem;">Edit Quiz</p>

            <form action="{{ route('teachers.quizzes-update',[$class,$quiz]) }}" method="post" class="mb-4">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name"
                        placeholder="E.g. Prelim Exam"
                        value="{{ $quiz->name }}">
                </div>
                <div class="form-group">
                    <label for="description">Notes</label>
                    <textarea rows="5" type="text" class="form-control" name="description"
                        placeholder="E.g. Please review about Global Warming">{{ $quiz->description }}</textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="expires_at">Expires At</label>
                    <input type="text" class="form-control" id="expires_at" name="expires_at" value="{{ $quiz->expires_at }}">
                </div>

                <div class="form-group mb-4">
                    <label for="expires_at">Quiz Type</label>
                    <div class="input-group">
                        <select name="type" class="custom-select">
                            <option value="enumeration" @if($quiz->type === 'enumeration') selected @endif>Enumeration</option>
                            <option value="multiple_choice" @if($quiz->type === 'multiple_choice') selected @endif>Multiple Choice</option>
                        </select>
                        <div class="input-group-append">
                            <a href="{{ route('quizzes.preview', $quiz) }}" class="btn btn-success" type="button">
                                <i class="fa fa-eye mr-2"></i>
                                Preview
                            </a>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-sm btn-success">Save Changes</button>
            </form>

            <div class="dropdown-divider"></div>

            <p class="my-3" style="font-size: 1.2rem;">Visibility</p>

            @if ($quiz->status === 'archived')
            <div class="alert alert-success fade show d-flex justify-content-between">
                <div>
                    <p class="mb-0 font-weight-bold">Publish Quiz</p>
                    <p class="mb-0">This will make the quiz visible to students for them to answer.</p>
                </div>
                <div class="d-flex align-items-center">
                    <form action="{{ route('teachers.quizzes-publish',[$class,$quiz]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-sm btn-outline-success">Publish</button>
                    </form>
                </div>
            </div>
            @else
            <div class="alert alert-danger fade show d-flex justify-content-between">
                <div>
                    <p class="mb-0 font-weight-bold">Archive Quiz</p>
                    <p class="mb-0">Mark this quiz as archived and hidden to students.</p>
                </div>
                <div class="d-flex align-items-center">
                    <form action="{{ route('teachers.quizzes-archive',[$class,$quiz]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Archive</button>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
