<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    public function index(){
        session::forget('create_is_permits');
         return view('admin.invoice.create');
    }

    public function save_invoice(Request $request){

        if( !session()->has('create_is_permits')){
            $user=auth()->user();
            $user_id=$user->id;
            $min = 1020100;
            $count = Invoice::all()->count();
            $max= 3001020+$count;
            $unique_number = mt_rand($min,$max);
            // verifier si le nombre genere se trouve dans la base de donnée.

            $invoice = Invoice::where('code',$unique_number)->first();
            while($invoice != null) {
                // si vraie regeneré encore jusqu'a trouver un nombre inexistant
                $min++;
                $max++;
                $unique_number = mt_rand($min,$max);
                $invoice = Invoice::where('code',$unique_number)->first();
            }
            $unique_number = 'SV'.'-'.$unique_number;
            Invoice::create([
                'user_id' =>$user_id,
                'phone' =>$request->phone,
                'first_name' =>$request->first_name,
                'last_name' =>$request->last_name,
                'amount' =>$request->amount,
                'pc_mark' =>$request->pc_mark,
                'pc_rame' =>$request->pc_rame,
                'pc_disk' =>$request->pc_disk,
                'problem' =>$request->problem,
                'code' =>$unique_number,
                'is_payed' =>false,
            ]);
    
            $invoice = Invoice::where('code',$unique_number)->first();
            $company = Company::with('telephone')->first();
            if($invoice != null){
                session::put('create_is_permits',true);
                return view('admin.invoice.show',compact('invoice','company'));
            }
        }
        else{
            return back();
        }
    }

    public function view_invoice()
    {
        //recuperation des dernier 24 element si le nombre de selection doit depasser
        $nb_invoice = Invoice::all()->count();
        if($nb_invoice > 24){
            $nb =  $nb_invoice - 24;
            $invoices = Invoice::where('is_payed',false)->where('id','>',$nb)->orderBy("id" , "desc")->paginate(3);
        }
        else{
            $invoices = Invoice::where('is_payed',false)->orderBy("id" , "desc")->limit(10)->paginate(3);
        }
        $count= count($invoices);
        if($count ==  1){
            $invoices = Invoice::first();
        }
        return view('admin.invoice.find',compact("invoices",'count'));
    }

    public function view_update_invoice(Request $request){
        $invoice = Invoice::where('id',$request->invoice_id)->first();
        return view('admin.invoice.update',compact("invoice"));
    }

    public function save_update_invoice( Request $request){
       
        $user_id = auth()->user()->id;
        Invoice::where('code', $request->invoice_code)
        ->update([
            'user_id' =>$user_id,
            'phone' =>$request->phone,
            'first_name' =>$request->first_name,
            'last_name' =>$request->last_name,
            'amount' =>$request->amount,
            'pc_mark' =>$request->pc_mark,
            'pc_rame' =>$request->pc_rame,
            'pc_disk' =>$request->pc_disk,
            'problem' =>$request->problem,
            'is_payed' =>false,
        ]);

        $invoice = Invoice::where('code',$request->invoice_code)->first();
        $company = Company::with('telephone')->first();
        if($invoice == null){
            return back()->with("error","Attention:echec d'enregistrement,erreru inconnu");
        }
        else{
            return view('admin.invoice.show',compact("invoice",'company'));
        }
    }

    public function  find_one_invoice(Request $request){
        $invoice = Invoice::where("invoice_code",$request->invoice_code)->first();
        return view('admin.invoice.show',compact("invoice"));
    }

    public function  view_invoice_info(Request $request){
        $invoice = Invoice::where("id",$request->invoice_id)->first();
        $company = Company::with('telephone')->first();
        return view('admin.invoice.one',compact("invoice","company"));
    }

    public function get_search(){
            $invoice = null;
            return view('admin.invoice.search',compact('invoice'));
    }

    public function search_invoice(Request $request){
        $invoices = Invoice::where('code',$request->invoice_code)->first();
        $count = 1;
        return view('admin.invoice.find',compact('invoices',"count"));
    }




    /* public function delete_invoice(Invoice $invoice_id){
        $invoice_id->delete();
        return back()->with('delete_success','suppression reussi avec succès');
    } */

   public function delete_invoice(Request $request){
       $invoice = Invoice::where('id',$request->invoice_id)->first();
       if($invoice != null){
            Invoice::where('id',$request->invoice_id)->delete();
       }
        return back()->with('delete_success','suppression reussi avec succès');
    }


/* 
   public function add_payment(){
    return view('admin.payment.create');
}

public function add_payment_slice(){
    return view('admin.payment.add_payment_slice');
}

public function add_payment_mobile(){
    return view('admin.payment.add_payment_mobile');
} */
}
