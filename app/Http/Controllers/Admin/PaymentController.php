<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Invoice;

class PaymentController extends Controller
{


    public function beging_payment()
    {
        //recuperation des dernier 24 element si le nombre de selection doit depasser
        $nb_invoice = Invoice::all()->count();
        if($nb_invoice > 24){
            $nb =  $nb_invoice - 24;
            $invoices = Invoice::where('is_payed',false)->where('id','>',$nb)->orderBy("id" , "desc")->paginate(3);
        }
        else{
            $invoices = Invoice::where('is_payed',false)->orderBy("id" , "desc")->paginate(3);
        }

        $count=count($invoices);
        if($count ==  1){
            $invoices = Invoice::first();
        }
        return view('admin.payment.show',compact("invoices","count"));
       
    }

    public function recu(){
        return view('admin.recu');
    }


    public function create_payment(Request $request)
    {
        $invoice=Invoice::where('id',$request->invoice_id)->first();
        if($invoice != null){
            return view('admin.payment.create',compact('invoice'));
        }
       
    }

    public function pay_invoice(Request $request){
        $user = auth()->user();
        Payment::create([  
            'amount' =>$request->amount,
            'note' =>$request->note,
            'type' =>$request->type,
            'code' =>$request->code,
            'invoice_id' =>$request->invoice_id,
            'user_id' =>$user->id,
        ]);

        Invoice::where('code',$request->code)
        ->update([  
            'is_payed' =>true,
        ]);
        return redirect()->route('beging_payment');
    }


    public function payment_view(){
        $payments = Payment::orderBy("id" , "desc")->paginate(4);
        $count = count($payments);
        $payments = Payment::where("id",1)->paginate(4);
        dd($payments->invoice->first_name);
        return view('admin.payment.seen',compact("payments",'count'));
    }

    public function get_payment(){
        $nb_payment = Payment::all()->count();
        if($nb_payment > 24){
            $nb =  $nb_payment - 24;
            $payments= Payment::where('id','>',$nb)->orderBy("id" , "desc")->paginate(3);
        }
        else{
            $payments = Payment::where('id','>=',1)->orderBy("id" , "desc")->paginate(3);
        }

        $count=count($payments);
        return view('admin.payment.payed',compact("payments","count"));

    }

    public function get_invoice_data($invoice_id){
        $invoice = Invoice::find($invoice_id);
        $html = "";
        $html = "".'
        <div class="row "> 
                <div class=" col-xl-4 col-lg-4  mt-2">
                    <div class="container border">
                        <div class="card row alert alert-dark text-uppercase gras text-italic"> 
                            Données du client
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Nom<span class="etoille">*</span></label>
                            <input type="text" name="first_name" readonlyd class="form-control text-gras"  value="'.$invoice->first_name.'" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Prenom<span class="etoille">*</span></label>
                            <input type="text" name="last_name" readonlyd class="form-control text-gras"  value="'.$invoice->last_name.'"  readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Telephone<span class="etoille">*</span></label>
                            <input type="number" name="phone" readonlyd class="form-control text-gras" id="exampleFormControlInput1" value="'.$invoice->phone.'" readonly>
                        </div>
                    </div>
                </div>

                <div class=" col-xl-4 col-lg-4  mt-2">
                    <div class="container border">
                        <div class="card row alert alert-dark  text-uppercase gras text-italic "> 
                            DONNEE DU PC
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Marque</label>
                            <input type="text" name="pc_mark" readonlyd class="form-control text-gras" id="exampleFormControlInput1" value="'.$invoice->pc_mark.'"  readonly>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Disque</label>
                                    <input type="hidden" value="{{$invoice->code}}"name="invoice_code">
                                    <input type="text" name="pc_disk" readonlyd class="form-control text-gras" id="exampleFormControlInput1" value="'.$invoice->pc_disk.'" readonly>
                                </div>
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">RAM</label>
                                    <input type="text" name="pc_rame" readonlyd class="form-control text-gras" id="exampleFormControlInput1" value="'.$invoice->pc_rame.'" readonly >
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Montant<span class="etoille">*</span></label>
                            <input type="number" name="amount" readonlyd class="form-control text-gras" id="exampleFormControlInput2" value="'.$invoice->amount.'"  readonly>
                        </div>
                    </div>
            </div>
            <div class="col-xl-4 col-lg-4 mt-2">
                <div class="container border">
                    <div class="card row alert alert-dark  text-uppercase gras text-italic"> 
                        Commentaire
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Ajouter un commentaire</label>
                        <textarea type="text" class="form-control text-gras" name="problem" id="exampleFormControlTextarea1"  value="'.$invoice->problem.'" rows="3" readonly></textarea>
                    </div>
                </div>
            </div>
    
        </div>';
         return $html;
    }

    public function get_payment_data($payment_id){
        $payment = Payment::find($payment_id);
        $html = "";
        $html = "".'
        <div class="row "> 
                <div class=" col-xl-4 col-lg-4  mt-2">
                    <div class="container border">
                        <div class="card row alert alert-dark text-uppercase gras text-italic"> 
                            Données du client
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-gras">Agent</label>
                            <input type="text" name="first_name" readonlyd class="form-control"  value="'.$payment->invoice->user->first_name.'-'.$payment->invoice->user->last_name.'" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-gras">client</label>
                            <input type="text" name="last_name" readonlyd class="form-control"  value="'.$payment->invoice->first_name.'-'.$payment->invoice->last_name.'"  readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label  text-gras">Telephone(client)</label>
                            <input type="number" name="phone" readonlyd class="form-control " id="exampleFormControlInput1" value="'.$payment->invoice->phone.'" readonly>
                        </div>
                    </div>
                </div>

                <div class=" col-xl-4 col-lg-4  mt-2">
                    <div class="container border">
                        <div class="card row  alert alert-dark  text-uppercase gras text-italic "> 
                            DONNEE DU PC
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label  text-gras">Marque</label>
                            <input type="text" name="pc_mark" readonlyd class="form-control " id="exampleFormControlInput1" value="'.$payment->invoice->pc_mark.'"  readonly>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label  text-gras">Disque</label>
                                    <input type="hidden" value="{{$invoice->code}}"name="invoice_code">
                                    <input type="text" name="pc_disk" readonlyd class="form-control" id="exampleFormControlInput1" value="'.$payment->invoice->pc_disk.'" readonly>
                                </div>
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label  text-gras">RAM</label>
                                    <input type="text" name="pc_rame" readonlyd class="form-control" id="exampleFormControlInput1" value="'.$payment->invoice->pc_rame.'" readonly >
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label  text-gras">Montant(Fcfa)</label>
                            <input type="number" name="amount" readonlyd class="form-control " id="exampleFormControlInput2" value="'.$payment->invoice->amount.'"  readonly>
                        </div>
                    </div>
            </div>
            <div class="col-xl-4 col-lg-4 mt-2">
                <div class="container border">
                    <div class="card row alert alert-dark  text-uppercase gras text-italic"> 
                        Commentaire
                    </div>
                    <div class="mb-2">
                        <label for="input1" class="text-gras">Probème</label>
                        <input type="text" class="form-control " name="problem" id="input1"  value="'.$payment->invoice->problem.'"  readonly></input>
                    </div>
                    <div class="mb-2">
                        <label for="input2" class="text-gras">Note paiement</label>
                        <input type="text" class="form-control " name="problem" id="input2"  value="'.$payment->note.'"  readonly></input>
                    </div>
                    <div class="mb-2">
                        <label for="input3" class="form-label  ">Versement(Fcfa)</label>
                        <input type="number" name="amount" readonly class="form-control text-gras" id="input3" value="'.$payment->amount.'"  readonly>
                    </div>
                </div>
            </div>
    
        </div>';
         return $html;
    }

    public function get_update_form(Request $request){
        $payment = Payment::find($request->payment_id);
        return view('admin.payment.update',compact("payment"));
    }

    
    public function payment_update_save(Request $request){
        $user = auth()->user();
        Payment::where('id',$request->payment_id)->update([  
            'amount' =>$request->amount,
            'note' =>$request->note,
            'type' =>$request->type,
            'user_id' =>$user->id,
        ]);
        return redirect()->route('get_payment');
    }

    public function get_a_payment(Request $request)
    {
        $payments = Payment::where('code',$request->code)->first();
        $count=0;
        if($payments != null){
            $count=1;
            return view('admin.payment.payed',compact("payments","count"));
        }
        else{
            return back()->with('data_not_fount_error','Facture introuvable,verifier le numero matricule');
        }
       
    }

    public function get_a_invoice(Request $request)
    {
        $invoices = Invoice::where('code',$request->code)->first();
        $count=0;
        if($invoices != null){
            $count=1;
            return view('admin.payment.payed',compact("invoices","count"));
        }
        else{
            return back()->with('data_not_fount_error','Facture introuvable');
        }
       
    }

    public function search_payment_form()
    {
       return view('admin.payment.search');
    }

    public function search_a_payment(Request $request){
        $payments = Payment::where('code',$request->invoice_code)->first();
        $count = 1;
       if($payments != null){
            return view('admin.payment.payed',compact('payments',"count"));
       }
       else{
            return back()->with('data_not_fount_error','payment introuvable,veuillez verifier le numero matricule');
       }
    }

    public function search_notpayed_invoice(request $request)
    {
        $invoices = Invoice::where('is_payed',false)->where('code',$request->invoice_code)->first();
        $count = 1;
        if($invoices ==null){
            return back()->with('data_not_fount_error','Facture  introuvable,veuillez verifier le code de la facture');
        }
        else{
            return view('admin.payment.show',compact('invoices', 'count'));
        }
       
    }

}
