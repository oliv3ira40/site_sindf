<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

use App\Helpers\Site\HelpSite;
use App\Helpers\HelpAdmin;

use App\Http\Requests\Site\Auth\reqLogin;
use App\Http\Requests\Site\Auth\reqDefinitivePassword;
use App\Http\Requests\Site\Auth\reset\reqValidatePersonalData;
use App\Http\Requests\Site\Auth\reset\reqSaveNewPassword;

use App\Models\Admin\User;

class LoginController extends Controller
{
    function pageLogin(Request $req) {
        $data = $req->all();
        if (\Auth::user()) {
            return redirect()->route('site.index');
        }

        if (isset($data['or'])) {
            if ($data['t'] == 'posts') {
                session()->flash('info_old_route', 'Faça login para ter acesso a postagem');
            }
        }
        return view('Site.auth.login', compact('data'));
    }
    function login(reqLogin $req) {
        $data = $req->all();
        $user = User::where('email', $data['email'])->first();
    
        if (!$user) {
            session()->flash('email', 'Registro não encontrado');
            return redirect()->route('site.page_login');
        }

        if (Hash::check($data['password'], $user->password)) {
            Auth::attempt(['email' => $user->email, 'password' => $data['password']]);
            $req->session()->forget('temporary_user');

            $data['old_route'] = '';
            if (isset($data['or'])) $data['old_route'] = $data['or'];

            if (\Auth::user()->definitive_password == null) {
                return redirect()->route('site.definitive_password', ['or' => $data['old_route']]);
            }

            return redirect()->route('site.success', ['or' => $data['old_route']]);
        } else {
            session()->flash('password', 'Senha incorreta, Para redefinir a sua senha entre em contato com o SINDFAZENDA.');
            return redirect()->route('site.page_login');
        }
    }

    function success(Request $req) {
        $data = $req->all();
        $redirect = route('site.index');
        if (!empty($data['or'])) $redirect = $data['or'];

        return view('Site.auth.success', compact('redirect'));
    }
    
    function logout(Request $req)
    {
        $req->session()->forget('temporary_user');
        Auth::logout();
        
        return redirect()->route('site.index');
    }

    function resetPassword()
    {
        // return view('Site.auth.reset.reset');
    }
    function validatePersonalData(reqValidatePersonalData $req) {
        // $data = $req->all();
        // $data['date_of_birth'] = str_replace('/', '-', $data['date_of_birth']);;
        // $data['date_of_birth'] = date_create($data['date_of_birth'])->format('Y-m-d');
        // $data['cpf'] = str_replace(['-', '.'], '', $data['cpf']);
        // $data['registration'] = str_replace(['-', '.'], '', $data['registration']);

        // if (!HelpSite::verifyRecaptcha($data['g-recaptcha-response'])) {
        //     return redirect()->route('site.recaptcha');
        // }

        // $user = User::where('cpf', $data['cpf'])
        //     ->where('registration', $data['registration'])
        //     ->orWhere('registration_for_login', $data['registration'])
        //     ->where('date_of_birth', $data['date_of_birth'])->first();

        // if ($user) {
        //     if (!$user->remember_token) {
        //         $data['remember_token'] = Str::random(60);
        //         $user->update($data);
        //     }
        
        //     return redirect()->route('site.new_password', $user->remember_token);
        // } else {
        //     session()->flash('info', 'Usuário não encontrado');
        //     return redirect()->route('site.reset_password');
        // }
    }
    function newPassword($remember_token) {
        // $user = User::where('remember_token', $remember_token)->first();

        // return view('Site.auth.reset.new_password', compact('user'));
    }
    function saveNewPassword(reqSaveNewPassword $req) {
        // $data = $req->all();

        // $user = User::where('remember_token', $data['remember_token'])->first();
        // $data['password'] = bcrypt($data['password']);
        // $data['definitive_password'] = date(now());

        // $user->update($data);

        // Auth::attempt(['cpf' => $user->cpf, 'password' => $data['password_confirmation']]);
        // if (HelpAdmin::IsUserRecipient()) {
        //     return redirect()->route('site.recipient');
        // } else {
        //     return redirect()->route('site.index');
        // }
    }

    function definitivePassword(Request $req) {
        $data = $req->all();
        return view('Site.auth.definitive_password', compact('data'));
    }
    function definitivePasswordSave(reqDefinitivePassword $req) {
        $data = $req->all();
        $user = \Auth::user();

        $data['password'] = bcrypt($data['password']);
        $data['definitive_password'] = date(now());
        $user->update($data);
        
        $data['old_route'] = '';
        if (isset($data['or'])) $data['old_route'] = $data['or'];
        return redirect()->route('site.success', ['or' => $data['old_route']]);
    }
}