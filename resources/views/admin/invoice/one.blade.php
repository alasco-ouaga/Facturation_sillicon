@extends('layouts.admin')
@section('content')
<body class="bodycolor">
    <div class="container size col-xl-10 col-lg-10 container-border  themarge card">
        <div class="card row  alert text-white header-color fixed-center text-uppercase gras text-italic">
            Modification de recu
        </div>
            <div class="row "> 
                <div class=" col-xl-4 col-lg-4  mt-2">
                    <div class="container border">

                        <div class="card row alert alert-dark text-uppercase gras text-italic"> 
                            Données du client
                        </div>

                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Nom<span class="etoille">*</span></label>
                            <input type="text" name="first_name" disabledd class="form-control text-gras"  value="{{$invoice->first_name}}" disabled>
                        </div>

                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Prenom<span class="etoille">*</span></label>
                            <input type="text" name="last_name" disabledd class="form-control text-gras"  value="{{$invoice->last_name}}"  disabled>
                        </div>

                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Telephone<span class="etoille">*</span></label>
                            <input type="number" name="phone" disabledd class="form-control text-gras" id="exampleFormControlInput1" value="{{$invoice->phone}}" disabled>
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
                            <input type="text" name="pc_mark" disabledd class="form-control text-gras" id="exampleFormControlInput1" value="{{$invoice->pc_mark}}"  disabled>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Disque</label>
                                    <input type="hidden" value="{{$invoice->code}}"name="invoice_code">
                                    <input type="text" name="pc_disk" disabledd class="form-control text-gras" id="exampleFormControlInput1" value="{{$invoice->pc_disk}}" disabled>
                                </div>
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">RAM</label>
                                    <input type="text" name="pc_rame" disabledd class="form-control text-gras" id="exampleFormControlInput1" value="{{$invoice->pc_rame}}" disabled >
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Montant<span class="etoille">*</span></label>
                            <input type="number" name="amount" disabledd class="form-control text-gras" id="exampleFormControlInput2" value="{{$invoice->amount}}"  disabled>
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
                        <textarea type="text" class="form-control text-gras" name="problem" id="exampleFormControlTextarea1"  value="{{$invoice->problem}}" rows="3" disabled></textarea>
                    </div>
                </div>
            </div>
            <div class="container ">
                    <button class="btn btn-success float-right btn-md mt-1 mb-3 md-2 " onclick="javascript:printDiv('printablediv')">Imprimer </button>
            </div>
        </div>
    </div>

    <div class="container hide col-xl-10 col-lg-10 principal size card padding-bottom" >
      <div class="row formecolor r-marge " id="printablediv">
         <table class="table table-borderless  mt-3">
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
                    <div class="container  col-12 mt-4 mb-4">
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
                      <p class="gras rrg-marge text-uppercase mb-3">{{$company->name}} </p>
                  </div>
                 </td>
              </tr>
            </tbody>    
         </table>
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