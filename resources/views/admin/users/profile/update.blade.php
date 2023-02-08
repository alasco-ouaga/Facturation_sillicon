@extends('layouts.admin')
@section('content')
<body class="">
    <div class="container col-xl-8 col-lg-8 col-md-6  principal " >
        <div class="card container  border img-div py-3">
                  <div class="row img-div-manage">
                        
                        <div class="col-xl-4 col-lg-6 col-md-12 ">
                              <form action="{{route('save_user_image')}}" method="POST" enctype="multipart/form-data">
                              @csrf
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
                                    <div class="container">
                                          <div class="container py-3">
                                                      <div class="row btn-marging">
                                                                  <label for="file_uploade_input"  class="btn btn-success btn-selected btn-block">Changer de photo</label>
                                                      </div>
                                                      <div class="row btn-marging">
                                                                  <button class="btn btn-success btn-md mb-2 hide btn-save btn-block" type="submit"> Enregistrer </button>
                                                      </div>
                                          </div>
                                          <input  type="file" class="image-manage" id="file_uploade_input" name="image" hidden>
                                          <input  type="hidden" name="img_old_name"  value="{{$user->img_name}}" hidden>
                                    </div>
                              </form>
                        </div>
                      
                        <div class="col-xl-7 col-lg-7 img-div margin-lr mb-3">
                              <form method="post" action="{{route('save_user_update_data')}}" enctype="multipart/form-data">
                              @csrf
                                          <div class="row mb-3">
                                                <div class="col-12">
                                                <label for="first_name"> Nom</label>
                                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                                <input id="first_name" type="text" class="form-control form-control-lg italic gras" name="first_name" value="{{$user->first_name}}" required>
                                                </div>
                                          </div>

                                          <div class="row mb-3">
                                                <div class="col-12">
                                                <label for=""> Prenom</label>
                                                <input id="last_name" type="text" class="form-control form-control-lg italic gras" name="last_name" value="{{$user->last_name}}" required >
                                                </div>
                                          </div>

                                          <div class="row mb-3">
                                                <div class="col-12">
                                                <label for=""> Telephone</label>
                                                <input id="phone" id="phone" type="tel" class="form-control form-control-lg italic gras" name="phone" value="{{ $user->phone }}" required>
                                                </div>
                                          </div>

                                          <div class="row mb-3">
                                                <div class="col-12">
                                                <label for=""> Email</label>
                                                <input id="email" type="email" class="form-control form-control-lg italic gras" name="email" value="{{ $user->email }}" required >
                                                </div>
                                          </div>
                         </div>
                  </div>
                  <hr >
                  <div class="container">
                        <button type="submit" class="btn btn-md btn-success float-right mb-3 get-write"> Enregistrer</button>
                  </div>
                  </form>
            </div>
    </div>
</body>
@endsection
