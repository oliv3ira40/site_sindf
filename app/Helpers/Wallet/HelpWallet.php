<?php

	namespace App\Helpers\Wallet;
    use URL;
    
    use App\Helpers\HelpAdmin;
    use Illuminate\Support\Facades\Storage;

    use App\Models\Admin\User;
    use App\Models\Site\Wallet\CasembrapaWallet;
    use App\Models\Site\Wallet\CassiWallet;
	
	/**
	* HelpWallet
	*/
	class HelpWallet {
        public static function generatePdfCasembrapaWallet($registration, $casembrapa_wallet) {
            $bar = DIRECTORY_SEPARATOR;
            $registration = str_replace(['-', '.'], '', $registration);
            $file_name = $casembrapa_wallet->file_name;
            
            $casembrapa_wallet_svg = Storage::get('wallets/svg_to_pdf/model_casembrapa.svg');
                $casembrapa_wallet_svg = str_replace('recipient', $casembrapa_wallet->recipient, $casembrapa_wallet_svg);
                $casembrapa_wallet_svg = str_replace('registration', $casembrapa_wallet->registration, $casembrapa_wallet_svg);
                $casembrapa_wallet_svg = str_replace('birth_date', $casembrapa_wallet->birth_date, $casembrapa_wallet_svg);
                $casembrapa_wallet_svg = str_replace('cns', $casembrapa_wallet->cns, $casembrapa_wallet_svg);
                $casembrapa_wallet_svg = str_replace('validity_date_portfolio', $casembrapa_wallet->validity_date_portfolio, $casembrapa_wallet_svg);
                $casembrapa_wallet_svg = str_replace('stock_code', $casembrapa_wallet->stock_code, $casembrapa_wallet_svg);
                $casembrapa_wallet_svg = str_replace('plan', $casembrapa_wallet->plan, $casembrapa_wallet_svg);

                
            Storage::put('wallets/svg_to_pdf/temp_casembrapa.svg', $casembrapa_wallet_svg);
            $temp_casembrapa = 'wallets/svg_to_pdf/temp_casembrapa.svg';

            $host_name = request()->getHttpHost();
			if ($host_name == '127.0.0.1:8000') {
                $img_path_to_html = str_replace('app_casembrapa\public', 'app_casembrapa\storage\app\public', public_path().$bar.$temp_casembrapa);
			} else {
                $img_path_to_html = str_replace('public_html/public', 'public_html\storage\app\public', public_path().$bar.$temp_casembrapa);
            }
                
            // HTML
            $html = '
                <style> img { width: 500px; } </style>
                
                <img src="'.$img_path_to_html.'">
            ';
            // HTML

            $mpdf = new \Mpdf\Mpdf([
                'format' => [130, 175],
                'mode' => 'c',
                'margin_left' => 0,
                'margin_right' => 0,
                'margin_top' => 0,
                'margin_bottom' => 0,
                'margin_header' => 0,
                'margin_footer' => 0,
                'defaultPageNumStyle' => '1'
            ]);

            $mpdf->SetDisplayMode('fullpage');
            $mpdf->list_indent_first_level = 0;

            $mpdf->WriteHTML($html);
            $mpdf->Output(HelpAdmin::getUrlToSaveStorageMpdf().'/wallets/wallets_pdf/casembrapa/'.$file_name.'.pdf', 'F');
            // $mpdf->Output();
            // exit();
            // dd('---');
        }
        
        public static function generatePdfCassiWallet($registration, $cassi_wallet, $folder = 'cassi') {
            $bar = DIRECTORY_SEPARATOR;
            $registration = str_replace(['-', '.'], '', $registration);
            $file_name = $cassi_wallet->file_name;
            
            $cassi_wallet_svg = Storage::get('wallets/svg_to_pdf/model_cassi.svg');
                $cassi_wallet_svg = str_replace('name', $cassi_wallet->name, $cassi_wallet_svg);
                $cassi_wallet_svg = str_replace('birth', $cassi_wallet->birth, $cassi_wallet_svg);
                $cassi_wallet_svg = str_replace('contract_adhesion_date', $cassi_wallet->contract_adhesion_date, $cassi_wallet_svg);
                $cassi_wallet_svg = str_replace('card', $cassi_wallet->card, $cassi_wallet_svg);
                $cassi_wallet_svg = str_replace('shelf_life', $cassi_wallet->shelf_life, $cassi_wallet_svg);

            
            Storage::put('wallets/svg_to_pdf/temp_cassi.svg', $cassi_wallet_svg);
            $temp_cassi = 'wallets/svg_to_pdf/temp_cassi.svg';

            $host_name = request()->getHttpHost();
			if ($host_name == '127.0.0.1:8000') {
                $img_path_to_html = str_replace('app_casembrapa\public', 'app_casembrapa\storage\app\public', public_path().$bar.$temp_cassi);
			} else {
                $img_path_to_html = str_replace('public_html/public', 'public_html\storage\app\public', public_path().$bar.$temp_cassi);
            }

            // HTML
                $html = '
                    <style> img { width: 500px; } </style>
                    
                    <img src="'.$img_path_to_html.'">
                ';
            // HTML

            $mpdf = new \Mpdf\Mpdf([
                'format' => [130, 175],
                'mode' => 'c',
                'margin_left' => 0,
                'margin_right' => 0,
                'margin_top' => 0,
                'margin_bottom' => 0,
                'margin_header' => 0,
                'margin_footer' => 0,
                'defaultPageNumStyle' => '1'
            ]);

            $mpdf->SetDisplayMode('fullpage');
            $mpdf->list_indent_first_level = 0;

            $mpdf->WriteHTML($html);            
            $mpdf->Output(HelpAdmin::getUrlToSaveStorageMpdf().'/wallets/wallets_pdf/'.$folder.'/'.$file_name.'.pdf', 'F');
            // $mpdf->Output();
            // exit();
            // dd('---');
        }

        public static function getWalletPdfCasembrapa($file_name) {
            $file_path = 'wallets/wallets_pdf/casembrapa/';

            if (Storage::exists($file_path.$file_name.'.pdf')) {
                return HelpAdmin::getStorageUrl().$file_path.$file_name.'.pdf';
            } else {
                return false;
            }
        }
        public static function getWalletPdfCassi($file_name) {
            $file_path = 'wallets/wallets_pdf/cassi/';

            if (Storage::exists($file_path.$file_name.'.pdf')) {
                return HelpAdmin::getStorageUrl().$file_path.$file_name.'.pdf';
            } else {
                return false;
            }
        }

        public static function getWalletImgCasembrapa($file_name) {
            $file_path = 'wallets/wallets_jpeg/casembrapa/';

            if (Storage::exists($file_path.$file_name.'.jpeg')) {
                return HelpAdmin::getStorageUrl().$file_path.$file_name.'.jpeg';
            } else {
                return false;
            }
        }
        public static function getWalletImgCassi($file_name) {
            $file_path = 'wallets/wallets_jpeg/cassi/';

            if (Storage::exists($file_path.$file_name.'.jpeg')) {
                return HelpAdmin::getStorageUrl().$file_path.$file_name.'.jpeg';
            } else {
                return false;
            }
        }

        public static function generatePdfWalletsForThisUser($registration) {
            set_time_limit(120000);
            ini_set('memory_limit', '-1');
            // ini_set('memory_limit', '256');
            $bar = DIRECTORY_SEPARATOR;
            
            $first_6_digits_registration = substr($registration, 0, 6);
            $dependents = CasembrapaWallet::where('registration', '!=', $registration)
                ->where('type', '!=', 'Titular')
                ->where('registration', 'like', $first_6_digits_registration.'%')
                ->pluck('registration')->toArray();
            $registrations = array_merge([$registration], $dependents);
            
            // dd('---');
            
            foreach ($registrations as $registration) {
                $data['casembrapa_wallet'] = CasembrapaWallet::where('registration', $registration)->first();
                $data['cassi_wallet'] = CassiWallet::where('functional_enrollment', $registration)->first();
    
                if ($data['casembrapa_wallet']) {
                    HelpWallet::generatePdfCasembrapaWallet($data['casembrapa_wallet']->registration, $data['casembrapa_wallet']);
                    // if (!Storage::exists('wallets/wallets_pdf/casembrapa/casembrapa_'.$data['casembrapa_wallet']->registration.'.pdf')) {
                    // }
                }
    
                if ($data['cassi_wallet']) {
                    HelpWallet::generatePdfCassiWallet($data['cassi_wallet']->functional_enrollment, $data['cassi_wallet']);
                    // if (!Storage::exists('wallets/wallets_pdf/cassi/cassi_'.$data['cassi_wallet']->functional_enrollment.'.pdf')) {
                    // }
                }
            }

            return true;
        }
    }