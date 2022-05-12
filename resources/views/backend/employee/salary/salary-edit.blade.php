@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card mt-4">
                    <div class="card-body">
                        <form action="{{route('salary-setup.update',$salary->id)}}" method="POST">
                            @csrf
                        <!-- Left aligned buttons -->
                        <div class="card">
                            <div class="card-header bg-light d-flex justify-content-between p-2 pl-3">
                                <h6 class="font-weight-semibold">Salary information</h6>
                                <a href="{{ route('salary-setup.index') }}" type="button"
                                    class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                            class="icon-menu7"></i></b>List</a>
                            </div>
                            <div class="card-body">


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
                                                        <option value="{{ $employee->id }}"@if ( $employee->id == $salary->employee_id)

                                                     selected   @endif>{{ $employee->name }}
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
                                                placeholder="please enter your month" value="{{$salary->month->format('Y-m')."T".$salary->month->format('H:i')}}">
                                            <x-error name='month' />
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- /left aligned buttons -->
                        <div class="card" id="salary_info">
                            <div class="card-body">

                                <table class="table table-bordered" width="100%">
                                    <h1 class="text-center">Basic Information : {{ $employee->name }}</h1>

                                    <tbody>
                                        <tr>
                                            <th>office</th>
                                            <td>
                                                {{ $employee->office->name }}
                                            </td>

                                        </tr>
                                        <tr>
                                            <th>Degination</th>
                                            <td>
                                                {{ $employee->position->position }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Department</th>
                                            <td>
                                                {{ $employee->department->department_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>phone</th>
                                            <td>
                                                {{ $employee->phone }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th><strong> Payment date: </strong></th>
                                            <td>
                                                <input type="datetime-local" name="payment_date" id="" value="{{$salary->payment_date->format('Y-m-d')."T".$salary->payment_date->format('H:i')}}" style="border: none; font-weight:bolder">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>



                                <table class="table table-bordered" width="100%">
                                    <h3 class="text-center">Salary Information : </h3>
                                    <caption class="resumecaption">Salary Information</caption>
                                    <tbody>
                                        <tr>
                                            <th>Basic Salary</th>
                                            {{-- <td>TK-{{ $employee->basic_salary }} </td> --}}
                                            <td>
                                                TK: <input type="number" name="basic_salary" value="{{ $employee->basic_salary }}" style="border: none; font-weight:bolder" readonly >
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>House Allowance</th>
                                            <td>
                                                TK-<input type="number" name="house_allowance" value="{{ ($employee->basic_salary * $employee->house_allowance) / 100 }}" style="border: none ;font-weight:bolder" readonly >
                                                <span class="badge bg-teal">{{ $employee->house_allowance }}%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Medical Allowance</th>
                                            <td>
                                             TK-<input type="number" name="medical_allowance" value="{{ ($employee->basic_salary * $employee->medical_allowance) / 100 }}" style="border: none;font-weight:bolder" readonly >
                                                <span class="badge bg-teal">{{ $employee->medical_allowance }}%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Conveyance Allowance</th>
                                            <td>
                                                TK-<input type="number" name="conveyance_allowance" value="{{ ($employee->basic_salary * $employee->conveyance_allowance) / 100 }}" style="border: none;font-weight:bolder" readonly >
                                                <span class="badge bg-teal">{{ $employee->conveyance_allowance }}%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Other Allowance</th>
                                            <td>
                                                TK-<input type="number" name="other_allowance" value="{{ ($employee->basic_salary * $employee->other_allowance) / 100 }}" style="border: none;font-weight:bolder" readonly >
                                                <span class="badge bg-teal">{{ $employee->other_allowance }}%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Gross Galary</th>
                                            <td>
                                                TK-<input type="number" name="gross_salary" value="{{ $employee->gross_salary }}" style="border: none;font-weight:bolder" readonly >
                                                {{-- TK-<strong>{{ $employee->gross_salary }}</strong> --}}
                                            </td>
                                        </tr>
                                        <tr class="text-center">
                                            <td colspan="2"><strong>Deduction </strong></td>
                                        </tr>
                                        @php
                                            $serial =1;
                                        @endphp
                                        @foreach ($advance as $salary)
                                            <tr>
                                                <th> {{$serial++}}. Adbvance Salary | <span class="text-muted">{{\Carbon\Carbon::parse($salary->created_at)->format('d M Y: h:i A'); }}</span></th>
                                                <td>
                                                    <strong>
                                                    TK-<input type="number" name="advance" value="{{$salary->amount}}" style="border: none; font-weight:bolder" readonly >
                                                  </strong>
                                                    {{-- <strong>TK-{{$salary->amount}}</strong> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <input type="hidden" name="total_installment" value="{{count($advance)}}">
                                        <tr>
                                            <th><strong>Total Advance Salary: </strong></th>
                                            <td>
                                                TK-<input type="number" name="total_advance" value="{{$advance->sum('amount');}}" style="border: none ;font-weight:bolder" readonly >
                                                {{-- <strong>TK-{{$advance->sum('amount');}}</strong> --}}
                                            </td>

                                        </tr>
                                        @if ($lone)
                                        <tr>
                                            <th><strong>Deduct For Loan: </strong></th>
                                            <td>
                                                <input type="number" name="Installment" id="" value="{{$salary->Installment}}" style="border: none; font-weight:bolder">
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                        <tr>
                                            <th><strong>Other Deduction : </strong></th>
                                            <td>
                                                <input type="number" name="other_deduction" id="" value="{{$salary->other_deduction}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><strong>Other Deduction remarks: </strong></th>
                                            <td>
                                                <textarea name="deduction_detail" type="text"
                                                class="form-control @error('deduction_detail')is-invalid @enderror" rows="3"
                                                placeholder="Enter your description">{{$salary->deduction_detail}}</textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-right"><strong>Payable Salary: </strong></th>
                                            <td>
                                                <input type="number" id="totalSalaryInfo" name="totalsalary"  value="{{($employee->gross_salary - ($advance->sum('amount') + $lone->Installment))}}" readonly style="border: none; font-weight:bolder">
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-start align-items-center">
                                    <button type="reset" class="btn btn-light">reset</button>
                                    <button type="submit" class="btn bg-blue ml-3"> <i
                                            class="icon-floppy-disk mr-2"></i>Save
                                    </button>
                                </div>
                            </div>



                        </div>

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

        $(document).on("change keyup", "input[name='Installment'], input[name='other_deduction']", function() {

            var totalsalary = $("input[name='totalsalary']");
            var gross_salary = $("input[name='gross_salary']");

            var other_deduction = $("input[name='other_deduction']");
            var installment = $("input[name='Installment']");
            var advance = $("input[name='total_advance']");
            let paybleSalary = parseInt(gross_salary.val()) - (parseInt(advance.val()) + parseInt(installment
            .val()) + parseInt(other_deduction.val()));
            totalsalary.val(paybleSalary);

            // console.log(parseInt( advance.val() ) + parseInt( installment.val() ) +  parseInt( other_deduction.val() ) );
            //    console.log(PaybleSalary);
        });;
    </script>
@endpush
