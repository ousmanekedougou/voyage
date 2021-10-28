<?php

namespace App\Models\Admin;
use App\Models\Admin\Siege;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

     public function siege()
    {
        return $this->belongsTo(Siege::class);
    }
}
