<?php

namespace App\Http\Controllers\Site\Wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

use App\Helpers\HelpAdmin;
use App\Helpers\Site\Wallet\HelpWalletCasembrapa;
use App\Helpers\Wallet\HelpWallet;

use App\Models\Admin\User;
use App\Models\Site\Wallet\CasembrapaWallet;
use App\Models\Site\Wallet\CassiWallet;

class WalletController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }



    public function DigitalWallet() {
        if (\Auth::user()) {
            $data = [
                'cpf'           => \Auth::user()->cpf,
                'birth_date'    => \Auth::user()->date_of_birth,
            ];
        } elseif (Session::has('temporary_user')) {
            $id = \Session::get('temporary_user');
            
            $data = [
                'cpf'           => CasembrapaWallet::find($id)->cpf,
                'birth_date'    => CasembrapaWallet::find($id)->birth_date,
            ];
        } else {
            return redirect()->route('site.user.validate_cpf', ['target'=>'digital_wallet']);
        };

        $data['cpf'] = str_replace(['-', '.'], '', $data['cpf']);
        $data['casembrapa_wallet'] = CasembrapaWallet::where('cpf', $data['cpf'])
            ->where('birth_date', $data['birth_date'])->first();
        $data['cassi_wallet'] = CassiWallet::where('cpf', $data['cpf'])
            ->where('birth', $data['birth_date'])->first();

        if ($data['casembrapa_wallet'] == null) {
            $target = 'digital_wallet';
            $data_page = [
                'title' => '- Buscar carteirinha digital',
                'title_page' => 'Carteirinha digital',
                'instruction' => 'Digite o número de seu CPF para visualizar a carteirinha virtual.',
                'button' => 'Buscar carteirinha digital',
            ];
            session()->flash('birth_date', 'A data de nascimento não corresponde a este usuário');
            return view('Site.users.simple_user_validation.validate_cpf', compact('data', 'data_page', 'target'));
        }

        // if (!HelpWallet::getWalletPdfCasembrapa($data['casembrapa_wallet']->registration)) {
            HelpWallet::generatePdfWalletsForThisUser($data['casembrapa_wallet']->registration);
        // }
        if ($data['cassi_wallet'] != null) {
            // if (!HelpWallet::getWalletPdfCassi($data['cassi_wallet']->functional_enrollment)) {
                HelpWallet::generatePdfWalletsForThisUser($data['casembrapa_wallet']->registration);
            // }
        }

        $first_6_digits_registration = substr($data['casembrapa_wallet']->registration, 0, 6);
        $dependents = CasembrapaWallet::where('registration', '!=', $data['casembrapa_wallet']->registration)
            ->where('type', '!=', 'Titular')
            ->where('registration', 'like', $first_6_digits_registration.'%')->get();

            
        $dependents_wallets = [];
        if ($dependents->count()) {
            foreach ($dependents as $dependent) {
                $wallets['casembrapa'] = CasembrapaWallet::where('registration', $dependent->registration)->first();
                $wallets['cassi'] =  CassiWallet::where('functional_enrollment', $dependent->registration)->first();

                array_push($dependents_wallets, $wallets);
            }
        }
        
        return view('Site.wallet.digital_wallet', compact('data'));
    }

    public function saveCasembrapaWallet(Request $req) {
        $data = $req->all();
        $casembrapa_wallet = CasembrapaWallet::find($data['id_casembrapa_wallet']);
        $file_name = $casembrapa_wallet->file_name;

        $img = substr($data['img'], strpos($data['img'], ',') + 1);
        $img = base64_decode($img);
        
        $file_path = 'wallets/wallets_jpeg/casembrapa/'.$file_name.'.jpeg';
        Storage::disk('public')->put($file_path, $img);

        return $file_path;
    }
    public function saveCassiWallet(Request $req) {
        $data = $req->all();
        $cassi_wallet = CassiWallet::find($data['id_cassi_wallet']);
        $file_name = $cassi_wallet->file_name;

        $img = substr($data['img'], strpos($data['img'], ',') + 1);
        $img = base64_decode($img);
        
        $file_path = 'wallets/wallets_jpeg/cassi/'.$file_name.'.jpeg';
        Storage::disk('public')->put($file_path, $img);

        return $file_path;
    }
}