@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-2">
                    <div class="card-header header-elements-inline ">
                        <h5 class="card-title">sub asset type</h5>
                        <div class="header-elements">
                            <div>
                                <a href="{{ route('sub-asset-type.create') }}" type="button"
                                    class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                            class="icon-plus3"></i></b>Add sub asset type</a>
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

                        {{-- table-start --}}
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Sub Asset Name</th>
                                        <th>Asset Name</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $serial = 1;
                                    @endphp
                                    @foreach ($sub_asset_types as $sub_asset)
                                        <tr>
                                            <th scope="row">{{ $serial++ }}</th>
                                            <td>{{ $sub_asset->name ?? '' }}</td>
                                            <td>{{ $sub_asset->assettype->asset_name ?? '' }}</td>
                                            <td>
                                                {{-- <a href="{{route('sub-asset-type.index',$sub_asset->id)}}" class="btn btn-sm btn-primary icon-eye"></a> --}}
                                                <a href="{{ route('sub-asset-type.edit', $sub_asset->id) }}"
                                                    class="btn btn-sm btn-info icon-pencil7"></a>
                                                <form action="{{ route('sub-asset-type.destroy', $sub_asset->id) }}"
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
