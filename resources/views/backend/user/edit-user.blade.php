@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card mt-4">
                <div class="card-header bg-light d-flex justify-content-between p-2 pl-3">
                    <h6 class="font-weight-semibold">Edit User</h6>
                </div>
                <div class="card-body">
                    <!-- Left aligned buttons -->
                    <div class="card-body">
                        <form action="{{ route('user-admin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Name<span class="text-danger">*</span></label>
                                <input name="name" type="text"
                                    class="form-control  @error('name')is-invalid @enderror " placeholder="Please enter your name"
                                    value="{{$user->name}}">
                                    <x-error name='name'/>
                            </div>
                            <div class="form-group">
                                <label>E-mail<span class="text-danger">*</span></label>
                                <input name="email" type="email"
                                    class="form-control  @error('email')is-invalid @enderror " placeholder="example@gmail.com"
                                    value="{{$user->email}}">
                                    <x-error name='email'/>
                            </div>
                            <div class="form-group">
                                <label>Password<span class="text-danger">*</span></label>
                                <input name="password" type="text"
                                    class="form-control  @error('password')is-invalid @enderror " placeholder="Please enter your password"
                                    value="">
                                    <x-error name='password'/>
                            </div>
                            <div class="form-group">
                                <label>Re-password<span class="text-danger">*</span></label>
                                <input name="password" type="text"
                                    class="form-control  @error('password')is-invalid @enderror " placeholder="Please enter Re-password"
                                    value="">
                                    <x-error name='password'/>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone<span class="text-danger">*</span></label>
                                        <input name="phone" type="text"
                                            class="form-control  @error('phone')is-invalid @enderror " placeholder="01xxxxxxxxxxx"
                                            value="{{$user->phone}}">
                                            <x-error name='phone'/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Roll<span class="text-danger">*</span></label>
                                        <input name="roll" type="text"
                                            class="form-control  @error('roll')is-invalid @enderror " placeholder="Please enter roll"
                                            value="{{$user->roll}}">
                                            <x-error name='roll'/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Image<span class="text-danger">*</span></label>
                                    <input type="file" name="photo" class="form-control  @error('photo')is-invalid @enderror" value="{{$user->photo}}">
                                    <x-error name='photo'/>
                                     <img class="img-thumbnail" style="width: 100px; height:100px; padding:5px" src="{{asset('/employee/photo/'.$user->photo)}}" alt="sdfsdf">
                                </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <button type="submit" class="btn bg-blue "> <i class="icon-floppy-disk mr-2"></i>Update
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
