@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">

    @if (Auth::user()->employee->is_registar == false)
    <nav aria-label="breadcrumb" style="background-color:transparent;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><p class="text-secondary mb-0">Classes</p></li>
            <li class="breadcrumb-item"><a href="{{ route('teachers.schoolClass',$requirement->school_class) }}"
                    class="text-info">{{$requirement->school_class->subject->subject_name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $requirement->requirement }}</li>
        </ol>
    </nav>
    @else
    <nav aria-label="breadcrumb" style="background-color:transparent;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('teachers.MyClasses',Auth::user()->employee) }}"
                    class="text-info">My Classes</a></li>
            <li class="breadcrumb-item"><a href="{{ route('teachers.schoolClass',$requirement->school_class) }}"
                    class="text-info">{{$requirement->school_class->subject->subject_name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $requirement->requirement }}</li>
        </ol>
    </nav>

    @endif
    <div class="row ">
        <div class="col-md-12 mb-5">
            <h1 class="mb-2 display-4 title">{{ $requirement->requirement }}</h1>
            <p class="adviser mb-0">{{$requirement->school_class->subject->subject_name}}</p>

        </div>
    </div>

    <form action="{{ route('classClearance.makeAllComplete') }}" method="post" class="display-inline-block"
        id="make_complete_form">
        @csrf
        <input type="hidden" name="ids_to_complete" value="[]">
        <input type="hidden" name="requirement_id" value="{{ $requirement->id }}">
    </form>

    <form action="{{ route('classClearance.makeAllUnComplete') }}" method="post" class="display-inline-block"
        id="make_uncomplete_form">
        @csrf
        <input type="hidden" name="ids_to_uncomplete" value="[]">
        <input type="hidden" name="requirement_id" value="{{ $requirement->id }}">
    </form>
    <div class="container-fluid">
        <div class="row mb-5 px-3">

            <button type="button" href="#" class="btn btn-success btn-sm mr-1" id="checkAll">
                Check All
            </button>

            <button type="submit" class="btn btn-outline-success btn-sm mr-1" id="makeComplete">
                Make Completed
            </button>


            <button type="button" href="#" class="btn btn-outline-danger btn-sm" id="makeUnComplete">
                Make Incomplete
            </button>

        </div>


        <table class="table table-bordered table-centered table-hover shadow-sm" id="table">
            <thead>
                <th width="1%"></th>
                <th width="5%">Image</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th width="13%">Actions</th>
            </thead>
            <tbody>

                @foreach ($requirement->clearances as $clearance)
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck{{ $clearance->id }}"
                                clearance_id="{{ $clearance->id }}">
                            <label class="custom-control-label" for="customCheck{{ $clearance->id }}"></label>
                        </div>
                    </td>
                    <td>
                        <div class="portrait-sm" style="background-color: {{ $clearance->student->color }};">
                            <p class="default-font my-0">
                                {{ $clearance->student->two_initials }}</p>
                        </div>
                    </td>
                    <td>{{ $clearance->student->first_name }}</td>
                    <td>{{ $clearance->student->middle_name }}</td>
                    <td>{{ $clearance->student->last_name }}</td>
                    <td>{{ $clearance->student->gender == 'male' ? "Male" : "Female" }}</td>
                    <td>

                        <div class="form-group my-0">
                            <select class="form-control actions text-white form-control-sm

                            @if ($clearance->status == 'complete')
                                bg-success
                            @else
                                bg-danger
                            @endif
                            
                            
                            " clearance_id="{{ $clearance->id }}">
                                <option value="complete" @if ($clearance->status == 'complete')
                                    selected
                                    @endif>Complete</option>
                                <option value="incomplete" @if ($clearance->status == 'incomplete')
                                    selected
                                    @endif>Incomplete</option>
                            </select>
                        </div>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>

@endsection


@section('custom-meta')
<meta name="update_status_url" content="{{ route('classClearance.update') }}">
@endsection

@section('scripts')
<script src=" https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    var checkedAll = false;
    var checkedVals = [];


    $('.actions').on('change',function(){

        var status = $(this).val().toLowerCase();
        var clearance_id = $(this).attr('clearance_id');

        if(status == 'complete'){
            $(this).removeClass('bg-danger');
            $(this).addClass('bg-success');
            $(this).addClass('text-white');
        }else{
            $(this).addClass('bg-danger');
        }


        performAjax(status,clearance_id);


     });


    function performAjax(status,clearance_id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            'url': $('meta[name="update_status_url"]').attr('content'),
            data: {
                'status': status,
                'clearance_id': clearance_id,
            },
            success: function(data) {
                console.log(data);
            },
            error: function(data) {
               alert("error : " + data.responseText);
            }
        });
     }

     

     $("#checkAll").click(function(){
        //$('input:checkbox').prop('indeterminate', !checkedAll);
        $('input:checkbox').prop('checked',!checkedAll);
        checkedAll = !checkedAll;
        
        if(checkedAll){
            $(this).text('Uncheck All')
        }else{
            $(this).text('Check All')
        }

     });


     $("#makeComplete").click(function(){

       checkedVals = $('input:checkbox:checked').map(function() {
            return $(this).attr('clearance_id');
        }).get();

        $('input[name=ids_to_complete]').val(checkedVals);
        $('#make_complete_form').submit();

       // alert(checkedVals.join(","));
        console.log(checkedVals);
     });

     $("#makeUnComplete").click(function(){

        checkedVals = $('input:checkbox:checked').map(function() {
            return $(this).attr('clearance_id');
        }).get();

        $('input[name=ids_to_uncomplete]').val(checkedVals);
        $('#make_uncomplete_form').submit();

        // alert(checkedVals.join(","));
        console.log(checkedVals);
    });

    $('#table').DataTable({
    });


</script>
@endsection

@section('custom-css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection