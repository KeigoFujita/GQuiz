@extends('layouts.teacher-app')

@section('content')
    <div class="container-fluid py-5 px-5 font-inter">


        <div class="container rounded px-4 pt-3 pb-5 mb-3 "
            style="background-color: {{ $colors[array_rand($colors)] }} !important;">
            <p class="title text-white mb-0">{{ $quiz->name }}</p>
            <a href="{{ route('teachers.my-classes-show',$class) }}" class="text-white">{{ $class->class_code}}</a>
        </div>

        <div class="container px-0">
            @if (session()->has('success'))

                <div class="alert alert-success alert-dismissible fade show">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            @endif

            @if (session()->has('danger'))

                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session()->get('danger') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            @endif


            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="container px-0">
            <div class="row no-gutters">
                <div class="col-2">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-questions-list" data-toggle="list"
                            href="#list-questions" role="tab" aria-controls="home">
                            <i class="fa fa-question mr-2" aria-hidden="true"></i>
                            Questions
                        </a>
                        <a class="list-group-item list-group-item-action" id="list-scores-list" data-toggle="list"
                            href="#list-scores" role="tab" aria-controls="profile">
                            <i class="fa fa-star mr-2" aria-hidden="true"></i>
                            Scores
                        </a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
                            href="#list-settings" role="tab" aria-controls="settings">
                            <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                            Settings
                        </a>
                    </div>
                </div>
                <div class="col-10">
                    <div class="tab-content pl-3" id="nav-tabContent">
                        @include('teacher.quizzes.partials.questions')
                        @include('teacher.quizzes.partials.scores')
                        @include('teacher.quizzes.partials.settings')
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade font-inter" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Invite Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="class_code">Student Name or Student ID</label>
                        <input type="text" class="form-control" name="class_code" id="search">
                        <input type="hidden" class="form-control" name="class_id" value="{{ $class->id }}">
                    </div>
                    <div id="result-set"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Question Modal -->
    <div class="modal fade font-inter" id="create-quiz-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('teachers.quizzes-create-question',[$class,$quiz]) }}" method="post" id="create-quiz">
                        @csrf
                        <div class="form-group">
                            <label for="question">Question</label>
                            <textarea rows="5" type="text" class="form-control" name="question"
                                placeholder="E.g.What is the square root of 144?"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Answer</label>
                            <input type="text" class="form-control" name="answer"
                                placeholder="E.g. 12">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" form="create-quiz">Create Question</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Question Modal -->
    <div class="modal fade font-inter" id="test" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('teachers.quizzes-update-question',[$class,$quiz]) }}" method="post" id="update-quiz">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="question">Question</label>
                            <textarea rows="5" type="text" class="form-control" name="question" id="edit-txt-question"
                                placeholder="E.g.What is the square root of 144?"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Answer</label>
                            <input type="text" class="form-control" name="answer" id="edit-txt-answer"
                                placeholder="E.g. 12">
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



@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({});
            $('#quiz-table').DataTable({});

            $('#search').on('keypress', function(e) {
                if (e.which == 13) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.post("/teacher/search-student", {
                        'query': $('#search').val(),
                        'class': $('input[name="class_id"]').val()
                    }, function(data, status) {
                        $('#result-set').empty();
                        $('#result-set').append(data);
                    });
                }
            });


        });


        $('#test').on('show.bs.modal', function (event) {

            // Button that triggered the modal
            var button = $(event.relatedTarget)
            // Extract info from data-bs-* attributes
            var item_id = button.data('item-id');
            var item_question = button.data('item-question');
            var item_answer = button.data('item-answer');

            $('#edit-txt-id').val(item_id);
            $('#edit-txt-question').val(item_question);
            $('#edit-txt-answer').val(item_answer);

        })

    </script>
@endsection
@section('custom-css')

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">


    <style>
        .title {
            font-size: 2rem;
            text-transform: uppercase;
            letter-spacing: -0.01ch;
        }

        .card-header a {
            font-size: 2rem;
            text-decoration: none;
            color: white !important;
            margin-bottom: 0;
        }

        .card-header i {
            font-size: 1rem;
            text-decoration: none;
            color: white !important;
        }

        .card-header a:hover {
            border-bottom: 2px solid white;
            color: white !important;
        }

        .font-inter {
            font-family: 'Inter', sans-serif !important;
        }

    </style>
@endsection
