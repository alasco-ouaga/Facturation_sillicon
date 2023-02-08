<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class agents
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
         $agent=false;
 
         foreach($user_role->roles  as $role){
             if($role->name == 'agent'){
                     $agent=true;
                     break;
             }
         }
 
         if($agent){
             return $next($request);
         }
         else{
             return redirect('admin.home');
         }     

       

       
    }
    
}
