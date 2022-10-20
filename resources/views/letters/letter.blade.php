@extends('layouts.main')

@section('content')
    {{-- success flash --}}
    @if (Session::has('success'))
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Success</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                Your Letter Number is booked : <b>{{ Session::get('success') }}</b>
            </div>
        </div>
    @endif

    {{-- failed flash --}}
    @if (Session::has('failed'))
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Failed</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                Error Message : <b>{{ Session::get('failed') }}</b>
            </div>
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-12">
            <button class="btn btn-primary" data-toggle="modal" data-target="#bookModal">
                <i class="fas fa-plus"></i>
                Book a New Letter Number
            </button>
        </div>
    </div>

    {{-- main card of letter --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Your booked number list
            </h3>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Letter Number</th>
                        <th>Subject</th>
                        <th>Recipient</th>
                        <th>Status</th>
                        <th>Created Date Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($letters as $letter)
                        <tr>
                            <td>
                                <a href="{{ route('letter.show', $letter->slug) }}">
                                    {{ $letter->letterNumber }}
                                </a>
                            </td>
                            <td>{{ $letter->subject }}</td>
                            <td>{{ $letter->recipient }}</td>
                            <td>
                                <span class="badge badge-{{ $letter->status->color }}">
                                    {{ $letter->status->title }}
                                </span>
                            </td>
                            <td>{{ $letter->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


    @include('letters.bookNumber')
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('script')
    <script src='{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}'></script>
    <script src='{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}'></script>
    <script src='{{ asset('/plugins/datatables-responsive/js/dataTables.responsive.js') }}'></script>
    <script src='{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.js') }}'></script>
    <script src='{{ asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}'></script>
    <script src='{{ asset('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}'></script>
    <script src='{{ asset('plugins/jszip/jszip.js') }}'></script>
    <script src='{{ asset('plugins/pdfmake/pdfmake.js') }}'></script>
    <script src='{{ asset('plugins/pdfmake/vfs_fonts.js') }}'></script>
    <script src='{{ asset('plugins/datatables-buttons/js/buttons.html5.js') }}'></script>
    <script src='{{ asset('plugins/datatables-buttons/js/buttons.print.js') }}'></script>
    <script src='{{ asset('plugins/datatables-buttons/js/buttons.colVis.js') }}'></script>
    <script>
        $(document).ready(function($) {
            $.noConflict();

            @if (old() != null)
                $('#bookModal').modal('show');
            @endif

            $('#example1').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
