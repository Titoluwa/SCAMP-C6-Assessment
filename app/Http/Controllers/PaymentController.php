<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index']);
    }
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'DESC')->paginate(5);
        return view('payment', compact('payments'));
    }
    public function store(Request $request)
    {
        $payment = Payment::create($request->all());
        if($payment){
            $payment->save();
            $payment = Payment::orderBy('created_at', 'DESC')->first();
            Invoice::where('id', $payment->invoice_id)->update(['status'=> 0]);
        }
        return back();
    }
    public function pay($id)
    {
        $invoice = Invoice::where('id', $id)->first();
        
        return view('pay', compact('invoice'));
    }
}
