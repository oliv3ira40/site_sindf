<?php

namespace App\Models\Site\Wallet;

use Illuminate\Database\Eloquent\Model;

class CassiWallet extends Model
{
    protected $table = 'cassi_wallet';
    protected $fillable = [
        'user_id',
        'name',
        'cpf',
        'birth',
        'functional_enrollment',
        'Family',
        'dep',
        'uf',
        'contract_adhesion_date',
        'card',
        'situation_card',
        'shelf_life',
        'lot',
        'file_name',
    ];



    public function User()
    {
        return $this->belongsTo('App\Models\Admin\User', 'user_id');
    }
}
