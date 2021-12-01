@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card mt-4">
                <div class="card-body">
                    <!-- Left aligned buttons -->
                    <div class="card">
                        <div class="card-header bg-light d-flex justify-content-between p-2 pl-3" >
                            <h6 class="font-weight-semibold">Edit Payment Information</h6>
                            {{-- <a href="{{route('deposit.view')}}" type="button" class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i class="icon-menu7"></i></b>List</a> --}}
                        </div>
                        <div class="card-body">
                            <form action="{{ route('payment.update', $paymentsystem->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Payment System:</label>
                                    <input name="name" type="text"
                                        class="form-control  @error('name')is-invalid @enderror "
                                        placeholder="please enter your payment system" value="{{$paymentsystem->name}}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>
                                        <h6>Desription</h6>
                                    </label>
                                    <textarea name="description" type="text"
                                        class="form-control @error('description')is-invalid @enderror" rows="3"
                                        placeholder="Enter your description"> {{$paymentsystem->description}} </textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-start align-items-center">
                                    <button type="submit" class="btn bg-blue"> <i class="icon-floppy-disk mr-2"></i>Update
                                       Payment
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
