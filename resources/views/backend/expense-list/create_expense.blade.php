@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="se-pre-con" style="display: none;"></div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="card mt-1 ">
                    <div class="card-header mr-3 ml-3">
                        <div class="panel-heading">
                            <div class="panel-title ">
                                <h4> Expense Sheet </h4>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <form action="{{ route('expenselist.store') }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="row my-2">
                                    <div class="col-md-6">
                                        <div class="form-group ml-1">
                                            <label>
                                                <h6>Date:</h6>
                                            </label>
                                            <input name="date" type="datetime-local"
                                                class="form-control  @error('date')is-invalid @enderror "
                                                placeholder="Please enter your date">
                                            @error('date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text">Expense Type:</label>
                                            <div class="form-group mt-2 mr-1">
                                                <select class="form-control @error('expense_type') is-invalid @enderror"
                                                    name="expense_type">
                                                    <option value="">Select expense type</option>
                                                    @foreach ($expenses as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('expense_type')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ml-1 mr-1">
                                    <label>
                                        <h6>Desription</h6>
                                    </label>
                                    <textarea id="summernote" name="description" type="text"
                                        class="form-control @error('description')is-invalid @enderror" rows="3"
                                        placeholder="Enter your description"></textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ml-1">
                                            <label for="exampleInputPassword1">
                                                <h6>Voucer No</h6>
                                            </label>
                                            <input name="voucher_no" type="text"
                                                class="form-control @error('voucher_no')is-invalid @enderror"
                                                id="exampleInputPassword1" placeholder="Enter your voucer No">
                                            @error('voucher_no')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mr-1">
                                            <label>
                                                <h6>Amount:</h6>
                                            </label>
                                            <input name="amount" type="text"
                                                class="form-control  @error('amount')is-invalid @enderror "
                                                placeholder="Please enter your amount">
                                            @error('amount')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ml-1">
                                            <label class="text">
                                                <h6>Payment-System:</h6>
                                            </label>
                                            <div class="form-group">
                                                <select class="form-control @error('payment_type') is-invalid @enderror"
                                                    name="payment_type">
                                                    <option value="">Select payment system </option>
                                                    <option value="Bkash">Bkash</option>
                                                    <option value="Rocket">Rocket</option>
                                                    <option value="Nagot">Nagot</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Bank-Chaque">Bank-Chaque</option>
                                                </select>
                                                @error('payment_type')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>
                                                <h6>Remarks :</h6>
                                            </label>
                                            <input name="remarks" type="text"
                                                class="form-control  @error('remarks')is-invalid @enderror "
                                                placeholder="Your amount">
                                            @error('remarks')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group  mr-1">
                                            <label>
                                                <h6>Select Office :</h6>
                                            </label>
                                            <select name="office_id" class="form-control @error('payment_type') is-invalid @enderror"
                                                name="payment_type">
                                                <option value="">Select Office </option>
                                                @foreach ($offices as $office)
                                                    <option value="{{$office->id}}">{{$office->name}}</option>
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
                                <div class="d-flex justify-content-start align-items-center">
                                    <button type="submit" class="btn btn-light ml-5 mb-2">Cancel</button>
                                    <button type="submit" class="btn bg-blue ml-3 mb-2"><i class="icon-plus2 mr-2"></i>Add
                                        Expanse </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
