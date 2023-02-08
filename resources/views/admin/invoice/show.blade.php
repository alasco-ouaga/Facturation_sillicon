@extends('layouts.admin')
@section('content')
<body >
<div class="container col-xl-8 principal size card " >
      <div class="row formecolor r-marge" id="printablediv">
         <table class="table table-borderless border mt-3">
            <tbody>
              <tr class="">
                  <td>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled ml-auto float-rights ">
                                  <li class="gras  mb-2 text-uppercase"> {{$company->name}} </li>
                                  <li class="mt-1">   {{$company->object}}  </li>
                                  <li class="mt-1">   {{$company->city}}   </li>
                                  <li class="mt-1">  {{$company->locality}}   </li>
                                  <li class="mt-1">  {{$company->email}}   </li>
                                  <li class="mt-1"> 
                                  @foreach($company->telephone as $telephone) 
                                    {{$telephone->phone}}
                                  @endforeach 
                                </li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled float-right ">
                                  <li class="gras mb-2 text-uppercase"> {{$company->country}} </li>
                                  <li class="mt-1"> {{$company->sigle}}  </li>
                                  <li class="mt-2"><span class="gras"> N Recu :</span> {{$invoice->code}}  </li>
                                  <li class="mt-1"><span class="gras"> Date : </span>{{$invoice->updated_at}} </li>
                            </ul>
                        </div>
                    </div>
                  </td>
              </tr>

              <tr>
                <td>
                <div class=" text-center gras text-underline">
                        <p class="text-uppercase">Recu d'enregistrement de maitenance chez sillicon vallet</p>
                  </div>
                </td>
                  
              </tr>

              <tr class="">
                  <td>
                    <div class="container col-12 mt-4 mb-4">
                        <div class="row border rall-marge">
                            <div class="col-6">
                                <ul class="list-unstyled ml-auto ">
                                      <li class="mt-1 text-uppercase gras underline">Agent   </li>
                                      <li class="mt-1"> <span class="gras"> Nom : </span>  {{$invoice->user->first_name}}  </li>
                                      <li class="mt-1"> <span class="gras"> Prenom :</span> {{$invoice->user->last_name}}    </li>
                                      <li class="mt-1"> <span class="gras"> Telephone :</span> {{$invoice->user->phone}}    </li>
                                      
                                </ul>
                            </div>
                            
                            <div class="col-6">
                                <ul class="list-unstyled ml-auto float-right ">
                                      <li class="mt-1 text-uppercase gras underline">Client   </li>
                                      <li class="mt-1"> <span class="gras"> Nom :</span> {{$invoice->first_name}}   </li>
                                      <li class="mt-1"> <span class="gras"> Prenom :</span> {{$invoice->last_name}}   </li>
                                      <li class="mt-1"> <span class="gras"> telephone :</span> {{$invoice->phone}}   </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                  </td>
              </tr>


              <tr >
                <td>
                    <div class="row mt-4">
                      <div class="col-9"> <span class="gras"> Marque  </span> </div> <hr>
                      <div class="col-3 float-right ml-auto"> {{$invoice->pc_mark}} </div>
                    </div>
                    <hr class="mt-0 mb-3">

                    <div class="row">
                      <div class="col-9"> <span class="gras"> Disque</span> </div> <hr>
                      <div class="col-3 float-right ml-auto"> {{$invoice->pc_disk}} </div>
                    </div>
                    <hr class="mt-0 mb-3">

                    <div class="row">
                      <div class="col-9"> <span class="gras"> RAM</span> </div> <hr>
                      <div class="col-3 float-right ml-auto"> {{$invoice->pc_rame}} </div>
                    </div>
                    <hr class="mt-0 mb-3">

                    <div class="row">
                      <div class="col-9"> <span class="gras"> Montant </span> </div> <hr>
                      <div class="col-3 float-right ml-auto"> {{$invoice->amount}} FCFA</div>
                    </div>
                    <hr class="mt-0 mb-3">

                </td>
              </tr>
              <tr>
                 <td>
                  <div class="float-right ml-auto mb-3">
                      <p class="gras rrg-marge text-uppercase">{{$company->name}} </p>
                  </div>
                 </td>
              </tr>

            </tbody>    
         </table>
      </div>

      <div class="container  ">
        <button class="btn btn-success float-right btn-md mt-1 mb-3 md-2 " onclick="javascript:printDiv('printablediv')">Imprimer </button>
      </div>
</div>

</body>

@endsection

<script>
  function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = 
          "<html><head><title></title></head><body>" + 
          divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;

    }
</script>
