<?php

	namespace App\Helpers;
	use URL;

	use App\Models\Admin\Group;
	use App\Models\Admin\User;
	use App\Models\Admin\CreatedPermission;
	use App\Models\Admin\UserSetting;
	
	/**
	* HelpAdmin
	*/
	class HelpAdmin
	{
		public static function completName($user = null)
		{
			if ($user == null) {
				$user = \Auth::user();
			}	

			$completName = $user->first_name .' '. $user->last_name;
			return $completName;
		}

		public static function permissionsUser($user = null)
		{
			if ($user == null) {
				$user = \Auth::user();
			}

			$data = [];
			if (HelpAdmin::IsUserDeveloper($user))
			{
				$data = CreatedPermission::all()->pluck('route')->toArray();
			} else
			{
				$permissions_user = $user->Group->Permission->pluck('created_permission_id')->toArray();
				$data = CreatedPermission::whereIn('id', $permissions_user)->pluck('route')->toArray();
			}
	        
	        return $data;
		}

		public static function UsersDevelopers()
		{
			$group = Group::where('tag', 'developer')->first();
			$users = $group->User;
			
			return $users;
		}
		public static function UsersAdministrator()
		{
			$group = Group::where('tag', 'administrator')->first();
			$users = $group->User;
			
			return $users;
		}
		public static function UsersCollaborator()
		{
			$group = Group::where('tag', 'collaborator')->first();
			$users = $group->User;
			
			return $users;
		}		
		public static function UsersRecipient()
		{
			$group = Group::where('tag', 'recipient')->first();
			$users = $group->User;
			
			return $users;
		}

		public static function IsUserDeveloper($user = null)
		{
			if ($user == null)
			{
				$user = \Auth::user();
			}

			$group = $user->Group;
			if ($group->tag == 'developer')
			{
				return true;
			}
			return false;
		}
		public static function IsUserAdministrator($user = null)
		{
			if ($user == null)
			{
				$user = \Auth::user();
			}

			$group = $user->Group;
			if ($group->tag == 'administrator')
			{
				return true;
			}
			return false;
		}
		public static function IsUserCollaborator($user = null)
		{
			if ($user == null)
			{
				$user = \Auth::user();
			}

			$group = $user->Group;
			if ($group->tag == 'collaborator')
			{
				return true;
			}
			return false;
		}
		public static function IsUserRecipient($user = null)
		{
			if ($user == null)
			{
				$user = \Auth::user();
			}

			$group = $user->Group;
			if ($group->tag == 'recipient')
			{
				return true;
			}
			return false;
		}

		public static function prepareNotification($notification)
		{
			$notification = explode(':', $notification);
			$result['type'] = $notification[0];
			$result['msg'] = $notification[1];
		
			return $result;
		}

		public static function getPreviousRoute()
		{
			return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
		}

		public static function getStorageUrl()
		{
			$bar = DIRECTORY_SEPARATOR;
			$host_name = request()->getHttpHost();
			$storage_url = '';
			if ($host_name == '127.0.0.1:8000') {
				$storage_url = 'storage/';
			} else {
				// $storage_url = 'storage/';
				$storage_url = '../storage/app/public/';
				// $storage_url = '../../storage/app/public/';
				// $storage_url = 'public/storage/';
			}

			return $storage_url;
		}

		public static function calcPercent($value_reached, $amount)
		{
			$percentage = number_format(($value_reached / $amount) * 100, 2, '.', '') . '%';
			return $percentage;
		}

		public static function getUrlToSaveStorageMpdf()
		{
			$host_name = URL::to('/');
			$bar = DIRECTORY_SEPARATOR;

			return '../storage'.$bar.'app'.$bar.'public'.$bar;
		}

		public static function isAProtectedGroup($group)
		{
			if (in_array($group->tag, ['public', 'developer']))
			{
				return true;
			}
			return false;
		}

		public static function generateUserSettings($user = null)
		{
			if ($user == null) {
				$user = \Auth::user();
			}

			if ($user->UserSetting == null) {
				UserSetting::create(['user_id' => $user->id]);

				return true;
			}
			return false;
		}

		public static function getAvatarUser($user = null)
		{
			if ($user == null) {
				$user = \Auth::user();
			}

			if ($user->Avatar) {
				return $user->Avatar->path;
			} else {
				return 'assets/icons/6.png';
			}
		}
		
		public static function treatsRouteUrl($route) {
			$route = str_replace(' ', '', $route);
            $route_ex = explode(',', $route);
            
            if (count($route_ex) > 1) {
                return route($route_ex[0], $route_ex[1]);
            } else {
                return route($route_ex[0]);
            }
		}
	}