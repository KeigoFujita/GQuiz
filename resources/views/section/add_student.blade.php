@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="mb-5">
        <h1 class="display-4 title">Add Student</h1>
    </div>
    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show">
        {{ session()-> get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif

    @if (session()->has('error'))

    <div class="alert alert-danger alert-dismissible fade show">
        {{ session()-> get('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="container-fluid mb-3">

        <div class="row justify-content-end">

            <a type="button" href="{{route('sections.showActiveSection',$section_semester)}}"
                class="btn btn-info btn-sm">
                View Section
            </a>

        </div>

    </div>

    <div class="container-fluid">
        <table class="table table-bordered table-centered table-hover shadow-sm">
            <thead>
                <th width="10%">Image</th>
                <th width="20%">LRN</th>
                <th>Name</th>
                <th width="10%">Gender</th>
                <th width="5%">Actions</th>
            </thead>
            <tbody>

                @foreach ($students as $student)
                <tr>
                    <td></td>
                    <td>{{ $student->lrn }}</td>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->gender == "male" ? "Male": "Female" }}</td>
                    <td style="text-align:center">

                        <form action="{{ route('students.add_student_to_section') }}" method="post">
                            @csrf
                            <input type="hidden" name="section_id" value="{{ $section->id }}">
                            <input type="hidden" name="grade_level" value="{{ $section->grade_level }}">
                            <input type="hidden" name="student_lrn" value="{{ $student->lrn }}">
                            <input type="hidden" name="section_semester" value="{{ $section_semester }}">

                            <button type="submit" class="btn btn-success btn-sm mr-1 add-students">Add</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>


</div>

@endsection

@section('scripts')
@endsection

@section('custom-css')
@endsection