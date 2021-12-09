@extends('backend.layouts.app')
@section('content')
    <div class="container p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <!------------profile------------------>
                                <div class="card card-body bg-light text-center"
                                    style="background-image: url(../../../../global_assets/images/backgrounds/); background-size: contain;">
                                    <div class="mb-3">
                                        <h5 class="font-weight-semibold mb-0 mt-1">

                                        </h5>

                                        <span class="d-block"></span>
                                    </div>

                                    <a href="#" class="d-inline-block mb-3">
                                        <img src="{{ asset('employee/photo/' . $employees->photo) }}"
                                            class="rounded-round" width="210" height="210" alt="">
                                    </a>

                                    <ul class="list-inline mb-0">
                                        <h6> <b>{{ $employees->name }}</b></h6>
                                        <h6> <b>{{ $employees->department}}</b></h6>
                                        <h6> <b>{{ $employees->position->position }}</b></h6>

                                        <p class="m-0"><i class="fa fa-mobile" aria-hidden="true"></i>
                                         <strong></strong></p>
                                        <p class="m-0"><i class="fa fa-mobile" aria-hidden="true"></i>
                                            <strong></strong></p>
                                        <p class="m-0"><i class="fa fa-mobile" aria-hidden="true"></i>
                                          <strong></strong></p>
                                          <li class="list-inline-item"><a href="#"

                                                class="btn btn-outline btn-icon text-white btn-lg border-white rounded-round">
                                                <i class="icon-phone"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"
                                                class="btn btn-outline btn-icon text-white btn-lg border-white rounded-round">
                                                <i class="icon-bubbles4"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"
                                                class="btn btn-outline btn-icon text-white btn-lg border-white rounded-round">
                                                <i class="icon-envelop4"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!------------profile------------------>
                            <!-----------------Positional Information-------------->
                            <div class="col-md-8">
                                <table class="table table-hover" width="100%">

                                    <h1 class="text-center">Positional Information</h1>
                                    <caption class="resumecaption">Positional Information</caption>
                                    <tbody>
                                        <tr>
                                            <th>Department</th>
                                            <td>{{ $employees->department }}</td>
                                        </tr>
                                        <tr>
                                            <th>Position</th>
                                            <td>{{ $employees->position->position }}</td>
                                        </tr>
                                        <tr>
                                            <th>Hire Date</th>
                                            <td>{{ $employees->join_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Office</th>
                                            <td>{{ $employees->office->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Covid Vaccine</th>
                                            <td>{{ $employees->covid_vaccine }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-----------------Positional Information-------------->
                        </div>

                        <div class="row">
                            <div class="col-md-4">

                                <div class="card-content-languages">
                                    <div class="card-content-languages-group"></div>
                                    <div class="card-content-languages-group">
                                        <table class="table table-hover" width="100%">
                                            <h1 class="text-center">Personal Information</h1>
                                            <caption class="resumecaption">Personal Information</caption>
                                            <tbody>
                                                <tr>
                                                    <th>Name</th>
                                                    <td> {{ $employees->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone</th>
                                                    <td> {{ $employees->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email Address</th>
                                                    <td> {{ $employees->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Country</th>
                                                    <td>Bangladesh</td>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <td> {{ $employees->city }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Zip Code</th>
                                                    <td> {{ $employees->zip_code }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nid No</th>
                                                    <td> {{ $employees->nid_no}}</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-8">
                                <table class="table table-hover" width="100%">

                                    <h1 class="text-center">Emergency Contact</h1>
                                    <caption class="resumecaption">Emergency Contact</caption>
                                    <tbody>
                                        <tr>
                                            <th><b>Phone</b></th>
                                            <td>{{ $employees->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Alternative phone number</b></th>
                                            <td>{{ $employees->position->position }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $employees->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Office</th>
                                            <td>{{ $employees->office->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $employees->address }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table table-hover" width="100%">
                                    <h1>Bio-Graphical Information</h1>
                                    <caption class="resumecaption">Bio-Graphical Information</caption>
                                    <tbody>
                                        <tr>
                                            <th>Date of Birth</th>
                                            <td>{{ $employees->date_of_birth }}</td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td>Male</td>
                                        </tr>
                                        <tr>
                                            <th>Marital Status</th>
                                            <td>Married</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-8">
                                <table class="table table-hover" width="100%">
                                    <h1 class="text-center">Extra Information</h1>
                                    <caption class="resumecaption">Extra Information</caption>
                                    <tbody>
                                        <tr>
                                            <td>{{ $employees->description}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>

            </div> {{-- row --}}

        </div> {{-- container --}}

    @endsection
