<?php

namespace App\Http\Controllers\Admin\Site\Wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


use App\Helpers\HelpAdmin;
use App\Helpers\HelpMenuAdmin;
use App\Helpers\Site\Wallet\HelpWalletCasembrapa;
use App\Helpers\Site\Wallet\HelpWalletCassi;
use App\Helpers\Wallet\HelpWallet;

use App\Models\Admin\User;
use App\Models\Site\Wallet\CasembrapaWallet;
use App\Models\Site\Wallet\CassiWallet;

use Illuminate\Support\Facades\Storage;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function creatingDigitalWalletsOfBeneficiaries() {
        set_time_limit(10000000000000000);
        // ini_set('memory_limit', '-1');
        $bar = DIRECTORY_SEPARATOR;

        dump('-----------------------------------------------------------------------');
        dump('-----------------------------------------------------------------------');
        dd('-------------------------------------------------------------------------');



        // $users_recipient =  HelpAdmin::UsersRecipient()->pluck('registration')->toArray();
        $casembrapa_wallet =  CasembrapaWallet::pluck('registration')->toArray();
        $cassi_wallet =  CassiWallet::pluck('functional_enrollment')->toArray();
        $users_recipient = array_merge($casembrapa_wallet, $cassi_wallet);
        $users_recipient = array_unique($users_recipient);


        // $users_recipient_with_email = CasembrapaWallet::whereIn('registration', $users_recipient)
        //     ->where('email', '!=', '')->get();
        // $users_recipient_not_email = CasembrapaWallet::whereIn('registration', $users_recipient)
        //     ->where('email', '')->get();

        foreach ($users_recipient as $registration) {
            // $user = User::where('registration', $wallet->registration)->first();
            
            $data['casembrapa_wallet'] = CasembrapaWallet::where('registration', $registration)->first();
            $data['cassi_wallet'] = CassiWallet::where('functional_enrollment', $registration)->first();
            
            // dd($data);

            if ($data['casembrapa_wallet']) {
                if (!Storage::exists('wallets/wallets_pdf/casembrapa/casembrapa_'.$data['casembrapa_wallet']->registration.'.pdf')) {
                    HelpWallet::generatePdfCasembrapaWallet($data['casembrapa_wallet']->registration, $data['casembrapa_wallet']);
                }
            }


            if ($data['cassi_wallet']) {
                if (!Storage::exists('wallets/wallets_pdf/cassi/cassi_'.$data['cassi_wallet']->functional_enrollment.'.pdf')) {
                    HelpWallet::generatePdfCassiWallet($data['cassi_wallet']->functional_enrollment, $data['cassi_wallet']);
                }
            }
        }
        
        dd('---');
    }

    public function sendDigitalWalletsToBeneficiaries() {
        set_time_limit(10000000000000000);
        ini_set('memory_limit', '-1');
        
        $users_recipient_with_email = CasembrapaWallet::where([
            ['type', 'Titular'],
            ['email', '!=', ''],
        ])->pluck('cpf')->toArray();
        // ->whereIn('cpf', ['05781373136', '03750516197', '02757703110'])
        
        $users = User::whereIn('cpf', $users_recipient_with_email)
            ->where('annual_digital_wallet_shipment', null)
            ->take(500)->get();

        dd($users->first(), $users->count());
        foreach ($users as $user) {
            $casembrapa_wallet = CasembrapaWallet::where('cpf', $user->cpf)->first();
            $cassi_wallet =  CassiWallet::where('cpf', $user->cpf)->first();

            $first_6_digits_registration = substr($user->registration, 0, 6);
            $dependents = CasembrapaWallet::where('registration', '!=', $user->registration)
                ->where('type', '!=', 'Titular')
                ->where('registration', 'like', $first_6_digits_registration.'%')->get();

            $host_name = request()->getHttpHost();
			if ($host_name == '127.0.0.1:8000') {
                $public_path = str_replace('public', 'storage/app/public', public_path());
			} else {
                $public_path = str_replace('public_html/public', 'public_html/storage/app/public/', public_path());
            }
            
            $data['user'] = $casembrapa_wallet;
            $data['files'] = [];
            if ($casembrapa_wallet) {
                array_push($data['files'], $public_path.'/wallets/wallets_pdf/casembrapa/casembrapa_'.str_replace('-', '', $casembrapa_wallet->registration).'.pdf');
            }
            if ($cassi_wallet) {
                array_push($data['files'], $public_path.'/wallets/wallets_pdf/cassi/cassi_'.str_replace('-', '', $cassi_wallet->functional_enrollment).'.pdf');
            }

            if ($dependents->count()) {
                foreach ($dependents as $dependent) {
                    $casembrapa_wallet_dependent = CasembrapaWallet::where('registration', $dependent->registration)->first();
                    $cassi_wallet_dependent =  CassiWallet::where('functional_enrollment', $dependent->registration)->first();

                    if ($casembrapa_wallet_dependent) {
                        array_push($data['files'], $public_path.'/wallets/wallets_pdf/casembrapa/casembrapa_'.str_replace('-', '', $casembrapa_wallet_dependent->registration).'.pdf');
                    }
                    if ($cassi_wallet_dependent) {
                        array_push($data['files'], $public_path.'/wallets/wallets_pdf/cassi/cassi_'.str_replace('-', '', $cassi_wallet_dependent->functional_enrollment).'.pdf');
                    }
                }
            }



            // dd($data['user'], $data['files']);



            Mail::send('Site.wallet.body_of_email_to_send_digital_wallets', $data, function($message) use ($data){
                $message->from('no-reply@casembrapa.org.br', 'Casembrapa');
                $message->to($data['user']->email);
                // $message->to('welinton.dias@casembrapa.org.br');
                // $message->to('oliv3ira54@gmail.com');
                
                // $message->bcc(['augusto@agencialaweb.com.br']);
                // $message->cc(['welinton.dias@casembrapa.org.br', 'mayara@casembrapa.org.br']);
                
                foreach ($data['files'] as $value) {
                    $message->attach($value);
                }
                $message->subject('Renovação das carteirinhas Casembrapa e Cassi 2021');
            });
            // dd('...');

            $data_user['annual_digital_wallet_shipment'] = date(now());
            $user->update($data_user);


            // dd('---');
        }
        dd('-----');
        
        
        
        // victor@casembrapa.org.br
        // mayara@casembrapa.org.br
        // mika@casembrapa.org.br
    }
}
