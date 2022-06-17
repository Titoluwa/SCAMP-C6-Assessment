<?php

namespace App;

use App\Client;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = ['id'];
    protected $timestamp = true;
    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
