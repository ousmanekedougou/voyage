<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Colie;
use App\Models\Admin\Ville;
class ColiClient extends Model
{
    use HasFactory;
    public function colie(){
        return $this->belongsTo(Colie::class);
    }

    public function ville(){
        return $this->belongsTo(Ville::class);
    }
}
