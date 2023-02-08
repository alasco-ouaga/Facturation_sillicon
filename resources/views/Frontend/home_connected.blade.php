@extends('layouts.app')
@section('content')
<div class="container col-xl-10 col-lg-10 principal  formecolor forme-contour">
    <div class="row message" >
        <div class="col-md-12 col-lg-6 col-xl-6">
            <div class="" style="margin-top: 5px;"> 
                <span class="taille_titre_1">
                    EDUPAY  : 
                </span>
                <span class="taille_titre_2">
                    plateforme de paiment numerique
                </span>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-6">
            @if(session()->has('verify_code_of_structure'))
                <div class="taille_titre_3"> 
                    <span class="">
                    {{session()->get('verify_code_of_structure')}} </br>
                    </span>
                </div>
            @endif
            @if(session()->has('verify_matricule_of_student'))
                <div class="taille_titre_3"> 
                    <span class="">
                    {{session()->get('verify_matricule_of_student')}} </br>
                    </span>
                </div>
            @endif
            @if(session()->has('correspondence-error'))
                <div class="taille_titre_3"> 
                    <span class="">
                    {{session()->get('correspondence-error')}} </br>
                    </span>
                </div>
            @endif
            @if(session()->has('academy-error'))
                <div class="taille_titre_3"> 
                    <span class="">
                    {{session()->get('academy-error')}} </br>
                    </span>
                </div>
            @endif
        </div>
    </div>

    <P class="d-md"><HR SIZE="8">

        <form action="" method="POST">

            <div class="row">
                <div class="col-md-12 col-lg-5 col-xl-6 ">
                    @csrf
                    <div class="forme-3 ">

                        <div class="mb-3">{{ old('u_phone') }}
                            <label for="exampleFormControlInput1" class="form-label">Code Etablissement <span class="etoille">*</span></label>
                            <input type="text" name="code_of_structure" required class="form-control" id="exampleFormControlInput1" value="{{Session::get('code_of_structure')}}">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Matricule <span class="etoille">*</span></label>
                            <input type="text" name="matricule" required class="form-control" id="exampleFormControlInput1" value="{{Session::get('matricule')}}">
                        </div>

                        <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" name="email" required class="form-control" id="exampleFormControlInput1" value="{{$connect->email}}">
                        </div>
                        
                    </div>
                </div>

                <div class="col-md-12 col-lg-5 col-xl-6 formecolor">
                    <div class="forme-3  formecolor">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">CNIB <span class="etoille">*</span></label>
                            <input type="text" name="cnib" required class="form-control" id="exampleFormControlInput1" value="{{$connect->cenib_number}}">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Telephone <span class="etoille">*</span></label>
                            <input type="number" name="phone" required class="form-control" id="exampleFormControlInput1"value="{{$connect->phone}}">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"> WhatSapp</label>
                            <input type="number" name="wathsapp" required class="form-control" id="exampleFormControlInput1" value="{{$connect->whatsapp_phone}}">
                        </div>

                        <button type="submit" class="btn btn-success pull-right  btn-sm  bouton-n-1">
                            <span class="suivant"> suivant </span> 
                        </button>

                    </div>
                </div>
            </div>

       </form>
  
</div>  
@endsection
