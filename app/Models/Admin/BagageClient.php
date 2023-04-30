<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BagageClient extends Model
{
    use HasFactory;

    public function getAmount(){
        return number_format($this->prix,2, ',','.'). ' CFA';
    }

    public function getAmountTotal(){
        return number_format($this->prix_total,2, ',','.'). ' CFA';
    }

    public function bagage(){
        return $this->belongsTo(Bagage::class);
    }
}
