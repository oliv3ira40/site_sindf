<?php

namespace App\Http\Controllers\Admin\Evaluations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageForEvaluationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    function list($type_evaluation_id)
    {
        $data['type_of_evaluation'] = TypeOfEvaluation::find($type_evaluation_id);
        $data['pictures_type_of_evaluation'] = $data['type_of_evaluation']->PicturesOfTypeOfEvaluation;

        return view('Admin.evaluations.type_of_evaluation.picture_of_type_of_evaluation.list', compact('data'));
    }
    
    function new($type_evaluation_id)
    {
        $data['type_of_evaluation'] = TypeOfEvaluation::find($type_evaluation_id);

        return view('Admin.evaluations.type_of_evaluation.picture_of_type_of_evaluation.new', compact('data'));
    }
    function save(SavePicture $req)
    {
        $bar = DIRECTORY_SEPARATOR;
        $data = $req->all();
        $image = $data['image']->getClientOriginalName();
        if ($data['absolute_position'] != null) $data['position'] = $data['absolute_position'];
        if ($data['position'] == null) $data['position'] = 0;

        if ($data['name'] == null) {
            $data['name'] = pathinfo($image, PATHINFO_FILENAME);
        }
        $data['name_slug'] = str_slug($data['name']);
        $data['extension'] = pathinfo($image, PATHINFO_EXTENSION);

        $file_path = 'picture_type_evaluation'.$bar.$data['type_evaluation_id'].$bar;
        $name_file = $data['name_slug'].'-'.rand(1111, 9999).'.'.$data['extension'];
        $data['path'] = $data['image']->storeAs($file_path, $name_file);

        PictureOfTypeOfEvaluation::create($data);

        session()->flash('notification', 'success:Imagem registrada!');
        return redirect()->route('admin.picture_of_type_of_evaluation.list', $data['type_evaluation_id']);
    }

    function edit($id)
    {
        $data['picture_type_of_evaluation'] = PictureOfTypeOfEvaluation::find($id);
        $data['type_of_evaluation'] = $data['picture_type_of_evaluation']->TypeOfEvaluation;

        return view('Admin.evaluations.type_of_evaluation.picture_of_type_of_evaluation.edit', compact('data'));
    }
    function update(UpdatePicture $req)
    {
        $bar = DIRECTORY_SEPARATOR;
        $data = $req->all();
        $picture_type_of_evaluation = PictureOfTypeOfEvaluation::find($data['id']);
        if ($data['absolute_position'] != null) $data['position'] = $data['absolute_position'];

        if (isset($data['image'])) {
            $image = $data['image']->getClientOriginalName();
            
            if ($data['name'] == null) {
                $data['name'] = pathinfo($image, PATHINFO_FILENAME);;
            }
            $data['extension'] = pathinfo($image, PATHINFO_EXTENSION);;
    
            $file_path = 'picture_type_evaluation'.$bar.$data['type_evaluation_id'].$bar;
            $name_file = str_slug($data['name']).'-'.rand(1111, 9999).'.'.$data['extension'];
            $data['path'] = $data['image']->storeAs($file_path, $name_file);
    
            Storage::delete($picture_type_of_evaluation->path);
        }
        $data['name_slug'] = str_slug($data['name']);

        $picture_type_of_evaluation->update($data);

        session()->flash('notification', 'success:Imagem atualizada!');
        return redirect()->route('admin.picture_of_type_of_evaluation.list', $data['type_evaluation_id']);
    }

    function alert($id)
    {
        $data['picture_type_of_evaluation'] = PictureOfTypeOfEvaluation::find($id);
        $data['type_of_evaluation'] = $data['picture_type_of_evaluation']->TypeOfEvaluation;

        return view('Admin.evaluations.type_of_evaluation.picture_of_type_of_evaluation.alert', compact('data'));
    }
    function delete(Request $req)
    {
        $data = $req->all();
        $picture_type_of_evaluation = PictureOfTypeOfEvaluation::find($data['id']);
        $path_file = $picture_type_of_evaluation->path;

        $picture_type_of_evaluation->delete();
        Storage::delete($path_file);

        session()->flash('notification', 'success:Imagem excluída!');
        return redirect()->route('admin.picture_of_type_of_evaluation.list', $data['type_evaluation_id']);
    }
}
