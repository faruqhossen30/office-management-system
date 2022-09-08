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

                                        <a href="{{ route('deposit.view') }}" type="button"
                                        class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                                class="icon-menu7"></i></b>List</a>
                                    </div>
                                    <div class="dropdown " style="d-flex; margin:auto">
                                        <button class="btn  btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                            invoice pdf
                                        </button>
                                        <div class="dropdown-menu ">
                                            <li><a class="dropdown-item" target="_blank" href="{{route('deposit.single.invoice.pdf',['type'=>'stream'])}}">view</a></li>
                                            <li><a class="dropdown-item" target="_blank" href="{{route('deposit.single.invoice.pdf',['type'=>'download'])}}">Download</a></li>
                                        </ul>
                                        </div>
                                      </div>
                                    <table class="table table-hover" width="100%">

                                        <h1 class="text-center">Deposit information</h1>
                                        <caption class="resumecaption">Emergency Contact</caption>
                                        <tbody>
                                            <tr>
                                                <th><b>Amount Source</b></th>
                                                <td>{{$deposit->source}}</td>
                                            </tr>
                                            <tr>
                                                <th><b>Authore</b></th>
                                                <td>{{$deposit->author->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Amount</th>
                                                <td>{{$deposit->amount}}</td>
                                            </tr>
                                            <tr>
                                                <th>Payment system</th>
                                                <td>{{$deposit->paymentsystem->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Office</th>
                                                <td>{{$deposit->office->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Date</th>
                                                <td>{{$deposit->date}}</td>
                                            </tr>
                                            <tr>
                                                <th>Bank</th>
                                                <td>{{$deposit->banks->name?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <td>{{$deposit->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th>tranjection</th>
                                                <td>{{$deposit->transaction}}</td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td>{{$deposit->remarks}}</td>
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
