@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card mt-4">
                <div class="card-header bg-light d-flex justify-content-between p-2 pl-3">
                    <h6 class="font-weight-semibold">Create User</h6>
                    <a href="{{ route('user-admin.index') }}" type="button"
                        class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                class="icon-menu7"></i></b>List</a>
                </div>
                <div class="card-body">
                    <!-- Left aligned buttons -->

                    <div class="card-body">
                        <form action="{{ route('user-admin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Name<span class="text-danger">*</span></label>
                                <input name="name" type="text"
                                    class="form-control  @error('name')is-invalid @enderror " placeholder="Please enter your name"
                                    value="{{ old('name') }}">
                                    <x-error name='name'/>
                            </div>
                            <div class="form-group">
                                <label>E-mail<span class="text-danger">*</span></label>
                                <input name="email" type="email"
                                    class="form-control  @error('email')is-invalid @enderror " placeholder="example@gmail.com"
                                    value="{{ old('email') }}">
                                    <x-error name='email'/>
                            </div>
                            <div class="form-group">
                                <label>Password<span class="text-danger">*</span></label>
                                <input name="password" type="text"
                                    class="form-control  @error('password')is-invalid @enderror " placeholder="Please enter your password"
                                    value="{{ old('password') }}">
                                    <x-error name='password'/>
                            </div>
                            <div class="form-group">
                                <label>Re-password<span class="text-danger">*</span></label>
                                <input name="password" type="text"
                                    class="form-control  @error('password')is-invalid @enderror " placeholder="Please enter Re-password"
                                    value="{{ old('password') }}">
                                    <x-error name='password'/>
                            </div>

                            {{-- <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            {{-- <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone<span class="text-danger">*</span></label>
                                        <input name="phone" type="text"
                                            class="form-control  @error('phone')is-invalid @enderror " placeholder="01xxxxxxxxxxx"
                                            value="{{ old('phone') }}">
                                            <x-error name='phone'/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Roll<span class="text-danger">*</span></label>
                                        <input name="roll" type="text"
                                            class="form-control  @error('roll')is-invalid @enderror " placeholder="Please enter roll"
                                            value="{{ old('roll') }}">
                                            <x-error name='roll'/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label> Image </label>
                                    <input type="file" name="photo" class="form-control  @error('photo')is-invalid @enderror">
                                    <x-error name='photo'/>
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
