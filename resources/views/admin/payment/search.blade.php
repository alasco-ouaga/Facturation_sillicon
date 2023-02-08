@extends('layouts.admin')
@section('content')
  <div class="container size col-md-12 col-xl-11 col-lg-11 themarge card">

      <div class="card row alert text-white header-color text-uppercase gras text-italic"> 
            Effectuer une recherche
      </div>
      @if(session()->has('data_not_fount_error'))
      <div class="container ">
            <div class="container text-center alert alert-danger "> 
                  <span class=""> {{session()->get('data_not_fount_error')}}</span> 
            </div>
      </div>
      @endif
      <form action="{{ route('search_a_payment') }}" method="POST">
            @csrf
                  <div class="container  mb-3">
                        <div class="row"> 
                              <div class="col-9">
                                    <input type="text" name="invoice_code" required class="form-control text-gras"  placeholder="code de la facture">
                              </div>  
                              <div class="col-3 ">
                                    <button type="submit" class="btn btn-secondary btn-sm btn-block text-gras"> search </button>
                              </div>
                        </div>
                  </div>
      </form>
 </div>
 @endsection