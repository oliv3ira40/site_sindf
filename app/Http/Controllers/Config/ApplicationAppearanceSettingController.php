<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helpers\HelpAppearanceSetting;

use App\Models\Config\ApplicationAppearanceSetting;

use App\http\Requests\ApplicationAppearanceSetting\reqUpdate;

class ApplicationAppearanceSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function edit()
    {
        $data['application_appearance_setting'] = ApplicationAppearanceSetting::first();
        
        if ($data['application_appearance_setting'] == null) {
            ApplicationAppearanceSetting::create();
            $data['application_appearance_setting'] = ApplicationAppearanceSetting::first();
        }

        $data['required_files'] = ['dropify'];
        return view('Admin.application_appearance_setting.edit', compact('data'));
    }
    public function update(reqUpdate $req)
    {
        $data = $req->all();
        $application_appearance_setting = ApplicationAppearanceSetting::first();

        $data = HelpAppearanceSetting::saveImgsOrNull($data);
        $application_appearance_setting->update($data);

        session()->flash('notification', 'success:Configurações atualizadas!');
        return redirect()->route('adm.application_appearance_settings.edit');
    }
}