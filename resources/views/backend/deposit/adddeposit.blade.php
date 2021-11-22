@extends('backend.layouts.app')

{{-- @yield('content') --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Add Deposit
                    </div>

                    <div class="card-body">
                        <!-- Left aligned buttons -->
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                {{-- <h6 class="card-title text-success">All amount information</h6> --}}
                                <div class="header-elements">
                                    <div class="list-icons">
                                        {{-- <a class="list-icons-item" data-action="collapse"></a> --}}
                                        {{-- <a class="list-icons-item" data-action="reload"></a> --}}
                                        {{-- <a class="list-icons-item" data-action="remove"></a> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('deposit.amount') }}" method="POST">
                                    @csrf
                                    {{-- <div class="form-group">
										<label>Author:</label>
										<input name="author" type="text" class="form-control  @error('author')is-invalid @enderror " placeholder="Your Author name">
                                        @error('author')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
									</div> --}}
                                    <div class="form-group">
                                        <label>Amount:</label>
                                        <input name="amount" type="text"
                                            class="form-control  @error('amount')is-invalid @enderror "
                                            placeholder="Your amount">
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
                                        <button type="submit" class="btn btn-light">Cancel</button>
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
