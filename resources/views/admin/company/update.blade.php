@extends('layouts.admin')
@section('content')
<div class="container col-xl-8 col-lg-8 border card ">
      <div class="card row alert text-white header-color text-uppercase gras text-italic">Information sur mon établissement</div>
      <div class="container">
        <form action="{{route('save_update_company')}}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                        <div class="col-xl-6 col-lg-6">
                                <label for="name" class="" >Nom <span class="text-red red">*</span></label>
                                <input type="text" class="form-control"  name="name" id="name" value="{{$company->name}}" required>

                                <label for="name" class="mt-2">Pays <span class="text-red red">*</span></label>
                                <input type="text" class="form-control" name="country" id="country" value="{{$company->country}}" required>

                                <label for="name" class="mt-2">Ville <span class="text-red red">*</span></label>
                                <input type="text" class="form-control" name="city" id="city" value="{{$company->city}}" required>

                                <label for="name" class="mt-2">Localité <span class="text-red red">*</span></label>
                                <input type="text" class="form-control" name="locality" id="locality" value=" {{$company->locality}}" required>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                                <label for="name" class="mt-2">Detail localité</label>
                                <input type="text" class="form-control" name="info_locality" id="info_locality" value=" {{$company->info_locality}}">

                                <label for="name" class="mt-2">Coordonnée gps </label>
                                <input type="text" class="form-control" name="gps" id="gps" value="{{$company->gps}} ">

                                <label for="name" class="mt-2">Email <span class="text-red red">*</span></label>
                                <input type="text" class="form-control" name="email" id="email" value="  {{$company->email}} " required>

                                <label for="name" class="mt-2" >Objet <span class="text-red red">*</span></label>
                                <input type="text" class="form-control" name="objet" id="objet" value=" {{$company->object}}" required>
                        </div>
                </div>
                <div class="container update-error hide alert alert-danger text-center" >
                          <p> les champs suivies de <span> * </span> sont obligatoires </p> 
                </div>
                <div class="float-right">
                        <button class="btn btn-success mb-3 click-verified"> Modifier </button>
                </div>
        </form>
      
</div>
@endsection
