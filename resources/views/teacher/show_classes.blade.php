@extends('layouts.teacher-app')

@section('content')
    <div class="container-fluid py-5 px-5 font-inter">


        <div class="container rounded px-4 pt-3 pb-5 mb-3 "
            style="background-color: {{ $colors[array_rand($colors)] }} !important;">
            <p class="title text-white mb-0">{{ $class->class_code }}</p>
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
                        <a class="list-group-item list-group-item-action {{ $active === 'students' ? 'active' : '' }}" id="list-home-list" data-toggle="list"
                            href="#list-students" role="tab" aria-controls="home">
                            <i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i>
                            Students
                        </a>
                        <a class="list-group-item list-group-item-action {{ $active === 'quiz' ? 'active' : '' }}" id="list-profile-list" data-toggle="list"
                            href="#list-quizzes" role="tab" aria-controls="profile">
                            <i class="fa fa-pencil mr-2" aria-hidden="true"></i>
                            Quizzes
                        </a>
                        <a class="list-group-item list-group-item-action {{ $active === 'settings' ? 'active' : '' }}" id="list-settings-list" data-toggle="list"
                            href="#list-settings" role="tab" aria-controls="settings">
                            <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                            Settings
                        </a>
                    </div>
                </div>
                <div class="col-10">
                    <div class="tab-content pl-3" id="nav-tabContent">
                        @include('teacher.partials.students')
                        @include('teacher.partials.quizzes')
                        @include('teacher.partials.settings')
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
    <script>

        $("#expires_at").flatpickr({
            enableTime: true,
            defaultDate: "today",
            dateFormat: "Y-m-d H:i",
            minDate: "today",
        });

        students_to_invite = [];

        $(document).ready(function() {
            $('#table').DataTable({});
            $('#quiz-table').DataTable({});

            $('#invite-students').on('submit',function(){
                students_to_invite.forEach(student_id => {
                    $(this).append(`<input type="hidden" name="students[]" value="${student_id}">`);
                });
            })

            $('#search').on('keypress', function(e) {

                if($(this).val() === ''){
                    $('#result-set').hide();
                }else{
                    $('#result-set').show();
                }

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
            })
        });

        function inviteStudent(student_id, student_name, student_number){

           $('#result-set').empty();
           $('#result-set').hide();

           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('teachers.check-student', $class) }}", {
                'student_id' : student_id
            }, function(data, status) {
                if(data.status === 'unauthorized'){
                    $('#student-status').empty();
                    $('#student-status').append(`
                        <div class="alert alert-danger alert-dismissible fade show">
                            ${student_name} is already in the class!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    `)
                }else{
                    is_added_already = false;

                    students_to_invite.forEach((element, index) => {
                        if(element === student_id){
                            is_added_already = true;
                        }
                    });

                    if(!is_added_already){

                        students_to_invite.push(student_id);
                        console.log(students_to_invite);
                        $('#student-invite-table tbody').append(
                        `
                            <tr id="student_${student_id}">
                                <td>${student_number}</td>
                                <td>${student_name}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="uninviteStudent(${student_id})">Uninvite</button>
                                </td>
                            </tr>
                        `)

                    }else{
                        $('#student-status').empty();
                        $('#student-status').append(`
                            <div class="alert alert-danger alert-dismissible fade show">
                                ${student_name} is added already for invitation!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        `)
                    }

                }
            });

        }

        function uninviteStudent(student_id){
            students_to_invite.forEach((element, index) => {
              if(element === student_id){
                 students_to_invite.splice(index,1)
              }
            });
            $('#student_'+student_id).remove();

            console.log(students_to_invite);
        }

    </script>
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
