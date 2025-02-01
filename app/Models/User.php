<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PragmaRX\Google2FA\Google2FA;



class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'phone',
        'termsCondition',
        'email',
        'password',
        'img', 
        'two_factor_secret', 
        'two_factor_enabled', 
        'two_factor_expires_at',
        'opt'
    ];

    protected $casts = [
        'two_factor_expires_at' => 'datetime',
    ];


    public function generateTwoFactorSecret()
    {
        $google2fa = new Google2FA();
        $this->two_factor_secret = $google2fa->generateSecretKey(32);
        $this->save();
    }

    // Verify 2FA Code
    public function verifyTwoFactorCode($code)
    {
        $google2fa = new Google2FA();
        return $google2fa->verifyKey($this->two_factor_secret, $code);
    }

    // Enable 2FA
    public function enableTwoFactor()
    {
        $this->two_factor_enabled = true;
        $this->save();
    }

    // Disable 2FA
    public function disableTwoFactor()
    {
        $this->two_factor_enabled = false;
        $this->save();
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
