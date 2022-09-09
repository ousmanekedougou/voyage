<?php

namespace App\Models\Admin;
use App\Models\Admin\Itineraire;
use App\Models\User\Client;
use App\Models\Admin\ColiClient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable = ['name','itineraire_id','amount'];

    public function itineraire()
    {
        return $this->belongsTo(Itineraire::class);
    }

     public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function colie_clients(){
        return $this->hasMany(ColiClient::class);
    }
}
