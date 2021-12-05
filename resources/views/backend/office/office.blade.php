@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card mt-2">
                    <div class="card-header  bg-light d-flex justify-content-between">
                        <h6 class="card-title text-dark"> Office information</h6>
                        <a href="{{route('office.view')}}" type="button" class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i class="icon-menu7"></i></b>Office List</a>
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
                                <form action="{{ route('office.data') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input name="name" type="text"
                                            class="form-control  @error('name')is-invalid @enderror "
                                            placeholder="Your office name" value="{{old('name')}}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <input name="address" type="text"
                                            class="form-control  @error('address')is-invalid @enderror "
                                            placeholder="Your offfice address" value="{{old('address')}}">
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Manager_name:</label>
                                        <input name="manager_name" type="text"
                                            class="form-control @error('manager_name')is-invalid @enderror"
                                            placeholder="Your manager_name" value="{{old('manager_name')}}">
                                        @error('manager_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile:</label>
                                        <input name="mobile" type="number"
                                            class="form-control @error('mobile')is-invalid @enderror"
                                            placeholder="Your mobile number" value="{{old('mobile')}}">
                                        @error('mobile')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone:</label>
                                        <input name="telephone" type="tel"
                                            class="form-control @error('telephone')is-invalid @enderror"
                                            placeholder="Your telephone number" value="{{old('telephone')}}">
                                        @error('telephone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input name="email" type="email"
                                            class="form-control @error('email')is-invalid @enderror"
                                            placeholder="Your email number" value="{{old('email')}}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center">
                                        {{-- <button type="submit" class="btn btn-light">Cancel</button> --}}
                                        <button type="submit" class="btn bg-blue "><i class="icon-plus2 mr-2">Add office
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
