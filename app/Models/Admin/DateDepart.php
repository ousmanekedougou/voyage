<?php

namespace App\Models\Admin;
use App\Models\Admin\Itineraire;
use App\Models\Admin\Bus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class DateDepart extends Model
{
    use HasFactory;

    protected $fillable = ['date_depart','heure_rv','heure_dep'];

    protected $dates = ['date_depart'];
    
    public function itineraire(){
        return $this->belongsTo(Itineraire::class);
    }
    public function buses(){
        return $this->hasMany(Bus::class);
    }
}
