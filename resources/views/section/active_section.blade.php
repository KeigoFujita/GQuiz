@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="mb-5">
        <h1 class="display-4 title">Active Sections</h1>
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


    <div class="row justify-content-end mb-3">
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add-section">
            Add Section
        </button>
    </div>

    <div class="row justify-content-center">

        <table class="table table-bordered table-centered   table-hover shadow-sm">
            <thead>
                <th width="30%">Section Name</th>
                <th width="10%">Grade Level</th>
                <th width="20%">Strand</th>
                <th width="30%">Adviser</th>
                <th width="10%">Actions</th>
            </thead>
            <tbody>


                @if (count($activeSections)> 0)

                @foreach ($activeSections as $activeSection)
                <tr>
                    <td>{{ $activeSection->section->section_name }}</td>
                    <td>{{ $activeSection->section->grade_level == "11" ? "Grade 11" : "Grade 12"   }}</td>
                    <td>{{ $activeSection->section->strand->strand_name }}</td>
                    <td>{{ $activeSection->teacher->full_name }}</td>
                    <td>
                        <a type="button" class="btn btn-success btn-sm"
                            href="{{route('sections.showActiveSection',$activeSection)}}">View</a>
                    </td>
                </tr>
                @endforeach

                @else
                <tr>
                    <td colspan="5" style="text-align:center; height:350px">No Active Sections</td>
                </tr>
                @endif

            </tbody>

        </table>

    </div>
</div>



<div class="modal fade" id="add-section" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="height:50vh">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sections.addActiveSection') }}" method="post" id="add-section-form">
                    @csrf
                    <div class="form-group">
                        <label class="my-1 mr-2" for="section">Section</label>
                        <select id="select" name="section">
                            @foreach ($available_sections as $section)
                            <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="my-1 mr-2" for="section">Adviser</label>
                        <select id="select2" class="" name="employee">
                            @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                <button type="submit" id="btn-create" class="btn btn-info btn-mine" form="add-section-form">Add
                    Section</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#select').select2({ width: '100%' });
        $('#select2').select2({ width: '100%' });
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection

@section('custom-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .section-name {
        font-size: 0.8rem !important;
    }

    .btn-mine {
        background-color: #14394C;
        border: none;
    }

    .select2-selection--single {
        height: 37px !important;
    }

    .select2-selection__rendered {
        line-height: 37px !important;
    }

    .select2-selection__arrow {
        height: 37px !important;
    }
</style>
@endsection