<?php

	namespace App\Helpers;
	use URL;
    
    use App\Models\Config\ApplicationAppearanceSetting;

	/**
	* HelpAppearanceSetting
	*/
	class HelpAppearanceSetting
	{
		public static function saveImgsOrNull($imgs)
		{
            if (isset($imgs['logo_for_white_background']) AND $imgs['logo_for_white_background'] != null) {
                $image = $imgs['logo_for_white_background']->getClientOriginalName();
                $extension = pathinfo($image, PATHINFO_EXTENSION);

                $imgs['logo_for_white_background'] = $imgs['logo_for_white_background']
                    ->storeAs('appearance_setting', 'logo_for_white_background.'.$extension);
            } else {
                $imgs['logo_for_white_background'] = $imgs['old_logo_for_white_background'];
                unset($imgs['old_logo_for_white_background']);
            }

            // if (isset($imgs['logo_for_black_background']) AND $imgs['logo_for_black_background'] != null) {
            //     $image = $imgs['logo_for_black_background']->getClientOriginalName();
            //     $extension = pathinfo($image, PATHINFO_EXTENSION);

            //     $imgs['logo_for_black_background'] = $imgs['logo_for_black_background']
            //         ->storeAs('appearance_setting', 'logo_for_black_background.'.$extension);
            // } else {
            //     $imgs['logo_for_black_background'] = $imgs['old_logo_for_black_background'];
            //     unset($imgs['old_logo_for_black_background']);
            // }
            
            if (isset($imgs['reduced_logo']) AND $imgs['reduced_logo'] != null) {
                $image = $imgs['reduced_logo']->getClientOriginalName();
                $extension = pathinfo($image, PATHINFO_EXTENSION);

                $imgs['reduced_logo'] = $imgs['reduced_logo']
                    ->storeAs('appearance_setting', 'reduced_logo.'.$extension);
            } else {
                $imgs['reduced_logo'] = $imgs['old_reduced_logo'];
                unset($imgs['old_reduced_logo']);
            }

            if (isset($imgs['favicon']) AND $imgs['favicon'] != null) {
                $image = $imgs['favicon']->getClientOriginalName();
                $extension = pathinfo($image, PATHINFO_EXTENSION);

                $imgs['favicon'] = $imgs['favicon']
                    ->storeAs('appearance_setting', 'favicon.'.$extension);
            } else {
                $imgs['favicon'] = $imgs['old_favicon'];
                unset($imgs['old_favicon']);
            }

            return $imgs;
        }
        
        public static function getLogoWhiteBackground()
        {
            $application_appearance_setting = ApplicationAppearanceSetting::select('logo_for_white_background')->first();
            
            return $application_appearance_setting;
        }
        public static function getLogoBlackBackground()
        {
            $application_appearance_setting = ApplicationAppearanceSetting::select('logo_for_black_background')->first();
            
            return $application_appearance_setting;
        }
        public static function getReducedLogo()
        {
            $application_appearance_setting = ApplicationAppearanceSetting::select('reduced_logo')->first();
            
            return $application_appearance_setting;
        }
        public static function getFavicon()
        {
            $application_appearance_setting = ApplicationAppearanceSetting::select('favicon')->first();
            
            return $application_appearance_setting;
        }
	}