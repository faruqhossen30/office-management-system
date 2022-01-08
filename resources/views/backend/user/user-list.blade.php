@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header header-elements-inline ">
                    <h5 class="card-title">User information table</h5>
                    <div class="header-elements">
                        <div>
                            <a href="{{route('user-admin.create')}}" type="button"
                                class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                        class="icon-plus3"></i></b>Add user </a>
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
                @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            <strong>{{ session('success') }}</strong>
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
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>phone</th>
                                    <th>Roll</th>
                                    <th>Photo</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial =1;
                                @endphp
                                @foreach ($users  as $user)
                                    <tr>
                                        <th scope="row">{{$serial++}}</th>
                                        <td>{{ $user ->name }}</td>
                                        <td>{{ $user ->email }}</td>
                                        <td>{{ $user ->phone }}</td>
                                        <td>{{ $user ->roll }}</td>
                                        <td>
                                            <img src ="{{asset('/employee/photo/'.$user->photo)}}" width="100px" height="100px" alt="photo">
                                        </td>
                                        <td>
                                            <a href="{{route('user-admin.show',$user->id)}}" class="btn btn-sm btn-primary icon-eye"></a>
                                            <a href="{{route('user-admin.edit',$user->id)}}"
                                                class="btn btn-sm btn-info icon-pencil7"></a>
                                                <form action="{{route('user-admin.destroy',$user->id)}}"
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
