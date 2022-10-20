@extends('layouts.main')

@section('content')
    {{-- main card of letter --}}
    <div class="card col-lg-4 col-md-6">
        <div class="card-header">
            <h3 class="card-title">
                Detail of Letter Number <b>{{ $letter->letterNumber }}</b>
            </h3>
        </div>

        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Letter Number</th>
                        <td>{{ $letter->letterNumber }}</td>
                    </tr>
                    <tr>
                        <th>Subject</th>
                        <td>{{ $letter->subject }}</td>
                    </tr>
                    <tr>
                        <th>Recipient</th>
                        <td>{{ $letter->recipient }}</td>
                    </tr>
                    <tr>
                        <th>Booking Date Time</th>
                        <td>{{ $letter->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Last Update Date Time</th>
                        <td>{{ $letter->updated_at }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge badge-{{ $letter->status->color }}">
                                {{ $letter->status->title }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="card-footer">
            @if ($letter->status->id == 1)
                <button class="btn btn-danger" id="cancel">
                    <i class="fas fa-ban"></i>
                    Cancel Booking</button>
                <button class="btn btn-primary">
                    <i class="fas fa-upload"></i>
                    Upload Archive
                </button>
            @endif
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins\sweetalert2\sweetalert2.min.css') }}">
@endsection

@section('script')
    <script src='{{ asset('/plugins/sweetalert2/sweetalert2.all.min.js') }}'></script>
    <script>
        $('#cancel').click(function(e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('/letter/cancel', {
                            slug: '{{ $letter->slug }}',
                        })
                        .then(function(response) {
                            if (response.data == 'success') {
                                Swal.fire(
                                    'Cancelled!',
                                    'Your number has been cancel.',
                                    'success'
                                ).then(function(params) {
                                    location.reload();
                                })
                            } else {
                                Swal.fire(
                                    'Cancel Failed!',
                                    response.data,
                                    'error'
                                );
                                console.log(response);
                            }
                        })
                        .catch(function(error) {
                            Swal.fire(
                                'Cancel Failed!',
                                error,
                                'error'
                            )
                        });

                }
            })
        })
    </script>
@endsection
