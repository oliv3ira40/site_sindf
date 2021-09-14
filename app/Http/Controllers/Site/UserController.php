<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Site\Wallet\CasembrapaWallet;

use App\Http\Requests\Site\User\SimpleUserValidation\ReqValidateDateOfBirth;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }



    public function validateCpf($target) {

        if ($target == 'billet') {
            $data_page = [
                'title' => '- Boleto do mês',
                'title_page' => 'Boleto do mês',
                'instruction' => 'Digite o número de seu CPF para visualizar o boleto do mês.',
                'button' => 'Visualizar o boleto do mês',
            ];

        } elseif ($target == 'digital_wallet') {
            $data_page = [
                'title' => '- Buscar carteirinha digital',
                'title_page' => 'Carteirinha digital',
                'instruction' => 'Digite o número de seu CPF para visualizar a carteirinha virtual.',
                'button' => 'Buscar carteirinha digital',
            ];
        } else { }

        return view('Site.users.simple_user_validation.validate_cpf', compact('data_page', 'target'));
    }
    
    public function validateDateOfBirth(ReqValidateDateOfBirth $req) {
        
        $data = $req->all();
        $data['cpf'] = str_replace(['-', '.'], '', $data['cpf']);
        $data_page = explode('//', $data['data_page']);
        

        $data['casembrapa_wallet'] = CasembrapaWallet::where('cpf', $data['cpf'])->first();
        if ($data['casembrapa_wallet']) {
            return view('Site.users.simple_user_validation.validate_date_of_birth', compact('data', 'data_page'));
        } else {
            session()->flash('cpf', 'Registro não encontrado');
            return redirect()->route('site.user.validate_cpf', ['target'=>$data['target']]);
        }
    }

    public function saveTokenUserSession(Request $req) {
        $data = $req->all();
        $data['cpf'] = str_replace(['-', '.'], '', $data['cpf']);
        $data_page = explode('//', $data['data_page']);

        if ($data['birth_date'] == null) {
            session()->flash('birth_date', 'O campo é obrigatório.');
            return view('Site.users.simple_user_validation.validate_date_of_birth', compact('data', 'data_page'));
        }

        $data['casembrapa_wallet'] = CasembrapaWallet::where('cpf', $data['cpf'])
            ->where('birth_date', $data['birth_date'])->first();
        
        if ($data['casembrapa_wallet'] == null) {
            session()->flash('birth_date', 'A data de nascimento não corresponde a este usuário');
            return view('Site.users.simple_user_validation.validate_date_of_birth', compact('data', 'data_page'));
        }
        
        Auth::logout();
        $req->session()->put('temporary_user', $data['casembrapa_wallet']->id);
        if ($data['target'] == 'billet') {

            return redirect()->route('site.recipient');
        } elseif ($data['target'] == 'digital_wallet') {

            return redirect()->route('site.wallet.digital_wallet');
        } else { }
    }
}