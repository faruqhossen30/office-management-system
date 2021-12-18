@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Salary list Information</h5>
                    <div class="header-elements">
                        <div>
                            <a href="{{ route('salary-setup.create') }}" type="button"
                                class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                        class="icon-plus3"></i></b>Add Salary information</a>
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
                                    <th>Position</th>
                                    <th>Department</th>
                                    <th>office</th>
                                    <th>basic</th>
                                    <th>grow_salary</th>
                                    <th>Payment_date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial = 1;
                                @endphp
                                @foreach ($salary_set_ups as $salary_set_up)
                                    <tr>
                                        <th scope="row">{{ $serial++ }}</th>
                                        <td>{{$salary_set_up->employee->name}}</td>
                                        <td>{{ $salary_set_up->position->position ?? 'Not found'}}</td>
                                        <td>{{ $salary_set_up->department->department_name }}</td>
                                        <td>{{ $salary_set_up->offices->name}}</td>
                                        <td>{{ $salary_set_up->basic}}</td>
                                        <td>{{ $salary_set_up->grow_salary}}</td>
                                        <td>{{ $salary_set_up->Payment_date}}</td>
                                        <td>
                                            <div class="d-flex justify-content-start">
                                                <a href="#" class="btn btn-success btn-xm icon-eye "></a>
                                                <a href="#"
                                                    class="btn btn-warning btn-xm ml-1 icon-pencil7">
                                                </a>
                                                <form action="#"
                                                    method="POST" style="display: inline-flex">
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Bordered table -->

        <!-- /bordered table -->
    </div>
</div>
@endsection
