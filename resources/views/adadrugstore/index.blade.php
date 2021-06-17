@extends('layouts.app')

@section('content')

    <div class="container-fluid py-5 px-5"">

                                                                                                                            <div class="
        mb-5">
        <p class="display-4 title">Products</p>
    </div>


    <table class="table table-bordered table-centered table-hover shadow-sm" id="table">
        <thead>
            <th width="5%">Image</th>
            <th>Brand ID</th>
            <th>Brand Name</th>
            <th>Generic Name</th>
            <th>Brand Type</th>
            <th>Expiry Date</th>
            <th>Status</th>
            <th>Stock</th>
            <th>Actions</th>
        </thead>
        <tbody>

            @foreach ($teachers as $teacher)
                <tr>
                    <td>
                        <div class="portrait-sm" style="background-color: {{ $teacher->color }};">
                            <p class="default-font my-0">
                                {{ $teacher->two_initials }}</p>
                        </div>
                    </td>

                    <td>PRD-30{{ $teacher->id }}</td>
                    <td>{{ ['Altace', 'Amaryl', 'Ambien', 'Mevacor', 'Zestril', 'Zocor', 'Zovirax'][rand(0, 6)] }}</td>
                    <td>{{ ['NAPROXEN 500MG TABLET', 'ASCORBIC ACID + ZINC 100MG', 'ASCORBIC ACID 100MG/5ML 120ML', 'NAPROXEN 500MG TABLET', 'NNAPROXEN 500MG TABLET '][rand(0, 4)] }}
                    </td>
                    <td>{{ ['Rx', 'Non-Rx', 'Rx', 'Non-Rx', 'Non-Rx '][rand(0, 4)] }}</td>
                    <td>{{ now()->addDays(rand(0, 30))->format('M  d,Y ') }}</td>
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
                    <td>
                        <a type="button" class="btn btn-success btn-sm">Manage</a>
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
