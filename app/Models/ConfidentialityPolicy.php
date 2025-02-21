<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfidentialityPolicy extends Model
{
    use HasFactory;

    protected $table = 'confidentiality_policy';

    protected $fillable = [
        'signature',
        'date_signed',
        'customerID'
    ];
}
