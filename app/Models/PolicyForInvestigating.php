<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyForInvestigating extends Model
{
    use HasFactory;

    protected $fillable = [
        'customerID',
        'clients_rep_name',
        'clients_rep_date',
        'agency_rep_name',
        'agency_rep_date',
        'customerID',
    ];
}
