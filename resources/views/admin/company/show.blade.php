@extends('layouts.admin')
@section('content')
<div class="container col-xl-8 col-lg-8 border card ">
      <div class="card row alert text-white header-color text-uppercase gras text-italic">Information sur mon établissement</div>
      <div class="container">
      <div class="row float-right">
            <a href="{{route('go_to_update')}}" class="nav-linb btn btn-sucess"> <button class=" btn btn-success">Modifier</button>  </a>
      </div>
      <table class="table table-bordered table-striped ">
            <tbody>
                  <tr>
                        <td class="gras">
                            Nom
                        </td>
                        <td>
                              {{$company->name}}
                        </td>
                  </tr>

                  <tr>
                        <td class="gras">
                            Pays
                        </td>
                        <td>
                              {{$company->country}}
                        </td>
                  </tr>

                  <tr>
                        <td class="gras">
                            Ville
                        </td>
                        <td>
                              {{$company->city}}
                        </td>
                  </tr>

                  <tr>
                        <td class="gras">
                            Localité
                        </td>
                        <td>
                              {{$company->locality}}
                        </td>
                  </tr>

                  <tr>
                        <td class="gras">
                            Localité details
                        </td>
                        <td>
                              {{$company->info_locality}}
                        </td>
                  </tr>

                  <tr>
                        <td class="gras">
                          gps
                        </td>
                        <td>
                              {{$company->gps}}
                        </td>
                  </tr>

                  <tr>
                        <td class="gras">
                          mail
                        </td>
                        <td>
                              {{$company->email}}
                        </td>
                  </tr>

                  <tr>
                        <td class="gras">
                            Objectif
                        </td>
                        <td>
                              {{$company->object}}
                        </td>
                  </tr>

            </tbody>
        </table>
      </div>
</div>

@endsection
