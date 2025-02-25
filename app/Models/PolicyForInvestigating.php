<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyForInvestigating extends Model
{
    use HasFactory;

    protected $table = 'policy_for_investigating';

    protected $fillable = [
        'clients_rep_name',
        'clients_rep_date',
        'agency_rep_name',
        'agency_rep_date',
        'customerID',
    ];
}
