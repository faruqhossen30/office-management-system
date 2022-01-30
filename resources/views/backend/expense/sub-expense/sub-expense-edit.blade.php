@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card mt-2">
                    <div class="card-header  bg-light d-flex justify-content-between">
                        <h6 class="card-title text-dark">Sub Expense information Edit</h6>

                    </div>
                    <div class="card-body">
                        <!-- Left aligned buttons -->

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card-body">
                            <form action="{{ route('sub-expense-type.update',$sub_expense->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="text">Expense Type<span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control @error('sub_expense_type_id') is-invalid @enderror"
                                            name="sub_expense_type_id">
                                            <option>Select Expense_types </option>
                                            @foreach ($expensetype as $expence)
                                                <option value="{{ $expence->id }}"@if ($expence->id == $sub_expense->sub_expense_type_id) selected @endif>{{ $expence->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-error name='sub_expense_type_id' />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Sub Expense Type<span class="text-danger">*</span></label>
                                    <input name="name" type="text" class="form-control  @error('name')is-invalid @enderror "
                                        placeholder="Your sub asset name" value="{{$sub_expense->name}}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="d-flex justify-content-start align-items-center">
                                    <button type="submit" class="btn btn-light">Cancel</button>
                                    <button type="submit" class="btn bg-blue ml-2"><i class="icon-plus2 mr-2">Update
                                            Expense
                                        </i></button>
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
