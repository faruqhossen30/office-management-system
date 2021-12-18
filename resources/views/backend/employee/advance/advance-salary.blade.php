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
                            <h6 class="font-weight-semibold"> Advance Salary information</h6>
                            <a href="{{ route('department.index') }}" type="button"
                                class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                        class="icon-menu7"></i></b>List</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('advance-salary.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Employee Name<span class="text-danger">*</span></label>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Amount<span class="text-danger">*</span></label>
                                            <input name="amount" type="text"
                                                class="form-control  @error('amount')is-invalid @enderror"
                                                placeholder="1000 TK " value="{{old('amount')}}" >
                                                <x-error name='amount' />
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Payment date<span class="text-danger">*</span></label>
                                            <input name="payment_date" type="datetime-local"
                                                class="form-control  @error('payment_date')is-invalid @enderror"
                                                placeholder="please enter your payment_date " value="{{old('payment_date')}}" >
                                                <x-error name='payment_date' />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Salary deduct month<span class="text-danger">*</span></label>
                                            <input name="deduct_month" type="month"
                                                class="form-control  @error('deduct_month')is-invalid @enderror"
                                                placeholder="please enter your deduct_month " value="{{old('deduct_month')}}" >
                                                <x-error name='deduct_month' />
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label>
                                        <h6>Cause <span class="text-danger">*</span></h6>
                                    </label>
                                    <textarea name="cause" type="text"
                                        class="form-control @error('cause')is-invalid @enderror" rows="3"
                                        placeholder="Enter your cause">{{ old('cause') }}</textarea>
                                    <x-error name='cause' />
                                </div>
                                <div class="form-group ">
                                    <label>
                                        <h6>Remarks <span class="text-danger">*</span></h6>
                                    </label>
                                    <textarea name="remarks" type="text"
                                        class="form-control @error('remarks')is-invalid @enderror" rows="3"
                                        placeholder="Enter your cause">{{ old('remarks') }}</textarea>
                                    <x-error name='remarks' />
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

