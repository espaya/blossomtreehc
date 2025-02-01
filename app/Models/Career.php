<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'email',
        'phone',
        'position',
        'resume',
        'messasge'
    ];
}
