<?php

namespace App\Http\Controllers;

use App\Client;
use App\Invoice;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $clients = Client::all();
        return view('invoice_form', compact('clients'));
    }
    public function create(Request $request)
    {
        $date = Carbon::now()->format('Y/m/d');
        $invoice = Invoice::create($request->all());
        $invoice->invoice_no = 'INV/'. $date .'/'. (rand(100,999));
        $invoice->total_amount = $request->product_price * $request->product_quantity;
        $invoice->save();
        if($invoice){
            
            $invoice = Invoice::orderBy('id', 'desc')->with('client')->first();
            Mail::to($invoice->client->email)->send(new InvoiceMail($invoice));
        }
                
        return redirect('/invoice/view');
    }
    public function show()
    {
        $invoices = Invoice::orderBy('status', 'desc')->paginate(6);
        return view('invoice_view', compact('invoices'));
    }
}
