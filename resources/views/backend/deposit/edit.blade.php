@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <!-- Left aligned buttons -->
                        <div class="card">
                            <div class="card-header bg-light d-flex justify-content-between p-2 pl-3">
                                <h6 class="font-weight-semibold">Deposite Information</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('deposit.update', $deposit->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Amount:</label>
                                        <input name="amount" type="text"
                                            class="form-control  @error('amount')is-invalid @enderror"
                                            value="{{ $deposit->amount }}">
                                        @error('amount')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="text">Payment-System:</label>
                                        <div class="form-group">
                                            <select class="form-control @error('payment_system_id') is-invalid @enderror"
                                                name="payment_system_id">
                                                <option value="">Select payment system </option>
                                                @foreach ( $paymentSystem as $payment)
                                                <option value="{{ $payment->id}}" @if ($payment->id == $deposit->payment_system_id) selected @endif >{{ $payment->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('payment_system_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text">Office-Name:</label>
                                        <div class="form-group">
                                            <select class="form-control @error('office_id') is-invalid @enderror"
                                                name="office_id">
                                                <option value=""> Select Office </option>
                                                @foreach ($offices as $office)
                                                    <option value="{{ $office->id }}" @if ($office->id == $deposit->office_id) selected @endif>
                                                        {{ $office->name }}</option>
                                                @endforeach

                                            </select>
                                            @error('office_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Date:</label>
                                        <input name="date" type="datetime-local"
                                            class="form-control @error('date')is-invalid @enderror"
                                            value="{{ $deposit->date }}">
                                        @error('date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center">
                                        <button type="submit" class="btn btn-light">Cancel</button>
                                        <button type="submit" class="btn bg-blue ml-3">Update deposit <i
                                                class="icon-paperplane ml-2"></i></button>
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