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
                    <input type="datetime-local" name="payment_date" id="" value="" style="border: none; font-weight:bolder">

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
            @if ($loan)
            <tr>
                <th><strong>Deduct For Loan: </strong></th>
                <td>
                    <input type="number" name="Installment" id="" value="{{$loan->Installment}}" style="border: none; font-weight:bolder">
                </td>
            </tr>
            @endif
            <tr>
            <tr>
                <th><strong>Other Deduction : </strong></th>
                <td>
                    <input type="number" name="other_deduction" id="" value="0">
                </td>
            </tr>
            <tr>
                <th><strong>Other Deduction remarks: </strong></th>
                <td>
                    <textarea name="deduction_detail" type="text"
                    class="form-control @error('deduction_detail')is-invalid @enderror" rows="3"
                    placeholder="Enter your description">{{ old('deduction_detail') }}</textarea>
                </td>
            </tr>

            <tr>
                <th class="text-right"><strong>Payable Salary: </strong></th>
                <td>
                    <input type="number" id="totalSalaryInfo" name="totalsalary"  value="{{($employee->gross_salary - ($advance->sum('amount') + $loan->Installment))}}" readonly style="border: none; font-weight:bolder">
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


