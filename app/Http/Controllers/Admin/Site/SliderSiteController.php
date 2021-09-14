<?php

namespace App\Http\Controllers\Admin\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Helpers\Site\HelpPosts;

use App\Models\Site\Post\Post;
use App\Models\Site\Home\SliderSite;

use App\Http\Requests\Admin\Site\SliderSite\ReqSave;
use App\Http\Requests\Admin\Site\SliderSite\ReqUpdate;

class SliderSiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $data['sliders_site'] = SliderSite::select('id', 'title', 'subtitle', 'img', 'created_at')->orderBy('created_at', 'desc')->get();

        return view('Admin.site.slider_site.list', compact('data'));
    }

    public function new()
    {
        $data['post'] = Post::select('id', 'title', 'image_banner')->orderBy('created_at', 'desc')
            ->where('image_banner', '!=', '')->get();

        $data['required_files'] = ['dropify'];
        return view('Admin.site.slider_site.new', compact('data'));
    }
    public function save(ReqSave $req)
    {
        $data = $req->all();

        if ($data['post_id'] == null) {
            $slider_site = SliderSite::create($data);
    
            $image = $data['img']->getClientOriginalName();
            $extension = pathinfo($image, PATHINFO_EXTENSION);

            $path = 'site/sliders/'.$slider_site->id;
            $data['img'] = $data['img']->storeAs($path, 'img.'.$extension);
            $slider_site->update($data);
        } else {
            $post = Post::find($data['post_id']);

            $create_slider_post = HelpPosts::createSliderPost($post);
            if (!$create_slider_post) {
                session()->flash('notification', 'error:Falha ao criar o slider, a img-banner do post não foi encontrada');
				return redirect()->route('adm.slider_site.new'); 
            }
        }

        session()->flash('notification', 'success:Slider criado!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on') {
            return redirect()->route('adm.slider_site.new');
        } else {
            return redirect()->route('adm.slider_site.list');
        }
    }

    public function edit($id)
    {
        $data['slider_site'] = SliderSite::find($id);
        $data['post'] = Post::select('id', 'title', 'image_banner')->orderBy('created_at', 'desc')
            ->where('image_banner', '!=', '')->get();

        $data['required_files'] = ['dropify'];
        return view('Admin.site.slider_site.edit', compact('data'));
    }
    public function update(ReqUpdate $req)
    {
        $data = $req->all();
        $slider_site = SliderSite::find($data['id']);

        if ($data['post_id'] == null) {
            if (isset($data['img'])) {
                $image = $data['img']->getClientOriginalName();
                $extension = pathinfo($image, PATHINFO_EXTENSION);
    
                $path = 'site/sliders/'.$slider_site->id;
                $data['img'] = $data['img']->storeAs($path, 'img.'.$extension);
            }

            $slider_site->update($data);
        } else {
            $post = Post::find($data['post_id']);
            
            $data_slider_site = [
                'link' => $post->id,
                'post_id' => $post->id,
            ];

            if (Storage::exists($post->image_banner)) {
                $pathinfo = pathinfo($post->image_banner);
                $path = 'site/sliders/'.$slider_site->id.'/';
                $new_path = $path.'img.'.$pathinfo['extension'];
                Storage::delete($new_path);
                Storage::copy($post->image_banner, $new_path);

                $data_slider_site['img'] = $new_path;
            };  

            $slider_site->update($data_slider_site);
        }

        session()->flash('notification', 'success:Slider atualizado!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on') {
            return redirect()->route('adm.slider_site.edit', $slider_site->id);
        } else {
            return redirect()->route('adm.slider_site.list');
        }
    }

    public function alert($id)
    {
        $data['slider_site'] = SliderSite::find($id);

        return view('Admin.site.slider_site.alert', compact('data'));
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        $slider_site = SliderSite::find($data['id']);

        Storage::delete($slider_site->img);
        $slider_site->delete();

        session()->flash('notification', 'success:Slider excluído!');
        return redirect()->route('adm.slider_site.list');
    }
}
