<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractFormAmended extends Model
{
    use HasFactory;

    protected $fillable = [
        'clients_signature',
        'client_signed_date',
        'agency_rep_name',
        'agency_rep_signature',
        'agency_rep_date',
        'customerID'
    ];
}
