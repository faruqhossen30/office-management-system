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
                                <h6 class="font-weight-semibold">Salary information</h6>
                                <a href="{{ route('salary-setup.index') }}" type="button"
                                    class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                            class="icon-menu7"></i></b>List</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('salary-setup.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text">Employee Name<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select class="form-control @error('employee_id') is-invalid @enderror"
                                                        name="employee_id">
                                                        <option value="">Select employee </option>
                                                        @foreach ($employees as $employee)
                                                            <option value="{{ $employee->id }}">{{ $employee->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <x-error name='employee_id' />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text">Position<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select class="form-control @error('position_id') is-invalid @enderror"
                                                        name="position_id">
                                                        <option value="">Select position </option>

                                                        @foreach ($positions as $position)
                                                            <option value="{{ $position->id }}">
                                                                {{ $position->position }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <x-error name='position_id' />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text">Department<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select
                                                        class="form-control @error('department_id') is-invalid @enderror"
                                                        name="department_id">
                                                        <option value="">Select department </option>
                                                        @foreach ($departments as $department)
                                                            <option value="{{ $department->id }}">
                                                                {{ $department->department_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <x-error name='department_id' />
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="text">Office<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <select class="form-control @error('office_id') is-invalid @enderror"
                                                name="office_id">
                                                <option value="">Select office </option>
                                                @foreach ($offices as $office)
                                                    <option value="{{ $office->id }}">{{ $office->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-error name='office_id' />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Basic<span class="text-danger">*</span></label>
                                        <input name="basic" type="text"
                                            class="form-control  @error('basic')is-invalid @enderror"
                                            placeholder="please enter your basic" value="{{ old('basic') }}">
                                        <x-error name='basic' />
                                    </div>
                                    <div class="form-group">
                                        <label> Grow Salary<span class="text-danger">*</span></label>
                                        <input name="grow_salary" type="text"
                                            class="form-control  @error('grow_salary')is-invalid @enderror"
                                            placeholder="please enter your grow salary" value="{{ old('grow_salary') }}">
                                        <x-error name='grow_salary' />
                                    </div>
                                    <div class="form-group">
                                        <label>date<span class="text-danger">*</span></label>
                                        <input name="Payment_date" type="datetime-local"
                                            class="form-control  @error('Payment_date')is-invalid @enderror"
                                            placeholder="please enter your Payment_date"
                                            value="{{ old('Payment_date') }}">
                                        <x-error name='Payment_date' />
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
