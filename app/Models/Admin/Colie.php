<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\ColiClient;
class Colie extends Model
{
    use HasFactory;
    public function coli_clients(){
        return $this->hasMany(ColiClient::class);
    }

    public function siege(){
        return $this->belongsTo(Siege::class);
    }
}
