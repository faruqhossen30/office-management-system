<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // return $users;
        return view('backend.user.user-list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $create_user = user::all();
        // return  $create_user;
        return view('backend.user.create-user',compact('create_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  return $request->all();
        $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required',
            'phone'    => 'required',
            'roll'     => 'required',
            'photo'    => 'required',

         ],[
              'name.required'     => 'please enter your name',
              'email.required'    => 'please enter your email',
              'password.required' => 'please enter your password',
              'phone.required'    => 'please enter your phone',
              'roll.required'     => 'please enter your roll',
              'photo.required'    => 'please enter your photo'
         ]);
         $photo =  $request->file('photo');
            if ($photo) {
            // For Create Database Name
            $extention =  $photo->getClientOriginalExtension();
            $imageName = time() . '.' . $extention;
            //  For Saving upload folder
            $photo->move('employee/photo', $imageName);

            User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'phone'    => $request->phone,
                'photo'    => $imageName,
                'roll'     => $request->roll,

            ]);
      return redirect()->route('user-admin.index')->with('success', 'Successfully Data delete');
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
        $users = User::Where('id', $id)->first();
        // return $employees;

        return view('backend.user.show-user',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        // return   $user;
        return view('backend.user.edit-user' ,compact('user'));
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
        $photo = $request->file('photo');

        if($photo){
            // For Create Database Name
            $extention =  $photo->getClientOriginalExtension();
            $imageName = time().'.'.$extention;
            //  For Saving upload folder
            $photo->move('employee/photo', $imageName);

            //  return $request->all();
          User::findOrFail($id)->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
            'phone'    => $request->phone,
            'photo'    => $imageName,
            'roll'     => $request->roll,
        ]);
        return redirect()->route('user-admin.index')->with('update', 'Successfully Data Updated');
    }else{

        User::findOrFail($id)->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
            'phone'    => $request->phone,
            'roll'     => $request->roll,
        ]);
        return redirect()->route('user-admin.index')->with('update', 'Successfully Data Updated');
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

         User::findOrFail($id)->delete();
         return redirect()->route('user-admin.index')->with('delete', 'Successfully Data delete');

    }
}
