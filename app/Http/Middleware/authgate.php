<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Models\Role;
use App\Models\PermissionRole;
use App\Models\Permission;

class authgate
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
        $user_roles = Role::whereHas(
            'users', function($q){
                    $user = auth()->user();
                    $q->where('id', $user->id);
                    }
        )->get();

        //recupereration de toutes les permissons dans la tables permissions
        $permissions = Permission::all();

        //fabriquer des gates avec les noms de ces permissions en fonction des roles du users qui s'est connecter
        foreach($permissions as $creategate){
            $gate_name = $creategate->name;
            $id = $creategate->id;
            
            //pour le nom de la permission selectionnée,retrouver tous les roles qui lui sont liés 
            $permission_role = PermissionRole::where('permission_id',$id)->get();
            $get_role_name  = array();
            $i=0;

            //Pour chaque role lié recuperer et placer le nom de ce role dans un tableau
            foreach($permission_role as $getrole){
                $name = Role::where('id',$getrole->role_id)->first();
                $get_role_name[$i]=$name->name;
                $i++;
            }

           //verifier a savoir si parmi les roles du users recupereés,un au moins appartient aux roles se trouvant dans le tableau si desssu
            $is_access = false;
            foreach($user_roles as $searchrole){
                foreach($get_role_name as $role_name){
                    if($searchrole->name == $role_name){
                        $is_access = true;
                        break;
                    }
                }
                if($is_access == true){
                    break;
                }
            }

           
            //si au moins un des roles est element du tableau, alors le users peut acceder a ce type de gate.On crée donc la gate concernée
            if($is_access){
                if($user->is_permits==true){
                    Gate::define($gate_name,function() {
                        return true;
                    });
                }
            }

           
        }

        return $next($request);
    }
}
