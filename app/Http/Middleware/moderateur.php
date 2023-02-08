<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class moderateur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //rechercher l'utilisateur qui s'est connecter
        $user = auth()->user();

        //tantque qu'on ne trouve l'utilisateur connecter continu de chercher
        if (!$user) {
            return $next($request);
        }

        //recuperer tous les roles liés au users qui s'est connecté
        $user_role = User::with('roles')->where('id',$user->id)->first();
        $moderateur=false;

        foreach($user_role->roles  as $role){
            if($role->name == 'moderateur'){
                    $moderateur=true;
                    break;
            }
        }

        if($moderateur){
            return $next($request);
        }
        else{
            return redirect('admin.home');
        }     
    }
}
