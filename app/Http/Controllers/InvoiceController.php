<?php

namespace App\Http\Controllers;

use App\Client;
use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('invoice_form', compact('clients'));
    }
    public function create(Request $request)
    {

        $invoice = Invoice::create($request->all());
        $invoice->total_amount = $request->product_price * $request->product_quantity;
        
        $invoice->save();
        return view('home');
    }
}
