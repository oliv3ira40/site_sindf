<?php

namespace App\Http\Middleware;

use Closure;

use App\Helpers\HelpAdmin;

class CheckDefinitivePassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        
        // dd($user->definitive_password);
        if ($user->definitive_password == null) {
            // $previous_route = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
            // $prefix_previous_route = explode('.', $previous_route)[0];
            
            if (in_array('adm.index', HelpAdmin::permissionsUser())) {
                return redirect()->route('adm.definitive_password');
            } else {
                return redirect()->route('site.definitive_password');
            }
            
            // if ($prefix_previous_route == 'adm') {
            // } else {
            // }
        }

        return $next($request);
    }
}
