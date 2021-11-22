@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Office information</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                {{-- <a class="list-icons-item" data-action="collapse"></a> --}}
                                {{-- <a class="list-icons-item" data-action="reload"></a> --}}
                                {{-- <a class="list-icons-item" data-action="remove"></a> --}}
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
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Manager_Name</th>
                                    <th>Mobile</th>
                                    <th>Telephone</th>
                                    <th>Email</th>
                                    <th>Authore id</th>
                                    <th>Action</th>
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
                                        {{-- <td>{{$office->author_id}}</td> --}}

                                        <td>
                                            <div class="d-flex justify-content-start">
                                                <a href="{{ route('office.edit', $office->id) }}"
                                                    class="btn btn-sm btn-info mr-1">Edit<a>
                                                        <a href="{{ route('office.destroy', $office->id) }}"
                                                            onclick=" return confirm('Are you  shure to delete?')"
                                                            class="btn btn-sm btn-danger">Delete</a>
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
