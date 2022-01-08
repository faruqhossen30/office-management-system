@extends('backend.layouts.app')
@section('content')
    <div class="container p-0">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card mt-2">
                    <div class="card-body">
                        <!----------------card-body------------------->
                        <div class="row">
                            <div class="col-md-12">
                                <!------------profile------------------>
                                <div class="card card-body bg-light text-center"
                                    style="background-image: url(../../../../global_assets/images/backgrounds/); background-size: contain;">
                                    <div class="mb-3">
                                        <h5 class="font-weight-semibold mb-0 mt-1">

                                        </h5>

                                        <span class="d-block"></span>
                                    </div>

                                    <a href="#" class="d-inline-block mb-3">
                                        <img src="{{ asset('employee/photo/' . $users->photo) }}"
                                            class="rounded-round" width="210" height="210" alt="">
                                    </a>

                                    <ul class="list-inline mb-0">

                                    </ul>




                                </div>
                            </div>
                            <!------------profile------------------>

                        </div>


                        <div class="col-md-12">
                            <div class="card card-body bg-light">
                                <table class="table table-hover" width="100%">

                                    <h1 class="text-center">Users information</h1>
                                    <caption class="resumecaption">Users information</caption>
                                    <tbody>
                                        <tr>
                                            <th><b>Phone</b></th>
                                            <td>{{ $users->name }}</td>
                                        </tr>

                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $users->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>{{ $users->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th>Roll</th>
                                            <td>{{ $users->roll }}</td>
                                        </tr>
                                        <br>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <!----------------------------card-body--------------------->

                </div>

            </div> {{-- row --}}

        </div>

    </div> {{-- container --}}
@endsection
