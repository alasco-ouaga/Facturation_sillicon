@extends('layouts.admin')
@section('content')
<body class="bodycolor">
    <div class="container size col-xl-8 col-lg-8  themarge card">
        <div class="card row alert text-white header-color text-uppercase gras text-italic">Modification d'un agent</div>

        @if (session()->has('success'))
        <div class="row alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        @if (session()->has('is_phone_error'))
        <div class="row alert alert-danger">
            {{ session()->get('is_phone_error') }}
        </div>
        @endif

        <form action="{{ route('save_update_users') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach($roles as $role)
                    @php
                        $is_true = false;
                    @endphp

                    <!--  verifions si le users admet un role qui correspont au role que nous parcourons -->
                    @foreach($users->roles as $user_role)
                        @if($user_role->name == $role->name)
                        @php
                            $is_true = true;
                            break;
                        @endphp
                        @endif
                    @endforeach
                    <div  class="row alert alert-success  r-marge">
                        <div class="col-10 ">
                            <div class="row  rr-marge">
                            {{$role->name }}
                            </div>
                        </div>
                        <div class="col-2 ">
                            <input class="form-check-input tailleinput"  name="choix_{{$role->id}}"  type="checkbox"  value="{{$role->id}}"  @if($is_true == true) checked="checked" @endif >
                        </div>
                    </div>
            @endforeach
            <div class="row r-marge">
                    <input type="hidden" name="user_id" value="{{$user_id}}">
                    <input type="hidden" name="indice" value="{{$indice}}">
                    <button class="text-center btn btn-success float-right ml-auto mt-2 mb-2" type="submit"> {{ trans('global.save') }}</button>
            </div>  
        </form>
    </div>
</body>
@endsection