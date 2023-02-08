<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Telephone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
        public function get_company()
        {
                $company = Company::first();
                return view('admin.company.show',compact('company'));
        }

        public function get_phone()
        {
                $phones = Telephone::all();
                return view('admin.company.phone',compact('phones'));
        }

        public function add_phone_for_company($phone)
        {
                $nb_telephone = count(Telephone::all()) ;
                $company = Company::first();
                $company_id=$company->id;

                if($nb_telephone >= 3){
                        $message ="";
                        $message=$message.
                                '
                                <div class="container alert alert-danger">
                                <div class="container col-10  text-center text-italic red px-3">
                                        Erreur !!! : Limite de numero depassée. 
                                </div>
                                </div>
                        ';
                        return $message;
                }

            
                if(Telephone::where('phone',$phone)->exists()){
                        $message ="";
                        $message=$message.
                                '
                                <div class="container alert alert-warning">
                                        <div class="container col-10  text-center  red px-3  ">
                                        Attention !!! : Le numero existe déja. 
                                        </div>
                                </div>
                                ';
                        return $message;
                }

                $telephone = [ 
                        [
                                'phone' =>$phone,
                                'company_id' =>$company_id,
                        ]
                ];
                Telephone::insert($telephone);

                if( Telephone::where('phone',$phone)->exists()){
                        $message ="";
                        $message=$message.
                                '
                                <div class="container p-2 mb-2 alert alert-good">
                                <div class="container col-10 px-3 text-center ">
                                        <span class="time-new-rooman italic"> Le numero à été ajouté avec succés </span>
                                </div>
                                </div>
                        ';
                        return $message;
                }
                else{
                        $message ="";
                        $message=$message.
                                '
                                <div class="container p-2 mb-2 alert-warning">
                                <div class="container col-10 text-center">
                                        <span class="time-new-rooman italic red"> échec de savegarde.erreur inconnue. </span>
                                </div>
                                </div>
                        ';
                        return $message;
                }
         }


         public function get_phone_number($id)
         {
             $telephone=Telephone::find($id);
             $phone=$telephone->phone;
             if($telephone != null){
                 $message ="";
                 $message=$message.
                     '
                    
                         <label for="phoneId" class="time-new-rooman"> Numero </label>
                         <input class="form-control " type="hidden" id="phoneId" value="'.$id.'">
                         <input class="form-control " type="number" id="phoneNumber" value="'.$phone.'">
                         <input class="form-control " type="hidden" id="oldPhoneNumber" value="'.$phone.'">
                  
                 ';
                 return $message;
             }
         }
     
         //enregistrement des numeros de telphone modifiers
         public function save_update_number(Request $request)
         {
             $data = $request->all();
             $phoneNumber = $data['phoneNumber'];
             $oldPhoneNumber = $data['oldPhoneNumber'];
             $phoneId = $data['phoneId'];
           
             if(Telephone::where('phone',$phoneNumber)->exists()){
                        $message="";
                        $message=$message.
                        '
                        <div class="container alert alert-danger p-2 mb-2 mt-3 ">
                        <div class="container col-10 text-center px-3 col-10r">
                                <span class="text-tnr  text-italic gras red"> 
                                Attention !!! Le numero existe déja. 
                                </span>
                        </div>
                        </div>
                ';
                return $message;
             }
     
             Telephone::where('id',$phoneId)->update([
                 'phone' => $phoneNumber,
             ]);
     
             $message ="";
             $message=$message.
                 '
                 <div class="container p-2 mb-2 alert alert-good ">
                     <div class="container col-10 px-3 text-center ">
                         <span class="time-new-rooman italic"> Le numero à été modifié avec succés </span>
                     </div>
                 </div>
             ';
     
             return $message;
         }

         
    public function delete_number($id)
    {
        $message ="";
        $message=$message.
        '<input type="hidden" id="phoneId" value="'.$id.'"/>';
        return $message;
        
    }

         
    //supression du numero de telephone
    public function confirmDeleteNnumber($id)
    {
        $nbNumber = count(Telephone::all());
        
        $message ="";
        if($nbNumber == 1){
            $message=$message.
                '
                <div class="container p-2 mb-2 alert alert-danger ">
                    <div class="container col-11 px-3 text-center ">
                        <span class="time-new-rooman italic red"> Supression refusé.Vous devez au moin avoir un numero </span>
                    </div>
                </div>
            ';
            return $message;
        }

        Telephone::where('id', $id)->delete();
        $telephone = Telephone::find($id);
        $message ="";
        if($telephone == null) {
            $message=$message.
                '
                <div class="container p-2 mb-2 alert alert-good">
                    <div class="container col-10 px-3 text-center ">
                        <span class="time-new-rooman italic"> Le numero à été suprimé avec succés </span>
                    </div>
                </div>
            ';
        }
        else{
            $message=$message.
                '
                <div class="container p-2 mb-2 alert alert-warning">
                    <div class="container col-10 px-3 text-center ">
                        <span class="time-new-rooman italic red"> Echec de suppression.Erreur inconnue </span>
                    </div>
                </div>
            ';

        }

        return $message;
    }

    public function go_to_update()
    {
        $company = Company::first();
        return view('admin.company.update',compact('company'));
    }

    public function save_update_company(Request $request)
    {
        Company::first()->update([
                'name'                  => $request->name,
                'country'                  => $request->country,
                'city'                  => $request->city,
                'locality'                  => $request->locality,
                'email'                 => $request->email,
                'locality_detail'      => $request->locality_detail,
                'gps'                   => $request->gps,
                'objet'            => $request->objet,
            ]);
        
            return redirect()->route('get_company');
    }

    public function get_logo()
    {
        $company =Company::first();
        return view('admin.company.image',compact('company'));
    }

    public function save_company_image(Request $request)
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
         $img_link = "storage/company/".$GoodFileName;

        //Enregistrement de l'image dans le storage de laravel
        $path = $request->file('image')->storeAs('public/company', $GoodFileName);

        //enregistrement du nom avec indice de l'image dans le sgbd
        Company::first()->update(['img_name' => $GoodFileName]);

         //enregistrement du nom avec indice de l'image dans le sgbd
        Company::first()->update(['img_link' => $img_link]);

        //redirection vers la page de d'accceuil
        return redirect()->route('get_logo');
              
    }

}
