<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumerBillOfRight extends Model
{
    use HasFactory;

    protected $table = 'consumer_bill_of_right';

    protected $fillable = [
        'clients_signature',
        'clients_date_signed',

        'clients_rep_signature',
        'clients_rep_firstname',
        'clients_rep_lastname',
        'clients_rep_signed_date',

        'agency_rep_signature',
        'agency_rep_name',
        'agency_signed_date',

        'customerID'
    ];
}
