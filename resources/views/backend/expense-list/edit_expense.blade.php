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
                            <div class="card p-3">
                                <div class="row my-2">
                                    <div class="col-md-12">
                                        <div class="form-group mr-1">
                                            <label>
                                                <h6>Amount:</h6>
                                            </label>
                                            <input name="amount" type="number"
                                                class="form-control  @error('amount')is-invalid @enderror "
                                                placeholder="1,000 TK" value="{{$expense_list->amount}}">
                                            @error('amount')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group  mr-1">
                                            <label>
                                                <h6>Select Office :</h6>
                                            </label>
                                            <select name="office_id"
                                                class="form-control @error('payment_type') is-invalid @enderror"
                                                name="payment_type">
                                                <option value="">Select Office </option>
                                                @foreach ($offices as $office)
                                                    <option value="{{ $office->id }}" @if ($office->id == $expense_list->office_id) selected @endif >{{ $office->name }}</option>
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
                                            <label class="text">Debit Type:</label>
                                            <div class="form-group mt-2 mr-1">
                                                <select class="form-control @error('expense_id') is-invalid @enderror"
                                                    name="expense_id">
                                                    <option value="">Select expense type</option>
                                                    @foreach ($expenses as $item)
                                                        <option value="{{ $item->id }}" @if ( $item->id == $expense_list->expense_id) selected @endif>{{ $item->name }}</option>
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
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ml-1">
                                            <label class="text">
                                                <h6>Payment-System:</h6>
                                            </label>
                                            <div class="form-group">
                                                <select class="form-control @error('payment_system_id') is-invalid @enderror"
                                                    name="payment_system_id">
                                                    <option value="">Select payment system </option>
                                                    @foreach ($paymentsystems as $system)
                                                    <option value="{{$system->id}}" @if ($system->id == $expense_list->payment_system_id)  selected @endif>{{$system->name}}</option>

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
                                        <div class="form-group ml-1">
                                            <label>
                                                <h6>Date:</h6>
                                            </label>
                                            <input name="date" type="datetime-local"
                                                class="form-control  @error('date')is-invalid @enderror "
                                                value="{{ $expense_list->date }}">
                                            @error('date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group ml-1">
                                            <label>
                                                <h6>Voucher No:</h6>
                                            </label>
                                            <input name="voucher_no" type="text"
                                                class="form-control  @error('voucher_no')is-invalid @enderror "
                                                value="{{$expense_list->voucher_no}}">
                                            @error('voucher_no')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ml-1 mr-1">
                                    <label>
                                        <h6>Desription</h6>
                                    </label>
                                    <textarea name="description" type="text"
                                        class="form-control @error('description')is-invalid @enderror" rows="3"
                                        placeholder="Enter your description">{{$expense_list->description}}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>
                                            <h6>Remarks :</h6>
                                        </label>
                                        <textarea id="summernote" name="remarks" type="text"
                                            class="form-control @error('remarks')is-invalid @enderror" rows="3"
                                            placeholder="Enter your remarks">{{$expense_list->remarks}}</textarea>
                                        @error('remarks')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between border-top pt-2">
                                    <button type="submit" class="btn bg-blue"><i class="icon-floppy-disk mr-2"></i>Update Expanse
                                    </button>
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
