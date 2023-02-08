@extends('layouts.admin')
@section('content')
<div class="container  col-lg-10 col-xl-10 card principal form-contour">
        <div class="card row  alert text-white header-color fixed-center text-uppercase gras text-italic">
            processus de paiement
        </div>
        <form action="{{route('pay_invoice')}} " method="post" enctype="multipart/form-data">
                <div class="container">
                        @csrf
                        <div class="row">
                                <div class="container">
                                        <div class="container ">
                                                <label for="amount" class="form-label  text-uppercase ">somme versée</label>
                                                <input type="number" name="amount" class="form-control mb-3 text-gras text-italic" value="{{$invoice->amount}}" required>
                                                <input type="hidden" name="invoice_id" class="form-control mb-3 text-gras text-italic" value="{{$invoice->id}}" >

                                                <label for="ControlSelect"  class="form-label  text-uppercase">Paiement</label>
                                                <select class="form-control text-gras border text-italic mb-3" name="type" id="ControlSelect">
                                                        <option value="espèce" class="text-gras">Espèce</option>
                                                        <option value="mobile" class="text-gras">Mobile</option>
                                                </select>

                                                <label for="exampleFormControlTextarea1" class="text-uppercase">Note</label>
                                                <textarea type="text" class="form-control" name="note" id="exampleFormControlTextarea1" rows="4"></textarea>
                                        </div>
                                </div>
                        </div>
                        <hr>
                        <div class="container">
                                <button class="btn btn-primary btn-md mb-3 mt-1  float-right mt-3" type="submit"> valider </button>
                        </div>
                </div>
        </form>
</div>

@endsection