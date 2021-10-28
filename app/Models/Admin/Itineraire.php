<?php

namespace App\Models\Admin;
use App\Models\Admin\Bus;
use App\Models\Admin\Ville;
use App\Models\Admin\Siege;
use App\Models\Admin\DateDepart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itineraire extends Model
{
    use HasFactory;

     public function buses()
    {
        return $this->hasMany(Bus::class);
    }

    public function villes()
    {
        return $this->hasMany(Ville::class);
    }

    public function siege(){
        return $this->belongsTo(Siege::class);
    }

    public function date_departs()
    {
        return $this->hasMany(DateDepart::class);
    }
}
