<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class RolesController extends Controller
{

    public function view_roles(){

        abort_if(Gate::denies('create_users_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::with('permissions')->get();
        return view('admin.roles.show', compact('roles'));
    }

    public function view_one_role(Request $request){

        abort_if(Gate::denies('create_users_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::with('permissions')
                ->where('id',$request->role_id)
                ->first();
                
        $permissions = Permission::all();
        return view('admin.roles.update', compact('roles','permissions'));
    }

    public function save_update_role(Request $request){


       
        abort_if(Gate::denies('create_users_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $count=count(Permission::all());

        $tab = array();

        //mettre les valeurs de toutes les saisies dans un tableau
        if($request->choix_1 != null ){
            $tab[1]=$request->choix_1;
        }else{
            $tab[1]=$request->choix_1;
        }

        if($request->choix_2 != null ){
            $tab[2]=$request->choix_2;
        }else{
            $tab[2]=$request->choix_2;
        }

        if($request->choix_3 != null ){
            $tab[3]=$request->choix_3;
        }else{
            $tab[3]=$request->choix_3;
        }

        if($request->choix_4 != null ){
            $tab[4]=$request->choix_4;
        }else{
            $tab[4]=$request->choix_4;
        }

        if($request->choix_5 != null ){
            $tab[5]=$request->choix_5;
        }else{
            $tab[5]=$request->choix_5;
        }

        if($request->choix_6 != null ){
            $tab[6]=$request->choix_6;
        }else{
            $tab[6]=$request->choix_6;
        }

        if($request->choix_7 != null ){
            $tab[7]=$request->choix_7;
        }else{
            $tab[7]=$request->choix_7;
        }

        if($request->choix_8 != null ){
            $tab[8]=$request->choix_8;
        }else{
            $tab[8]=$request->choix_8;
        }

        if($request->choix_1 != null ){
            $tab[9]=$request->choix_9;
        }else{
            $tab[9]=$request->choix_9;
        }

        if($request->choix_10 != null ){
            $tab[10]=$request->choix_10;
        }else{
            $tab[10]=$request->choix_10;
        }

        $role_id = $request->role_id;

      //parcours de tout le tableau
        for($i=1;$i<=10;$i++){
           
            //si le tableau est null alors pas de selection on suprime la ligne s'il en existe
            if($tab[$i]==null){
                PermissionRole::where('role_id',$role_id)
                ->where('permission_id',$i)
                ->delete();
            }
            //si le tableau n'est pas null,soit besoin de nouvel save ou ancien save existant
            else{
                $permission_role = PermissionRole::where("role_id",$role_id)
                    ->where('permission_id',$tab[$i])
                    ->first();

                //si besoin de nouvel enregistrement alors enregistre.Pour un cas de save existant on fait rien du tout
                if($permission_role == null){
                    PermissionRole::create([
                        'role_id'=> $request->role_id,
                        'permission_id'=> $tab[$i]
                    ]);
                }
            }
        }

        return redirect()->route('view_roles');
    }













    

    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::pluck('title', 'id');

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::pluck('title', 'id');

        $role->load('permissions');

        return view('admin.roles.edit', compact('permissions', 'role'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        return view('admin.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        Role::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
