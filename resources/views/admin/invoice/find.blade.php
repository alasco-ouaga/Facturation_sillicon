@extends('layouts.admin')
@section('content')
@if($count >0 )
  <div class="container size col-md-12 col-xl-11 col-lg-11 themarge card">

  <div class="card row alert text-white header-color text-uppercase gras text-italic"> Liste des recus de paiement</div>

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
    <div class="container">
        @if(session()->has('data_not_fount_error'))
        <p>  <span class="alert alert-danger"> {{ession()-get('data_not_fount_error')}}</span> </p>
        @endif
    </div>
    @if($count > 1)
    <div class="container mb-2">
        <table class="table table-bordered table-striped table-responsive-md table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col" class="text-gras">Client </th>
                    <th scope="col" class="text-gras">Code </th>
                    <th scope="col" class="text-gras">Montant </th>
                    <th scope="col" class="text-gras">Modifier</th>
                    @can('invoice_delete_access')
                       <th scope="col">Supprimer</th> 
                    @endcan
                    <th scope="col" class="text-gras">plus</th>
                </tr>
            </thead>

            <tbody>
                @foreach($invoices as $invoice)
                        <tr>
                            <td>
                                {{ $invoice->first_name}} {{ $invoice->last_name  }}
                            </td>

                            <td>
                                {{ $invoice->code  }}
                            </td>
                           
                            <td>
                                {{ $invoice->amount  }} FCFA
                            </td>
                            <td>
                                <form action="{{route('view_update_invoice')}}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="invoice_id" value="{{$invoice->id}}" >
                                    <button class="btn btn-success"> modifier</button>
                                </form>
                            </td>

                            @can('invoice_delete_access')
                            <td>
                                <a href="#" class="btn btn-danger" onclick="if(confirm('Etes vous de supprimer ce recu ?'))
                                    {document.getElementById('form-{{$invoice->id}}').submit()}"> supprimer
                                </a>
                                <form action="{{route('delete_invoice')}}" id="form-{{$invoice->id}}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="invoice_id" value="{{$invoice->id}}" >
                                </form>
                            </td>
                            @endcan
                            <td>
                                <form action="{{route('view_invoice_info')}}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="invoice_id" value="{{$invoice->id}}" >
                                    <button class="btn btn-primary">voir</button>
                                </form>
                            </td>

                        </tr>
                @endforeach
            </tbody>
        </table>
    {{$invoices->links()}}  
    </div>
    @endif

    @if($count == 1)
    <div class="container mb-2">
        <table class="table table-bordered table-striped table-responsive-md table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col" class="text-gras">Client </th>
                    <th scope="col" class="text-gras">Code </th>
                    <th scope="col" class="text-gras">Montant </th>
                    <th scope="col" class="text-gras">Modifier</th>
                    @can('invoice_delete_access')
                       <th scope="col">Supprimer</th> 
                    @endcan
                    <th scope="col" class="text-gras">plus</th>
                </tr>
            </thead>

            <tbody>
                        <tr>
                            <td>
                                {{ $invoices->first_name}} {{ $invoices->last_name  }}
                            </td>

                            <td>
                                {{ $invoices->code  }}
                            </td>
                           
                            <td>
                                {{ $invoices->amount  }} FCFA
                            </td>
                            <td>
                                <form action="{{route('view_update_invoice')}}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="invoice_id" value="{{$invoices->id}}" >
                                    <button class="btn btn-success"> modifier</button>
                                </form>
                            </td>

                            @can('invoice_delete_access')
                            <td>
                                <a href="#" class="btn btn-danger" onclick="if(confirm('Etes vous de supprimer ce recu ?'))
                                    {document.getElementById('form-{{$invoices->id}}').submit()}"> supprimer
                                </a>
                                <form action="{{route('delete_invoice')}}" id="form-{{$invoices->id}}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="invoice_id" value="{{$invoices->id}}" >
                                </form>
                            </td>
                            @endcan
                            <td>
                                <form action="{{route('view_invoice_info')}}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="invoice_id" value="{{$invoices->id}}" >
                                    <button class="btn btn-primary">voir</button>
                                </form>
                            </td>
                        </tr>
            </tbody>
        </table>
    </div>
    @endif

  </div>
</body>
@endif


@endsection