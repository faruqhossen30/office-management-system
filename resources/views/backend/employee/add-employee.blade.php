@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <!-- Left aligned buttons -->
                        <div class="card">
                            <div class="card-header bg-light d-flex justify-content-between p-2 pl-3">
                                <h6 class="font-weight-semibold">Position information</h6>
                                <a href="#" type="button"
                                    class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                            class="icon-menu7"></i></b>List</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('employee-information.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input name="name" type="text"
                                                    class="form-control  @error('name')is-invalid @enderror"
                                                    placeholder="please enter your name" value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input name="email" type="text"
                                                    class="form-control  @error('email')is-invalid @enderror"
                                                    placeholder="please enter your email" value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input name="phone" type="text"
                                                    class="form-control  @error('phone')is-invalid @enderror"
                                                    placeholder="please enter your phone" value="{{ old('phone') }}">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Alternative Phone</label>
                                                <input name="phone_alt" type="text"
                                                    class="form-control  @error('phone_alt')is-invalid @enderror"
                                                    placeholder="please enter your phone" value="{{ old('phone_alt') }}">
                                                @error('phone_alt')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input name="address" type="text"
                                                    class="form-control  @error('address')is-invalid @enderror"
                                                    placeholder="please enter your address" value="{{ old('address') }}">
                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City<span class="text-danger">*</span></label>
                                                <input name="city" type="text"
                                                    class="form-control  @error('city')is-invalid @enderror"
                                                    placeholder="please enter your city" value="{{ old('city') }}">
                                                @error('city')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Zip Code<span class="text-danger">*</span></label>
                                                <input name="zip_code" type="text"
                                                    class="form-control  @error('zip_code')is-invalid @enderror"
                                                    placeholder="please enter your zip code"
                                                    value="{{ old('zip_code') }}">
                                                @error('zip_code')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gender<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select class="form-control @error('gender') is-invalid @enderror"
                                                        name="gender">
                                                        <option value="">Select your gender </option>
                                                        <option value="male">male</option>
                                                        <option value="female">female</option>
                                                        <option value="other">other</option>
                                                    </select>
                                                    @error('gender')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text">Department<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select class="form-control @error('department') is-invalid @enderror"
                                                        name="department">
                                                        <option value="">Select your department </option>
                                                        <option value="IT">IT</option>
                                                        <option value="Marketing">Marketing</option>
                                                        <option value="other">other</option>
                                                    </select>
                                                    @error('department')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Position<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select class="form-control @error('position_id') is-invalid @enderror"
                                                        name="position_id">
                                                        <option value="">Select your position </option>
                                                        @foreach ($positions as $position)
                                                        <option value="{{$position->id}}">{{$position->position}}</option>
                                                       @endforeach

                                                    </select>
                                                    @error('position_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nid No<span class="text-danger">*</span></label>
                                                <input name="nid_no" type="text"
                                                    class="form-control  @error('nid_no')is-invalid @enderror"
                                                    placeholder="please enter your nid no" value="{{ old('nid_no') }}">
                                                @error('nid_no')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date of Birth<span class="text-danger">*</span></label>
                                                <input name="date_of_birth" type="date"
                                                    class="form-control  @error('date_of_birth')is-invalid @enderror"
                                                    placeholder="please enter your date of birth"
                                                    value="{{ old('date_of_birth') }}">
                                                @error('date_of_birth')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Covid-19 Vaccine</label>
                                                <div class="form-group">
                                                    <select
                                                        class="form-control @error('covid_vaccine') is-invalid @enderror"
                                                        name="covid_vaccine">
                                                        <option value="">Select your Vaccine </option>
                                                        <option value="Oxford–AstraZeneca3">Oxford–AstraZeneca3</option>
                                                        <option value="Pfizer–BioNTech">Pfizer–BioNTech</option>
                                                        <option value="Sinopharm-BIBP7"> Sinopharm BIBP7</option>
                                                        <option value="Sputnik-V"> Sputnik V</option>
                                                        <option value="Moderna">Moderna</option>
                                                    </select>
                                                    @error('covid_vaccine')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Join Date<span class="text-danger">*</span></label>
                                                <input name="join_date" type="date"
                                                    class="form-control  @error('join_date')is-invalid @enderror"
                                                    placeholder="please enter your date of birth"
                                                    value="{{ old('join_date') }}">
                                                @error('join_date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text">Office<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select class="form-control @error('office_id') is-invalid @enderror"
                                                        name="office_id">
                                                        <option value="">Select your office </option>
                                                        @foreach ($offices as $office)
                                                            <option value="{{$office->id}}">{{$office->name}}</option>
                                                          @endforeach

                                                    </select>
                                                    @error('office_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label> Image </label>
                                            <input type="file" name="photo" class="form-control  @error('photo')is-invalid @enderror">
                                                @error('photo')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>

                                    <div class="form-group ml-1 mr-1">
                                        <label>
                                            <h6>Description <span class="text-danger">*</span></h6>
                                        </label>
                                        <textarea name="description" type="text"
                                            class="form-control @error('description')is-invalid @enderror" rows="3"
                                            placeholder="Enter your description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center">
                                        <button type="reset" class="btn btn-light">reset</button>
                                        <button type="submit" class="btn bg-blue ml-3"> <i
                                                class="icon-floppy-disk mr-2"></i>Save
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
