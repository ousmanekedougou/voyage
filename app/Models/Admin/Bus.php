<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Itineraire;
use App\Models\Admin\Siege;
use App\Models\Admin\DateDepart;
use App\Models\User\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'inscrit',
    ];

   public function getAmount(){
        return number_format($this->montant,2, ',','.'). ' CFA';
    }

    public function itineraire()
    {
        return $this->belongsTo(Itineraire::class);
    }

       public function siege()
    {
        return $this->belongsTo(Siege::class);
    }

     public function clients()
    {
        return $this->hasMany(Client::class);
    }

    
}
