<?php

namespace App\Models;

use App\Models\Admin\Agence;
use App\Models\Admin\Bus;
use App\Models\Admin\Siege;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
        'confirmation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function buses()
    {
        return $this->hasMany(Bus::class);
    }

    public function siege()
    {
        return $this->belongsTo(Siege::class);
    }

    public function agences()
    {
        return $this->hasMany(Agence::class);
    }
}
