<?php

namespace App\Http\Controllers;


use App\Client;
use Illuminate\Http\Request;
use Joli\JoliNotif\NotifierFactory;
use Joli\JoliNotif\Notification;

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

        // Create a Notifier
        $notifier = NotifierFactory::create();

        // Create your notification
        $notification = (new Notification())
                        ->setTitle('She Code Africa')
                        ->setBody('Notification Challenge: New Client Added!');
                        // ->setIcon(storage_path('public/img/sca.jpg'));
        //Send it 
        $notifier->send($notification);

        return redirect('home');
    }
}
