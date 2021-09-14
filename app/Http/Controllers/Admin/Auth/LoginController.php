<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Helpers\HelpAdmin;

use App\Http\Requests\Admin\Auth\reqSendNewPassword;
use App\Http\Requests\Admin\Auth\reqCheckEmail;
use App\Http\Requests\Admin\Auth\reqLogin;

use App\Models\Admin\User;

class LoginController extends Controller
{


    public function emailEntry()
    {
        if (\Auth::user()) {
            return redirect()->route('adm.index');
        }

        return view('Admin.auth.email_entry');
    }
    public function checkEmail(reqCheckEmail $req)
    {
        $data = $req->all();
        $user = User::where('email', $data['email'])->first();

        return redirect()->route('adm.welcome_back', $user->id);
    }

    public function welcomeBack($user_id)
    {
        $user = User::find($user_id);

        return view('Admin.auth.welcome_back', compact('user'));
    }

    public function login(reqLogin $req)
    {
        $data = $req->all();

        $user = User::where('email', $data['email'])->first();
        if (Hash::check($data['password'], $user->password)) {
            Auth::attempt(['email' => $user->email, 'password' => $data['password']]);
            $req->session()->forget('temporary_user');

            HelpAdmin::generateUserSettings();
            return redirect()->route('adm.index');
        } else {
            session()->flash('password', 'Senha incorreta');
            return redirect()->route('adm.welcome_back', $user->id);
        }
    }
    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->forget('temporary_user');

        return redirect()->route('adm.email_entry');
    }


    public function resetPassword()
    {
        return view('Admin.auth.passwords.reset');
    }
    public function sendNewPassword(reqSendNewPassword $req)
    {
        $data = $req->all();
        $user = User::where('email', $data['email'])->first();

        $data['full_name_user'] = HelpAdmin::completName($user);
        $data['new_password'] = Str::random(6);
        
        $user->update(['password' => bcrypt($data['new_password'])]);

        Mail::send('auth.emails_templates.new_password', $data, function($message) use ($data){
            $message->from('no-reply@startproject.com.br', 'StartProject');
            $message->to($data['email']);
            // $message->bcc('');
            $message->subject('StartProject - Senha resetada');
        });

        session()->flash('notification', 'success:Nova senha enviada para '.$user->email);
        return redirect()->route('login');
    }
}