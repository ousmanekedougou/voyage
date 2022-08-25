<?php

namespace App\Models\User;

use App\Models\Admin\Bagage;
use App\Models\Admin\Bus;
use App\Models\Admin\Colie;
use App\Models\Admin\Siege;
use App\Models\Admin\Ville;
use App\Models\User\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Customer extends Authenticatable
{
    use HasFactory,Notifiable;

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
        'confirmation_token',
        'remboursement',
        'voyage_status',
        'siege_id',
        'reference',
        'cni',
        'is_admin',
        'is_active',
        'slug',
        'password',
        'image'
    ];

    public function siege()
    {
        return $this->belongsTo(Siege::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function bagages(){
      return $this->hasMany(Bagage::class);
    }

    public function colies(){
      return $this->hasMany(Colie::class);
    }

    public function clients(){
        return $this->hasMany(Client::class);
    }
    
}
