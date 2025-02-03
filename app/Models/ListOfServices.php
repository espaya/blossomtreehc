<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListOfServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_legal_signature',
        'client_legal_date',
        'clients_rep_name',
        'relation_to_client',
        'agency_rep_name',
        'agency_rep_signature',
        'agency_signed_date',
        'customerID'
    ];
}
