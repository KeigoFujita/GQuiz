<div class="tab-pane fade show {{ $active === 'students' ? 'active' : '' }}" id="list-students" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card">
        <div class="card-body">
            <div class="px-2 pb-3">
                <div class="d-flex justify-content-end align-items-center mb-5">
                    <button class="btn btn-success btn-sm px-3 py-2" data-toggle="modal"
                    data-target="#add-modal">
                        <i class="fa fa-user-plus mr-2" aria-hidden="true"></i>
                        Invite Student
                    </button>
                </div>
                <table class="table table-bordered table-centered table-hover shadow-sm " style="margin-bottom:100px" id="table">
                    <thead>
                        <th>Course</th>
                        <th>Student Number</th>
                        <th>Year</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th width="5%">Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{$student->strand->strand_name}}</td>
                            <td>{{ $student->lrn }}</td>
                            <td>
                            @php

                            if($student->grade_level == "1"){
                                echo "1st Year";
                            }else if($student->grade_level == "2"){
                                echo "2nd Year";
                            }else{
                                echo "3rd Year";
                            }
                            @endphp
                            </td>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->middle_name }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>

                                <div class="d-flex align-items-center">
                                    <form action="{{ route('teachers.my-classes-remove-student',[$class,$student]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
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
