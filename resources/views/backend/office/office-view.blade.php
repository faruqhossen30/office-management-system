@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-2">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Add Office information</h5>
                        <div class="header-elements">

                            <div>
                                <a href="{{ route('office') }}" type="button"
                                    class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                            class="icon-plus3"></i></b>Add Office</a>
                            </div>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Office Name</th>
                                    <th>Address</th>
                                    <th class="text-center">Manager Name</th>
                                    <th>Mobile</th>
                                    <th>Telephone</th>
                                    <th class="text-center">Email</th>
                                    <th>Author</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial = 1;
                                @endphp
                                @foreach ($offices as $office)
                                    <tr>
                                        <th scope="row">{{ $serial++ }}</th>
                                        <td>{{ $office->name }}</td>
                                        <td>{{ $office->address }}</td>
                                        <td>{{ $office->manager_name }}</td>
                                        <td>{{ $office->mobile }}</td>
                                        <td>{{ $office->telephone }}</td>
                                        <td>{{ $office->email }}</td>
                                        <td>{{ $office->author->name}}</td>

                                        <td>
                                            <div class="d-flex justify-content-start">
                                                {{-- <a href="#" class="btn btn-success btn-xm icon-eye "></a> --}}
                                                <a href="{{ route('office.edit', $office->id) }}"
                                                    class="btn btn-sm btn-info ml-1 mr-1 icon-pencil7"><a>
                                                        <a href="{{ route('office.destroy', $office->id) }}"
                                                            onclick=" return confirm('Are you  shure to delete?')"
                                                            class="btn btn-sm btn-danger
                                                            icon-trash"></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Bordered table -->

            <!-- /bordered table -->
        </div>
    </div>

@endsection
@push('css')
    <style>
        .table td,
        .table th {
            padding: .55rem .55rem .55rem .75rem;
            vertical-align: top;
            border-top: 1px solid #ddd;
        }

    </style>
@endpush
