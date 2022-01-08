@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card mt-4">
                <div class="card-header bg-light d-flex justify-content-between p-2 pl-3" >
                    <h5 class="font-weight-semibold">Add Bank Information</h5>
                    <a href="{{route('bank.index')}}" type="button" class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i class="icon-menu7"></i></b>List</a>
                </div>
                <div class="card-body">
                    <!-- Left aligned buttons -->

                    <div class="card-body">
                        <form action="{{route('bank.store')}}" method="POST">
                            @csrf
                            <h4 class="card-title text-center">Bank Information</h4>
                            <hr>
                            <div class="form-group">
                                <label><b>Bank Name:</b></label>
                                <input name="name" type="text"
                                    class="form-control  @error('name')is-invalid @enderror "
                                    placeholder="Enter your bank name" value="{{old('name')}}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label><b>Branch name :</b></label>
                                <input name="branch_name" type="text"
                                    class="form-control  @error('branch_name')is-invalid @enderror "
                                    placeholder="Enter your bank name" value="{{old('branch_name')}}">
                                @error('branch_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label><b>Address :</b></label>
                                <input name="address" type="text"
                                    class="form-control  @error('address')is-invalid @enderror "
                                    placeholder="Enter your bank address" value="{{old('address')}}">
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <h4 class="card-title text-center">Account Information</h4>
                            <hr>
                            <div class="form-group">
                                <label><b>Account Number :</b></label>
                                <input name="account_number" type="text"
                                    class="form-control  @error('account_number')is-invalid @enderror "
                                    placeholder="Enter your bank account number" value="{{old('account_number')}}">
                                @error('account_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label><b>Account holder name :</b></label>
                                <input name="account_holder" type="text"
                                    class="form-control  @error('account_holder')is-invalid @enderror "
                                    placeholder="Enter your bank name" value="{{old('account_holder')}}">
                                @error('account_holder')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label><b>Mobile Number :</b></label>
                                <input name="mobile" type="text"
                                    class="form-control  @error('mobile')is-invalid @enderror "
                                    placeholder="Enter your mobile number" value="{{old('mobile')}}">
                                @error('mobile')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>
                                    <h6><b>Information :</b></h6>
                                </label>
                                <textarea  name="information" type="text"
                                    class="form-control @error('information')is-invalid @enderror" rows="3"
                                    placeholder="Enter your bank information">{{old('information')}}</textarea>
                                @error('information')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-start align-items-center">
                                <button type="submit" class="btn bg-blue "> <i class="icon-floppy-disk mr-2"></i>Save
                                </button>
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
