@extends('backend.layouts.app')
@section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     Update payment
                 </div>
                <div class="card-body">
                    <!-- Left aligned buttons -->
			             <div class="card">
							<div class="card-header header-elements-inline">
				                {{-- <h6 class="card-title">Update amount information</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div> --}}
							</div>

			                <div class="card-body">
			                	<form action="{{route('deposit.update', $deposit->id)}}" method="POST">
                                    @csrf
									{{-- <div class="form-group">
										<label>Author:</label>
										<input name="author" type="text" class="form-control  @error('author')is-invalid @enderror" value="{{$deposit->author}}">
                                        @error('author')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
									</div> --}}
									<div class="form-group">
										<label>Amount:</label>
										<input name="amount" type="text" class="form-control  @error('amount')is-invalid @enderror" value="{{$deposit->amount}}">
                                        @error('amount')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
									</div>
									<div class="form-group">
                                        <label class="text">Payment-System:</label>
                                        <div class="form-group">
                                            <select class="form-control @error('amount_type') is-invalid @enderror" name="amount_type"  value="{{$deposit->amount_type}}" >
                                                <option value="" > select-your-payment </option>
                                                <option value="Bkash">Bkash</option>
                                                <option value="Rocket">Rocket</option>
                                                <option value="Nagot">Nagot</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Bank-Chaque">Bank-Chaque</option>
                                            </select>
                                                @error('amount_type')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="text">Office-Name:</label>
                                        <div class="form-group">
                                            <select class="form-control @error('office_id') is-invalid @enderror" name="office_id"  value="{{$deposit->office_id}}" >
                                                <option value="" > select-your-payment </option>
                                                <option value="">Bkash</option>
                                                <option value="">Rocket</option>
                                                <option value="">Nagot</option>
                                                <option value="">Cash</option>
                                                <option value="">Bank-Chaque</option>
                                            </select>
                                                @error('office_id')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>

									<div class="form-group">
										<label>Date:</label>
										<input name="date" type="datetime-local" class="form-control @error('date')is-invalid @enderror" value="{{$deposit->date}}">
                                        @error('date')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                         @enderror
									</div>
									<div class="d-flex justify-content-start align-items-center">
										<button type="submit" class="btn btn-light">Cancel</button>
										<button type="submit" class="btn bg-blue ml-3">Update deposit <i class="icon-paperplane ml-2"></i></button>
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



