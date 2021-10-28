<?php

namespace App\Models\Admin;
use App\Models\Admin\Itineraire;
use App\Models\User\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    public function itineraire()
    {
        return $this->belongsTo(Itineraire::class);
    }

     public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
