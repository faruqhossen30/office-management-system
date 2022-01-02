<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Office;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('position', 'office','department')->latest()->paginate(4);
        // return $employees ;
        $positions = Position::latest()->get();
        // return $positions;
        $departments = Department::latest()->get();
        // return $departments;
        return view('backend.employee.view-employee', compact('employees', 'positions','departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offices = Office::all();
        // return $offices;
        $positions = Position::all();
        // return $positions;
        $departments = Department::latest()->get();
        // return $departments;
        return view('backend.employee.add-employee', compact('positions', 'offices', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $request->validate([

            'name'                 => 'required',
            'email'                => 'required',
            'phone'                => 'required',
            'phone_alt'            => 'required',
            'country'              => 'required',
            'address'              => 'required',
            'city'                 => 'required',
            'zip_code'             => 'required',
            'gender'               => 'required',
            'blood_group'          => 'required',
            'nid_no'               => 'required',
            'date_of_birth'        => 'required',
            'covid_vaccine'        => 'required',
            'join_date'            => 'required',
            'photo'                => 'required|mimes:png,jpg,gif,bmp|max:4048',
            'department_id'        => 'required',
            'marital_status'       => 'required',
            'description'          => 'required',
            'position_id'          => 'required',
            'office_id'            => 'required',
            'basic_salary'         => 'required',
            'house_allowance'      => 'required',
            'medical_allowance'    => 'required',
            'conveyance_allowance' => 'required',
            'other_allowance'      => 'required',
            // 'gross_salary'         => 'required',
        ], [
            'name.required'                 => 'please enter your name',
            'email.required'                => 'please enter your email',
            'phone.required'                => 'please enter your phone',
            'phone_alt.required'            => 'please enter your phone_alt',
            'address.required'              => 'please enter your address',
            'country.required'              => 'please enter your country',
            'city.required'                 => 'please enter your city',
            'zip_code.required'             => 'please enter your zip_code',
            'gender.required'               => 'please enter your gender',
            'blood_group.required'          => 'please enter your blood_group',
            'nid_no.required'               => 'please enter your nid_no',
            'date_of_birth.required'        => 'please enter your date_of_birth',
            'covid_vaccine.required'        => 'please enter your covid_vaccine',
            'join_date.required'            => 'please enter your join_date',
            'photo.required'                => 'please enter your photo',
            'department_id.required'        => 'please enter your department',
            'marital_status.required'       => 'please enter your marital_status',
            'description.required'          => 'please enter your description',
            'position_id.required'          => 'please enter your position ',
            'office_id.required'            => 'please enter your office ',
            'basic_salary.required'         => 'please enter your basic salary',
            'house_allowance.required'      => 'please enter your house allowance',
            'medical_allowance.required'    => 'please enter your medical allowance',
            'conveyance_allowance.required' => 'please enter your conveyance allowance',
            'other_allowance.required'      => 'please enter your other allowance',
            // 'gross_salary.required'         => 'please enter your other gross salary',
        ]);
            $photo =  $request->file('photo');
            if ($photo) {
            // For Create Database Name
            $extention =  $photo->getClientOriginalExtension();
            $imageName = time() . '.' . $extention;
            //  For Saving upload folder
            $photo->move('employee/photo', $imageName);

            Employee::create([
                'name'                 => $request->name,
                'email'                => $request->email,
                'phone'                => $request->phone,
                'phone_alt'            => $request->phone_alt,
                'country'              => $request->country,
                'address'              => $request->address,
                'city'                 => $request->city,
                'zip_code'             => $request->zip_code,
                'gender'               => $request->gender,
                'blood_group'          => $request->blood_group,
                'nid_no'               => $request->nid_no,
                'date_of_birth'        => $request->date_of_birth,
                'photo'                => $imageName,
                'covid_vaccine'        => $request->covid_vaccine,
                'join_date'            => $request->join_date,
                'department_id'        => $request->department_id,
                'marital_status'       => $request->marital_status,
                'description'          => $request->description,
                'position_id'          => $request->position_id,
                'office_id'            => $request->office_id,
                'basic_salary'         => $request->basic_salary,
                'house_allowance'      => $request->house_allowance,
                'medical_allowance'    => $request->medical_allowance,
                'conveyance_allowance' => $request->conveyance_allowance,
                'other_allowance'      => $request->other_allowance,
                'gross_salary'         => $request->gross_salary,
            ]);
            return redirect()->route('employee-information.index')->with('success','Successfully data added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employee::Where('id', $id)->first();
        // return $employees;

        return view('backend.employee.employee-detail',compact('employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();
        return redirect()->route('employee-information.index')->with('delete', 'Successfully Data delete');
    }
}
