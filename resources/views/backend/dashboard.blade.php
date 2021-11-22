@extends('backend.layouts.app')
@section('title','index')
@section('content')
<!-- Page content -->

        <div class="content-wrapper">

            @include('backend.inc.dashboard.header')


            <!-- Content area -->
            <div class="content">

                <!-- Main charts -->
                <div class="row">
                    <div class="col-xl-7">

                        <!-- Traffic sources -->
                        @include('backend.inc.dashboard.card.card')
                        <!-- /traffic sources -->

                    </div>

                    <div class="col-xl-5">

                        <!-- Sales stats -->
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h6 class="card-title">Sales statistics</h6>
                                <div class="header-elements">
                                    <select class="form-control" id="select_date" data-fouc>
                                        <option value="val1">June, 29 - July, 5</option>
                                        <option value="val2">June, 22 - June 28</option>
                                        <option value="val3" selected>June, 15 - June, 21</option>
                                        <option value="val4">June, 8 - June, 14</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-body py-0">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <h5 class="font-weight-semibold mb-0">5,689</h5>
                                            <span class="text-muted font-size-sm">new orders</span>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="mb-3">
                                            <h5 class="font-weight-semibold mb-0">32,568</h5>
                                            <span class="text-muted font-size-sm">this month</span>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="mb-3">
                                            <h5 class="font-weight-semibold mb-0">$23,464</h5>
                                            <span class="text-muted font-size-sm">expected profit</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chart mb-2" id="app_sales"></div>
                            <div class="chart" id="monthly-sales-stats"></div>
                        </div>
                        <!-- /sales stats -->
                    </div>
                </div>
                <!-- /main charts -->


                <!-- Dashboard content -->

                <!-- /dashboard content -->
            </div>
            <!-- /content area -->

            <!-- Footer -->
             @include('backend.layouts.footer')
            <!-- /footer -->
        </div>
<!-- /page content -->


@endsection
