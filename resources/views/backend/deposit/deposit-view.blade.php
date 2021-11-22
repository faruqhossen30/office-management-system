@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Deposite Table</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            {{-- <a class="list-icons-item" data-action="collapse"></a> --}}
                            {{-- <a class="list-icons-item" data-action="reload"></a> --}}
                            {{-- <a class="list-icons-item" data-action="remove"></a> --}}
                        </div>
                        <div>
                            <a href="{{route('deposit')}}" class="btn btn-primary btn-sm m-2">Add Deposit</a>
                        </div>
                    </div>
                </div>
                @if (session('update'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('update')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif


                        @if (session('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{session('delete')}}</strong>
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
                                <th>Amount</th>
                                <th>Amount_type</th>
                                <th>Author_id</th>
                                <th>Office_id</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $serial=1;
                            @endphp
                            @foreach ($deposits as $deposit)
                            <tr>
                                <th scope="row">{{$serial++}}</th>
                                <td>{{$deposit->amount}}</td>
                                <td>{{$deposit->amount_type}}</td>
                                <td>{{$deposit->author_id}}</td>
                                <td>{{$deposit->office_id}}</td>
                                <td>{{$deposit->date}}</td>

                                <td>
                                    <a href="" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{'deposit/edit/'.$deposit->id}}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{'deposit/destroy/'.$deposit->id}}" onclick=" return confirm('Are you  shure to delete?')" class="btn btn-sm btn-danger">Delete</a>
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

