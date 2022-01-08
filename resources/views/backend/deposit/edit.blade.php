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
                                        <label>Amount <span class="text-danger">*</span></label>
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
                                    <label>Cradit Source <span class="text-danger">*</span></label>
                                    <input name="source" type="text"
                                        class="form-control  @error('source')is-invalid @enderror " placeholder="please enter your cradit source"
                                        value="{{$deposit->source}}">
                                    @error('source')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                    <div class="form-group">
                                        <label class="text">Payment-System <span class="text-danger">*</span></label>
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
                                    @if ($deposit->phone )
                                    <div class="row" id="mobile_div">
                                        <div class="col-md-6">
                                                 <div class="form-group">
                                                     <label>Mobile <span class="text-danger">*</span></label>
                                                     <input name="phone" type="text"
                                                         class="form-control  @error('phone')is-invalid @enderror " placeholder="Please enter your phone number"
                                                         value="{{$deposit->phone}}">
                                                     @error('phone')
                                                         <div class="invalid-feedback">
                                                             {{ $message }}
                                                         </div>
                                                     @enderror
                                                </div>
                                           </div>
                                           <div class="col-md-6">
                                             <div class="form-group">
                                                 <label>Transaction id</label>
                                                 <input name="transaction" type="text"
                                                     class="form-control  @error('transaction')is-invalid @enderror " placeholder="Please enter your tranjection id"
                                                     value="{{$deposit->transaction}}">
                                                 @error('transaction')
                                                     <div class="invalid-feedback">
                                                         {{ $message }}
                                                     </div>
                                                 @enderror
                                            </div>
                                           </div>
                                     </div>
                                    @endif
                                     @if ($deposit->bank_id)
                                        <div class="form-group" id="bank_div">
                                            <label class="text">Bank<span class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <select class="form-control @error('bank_id') is-invalid @enderror" name="bank_id">
                                                    <option value="">Select bank </option>
                                                    @foreach ($banks as $bank)
                                                        <option value="{{ $bank->id }}" @if ($bank->id == $deposit->bank_id) selected @endif>{{ $bank->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('bank_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                     @endif
                                    <div class="form-group">
                                        <label class="text">Office-Name <span class="text-danger">*</span></label>
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
                                        <label>Date <span class="text-danger">*</span></label>
                                        <input name="date" type="datetime-local"
                                            class="form-control @error('date')is-invalid @enderror"
                                            value="{{$deposit->date->format('m/d/Y  h:m A')}}">
                                        @error('date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- <h1>{{ $deposit->date->format('m/d/Y  h:m A') }}</h1> --}}
                                    <div class="form-group ml-1 mr-1">
                                        <label>
                                            <h6>Remarks</h6>
                                        </label>
                                        <textarea name="remarks" type="text"
                                            class="form-control @error('remarks')is-invalid @enderror" rows="3"
                                            placeholder="Enter your remarks">{{$deposit->remarks }}</textarea>
                                        <x-error name='remarks' />
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
