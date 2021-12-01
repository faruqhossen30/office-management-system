@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Payment list Information</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                {{-- <a class="list-icons-item" data-action="collapse"></a> --}}
                                {{-- <a class="list-icons-item" data-action="reload"></a> --}}
                                {{-- <a class="list-icons-item" data-action="remove"></a> --}}
                            </div>
                            <div>
                                <a href="{{route('payment.create')}}" type="button" class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i class="icon-plus3"></i></b>Add Payment</a>
                            </div>
                        </div>
                    </div>
                    @if (session('update'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('update') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    @if (session('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('delete') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Payment System</th>
                                    <th>Description</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial = 1;
                                @endphp
                                @foreach ($PaymentSystems as $PaymentSystem)
                                    <tr>
                                        <th scope="row">{{ $serial++ }}</th>
                                        <td>{{  $PaymentSystem->name }}</td>
                                        <td>{{ $PaymentSystem->description }}</td>
                                        <td>{{  $PaymentSystem->user->name }}</td>



                                        <td>
                                            <div class="d-flex justify-content-start">
                                                <a href="#" class="btn btn-success btn-xm icon-eye "></a>
                                                <a href="{{ route('payment.edit', $PaymentSystem->id) }}"
                                                    class="btn btn-warning btn-xm ml-1 icon-pencil7">
                                                </a>
                                                <form action="{{ route('payment.destroy', $PaymentSystem->id) }}" method="POST"
                                                    style="display: inline-flex">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick=" return confirm('Are you  shure to delete?')"
                                                        class="btn btn-danger btn-xm ml-1  icon-trash"></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Bordered table -->

            <!-- /bordered table -->
        </div>
    </div>
@endsection
