<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AssetListFilterController extends Controller
{
    public function assetListByWeek(Request $request)
    {
        // return "Just for test";
        $assets = Asset::with('assettype')->whereBetween('buy_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->paginate(7);
        $total = $assets->sum('price');
        // return $expense_lists;
        return view('backend.asset.asset_view', compact('assets', 'total'));
    }
    public function assetListByMonth(Request $request)
    {
        // return "Just for test";
        $assets = Asset::with('assettype')->whereMonth('buy_date', Carbon::now()->month)->latest()->paginate(7);
        $total = $assets->sum('price');
        // return $expense_lists;
        return view('backend.asset.asset_view', compact('assets', 'total'));
    }
}
