@extends('layouts.admin')
@section('content')
<body class="bodycolor">
    <div class="container size col-xl-10 col-lg-10 container-border  themarge card">
        <div class="card row  alert text-white header-color fixed-center text-uppercase gras text-italic">
            Modification de recu
        </div>
        <form action="{{ route('save_update_invoice') }}" method="POST" >
            @csrf
            <div class="row "> 
                <div class=" col-xl-4 col-lg-4  mt-2">
                    <div class="container border">

                        <div class="card row alert alert-dark text-uppercase gras text-italic"> 
                            Données du client
                        </div>

                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Nom<span class="etoille">*</span></label>
                            <input type="text" name="first_name" required class="form-control"  value="{{$invoice->first_name}}" require>
                        </div>

                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Prenom<span class="etoille">*</span></label>
                            <input type="text" name="last_name" required class="form-control"  value="{{$invoice->last_name}}"  require>
                        </div>

                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Telephone<span class="etoille">*</span></label>
                            <input type="number" name="phone" required class="form-control" id="exampleFormControlInput1" value="{{$invoice->phone}}" require>
                        </div>
                    </div>
                </div>

                <div class=" col-xl-4 col-lg-4  mt-2">
                    <div class="container border">
                        <div class="card row alert alert-dark  text-uppercase gras text-italic "> 
                            DONNEE DU PC
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Marque</label>
                            <input type="text" name="pc_mark" required class="form-control" id="exampleFormControlInput1" value="{{$invoice->pc_mark}}"  require>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Disque</label>
                                    <input type="hidden" value="{{$invoice->code}}"name="invoice_code">
                                    <input type="text" name="pc_disk" required class="form-control" id="exampleFormControlInput1" value="{{$invoice->pc_disk}}" require>
                                </div>
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">RAM</label>
                                    <input type="text" name="pc_rame" required class="form-control" id="exampleFormControlInput1" value="{{$invoice->pc_rame}}" require >
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label text-uppercase text-gras">Montant<span class="etoille">*</span></label>
                            <input type="number" name="amount" required class="form-control" id="exampleFormControlInput2" value="{{$invoice->amount}}"  require>
                        </div>
                    </div>
            </div>
            <div class="col-xl-4 col-lg-4 mt-2">
                <div class="container border">
                    <div class="card row alert alert-dark  text-uppercase gras text-italic"> 
                        Commentaire
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" > <span classs="text-gras text-uppercase">AJOUTER UN COMMENTAIRE</span> </label>
                        <textarea type="text" class="form-control" name="problem" id="exampleFormControlTextarea1"  value="{{$invoice->problem}}" rows="3" require></textarea>
                    </div>
                </div>
            </div>
            <div class="container ">
                <button class="text-center btn btn-success float-right  mt-3 mb-2" type="submit"> {{ trans('global.save') }}</button>
            </div>
        </div>
        </form>
    </div>
</body>
@endsection