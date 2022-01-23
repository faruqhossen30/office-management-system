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
                                <h6 class="font-weight-semibold">Update Employee information</h6>

                            </div>
                            <div class="card-body">
                                <form action="{{ route('employee-information.update',$employee->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <h5 class="font-weight-semibold text-center"><strong><u>Personal
                                                information</u></strong></h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input name="name" type="text"
                                                    class="form-control  @error('name')is-invalid @enderror"
                                                    placeholder="Full Name" value="{{$employee->name}}">
                                                <x-error name='name' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input name="email" type="email"
                                                    class="form-control  @error('email')is-invalid @enderror"
                                                    placeholder="example@gmail.com" value="{{$employee->email}}">
                                                <x-error name='email' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input name="phone" type="text"
                                                    class="form-control  @error('phone')is-invalid @enderror"
                                                    placeholder="01xxxxxxx" value="{{$employee->phone}}">
                                                <x-error name='phone' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input name="country" type="text"
                                                    class="form-control  @error('country')is-invalid @enderror"
                                                    placeholder="please enter your country" value="Bangladesh">
                                                <x-error name='country' />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City<span class="text-danger">*</span></label>
                                                <input name="city" type="text"
                                                    class="form-control  @error('city')is-invalid @enderror"
                                                    placeholder="city" value="{{$employee->city}}">
                                                <x-error name='city' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Zip Code<span class="text-danger">*</span></label>
                                                <input name="zip_code" type="text"
                                                    class="form-control  @error('zip_code')is-invalid @enderror"
                                                    placeholder=" zip code" value="{{$employee->zip_code}}">
                                                <x-error name='zip_code' />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Address<span class="text-danger">*</span></label>
                                                <input name="address" type="text"
                                                    class="form-control  @error('address')is-invalid @enderror"
                                                    placeholder="address" value="{{$employee->address}}">
                                                <x-error name='address' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nid No<span class="text-danger">*</span></label>
                                                <input name="nid_no" type="text"
                                                    class="form-control  @error('nid_no')is-invalid @enderror"
                                                    placeholder="2401670464" value="{{$employee->nid_no}}">
                                                <x-error name='nid_no' />
                                            </div>
                                        </div>
                                    </div>


                                    <h5 class="font-weight-semibold text-center"><strong><u>Positional
                                                information</u></strong></h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text">Department<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select
                                                        class="form-control @error('department_id') is-invalid @enderror"
                                                        name="department_id">
                                                        <option value="">Select your department </option>
                                                        @foreach ($departments as $department)
                                                            <option value="{{ $department->id }}"@if ( $department->id == $employee->department_id) selected @endif>
                                                                {{ $department->department_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-error name='department_id' />
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
                                                            <option value="{{ $position->id }}"@if ($position->id == $employee->position_id)

                                                          selected  @endif>
                                                                {{ $position->position }}</option>
                                                        @endforeach

                                                    </select>
                                                    <x-error name='position_id' />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Join Date<span class="text-danger">*</span></label>
                                                <input name="join_date" type="datetime-local"
                                                    class="form-control  @error('join_date')is-invalid @enderror"
                                                    placeholder="please enter your date of birth"
                                                    value="{{$employee->join_date->format('Y-m-d')."T".$employee->join_date->format('H:i')}}">
                                                <x-error name='join_date' />
                                            </div>
                                        </div>

                                    </div>

                                    <h5 class="font-weight-semibold text-center"><strong><u>Bio-Graphical
                                                Information</u></strong></h5>
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleSelectRounded0" >Marital Status<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select
                                                        class="form-control @error('marital_status') is-invalid @enderror"
                                                        id="exampleSelectRounded0"  name="marital_status">

                                                        <option value="">Select your marital status </option>
                                                        <option value="{{$employee->marital_status}}" selected>{{$employee->marital_status}}</option>
                                                        <option value="married">Married</option>
                                                        <option value="unmarid">Unmarid</option>

                                                    </select>
                                                    <x-error name='marital_status' />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label  for="exampleSelectRounded0">Blood Group<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select
                                                        class="form-control @error('blood_group') is-invalid @enderror"
                                                        id="exampleSelectRounded0" name="blood_group">

                                                        <option value="">Select your blood_group </option>
                                                        <option value="{{$employee->blood_group}}" selected>{{$employee->blood_group}}</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="O-">O-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>

                                                    </select>
                                                    <x-error name='blood_group' />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date of Birth<span class="text-danger">*</span></label>
                                                <input name="date_of_birth" type="datetime-local"
                                                    class="form-control  @error('date_of_birth')is-invalid @enderror"
                                                    placeholder=" date of birth" value="{{$employee->date_of_birth->format('Y-m-d')."T".$employee->date_of_birth->format('H:i')}}" name="date_of_birth">
                                                <x-error name='date_of_birth' />


                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label  for="exampleSelectRounded0">Gender<span class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select class="form-control @error('gender') is-invalid @enderror"
                                                    id="exampleSelectRounded0"  name="gender">
                                                    <option value="">Select your gender </option>
                                                    <option value="{{$employee->gender}}" selected>{{$employee->gender}}</option>
                                                    <option value="male">male</option>
                                                    <option value="female">female</option>
                                                    <option value="other">other</option>

                                                    </select>
                                                    <x-error name='gender' />
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <h6 class="font-weight-semibold text-center"><strong><u>Emergency Contact</u></strong>
                                    </h6>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Alternative Phone<span class="text-danger">*</span></label>
                                                <input name="phone_alt" type="text"
                                                    class="form-control  @error('phone_alt')is-invalid @enderror"
                                                    placeholder="01xxxxxxx" value="{{$employee->phone_alt}}">
                                                <x-error name='phone_alt' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label  for="exampleSelectRounded0">Covid-19 Vaccine<span class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select
                                                        class="form-control @error('covid_vaccine') is-invalid @enderror" id="exampleSelectRounded0"
                                                        name="covid_vaccine">

                                                        <option value="">Select your Vaccine </option>
                                                        <option value="{{$employee->covid_vaccine}}" selected>{{$employee->covid_vaccine}}</option>

                                                        <option value="Oxford–AstraZeneca3">Oxford–AstraZeneca3</option>
                                                        <option value="Pfizer–BioNTech">Pfizer–BioNTech</option>
                                                        <option value=" Sinopharm BIBP7"> Sinopharm BIBP7</option>
                                                        <option value="Sputnik V"> Sputnik V</option>
                                                        <option value="Moderna">Moderna</option>

                                                    </select>
                                                    <x-error name='covid_vaccine' />
                                                </div>
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
                                                            <option value="{{ $office->id }}"@if ($office->id == $employee->office_id)  selected @endif>{{ $office->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    <x-error name='office_id' />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Salaray Information  --}}
                                    <h6 class="font-weight-semibold text-center"><strong><u>Salary information</u></strong>
                                    </h6>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Basic Salary<span class="text-danger">*</span></label>
                                                <input name="basic_salary" type="number"
                                                    class="form-control  @error('basic_salary')is-invalid @enderror"
                                                    placeholder="0.00 TK" value="{{$employee->basic_salary}}">
                                                <x-error name='basic_salary' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>House Allowance<span class="text-danger">*</span> </label>
                                                <div class="input-group">
                                                    <input name="house_allowance" type="number"
                                                        class="form-control @error('house_allowance')is-invalid @enderror"
                                                        placeholder="10%" value="{{$employee->house_allowance}}" min="0" max="100" >
                                                    <span class="input-group-append">
                                                        <span class="input-group-text">TK</span>
                                                        <span class="input-group-text" id="house_tk">0.00</span>
                                                    </span>
                                                </div>

                                                <x-error name='house_allowance' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Medical Allowance<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input name="medical_allowance" type="number"
                                                        class="form-control @error('medical_allowance')is-invalid @enderror"
                                                        placeholder="10%" value="{{$employee->medical_allowance}}">
                                                    <span class="input-group-append">
                                                        <span class="input-group-text">TK</span>
                                                        <span class="input-group-text" id="medical_tk">0.00</span>
                                                    </span>
                                                </div>
                                                <x-error name='medical_allowance' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Conveyance Allowance<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input name="conveyance_allowance" type="number"
                                                        class="form-control @error('conveyance_allowance')is-invalid @enderror"
                                                        placeholder="10%" value="{{$employee->conveyance_allowance}}">
                                                    <span class="input-group-append">
                                                        <span class="input-group-text">TK</span>
                                                        <span class="input-group-text" id="conveyance_tk">0.00</span>
                                                    </span>
                                                </div>
                                                <x-error name='conveyance_allowance' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Other Allowance<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input name="other_allowance" type="number"
                                                        class="form-control @error('other_allowance')is-invalid @enderror"
                                                        placeholder="10%" value="{{$employee->other_allowance}}">
                                                    <span class="input-group-append">
                                                        <span class="input-group-text">TK</span>
                                                        <span class="input-group-text" id="other_tk">0.00</span>
                                                    </span>
                                                </div>
                                                <x-error name='other_allowance' />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gross Salary<span class="text-danger">*</span></label>
                                                <input name="gross_salary" type="number"
                                                    class="form-control  @error('gross_salary')is-invalid @enderror"
                                                    placeholder="0.00 TK" value="{{$employee->gross_salary}}" readonly>
                                                <x-error name='gross_salary' />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> Image <span class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-3">
                                                <input type="file" name="photo"
                                                    class="form-control dropify  @error('photo')is-invalid @enderror"
                                                    data-show-errors="true" data-errors-position="outside"
                                                    data-allowed-file-extensions="jpg jpeg png bmp"
                                                    data-max-file-size-preview="6M">
                                            </div>
                                            <x-error name='photo' />
                                            <img class="img-thumbnail" style="width: 250px; height:200px; padding:5px" src="{{asset('/employee/photo/'.$employee->photo)}}" alt="sdfsdf">
                                        </div>
                                    </div>
                                        <div class="form-group ml-1 mr-1">
                                            <label>
                                                <h6>Description <span class="text-danger">*</span></h6>
                                            </label>
                                            <textarea name="description" type="text"
                                                class="form-control @error('description')is-invalid @enderror" rows="3"
                                                placeholder="Enter your description">{{$employee->description}}</textarea>
                                            <x-error name='description' />
                                        </div>

                                        <div class="d-flex justify-content-start align-items-center">
                                            <button type="submit" class="btn bg-blue ml-3"> <i
                                                    class="icon-floppy-disk mr-2"></i>Update
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

    <link rel="stylesheet" href="{{ asset('assets/css/dropify.css') }}">
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
    {{-- For Calculation Salary --}}
    <script>
        var basic      = $("input[name='basic_salary']");
        var house      = $("input[name='house_allowance']");
        var medical    = $("input[name='medical_allowance']");
        var conveyance = $("input[name='conveyance_allowance']");
        var other      = $("input[name='other_allowance']");

        var grossSalary = $("input[name='gross_salary']");
        // For Show % TK
        var house_tk      = $('#house_tk');
        var medical_tk    = $('#medical_tk');
        var conveyance_tk = $('#conveyance_tk');
        var other_tk      = $('#other_tk');

        $(document).on("keyup change", "input[name='basic_salary'], input[name='house_allowance'], input[name='medical_allowance'], input[name='conveyance_allowance'], input[name='other_allowance']", function(){
            showTK();
            calculationSalary();
        });


        function showTK(){
            house_tk.text( (parseInt(basic.val()) * parseInt(house.val()))/100 );
            medical_tk.text( (parseInt(basic.val()) * parseInt(medical.val()))/100 );
            conveyance_tk.text( (parseInt(basic.val()) * parseInt(conveyance.val()))/100 );
            other_tk.text( (parseInt(basic.val()) * parseInt(other.val()))/100 );
        }

        function calculationSalary(){
            let totalSalary = parseInt(basic.val()) + parseInt(house_tk.text()) + parseInt(medical_tk.text()) + parseInt(conveyance_tk.text()) + parseInt(other_tk.text());
            grossSalary.val(totalSalary);
        }



    </script>
@endpush
