@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between p-2 pl-3">
                        <h6 class="font-weight-semibold">Add Lone Information</h6>
                        <a href="{{ route('deposit.view') }}" type="button"
                            class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                    class="icon-menu7"></i></b>List</a>
                    </div>
                    <div class="card-body">
                        <!-- Left aligned buttons -->
                        <div class="card-body">
                            <form action="{{ route('lone.store') }}" method="POST">
                                @csrf
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
                                <div class="form-group">
                                    <label>Permitted by: <span class="text-danger">*</span></label>
                                    <input name="permitted_by" type="text"
                                        class="form-control  @error('permitted_by')is-invalid @enderror " placeholder="employee name"
                                        value="{{ old('permitted_by') }}">
                                    @error('permitted_by')
                                        <div class="invalid-feedback">
                                            {{ $message }}

                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>
                                        <h6>Loan details </h6>
                                    </label>
                                    <textarea name="loan_details" type="text"
                                        class="form-control @error('loan_details')is-invalid @enderror" rows="3"
                                        placeholder="Enter your description">{{ old('loan_details') }}</textarea>
                                    <x-error name='loan_details' />
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Repayment_from: <span class="text-danger">*</span></label>
                                            <input name="repayment_from" type="datetime-local"
                                                class="form-control @error('repayment_from')is-invalid @enderror" value="{{ old('repayment_from') }}">
                                            @error('repayment_from')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Approve_date: <span class="text-danger">*</span></label>
                                            <input name="approve_date" type="datetime-local"
                                                class="form-control @error('approve_date')is-invalid @enderror"  value="{{ old('approve_date') }}">
                                            @error('approve_date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Apply_date: <span class="text-danger">*</span></label>
                                            <input name="apply_date" type="datetime-local"
                                                class="form-control @error('apply_date')is-invalid @enderror"  value="{{ old('apply_date') }}">
                                            @error('apply_date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Amount: <span class="text-danger">*</span></label>
                                    <input name="amount" type="number"
                                        class="form-control @error('amount')is-invalid @enderror" placeholder="amount" value="{{ old('amount') }}">
                                    @error('amount')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>installment_period <span class="text-danger">*</span></label>
                                    <input name="installment_period" type="number"
                                        class="form-control @error('installment_period')is-invalid @enderror" placeholder="installment_period"value="{{ old('installment_period') }}">
                                    @error('installment_period')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Installment: <span class="text-danger">*</span></label>
                                    <input name="Installment" type="number"
                                        class="form-control @error('Installment')is-invalid @enderror" placeholder="Installment"value="{{ old('Installment') }}">
                                    @error('Installment')
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
                        <!-- /left aligned buttons -->
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
