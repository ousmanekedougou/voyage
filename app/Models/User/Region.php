<?php

namespace App\Models\User;

use App\Models\Admin\Agence;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','status'];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function agences(){
        return $this->hasMany(Agence::class);
    }

    public function customers(){
        return $this->hasMany(Customer::class);
    }
}
