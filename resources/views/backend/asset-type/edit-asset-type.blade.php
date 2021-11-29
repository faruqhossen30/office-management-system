@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card mt-3">
            <div class="row" style="padding: 30px;">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('assettype.update',$asset_types->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <h5>
                                    <center>Add asset type</center>
                                </h5>
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label for="inputPassword6" class="col-form-label"> Add Type*</label>
                                    </div>
                                    <div class="col-auto">
                                        <input name="asset_name" type="text" id="inputPassword6"
                                            class="form-control @error('asset_name')is-invalid @enderror"
                                            value="{{ $asset_types->asset_name }}"  aria-describedby="passwordHelpInline">
                                        @error('asset_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col mt-3">
                                        <div class="form-group form-group-margin text-right">
                                            <button type="reset" class="btn bg-danger ml-3 mb-2">Reset</button>
                                            <button type="submit" class="btn bg-blue ml-1 mb-2">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <h5>
                                    <center> Asset Type List</center>
                                </h5>
                                <hr>
                                <div class="card">
                                    <table class="table datatable-html">
                                        <thead>
                                            <tr>
                                                <th>sL</th>
                                                <th>Asset Name</th>
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
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                              </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
