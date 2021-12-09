<?php

namespace App\Models\Admin;
use App\Models\Admin\Siege;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Agent extends Model
{
    use HasFactory, Notifiable ,Authenticatable;
        protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'adress',
        'slogan',
        'image',
        'status',
        'is_active',
        'slug',
        'confirmation_token'
    ];

     public function siege()
    {
        return $this->belongsTo(Siege::class);
    }

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }
}
