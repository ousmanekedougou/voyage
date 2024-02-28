<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Agent;
class Payment extends Model
{
    use HasFactory;

    protected $guarded = [''];

    

    public function getAmountTotal(){
        return number_format($this->amount,2, ',','.'). ' CFA';
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
