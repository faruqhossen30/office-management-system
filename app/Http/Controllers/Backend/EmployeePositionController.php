<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeePositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $positions = Position::latest()->get();
            return view('backend.employee.position.position-view',compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.employee.position.position');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'position'    => 'required',
        'description' => 'required',
       ],[
           'position.required'    => 'Please enter position',
           'description.required' => 'Please enter description',
       ]);

       Position::create([
        'position'    => $request->position,
        'description' => $request->description,
       ]);
       return redirect()->route('position.index')->with('success','Successfully data added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Position::findOrFail($id);
        // return $positions;
        return view('backend.employee.position.position-edit',compact('position'));
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
        Position::findOrFail($id)->update([
            'position'    => $request->position,
            'description' => $request->description,
        ]);
        return redirect()->route('position.index')->with('update','Successfully data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Position::findOrFail($id)->delete();
        return redirect()->route('position.index')->with('delete', 'Successfully Data delete');
    }
}
