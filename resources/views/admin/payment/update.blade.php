@extends('layouts.admin')
@section('content')
<div class="container  col-lg-10 col-xl-10 card principal form-contour">
        <div class="card row  alert text-white header-color fixed-center text-uppercase gras text-italic">
            processus de paiement
        </div>
        <form action="{{route('payment_update_save')}} " method="post" enctype="multipart/form-data">
                <div class="container">
                        @csrf
                        <div class="row">
                                <div class="container">
                                        <div class="container ">
                                                <label for="amount" class="form-label  text-uppercase ">somme versée</label>
                                                <input type="number" name="amount" class="form-control mb-3 text-gras text-italic" value="{{$payment->invoice->amount}}" required>
                                                <input type="hidden" name="payment_id" class="form-control mb-3 text-gras text-italic" value="{{$payment->id}}" >
                                                <input type="hidden" name="invoice_id" class="form-control mb-3 text-gras text-italic" value="{{$payment->invoice->id}}" >

                                                <label for="ControlSelect"  class="form-label  text-uppercase">Paiement</label>
                                                <select class="form-control text-gras border text-italic mb-3" name="type" id="ControlSelect">
                                                      @if($payment->type == "espèce" )
                                                            <option value="espèce" selected  class="text-gras">Espèce</option>
                                                            <option value="mobile" class="text-gras">Mobile</option>
                                                      @else
                                                            <option value="espèce"   class="text-gras">Espèce</option>
                                                            <option value="mobile" selected class="text-gras">Mobile</option>
                                                      @endif
                                                </select>

                                                <label for="exampleFormControlTextarea1" class="text-uppercase">commentaire</label>
                                                <input type="text" class="form-control text-gras" name="note" value="{{$payment->note}}" id="exampleFormControlTextarea1" ></input>
                                        </div>
                                </div>
                        </div>
                        <hr>
                        <div class="container">
                                <button class="btn btn-primary btn-md mb-3 mt-1  float-right mt-3" type="submit">confirmer </button>
                        </div>
                </div>
        </form>
</div>

@endsection