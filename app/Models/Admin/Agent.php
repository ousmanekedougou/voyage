<?php

namespace App\Models\Admin;
use App\Models\Admin\Siege;
use App\Models\Admin\Agence;
use App\Models\Admin\Payment;
// use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Agent extends Authenticatable
{
    use HasFactory, Notifiable;
        protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'adress',
        'status',
        'is_admin',
        'is_active',
        'slug',
        'confirmation_token',
        'agence_id',
        'siege_id',
        'logo',
        'montant_journaliere'
    ];

    public function getAmount(){
        return number_format($this->montant_journaliere,2, ',','.'). ' CFA';
    }

     public function siege()
    {
        return $this->belongsTo(Siege::class);
    }

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
