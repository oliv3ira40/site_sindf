<?php

namespace App\Models\Site\Wallet;

use Illuminate\Database\Eloquent\Model;

class CasembrapaWallet extends Model
{
    protected $table = 'casembrapa_wallet';
    protected $fillable = [
        'user_id',
        'recipient',
        'registration',
        'cpf',
        'cns',
        'birth_date',
        'type',
        'plan',
        'validity_date_portfolio',
        'stock_code',
        'situation',
        'email',
        'file_name',
    ];



    public function User()
    {
        return $this->belongsTo('App\Models\Admin\User', 'user_id');
    }
}
