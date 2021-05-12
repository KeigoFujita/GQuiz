@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">

    <div class="row ">
        <div class="col-md-12">
            <h1 class="mb-5 display-4 title">Edit Student</h1>
            @if (session()->has('success'))

            <div class="alert alert-success alert-dismissible fade show">
                {{ session()-> get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @endif

            <form action="{{ route('students.update',$student)}}" method="post" id="update_form">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">LRN</label>
                            <input type="text" class="form-control @error('lrn') is-invalid @enderror" name="lrn"
                                value="@if ($errors->has('lrn')){{ old('lrn') }}@else{{ $student->lrn }}@endif">
                            @error('lrn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="grade_level">Grade Level</label>
                            <select name="grade_level" id="grade_level"
                                class="form-control  @error('grade_level') is-invalid @enderror">
                                <option value="11" 
                                @if(old('grade_level') !== null)
                                    @if (old('grade_level') == 11)
                                        selected
                                    @endif
                                @else
                                    @if ($student->grade_level == '11')
                                            selected
                                    @endif
                                @endif                                   
                                >
                                Grade 11
                               </option>
                               <option value="12" 
                                @if(old('grade_level') !== null)
                                    @if (old('grade_level') == 12)
                                        selected
                                    @endif
                                @else
                                    @if ($student->grade_level == '12')
                                            selected
                                    @endif
                                @endif                                   
                                >
                                Grade 12
                               </option>
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
                            <label class="my-1 mr-2" for="section">Strand</label>
                            <select id="strand_id"
                                class="form-control my-1 mr-sm-2  @error('strand') is-invalid @enderror"
                                name="strand">
                                @foreach ($strands as $strand)
                                <option value="{{ $strand->id }}" 
                                    @if(old('strand') !== null)
                                        @if (old('strand') == $strand->id)
                                            selected
                                        @endif
                                    @else
                                        @if ($student->strand->id == $strand->id)
                                                selected
                                        @endif
                                    @endif
                                    >
                                    {{ $strand->strand_name }}
                                </option>
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
                            <label class="my-1 mr-2" for="section">Section</label>
                            <input type="hidden" name="old_section" value="{{ old('section') }}">
                            <input type="hidden" name="original_section" value="{{ $student->section->id }}">
                            <select id="section_select"
                                class="form-control my-1 mr-sm-2 tag-selector @error('section') is-invalid @enderror"
                                name="section">
                                @if(old('section') == null)
                                    <option value="-1">None</option>
                                    <option value="{{ $student->section->id }}" selected>{{ $student->section->section_name }}</option>
                                @endif
                            </select>
                            @error('section')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="" for="gender">Gender</label>
                            <select class="form-control  @error('gender') is-invalid @enderror" name="gender">
                                <option value="male" {{  $student->gender == 'male' ? "selected":""}}>Male</option>
                                <option value="female" {{  $student->gender == 'female' ? "selected":""}}>Female
                                </option>
                            </select>
                            @error('gender')
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
                            <label for="exampleInputPassword1">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                name="first_name"
                                value="@if ($errors->has('first_name')){{ old('first_name') }}@else{{ $student->first_name }}@endif">
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
                                name="middle_name"
                                value="@if ($errors->has('middle_name')){{ old('middle_name') }}@else{{ $student->middle_name }}@endif">

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
                                name="last_name"
                                value="@if ($errors->has('last_name')){{ old('last_name') }}@else{{ $student->last_name }}@endif">

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                </div>
            </form>

            <div class="row justify-content-end px-3 mt-5">
                <div>
                    <a type="button" href="{{ route('students.show',$student) }}"
                        class="btn btn-outline-success btn-sm">View
                        Student</a>
                </div>
                <button type="submit" class="btn btn-success btn-sm ml-1" name="submit"
                    form="update_form">Update</button>
            </div>
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

                console.log(old_section)
                if(old_section !== ''){
                    console.log(old_section)
                    $('#section_select').val(old_section);
                    $('#section_select').trigger('change');
                }


            },
            error: function(data) {
               alert("error : " + data.responseText);
            }
        });
    }

    function loadOriginalSection(){
        var original_section = $('input[name=original_section]').val()
        if(original_section !== ''){
            console.log(original_section)
            $('#section_select').val(2);
            $('#section_select').trigger('change');
        }
    }


    $(document).ready(function() {     

        $('#section_select').change(function(){
            console.log($('#section_select').val())
        });

        $("#grade_level").change(function() {
            old_section = '-1';
            getSections();
        });

        $("#strand_id").change(function() {
            old_section = '-1';
            getSections();
        });

        @if(old('section') !== null)
            getSections();  
        @endif
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

    .form-group label {
        font-weight: bold;
    }
</style>
@endsection

@section('custom-meta')
<meta name="get_section_url" content="{{ route('students.getsection') }}">
@endsection