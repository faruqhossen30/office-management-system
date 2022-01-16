<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Author;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $assets = Asset::with('assettype','author')->latest()->paginate(6);
        $total = Asset::sum('price');
        //    return $assets;
        return view('backend.asset.asset_view', compact('assets', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asset_types = AssetType::get();
        // return $asset_types;
        return view('backend.asset.create_asset', compact('asset_types'));
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
            'name'                   => 'required',
            'assettype_id'           => 'required',
            'price'                  => 'required',
            // 'buy_date'               => 'required',
            // 'expiry_date'            => 'required',
            // 'warranty_date'          => 'required',
            // 'serial'                 => 'required',
            // 'additional_information' => 'required',
            // 'remarks'                => 'required',
            // 'author_id'              => 'required',
        ], [
            'name.required'                   => 'Please enter your asset name ',
            'assettype_id.required'           => 'Please enter your asset type ',
            'price.required'                  => 'Please enter your asset price ',
            'buy_date.required'               => 'Please enter your asset buy_date ',
            'expiry_date.required'            => 'Please enter your asset expiry_date ',
            'warranty_date.required'          => 'Please enter your asset warranty_date ',
            'serial.required'                 => 'Please enter your asset serial',
            'additional_information.required' => 'Please enter your asset additional_information ',
            'remarks.required'                => 'Please enter your asset remarks ',
            'author_id.required'              => 'Please enter your asset author_id ',
        ]);
        Asset::create([
            'name'                   => $request->name,
            'assettype_id'           => $request->assettype_id,
            'price'                  => $request->price,
            'buy_date'               => $request->buy_date,
            'expiry_date'            => $request->expiry_date,
            'warranty_date'          => $request->warranty_date,
            'serial'                 => $request->serial,
            'additional_information' => $request->additional_information,
            'remarks'                => $request->remarks,
            'author_id'              => Auth::user()->id
        ]);
        // return "ok";
        return redirect()->route('asset.index')->with('success', 'successfully data added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $assets = Asset::Where('id', $id)->first();
        // return $employees;

        return view('backend.asset.asset-show',compact('assets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assets = Asset::findOrFail($id);
        $asset_types = AssetType::get();
        return view('backend.asset.asset_edit', compact('assets', 'asset_types'));
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
        Asset::findOrFail($id)->update([
            'name'                   => $request->name,
            'assettype_id'           => $request->assettype_id,
            'price'                  => $request->price,
            'buy_date'               => $request->buy_date,
            'expiry_date'            => $request->expiry_date,
            'warranty_date'          => $request->warranty_date,
            'serial'                 => $request->serial,
            'additional_information' => $request->additional_information,
            'remarks'                => $request->remarks,
        ]);
        return redirect()->route('asset.index')->with('update', 'Successfully Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Asset::findOrFail($id)->delete();
        return redirect()->route('asset.index')->with('delete', 'Successfully Data delete');
    }
}
