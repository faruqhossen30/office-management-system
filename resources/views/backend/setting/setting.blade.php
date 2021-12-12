@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card my-3">
                    <div class="card-header header-elements-inline">
                        <h3 class="card-title">Setting </h3>
                        <div class="header-elements">

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <ul
                                    class="nav nav-tabs nav-tabs-vertical flex-column mr-md-3 wmin-md-200 mb-md-0 border-bottom-0">
                                    <li class="nav-item"><a href="#bankSetting" class="nav-link active show"
                                            data-toggle="tab"><i class="icon-menu7 mr-2"></i> Bank</a></li>
                                    <li class="nav-item"><a href="#vertical-left-tab2" class="nav-link"
                                            data-toggle="tab"><i class="icon-mention mr-2"></i> Inactive</a></li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="bankSetting">
                                        <h4>This is bank setting</h4>
                                        <hr>
                                        <form action="{{route('bank.setting')}}" method="POST">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Select For Bank</label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" name="bank_id">
                                                        <option value="">Default select box</option>
                                                        @foreach ($paymentsytems as $paymentsytem)
                                                            <option value="{{$paymentsytem->id}}" @if ($paymentsytem->id == $bankselectId) selected @endif>{{$paymentsytem->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-2">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="icon-floppy-disk mr-2"></i>Save</button>
                                                </div>
                                            </div>
                                        </form>
                                        {{-- Mobile Banking --}}
                                        <form action="{{route('mobilebanking.setting')}}" method="POST">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Mobile Banking</label>
                                                <div class="col-lg-10">
                                                    @foreach ($paymentsytems as $paymentsytem)
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input name="mobilebanking[]" value="{{$paymentsytem->id}}" type="checkbox" class="form-check-input"
                                                            @if ( in_array( ['paymentsystem_id' => $paymentsytem->id],  $mobilebanking )  ) checked @endif
                                                            >
                                                            {{$paymentsytem->name}}
                                                        </label>
                                                    </div>

                                                    @endforeach

                                                </div>
                                                <div class="col-lg-2 offset-2 mt-2">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="icon-floppy-disk mr-2"></i>Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="vertical-left-tab2">

                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, incidunt minima in
                                            quaerat quidem maxime blanditiis perspiciatis fugit iusto ab laudantium fugiat
                                            totam
                                            autem soluta magnam, distinctio reprehenderit eius culpa?</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
