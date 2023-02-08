
@extends('layouts.admin')
@include('layouts.insert-css')
@section('content')
<div class="container col-md-12 col-xl-8 principal size c-marge">
      <div class="row formecolor  themarge ">

         <table class="table table-borderless">
            <tbody>
              <tr class="">
                  <td>
                    <div class="row">
                        <div class="col-5">
                            <ul class="list-unstyled ml-auto ">
                                  <li class="gras sillicon-color sillicon-size mb-2">   SILLICON VALLET </li>
                                  <li class="mt-1"> <span class="gras"> Specialité :</span>  Maintenance informatique  </li>
                                  <li class="mt-1"> <span class="gras"> Lieu :</span> Ouagadougou   </li>
                                  <li class="mt-1"> <span class="gras"> Precision :</span> Secteur 10 (Sissin)   </li>
                                  <li class="mt-1"> <span class="gras"> Num :</span> 75869652 / 70932325 / 797545823 </li>
                            </ul>
                        </div>
                        <div class="col-3 text-center">
                              <img src="{{ asset('storage/images/user_profile/avatar.jpg') }}" alt="Generic placeholder image" class=" img-fluid" style="width: 110px;height:110px; border-radius: 10px;">
                        </div>
                        <div class="col-4">
                            <ul class="list-unstyled ml-auto float-right ">
                                  <li class="gras mb-2">BURKINA FASO </li>
                                  <li class="mt-1">Unité-Progrès-justice  </li>
                                  <li class="mt-3"><span class="gras"> N Recu :</span> SV-11001202  </li>
                                  <li class="mt-1"><span class="gras"> Date : </span>26-03-2022 : 11h : 45mn </li>
                            </ul>
                        </div>
                    </div>
                  </td>
              </tr>

              <tr class="">
                  <td>
                    <div class="container col-12 mt-4">
                    <div class="row border rall-marge">
                        <div class="col-2">
                            <ul class="list-unstyled">
                                  <li class="gras agent-size"> AGENT </li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul class="list-unstyled ml-auto ">
                                  <li class="mt-1"> <span class="gras"> Nom :</span>  Ilboudo  </li>
                                  <li class="mt-1"> <span class="gras"> Prenom :</span> alassane   </li>
                                  <li class="mt-1"> <span class="gras"> Telephone :</span> 75455230   </li>
                                  
                            </ul>
                        </div>
                        <div class="col-2">
                            <ul class="list-unstyled">
                                  <li class="gras agent-size">CLIENT </li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul class="list-unstyled ml-auto ">
                                  <li class="mt-1"> <span class="gras"> Nom :</span>  Ilboudo  </li>
                                  <li class="mt-1"> <span class="gras"> Prenom :</span> alassane   </li>
                                  <li class="mt-1"> <span class="gras"> telephone :</span> 75455230   </li>
                                  
                            </ul>
                        </div>
                    </div>
                    </div>
                  </td>
              </tr>


              <tr>
                <td>
                    <div class="row">
                      <div class="col-9"> <span class="gras"> Marque du pc </span> </div> <hr>
                      <div class="col-3 float-right ml-auto"> Lenovo </div>
                    </div>
                    <hr class="mt-0 mb-2">

                    <div class="row">
                      <div class="col-9"> <span class="gras"> capacité du disque</span> </div> <hr>
                      <div class="col-3 float-right ml-auto"> 500Go </div>
                    </div>
                    <hr class="mt-0 mb-2">

                    <div class="row">
                      <div class="col-9"> <span class="gras"> capacité du RAM</span> </div> <hr>
                      <div class="col-3 float-right ml-auto"> 8Go </div>
                    </div>
                    <hr class="mt-0 mb-2">

                </td>
              </tr>

              <tr>
                 <td>
                      <div class="row r-marge">
                            <ul class="list-unstyled ml-auto float-right">
                                  <li class="mt-3"><span class="gras"> Cout total de la maintenance :</span> 125000 FCFA  </li>
                            </ul>
                      </div>
                      <hr class="mt-0 mb-2">
                 </td>
              </tr>

              <tr>
                 <td>
                      <div class="row r-marge">
                          <p class="gras rall-marge">
                              SILLICON VALLET 
                          </p>
                          <p class="border rall-marge ">
                            Atteste que le problème enregistré est  : <br>
                            <span class="">
                                Poblème de disque dure et de d'ecrants suivi d'une installation de windows 10,office et d'antivirus
                            </span>
                          </p>
                      </div>
                      
                 </td>
              </tr>

            </tbody>    
         </table>

         <div class="row r-marge ml-auto">
            <button class="btn btn-success btn-md mt-2 md-2 "> telecharger </button>
      </div>

      </div>
</div>
@endsection