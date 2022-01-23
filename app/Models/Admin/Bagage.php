<?php

namespace App\Models\Admin;

use App\Models\User\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagage extends Model
{
    use HasFactory;
    
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function bagage_clients(){
        return $this->hasMany(BagageClient::class);
    }

     public function siege(){
        return $this->belongsTo(Siege::class);
    }
}
