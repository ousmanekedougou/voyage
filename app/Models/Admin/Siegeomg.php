<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Siege;

class Siegeomg extends Model
{
    use HasFactory;

    protected $fillable = ['siege_id','clientId','clientSecret','status'];

    public function sieges(){
        return $this->hasMany(Siege::class);
    }
}
