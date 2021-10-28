<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Agence extends Model
{
    use HasFactory,Notifiable;
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
}
