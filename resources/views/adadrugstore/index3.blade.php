@extends('layouts.app')

@section('content')

    <div class="container-fluid py-5 px-5"">

                                                    <div class=" mb-5">
        <p class="display-4 title">Transactions</p>
    </div>



    <table class="table table-bordered table-centered table-hover shadow-sm" id="table">
        <thead>
            {{-- <th width="5%">Image</th> --}}
            <th>Transaction ID</th>
            <th>Transaction Date</th>
            <th>Cashier Name</th>
            <th>No Items</th>
            <th>Total Amount</th>
            <th>Customer Name</th>
            <th>Status</th>
            <th>Actions</th>
        </thead>
        <tbody>

            @foreach ($teachers as $teacher)
                <tr>
                    {{-- <td> --}}
                    {{-- <div class="portrait-sm" style="background-color: {{ $teacher->color }};"> --}}
                    {{-- <p class="default-font my-0"> --}}
                    {{-- {{ $teacher->two_initials }}</p> --}}
                    {{-- </div> --}}
                    {{-- </td> --}}

                    <td>TR-30{{ $teacher->id }}</td>
                    <td>{{ now()->format('M d, Y') }}</td>
                    <td>{{ Faker\Factory::create()->randomElement(['Jenny Ablaza', 'Cloyd Alberto']) }}</td>
                    <td>{{ Faker\Factory::create()->randomNumber() }}</td>
                    <td>Php. {{ Faker\Factory::create()->randomFloat(2) }}</td>
                    <td>{{ Faker\Factory::create()->randomElement(['Jeanie Rivers', 'Sesanta Andre', 'Walk-In']) }}</td>
                    <td>
                        @php
                            $status = rand(0, 1);
                        @endphp

                        @if ($status === 0)
                            <span class="badge badge-pill badge-danger">Return</span>
                        @else
                            <span class="badge badge-pill badge-success">Sales</span>
                        @endif
                    </td>

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
