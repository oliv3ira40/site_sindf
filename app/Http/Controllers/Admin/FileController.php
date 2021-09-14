<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

use App\Http\Requests\Admin\File\ReqInsertFiles;
use App\Models\Admin\InsertFile;

use App\Helpers\HelpAdmin;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function allFiles(Request $req) {
        $filters = $req->all();
        $bar = DIRECTORY_SEPARATOR;

        $data['all_files'] = InsertFile::select(
            'id',
            'name',
            'extension',
            'path',
            'created_at'
        )->orderBy('created_at', 'desc');

        if (count($filters)) {
            if (isset($filters['search']) AND $filters['search'] != null) {
                $data['all_files'] = $data['all_files']->where('name', 'like', '%'.$filters['search'].'%');
                $data['all_files'] = $data['all_files']->orWhere('path', 'like', '%'.$filters['search'].'%');
                $data['all_files'] = $data['all_files']->orWhere('extension', 'like', '%'.$filters['search'].'%');
            }
        }
        $data['all_files'] = $data['all_files']->paginate(10);

        return view('Admin.files.all_files', compact('data', 'filters'));
    }

    public function insertFiles(ReqInsertFiles $req) {
        $data = $req->all();

        foreach ($data['new_files'] as $key => $file) {
            $path_info = pathinfo($file->getClientOriginalName());
            $filename_slug = str_slug($path_info['filename']).".{$path_info['extension']}";
            
            $file_path = 'inserted_files/'.date('Y').'/'.date('m');
            $data_file = [
                "name" => $filename_slug,
                "extension" => $path_info["extension"],
                "path" => $file_path."/".$filename_slug,
            ];
            InsertFile::create($data_file);
            $file->storeAs($file_path, $filename_slug);
        }
        
        session()->flash('notification', 'success:'.count($data['new_files']).' novo(s) arquivos foram inseridos!');
        return redirect()->route('adm.files.all_files');
    }

    public function alert(Request $req) {
        $data = $req->all();

        $file = pathinfo($data['path']);
        $file['path'] = $data['path'];

        return view('Admin.files.alert', compact('file')); 
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        
        Storage::delete($data['path']);

        session()->flash('notification', 'success:Arquivo excluido!');
        return redirect()->route('adm.files.all_files');
    }
}
