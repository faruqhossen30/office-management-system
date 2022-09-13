<?php

namespace App\Http\Controllers\Backend\Pdf;

use App\Http\Controllers\Controller;
use App\Models\ExpenseList;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ExpensePdfController extends Controller
{
   public function index(){
    return view('backend.expense-list.expense_view');
   }
   public function ExpensePdf($type = 'stream')
   {
       $expense_lists = ExpenseList::all();
       $pdf = Pdf::loadView('backend.expense-list.expense-invoice-pdf', compact('expense_lists'));
       return $type == 'stream' ? $pdf->stream() :  $pdf->download('invoice.pdf');
   }


   public function singleview(){

    return view('backend.expense-list.expense_show');
    // return view(');

   }

   public function singleViewPdf($type = 'stream')
   {
       $expense_lists = ExpenseList::first();
       $pdf = Pdf::loadView('backend.expense-list.expensepdfSingle', compact('expense_lists'));
       return $type == 'stream' ? $pdf->stream() :  $pdf->download('invoice.pdf');
   }

}
