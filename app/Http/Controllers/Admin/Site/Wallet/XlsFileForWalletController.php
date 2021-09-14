<?php

namespace App\Http\Controllers\Admin\Site\Wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\Admin\User;
use App\Models\Site\Wallet\CasembrapaWallet;
use App\Models\Site\Wallet\CassiWallet;

use App\Helpers\HelpAdmin;

class XlsFileForWalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    function updateCasembrapaUser() {
        set_time_limit(999999999999999999);
        ini_set('memory_limit', '256M');

        // $old_wallets = CasembrapaWallet::whereNotBetween('created_at', [date('Y-m-d').' 00 00:00', date('Y-m-d').' 23 59:59']);
        // $new_wallets = CasembrapaWallet::whereBetween('created_at', [date('Y-m-d').' 00 00:00', date('Y-m-d').' 23 59:59']);
        // dd($old_wallets->delete(), $new_wallets->delete());

        dd(CasembrapaWallet::all());

        $inputFileName = HelpAdmin::getStorageUrl().'wallets/xls/casembrapa/casembrapa.xls';
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);

        $total_columns = $spreadsheet->getActiveSheet()->getHighestDataRow();
        $data = [];
        for ($i=2; $i <= $total_columns; $i++) {
            $n = $spreadsheet->getActiveSheet()
                ->rangeToArray("A{$i}:K{$i}", NULL, TRUE, TRUE, TRUE);
            
            array_push($data, array_shift($n));
        }

        dd($data);

        $count_registers = [
            'new_users' => 0,
            'updated_users' => 0,
            'deleted_users' => 0,
            'new_wallets' => 0,
            'deleteds_wallets' => 0,
        ];
        foreach ($data as $key => $value) {
            // $value['B'] = str_replace(['.', '-'], '', $value['B']);
            $value['C'] = str_replace(['.', '-'], '', $value['C']);
            $value_format_date_birth = explode('/', $value['E'])['2'].'-'.explode('/', $value['E'])['1'].'-'.explode('/', $value['E'])['0'];
            
            $value['K'] = null;
            if (isset($value['K'])) $value['K'] = trim(strtolower($value['K']));

            // dd($value);

            // USUARIOS TITULARES
            if ($value['F'] == 'Titular') {
                $user_register = [
                    'first_name' => $value['A'],
                    'registration' => $value['B'],
                    'cpf' => $value['C'],
                    'date_of_birth' => $value_format_date_birth,
                    'type' => $value['F'],
                    'password' => bcrypt($value['C']),
                    'group_id' => '11',
                    'email' => $value['K'],
                ];
                $user = User::withTrashed()->where('cpf', $user_register['cpf'])->first();

                // ATIVO
                if ($value['J'] == 'Ativo') {
                    if (User::withTrashed()->where('email', $user_register['email'])->first() != null) $user_register['email'] = null;
                    // $user_register['email'] = null;

                    if ($user != null) {
                        unset($user_register['password']);
    
                        $count_registers['updated_users']++;
                        $user->update($user_register);

                        // RESTAURAR USUÁRIO CASO ESTIVE EXCLUIDO
                        if ($user->trashed()) $user->restore();
                    } else {

                        $count_registers['new_users']++;
                        User::create($user_register);
                    }
                } else { // NÃO ATIVO
                    $count_registers['deleted_users']++;
                    if ($user != null) $user->delete();
                }
            }

            // CADASTRO CARTEIRAS USUÁRIOS ATIVOS
            if ($value['J'] == 'Ativo') {
                $wallet_register = [
                    'recipient' => $value['A'],
                    'registration' => $value['B'],
                    'cpf' => $value['C'],
                    'cns' => $value['D'],
                    'birth_date' => $value['E'],
                    'type' => $value['F'],
                    'plan' => $value['G'],
                    'validity_date_portfolio' => $value['H'],
                    'stock_code' => $value['I'],
                    'situation' => $value['J'],
                    'email' => $value['K'],
                ];
                $user_wallet = User::where('cpf', $wallet_register['cpf'])->first();
                // if ($user_wallet) $wallet_register['user_id'] = $user_wallet->id;
                CasembrapaWallet::create($wallet_register);
            }
        }

        $old_wallets = CasembrapaWallet::whereNotBetween('created_at', [date('Y-m-d').' 00 00:00', date('Y-m-d').' 23 59:59']);
        $new_wallets = CasembrapaWallet::whereBetween('created_at', [date('Y-m-d').' 00 00:00', date('Y-m-d').' 23 59:59']);
        
        $count_registers['new_wallets'] = $old_wallets->count();
        $count_registers['deleteds_wallets'] = $new_wallets->count();
        
        $old_wallets->delete();


        dd('FIM', User::where('group_id', '11')->count(), CasembrapaWallet::count(), $count_registers);
    }
    function updateUserCasembrapaWallet() {
        dd('Nóis aqui');
    }

    function updateCassiWallet() {
        set_time_limit(999999999999999999);
        ini_set('memory_limit', '256M');

        // $old_wallets = CassiWallet::whereNotBetween('created_at', [date('Y-m-d').' 00 00:00', date('Y-m-d').' 23 59:59']);
        // $new_wallets = CassiWallet::whereBetween('created_at', [date('Y-m-d').' 00 00:00', date('Y-m-d').' 23 59:59']);
        // dd($old_wallets->delete(), $new_wallets->delete());

        dd(CassiWallet::all());
        // CassiWallet

        $inputFileName = HelpAdmin::getStorageUrl().'wallets/xls/cassi/cassi.xlsx';
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);

        $total_columns = $spreadsheet->getActiveSheet()->getHighestDataRow();
        $data = [];
        for ($i=2; $i <= $total_columns; $i++) {
            $n = $spreadsheet->getActiveSheet()
                ->rangeToArray("A{$i}:L{$i}", NULL, TRUE, TRUE, TRUE);
            
            array_push($data, array_shift($n));
        }

        dd($data);

        $count_registers = [
            'new_wallets' => 0,
            'deleteds_wallets' => 0,
        ];
        foreach ($data as $key => $value) {
            $value['B'] = str_replace(['.', '-'], '', $value['B']);

            // CADASTRO CARTEIRAS
            $wallet_register = [
                'name' => $value['A'],
                'cpf' => $value['B'],
                'birth' => $value['C'],
                'functional_enrollment' => $value['D'],
                'Family' => $value['E'],
                'dep' => $value['F'],
                'uf' => $value['G'],
                'contract_adhesion_date' => $value['H'],
                'card' => $value['I'],
                'situation_card' => $value['J'],
                'shelf_life' => $value['K'],
                'lot' => $value['L'],
            ];
            // dd($wallet_register);

            $user_wallet = User::where('cpf', $wallet_register['cpf'])->first();
            if ($user_wallet) $wallet_register['user_id'] = $user_wallet->id;
            
            // dd($wallet_register);

            CassiWallet::create($wallet_register);
        }

        $old_wallets = CassiWallet::whereNotBetween('created_at', [date('Y-m-d').' 00 00:00', date('Y-m-d').' 23 59:59']);
        $new_wallets = CassiWallet::whereBetween('created_at', [date('Y-m-d').' 00 00:00', date('Y-m-d').' 23 59:59']);
        
        $count_registers['new_wallets'] = $old_wallets->count();
        $count_registers['deleteds_wallets'] = $new_wallets->count();
        
        $old_wallets->delete();

        dd('FIM', CassiWallet::count(), $count_registers);
    }
}
