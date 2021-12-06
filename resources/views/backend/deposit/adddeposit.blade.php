@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between p-2 pl-3">
                        <h6 class="font-weight-semibold">Add Deposite Information</h6>
                        <a href="{{ route('deposit.view') }}" type="button"
                            class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                    class="icon-menu7"></i></b>List</a>
                    </div>
                    <div class="card-body">
                        <!-- Left aligned buttons -->

                        <div class="card-body">
                            <form action="{{ route('deposit.amount') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Amount:</label>
                                    <input name="amount" type="number"
                                        class="form-control  @error('amount')is-invalid @enderror " placeholder="1,000 TK"
                                        value="{{ old('amount') }}">
                                    @error('amount')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <input type="hidden" name="bankselectId" value="{{ $bankselectId }}">
                                <div class="form-group">
                                    <label class="text">Payment-System:</label>
                                    <div class="form-group">
                                        <select class="form-control @error('payment_system_id') is-invalid @enderror"
                                            name="payment_system_id">
                                            <option>Select payment system </option>
                                            @foreach ($paymentSystem as $payment)
                                                <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('payment_system_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group" id="bank_div">
                                    <label class="text">Bank </label>
                                    <div class="form-group">
                                        <select class="form-control @error('bank_id') is-invalid @enderror" name="bank_id">
                                            <option value="">Select bank </option>
                                            @foreach ($banks as $bank)
                                                <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('bank_id')
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
                                            <option value="">Select Office</option>
                                            @foreach ($offices as $office)
                                                <option value="{{ $office->id }}">{{ $office->name }}</option>
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
                                    <label>Deposit time:</label>
                                    <input name="date" type="datetime-local"
                                        class="form-control @error('date')is-invalid @enderror" placeholder="Your date">
                                    @error('date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
@push('script')
    <script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
    <script>
        var bank_div = $('#bank_div');
        bank_div.hide();

        var bankselectId = $('input[name="bankselectId"]').val();

        $(document).on('change', 'select[name="payment_system_id"]', function() {
            var payment_system_id = $('select[name="payment_system_id"]').val();
            if(bankselectId == payment_system_id){
                bank_div.show();
            }

        });
    </script>
@endpush
