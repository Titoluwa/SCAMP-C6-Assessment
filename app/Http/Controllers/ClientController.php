<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('client_form');
    }
    public function create(Request $request)
    {
        $client = Client::create($request->all());
        $client->save();
        return redirect('home');
    }
}
