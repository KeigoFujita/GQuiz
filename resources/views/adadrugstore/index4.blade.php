@extends('layouts.app')

@section('content')

    <div class="container-fluid py-5 px-5"">

                                                                        <div class=" mb-5">
        <p class="display-4 title">Inventory</p>
    </div>
    @if (session()->has('success'))

        <div class="alert alert-success alert-dismissible fade show">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif

    <div class="d-flex justify-content-start align-items-center mb-5">
        <a href="#" class="btn btn-success">Make Inventory Check</a>
    </div>

    <table class="table table-bordered table-centered table-hover shadow-sm" id="table">
        <thead>
            <th>Product ID</th>
            <th>Drawer ID</th>
            <th>Product Name</th>
            <th>Product Category</th>
            <th>Supplier Name</th>
            <th>Status</th>
            <th>Stock</th>
            <th>Onhand</th>
            <th>Price</th>
            <th>Actions</th>
        </thead>
        <tbody>

            @foreach ($teachers as $teacher)
                <tr>

                    <td>PRD-30{{ $teacher->id }}</td>
                    <td>DRW-{{ rand(1, 15) }}</td>
                    <td>{{ ['Amoxicillin', 'Neurontin', 'Synthroid', 'Prinivil', 'Glucophage '][rand(0, 4)] }}</td>
                    <td>{{ ['Amoxicillin', 'Neurontin', 'Synthroid', 'Prinivil', 'Glucophage '][rand(0, 4)] }}</td>
                    <td>{{ $teacher->full_name }}</td>
                    <td>
                        @php
                            $status = rand(0, 1);
                        @endphp

                        @if ($status === 0)
                            <span class="badge badge-pill badge-danger">Out of Stock</span>
                        @else
                            <span class="badge badge-pill badge-success">Available</span>
                        @endif



                    </td>
                    <td>{{ $status * rand(0, 2312) }}</td>
                    <td>{{ $status * rand(0, 2312) }}</td>
                    <td>Php. {{ Faker\Factory::create()->randomFloat(2) }}</td>
                    <td>
                        <a type="button" class="btn btn-success btn-sm" href="#">Manage</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $('#table').DataTable({});

    </script>
@endsection
@section('custom-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <style>
        .section-name {
            font-size: 0.8rem !important;
        }

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
