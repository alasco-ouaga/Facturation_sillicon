@extends('layouts.admin')
@section('content')
<body class="">
    <div class="container col-xl-8 col-lg-8 col-md-6  principal " >
        <div class="card container  border img-div py-3">
                  <div class="row img-div-manage">
                        
                        <div class="col-xl-4 col-lg-6 col-md-12 ">
                              <div class="container  mt-2 " > 
                                    <figure id="image-manage " class="">
                                                @if($user->img_name == "avatar.png")
                                                      <img src="{{ asset('storage/user/avatar.png') }}"  id="img" alt="" >
                                                      <caption ><span class="text-uppercase text-gras text-italic">{{$user->last_name}} {{$user->first_name}}</span></caption>
                                                @else
                                                      <img src="{{ asset($user->img_link) }}" id="img" alt="" >
                                                @endif
                                    </figure>
                              </div>
                              <div class="container image-manage display mt-2"> </div>
                        </div>
                      
                        <div class="col-xl-7 col-lg-7 img-div margin-lr mb-3">
                              <div class="row mb-3">
                                    <div class="col-12">
                                    <label for="first_name "  class="text-gras text-uppercase"> Nom</label>
                                    <p> <span class="text-uppercase text-italic"> {{$user->first_name}} </span> </p>
                                    <hr>
                                    </div>
                              </div>

                              <div class="row mb-3">
                                    <div class="col-12">
                                    <label for="" class="text-gras text-uppercase"> Prenom</label>
                                    <p> <span class="text-uppercase text-italic"> {{$user->last_name}} </span> </p>
                                    <hr>
                                    </div>
                              </div>

                              <div class="row mb-3">
                                    <div class="col-12">
                                    <label for="" class="text-gras text-uppercase"> Telephone</label>
                                    <p> <span class="text-uppercase text-italic"> {{ $user->phone }} </span> </p>
                                    <hr>
                                    </div>
                              </div>

                              <div class="row mb-3">
                                    <div class="col-12">
                                    <label for="" class="text-gras text-uppercase"> Email</label>
                                    <p> <span class="text-uppercase text-italic"> {{ $user->email }} </span> </p>
                                    <hr>
                                    </div>
                              </div>
                         </div>
                  </div>
                  <div class="container">
                        <a href="{{route('update_user_profil')}}" type="" class="btn btn-md btn-success float-right mb-3 get-write"> Modifier</a>
                  </div>
            </div>
    </div>
</body>
@endsection
