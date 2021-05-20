@extends('layouts.student-app')

@section('content')
    @php
        $color = $colors[array_rand($colors)];
    @endphp

    <div class="container-fluid py-5 px-5 font-inter">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="container alert alert-danger alert-dismissible fade show">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="container rounded px-4 py-3 pb-5  position-relative"
             style="background-color: {{ $color }} !important; height: 25rem;">
            <p class="text-white mb-0" style="font-size: 2.5rem;">{{ $quiz->name }}</p>
            <p class="text-white mb-3" style="font-size: 1rem;">{{ $quiz->schoolClass->class_code }}</p>
            <p class="text-white">Notes: {{ $quiz->description }}</p>

            <div class="px-0 py-4 position-relative bg-white shadow-sm rounded question-box" style="top: 2rem;" >
                <form action="{{ route('students.submit-quiz', $quiz) }}" method="post">
                    @csrf
                    @foreach($items as $index => $item)
                        <div class="px-4 py-4">
                            <p class="font-inter" style="font-size: 1.4rem;"> {{ $loop->index + 1 . "."}} {{ $item->definition }} </p>
                            <textarea type="text" rows="3" class="form-control" placeholder="Enter your answer here..." name="answers[]">{{ old('answers.'.$index) }}</textarea>
                            <input type="hidden" name="ids[]" value="{{ $item->id }}">
                        </div>
                    @endforeach
                    <button type="submit" class="mx-4 btn text-white" style="background-color: {{ $color }}">Submit Answer</button>
                </form>
            </div>
            <div class="relative py-10"></div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        function LightenDarkenColor(col, amt) {

            var usePound = false;

            if (col[0] == "#") {
                col = col.slice(1);
                usePound = true;
            }

            var num = parseInt(col,16);

            var r = (num >> 16) + amt;

            if (r > 255) r = 255;
            else if  (r < 0) r = 0;

            var b = ((num >> 8) & 0x00FF) + amt;

            if (b > 255) b = 255;
            else if  (b < 0) b = 0;

            var g = (num & 0x0000FF) + amt;

            if (g > 255) g = 255;
            else if (g < 0) g = 0;

            return (usePound?"#":"") + (g | (b << 8) | (r << 16)).toString(16);

        }

        $('.question-box').css({'border-top': '10px solid ' + LightenDarkenColor("{{ $color }}", 70)});
    </script>
@endsection
@section('custom-css')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <style>
        .font-inter {
            font-family: 'Inter', sans-serif !important;
        }
        .py-10{
            padding-top: 5rem;
            padding-bottom: 5rem;
        }
    </style>
@endsection
