@extends('layouts.app')

@section('content')
<div class="container-fluid py-5">

    <div class="mb-5">
        <h1 class="display-4 title px-3">Semesters</h1>
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


    @if (!$has_latest)
    <div class="row justify-content-end mb-3">
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#start-semester">
            Start Semester
        </button>
    </div>
    @endif

    <div class="container-fluid">

        <table class="table table-bordered table-centered table-hover shadow-sm">
            <thead>
                <th>Semester Code</th>
                <th>School Year</th>
                <th>Semester</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Actions</th>
            </thead>
            <tbody>

                @foreach ($semesters as $semester)
                <tr>
                    <td>{{ $semester->semester_code }}</td>
                    <td>{{ $semester->school_year }}</td>
                    <td>
                        {{ 
                        
                            $semester->semester == '1' ? "1st Semester" : "2nd Semester"
                        
                        }}
                    </td>
                    <td>{{ $semester->start_date }}</td>
                    <td>{{ $semester->end_date }}</td>
                    <td>
                        @if ($semester->status == 'ongoing')
                        <span class="badge badge-success section-name">Ongoing</span>
                        @else
                        <span class="badge badge-primary section-name">Completed</span>
                        @endif
                    </td>

                    <td>
                        <a type="button" class="btn btn-info btn-sm btn-mine" href="#">View</a>
                    </td>
                </tr>
                @endforeach

                {{-- <tr>
                    <td>SY-19-20-2</td>
                    <td>2019 - 2020</td>
                    <td>2nd Semester</td>
                    <td>November 7, 2019</td>
                    <td>April 4, 2020</td>
                    <td><span class="badge badge-success section-name">Ongoing</span></td>
                    <td>
                        <a type="button" class="btn btn-info btn-sm btn-mine" href="#">View</a>
                    </td>
                </tr>
                <tr>
                    <td>SY-19-20-1</td>
                    <td>2019 - 2020</td>
                    <td>1st Semester</td>
                    <td>June 12, 2019</td>
                    <td>October 30, 2019</td>
                    <td><span class="badge badge-primary section-name">Completed</span></td>
                    <td>
                        <a type="button" class="btn btn-info btn-sm btn-mine" href="#">View</a>
                    </td>
                </tr> --}}

            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="start-semester" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="height:60vh">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Start Semester</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('semesters.store') }}" method="post" id="start-semester-form">
                    @csrf
                    <label for="exampleInputPassword1">School Year</label>
                    <div class="form-row mb-3">
                        <div class="col-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Start</div>
                                </div>
                                <input type="number" class="form-control " name="start_year" placeholder="" min="1900"
                                    max="3000" value="2019">
                                <span class="invalid-feedback" role="alert" id="start_year_error">
                                    <strong></strong>
                                </span>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="input-group mb-2">
                                <input type="number" class="form-control" name="end_year" placeholder="" min="1900"
                                    max="3000" value="2020">
                                <div class="input-group-append">
                                    <div class="input-group-text">End</div>
                                </div>
                                <span class="invalid-feedback" role="alert" id="end_year_error">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="semester">Semester</label>
                        <select id="semester" name="semester" class="form-control">
                            <option value="1">1st Semester</option>
                            <option value="2">2nd Semester</option>
                        </select>
                    </div>

                    <label for="exampleInputPassword1">Date</label>
                    <div class="form-row">
                        <div class="col-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Start</div>
                                    <input type="text" class="form-control" id="fromDate" placeholder=""
                                        name="start_date">
                                </div>

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="toDate" placeholder="" name="end_date">
                                <div class="input-group-append">
                                    <div class="input-group-text">End</div>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                <button type="button" id="btn-create" class="btn btn-info btn-mine">Start Semester</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    var valid_start_year = true;
    var valid_end_year = true;

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $("#fromDate").flatpickr({
        defaultDate: "today"
    });
    $("#toDate").flatpickr({
        defaultDate: "today"
    });

    $('#btn-create').click(function(){
       if(valid_end_year && valid_start_year){
          $("#start-semester-form").submit();
       }
    });


    $("input[name='start_year']").on("change",function(){

        var start_year =  $("input[name='start_year']").val();
        var end_year =  $("input[name='end_year']").val();

        if(start_year > 3000 || start_year < 1990){
            $("input[name='start_year']").addClass('is-invalid');
            $("#start_year_error").html("Invalid year given");
            valid_start_year = false;
        }else{
            $("input[name='start_year']").removeClass('is-invalid').addClass('is-valid');
            $("#start_year_error").html("");
            valid_start_year = true;
        }


    });

    $("input[name='end_year']").on("change",function(){

        var start_year =  parseInt($("input[name='start_year']").val());
        var end_year =  parseInt($("input[name='end_year']").val());

        if(end_year <= start_year || (end_year - start_year) > 1){
            $("input[name='end_year']").addClass('is-invalid');
            $("#end_year_error").html("Invalid year given");
            valid_end_year = false;
        }else{
            $("input[name='end_year']").removeClass('is-invalid').addClass('is-valid');
            $("#end_year_error").html("");
            valid_end_year = true;
        }
        
    });


</script>
@endsection
@section('custom-css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .section-name {
        font-size: 0.8rem !important;
    }

    .btn-mine {
        background-color: #14394C;
        border: none;
    }
</style>
@endsection