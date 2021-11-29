@extends('backend.layouts.app')

{{-- @yield('content') --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card mt-4">
                    <div class="card-body">
                        <!-- Left aligned buttons -->
                        <div class="card">
                            <div class="card-header bg-light d-flex justify-content-between p-2 pl-3" >
                                <h6 class="font-weight-semibold">Deposite Information</h6>
                                <a href="{{route('deposit.view')}}" type="button" class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i class="icon-menu7"></i></b>List</a>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('deposit.amount') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label>Amount:</label>
                                        <input name="amount" type="number"
                                            class="form-control  @error('amount')is-invalid @enderror "
                                            placeholder="1,000 TK">
                                        @error('amount')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label class="text">Payment-System:</label>
                                        <div class="form-group">
                                            <select class="form-control @error('amount_type') is-invalid @enderror"
                                                name="amount_type">
                                                <option value="">Select payment system </option>
                                                <option value="Bkash">Bkash</option>
                                                <option value="Rocket">Rocket</option>
                                                <option value="Nagot">Nagot</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Bank-Chaque">Bank-Chaque</option>
                                            </select>
                                            @error('amount_type')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text">Office-Name:</label>
                                        <div class="form-group">
                                            <select class="form-control @error('office_name') is-invalid @enderror"
                                                name="office_id">
                                                <option value="">Select Office</option>
                                                @foreach ($offices as $office)
                                                    <option value="{{ $office->id}}">{{ $office->name }}</option>
                                                @endforeach

                                            </select>
                                            @error('office_name')
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
                                        <button type="reset" class="btn btn-light">reset</button>
                                        <button type="submit" class="btn bg-blue ml-3"> <i class="icon-plus2 mr-2"></i>Add
                                            Deposit
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
