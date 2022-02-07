<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Contact extends Model
{
    use HasFactory,Notifiable;
     protected $fillable = ['name','email','msg','subject','siege_id','status'];
}
