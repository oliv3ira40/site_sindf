<?php

namespace App\Http\Controllers\Admin\Site\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Site\Post\Post;
use App\Models\Site\Post\FeaturedPost;

use App\Http\Requests\Admin\Site\Post\FeaturedPost\ReqSave;
use App\Http\Requests\Admin\Site\Post\FeaturedPost\ReqUpdate;

class FeaturedPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function list()
    {
        $data['featured_post'] = FeaturedPost::select('id', 'order', 'post_id')->orderBy('created_at', 'desc')->get();

        return view('Admin.site.post.featured_post.list', compact('data'));
    }

    public function new()
    {
        $data['post'] = Post::select('id', 'title', 'image_banner')
            ->orderBy('created_at', 'desc')->get();

        return view('Admin.site.post.featured_post.new', compact('data'));
    }
    public function save(ReqSave $req)
    {
        $data = $req->all();
        if ($data['order'] == null) {
            $data['order'] = FeaturedPost::orderBy('order', 'desc')->first()->order + 1;    
        }

        FeaturedPost::create($data);

        session()->flash('notification', 'success:Post destacado!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on') {
            return redirect()->route('adm.featured_post.new');
        } else {
            return redirect()->route('adm.featured_post.list');
        }
    }

    public function edit($id)
    {
        $data['featured_post'] = FeaturedPost::find($id);
        $data['post'] = Post::select('id', 'title', 'image_banner')->orderBy('created_at', 'desc')->get();

        return view('Admin.site.post.featured_post.edit', compact('data'));
    }
    public function update(ReqUpdate $req)
    {
        $data = $req->all();
        $featured_post = FeaturedPost::find($data['id']);

        $featured_post->update($data);

        session()->flash('notification', 'success:Post destacado atualizado!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on') {
            return redirect()->route('adm.featured_post.edit', $featured_post->id);
        } else {
            return redirect()->route('adm.featured_post.list');
        }
    }

    public function alert($id)
    {
        $data['featured_post'] = FeaturedPost::find($id);

        return view('Admin.site.post.featured_post.alert', compact('data'));
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        $featured_post = FeaturedPost::find($data['id']);

        $featured_post->delete();

        session()->flash('notification', 'success:Post destacado excluído!');
        return redirect()->route('adm.featured_post.list');
    }
}
