<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BagageClient extends Model
{
    use HasFactory;

    public function bagage(){
        return $this->belongsTo(Bagage::class);
    }
}
