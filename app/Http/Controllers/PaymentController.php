<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'DESC')->paginate(5);
        return view('payment', compact('payments'));
    }
}
