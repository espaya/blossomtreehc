<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyServices extends Model
{
    use HasFactory;

    protected $table = 'my_services'; 

    protected $fillable = [
        'id',
        'customerID',
        'serviceID'
    ];
}
