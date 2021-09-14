<?php

namespace App\Http\Controllers\Admin\Site\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Site\Post\StatusPost;

use App\Http\Requests\Admin\Site\Post\StatusPost\ReqSave;
use App\Http\Requests\Admin\Site\Post\StatusPost\ReqUpdate;

class StatusPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list() {
        $data['status_post'] = StatusPost::select('id', 'name')->orderBy('created_at', 'desc')->get();
    
        return view('Admin.site.post.status.list', compact('data'));
    }

    public function new() {
        return view('Admin.site.post.status.new');
    }

    public function save(ReqSave $req) {
        $data = $req->all();
        
        StatusPost::create($data);

        session()->flash('notification', 'success:Status registrado!');
        return redirect()->route('adm.status_posts.list');
    }

    public function edit($id) {
        $data['status_post'] = StatusPost::find($id);
        
        return view('Admin.site.post.status.edit', compact('data'));
    }

    public function update(ReqUpdate $req) {
        $data = $req->all();

        $status_post = StatusPost::find($data['id']);
        $status_post->update($data);

        session()->flash('notification', 'success:Status atualizado!');
        return redirect()->route('adm.status_posts.list');
    }

    public function alert($id) {
        $data['status_post'] = StatusPost::find($id);
        
        return view('Admin.site.post.status.alert', compact('data'));
    }

    public function delete(Request $req) {
        $data = $req->all();

        $status_post = StatusPost::find($data['id']);
        $status_post->delete();

        session()->flash('notification', 'success:Status excluído!');
        return redirect()->route('adm.status_posts.list');
    }

    public function newAjax(Request $req) {
        $data = $req->all();
        dd($data);
        dd('ó nois aqui');
    }
}
