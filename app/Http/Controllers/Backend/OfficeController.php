<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function officeView(){
        $offices = Office::orderBy('id','DESC')->get();
        return view('backend.office.office');
    }
    public function store(Request $request){

        $request->validate([
            'name'         => 'required',
            'address'      => 'required',
            'manager_name' => 'required',
            'mobile'       => 'required',
            'telephone'    => 'required',
            'email'        => 'required',
            // 'author_id'    => 'required',
        ],[

           ' name.required'        => 'please input your office name',
           'address.required'      => 'please input your address',
           'manager_name.required' => 'please input your manager name',
           'mobile.required'       => 'please input your mobile number',
           'telephone.required'    => 'please input your telephone number',
           'email.required'        => 'please input your email number',
        //    'author_id.required'    => 'please input your author id',
        ]);
        Office::create([
            'name'         => $request->name,
            'address'      => $request->address,
            'manager_name' => $request->manager_name,
            'mobile'       => $request->mobile,
            'telephone'    => $request->telephone,
            'email'        => $request->email,
            'author_id'    => $request->author_id,
        ]);
        return redirect()->route('office.view')->with('success','successfully data added');
    }
        public function office_View(){
            $offices = Office::latest()->get();
            return view('backend.office.office-view', compact('offices'));
        }
             //--------------------------office edit---------------------------------
        public function edit($id){
        $office = Office::findOrFail($id);
        return view('backend.office.edit',compact('office'));

            //----------------------------office update-------------------------------

}
        public function update(Request $request,$id){
            Office::findOrFail($id)->update([
                'name'         => $request->name,
                'address'      => $request->address,
                'manager_name' => $request->manager_name,
                'mobile'       => $request->mobile,
                'telephone'    => $request->telephone,
                'email'        => $request->email,
                'author_id'    => $request->author_id,

            ]);
            return redirect()->to('office-view')->with('update', 'Successfully Data Updated');
        }

        // ----------------------------office-delete---------------------------
        public function destroy($id){

            Office::findOrFail($id)->delete();
            return redirect()->back()->with('delete', 'Successfully Data delete');
        }

}
