<div class="tab-pane fade " id="list-scores" role="tabpanel" aria-labelledby="list-scores-list">
    <div class="card">
        <div class="px-4 py-5">
            <table class="table table-bordered table-centered table-hover shadow-sm " style="margin-bottom:100px" id="table">
                <thead>
                <th>Course</th>
                <th>Student Number</th>
                <th>Year</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th width="5%">Score</th>
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

                            @php
                                $quiz_taken = $student->quizzes()->where('quizzes.id', $quiz->id)->first();
                                $score = 'N/A';
                                if($quiz_taken){
                                    $score = $quiz_taken->pivot->score;
                                }
                            @endphp
                            {{  $score  }}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
