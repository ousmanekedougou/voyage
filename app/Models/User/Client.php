<?php

namespace App\Models\User;

use App\Models\Admin\Bus;
use App\Models\Admin\Ville;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Client extends Model
{
    use HasFactory,Notifiable;

     public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

      public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

      protected $fillable = [
        'name',
        'email',
        'phone',
        'ville_id',
        'bus_id',
        'position',
        'amount',
        'registered_at',
        'payment_at',
        'confirmation_token'
    ];
}
