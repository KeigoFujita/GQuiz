@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">

    @if (Auth::user()->employee->isTeacher == false)
    <nav aria-label="breadcrumb" style="background-color:transparent;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('students.index') }}" class="text-info">Students</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Student</li>
        </ol>
    </nav>
    @endif

    <div class="row ">
        <div class="col-md-12">
            <h1 class="mb-5 display-4 title mt-4">Add Student</h1>
            <form action="{{ route('students.store')}}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Student Number</label>
                            <input type="text" class="form-control @error('lrn') is-invalid @enderror" name="lrn"
                                value="{{ old('lrn') }}">
                            @error('lrn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="grade_level">Year Level</label>
                            <select id="grade_level" name="grade_level"
                                class="form-control  @error('grade_level') is-invalid @enderror">
                                <option value="1" {{ old('grade_level') == '1' ? "selected":""}}>1st Year</option>
                                <option value="2" {{ old('grade_level') == '2' ? "selected":""}}>2nd Year</option>
                                <option value="3" {{ old('grade_level') == '3' ? "selected":""}}>3rd Year</option>
                            </select>

                            @error('grade_level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="my-1 mr-2" for="section">Course</label>
                            <select id="strand_id"
                                class="form-control my-1 mr-sm-2 @error('strand') is-invalid @enderror" name="strand">
                                @foreach ($strands as $strand)
                                    <option value="{{ $strand->id }}" {{ old('strand') == $strand->id ? "selected":""}}>{{ $strand->strand_name . " | " . $strand->strand_description }}</option>
                                @endforeach

                            </select>
                            @error('strand')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="male" {{ old('gender') == 'male' ? "selected":""}}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? "selected":""}}>Female</option>
                            </select>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                name="first_name" value="{{ old('first_name') }}">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Middle Name</label>
                            <input type="text" class="form-control  @error('middle_name') is-invalid @enderror"
                                name="middle_name" value="{{ old('middle_name') }}">

                            @error('middle_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Last Name</label>
                            <input type="text" class="form-control  @error('last_name') is-invalid @enderror"
                                name="last_name" value="{{ old('last_name') }}">

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                </div>



                <div class="row justify-content-end px-3 mt-3">
                    <button type="submit" class="btn btn-success mb-5 btn-sm " name="submit">Add Student</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    var old_section = $('input[name=old_section]').val();
    $('.tag-selector').select2({
        width: 'style'
    });

    function getSections(){
        $("#section_select").html('');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: $('meta[name="get_section_url"]').attr('content'),
            data: {
                grade_level: $( "#grade_level" ).val(),
                strand_id: $( "#strand_id" ).val(),
            },
            dataType:'json',
            success: function(data) {

                var parsedData = [{id:-1,"text":"None"}];
                var finalData  = parsedData.concat( JSON.parse(data));

                $('#section_select').select2({
                    data : finalData
                });
                if(old_section !== ''){
                    console.log('Im called')
                    $('#section_select').val(old_section);
                    $('#section_select').trigger('change');
                }

            },
            error: function(data) {
               alert("error : " + data.responseText);
            }
        });
    }

    $(document).ready(function() {
    
        getSections();
    $("#grade_level").click(function() {
        old_section = '-1';
        getSections();
    });

    $("#strand_id").change(function() {
        old_section = '-1';
        getSections();
    });

    });

</script>
@endsection

@section('custom-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<style>
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
@section('custom-meta')
<meta name="get_section_url" content="{{ route('students.getsection') }}">
@endsection