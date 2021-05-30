<div class="tab-pane fade " id="list-scores" role="tabpanel" aria-labelledby="list-scores-list">
    <div class="card">
        <div class="px-4 py-5">
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <label class="my-1 mr-2" for="section">Course</label>
                        <select id="filter-course"
                                class="form-control my-1 mr-sm-2 @error('strand') is-invalid @enderror" name="strand">
                            @foreach ($strands as $strand)
                                <option value="{{ $strand->strand_name }}">{{ $strand->strand_name . " | " . $strand->strand_description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="my-1 mr-2" for="section">Year</label>
                        <select id="filter-year" class="form-control my-1 mr-sm-2 @error('strand') is-invalid @enderror" name="strand">
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mt-5"></div>
            <table class="table table-bordered table-centered table-hover shadow-sm " style="margin-bottom:100px" id="score-table">
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
