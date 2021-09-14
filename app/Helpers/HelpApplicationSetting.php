<?php

	namespace App\Helpers;
	use URL;
    
    use App\Models\Config\ApplicationSetting;

	/**
	* HelpApplicationSetting
	*/
	class HelpApplicationSetting
	{
		public static function getAppName()
		{
            $application_setting = ApplicationSetting::select('app_name')->first();

            return $application_setting;
        }
        public static function getAppCopyright()
		{
            $application_setting = ApplicationSetting::select('copyright')->first();

            return $application_setting;
        }
	}