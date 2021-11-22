@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- HTML sourced data -->
                <div class="card">

                    <div class="card-body">
                        <div class="col-12">
                            <a href="{{ route('expense.create') }}" class="btn btn-primary btn-sm">Create Expense</a>
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
                        <th>s</th>
                        <th>Name</th>
                        <th>Author_id</th>
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
                            <td>{{ $item->author_id }}</td>
                            <td class="text-center">

                                <a href="{{ route('expense.show', $item->id) }}" class="btn btn-success btn-sm">View</a>
                                <a href="{{ route('expense.edit', $item->id) }}" class="btn btn-warning btn-sm"> Edit
                                </a>

                                <form action="{{ route('expense.destroy', $item->id) }}" method="POST"
                                    style="display: inline-flex">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick=" return confirm('Are you  shure to delete?')"
                                        class="btn btn-danger btn-sm"> Delete </button>
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
