@extends('layouts.student-app')

@section('content')
    <div class="container-fluid py-5 px-5 font-inter">


        <div class="container rounded px-4 pt-3 pb-3 mb-3 "
             style="background-color: {{ $colors[array_rand($colors)] }} !important;">
            <p class="title text-white mb-0">{{ $class->class_code }}</p>
            <p class="text-white mb-0" style="font-size: 1rem;">{{ $class->employee->full_name }}</p>
            <p class="text-white">{{ $class->schedule }}</p>
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
                        <a class="list-group-item list-group-item-action active" id="list-quizzes-list" data-toggle="list"
                           href="#list-quizzes" role="tab" aria-controls="home">
                            <i class="fa fa-edit mr-2" aria-hidden="true"></i>
                            Quizzes
                        </a>
                        <a class="list-group-item list-group-item-action" id="list-members  -list" data-toggle="list"
                           href="#list-members" role="tab" aria-controls="profile">
                            <i class="fa fa-users mr-2" aria-hidden="true"></i>
                            Members
                        </a>
                    </div>
                </div>
                <div class="col-10">
                    <div class="tab-content pl-3" id="nav-tabContent">
                        @include('student.my_classes.partials.members')
                        @include('student.my_classes.partials.quizzes')
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade font-inter" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1000px !important">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Invite Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="position-relative w-full" id="result-parent">
                        <div class="form-group">
                            <label for="class_code">Student Name or Student ID</label>
                            <input type="text" class="form-control" name="class_code" id="search">
                            <input type="hidden" class="form-control" name="class_id" value="{{ $class->id }}">
                        </div>
                        <div id="student-status"></div>
                        <div id="result-set"></div>
                    </div>
                    <table class="table table-bordered table-centered table-hover shadow-sm " id="student-invite-table">
                        <thead>
                        <th>Student Number</th>
                        <th>Student Name</th>
                        <th width="5%">Actions</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('teachers.my-classes-invite-student',$class) }}" method="post" id="invite-students">
                        @csrf
                        <button type="submit" class="btn btn-success">Invite All</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Quiz Modal -->
    <div class="modal fade font-inter" id="create-quiz-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Quiz</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('teachers.quizzes-store',$class) }}" method="post" id="create-quiz">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name"
                                   placeholder="E.g. Prelim Exam">
                        </div>
                        <div class="form-group">
                            <label for="description">Notes</label>
                            <textarea rows="5" type="text" class="form-control" name="description"
                                      placeholder="E.g. Please review about Global Warming"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="expires_at">Expires At</label>
                            <input type="text" class="form-control" id="expires_at" name="expires_at">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" form="create-quiz">Create Quiz</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection
@section('custom-css')

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


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

        #result-set{
            position: absolute;
            width: 100% ;
            max-height: 340px;
            overflow-y: auto;
        }

    </style>
@endsection
