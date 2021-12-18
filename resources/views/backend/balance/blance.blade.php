@php
$jessore = App\Models\Deposit::get();
@endphp
@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table text-nowrap table-bordered">
                                    <thead>
                                        <tr class="bg-light font-size-lg">
                                            <th><b>Office List</b></th>
                                            <th>Total Balance</th>
                                            <th>Total Debit</th>
                                            <th>Total Cradit</th>
                                            {{-- <th>Status</th> --}}
                                            <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($offices as $office)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-3">
                                                            <a href="#">
                                                                <i class="icon-office text-secondary" style="font-size: 24px"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#"
                                                                class="text-default font-weight-semibold">{{ $office->name }}</a>
                                                            <div class="text-muted font-size-sm">
                                                                <span class="badge badge-mark  mr-1"></span>
                                                                {{ $office->mobile }}
                                                            </div>
                                                            <div class="text-muted font-size-sm">
                                                                <span class="badge badge-mark  mr-1"></span>
                                                                {{ $office->address }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>

                                                    <span class="">
                                                        @php
                                                            $alldebit = App\Models\ExpenseList::where('office_id', $office->id)
                                                                ->get()
                                                                ->sum('amount');
                                                            $allcradit = App\Models\Deposit::where('office_id', $office->id)
                                                                ->get()
                                                                ->sum('amount');
                                                            $sum = $allcradit - $alldebit;
                                                        @endphp
                                                   <h6 class="text-dark-600  font-weight-bold">{{ $sum}}TK</h6>
                                                    </span>
                                                </td>
                                                <td>
                                                    {{-- Total Debit --}}
                                                    @php
                                                        $alldebit = App\Models\ExpenseList::where('office_id', $office->id)
                                                            ->get()
                                                            ->sum('amount');
                                                    @endphp
                                                   <h6><span class="text-dark-600  font-weight-bold"><i class="icon-stats-growth2 mr-2"></i>

                                                       {{ $alldebit}}TK
                                                    </span></h6> 
                                                </td>
                                                <td>
                                                    {{-- Total Cradit --}}
                                                    @php
                                                        $allcradit = App\Models\Deposit::where('office_id', $office->id)
                                                            ->get()
                                                            ->sum('amount');
                                                    @endphp
                                                    <h6 class="text-dark-600  font-weight-bold">{{ $allcradit }}TK</h6>
                                                </td>
                                                {{-- <td><span class="badge bg-blue">Active</span></td> --}}
                                                <td class="text-center">
                                                    <div class="list-icons">
                                                        <div class="list-icons-item dropdown">
                                                            <a href="#" class="list-icons-item dropdown-toggle caret-0"
                                                                data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="#" class="dropdown-item"><i
                                                                        class="icon-file-stats"></i>
                                                                    View statement</a>
                                                                <a href="#" class="dropdown-item"><i
                                                                        class="icon-file-text2"></i>
                                                                    Edit campaign</a>
                                                                <a href="#" class="dropdown-item"><i
                                                                        class="icon-file-locked"></i>
                                                                    Disable campaign</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item"><i
                                                                        class="icon-gear"></i>
                                                                    Settings</a>
                                                            </div>
                                                        </div>
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
            </div>
        </div>
    </div>
@endsection
@push('css')

@endpush
