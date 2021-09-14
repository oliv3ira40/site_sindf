<?php

	namespace App\Helpers\Site;
	
	use App\Models\Site\Wallet\CasembrapaWallet;

	use App\Helpers\HelpAdmin;

	use Session;
	/**
	* HelpSite
	*/
	class HelpSite
	{
		public static function verifyRecaptcha($captcha)
		{
            $remote_addr = $_SERVER['REMOTE_ADDR'];
            $secret_key = '6LdhQdUZAAAAAAv1rl97f8nhCT7rs69UHGJuxCmJ';
            $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret_key}&response={$captcha}&remoteip={$remote_addr}"), true);

            return $response['success'];
		}

		public static function getSiteKayRecaptcha() {
			return '6LdhQdUZAAAAAOew97cx4svL9Y55ITxYnFbAMsiy';
		}

		public static function getStorageUrlSlider()
		{
			$bar = DIRECTORY_SEPARATOR;
			$host_name = request()->getHttpHost();
			$storage_url = '';
			if ($host_name == '127.0.0.1:8000') {
				$storage_url = 'storage/';
			} else {
				$url = asset('');
				$url = str_replace('public/', '', $url);

				$storage_url = $url.'storage/app/public/';
			}

			return $storage_url;
		}

		public static function getClassBtnMobile() {
			if (\Auth::user()) {
				
				if (HelpAdmin::IsUserDeveloper() OR
					HelpAdmin::IsUserAdministrator() OR
					HelpAdmin::IsUserCollaborator()) {

				} else {
					return 'btn_mobile_1';
				}
			} else {
				return 'btn_mobile_1';
			}
		}

		public static function getUserOrCasembrapaUser() {
			if (\Auth::user()) {
				return \Auth::user();
			} else {
				$id = \Session::get('temporary_user');
				return CasembrapaWallet::find($id);
			}
		}

		public static function firstAndLastName() {
			if (\Auth::user()) {
				$user = \Auth::user();

				$user_name = $user->first_name .' '. $user->last_name;
				$user_name = explode(' ', $user_name);

				return $user_name[0] .' '. $user_name[array_key_last($user_name)];
			} elseif (\Session::has('temporary_user')) {
				$id = \Session::get('temporary_user');
				$user = CasembrapaWallet::find($id);

				if ($user == null) {
					\Session::forget('temporary_user');
					return '---';
				}
				$user_name = explode(' ', $user->recipient);
				return $user_name[0] .' '. $user_name[array_key_last($user_name)];
			}
		}
	}