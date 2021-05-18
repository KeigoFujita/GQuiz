@extends('layouts.teacher-app')

@section('content')
    @php
        $color = $colors[array_rand($colors)];
    @endphp
    <div class="container-fluid py-5 px-5 font-inter">

        <div class="container rounded px-4 py-3 pb-5  position-relative"
             style="background-color: {{ $color }} !important; height: 25rem;">
            <p class="text-white mb-0" style="font-size: 2.5rem;">{{ $quiz->name }}</p>
            <p class="text-white mb-3" style="font-size: 1rem;">{{ $quiz->schoolClass->class_code }}</p>
            <p class="text-white">Notes: {{ $quiz->description }}</p>

            <div class="px-0 py-4 position-relative bg-white shadow-sm rounded question-box" style="top: 2rem;" >
                @foreach($questions as $question)
                    <div class="px-4 py-4">
                        <p class="font-inter" style="font-size: 1.4rem;"> {{ $loop->index + 1 . "."}} {{ $question['question'] }} </p>
                        @foreach($question['choices'] as $choice)
                            <div class="pl-3 py-2" style="font-size: 1.4rem;">
                                <input type="radio" id="{{"q". $loop->parent->index . "choice_" . ($loop->index + 1) ."_" . Str::snake($choice) }}" name="q_{{ $loop->parent->index }}" value="1">
                                <label for="{{"q". $loop->parent->index . "choice_" . ($loop->index + 1) ."_" . Str::snake($choice) }}">{{ $choice }}</label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <button class="mt-5 mx-4 btn text-white" style="background-color: {{ $color }}">Submit Answer</button>
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

        [type="radio"]:checked,
        [type="radio"]:not(:checked) {
            position: absolute !important;
            left: -9999px !important;
        }
        [type="radio"]:checked + label,
        [type="radio"]:not(:checked) + label
        {
            position: relative !important;
            padding-left: 40px !important;
            cursor: pointer !important;
            line-height: 20px !important;
            display: inline-block !important;
            color: #666 !important;
        }
        [type="radio"]:checked + label:before,
        [type="radio"]:not(:checked) + label:before {
            content: '' !important;
            position: absolute !important;
            left: 0 !important;
            top: 0 !important;
            width: 18px !important;
            height: 18px !important;
            border: 1px solid #ddd !important;
            border-radius: 100% !important;
            background: #fff !important;
            transform: scale(1.5) !important;
        }
        [type="radio"]:checked + label:after,
        [type="radio"]:not(:checked) + label:after {
            content: '';
            width: 16px !important;
            height: 16px !important;
            background: {{ $color }} !important;
            position: absolute !important;
            top: 1px !important;
            left: 1px !important;
            border-radius: 100% !important;
            -webkit-transition: all 0.2s ease !important;
            transition: all 0.2s ease !important;
        }
        [type="radio"]:not(:checked) + label:after {
            opacity: 0 !important;
            -webkit-transform: scale(0) !important;
            transform: scale(0) !important;
        }
        [type="radio"]:checked + label:after {
            opacity: 1 !important;
            -webkit-transform: scale(1) !important;
            transform: scale(1) !important;
        }
    </style>
@endsection
