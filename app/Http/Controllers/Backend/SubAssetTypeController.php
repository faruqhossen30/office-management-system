<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AssetType;
use App\Models\SubAssetType;
use Illuminate\Http\Request;

class SubAssetTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_asset_types = SubAssetType::with('assettype')->latest()->get();
        // return $sub_asset_types;
        return view('backend.asset-type.sub-asset.sub-asset-type-view', compact('sub_asset_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asset_types = AssetType::all();
        // return $asset_types;
        return view('backend.asset-type.sub-asset.sub-asset-create', compact('asset_types'));
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
            'asset_type_id' => 'required',
            'name'          => 'required',
        ], [
            'asset_type_id.required' => 'please enter your sub asset type',
            'name.required'          => 'please enter your asset name',
        ]);
        SubAssetType::create([
            'asset_type_id' => $request->asset_type_id,
            'name'          => $request->name,
        ]);
        return redirect()->route('sub-asset-type.index')->with('success', 'successfully data added');
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

            $sub_asset = SubAssetType::findOrFail($id);
            $asset_types = AssetType::all();
            // return   $sub_assets;
            return view('backend.asset-type.sub-asset.sub-asset-edit', compact('sub_asset', 'asset_types'));

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

        SubAssetType::findOrFail($id)->update([
            'asset_type_id' => $request->asset_type_id,
            'name'          => $request->name
        ]);
        return redirect()->route('sub-asset-type.index')->with('update', 'Successfully data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubAssetType::findOrFail($id)->delete();
        return redirect()->route('sub-asset-type.index')->with('delete', 'Successfully Data delete');
    }

}
