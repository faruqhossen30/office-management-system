@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header header-elements-inline ">
                    <h5 class="card-title">Department Table</h5>
                    <div class="header-elements">
                        <div>
                            <a href="{{route('department.create')}}" type="button"
                                class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                        class="icon-plus3"></i></b>Add Department information</a>
                        </div>
                    </div>
                </div>
                @if (session('update'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('update') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                @if (session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('delete') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card-body">
                    {{-- <div class="d-flex justify-content-between">
                        <ul class="list-group list-group-horizontal">
                            <a href="{{route('deposit.view')}}" class="list-group-item btn btn-primary text-dark @if (request()->routeIs('deposit.view') ) active @endif">All TIme</a>
                            <a href="{{route('deposit.view.week')}}" class="list-group-item btn btn-primary text-dark @if (request()->routeIs('deposit.view.week') ) active @endif">This week</a>
                            <a href="{{route('deposit.view.month')}}" class="list-group-item btn btn-primary text-dark @if (request()->routeIs('deposit.view.month') ) active @endif">This Month</a>
                          </ul>
                          <div>
                            <button class="btn btn-primary btn-lg mt-1">Total: {{$total}} TK</button>
                          </div>
                    </div> --}}
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Department Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial =1;
                                @endphp
                                @foreach ($departments as $department)
                                    <tr>
                                        <th scope="row">{{$serial++}}</th>
                                        <td>{{ $department->department_name }}</td>
                                        <td>

                                            <a href="{{route('department.edit',$department->id)}}"
                                                class="btn btn-sm btn-info icon-pencil7"></a>
                                                <form action="{{route('department.destroy',$department->id)}}"
                                                    method="POST" style="display: inline-flex">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick=" return confirm('Are you  shure to delete?')"
                                                        class="btn btn-danger btn-sm icon-trash"></button>
                                                </form>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="my-3">
                            {{ $deposits->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Bordered table -->

        <!-- /bordered table -->
    </div>
</div>
@endsection
@push('css')
    <style>
        .table td,
        .table th {
            padding: .55rem .55rem .55rem .75rem;
            vertical-align: top;
            border-top: 1px solid #ddd;
        }

    </style>
@endpush
