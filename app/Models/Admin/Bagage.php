<?php

namespace App\Models\Admin;

use App\Models\User\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagage extends Model
{
    use HasFactory;

    protected $fillable = ['quantity'];

    

    public function getAmountUnitaire(){
        return number_format($this->prix,2, ',','.'). ' CFA';
    }

    public function getAmount(){
        return number_format($this->prix_total,2, ',','.'). ' CFA';
    }
    
    public function getAmountTotal(){
        return number_format($this->prix_total,2, ',','.'). ' CFA';
    }
    
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function bagage_clients(){
        return $this->hasMany(BagageClient::class);
    }

     public function siege(){
        return $this->belongsTo(Siege::class);
    }
}
