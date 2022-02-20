@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="se-pre-con" style="display: none;"></div>
        <div class="row">
            <div class="col-md-8 offset-2 ">
                <div class="card mt-1 ">
                    <div class="card-header bg-light d-flex justify-content-between p-2 pl-3">
                        <h6 class="font-weight-semibold">Debit information</h6>
                        <a href="{{ route('expenselist.index') }}" type="button"
                            class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                    class="icon-menu7"></i></b>List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('expenselist.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>
                                            <h6>Amount<span class="text-danger">*</span></h6>
                                        </label>
                                        <input name="amount" type="number"
                                            class="form-control  @error('amount')is-invalid @enderror "
                                            placeholder="1,000 TK" value="{{ old('amount') }}">
                                        @error('amount')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>
                                            <h6>Select Office <span class="text-danger">*</span></h6>
                                        </label>
                                        <select name="office_id"
                                            class="form-control @error('office_id') is-invalid @enderror">
                                            <option value="">Select Office </option>
                                            @foreach ($offices as $office)
                                                <option value="{{ $office->id }}" @if(old('office_id') == $office->id) selected  @endif >{{ $office->name }}</option>
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
                             <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text">Debit Type<span class="text-danger">*</span></label>
                                            <div class="form-group mt-2 mr-1">
                                                <select class="form-control @error('expense_id') is-invalid @enderror"
                                                    name="expense_id">
                                                    <option value="">Select Debit type</option>
                                                    @foreach ($expenses as $item)
                                                        <option value="{{ $item->id }}"@if(old('expense_id') == $item->id) selected  @endif>{{ $item->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('expense_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text">Sub Debit Type<span class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <select class="form-control @error('sub_expense_type_id') is-invalid @enderror"
                                                    name="sub_expense_type_id">
                                                    <option>Select Sub Debit Type </option>
                                                    {{-- @foreach ($subexpensetype as $expence)
                                                        <option value="{{ $expence->id }}">{{ $expence->name }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                                {{-- <x-error name='sub_expense_type_id' /> --}}
                                                @error('sub_expense_type_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="bankselectId" value="{{ $bankselectId }}">
                                    <div class="form-group ml-1">
                                        <label class="text">
                                            <h6>Payment-System<span class="text-danger">*</span></h6>
                                        </label>
                                        <div class="form-group">
                                            <select class="form-control @error('payment_system_id') is-invalid @enderror"
                                                name="payment_system_id">
                                                <option value="">Select payment system </option>
                                                @foreach ($paymentsystems as $system)
                                                    <option value="{{ $system->id }}"@if(old('payment_system_id') == $system->id) selected  @endif>{{ $system->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('payment_system_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            <h6>Date<span class="text-danger">*</span></h6>
                                        </label>
                                        <input name="date" type="date"
                                            class="form-control  @error('date')is-invalid @enderror "
                                            placeholder="dd-mm-yyyy" value="{{ old('date') }}"min="1997-01-01" max="2030-12-31">
                                        @error('date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="bank_div">
                                <label class="text">Bank<span class="text-danger">*</span> </label>
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
                            <div class="row" id="mobile_div">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile<span class="text-danger">*</span></label>
                                        <input name="phone" type="text"
                                            class="form-control  @error('phone')is-invalid @enderror "
                                            placeholder="Please enter your phone number" value="{{ old('phone') }}">
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
                                            class="form-control  @error('transaction')is-invalid @enderror "
                                            placeholder="Please enter your tranjection id"
                                            value="{{ old('transaction') }}">
                                        @error('transaction')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>
                                            <h6>Voucher No</h6>
                                        </label>
                                        <input name="voucher_no" type="text"
                                            class="form-control  @error('voucher_no')is-invalid @enderror "
                                            placeholder="Please enter your voucher no" value="{{ old('voucher_no') }}">
                                        @error('voucher_no')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label>
                                            <h6>Desription </h6>
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
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>
                                            <h6>Remarks</h6>
                                        </label>
                                        <textarea name="remarks" type="text"
                                            class="form-control @error('remarks')is-invalid @enderror" rows="3"
                                            placeholder="Enter your remarks">{{ old('remarks') }}</textarea>
                                        @error('remarks')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between border-top pt-2">
                                <button type="submit" class="btn bg-blue"><i class="icon-floppy-disk mr-2"></i>Add Debit
                                </button>
                                <button type="submit" class="btn btn-danger">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('script')
    <script>
        // Bank for Check
        //  Banking
        var bank_div = $('#bank_div');
        bank_div.hide();

        $(document).on('change', 'select[name="payment_system_id"]', function() {
            var payment_system_id = $('select[name="payment_system_id"]').val();
            bank_div.hide();
            $.get('/bankingdata', function(data){
                if(data){
                    data.map(function(d){
                        if(d.paymentsystem_id == payment_system_id){
                            bank_div.show();
                        }

                    });
                }
            });
        });

        // Mobile Banking
        var mobile_div = $('#mobile_div');
            mobile_div.hide();

        $(document).on('change', 'select[name="payment_system_id"]', function() {
            var payment_system_id = $('select[name="payment_system_id"]').val();
            mobile_div.hide();
            $.get('/mobilebankingdata', function(data) {
                if (data) {
                    data.map(function(d) {
                        if (d.paymentsystem_id == payment_system_id) {
                            mobile_div.show();
                        }

                    });
                }
            });
        });
    </script>


<script>
    var expensetypeid = $('select[name="expense_id"]');
    var sub_expensetypeid = $('select[name="sub_expense_type_id"]');

    $(document).on('change', 'select[name="expense_id"]', function() {
        expensetype_id = expensetypeid.val();
        if(expensetype_id){
            $.ajax({
                url: `/subexpensebyexpense/${expensetype_id}`,
                type: 'GET',
                // dataType: 'JSON',
                success: function(data) {
                    if (data) {
                        sub_expensetypeid.empty()
                        data.forEach(function(cat){
                            sub_expensetypeid.append(`<option value="${cat.id}">${cat.name}</option>`)
                        })
                    }
                },
                fail: function(err) {
                    if (err) {
                        console.log(err);
                    }
                }
            })
        }
    });


</script>


    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    config ={

    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
    }
    flatpickr("input[type=date]", config);
</script> --}}
@endpush
