<div class="tab-pane fade show active" id="list-questions" role="tabpanel" aria-labelledby="list-questions-list">
    <div class="card">
        <div class="card-body">
            <div class="px-2 pb-3">
                <div class="d-flex justify-content-end align-items-center mb-5">
                    <button class="btn btn-success btn-sm px-3 py-2" data-toggle="modal"
                    data-target="#create-quiz-modal">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i>
                        Create Question
                    </button>
                </div>
                <table class="table table-bordered table-centered table-hover shadow-sm " style="margin-bottom:100px" id="quiz-table">
                    <thead>
                        <th width="10%">No.</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th width="5%">Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($quiz->items as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->question }}</td>
                                <td>{{ $item->answer }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-success btn-sm mr-2" data-toggle="modal"
                                            data-target="#test"
                                            data-item-id="{{ $item->id }}"
                                            data-item-question="{{ $item->question }}"
                                            data-item-answer="{{ $item->answer }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('teachers.quizzes-delete-question',[$class,$quiz,$item]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
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