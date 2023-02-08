@extends('layouts.admin')
@section('content')
<body class="">
    <div class="container col-xl-8 col-lg-8 col-md-6  principal " >
        <div class="card container  text-center border img-div py-3">
                <form action="{{route('save_company_image')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row img-div-manage">
                                <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="mt-2" > 
                                        <figure id="image-manage " class="">
                                                @if($company->img_name == "avatar.png")
                                                        <img src="{{ asset('storage/user/avatar.png') }}" id="img" alt="" >
                                                @else
                                                        <img src="{{ asset($company->img_link) }}" id="img" alt="" >
                                                @endif
                                        </figure>
                                </div>
                                <div class="container image-manage display mt-2"> </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12">
                                        <div class="container py-3">
                                        <div class="row btn-marging">
                                                <label for="file_uploade_input"  class="btn btn-success btn-selected btn-block"> Ajouter</label>
                                        </div>
                                        <div class="row btn-marging">
                                                <button class="btn btn-success btn-md mb-2 hide btn-save btn-block" type="submit"> Enregistrer </button>
                                        </div>
                                        </div>
                                        <input  type="file" class="image-manage" id="file_uploade_input" name="image" hidden>
                                        <input  type="hidden" name="img_old_name"  value="{{$company->img_name}}" hidden>
                                </div>
                        </div>
                </form>
        </div>
    </div>
</body>
@endsection
