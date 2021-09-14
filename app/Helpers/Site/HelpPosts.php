<?php

	namespace App\Helpers\Site;
	use Illuminate\Support\Facades\Storage;
	
	use App\Models\Admin\User;
	use App\Models\Admin\Group;
	use App\Models\Admin\CreatedPermission;
	use App\Models\Admin\Permission;
	
	use App\Models\Site\Home\SliderSite;
    use App\Models\Site\Post\Post;
	use App\Models\Site\Post\FeaturedPost;
	use App\Models\Site\Post\CategoryPost;
	use App\Models\Site\Post\TagPost;
	
	use App\Helpers\HelpAdmin;

	/**
	* HelpPosts
	*/
	class HelpPosts
	{
		public static function getLastPosts($amount)
		{
			$posts = Post::orderBy('created_at', 'desc')
				->where('status_post_id', 1)->take($amount)->get();
            return $posts;
		}
		public static function getFeaturedPost($amount)
		{
            $featured_post = FeaturedPost::orderBy('order', 'asc')->take($amount)->get();
            return $featured_post;
		}
		
		public static function treatImgPostContent($content)
		{
			//
			$formatted_link = 'href="'.\URL::to('/').'/';
			$content = str_replace('href="', $formatted_link, $content);
			
			$formatted_link = 'src="'.\URL::to('/').'/';
			$content = str_replace('src="', $formatted_link, $content);
			
			$formatted_link = 'mailto';
			$content = str_replace(\URL::to('/').'/mailto', $formatted_link, $content);
			$formatted_link = 'callto';
			$content = str_replace(\URL::to('/').'/callto', $formatted_link, $content);
			//
			
			//	Links externos
			$formatted_link = 'https';
			$content = str_replace('http://127.0.0.1:8000/https', $formatted_link, $content);
			$content = str_replace('https://casembrapa.com.br/public/https', $formatted_link, $content);
			
			$formatted_link = 'http';
			$content = str_replace('http://127.0.0.1:8000/http', $formatted_link, $content);
			$content = str_replace('https://casembrapa.com.br/public/http', $formatted_link, $content);
			//

			// Storage
			$formatted_link = '/'.HelpAdmin::getStorageUrl();
			$content = str_replace('/storage/', $formatted_link, $content);
			//

            return $content;
		}

		public static function getAuthorsUsers()
		{
			$created_permission = CreatedPermission::where('route', 'possible_author')->first();
			$permission = Permission::where('created_permission_id', $created_permission->id)->pluck('group_id')->toArray();
			$authors_users = User::whereIn('group_id', $permission)->get();

			return $authors_users;
		}

		public static function getHealthCalendar() {
			return Post::where('health_calendar', 1)->first();
		}

		public static function handleLinksToSaveAndEditContent($content) {
			$content = str_replace('../', '', $content);
            $content = str_replace('app/public/', '', $content);
			
			return $content;
		}

		public static function createSliderPost($post) {
            if (!$post->image_banner) {
				return false;
            }

            $data_post = [
                'link' => $post->id,
                'post_id' => $post->id
            ];
            $slider_site = SliderSite::create($data_post);

            $pathinfo = pathinfo($post->image_banner);
            $path = 'site/sliders/'.$slider_site->id.'/';
            $new_path = $path.'img.'.$pathinfo['extension'];

            Storage::copy($post->image_banner, $new_path);
            $data_update['img'] = $new_path;
            
			$slider_site->update($data_update);
			return true;
		}

		public static function isPrivatePost($post) {
			$post_private = $post->private;
        
			$id_cats = $post->PostsHasCategoriesPosts->pluck('category_post_id')->toArray();
			$cat_private = CategoryPost::whereIn('id', $id_cats)
				->where('private', 1)->first();

			$id_tags = $post->PostsHasTagsPosts->pluck('tag_post_id')->toArray();
			$tag_private = TagPost::whereIn('id', $id_tags)
				->where('private', 1)->first();
		
			$private = 0;
			if ($post_private OR $cat_private OR $tag_private) $private = 1;

			return $private;
		}
	}