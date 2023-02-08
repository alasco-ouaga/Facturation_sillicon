<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edupay</title>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/select.css') }}" rel="stylesheet">

</head>

@extends('layouts.app')

@section('content')
<div class="container principal">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">S'inscire</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-6">
                               
                            
                                <label class="form-label ecart-input" for="form3Example1cg">Nom</label>
                                <input id="name" type="text" class="form-control " name="u_firstname" value="{{ old('u_firstname') }}" required autocomplete="u_firstname" >

                                <label class="form-label  ecart-input" for="form3Example1cg">Prenom</label>
                                <input id="name" type="text" class="form-control " name="u_lastname" value="{{ old('u_lastname') }}" required autocomplete="u_lastname">
                             
                                <label class="form-label ecart-input" for="form3Example1cg">  Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label ecart-input" for="form3Example1cg">Telephone</label>
                                <input id="name" type="number" class="form-control " name="u_phone" value="{{ old('u_phone') }}" required autocomplete="u_phone">
                                
                                <label class="form-label ecart-input" for="form3Example1cg">Mode passe</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                               

                                <label class="form-label ecart-input" for="password-confirm">Confirmer le mo de passe</label>
                                <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Echec de confirmation de mot de pass</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <P class="d-md"><HR SIZE="4">
                       <div class="row">
                                <div class="col-md-12 col-lg-6 col-xl-6 mb-3">
                                    <a class="btn btn-sd btn-google btn-outline btn-block" href="#">
                                            <img src=""> S'inscrire avec Google
                                    </a>
                                </div>

                                <div class="col-md-12 col-lg-6 col-xl-6">
                                        <button  type="submit" class="btn btn-success  btn-md btn-block ">
                                            <span class="next"> S'inscrire </span> 
                                        </button>
                                </div>
                      </div>   
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
