<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportingPatientAbuse extends Model
{
    use HasFactory;

    protected $fillable = [
        'clients_signature',
        'clients_date_signed',
        'agency_rep_name',
        'agency_rep_signture',
        'agency_date_signed',
        'customerID'
    ];
}
