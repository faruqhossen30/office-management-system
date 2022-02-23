@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="se-pre-con" style="display: none;"></div>
        <div class="row">
            <div class="col-md-8 offset-2 ">
                <div class="card mt-1 ">
                    <div class="card-header bg-light d-flex justify-content-between p-2 pl-3">
                        <h6 class="font-weight-semibold">Edit Debit information</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('expenselist.update', $expense_list->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="text"><b>Amount</b> <span
                                                class="text-danger">*</span></label>
                                        <input name="amount" type="number"
                                            class="form-control  @error('amount')is-invalid @enderror "
                                            placeholder="1,000 TK" value="{{ $expense_list->amount }}">
                                        @error('amount')
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

                                        <label class="text">
                                            <b> Select Office</b> <span class="text-danger">*</span>
                                        </label>

                                        <select name="office_id"
                                            class="form-control @error('payment_type') is-invalid @enderror"
                                            name="payment_type">
                                            <option value="">Select Office </option>
                                            @foreach ($offices as $office)
                                                <option value="{{ $office->id }}" @if ($office->id == $expense_list->office_id) selected @endif>
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text">
                                            <b> Debit Type</b> <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group">
                                            <select class="form-control @error('expense_id') is-invalid @enderror"
                                                name="expense_id">
                                                <option value="">Select expense type</option>
                                                @foreach ($expenses as $item)
                                                    <option value="{{ $item->id }}" @if ($item->id == $expense_list->expense_id) selected @endif>
                                                        {{ $item->name }}</option>
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
                                                @foreach ($subexpensetype as $expence)
                                                    <option value="{{ $expence->id }}" @if ($expence->id == $expense_list->sub_expense_type_id) selected @endif>{{ $expence->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-error name='sub_expense_type_id' />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text">
                                            <b>Payment-System </b> <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group">
                                            <select class="form-control @error('payment_system_id') is-invalid @enderror"
                                                name="payment_system_id">
                                                <option value="">Select payment system </option>
                                                @foreach ($paymentsystems as $system)
                                                    <option value="{{ $system->id }}" @if ($system->id == $expense_list->payment_system_id)  selected @endif>
                                                        {{ $system->name }}</option>

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
                                            <b>Date</b>
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input name="date" type="datetime-local"
                                            class="form-control  @error('date')is-invalid @enderror "
                                            value="{{$expense_list->date->format('Y-m-d')."T".$expense_list->date->format('H:i')}}">
                                        @error('date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            @if ($expense_list->phone)
                                <div class="row" id="mobile_div">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text">
                                                <b>Mobile</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="phone" type="text"
                                                class="form-control  @error('phone')is-invalid @enderror "
                                                placeholder="Please enter your phone number" value="{{$expense_list->phone}}">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <b> Transaction id</b>
                                            </label>
                                            <input name="transaction" type="text"
                                                class="form-control  @error('transaction')is-invalid @enderror "
                                                placeholder="Please enter your tranjection id"
                                                value="{{$expense_list->transaction}}">
                                            @error('transaction')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($expense_list->bank_id)
                                <div class="form-group" id="bank_div">
                                    <label class="text">
                                        <b>Bank</b><span class="text-danger">*</span>
                                    </label>
                                    <div class="form-group">
                                        <select class="form-control @error('bank_id') is-invalid @enderror" name="bank_id">
                                            <option value="">Select bank </option>
                                            @foreach ($banks as $bank)
                                                <option value="{{ $bank->id }}"@if ( $bank->id ==$expense_list->bank_id )

                                              selected  @endif>{{ $bank->name }}</option>
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

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ml-1">
                                        <label>
                                            <b>Voucher No</b>

                                        </label>
                                        <input name="voucher_no" type="text"
                                            class="form-control  @error('voucher_no')is-invalid @enderror "
                                            value="{{ $expense_list->voucher_no }}">
                                        @error('voucher_no')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label>
                                            <b> Description</b>
                                        </label>
                                        <textarea name="description" type="text"
                                            class="form-control @error('description')is-invalid @enderror" rows="3"
                                            placeholder="Enter your description">{{ $expense_list->description }}</textarea>
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
                                            <b>Remarks</b>
                                        </label>
                                        <textarea id="summernote" name="remarks" type="text"
                                            class="form-control @error('remarks')is-invalid @enderror" rows="3"
                                            placeholder="Enter your remarks">{{ $expense_list->remarks }}</textarea>
                                        @error('remarks')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex justify-content-between border-top pt-2">
                                <button type="submit" class="btn bg-blue"><i class="icon-floppy-disk mr-2"></i>Update
                                    Expanse
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
        // bank_div.hide();

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
            // mobile_div.hide();

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

@endpush
