@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card mt-4">
                <div class="card-body">
                    <!-- Left aligned buttons -->
                    <div class="card">
                        <div class="card-header bg-light d-flex justify-content-between p-2 pl-3">
                            <h6 class="font-weight-semibold">Position information</h6>
                            <a href="{{ route('payment.index') }}" type="button"
                                class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                        class="icon-menu7"></i></b>List</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('position.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Position <span class="text-danger">*</span></label>
                                    <input name="position" type="text"
                                        class="form-control  @error('position')is-invalid @enderror"
                                        placeholder="please enter your payment system" value="{{old('position')}}" >
                                    @error('position')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group ml-1 mr-1">
                                    <label>
                                        <h6>Description <span class="text-danger">*</span></h6>
                                    </label>
                                    <textarea id="summernote" name="description" type="text"
                                        class="form-control @error('description')is-invalid @enderror" rows="3"
                                        placeholder="Enter your description">{{old('description')}}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-start align-items-center">
                                    <button type="reset" class="btn btn-light">reset</button>
                                    <button type="submit" class="btn bg-blue ml-3"> <i class="icon-floppy-disk mr-2"></i>Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /left aligned buttons -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
