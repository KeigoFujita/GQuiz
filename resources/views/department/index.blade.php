@extends('layouts.app')
@section('content')



@livewire('department-search',['departments'=>$departments])

@include('department.partials.modals.create-modal')
@include('department.partials.modals.edit-modal')
@include('department.partials.modals.delete-modal')
@include('department.partials.modals.assign-officer-modal')
@endsection



@section('custom-meta')
<meta name="search-url" content="{{ route('departments.search') }}">
@endsection
@section('custom-css')
@livewireStyles
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .search {
        position: relative;
    }

    .search input {
        width: 200px;
        border-radius: 25px;
        padding-left: 30px;
        transition: width 0.2s ease 0s;
    }

    .card .search>.icon {
        position: absolute;
        left: 10px;
    }

    .search input:focus {
        width: 300px;
    }

</style>
@endsection


@section('scripts')
@livewireScripts
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    function delay(fn, ms) {
        let timer = 0
        return function (...args) {
            clearTimeout(timer)
            timer = setTimeout(fn.bind(this, ...args), ms || 0)
        }
    }

    function isEmpty(str) {
        return (!str || 0 === str.length);
    }
    var table = $('#table').DataTable({
        "bPaginate": false,
        "searching": false,
        "columnDefs": [{
            "targets": 'no-sort',
            "orderable": false,
        }]
    });

    $('.tag-selector').select2();
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $('#delete-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('department-id')
        var modal = $(this)
        modal.find('input[name=department_id]').val(id)
    });


    $('#edit-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var department_name = button.data('department-name');
        var department_id = button.data('department-id');
        var modal = $(this);
        modal.find('input[name=department_name]').val(department_name)
        modal.find('input[name=department_id]').val(department_id)
    });

    $('#assign-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var department_id = button.data('department-id');
        var employee_id = button.data('employee-id');
        console.log(department_id);
        var modal = $(this);
        modal.find('select[name=department_id]').select2().val(department_id).trigger("change");

        if (employee_id) {
            modal.find('select[name=employee_id]').select2().val(employee_id).trigger("change");
        }
    });

    document.addEventListener("livewire:load", function (event) {
        window.livewire.hook('beforeDomUpdate', () => {
            table.destroy()
        });

        window.livewire.hook('afterDomUpdate', () => {

            table = $('#table').DataTable({
                "bPaginate": false,
                "searching": false,
                "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false,
                }]
            });
        });
    });

</script>
@endsection
