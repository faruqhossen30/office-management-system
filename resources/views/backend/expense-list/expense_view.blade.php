@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-2">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Expense information</h5>
                        <div class="header-elements">
                            <div>
                                <a href="{{ route('expenselist.create') }}" type="button"
                                    class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                            class="icon-plus3"></i></b>Add Expense</a>
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
                        <div class="d-flex justify-content-between">
                            <ul class="list-group list-group-horizontal">
                                <a href="{{ route('expenselist.index') }}"
                                    class="list-group-item btn btn-primary text-dark @if (request()->routeIs('expenselist.index')) active @endif">All TIme</a>
                                <a href="{{ route('expense.list.week') }}"
                                    class="list-group-item btn btn-primary text-dark @if (request()->routeIs('expense.list.week')) active @endif">This week</a>
                                <a href="{{ route('expense.list.month') }}"
                                    class="list-group-item btn btn-primary text-dark @if (request()->routeIs('expense.list.month')) active @endif">This
                                    Month</a>
                            </ul>
                            <div>
                                <button class="btn btn-primary btn-lg mt-1">Total: {{ $total }} TK</button>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Amount</th>
                                        <th>Office Name</th>
                                        <th>Payment Type</th>
                                        <th>Expense Type</th>
                                        <th class="text-center">Expense Date</th>
                                        <th class="text-center">Entry Date</th>
                                        <th>Author</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expense_lists as $expense_list)
                                        <tr>
                                            <th scope="row">{{ $expense_lists->firstItem() + $loop->index }}</th>
                                            <td><strong>{{ $expense_list->amount }}Tk</strong></td>
                                            <td>{{ $expense_list->office->name }}</td>
                                            <td>{{ $expense_list->expencetype->name }}</td>
                                            <td>{{ $expense_list->paymentsystem->name }}</td>
                                            <td>{{ Carbon\Carbon::parse($expense_list->date)->diffForHumans() }}</td>
                                            {{-- Deposite date --}}
                                            <td>{{ Carbon\Carbon::parse($expense_list->created_at)->diffForHumans() }}
                                            </td>
                                            <td>{{ $expense_list->author->name}}</td>
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
                            <div class="my-3">
                                {{ $expense_lists->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bordered table -->

            <!-- /bordered table -->
        </div>
    </div>
@endsection

@push('css')
    <style>
        .table td,
        .table th {
            padding: .55rem .55rem .55rem .75rem;
            vertical-align: top;
            border-top: 1px solid #ddd;
        }

    </style>
@endpush
