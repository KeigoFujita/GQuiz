@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">

    <div class="row ">
        <div class="col-md-12">
            <h1 class="mb-5 display-4 title">Section</h1>
            <form action="{{ route('sections.store')}}" method="post" id="main_form">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Section Name</label>
                            <input type="text" class="form-control @error('section_name') is-invalid @enderror"
                                name="section_name" value="{{ old('section_name') }}">
                            @error('section_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="strand_id">Adviser</label>
                            <select name="employee_id" id="" class="form-control tag-selector">
                                @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id}}">{{   $teacher->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="grade_level">Grade Level</label>
                            <select name="grade_level" id="" class="form-control tag-selector">
                                <option value="11">Grade 11</option>
                                <option value="12">Grade 12</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="strand_id">Strand</label>
                            <select name="strand_id" id="" class="form-control tag-selector">
                                @foreach ($strands as $strand)
                                <option value="{{ $strand->id}}">{{   $strand->strand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- <div class="row mt-5">
        <div class="col-md-12">

            <h1 class="mb-5 display-4 title">Classes</h1>


            <div class="row mt-3 justify-content-end px-3 mb-3">
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_class_modal">Add
                    Class</button>
            </div>
            <table class="table table-bordered table-centered table-hover shadow-sm">
                <thead>
                    <th>Class Code</th>
                    <th>Subject Name</th>
                    <th>Lecturer</th>
                    <th>Schedule</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                    <tr>
                        <td>{{ $class->class_code }}</td>
    <td>{{ $class->subject->subject_name }}</td>
    <td>{{ $class->employee->full_name  }}</td>
    <td>{{ $class->schedule }}</td>
    <td>
        <button class="btn btn-danger btn-sm">Remove</button>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
</div> --}}

<button type="submit" class="btn btn-success mt-5" name="submit" form="main_form">Add Section</button>
</div>




{{-- <!-- Modal -->
<div class="modal fade" id="add_class_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" id="addClassModal">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Classes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height:50vh">
                <table class="table table-bordered table-centered table-hover shadow-sm" id="table">
                    <thead>
                        <th>Subject Name</th>
                        <th>Lecturer</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                        <tr class_id="{{ $class->id }}">
<td>{{ $class->subject->subject_name }}</td>
<td>{{ $class->employee->full_name  }}</td>
<td width="5%">
    <button class="btn btn-success btn-sm btn-add">Add</button>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div> --}}
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> --}}
<script>
    var classes = [];
    $('.tag-selector').select2();
//     $(document).ready(function() {
//     $('#table').DataTable({
//     });


//     $('.btn-add').on('click',function(){
//         var row = $(this).parent().parent();
//         var id = row.attr('class_id');

//         if(!classes.includes(id)){
//             classes.push(id)
//             var data = $('#input_classes').val();
//             data.push(id);
//         }
//        row.remove();
//     });


// } );
</script>
@endsection

@section('custom-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> --}}

<style>
    .select2-selection--single {
        height: 35px !important;
    }

    .select2-selection__rendered {
        line-height: 35px !important;
    }

    .select2-selection__arrow {
        height: 35px !important;
    }
</style>
@endsection