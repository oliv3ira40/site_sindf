<?php

namespace App\Http\Controllers\Admin\Site\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Site\Post\TagPost;

use App\Http\Requests\Admin\Site\Post\TagPost\ReqSave;
use App\Http\Requests\Admin\Site\Post\TagPost\ReqUpdate;

class TagPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list(Request $req) {
        $filters = $req->all();
        $data['tag_post'] = TagPost::select('id', 'private', 'name')->orderBy('created_at', 'desc');


        if (count($filters)) {
            if (isset($filters['search']) AND $filters['search'] != null) {
                $data['tag_post'] = $data['tag_post']->where('name', 'like', '%'.$filters['search'].'%');
            }
        }
        $data['tag_post'] = $data['tag_post']->paginate(10);

    
        return view('Admin.site.post.tag.list', compact('data', 'filters'));
    }

    public function new() {
        return view('Admin.site.post.tag.new');
    }

    public function save(ReqSave $req) {
        $data = $req->all();
        if ((!isset($data['private']))) $data['private'] = 0;
        
        TagPost::create($data);

        session()->flash('notification', 'success:Tag registrada!');
        return redirect()->route('adm.tags_posts.list');
    }

    public function edit($id) {
        $data['tag_post'] = TagPost::find($id);
        
        return view('Admin.site.post.tag.edit', compact('data'));
    }

    public function update(ReqUpdate $req) {
        $data = $req->all();
        if ((!isset($data['private']))) $data['private'] = 0;

        $tag = TagPost::find($data['id']);
        $tag->update($data);

        session()->flash('notification', 'success:Tag atualizada!');
        return redirect()->route('adm.tags_posts.list');
    }

    public function alert($id) {
        $data['tag_post'] = TagPost::find($id);
        
        return view('Admin.site.post.tag.alert', compact('data'));
    }

    public function delete(Request $req) {
        $data = $req->all();

        $tag = TagPost::find($data['id']);
        $tag->delete();

        session()->flash('notification', 'success:Tag excluída!');
        return redirect()->route('adm.tags_posts.list');
    }

    public function newAjax(Request $req) {
        $data = $req->all();
        dd($data);
        dd('ó nois aqui');
    }
}
