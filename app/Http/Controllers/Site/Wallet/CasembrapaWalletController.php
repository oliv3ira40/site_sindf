<?php

namespace App\Http\Controllers\Site\Wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Helpers\HelpAdmin;
use App\Helpers\Site\Wallet\HelpWalletCasembrapa;

use App\Models\Admin\User;
use App\Models\Site\Wallet\CasembrapaWallet;

use App\Http\Requests\Site\Wallet\Casembrapa\ReqDigitalWallet;

class CasembrapaWalletController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
}
