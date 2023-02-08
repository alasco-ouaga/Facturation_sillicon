@extends('layouts.admin')
@section('content')
@if($count != 0)
<div class="container size col-11 card ">
  <div class="card row alert text-white header-color text-uppercase gras text-italic">  liste des recus payés</div>
  @if(session()->has('data_not_fount_error'))
    <div class="container ">
        <div class="container text-center alert alert-danger"> 
             <span class=""> {{session()->get('data_not_fount_error')}}</span> 
        </div>
    </div>
 @endif
  <form action="{{ route('get_a_payment') }}" method="POST">
        @csrf
                <div class="container  mb-3">
                    <div class="row"> 
                            <div class="col-9">
                                <input type="text" name="code" required class="form-control  "  placeholder="SV-02125420">
                            </div>  
                            <div class="col-3 ">
                                <button type="submit" class="btn btn-secondary btn-sm btn-block text-gras  "> search </button>
                            </div>
                    </div>
                </div>
    </form>

    @if($count == 1)
    <div class="container  mb-3">
        <table class="table table-bordered table-striped table-responsive-md table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col" class="text-gras ">Client</th>
                    <th scope="col" class="text-gras ">Code </th>
                    <th scope="col" class="text-gras ">Montant</th>
                    <th scope="col" class="text-gras ">Modifier</th>
                    <th scope="col" class="text-gras ">Plus</th>
                </tr>
            </thead>
            <tbody>
                        <tr>
                            <td>
                                {{ $payments->invoice->first_name  }}-{{ $payments->invoice->last_name  }}
                            </td>
                            <td>
                                {{ $payments->code  }}
                            </td>
                            <td>
                                {{ $payments->invoice->amount  }} FCFA
                            </td>
                            <td >
                                <form action="{{route('get_update_form')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="payment_id" value="{{$payments->id}}" id="{{$payments->id}}">
                                    <button class="btn btn-primary "  >Modifier</button> 
                                </form>
                            </td>
                            <td >
                                    <input type="hidden" class="payment" value="{{$payments->id}}" id="{{$payments->id}}">
                                   <button class="btn btn-primary get-payment-data"  data-bs-toggle="modal" data-bs-target="#GetPaymentModal">voir</button> 
                            </td>
                           
                        </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if($count > 1)
    <div class="container  mb-3">
        <table class="table table-bordered table-striped table-responsive-md table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col" class="text-gras ">Client</th>
                    <th scope="col" class="text-gras ">Code </th>
                    <th scope="col" class="text-gras ">Montant</th>
                    <th scope="col" class="text-gras ">Modifier</th>
                    <th scope="col" class="text-gras ">Plus</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                        <tr>
                            <td>
                                {{ $payment->invoice->first_name  }}-{{ $payment->invoice->last_name  }}
                            </td>
                            <td>
                                {{ $payment->code  }}
                            </td>
                            <td>
                                {{ $payment->invoice->amount  }} FCFA
                            </td>
                            <td >
                                <form action="{{route('get_update_form')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="payment_id" value="{{$payment->id}}" id="{{$payment->id}}">
                                    <button class="btn btn-primary "  >Modifier </button> 
                                </form>
                            </td>
                            <td >
                                    <input type="hidden" class="payment" value="{{$payment->id}}" id="{{$payment->id}}">
                                   <button class="btn btn-primary get-payment-data"  data-bs-toggle="modal" data-bs-target="#GetPaymentModal">voir</button> 
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
        {{ $payments->links()}}
    </div>
    @endif
</div>

<div class="modal fade" id="GetPaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl ">
            <div class="container modal-content">
            
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase gras italic">Affichage de données </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container modal-data-view hide mb-3">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>



  @endif
@endsection