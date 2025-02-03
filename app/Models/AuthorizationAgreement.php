<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorizationAgreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'consumer_signature',
        'consumer_signed_date',
        'agency_rep_name',
        'agency_rep_signature',
        'agency_signed_date',
        'customerID'
    ];
}
