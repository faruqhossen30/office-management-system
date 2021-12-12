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
                                <a href="{{route('employee-information.index')}}" type="button" class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                            class="icon-menu7"></i></b>List</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('employee-information.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <h5 class="font-weight-semibold text-center"><strong><u>Personal information</u></strong></h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input name="name" type="text"
                                                    class="form-control  @error('name')is-invalid @enderror"
                                                    placeholder="please enter your name" value="{{ old('name') }}">
                                                <x-error name='name' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input name="email" type="email"
                                                    class="form-control  @error('email')is-invalid @enderror"
                                                    placeholder="please enter your email" value="{{ old('email') }}">
                                                <x-error name='email' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input name="phone" type="text"
                                                    class="form-control  @error('phone')is-invalid @enderror"
                                                    placeholder="please enter your phone" value="{{ old('phone') }}">
                                                <x-error name='phone' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input name="country" type="text"
                                                    class="form-control  @error('country')is-invalid @enderror"
                                                    placeholder="please enter your country" value="{{ old('country') }}">
                                                <x-error name='country' />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City<span class="text-danger">*</span></label>
                                                <input name="city" type="text"
                                                    class="form-control  @error('city')is-invalid @enderror"
                                                    placeholder="please enter your city" value="{{ old('city') }}">
                                                <x-error name='city' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Zip Code<span class="text-danger">*</span></label>
                                                <input name="zip_code" type="text"
                                                    class="form-control  @error('zip_code')is-invalid @enderror"
                                                    placeholder="please enter your zip code"
                                                    value="{{ old('zip_code') }}">
                                                <x-error name='zip_code' />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input name="address" type="text"
                                                    class="form-control  @error('address')is-invalid @enderror"
                                                    placeholder="please enter your address" value="{{ old('address') }}">
                                                <x-error name='address' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nid No<span class="text-danger">*</span></label>
                                                <input name="nid_no" type="text"
                                                    class="form-control  @error('nid_no')is-invalid @enderror"
                                                    placeholder="please enter your nid no" value="{{ old('nid_no') }}">
                                                <x-error name='nid_no' />
                                            </div>
                                        </div>
                                    </div>


                                    <h5 class="font-weight-semibold text-center"><strong><u>Positional information</u></strong></h5>
                                    <div class="row">
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
                                                    <x-error name='department' />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Position<span class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select class="form-control @error('position_id') is-invalid @enderror"
                                                        name="position_id">
                                                        <option value="">Select your position </option>
                                                        @foreach ($positions as $position)
                                                            <option value="{{ $position->id }}">{{ $position->position }}</option>
                                                        @endforeach

                                                    </select>
                                                    <x-error name='position_id' />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Join Date<span class="text-danger">*</span></label>
                                                <input name="join_date" type="date"
                                                    class="form-control  @error('join_date')is-invalid @enderror"
                                                    placeholder="please enter your date of birth" value="{{ old('join_date') }}">
                                                <x-error name='join_date' />
                                            </div>
                                        </div>

                                    </div>

                                <h5 class="font-weight-semibold text-center"><strong><u>Bio-Graphical Information</u></strong></h5>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text">Marital Status<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <select class="form-control @error('marital_status') is-invalid @enderror"
                                                name="marital_status">
                                                <option value="">Select your marital status </option>
                                                <option value="married">married</option>
                                                <option value="Unmarid">Unmarid</option>
                                            </select>
                                            <x-error name='marital_status' />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date of Birth<span class="text-danger">*</span></label>
                                        <input name="date_of_birth" type="date"
                                            class="form-control  @error('date_of_birth')is-invalid @enderror"
                                            placeholder="please enter your date of birth"
                                            value="{{ old('date_of_birth') }}">
                                        <x-error name='date_of_birth' />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gender<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <select class="form-control @error('gender') is-invalid @enderror"
                                                name="gender">
                                                <option value="">Select your gender </option>
                                                <option value="male">male</option>
                                                <option value="female">female</option>
                                                <option value="other">other</option>
                                            </select>
                                            <x-error name='gender' />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <h6 class="font-weight-semibold text-center"><strong><u>Emergency Contact</u></strong></h6>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Alternative Phone</label>
                                        <input name="phone_alt" type="text"
                                            class="form-control  @error('phone_alt')is-invalid @enderror"
                                            placeholder="please enter your phone" value="{{ old('phone_alt') }}">
                                        <x-error name='phone_alt' />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Covid-19 Vaccine</label>
                                        <div class="form-group">
                                            <select class="form-control @error('covid_vaccine') is-invalid @enderror"
                                                name="covid_vaccine">
                                                <option value="">Select your Vaccine </option>
                                                <option value="Oxford–AstraZeneca3">Oxford–AstraZeneca3</option>
                                                <option value="Pfizer–BioNTech">Pfizer–BioNTech</option>
                                                <option value="Sinopharm-BIBP7"> Sinopharm BIBP7</option>
                                                <option value="Sputnik-V"> Sputnik V</option>
                                                <option value="Moderna">Moderna</option>
                                            </select>
                                            <x-error name='covid_vaccine' />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text">Office<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <select class="form-control @error('office_id') is-invalid @enderror"
                                                name="office_id">
                                                <option value="">Select your office </option>
                                                @foreach ($offices as $office)
                                                    <option value="{{ $office->id }}">{{ $office->name }}</option>
                                                @endforeach

                                            </select>
                                            <x-error name='office_id' />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Image </label>
                                <div class="row">
                                    <div class="col-3">
                                        <input type="file" name="photo"
                                        class="form-control dropify  @error('photo')is-invalid @enderror"
                                        data-show-errors="true"
                                        data-errors-position="outside"
                                        data-allowed-file-extensions="jpg jpeg png bmp"
                                        data-max-file-size-preview="1M"
                                        >
                                    </div>
                                    <x-error name='photo' />
                                </div>

                                <div class="form-group ml-1 mr-1">
                                    <label>
                                        <h6>Description <span class="text-danger">*</span></h6>
                                    </label>
                                    <textarea name="description" type="text"
                                        class="form-control @error('description')is-invalid @enderror" rows="3"
                                        placeholder="Enter your description">{{ old('description') }}</textarea>
                                    <x-error name='description' />
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
</div>
@endsection

@push('css')

    <link rel="stylesheet" href="{{asset('assets/css/dropify.css')}}">
@endpush

@push('script')
<script src="{{ asset('assets/js/dropify.js') }}"></script>
<script>
    $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop profile new photo or click',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
        }
    });
</script>
@endpush
