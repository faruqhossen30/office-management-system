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
                                <h6 class="font-weight-semibold">Debit Type Information</h6>
                                <a href="{{ route('expense.index') }}" type="button"
                                    class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                            class="icon-menu7"></i></b>List</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('expense.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Debit type:</label>
                                        <input name="name" type="text"
                                            class="form-control  @error('name')is-invalid @enderror "
                                            placeholder="Your expense type">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center">
                                        <button type="submit" class="btn btn-light">Cancel</button>
                                        <button type="submit" class="btn bg-blue ml-3"><i class="icon-plus2 mr-2"></i>Add
                                            Debit </button>
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
