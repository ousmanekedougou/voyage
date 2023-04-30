<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\ColiClient;
use App\Models\User\Customer;

class Colie extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','cni','siege_id','customer_id','prix_total'];

    public function getAmountTotal(){
        return number_format($this->prix_total,2, ',','.'). ' CFA';
    }

    public function coli_clients(){
        return $this->hasMany(ColiClient::class);
    }

    public function siege(){
        return $this->belongsTo(Siege::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
