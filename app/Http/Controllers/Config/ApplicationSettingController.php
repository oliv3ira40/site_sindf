<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Config\ApplicationSetting;

use App\http\Requests\ApplicationSetting\reqUpdate;

class ApplicationSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function edit()
    {
        $data['application_setting'] = ApplicationSetting::first();
        
        if ($data['application_setting'] == null) {
            ApplicationSetting::create();
            $data['application_setting'] = ApplicationSetting::first();
        }

        $data['required_files'] = [''];
        return view('Admin.application_setting.edit', compact('data'));
    }
    public function update(reqUpdate $req)
    {
        $data = $req->all();
        $application_setting = ApplicationSetting::first();

        $application_setting->update($data);

        session()->flash('notification', 'success:Configurações atualizadas!');
        return redirect()->route('adm.application_settings.edit');
    }
}
