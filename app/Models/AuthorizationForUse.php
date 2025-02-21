<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorizationForUse extends Model
{
    use HasFactory;

    protected $table = 'authorization_for_use';

    protected $fillable = [
        'consent', 
        'disclose_to',
        'hiv',
        'alcohol_substance',
        'psychotherapy',
        'other',
        'specify',

        'consumer_signature',
        'consumer_date_signed',

        'consumer_rep_signature',
        'consumer_rep_date_signed',
        'consumer_name_authority',

        'agency_rep_signature',
        'agency_rep_title',
        'agency_signed_date',
        'customerID'
        
    ];
}
