@extends('backend.layouts.app')
@section('title','index')
@section('content')
<!-- Page content -->

        <div class="content-wrapper">

            @include('backend.inc.dashboard.header')


            <!-- Content area -->
            <div class="content">
                @include('backend.inc.dashboard.chartgraph')
            </div>
            <!-- /content area -->

            <!-- Footer -->
             @include('backend.layouts.footer')
            <!-- /footer -->
        </div>
<!-- /page content -->


@endsection
