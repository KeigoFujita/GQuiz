<div class="tab-pane fade show active" id="list-quizzes" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card">
        <div class="card-body">
            <div class="px-2 pb-3">

                <div class="row">
                    @forelse ($quizzes as $quiz)
                        <div class="px-3 mb-3">
                            <div class="card" style="width: 25rem;">
                                <div class="card-header text-white py-4"
                                     style="background-color: {{ $colors[array_rand($colors)] }} !important;  height: 10rem;">
                                    <a href="#"
                                       class="mb-0">{{ $quiz->name }}</a>
                                    <span class="d-block">{{ $quiz->description }}</span>
                                </div>
                                <div class="card-body">

                                    <p class="card-text heading-text text-secondary mb-0">

                                        @if(Auth::user()->student->quizzes->contains('id',$quiz->id))
                                            <i class="fa fa-check mr-2" aria-hidden="true"></i>
                                            Finished
                                        @else
                                            <i class="fa fa-close mr-2" aria-hidden="true"></i>
                                            Not yet done
                                        @endif
                                    </p>
                                    <p class="card-text heading-text text-secondary mb-0">

                                        @if(Auth::user()->student->quizzes->contains('id',$quiz->id))
                                            <i class="fa fa-star mr-2" aria-hidden="true"></i>
                                            {{ Auth::user()->student->quizzes()->where('quizzes.id', $quiz->id)->first()->pivot->score }} / {{ $quiz->items->count() }}
                                        @else
                                            <i class="fa fa-clock-o heading-text mr-2" aria-hidden="true" style="width: 1rem;"></i>
                                            @if($quiz->is_expired)
                                                <span class="badge badge-danger">Expired</span>
                                            @else
                                                Expires at {{ \Carbon\Carbon::create($quiz->expires_at)->format('m-d-Y g:i A') }}
                                            @endif
                                        @endif
                                    </p>
                                </div>
                                <div class="card-footer py-3">
                                    <a href="{{ route('students.take-quiz', $quiz) }}" class="btn btn-success btn-sm">
                                        Take quiz
                                        <i class="fa fa-arrow-right ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="w-100 card shadow-sm">
                            <div class="card-header py-3"></div>
                            <div class="card-body">
                                <img src="https://img.icons8.com/cotton/344/empty-box.png" class="d-block mx-auto mb-3" alt="" style="width: 100px;">
                                <p class="text-center" style="font-size: 1.5rem;">You don't have any quizzes yet!</p>
                            </div>
                        </div>
                    @endforelse

                </div>

            </div>
        </div>
    </div>
</div>
