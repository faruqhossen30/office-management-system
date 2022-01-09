@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-2">
                    <div class="card-header header-elements-inline ">
                        <h5 class="card-title">Lone Table</h5>
                        <div class="header-elements">
                            <div>
                                <a href="{{ route('lone.create') }}" type="button"
                                    class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                            class="icon-plus3"></i></b>Add Lone</a>
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

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Employee Name</th>
                                        <th>approve_date</th>
                                        <th class="text-center">apply_date</th>
                                        <th class="text-center">repayment_from</th>
                                        <th class="text-center">amount</th>
                                        <th class="text-center">Installment</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                         $serial = 1;
                                    @endphp

                                    @foreach ($lones as $lone)
                                        <tr>
                                            <th scope="row">{{$serial++ }}</th>
                                            <td>{{ $lone->employee->name }}</td>
                                            <td>{{ $lone->approve_date }}</td>
                                            <td>{{ $lone->apply_date }}</td>
                                            <td>{{ $lone->repayment_from }}</td>
                                            <td>{{ $lone->amount }}</td>
                                            <td>{{ $lone->Installment }}</td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a href="#" class="btn btn-success btn-xm icon-eye "></a>
                                                    <a href="{{route('lone.edit',$lone->id)}}"
                                                        class="btn btn-warning btn-xm ml-1 icon-pencil7">
                                                    </a>
                                                    <form action="{{ route('lone.destroy', $lone->id) }}"
                                                        method="POST" style="display: inline-flex">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick=" return confirm('Are you  shure to delete?')"
                                                            class="btn btn-danger btn-xm ml-1  icon-trash"></button>
                                                    </form>
                                                </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <div class="my-3">
                                {{ $lones->links() }}
                            </div> --}}
                        </div>
                        {{-- end table --}}
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
