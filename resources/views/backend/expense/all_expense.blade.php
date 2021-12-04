@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <!-- HTML sourced data -->
                <div class="card ">

                    <div class="card-body">
                        <div>
                            <a href="{{route('expense.create')}}" type="button" class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i class="icon-plus3"></i></b>Add Expense</a>
                        </div>
                        @if (session('delete'))
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <strong>{{ session('delete') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                </div>
                @endif

                @if (session('update'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>{{ session('update') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            </div>
            @endif

            <table class="table datatable-html">
                <thead>
                    <tr>
                        <th>sL</th>
                        <th>Expense Type</th>
                        <th>Author</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $serial = 1;
                    @endphp
                    @foreach ($expense as $item)
                        <tr>
                            <th scope="row">{{ $serial++ }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->author->name }}</td>
                            <td class="text-center">

                                <a href="{{ route('expense.show', $item->id) }}" class="btn btn-success btn-sm icon-eye"></a>
                                <a href="{{ route('expense.edit', $item->id) }}" class="btn btn-warning btn-sm icon-pencil7">
                                </a>

                                <form action="{{ route('expense.destroy', $item->id) }}" method="POST"
                                    style="display: inline-flex">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick=" return confirm('Are you  shure to delete?')"
                                        class="btn btn-danger btn-sm  icon-trash"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>




    </div>
    <!-- /HTML sourced data -->

    </div>
    </div>
    </div>
@endsection
