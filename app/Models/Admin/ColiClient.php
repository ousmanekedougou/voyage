<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Colie;
use App\Models\Admin\Ville;
use App\Models\User\Customer;

class ColiClient extends Model
{
    use HasFactory;
    public function colie(){
        return $this->belongsTo(Colie::class);
    }

    public function ville(){
        return $this->belongsTo(Ville::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
