<?php

namespace App\Http\Controllers;

use App\Models\SubAssetType;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function assetTypeToSubassetTypeList(Request $request, $id)
    {
        if ($request->ajax()) {
            $list = SubAssetType::where('asset_type_id', intval($id))->get();
            return $list;
        }
    }
}
