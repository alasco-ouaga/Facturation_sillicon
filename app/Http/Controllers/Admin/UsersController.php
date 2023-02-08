<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleUsers;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with(['roles'])->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $user = Auth::user();
         //recuperer tous les roles liés au users qui s'est connecté
         $user_role = User::with('roles')->where('id',$user->id)->first();
         $administrateur=false;

         foreach($user_role->roles  as $role){
             if($role->name == 'administrateur'){
                     $administrateur=true;
                     break;
             }
         }

        $roles = Role::all();
        return view('admin.users.create', compact('roles','administrateur'));
    }

    public function view_users(){
        $users = User::with('roles')->get();
        $nb_user = count($users);
        return view('admin.users.show', compact('users','nb_user'));
    }

    public function view_admin(){
        $users = User::with('roles')->get();
        $nb_user = count($users);
        return view('admin.users.admin', compact('users','nb_user'));
    }

    public function view_secretaire(){
        $users = User::with('roles')->get();
        $nb_user = count($users);
        return view('admin.users.secretaire', compact('users','nb_user'));
    }

    public function view_roles(){
        abort_if(Gate::denies('create_users_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::with('permissions')->get();
        return view('admin.roles.show', compact('roles'));
    }

    public function view_one_role(Request $request){

        $roles = Role::with('permissions')
                ->where('id',$request->role_id)
                ->first();

        $permissions = Permission::all();
        return view('admin.roles.update', compact('roles','permissions'));
    }


    public function save_users(Request $request){
        
        //verification du numero de telephone
        $user = User::where('phone',$request->phone)->first();
        if($user != null){
            return back()->with("phone_error","Attention : un agent est deja enregistre avec ce numero")->withInput();
        }

        //verification de l'email
        $user = User::where('email',$request->email)->first();
        if($user != null){
            return back()->with("email_error","Attention : un agent est deja enregistre avec cet email")->withInput();
        }

        //enregistrement du user
        User::create([
        
            'phone' =>$request->phone,
            'first_name' =>$request->first_name,
            'last_name' =>$request->last_name,
            'img_name' =>'avatar.jpg',
            'administrateur' =>true,
            'is_permits' =>true,
            'company_id' =>1,
            'password' =>bcrypt('password')
        ]);

        $user=User::where('phone',$request->phone)->first();
        $user_id= $user->id;
        if($user == null){
            return back()->with("save_error","Attention : echec ,erreur inconnue")->withInput();
        }

        //nombre total de role
        $nb_role = Role::all()->count();

        //passer a l'enregistrement des roles associer au users
        for($i =1 ; $i<=$nb_role ; $i++){
            if($request->input("choix_".$i)){
                RoleUsers::create([
                    'user_id' => $user_id,
                    'role_id' =>$request->input("choix_".$i) ,
                ]);
            }
        }
        return back()->with("success","Agent enregistrer avec succès");
    }

    

    public function update_users(Request $request){
        $user_id = $request->user_id;
        $indice= $request->indice;
        //recuperation du users avec tous ses roles
        $users = User::with('roles')->where('id',$user_id)->first();
        $roles = Role::all();
        return view('admin.users.update',compact('roles','users','user_id','indice'));
    }


    public function save_update_users(Request $request){

        //recuperation de l'id du user
        $user_id = $request->user_id;

        //nombre total de role
        $nb_role = Role::all()->count();

        //suppression de tous les roles du users
        RoleUsers::where('user_id', $user_id)->delete();

        //passer a l'enregistrement des roles associer au users
        for($i =1 ; $i<=$nb_role ; $i++){
            if($request->input("choix_".$i)){
                RoleUsers::create([
                    'user_id' => $user_id,
                    'role_id' =>$request->input("choix_".$i) ,
                ]);
            }
        }
        //recuperation du users avec tous ses roles
        if($request->indice == 1 ){
            return redirect()->route('view_admin');
        }
        else{
            return redirect()->route('view_secretaire');
        }
    }

    public function delete_user(Request $request)
    {
            $invoices=Invoice::where('user_id',$request->user_id)->get();
            if($invoices !=null){
                foreach($invoices as $invoice){
                    Invoice::where('id',$invoice->id)->update([
                        'user_id' => 1,
                    ]);
                }
            }
            
            User::where('id',$request->user_id)->delete();
            return back()->with('delete_success','Agent suprimé avec succès');
    }

    public function blocked_users(Request $request)
    {
            $users=User::where('id',$request->user_id)->first();
            if($users != null){
                User::where('id',$request->user_id)
                    ->update([
                        'is_permits'=>false
                    ]);
            }
            return back()->with('blocked_success','Agent blocqué avec succès');
            
    }

    public function authorize_users(Request $request)
    {
            $users=User::where('id',$request->user_id)->first();
            if($users != null){
                User::where('id',$request->user_id)
                    ->update([
                        'is_permits'=>true
                    ]);
            }
            return back()->with('authorize_success','Agent autorisé avec succès');
    }

    public function get_user_profil()
    {
        $user = auth()->user();
        return view('admin.users.profile.profil',compact('user'));
    }

    public function update_user_profil()
    {
        $user = auth()->user();
        return view('admin.users.profile.update',compact('user'));
    }

    public function save_user_image(Request $request)
    {
        //recuperation du nom complet de l'image
        $Image_name_with_extension = $request->file('image')->getClientOriginalName();

        if($request->img_old_name ==  'avatar.png'){
                //recuperation du nom de l'image sans l'extension 
                $Image_name_not_extension = pathinfo($Image_name_with_extension,PATHINFO_FILENAME);

                //Recuperation de l'extension de l'image
                $extension = $request->file('image')->getClientOriginalExtension();

                //reconstitution du nom de l'image avec ajout d'un indice
                $GoodFileName = $Image_name_not_extension.'_'.time().'.'.$extension;
        }
        else{
                $GoodFileName = $request->img_old_name;
        }

         //reconstitition du lien de l'image
         $img_link = "storage/users/".$GoodFileName;

        //Enregistrement de l'image dans le storage de laravel
        $path = $request->file('image')->storeAs('public/users', $GoodFileName);

        //enregistrement du nom avec indice de l'image dans le sgbd
        $user = auth()->user();
        User::where('id',$user->id)->update(['img_name' => $GoodFileName]);

         //enregistrement du lien de l'image de l'image dans le sgbd
        User::where('id',$user->id)->update(['img_link' => $img_link]);

        //redirection vers la page de d'accceuil
        return redirect()->route('get_user_profil');    
    }

    public function save_user_update_data(Request $request )
    {
        User::where('id',$request->user_id)->update([
        
            'phone' =>$request->phone,
            'first_name' =>$request->first_name,
            'last_name' =>$request->last_name,
            'email' =>$request->email,
        ]);

        return redirect()->route('get_user_profil');    
    }

}
