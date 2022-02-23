@extends('backend.layouts.app')
@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('expense.list.finddate') }}" method="GET">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Find debit
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group ml-2">
                            <label class="" for="from_date">Find
                                date</label>
                            <input type="date" name="from_date" class="form-control " id="from_date">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-2">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Debit information</h5>
                        <div class="header-elements">
                            <div>
                                <a href="{{ route('expenselist.create') }}" type="button"
                                    class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                            class="icon-plus3"></i></b>Add Debit</a>
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
                        
                        <div class="d-flex justify-content-between" >
                            <ul class="list-group list-group-horizontal" style="padding: 20px 0px" id="fealtering">
                                <a href="{{ route('expenselist.index') }}"
                                    class="list-group-item btn btn-primary text-dark @if (request()->routeIs('expenselist.index')) active @endif">All
                                    TIme</a>
                                <a href="{{ route('expense.list.week') }}"
                                    class="list-group-item btn btn-primary text-dark @if (request()->routeIs('expense.list.week')) active @endif">This
                                    week</a>
                                <a href="{{ route('expense.list.month') }}"
                                    class="list-group-item btn btn-primary text-dark @if (request()->routeIs('expense.list.month')) active @endif">This
                                    Month</a>
                            </ul>
                            <form action="{{ route('expense.list.date') }}" method="GET">

                                <div class="row">
                                    <div class="mt-4">
                                        <button type="button"
                                            class="btn btn-primary btn-sm">Total:{{ $total }}</button>
                                    </div>
                                    <div class="form-group ml-2">
                                        <label class="" for="from_date">From</label>
                                        <input type="date" name="from_date" class="form-control " id="from_date"
                                            placeholder="From"
                                            value="{{ $_GET['from_date'] ?? '' }}">
                                    </div>
                                    <div class="form-group ml-2">
                                        <label class="" for="to_date">To</label>
                                        <input type="date" name="to_date" class="form-control" id="to_date"
                                            placeholder="To"
                                            value=" {{ $_GET['to_date'] ?? '' }}">

                                    </div>
                                    <div class="mt-4 ml-2">
                                        <input type="submit"class="btn btn-secondary btn-sm" value="search">
                                    </div>
                                    <!---------- start current date------------------>


                                    <div class="mt-4 ml-2">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#exampleModal ">
                                            Find
                                        </button>

                                        <!-- Modal -->

                                    </div>
                                    <!----------end current date------------------>
                                </div>
                            </form>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sl</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Office Name</th>
                                        <th class="text-center">Expense Type</th>
                                        <th class="text-center">Sub Expense Type</th>
                                        <th class="text-center">Payment Type</th>
                                        <th class="text-center">Expense Date</th>
                                        <th class="text-center">Remarks</th>
                                        {{-- <th>Author</th> --}}
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expense_lists as $expense_list)
                                        <tr>

                                            <th scope="row">{{ $expense_lists->firstItem() + $loop->index }}</th>
                                            <td><strong>{{ $expense_list->amount }}Tk</strong></td>
                                            <td>{{ $expense_list->office->name }}</td>
                                            <td>{{ $expense_list->expencetype->name ?? '' }}</td>
                                            <td>{{ $expense_list->subexpense->name ?? '' }}</td>

                                            <td>{{ $expense_list->paymentsystem->name }}</td>
                                            <td>{{ Carbon\Carbon::parse($expense_list->date)->format('d M Y') }}</td>
                                            <td>
                                                @if ($expense_list->remarks)
                                                    {{ Str::words($expense_list->remarks, 2) }}
                                                    <a data-toggle="modal" data-target="#myModal{{ $expense_list->id }}"
                                                        style="color: rgb(0, 216, 18)"> >>> </a>
                                                @endif

                                                <div class="modal" id="myModal{{ $expense_list->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    Remarks
                                                                </h5>
                                                                <button class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{ $expense_list->remarks ?? 'No remarks.' }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondery"
                                                                    data-dismiss="modal">close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>


                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a href="{{ route('expenselist.show', $expense_list->id) }}"
                                                        class="btn btn-sm btn-info mr-1 icon-eye"></a>
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
                                {{ $expense_lists->appends($_GET)->links() }}
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
