<?php

namespace App\Http\Controllers\Backend\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DepositPdfController extends Controller
{
    public function index()
    {
        return view('backend.deposit.deposit-view');
    }

    public function depositPdf($type = 'stream')
    {

        $deposits = Deposit::all();
        $pdf = Pdf::loadView('backend.deposit.invoice-pdf', compact('deposits'));
        return $type == 'stream' ? $pdf->stream() :  $pdf->download('invoice.pdf');
    }

    public function singleview()
    {

        return view('backend.deposit.deposit-show');
    }


    public function singleViewPdf($type = 'stream')
    {

        $deposit = Deposit::first();
        $pdf = Pdf::loadView('backend.deposit.depositpdfSingle', compact('deposit'));
        return $type == 'stream' ? $pdf->stream()  :  $pdf->download('deposit.single.invoice.pdf');
    }
}
