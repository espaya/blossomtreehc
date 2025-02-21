<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumerEmergency extends Model
{
    use HasFactory;

    protected $table = 'consumer_emergency';

    protected $fillable = [
        'soc',
        'telephone',
        'cell_phone',

        'responsible_persons_name',
        'relationship',
        'responsible_person_home_telephone',
        'responsible_person_work_phone',
        'responsible_person_cell_phone',

        'friend_relative_name',
        'friend_relative_relationship',
        'friend_relative_home_telephone',
        'friend_relative_work_phone',
        'friend_relative_cell_phone',

        'primary_physician',
        'physician_telephone',

        'customerID'
    ];
}
