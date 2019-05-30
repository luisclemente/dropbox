<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function invoices ()
    {
       $invoices = auth ()->user ()->invoices();
      // dd($invoices);
       return view ( 'admin.subscriptions.invoices', compact ( 'invoices' ) );
    }

   public function showInvoice (Request $request, $invoiceId)
   {
      $plans = Plan::all ();
      return view ( 'index', compact ( 'plans' ) );
   }
}
