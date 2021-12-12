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
                            <h6 class="font-weight-semibold">Update Department information</h6>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('department.update',$departments->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Department <span class="text-danger">*</span></label>
                                    <input name="department_name" type="text"
                                        class="form-control  @error('department_name')is-invalid @enderror"
                                        placeholder="please enter your department name" value="{{$departments->department_name}}" >
                                    @error('department_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-start align-items-center">
                                    <button type="reset" class="btn btn-light">reset</button>
                                    <button type="submit" class="btn bg-blue ml-3"> <i class="icon-floppy-disk mr-2"></i>Update
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
