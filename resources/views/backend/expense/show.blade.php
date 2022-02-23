@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h6 class="card-title">Debit information</h6>
                    </div>

                    <div class="card-body">
                        <div class="col-6 offset-3">
                            <div class="card" style="position: relative; left: 0px; top: 0px;">
                                <div class="card-header bg-white ">
                                    <h6 class="card-title">Debit-Type</h6>
                                </div>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>Author</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $expense->name }}</td>
                                                <td>{{ $expense->author->name }}</td>
                                                <td>{{ $expense->created_at }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
