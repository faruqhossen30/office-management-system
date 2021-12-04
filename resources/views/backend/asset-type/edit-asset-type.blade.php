@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="col-md-8 offset-2">
        <div class="card mt-3">
            <div class="row" style="padding: 30px;">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header  bg-light d-flex justify-content-between">
                            <h6 class="card-title text-dark">Update Asset Type</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('assettype.update',$asset_types->id)}}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row g-3 align-items-center mt-2">
                                    <div class="col-2">
                                        <label for="inputPassword6" class="col-form-label">Add Type  &nbsp; :</label>
                                    </div>
                                    <div class="col-10">
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

            </div>
        </div>
    </div>
</div>
@endsection
