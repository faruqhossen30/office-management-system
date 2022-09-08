@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card mt-4">
                    <div class="card-body">
                        <form action="{{route('salary.store')}}" method="POST">
                            @csrf
                        <!-- Left aligned buttons -->
                        <div class="card">
                            <div class="card-header bg-light d-flex justify-content-between p-2 pl-3">
                                <h6 class="font-weight-semibold">Salary information</h6>
                                <a href="{{ route('salary-setup.index') }}" type="button"
                                    class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                            class="icon-menu7"></i></b>List</a>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text">Employee Name<span
                                                    class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <select class="form-control @error('employee_id') is-invalid @enderror"
                                                    name="employee_id">
                                                    <option value="">Select employee </option>
                                                    @foreach ($employees as $employee)
                                                        <option value="{{ $employee->id }}">{{ $employee->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <x-error name='employee_id' />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Month<span class="text-danger">*</span></label>
                                            <input name="month" type="month"
                                                class="form-control  @error('month')is-invalid @enderror"
                                                placeholder="please enter your month" value="{{ old('month') }}">
                                            <x-error name='month' />
                                        </div>
                                    </div>
                                </div>
                                {{-- <button type="submit" class=" btn btn-light form-control">submit</button> --}}

                                <div class="card" id="salary_info">

                                </div>
                            </div>
                        </div>
                        <!-- /left aligned buttons -->

{{-- {{$lone}} --}}


                    </form>
                    {{-- @include('backend.employee.inc.salaryinfo') --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        // Genarate Salary
        var employee_id = $("select[name='employee_id']");
        var month = $("input[name='month']");
        var salary_info = $("#salary_info");
        var installment = $("input[name='Installment']");


        $(document).on("change", "select[name='employee_id'], input[name='month']", function() {
            let id = employee_id.val();
            let monthvalue = month.val();
            console.log(monthvalue);
            salary_info.html('')
            if (id && monthvalue) {

                $.ajax({
                    url: '{{ route('showinfoandsalary') }}',
                    type: 'GET',
                    data: {
                        id: id,
                        monthvalue: monthvalue
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        if (data) {
                            salary_info.html(data)
                        }
                    }
                })
            }
        });

        // Deduct Loan and final Salary
        // gross salary
        // advance slary
        // loan deduction
        // other deduction

        // $(document).on("change keyup", "input[name='Installment'], input[name='other_deduction']", function() {

        //     var totalsalary = $("input[name='totalsalary']");
        //     var gross_salary = $("input[name='gross_salary']");
        //     var gross_salary = $("input[name='gross_salary']");

        //     var other_deduction = $("input[name='other_deduction']");
        //     var installment = $("input[name='Installment']");
        //     var advance = $("input[name='total_advance']");
        //     // var advance = $("input[name='total_advance']");
        //     let paybleSalary = parseInt(gross_salary.val()) - (parseInt(advance.val()) +
        //     parseInt(installment.val()) + parseInt(other_deduction.val()));
        //     totalsalary.val(paybleSalary);

            // console.log(parseInt( advance.val() ) + parseInt( installment.val() ) +  parseInt( other_deduction.val() ) );
            //    console.log(PaybleSalary);
        // });
    </script>
@endpush
