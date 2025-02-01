<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
{
    use HasFactory;

    protected $table = 'user_device';

    protected $fillable = [
        'user_id',
        'device',
        'platform',
        'platform_version',
        'browser',
        'browser_version',
    ];

}
