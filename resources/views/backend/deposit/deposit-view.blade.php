@extends('backend.layouts.app')
@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('asset.list.currentdate') }}" method="GET">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Find Cradit
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group ml-2">
                            <label class="" for="from_date">Current
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
                    <div class="card-header header-elements-inline ">
                        <h5 class="card-title">Cradit Table</h5>
                        <div class="header-elements">
                            <div>
                                <a href="{{ route('deposit') }}" type="button"
                                    class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                            class="icon-plus3"></i></b>Add Cradit</a>
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
                        <div class="d-flex justify-content-between">
                            <ul class="list-group list-group-horizontal" style="padding: 20px 0">
                                <a href="{{ route('deposit.view') }}"
                                    class="list-group-item btn btn-primary text-dark @if (request()->routeIs('deposit.view')) active @endif">All
                                    Time</a>
                                <a href="{{ route('deposit.view.week') }}"
                                    class="list-group-item btn btn-primary text-dark @if (request()->routeIs('deposit.view.week')) active @endif">This
                                    week</a>
                                <a href="{{ route('deposit.view.month') }}"
                                    class="list-group-item btn btn-primary text-dark @if (request()->routeIs('deposit.view.month')) active @endif">This
                                    Month</a>
                            </ul>
                            <form action="{{ route('deposit.view.date') }}" method="GET">

                                <div class="row">
                                    <div class="mt-4">
                                        <button type="button"
                                            class="btn btn-primary btn-sm">Total:{{ $total }}</button>
                                    </div>

                                    <div class="form-group ml-2">
                                        <label class="" for="from_date">From</label>
                                        <input type="date" name="from_date" class="form-control " id="from_date"
                                            placeholder="Form" value="{{ $_GET['from_date'] ?? '' }}">
                                    </div>
                                    <div class="form-group ml-2">
                                        <label class="" for="to_date">To</label>
                                        <input type="date" name="to_date" class="form-control" id="to_date"
                                            placeholder="To" value="{{ $_GET['to_date'] ?? '' }}required ">
                                    </div>
                                    <div class="mt-4 ml-2">
                                        <input type="submit" class="btn btn-secondary btn-sm @if (request()->routeIs('deposit.view.date')) active @endif " value="search">
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
                        {{-- table-start --}}
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Amount</th>
                                        <th>Payment Type</th>
                                        <th>Office</th>
                                        <th>Bank</th>
                                        <th>Cradit Source</th>

                                        <th class="text-center">Cradit Date</th>
                                        <th class="text-center">Remarks</th>

                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($deposits as $deposit)
                                        <tr>

                                            <th scope="row"> {{ $deposits->firstItem() + $loop->index }}</th>
                                            <td><strong>{{ $deposit->amount }} TK</strong> </td>
                                            <td>{{ $deposit->paymentsystem->name ?? 'no data' }}</td>
                                            <td>{{ $deposit->office->name }}</td>
                                            <td>{{ optional($deposit->banks)->name }}</td>
                                            <td>{{ $deposit->source }}</td>


                                            {{-- Deposite date --}}
                                            <td>{{ Carbon\Carbon::parse($deposit->created_at)->format('d M Y') }}</td>
                                            <td>
                                                @if ($deposit->remarks)
                                                    {{ Str::words($deposit->remarks, 2) }}
                                                    <a data-toggle="modal" data-target="#myModal{{ $deposit->id }}"
                                                        style="color: rgb(0, 216, 18)"> >>> </a>
                                                @endif

                                                <div class="modal" id="myModal{{ $deposit->id }}">
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
                                                                {{ $deposit->remarks ?? 'No remarks.' }}
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
                                                <a href="{{ route('deposit.show', $deposit->id) }}"
                                                    class="btn btn-sm btn-primary icon-eye"></a>
                                                <a href="{{ route('deposit.edit', $deposit->id) }}"
                                                    class="btn btn-sm btn-info icon-pencil7"></a>
                                                <a href="{{ route('deposit.destroy', $deposit->id) }}"
                                                    onclick=" return confirm('Are you  shure to delete?')"
                                                    class="btn btn-sm btn-danger
                                        icon-trash"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="my-3">
                                {{ $deposits->appends($_GET)->links() }}
                            </div>
                        </div>
                        {{-- end table --}}
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
