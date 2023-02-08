@extends('layouts.admin')
@section('content')
  <div class="container size col-md-12 col-xl-11 col-lg-11 themarge card">

      <div class="card row alert text-white header-color text-uppercase gras text-italic"> 
            Effectuer une recherche
      </div>
      <form action="{{ route('search_invoice') }}" method="POST">
            @csrf
                  <div class="container  mb-3">
                        <div class="row"> 
                              <div class="col-9">
                                    <input type="text" name="invoice_code" required class="form-control "  placeholder="SV-02125420">
                              </div>  
                              <div class="col-3 ">
                                    <button type="submit" class="btn btn-secondary btn-sm btn-block text-gras"> search </button>
                              </div>
                        </div>
                  </div>
      </form>
 </div>
 @endsection