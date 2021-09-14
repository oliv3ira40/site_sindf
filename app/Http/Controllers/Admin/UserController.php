<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\HelpAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\User\newUser;
use App\Http\Requests\User\updateUser;
use App\Http\Requests\Admin\User\reqDefinitivePassword;

use App\Models\Admin\User;
use App\Models\Admin\Avatar;
use App\Models\Admin\Group;

use Illuminate\Auth\Notifications\ResetPassword;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list(Request $req) {
        $filters = $req->all();
        $developer_group = Group::where('tag', 'developer')->first();
        $users = User::select('id', 'first_name', 'last_name', 'email', 'cpf', 'deleted_at', 'group_id')
            ->orderBy('created_at', 'desc')->withTrashed();

        if (count($filters)) {
            if (isset($filters['search']) AND $filters['search'] != null) {
                $users = $users->where('first_name', 'like', '%'.$filters['search'].'%');
                $users = $users->orWhere('last_name', 'like', '%'.$filters['search'].'%');
                $users = $users->orWhere('cpf', 'like', '%'.$filters['search'].'%');
                $users = $users->orWhere('email', 'like', '%'.$filters['search'].'%');
            }
        }
        $users = $users->paginate(10);

        return view('Admin.users.list', compact('users', 'filters'));
    }

    public function new()
    {
        $groups = Group::orderBy('created_at', 'desc')->get();
        
        $auth_user = \Auth::user();
        $group_auth_user = $auth_user->Group;
        if (!HelpAdmin::IsUserDeveloper()) {
            $groups = $groups->where('hierarchy_level', '<=', $group_auth_user->hierarchy_level);
        }

        return view('Admin.users.new', compact('groups'));
    }
    public function save(newUser $req)
    {
        $data = $req->all();
        $data['password'] = bcrypt($data['password']);
        

        $group = Group::find($data['group_id']);
        if (HelpAdmin::isAProtectedGroup($group)) {
            return redirect()->route('adm.withoutPermission');
        }

        $user = User::create($data);
        HelpAdmin::generateUserSettings($user);

        session()->flash('notification', 'success:Usuário criado!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.users.new');
        } else
        {
            return redirect()->route('adm.users.list');
        }
    }

    public function edit($id)
    {
        $developer_group = Group::where('tag', 'developer')->first();
        $groups = Group::orderBy('created_at', 'desc')->get();
        $auth_user = \Auth::user();
        $group_auth_user = $auth_user->Group;
        
        $user = User::find($id);
        if ($user == null) 
        {
            session()->flash('notification', 'error:Este usuário não está mais disponível');
            return redirect()->route('adm.index');
        }
        
        HelpAdmin::generateUserSettings($user);

        if (HelpAdmin::IsUserDeveloper($user) AND
            !HelpAdmin::IsUserDeveloper()) {
            return redirect()->route('adm.withoutPermission');
        }

        if ($auth_user->id != $user->id
        AND !in_array('adm.users.edit_other_users', HelpAdmin::permissionsUser($auth_user)))
        {
            return redirect()->route('adm.withoutPermission');
        }

        $groups = Group::orderBy('created_at', 'desc')->get();
        $auth_user = \Auth::user();
        $group_auth_user = $auth_user->Group;
        if (!HelpAdmin::IsUserDeveloper()) {
            $groups = $groups->where('hierarchy_level', '<=', $group_auth_user->hierarchy_level);
        }

        $avatars = Avatar::all();

        return view('Admin.users.edit', compact('user', 'groups', 'avatars'));
    }
    public function update(updateUser $req)
    {
        $data = $req->all();
        $user = User::find($data['id']);
        
        $group = Group::find($data['group_id']);
        if (HelpAdmin::isAProtectedGroup($group)) {
            return redirect()->route('adm.withoutPermission');
        }
        
        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        if (isset($data['definitive_password'])) $data['definitive_password'] = null;

        $user->update($data);
        
        session()->flash('notification', 'success:Usuário atualizado!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.users.edit', $user->id);
        } else
        {
            if (in_array('adm.users.list', HelpAdmin::permissionsUser()))
            {
                return redirect()->route('adm.users.list');
            } else
            {
                return redirect()->route('adm.users.edit', $user->id);
            }
        }
    }

    public function alert($id)
    {
        $user = User::find($id);

        return view('Admin.users.alert', compact('user'));
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        User::find($data['id'])->delete();

        session()->flash('notification', 'success:Usuário excluído!');
        return redirect()->route('adm.users.list');
    }

    public function toRestore($id)
    {
        $user = User::where('id', $id)->withTrashed()->first();
        $user->restore();

        session()->flash('notification', 'success:Usuário restaurado!');
        return redirect()->route('adm.users.list');
    }

    public function definitiveExclusionAlert($id)
    {
        $user = User::onlyTrashed()->find($id);

        return view('Admin.users.definitive_exclusion_alert', compact('user'));
    }
    public function definitiveExclusion(Request $req)
    {
        $data = $req->all();
        User::onlyTrashed()->find($data['id'])->forceDelete();

        session()->flash('notification', 'success:Usuário excluído permanentemente!');
        return redirect()->route('adm.users.list');
    }

    public function definitivePassword() {
        return view('Admin.users.definitive_password');
    }
    public function definitivePasswordSave(reqDefinitivePassword $req) {
        $data = $req->all();
        $user = \Auth::user();

        $data['password'] = bcrypt($data['password']);
        $data['definitive_password'] = date(now());

        $user->update($data);
        
        return redirect()->route('adm.index');
    }
}
