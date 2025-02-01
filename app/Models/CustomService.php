<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomService extends Model
{
    use HasFactory;

    protected $table = 'custom_service';

    protected $fillable = [
        'myCustomService',
        'customerID'
    ];
}
