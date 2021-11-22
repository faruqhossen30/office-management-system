@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Add office
                    </div>
                    <div class="card-body">
                        <!-- Left aligned buttons -->
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h6 class="card-title text-success">All office information</h6>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        {{-- <a class="list-icons-item" data-action="collapse"></a> --}}
                                        {{-- <a class="list-icons-item" data-action="reload"></a> --}}
                                        {{-- <a class="list-icons-item" data-action="remove"></a> --}}
                                    </div>
                                </div>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="card-body">
                                <form action="{{ route('office.update', $office->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input name="name" type="text"
                                            class="form-control  @error('name')is-invalid @enderror "
                                            value="{{ $office->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <input name="address" type="text"
                                            class="form-control  @error('address')is-invalid @enderror "
                                            value="{{ $office->address }}">
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Manager_name:</label>
                                        <input name="manager_name" type="text"
                                            class="form-control @error('manager_name')is-invalid @enderror"
                                            value="{{ $office->manager_name }}">
                                        @error('manager_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile:</label>
                                        <input name="mobile" type="number"
                                            class="form-control @error('mobile')is-invalid @enderror"
                                            value="{{ $office->mobile }}">
                                        @error('mobile')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone:</label>
                                        <input name="telephone" type="tel"
                                            class="form-control @error('telephone')is-invalid @enderror"
                                            value="{{ $office->telephone }}">
                                        @error('telephone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input name="email" type="email"
                                            class="form-control @error('email')is-invalid @enderror"
                                            value="{{ $office->email }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group">
										<label>Author_id:</label>
										<input name="author_id" type="author_id" class="form-control @error('author_id')is-invalid @enderror"value="{{$office->author_id}}">
                                        @error('author_id')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                         @enderror
									</div> --}}
                                    <div class="d-flex justify-content-start align-items-center">
                                        {{-- <button type="submit" class="btn btn-light">Cancel</button> --}}
                                        <button type="submit" class="btn bg-blue ml-3"> <i class="icon-plus2 mr-2"></i>
                                            office update
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
