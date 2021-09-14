<?php

namespace App\Http\Controllers\Admin\Site\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Helpers\Site\HelpPosts;

use App\Models\Site\Post\Post;
use App\Models\Site\Home\SliderSite;
use App\Models\Site\Post\CategoryPost;
use App\Models\Site\Post\StatusPost;
use App\Models\Site\Post\TagPost;
use App\Models\Site\Post\PostHasCategoryPost;
use App\Models\Site\Post\PostHasTagPost;
use App\Models\Admin\InsertFile;

use App\Http\Requests\Admin\Site\Post\reqSave;
use App\Http\Requests\Admin\Site\Post\reqUpdate;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }



    public function list(Request $req) {
        $filters = $req->all();
        $data['post'] = Post::select(
            'id',
            'title',
            'private',
            'image_banner',
            'image_spotlight',
            'created_by_id',
            'status_post_id'
        )->orderBy('created_at', 'desc');
        
        if (count($filters)) {
            if (isset($filters['search']) AND $filters['search'] != null) {
                $data['post'] = $data['post']->where('title', 'like', '%'.$filters['search'].'%');
            }
        }
        $data['post'] = $data['post']->paginate(10);

        return view('Admin.site.post.list', compact('data', 'filters'));
    }

    public function new() {
        $data['category_post'] = CategoryPost::orderBy('created_at')->get();
        $data['status_post'] = StatusPost::orderBy('created_at')->get();
        $data['tag_post'] = TagPost::orderBy('created_at')->get();
                
        $data['required_files'] = ['dropify'];
        return view('Admin.site.post.new', compact('data'));
    }
    public function save(reqSave $req) {
        $data = $req->all();
        if ((!isset($data['private']))) $data['private'] = 0;
        $data['slug_title'] = str_slug($data['title']);
        $data['created_by_id'] = \Auth::user()->id;
        if ($data['content']) $data['content'] = HelpPosts::handleLinksToSaveAndEditContent($data['content']);

        $post = Post::create($data);
        
        if (isset($data['category_post_id'])) {
            $post->PostsHasCategoriesPosts()->delete();
            foreach ($data['category_post_id'] as $key => $category_post_id) {
                PostHasCategoryPost::create([
                    'post_id'           => $post->id,
                    'category_post_id'  => $category_post_id,
                ]);
            }
        }
        if (isset($data['tag_post_id'])) {
            $post->PostsHasTagsPosts()->delete();
            foreach ($data['tag_post_id'] as $key => $tag_post_id) {
                PostHasTagPost::create([
                    'post_id'       => $post->id,
                    'tag_post_id'   => $tag_post_id,
                ]);
            }
        }

        if (isset($data['image_banner'])) {
            $path_info = pathinfo($data['image_banner']->getClientOriginalName());
            $filename_slug = str_slug($path_info['filename']).".{$path_info['extension']}";

            $file_path = 'inserted_files/'.date('Y').'/'.date('m');
            $data_file = [
                "name" => $filename_slug,
                "extension" => $path_info["extension"],
                "path" => $file_path."/".$filename_slug,
            ];
            InsertFile::create($data_file);

            $data['image_banner'] = $data['image_banner']->storeAs($file_path, $filename_slug);
            $post->update([
                'image_banner'   => $data['image_banner'],
            ]);
        }
        if (isset($data['image_spotlight'])) {
            $path_info = pathinfo($data['image_spotlight']->getClientOriginalName());
            $filename_slug = str_slug($path_info['filename']).".{$path_info['extension']}";

            $file_path = 'inserted_files/'.date('Y').'/'.date('m');
            $data_file = [
                "name" => $filename_slug,
                "extension" => $path_info["extension"],
                "path" => $file_path."/".$filename_slug,
            ];
            InsertFile::create($data_file);
            
            $data['image_spotlight'] = $data['image_spotlight']->storeAs($file_path, $filename_slug);
            $post->update([
                'image_spotlight'   => $data['image_spotlight'],
            ]);
        }

        session()->flash('notification', 'success:Notícia criada!');
        return redirect()->route('adm.post.edit', $post->id);
    }

    public function edit($id) {
        $data['post'] = Post::find($id);
        $data['category_post'] = CategoryPost::orderBy('created_at')->get();
        $data['status_post'] = StatusPost::orderBy('created_at')->get();
        $data['tag_post'] = TagPost::orderBy('created_at')->get();
        
        $data['posts_has_categories_array'] = $data['post']->PostsHasCategoriesPosts->pluck('category_post_id')->toArray();
        $data['posts_has_tags_array'] = $data['post']->PostsHasTagsPosts->pluck('tag_post_id')->toArray();
        
        $data['required_files'] = ['dropify'];
        return view('Admin.site.post.edit', compact('data'));
    }
    public function update(reqUpdate $req) {
        $data = $req->all();
        if ((!isset($data['private']))) $data['private'] = 0;
        $post = Post::find($data['id']);

        $data['slug_title'] = str_slug($data['title']);
        if ($data['content'] != null) {
            $data['content'] = str_replace('../', '', $data['content']);
            $data['content'] = str_replace('app/public/', '', $data['content']);
        }

        if (isset($data['health_calendar'])) {
            $old_health_calendar = Post::where('health_calendar', 1)->first();
            if ($old_health_calendar AND $old_health_calendar->id != $data['id']) {
                $old_health_calendar->update(['health_calendar' => '0']);
            }
        }

        if (isset($data['create_slider'])) {
            $create_slider_post = HelpPosts::createSliderPost($post);

            if (!$create_slider_post) {
                session()->flash('notification', 'error:Falha ao criar o slider, a img-banner do post não foi encontrada');
				return redirect()->route('adm.post.edit', $post->id);
            }
        }

        $post->update($data);
        
        $post->PostsHasCategoriesPosts()->delete();
        if (isset($data['category_post_id'])) {
            foreach ($data['category_post_id'] as $key => $category_post_id) {
                PostHasCategoryPost::create([
                    'post_id'           => $post->id,
                    'category_post_id'  => $category_post_id,
                ]);
            }
        }
        $post->PostsHasTagsPosts()->delete();
        if (isset($data['tag_post_id'])) {
            foreach ($data['tag_post_id'] as $key => $tag_post_id) {
                PostHasTagPost::create([
                    'post_id'       => $post->id,
                    'tag_post_id'   => $tag_post_id,
                ]);
            }
        }

        if (isset($data['image_banner'])) {
            $path_info = pathinfo($data['image_banner']->getClientOriginalName());
            $filename_slug = str_slug($path_info['filename']).".{$path_info['extension']}";

            $file_path = 'inserted_files/'.date('Y').'/'.date('m');
            $data['image_banner'] = $data['image_banner']->storeAs($file_path, $filename_slug);
            $post->update([
                'image_banner'   => $data['image_banner'],
            ]);
        }
        if (isset($data['image_spotlight'])) {
            $path_info = pathinfo($data['image_spotlight']->getClientOriginalName());
            $filename_slug = str_slug($path_info['filename']).".{$path_info['extension']}";

            $file_path = 'inserted_files/'.date('Y').'/'.date('m');
            $data['image_spotlight'] = $data['image_spotlight']->storeAs($file_path, $filename_slug);
            $post->update([
                'image_spotlight'   => $data['image_spotlight'],
            ]);
        }

        session()->flash('notification', 'success:Notícia atualizada!');
        return redirect()->route('adm.post.edit', $post->id);
    }

    public function alert($id) {
        $data['post'] = Post::find($id);

        return view('Admin.site.post.alert', compact('data'));
    }
    public function delete(Request $req) {
        $data = $req->all();
        $post = Post::find($data['id']);

        $post->delete();

        session()->flash('notification', 'success:Notícia excluída!');
        return redirect()->route('adm.posts.list');
    }

    public function excludedList() {
        $data['post'] = Post::select(
            'id',
            'title',
            'image_banner',
            'image_spotlight',
            'created_by_id',
            'status_post_id'
        )->orderBy('created_at', 'desc')->onlyTrashed()->get();

        return view('Admin.site.post.excluded_list', compact('data'));
    }

    public function alertRestore($id) {
        $data['post'] = Post::withTrashed()->find($id);

        return view('Admin.site.post.alert_restore', compact('data'));
    }
    public function restore(Request $req) {
        $data = $req->all();
        $post = Post::withTrashed()->find($data['id']);

        $post->restore();

        session()->flash('notification', 'success:Notícia restaurada!');
        return redirect()->route('adm.post.edit', $post->id);
    }

    public function alertDefinitiveExclusion($id) {
        $data['post'] = Post::withTrashed()->find($id);

        return view('Admin.site.post.alert_definitive_exclusion', compact('data'));
    }
    public function definitiveDelete(Request $req) {
        $data = $req->all();
        $post = Post::withTrashed()->find($data['id']);

        $post->forceDelete();

        session()->flash('notification', 'success:Notícia excluída permanentemente!');
        return redirect()->route('adm.posts.excluded_list');
    }
}