
@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Advance Salary  Information</h5>
                    <div class="header-elements">
                        <div>
                            <a href="{{ route('advance-salary.create') }}" type="button"
                                class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                        class="icon-plus3"></i></b>Add advance information</a>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Employee Name</th>
                                    <th>Amount</th>
                                    <th>Payment date</th>
                                    <th>Deduct month</th>
                                    {{-- <th>cause</th>
                                    <th>remarks</th> --}}
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial = 1;
                                @endphp
                                @foreach ($advancesalary as $advance_salarie)
                                    <tr>
                                        <th scope="row">{{ $serial++ }}</th>
                                        <td>{{$advance_salarie->employeename->name ?? 'Not found'}}</td>
                                        <td>{{ $advance_salarie->amount }}</td>
                                        {{-- <td>{{ $advance_salarie->payment_date }}</td> --}}
                                        <td>{{ Carbon\Carbon::parse($advance_salarie->payment_date)->diffForHumans() }}</td>
                                        <td>{{Carbon\Carbon::parse($advance_salarie->deduct_month)->format('F -Y')}}</td>
                                        {{-- <td>{{ $advance_salarie->cause}}</td>
                                        <td>{{ $advance_salarie->remarks}}</td> --}}
                                        <td>
                                            <div class="d-flex justify-content-start">
                                                <a href="#" class="btn btn-success btn-xm icon-eye "></a>
                                                <a href="#"
                                                    class="btn btn-warning btn-xm ml-1 icon-pencil7">
                                                </a>
                                                <form action="{{route('advance-salary.update',$advance_salarie->id)}}"
                                                    method="POST" style="display: inline-flex">
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
        </div>
        <!-- Bordered table -->

        <!-- /bordered table -->
    </div>
</div>
@endsection
