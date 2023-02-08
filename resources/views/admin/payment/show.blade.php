@extends('layouts.admin')
@section('content')
@if($count != 0)
  <div class="container size col-11 themarge card ">
    <div class="card row alert text-white header-color text-uppercase gras text-italic"> Effectuer un paiement</div>
    @if(session()->has('data_not_fount_error'))
        <div class="container ">
            <div class="container text-center alert alert-danger"> 
                <span class=""> {{session()->get('data_not_fount_error')}}</span> 
            </div>
        </div>
    @endif
    <form action="{{ route('search_notpayed_invoice') }}" method="POST">
            @csrf
                  <div class="container  mb-3">
                        <div class="row"> 
                              <div class="col-9">
                                    <input type="text" name="invoice_code" required class="form-control "  placeholder="code de la facture">
                              </div>  
                              <div class="col-3 ">
                                    <button type="submit" class="btn btn-secondary btn-sm btn-block text-gras"> search </button>
                              </div>
                        </div>
                  </div>
      </form>

    @if($count > 1)
    <div class="container mb-3">
        <div ></div>
        <table class="table table-bordered table-striped table-responsive-sm table-responsive-md">

            <thead>
                <tr>
                    <th scope="col" class="text-gras ">Client </th>
                    <th scope="col" class="text-gras ">Code </th>
                    <th scope="col" class="text-gras ">Montant </th>
                    <th scope="col" class="text-gras ">Paiement</th>
                    <th scope="col" class="text-gras ">Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                        <tr>
                            <td>
                                {{ $invoice->first_name  }} {{ $invoice->last_name  }}
                            </td>
                            <td>
                                {{ $invoice->code  }}
                            </td>
                            <td>
                                {{ $invoice->amount  }} FCFA
                            </td>
                            <td>
                                <form action="{{route('create_payment')}}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="invoice_id" value="{{$invoice->id}}" >
                                    <button class="btn btn-primary"> Payer </button>
                                </form>
                            </td>
                            <td >
                                    <input type="hidden" class="invoice" value="{{$invoice->id}}" id="{{$invoice->id}}">
                                   <button class="btn btn-success view-all-data"  data-bs-toggle="modal" data-bs-target="#SeenModal">voir</button> 
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
        {{ $invoices->links()}}
    </div>
    @endif

    @if($count == 1)
    ddddddddddd
    @php
      dd($count);
    @endphp
    <div class="container mb-3">
        <div ></div>
        <table class="table table-bordered table-striped table-responsive-sm table-responsive-md">

            <thead>
                <tr>
                    <th scope="col" class="text-gras ">Client </th>
                    <th scope="col" class="text-gras ">Code </th>
                    <th scope="col" class="text-gras ">Montant </th>
                    <th scope="col" class="text-gras ">Paiement</th>
                    <th scope="col" class="text-gras ">Details</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>
                            {{ $invoices->first_name  }} {{ $invoices->last_name  }}
                        </td>
                        <td>
                            {{ $invoices->code  }}
                        </td>
                        <td>
                            {{ $invoices->amount  }} FCFA
                        </td>
                        <td>
                            <form action="{{route('create_payment')}}" method="POST" >
                                @csrf
                                <input type="hidden" name="invoice_id" value="{{$invoices->id}}" >
                                <button class="btn btn-primary"> Payer </button>
                            </form>
                        </td>
                        <td >
                                <input type="hidden" class="invoice" value="{{$invoices->id}}" id="{{$invoices->id}}">
                                <button class="btn btn-success view-all-data"  data-bs-toggle="modal" data-bs-target="#SeenModal">voir</button> 
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
    @endif

    <div class="modal " id="SeenModal" tabindex="-1">
        <div class="modal-dialog modal-lg ">
            <div class="container modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase gras italic">Ajouter un numero </h5>
                </div>
                <div class="container modal-data-view hide mb-3">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary refresh" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
  </div>
  @endif
@endsection