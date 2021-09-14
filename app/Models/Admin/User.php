<?php

namespace App\Models\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    
    protected $table = 'users';
    protected $fillable = [
        'first_name',
        'last_name',
        'login',
        'email',
        'telephone',
        'cpf',
        'registration',
        'registration_for_login',
        'date_of_birth',
        'password',
        'remember_token',
        'definitive_password',
        'annual_digital_wallet_shipment',
        'compliant',
        'group_id',
        'avatar_id',
        'deleted_at'
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = ['deleted_at', 'date_of_birth'];
    public $timestamps = true;
 
 
    function Group() {
        return $this->belongsTo(Group::class, 'group_id');
    }

    function UserSetting()
    {
        return $this->HasOne(UserSetting::class, 'user_id');
    }

    public function Avatar()
    {
        return $this->belongsTo(Avatar::class, 'avatar_id');
    }

    public function CasembrapaWallet()
    {
        return $this->hasOne('App\Models\Site\Wallet\CasembrapaWallet', 'user_id');
    }
}