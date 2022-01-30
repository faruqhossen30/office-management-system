@extends('backend.layouts.app')
@section('content')
    <div class="container p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-2">
                    <div class="card-body">
                        <!----------------------------------Personal Information---------------------------->
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card card-body bg-light">
                                    <div class="col-md-2">

                                        <a href="{{ route('expenselist.index') }}" type="button"
                                        class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                                class="icon-menu7"></i></b>List</a>
                                    </div>
                                    <table class="table table-hover" width="100%">

                                        <h1 class="text-center">Deposit information</h1>
                                        <caption class="resumecaption">Emergency Contact</caption>
                                        <tbody>
                                            <tr>
                                                <th><b>Amount Source</b></th>
                                                <td>{{$expense_lists->office->name}}</td>
                                            </tr>
                                            <tr>
                                                <th><b>Authore</b></th>
                                                <td>{{$expense_lists->author->name}}</td>
                                            </tr>
                                            <tr>
                                                <th><b>Expense</b></th>
                                                <td>{{$expense_lists->expencetype->name}}</td>
                                            </tr>
                                            <tr>
                                                <th><b>Sub Expense</b></th>
                                                <td>{{$expense_lists->subexpense->name}}</td>
                                            </tr>
                                            <tr>
                                                <th><b>Voucher No</b></th>
                                                <td>{{$expense_lists->voucher_no}}</td>
                                            </tr>
                                            <tr>
                                                <th><b>payment_system</b></th>
                                                <td>{{$expense_lists->paymentsystem->name}}</td>
                                            </tr>
                                            <tr>
                                                <th><b>bank</b></th>
                                                <td>{{$expense_lists->bank->name ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th><b>phone</b></th>
                                                <td>{{$expense_lists->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th><b>transaction</b></th>
                                                <td>{{$expense_lists->transaction}}</td>
                                            </tr>
                                            <tr>
                                                <th><b>date</b></th>
                                                <td>{{$expense_lists->date}}</td>
                                            </tr>
                                            <tr>
                                                <th><b>Description</b></th>
                                                <td>{{$expense_lists->description}}</td>
                                            </tr>
                                            <tr>
                                                <th><b>Remarks</b></th>
                                                <td>{{$expense_lists->remarks}}</td>
                                            </tr>

                                            <br>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!----------------------------------Personal Information---------------------------->

                    </div>
                    <!----------------------------card-body--------------------->

                </div>

            </div> {{-- row --}}

        </div>

    </div> {{-- container --}}
@endsection
