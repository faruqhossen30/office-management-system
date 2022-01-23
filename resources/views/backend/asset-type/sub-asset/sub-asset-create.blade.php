@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card mt-2">
                    <div class="card-header  bg-light d-flex justify-content-between">
                        <h6 class="card-title text-dark">Sub asset information insert</h6>
                        <a href="{{ route('sub-asset-type.index') }}" type="button"
                            class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i class="icon-menu7"></i></b>Sub
                            Asset List</a>
                    </div>
                    <div class="card-body">
                        <!-- Left aligned buttons -->

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card-body">
                            <form action="{{ route('sub-asset-type.store') }}" method="POST">
                                @csrf
                                {{-- @method('PUT') --}}
                                <div class="form-group">
                                    <label class="text">Asset Type<span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control @error('asset_type_id') is-invalid @enderror"
                                            name="asset_type_id">
                                            <option>Select asset_types </option>
                                            @foreach ($asset_types as $asset_type)
                                                <option value="{{ $asset_type->id }}">{{ $asset_type->asset_name}}</option>
                                            @endforeach
                                        </select>
                                        <x-error name='asset_type_id' />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Name<span class="text-danger">*</span></label>
                                    <input name="name" type="text" class="form-control  @error('name')is-invalid @enderror "
                                        placeholder="Your sub asset name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="d-flex justify-content-start align-items-center">
                                    <button type="submit" class="btn btn-light">Cancel</button>
                                    <button type="submit" class="btn bg-blue ml-2"><i class="icon-plus2 mr-2">Add Sub Asset
                                        </i></button>
                                </div>
                            </form>
                        </div>

                        <!-- /left aligned buttons -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
