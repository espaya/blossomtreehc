<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractorBio extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'date_of_birth',
        'social_security_number',
        'driver_license_number',
        'email',
        'home_address',
        'city',
        'state',
        'zip_code',
        'telephone',
        'date_of_hire',
        'level_of_education',
        'date_of_background_checks',
        'date_of_abuse_registry_check',
        'date_of_misconduct_registry_check',
        'date_of_substance_abuse_check',
        'date_of_evaluation',
        'contractor_signature',
        'contractor_firstname',
        'contractor_lastname',
        'date',
        'hr_representative_signature',
        'hr_firstname',
        'hr_lastname',
        'customerID'
    ];
}
