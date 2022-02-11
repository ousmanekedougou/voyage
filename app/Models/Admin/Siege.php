<?php

namespace App\Models\Admin;
use App\Models\Admin\Agent;
use App\Models\Admin\Siegemsg;
use App\Models\Admin\Bus;
use App\Models\Admin\Itineraire;
use App\Models\User;
use App\Models\User\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siege extends Model
{
    use HasFactory;

      public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }

     public function users()
    {
        return $this->hasMany(User::class);
    }

     public function itineraires()
    {
        return $this->hasMany(Itineraire::class);
    }

     public function buses()
    {
        return $this->hasMany(Bus::class);
    }

     public function colies()
    {
        return $this->hasMany(Colie::class);
    }

     public function bagages()
    {
        return $this->hasMany(Bagage::class);
    }
    
     public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function siegemsg(){
        return $this->belongsTo(Siegemsg::class);
    }
}
