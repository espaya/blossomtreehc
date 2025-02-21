<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsentForServices extends Model
{
    use HasFactory;

    protected $table = 'consent_for_services';

    protected $fillable = [
        'medical_record_number',
        'consent',
        'client_agent_signature',
        'client_agent_name',
        'relationship',
        'client_date_signed',
        'agency_rep_signature',
        'agency_rep_name',
        'title',
        'agency_signed_date',
        'customerID'
    ];
}
