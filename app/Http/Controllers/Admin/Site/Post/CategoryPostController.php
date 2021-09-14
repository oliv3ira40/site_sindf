<?php

namespace App\Http\Controllers\Admin\Site\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Site\Post\CategoryPost;

use App\Http\Requests\Admin\Site\Post\CategoryPost\ReqSave;
use App\Http\Requests\Admin\Site\Post\CategoryPost\ReqUpdate;

class CategoryPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list(Request $req) {
        $filters = $req->all();
        $data['category_post'] = CategoryPost::select('id', 'private', 'name')->orderBy('created_at', 'desc');
        if (count($filters)) {
            if (isset($filters['search']) AND $filters['search'] != null) {
                $data['category_post'] = $data['category_post']->where('name', 'like', '%'.$filters['search'].'%');
            }
        }
        $data['category_post'] = $data['category_post']->paginate(10);
    
        return view('Admin.site.post.category.list', compact('data', 'filters'));
    }

    public function new() {
        return view('Admin.site.post.category.new');
    }

    public function save(ReqSave $req) {
        $data = $req->all();
        if ((!isset($data['private']))) $data['private'] = 0;
        
        CategoryPost::create($data);

        session()->flash('notification', 'success:Categoria registrada!');
        return redirect()->route('adm.categories_posts.list');
    }

    public function edit($id) {
        $data['category_post'] = CategoryPost::find($id);
        
        return view('Admin.site.post.category.edit', compact('data'));
    }

    public function update(ReqUpdate $req) {
        $data = $req->all();
        if ((!isset($data['private']))) $data['private'] = 0;

        $category_post = CategoryPost::find($data['id']);
        $category_post->update($data);

        session()->flash('notification', 'success:Categoria atualizada!');
        return redirect()->route('adm.categories_posts.list');
    }

    public function alert($id) {
        $data['category_post'] = CategoryPost::find($id);
        
        return view('Admin.site.post.category.alert', compact('data'));
    }

    public function delete(Request $req) {
        $data = $req->all();

        $category_post = CategoryPost::find($data['id']);
        $category_post->delete();

        session()->flash('notification', 'success:Categoria excluída!');
        return redirect()->route('adm.categories_posts.list');
    }

    public function newAjax(Request $req) {
        $data = $req->all();
        dd($data);
        dd('ó nois aqui');
    }
}
