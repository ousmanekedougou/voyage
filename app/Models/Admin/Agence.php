<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Agent;
use App\Models\Admin\Siege;
// use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Agence extends Authenticatable
{
    use HasFactory, Notifiable;
       protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'adress',
        'registre_commerce',
        'amount',
        'facture',
        'payment_at',
        'slogan',
        'logo',
        'image',
        'status',
        'is_active',
        'slug',
        'confirmation_token',
        'region_id',
        'is_admin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agents(){
        return $this->hasMany(Agent::class);
    }

    public function sieges(){
        return $this->hasMany(Siege::class);
    }
}
