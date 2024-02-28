<?php

namespace App\Models\User;

use App\Models\Admin\Bagage;
use App\Models\Admin\Bus;
use App\Models\Admin\Siege;
use App\Models\Admin\Ville;
use App\Models\User\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory,Notifiable;
      protected $fillable = [
        'reference',
        'name',
        'email',
        'phone',
        'ville_id',
        'bus_id',
        'position',
        'amount',
        'registered_at',
        'payment_at',
        'payment_methode',
        'confirmation_token',
        'remboursement',
        'voyage_status',
        'siege_id',
        'reference',
        'cni',
        'canceled_at',
        'canceled_time'
    ];

    public function getAmount(){
        return number_format($this->amount,2, ',','.'). ' CFA';
    }

    public function getAmountTotal(){
        return number_format($this->prix_total,2, ',','.'). ' CFA';
    }

     public function bus()
    {
        return $this->belongsTo(Bus::class);
    }


    public function bagages(){
      return $this->hasMany(Bagage::class);
    }

      public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function siege(){
        return $this->belongsTo(Siege::class);
    }

    public function customer(){
      return $this->belongsTo(Customer::class);
    }
    
}
