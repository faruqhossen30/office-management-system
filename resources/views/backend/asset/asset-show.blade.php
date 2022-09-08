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

                                        <a href="{{ route('asset.index') }}" type="button"
                                        class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                                class="icon-menu7"></i></b>List</a>
                                    </div>
                                    <h1 class="text-center my-2">Asset  information</h1>

                                    <div class="dropdown " style="d-flex; margin:auto ">
                                        <button class="btn  btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                            invoice pdf
                                        </button>
                                        <div class="dropdown-menu ">
                                            <li><a class="dropdown-item" target="_blank" href="{{route('asset.single.invoice.pdf',['type'=>'stream'])}}">view</a></li>
                                            <li><a class="dropdown-item" target="_blank" href="{{route('asset.single.invoice.pdf',['type'=>'download'])}}">Download</a></li>
                                        </ul>
                                        </div>
                                      </div>

                                    <caption class="resumecaption">Asset  information</caption>
                                    <tbody>
                                        <tr>
                                            <th><b>Asset Name</b></th>
                                            <td>{{$assets->name}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Asset Type</b></th>
                                            <td>{{$assets->assettype->asset_name}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Buy Date</b></th>
                                            <td>{{$assets->buy_date}}</td>
                                        </tr>

                                        <tr>
                                            <th><b>Expiry Date</b></th>
                                            <td>{{$assets->expiry_date}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Warranty Time</b></th>
                                            <td>{{$assets->warranty_date}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Serial</b></th>
                                            <td>{{$assets->serial}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Additional Information</b></th>
                                            <td>{{$assets->additional_information}}</td>
                                        </tr>

                                        <tr>
                                            <th><b>Remarks</b></th>
                                            <td>{{$assets->remarks}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>Author</b></th>
                                            <td>{{$assets->author->name
                                            }}</td>
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
