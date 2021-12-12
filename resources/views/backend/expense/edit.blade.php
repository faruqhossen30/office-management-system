@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Add Debit
                    </div>
                    <div class="card-body">
                        <!-- Left aligned buttons -->
                        <div class="card">
                            <div>
                                <a href="{{ route('expense.index') }}" class="btn btn-primary btn-sm m-2">All Debit
                                    List</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('expense.update', $expense->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input name="name" type="text"
                                            class="form-control  @error('name')is-invalid @enderror "
                                            value="{{ $expense->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center">
                                        <button type="submit" class="btn btn-light">Cancel</button>
                                        <button type="submit" class="btn bg-blue ml-3">
                                            <i class="icon-plus2 mr-2 "></i>update
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
