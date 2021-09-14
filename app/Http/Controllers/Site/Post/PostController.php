<?php

namespace App\Http\Controllers\Site\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\HelpAdmin;
use App\Helpers\Site\HelpPosts;

use App\Models\Site\Post\Post;
use App\Models\Site\Post\CategoryPost;
use App\Models\Site\Post\TagPost;
use App\Models\Site\Post\PostHasCategoryPost;
use App\Models\Site\Post\PostHasTagPost;
use Storage;

class PostController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }



    public function list(Request $req) {
        $filters = $req->all();
        $data['posts'] = Post::orderBy('created_at', 'desc')->where('status_post_id', 1);
        $data['categories'] = CategoryPost::orderBy('created_at', 'desc')->get();
        $data['tags'] = TagPost::orderBy('created_at', 'desc')->get();

        if (count($filters)) {
            if (isset($filters['category_post_id'])) {
                $category = $data['categories']->find($filters['category_post_id']);
                $post_has_category_post = PostHasCategoryPost::where('category_post_id', $filters['category_post_id'])
                    ->pluck('post_id')->toArray();

                $data['posts'] = $data['posts']->whereIn('id', $post_has_category_post);
            }
            if (isset($filters['tag_post_id'])) {
                $tag = $data['tags']->find($filters['tag_post_id']);
                $post_has_tag_post = PostHasTagPost::where('tag_post_id', $filters['tag_post_id'])
                    ->pluck('post_id')->toArray();

                $data['posts'] = $data['posts']->whereIn('id', $post_has_tag_post);
            }
            if (isset($filters['search'])) {
                $data['posts'] = $data['posts']->where('title', 'like', '%'.$filters['search'].'%');
                // $data['posts'] = $data['posts']->where('slug_title', 'like', '%'.str_slug($filters['search']).'%');
            }
        }

        $data['posts'] = $data['posts']->paginate(8);
        return view('Site.posts.list', compact('data', 'filters'));
    }

    public function detail($id) {
        $data['post'] = Post::find($id);
        $data['categories'] = CategoryPost::orderBy('created_at', 'desc')->get();
        $data['tags'] = TagPost::orderBy('created_at', 'desc')->get();

        if ($data['post'] == null) {
            return redirect()->route('site.posts.list');
        }

        $is_private_post = HelpPosts::isPrivatePost($data['post']);
        if ($is_private_post) {
            if (!\Auth::user()) {
                return redirect()->route('site.page_login', [
                    't' => 'posts',
                    'or' => route('site.posts.detail', $id)
                ]);
            }
        }

        return view('Site.posts.detail', compact('data'));
    }
}
