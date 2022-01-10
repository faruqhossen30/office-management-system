@extends('backend.layouts.app')
@section('content')
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
                            <ul class="list-group list-group-horizontal">
                                <a href="{{ route('deposit.view') }}"
                                    class="list-group-item btn btn-primary text-dark @if (request()->routeIs('deposit.view')) active @endif">All TIme</a>
                                <a href="{{ route('deposit.view.week') }}"
                                    class="list-group-item btn btn-primary text-dark @if (request()->routeIs('deposit.view.week')) active @endif">This week</a>
                                <a href="{{ route('deposit.view.month') }}"
                                    class="list-group-item btn btn-primary text-dark @if (request()->routeIs('deposit.view.month')) active @endif">This
                                    Month</a>
                            </ul>
                            <div>
                                <button class="btn btn-primary btn-lg mt-1">Total: {{ $total }} TK</button>
                            </div>
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
                                        <th>Author</th>
                                        <th class="text-center">Deposite Date</th>
                                        <th class="text-center">Entry Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($deposits as $deposit)
                                        <tr>
                                            <th scope="row">{{ $deposits->firstItem() + $loop->index }}</th>
                                            <td><strong>{{ $deposit->amount }} TK</strong> </td>
                                            <td>{{ $deposit->paymentsystem->name?? 'no data'}}</td>
                                            <td>{{ $deposit->office->name }}</td>
                                            <td>{{ optional( $deposit->banks)->name}}</td>
                                            <td>{{ $deposit->author->name ?? '' }}</td>
                                            <td>{{ Carbon\Carbon::parse($deposit->date)->diffForHumans() }}</td>
                                            {{-- Deposite date --}}
                                            <td>{{ Carbon\Carbon::parse($deposit->created_at)->diffForHumans() }}</td>
                                            {{-- Deposite date --}}


                                            <td>
                                                <a href="{{route('deposit.show',$deposit->id)}}" class="btn btn-sm btn-primary icon-eye"></a>
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
                                {{ $deposits->links() }}
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
