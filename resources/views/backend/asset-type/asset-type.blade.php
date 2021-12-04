@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="row" style="padding: 30px;">
                    <div class="col-sm-4">
                        <div class="card">
                        <div class="card-header bg-light d-flex justify-content-between p-2 pl-3" >
                            <h6 class="font-weight-semibold">Add Asset Type</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('assettype.store') }}" method="POST">
                                @csrf
                                <div class="row g-3 align-items-center mt-3">
                                    <div class="col-md-4">
                                        <label for="inputPassword6" class="col-form-label"> Add Type &nbsp; : </label>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="asset_name" type="text" id="inputPassword6"
                                            class="form-control @error('asset_name')is-invalid @enderror"
                                            aria-describedby="passwordHelpInline">
                                        @error('asset_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col mt-3">
                                        <div class="form-group form-group-margin text-right">
                                            <button type="reset" class="btn bg-danger ml-3 mb-2">Reset</button>
                                            <button type="submit" class="btn bg-blue ml-1 mb-2">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                    <div class="col-sm-8">
                        <div class="card ">
                            <div class="card-header bg-light d-flex justify-content-between p-2 pl-3" >
                                <h6 class="font-weight-semibold">Asset List Information</h6>
                            </div>
                                <table class="table datatable-html">
                                    <thead>
                                        <tr>
                                            <th>sL</th>
                                            <th >Asset Name</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $serial = 1;
                                        @endphp
                                        @foreach ($asset_types as $asset_type)
                                            <tr>
                                                <th scope="row">{{ $serial++ }}</th>
                                                <td>{{ $asset_type->asset_name }}</td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-success btn-sm icon-eye"></a>
                                                    <a href="{{ route('assettype.edit', $asset_type->id) }}"
                                                        class="btn btn-warning btn-sm icon-pencil7">
                                                    </a>
                                                    <form action="{{ route('assettype.destroy', $asset_type->id) }}"
                                                        method="POST" style="display: inline-flex">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick=" return confirm('Are you  shure to delete?')"
                                                            class="btn btn-danger btn-sm icon-trash"></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                    </div>
                </div>
            </div>
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
