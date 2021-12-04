<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetType;
use Illuminate\Http\Request;

class AssetTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
    $asset_types = AssetType::get();

    // return  $asset_types;
       return view('backend.asset-type.asset-type',compact('asset_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.asset-type.asset-type');
        // return "ok";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'asset_name' => 'required',
        ],[
            'asset_name.required' => 'please enter your asset type',
        ]);
        AssetType::create([
            'asset_name' =>$request->asset_name,
        ]);
        return redirect()->route('assettype.index')->with('success','successfully data added');
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
        $asset_types = AssetType::findOrFail($id);
        // return $asset_types;
        return view('backend.asset-type.edit-asset-type',compact('asset_types'));
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
        // return $request->all();
       AssetType :: findOrFail($id)->update([
        'asset_name' => $request->asset_name,
       ]);

    //    return "ok";
       return redirect()->route('assettype.index')->with('update', 'Successfully Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AssetType::findOrFail($id)->delete();
        return redirect()->route('assettype.index')->with('delete', 'Successfully Data delete');
    }
}
