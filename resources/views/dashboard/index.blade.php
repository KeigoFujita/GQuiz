@extends('layouts.app')

<body>
@section('content')
    <div class="container-fluid py-5 px-5 ">

        <div class="mb- ">
            <h1 class="display-4 title">Dashboard</h1>
        </div>
        <div class=" row mb-3" style=>
            <div class="col-md-4 col">
                <div class="bg-success-200 text-white py-3 px-4 w-100">
                    <div class="d-flex justify-content-between">
                        <div class="icon">
                            <p style="font-size: 4rem;" class="mb-0"><i class="fa fa-graduation-cap"></i></p>
                        </div>
                        <div class="text-right">
                            <p class="mb-0" style="font-size: 3rem;">{{ $student_count }}</p>
                            <span class="">Enrolled Students</span>
                        </div>
                    </div>
                </div>
                <div class="bg-success-100 text-white px-4 py-1">
                    <a href="{{ route('students.index.blade.php') }}" style="color: white;">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0" style="font-size: 0.7rem;">VIEW MORE</p>
                            <p class="mb-0"><i class="fa fa-arrow-circle-right"></i></p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col">
                <div class="bg-warning-200 text-white py-3 px-4 w-100">
                    <div class="d-flex justify-content-between">
                        <div class="icon">
                            <p style="font-size: 4rem;" class="mb-0"><i class="fa fa-graduation-cap"></i></p>
                        </div>
                        <div class="text-right">
                            <p class="mb-0" style="font-size: 3rem;">{{ $student_count }}</p>
                            <span class="">Enrolled Students</span>
                        </div>
                    </div>
                </div>
                <div class="bg-warning-100 text-white px-4 py-1">
                    <a href="{{ route('students.index.blade.php') }}" style="color: white;">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0" style="font-size: 0.7rem;">VIEW MORE</p>
                            <p class="mb-0"><i class="fa fa-arrow-circle-right"></i></p>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-md-4 col">


            <div class="
                        bg-info-200 text-white py-3 px-4 w-100">
                <div class="d-flex justify-content-between">
                    <div class="icon">
                        <p style="font-size: 4rem;" class="mb-0"><i class="fa fa-users"></i></p>
                    </div>
                    <div class="text-right">
                        <p class="mb-0" style="font-size: 3rem;">{{ $teacher_count }}</p>
                        <span class="">Teachers</span>
                    </div>
                </div>
            </div>
            <div class="bg-info-100 text-white px-4 py-1">
                <a href="{{ route('employees.index.blade.php') }}" style="color: white;">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0" style="font-size: 0.7rem;">VIEW MORE</p>
                        <p class="mb-0"><i class="fa fa-arrow-circle-right"></i></p>
                    </div>
                </a>
            </div>

        </div>

    </div>

    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card" style="margin-left:50px; margin-right: 50px;">
                <div class="card-body">
                    <canvas id="daily_clearance" height="100px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-6">
        <div class="col-md-6">
            <div class="card" style="height: 500px;margin-left: 100px;">
                <div class="card-body">
                    <p style="color: black; font-size: 1.5rem;">Department Heads</p>
                    <div class="border mb-3"></div>
                    @foreach ($departments as $department)
                        <div class="d-flex align-items-center mb-3">
                            <div class="portrait-sm mr-4"
                                 style="background-color: {{ $department->role->assigned_officer->color }};">
                                <p class="default-font my-0">{{ $department->role->assigned_officer->two_initials }}
                                </p>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0" style="font-size: 1.2rem;">
                                        {{ $department->role->assigned_officer['full_name'] }}</span>
                                    <p class="mb-0 text-secondary" style="font-size: 0.8rem; ">
                                        {{ $department->role->role_name }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card" style="height: 500px;">
                <div class="card-body">
                    <canvas id="by_strand_chart" width="200" height="200"></canvas>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection

@section('custom-meta')
    <meta name="grade_level_data" content="{{ json_encode($students_by_grade_level) }}">
    <meta name="students_by_strand_data" content="{{ json_encode($students_by_strand) }}">
    <meta name="daily_clearance_data" content="{{ json_encode($daily_clearance_data) }}">
@endsection

@section('custom-css')
    <style>
        .bg-success-100 {
            background-color: #17A769;
        }

        .bg-success-200 {
            background-color: #28B779;
        }

        .bg-warning-100 {
            background-color: #FFB84A;
        }

        .bg-warning-200 {
            background-color: #CA943D;
        }

        .bg-violet-100 {
            background-color: #852C9A;
        }

        .bg-violet-200 {
            background-color: #751E87;
        }

        .bg-info-100 {
            background-color: #2395C9;
        }

        .bg-info-200 {
            background-color: #27A9E3;
        }

    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        var strand_chart = document.getElementById('by_strand_chart').getContext('2d');
        var strand_chart_data = JSON.parse($('meta[name="students_by_strand_data"]').attr('content'));
        var strand_pie_chart = new Chart(strand_chart, {
            type: 'doughnut',
            data: {
                labels: strand_chart_data[0],
                datasets: [{
                    label: '# of students per grade level',
                    data: strand_chart_data[1],
                    backgroundColor: strand_chart_data[2],
                    borderWidth: 0
                }],

            },
            options: {
                title: {
                    display: true,
                    text: 'Students by Course',
                    fontStyle: 'bold',
                    fontSize: 20
                },
                cutoutPercentage: 60,
            }
        });


        var daily_clearance_ctx = document.getElementById("daily_clearance").getContext('2d');
        var daily_clearance_data = JSON.parse($('meta[name="daily_clearance_data"]').attr('content'));
        var daily_clearance_chart = new Chart(daily_clearance_ctx, {
            type: 'line',
            data: {
                labels: daily_clearance_data['days'],
                datasets: [{
                    label: 'Students complied (Class Requirement)', // Name the series
                    data: daily_clearance_data['class_clearance'], // Specify the data values array
                    fill: false,
                    borderColor: '#2196f3', // Add custom color border (Line)
                    backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                    borderWidth: 3 // Specify bar border width
                }, {
                    label: 'Students complied (Department Requirement)', // Name the series
                    data: daily_clearance_data['department_clearance'], // Specify the data values array
                    fill: false,
                    borderColor: '#D31E1E', // Add custom color border (Line)
                    backgroundColor: '#D31E1E', // Add custom color background (Points and Fill)
                    borderWidth: 3 // Specify bar border width
                }]
            },
            options: {
                responsive: true, // Instruct chart js to respond nicely.
                maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height
            },
            options: {
                title: {
                    display: true,
                    text: 'Daily Clearance Status',
                    fontStyle: 'bold',
                    fontSize: 32
                },
            }
        });

    </script>
@endsection


<body>
