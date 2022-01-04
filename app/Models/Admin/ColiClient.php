<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Colie;
class ColiClient extends Model
{
    use HasFactory;
    public function colie(){
        return $this->belongsTo(Colie::class);
    }
}
