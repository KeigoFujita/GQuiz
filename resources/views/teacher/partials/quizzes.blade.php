<div class="tab-pane fade {{ $active === 'quiz' ? 'active' : '' }}" id="list-quizzes" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card">
        <div class="card-body">
            <div class="px-2 pb-3">
                <div class="d-flex justify-content-end align-items-center mb-5">
                    <button class="btn btn-success btn-sm px-3 py-2" data-toggle="modal"
                    data-target="#create-quiz-modal">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i>
                        Create Quiz
                    </button>
                </div>
                <table class="table table-bordered table-centered table-hover shadow-sm " style="margin-bottom:100px" id="quiz-table">
                    <thead>
                        <th>Quiz ID</th>
                        <th>Quiz Name</th>
                        <th>No. of Items</th>
                        <th width="5%">Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($class->quizzes as $quiz)
                            <tr>
                                <td>QZ-{{ sprintf('%08d', $quiz->id)}}</td>
                                <td>{{ $quiz->name }}</td>
                                <td>{{ $quiz->items->count() }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('teachers.quizzes-show',[$class,$quiz]) }}" class="btn btn-success btn-sm">Manage</a>
                                    </div>    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>