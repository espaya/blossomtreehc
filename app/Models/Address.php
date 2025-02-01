<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    protected $fillable = [
        'id',
        'userID',
        'address',
        'addressLine2',
        'city',
        'state',
        'zip',
        'country'
    ];
}
