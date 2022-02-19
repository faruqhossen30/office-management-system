@extends('backend.layouts.app')
@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('asset.list.currentdate') }}" method="GET">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Find asset
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group ml-2">
                            <label class="" for="from_date">Current
                                date</label>
                            <input type="date" name="from_date" class="form-control " id="from_date">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-2">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Asset information</h5>
                        <div class="header-elements">
                            <div>
                                <a href="{{ route('asset.create') }}" type="button"
                                    class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                            class="icon-plus3"></i></b>Add Asset</a>
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
                        <div class="d-flex justify-content-between p-1">
                            <ul class="list-group list-group-horizontal " style="padding: 20px 0">
                                <a href="{{ route('asset.index') }}"
                                    class="list-group-item btn btn-primary text-dark @if (request()->routeIs('asset.index')) active @endif">All
                                    Time</a>
                                <a href="{{ route('asset.list.week') }}"
                                    class="list-group-item btn btn-primary text-dark @if (request()->routeIs('asset.list.week')) active @endif">This
                                    week</a>
                                <a href="{{ route('asset.list.month') }}"
                                    class="list-group-item btn btn-primary text-dark @if (request()->routeIs('asset.list.month')) active @endif">This
                                    Month</a>
                            </ul>
                            <form action="{{ route('asset.list.date') }}" method="GET">

                                <div class="row">
                                    <!----------------start find date---------------->
                                    <div class="mt-4">
                                        <button type="button"
                                            class="btn btn-primary btn-sm">Total:{{ $total }}</button>
                                    </div>
                                    <div class="form-group ml-2">
                                        <label class="" for="from_date">From date</label>
                                        <input type="date" name="from_date" class="form-control " id="from_date"
                                            placeholder="From" value="{{ $_GET['from_date'] ?? '' }}">
                                    </div>

                                    <div class="form-group ml-2">
                                        <label class="" for="to_date">To date</label>
                                        <input type="date" name="to_date" class="form-control" id="to_date"
                                            placeholder="To" value="{{ $_GET['to_date'] ?? '' }}">
                                    </div>
                                    <div class="mt-4 ml-1">
                                        <input type="submit" class="btn btn-secondary btn-sm" value="Search">
                                    </div>
                                    <!----------------start find date---------------->
                                    <!---------- start current date------------------>
                                    <div class="mt-4 ml-2">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#exampleModal ">
                                            Find
                                        </button>

                                        <!-- Modal -->

                                    </div>
                                    <!----------end current date------------------>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <!-------- start table -------------->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th class="text-center">Asset Name</th>
                                        <th>Asset type</th>
                                        <th>Price</th>
                                        <th>Buy date</th>
                                        {{-- <th>Expiry date</th> --}}
                                        <th>Warranty Period</th>
                                        <th>Serial</th>
                                        <th>Remarks</th>

                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($assets as $asset)
                                        <tr>
                                            <th scope="row">{{ $assets->firstItem() + $loop->index }}</th>
                                            <td>{{ $asset->name }}</td>
                                            <td>{{ $asset->assettype->asset_name }}</td>
                                            <td>{{ $asset->price }}</td>
                                            <td>{{ Carbon\Carbon::parse($asset->buy_date)->format('d M Y') }}</td>
                                            {{-- <td>{{ Carbon\Carbon::parse($asset->expiry_date)->format('d M Y') }}</td> --}}
                                            <td>{{ $asset->warranty_date }}</td>
                                            <td>{{ $asset->serial }}</td>
                                            <td>
                                                @if ($asset->remarks)
                                                {{ Str::words($asset->remarks,2)  }}
                                                    <a data-toggle="modal"
                                                    data-target="#myModal{{$asset->id}}" style="color: rgb(0, 216, 18)" > >>> </a>
                                                @endif

                                                <div class="modal" id="myModal{{$asset->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    Remarks
                                                                </h5>
                                                                <button class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{ $asset->remarks ?? 'No remarks.' }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondery"
                                                                    data-dismiss="modal">close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a href="{{ route('asset.show', $asset->id) }}"
                                                        class="btn btn-success btn-xm icon-eye "></a>
                                                    <a href="{{ route('asset.edit', $asset->id) }}"
                                                        class="btn btn-warning btn-xm ml-1 icon-pencil7">
                                                    </a>
                                                    <form action="{{ route('asset.destroy', $asset->id) }}" method="POST"
                                                        style="display: inline-flex">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick=" return confirm('Are you  shure to delete?')"
                                                            class="btn btn-danger btn-xm ml-1  icon-trash"></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="my-3">
                                {{ $assets->appends($_GET)->links() }}
                            </div>
                        </div>
                        <!-------- end table -------------->
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

        .ul {
            padding: .55rem .55rem .55rem .75rem;
            vertical-align: top;
            border-top: 1px solid #ddd;
        }

    </style>
@endpush
