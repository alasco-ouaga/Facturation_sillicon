@include('layouts.insert-css')
<div classe="container">
            @php
                        $structure = Session::get('structure');
                        $student = Session::get('student');
                        $tab_selection= Session::get('choice');
                        $data_email =  Session::get('list');
                        $total=0;
                        $the_rest = Session::get('the_rest');
                        $data = $data_email[0];

                        $countpayment=session::get('countpayment');
                        $table_of_slice=session::get('rest_of_slice_topaied');
                        $the_rest_of_slice= session::get('number_of_slice_rest');
                        $rest_of_paied=session::get('rest_to_paied');           
                        $total_of_slice=session::get('total_of_slice');   
            @endphp
            <div class=""   style="font-weight: bold;font-size:25px;" > Recepissé de paiement   </div>
             <p class="mt-5">N. recipissé : <span  style="font-weight: bold;margin-top:15px;" > {{$data->code_of_receipt}} </span> </p>
            <div class="container" >
                  La structure <span  style="font-weight: bold;" >  {{ $data->structure->name }} (code : {{ $data->structure->code_of_structure }})</span> atteste que l'eleve <span  style="font-weight: bold;" >  {{ $data->student->first_name }} {{ $data->student->last_name }} </span> 
                  dans la classe de  <span  style="font-weight: bold;" >  {{ $data->student->classe->name }}</span> 
                  dont le numero matricule est  <span  style="font-weight: bold;" >  {{ $data->student->matricule }}  </span>    vient de payer sa scolarité par l' intermdediaire de 
                  son parent dont le numero du CNIB est : <span  style="font-weight: bold;" >  {{ $data->cenib_number}}  </span>  
            </div>

                @foreach($data_email as $list_of_data)
                        <div class="row " >
                                <div class="col-8 taille_tableau_2">
                                        <p> Tranche  {{$list_of_data->payment_slice}}  <span  style="font-weight: bold;" > : {{$list_of_data->amount}} Fcfa </span></p>
                                </div>
                        </div>
                        @php
                             $total+=$list_of_data->amount;
                        @endphp
                @endforeach

                <div class="row " style="border: 10px;" >
                     <p> Le total de votre paiement pour cette operation est de  : <span  style="font-weight: bold;" >  {{$total}} FCFA </span></p>
                </div>
                <hr>

                @if($the_rest_of_slice != 0)
                        <p>Le restant à payer : {{$rest_of_paied}} Fcfa</p>
                        @for($i=$countpayment+1 ; $i<=$total_of_slice;$i++)
                                <div class="row " style="border: 10px;" >
                                      <p> <span  style="font-weight: bold;" > Tranche {{$i}} : {{$table_of_slice[$i]}} FCFA </span></p>
                                </div>
                        @endfor
                @else
                      <div class="row  alert alert-success" style="border: 10px;" >
                             <p> Felicitation vous avez fini d'effectuer tout votre paiement</span></p>
                     </div>
                @endif
</div>
