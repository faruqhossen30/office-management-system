@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Expense information</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                {{-- <a class="list-icons-item" data-action="collapse"></a> --}}
                                {{-- <a class="list-icons-item" data-action="reload"></a> --}}
                                {{-- <a class="list-icons-item" data-action="remove"></a> --}}
                            </div>
                            <div>
                                <a href="{{route('expenselist.create')}}" type="button" class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i class="icon-plus3"></i></b>Add Expense</a>
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
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th class="text-center">Date</th>
                                    <th>Expense Type</th>
                                    <th>Description</th>
                                    <th>Voucher No</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                    <th>Remarks</th>
                                    <th class="text-center">Office Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial = 1;
                                @endphp
                                @foreach ($expense_lists as $expense_list)
                                    <tr>
                                        <th scope="row">{{ $serial++ }}</th>
                                        <td>{{ $expense_list->date }}</td>
                                        <td>{{ $expense_list->expense_type }}</td>
                                        <td>{{ $expense_list->description }}</td>
                                        <td>{{ $expense_list->voucher_no }}</td>
                                        <td>{{ $expense_list->amount }}</td>
                                        <td>{{ $expense_list->payment_type }}</td>
                                        <td>{{ $expense_list->remarks }}</td>
                                        <td>{{ $expense_list->office->name }}</td>
                                        {{-- <td>{{$office->author_id}}</td> --}}

                                        <td>
                                            <div class="d-flex justify-content-start">
                                                <a href="#" class="btn btn-sm btn-info mr-1 icon-eye"></a>
                                                <a href="{{ route('expenselist.edit', $expense_list->id) }}"

                                                    class="btn btn-sm btn-success mr-1 icon-pencil7"></a>
                                                <form action="{{ route('expenselist.destroy', $expense_list->id) }}"
                                                    method="POST" style="display: inline-flex">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick=" return confirm('Are you  shure to delete?')"
                                                        class="btn btn-danger btn-sm icon-trash"></button>
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
