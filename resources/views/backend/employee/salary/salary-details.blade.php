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

                                        <a href="{{ route('salary.index') }}" type="button"
                                        class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                                class="icon-menu7"></i></b>List</a>
                                    </div>
                                    <h1 class="text-center">Salary  information</h1>
                                    <caption class="resumecaption">Salary information</caption>
                                    <tbody>

                                        <tr>
                                            <th><b>Employee Name</b></th>
                                            <td>{{$salary->employee->name}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Month</b></th>
                                            <td>{{$salary->month}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Payment Date</b></th>
                                            <td>{{$salary->payment_date}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Basic Salary</b></th>
                                            <td>{{$salary->basic_salary}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>House Allowance</b></th>
                                            <td>{{$salary->house_allowance}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Medical Allowance</b></th>
                                            <td>{{$salary->medical_allowance}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Conveyance Allowance</b></th>
                                            <td>{{$salary->conveyance_allowance}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Other Allowance</b></th>
                                            <td>{{$salary->other_allowance}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Gross Salary</b></th>
                                            <td>{{$salary->gross_salary}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Advance Salary</b></th>
                                            <td>{{$salary->total_advance}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Installment</b></th>
                                            <td>{{$salary->Installment}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Other Deduction</b></th>
                                            <td>{{$salary->other_deduction}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Other Deduction</b></th>
                                            <td>{{$salary->other_deduction}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Deduction detail</b></th>
                                            <td>{{$salary->deduction_detail}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Totalsalary</b></th>
                                            <td>{{$salary->totalsalary}}</td>
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
