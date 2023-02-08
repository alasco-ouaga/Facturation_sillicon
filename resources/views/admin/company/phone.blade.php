@extends('layouts.admin')
@section('content')
<div class="container col-xl-8 col-lg-8 border card ">
      <div class="card row alert text-white header-color text-uppercase gras text-italic">Telephones</div>
      <div class="container">
            <div class=" float-right ml-auto mb-3">
                <a  href="{{route('get_phone')}}"> <button class="btn btn-success "> Actualiser</button> </a>
                <button class=" btn btn-success new-phone" data-bs-toggle="modal" data-bs-target="#addModal">Nouveau</button>
            </div>
            <div class="">
                  <table class="table table-bordered table-striped table-responsive-md">
                        <tbody>
                        @foreach($phones as $phone)
                              <tr>
                                    <td class="gras">
                                    N°{{$phone->id}}
                                    </td>
                                    <td>
                                          {{$phone->phone}}
                                    </td>
                                    <td>
                                          <input type="hidden" class="phone" id="{{$phone->id}}" value="{{$phone->id}}">
                                          <button type="submit" class="btn btn-success btn-md mb-3 float-right update-phone" data-bs-toggle="modal" data-bs-target="#updateModal">Modifier</button>
                                    </td>
                                    <td >
                                          <input type="hidden" class="phone" id="{{$phone->id}}" value="{{$phone->id}}">
                                          <button type="submit" class="btn btn-danger btn-md mb-3 float-right delete-phone " data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</button>
                                    </td>
                              </tr>
                              @endforeach
                        </tbody>
                  </table>
            </div>
      </div>
</div>

<div class="modal" id="updateModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="container modal-content">
                <div class="modal-header">
                    <h5 class="modal-title italic text-uppercase gras "> Zone de modification</h5>
                </div>
                <div class="container modal-update-body  mt-2 mb-2">
                    
                </div>
                <div class="container modal-update-errore hide mt-2">
                    <div class="container  text-tnr text-center alert alert-danger">
                        <span class="text-red gras"> veuillez saisir un numero </span>
                    </div>
                </div>
                <div class="container modal-length-error hide mt-2 ">
                    <div class="container text-tnr text-center alert alert-danger">
                        <span class="text-red">Erreur : Taille non respecée (saisir 8 chiffrest)</span>
                    </div>
                </div>
                <div class="container modal-update-message">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary save_update_number btn-valider">Valider</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title italic text-uppercase gras red">zone de suppression </h5>
                </div>
                <div class="container col-11 modal-delete-body size mt-2 mb-2 gras">
                    Attention!!! <br>
                   Numero en cours de suppression. <br>
                    <span class="text-italic gras size text-red"> 
                        une recuperationn n'est plus possible <br>
                    </span>
                </div>
                <div class="modal-identifier"> 

                </div>
                <div class="container modal-delete-message col-11 mt-2 mb-2">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-danger confirm-delete-phone">Confirmer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="container modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase gras italic">Ajouter un numero </h5>
                </div>
                <div class="container  modal-create-body mt-2 mb-2">
                    <input type="number"  class="form-control " placeholder="75455370" name="" id="phone" require>
                </div>

                <div class="container modal-create-error hide mt-2">
                    <div class="container text-tnr  text-center alert alert-danger">
                        <span class="text-red ">veuillez saisir un numero </span>
                    </div>
                </div>

                <div class="container modal-length-error hide mt-2">
                    <div class="container time-new-rooman text-center alert alert-danger">
                        <span class="red">Erreur : Taille non respecée (saisir 8 chiffres) </span>
                    </div>
                </div>

                <div class="container text-center modal-create-message hide">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary refresh" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-success save-phone btn-valider">Valider</button>
                </div>
            </div>
        </div>
    </div>

@endsection
