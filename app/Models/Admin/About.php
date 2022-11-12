<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'abaout','motivation','politic_ticket','politic_bc','politic_apte','ville_arret','agence_id'
    ];

    public function agence(){
        return $this->belongsTo(Agence::class);
    }
}
