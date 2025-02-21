<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargesForServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'clients_signature',
        'clients_signed_date',
        'clients_rep_signature',
        'clients_rep_firstname',
        'clients_rep_lastname',
        'clients_rep_date_signed',
        'agency_rep_signature',
        'agency_rep_name',
        'agency_date_signed',
        'agency_date_signed',
        'customerID' 
    ];
}
