<?php

namespace App\Http\Controllers\Backend\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AssetPdfController extends Controller
{
   public function singleview(){

         return view('backend.asset.asset-show');
   }

   public function singleViewPdf($type = 'stream')
    {
        $assets = Asset::first();
        $pdf = Pdf::loadView('backend.asset.assetsinglePdf', compact('assets'));
        return $type == 'stream' ? $pdf->stream() :  $pdf->download('invoice.pdf');
    }
    public function index(){
        return view('backend.asset.asset_view');
    }

    public function assetPdf($type = 'stream')
    {
        $assets = Asset::all();
        $pdf = Pdf::loadView('backend.asset.asset-invoice-list', compact('assets'));
        return $type == 'stream' ? $pdf->stream() :  $pdf->download('asset-list-invoice.pdf');
    }

}
