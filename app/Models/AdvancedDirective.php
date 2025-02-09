<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvancedDirective extends Model
{
    use HasFactory;

    protected $table = 'advanced_directive';

    protected $fillable = [
        'medical_record_number',
        'living_will',
        'statutory_power',
        'confirm',
        'clients_signature',
        'clients_signed_date',
        'agency_witness_name',
        'agency_witness_signature',
        'agency_signed_date',
        'customerID',
    ];
}
