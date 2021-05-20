<div class="tab-pane fade show active" id="classes" role="tabpanel" aria-labelledby="classes-tab">
    <div class="container-fluid py-5 px-5 font-inter">

        <div class="row">
            @forelse ($classes as $class)
                <div class="px-3 mb-3">
                    <div class="card" style="width: 25rem;">
                        <div class="card-header text-white py-4"
                             style="background-color: {{ $colors[array_rand($colors)] }} !important;">
                            <a href="{{ route('students.my-classes', $class) }}"
                               class="mb-0">{{ $class->class_code }}</a>
                            <span class="d-block">{{ $class->schedule }}</span>
                        </div>
                        <div class="card-body">

                            @php
                                $all_quizzes = Auth::user()->student->quizzes()->get()->pluck('id');
                                $finished_quizzes = $class->quizzes()->whereIn('quizzes.id',$all_quizzes)->get()->count();
                                $total_quizzes = $class->quizzes()->where('quizzes.status','active')->get()->count();
                                $unfinished_quizzes = $total_quizzes - $finished_quizzes;
                            @endphp

                            <p class="card-text heading-text text-secondary mb-0">
                                <i class="fa fa-users mr-2 text-info" aria-hidden="true"></i>
                                {{ $class->students->count() === 0 ? 'No ' : $class->students->count() }} members
                            </p>
                            <p class="card-text heading-text text-secondary mb-0">
                                <i class="fa fa-pencil mr-2" aria-hidden="true" style="width: 1rem;"></i>
                                {{ $total_quizzes }} total quizzes
                            </p>
                            <p class="card-text heading-text text-secondary mb-0">
                                <i class="fa fa-close mr-2 text-danger" aria-hidden="true" style="width: 1rem;"></i>
                                {{ $unfinished_quizzes == 0 ? 'No ' : $unfinished_quizzes  }} unsettled quizzes
                            </p>
                            <p class="card-text heading-text text-secondary mb-0">
                                <i class="fa fa-check mr-2 text-success" aria-hidden="true" style="width: 1rem;"></i>


                                {{ $finished_quizzes == 0 ? 'No ' : $finished_quizzes }} finished quizzes
                            </p>
                        </div>
                        <div class="card-footer py-3">

                        </div>
                    </div>
                </div>
            @empty
                <div class="w-100 card shadow-sm">
                    <div class="card-header py-3"></div>
                    <div class="card-body">
                        <img src="https://img.icons8.com/cotton/344/empty-box.png" class="d-block mx-auto mb-3" alt="" style="width: 100px;">
                        <p class="text-center" style="font-size: 1.5rem;">You don't have any classes yet!</p>
                    </div>
                </div>
            @endforelse

        </div>

    </div>
</div>
