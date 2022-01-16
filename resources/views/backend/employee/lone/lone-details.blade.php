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
                                <table class="table table-hover" width="100%">
                                    <div class="col-md-2">

                                        <a href="{{ route('lone.index') }}" type="button"
                                        class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                                class="icon-menu7"></i></b>List</a>
                                    </div>
                                    <h1 class="text-center">Loan  information</h1>
                                    <caption class="resumecaption">Loan  information</caption>
                                    <tbody>
                                        
                                        <tr>
                                            <th><b>employee Name</b></th>
                                            <td>{{$lones->employee->name}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>permite Information</b></th>
                                            <td>{{$lones->permitted_by}}</td>
                                        </tr>

                                        <tr>
                                            <th><b>loan details</b></th>
                                            <td>{{$lones->loan_details}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Approve Date</b></th>
                                            <td>{{$lones->approve_date}}</td>
                                        </tr>

                                        <tr>
                                            <th><b>Repayment From</b></th>
                                            <td>{{$lones->apply_date}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Repayment From</b></th>
                                            <td>{{$lones->repayment_from}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Installment Period</b></th>
                                            <td>{{$lones->installment_period}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Amount</b></th>
                                            <td>{{$lones->amount}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Installment</b></th>
                                            <td>{{$lones->Installment}}</td>
                                        </tr>

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
