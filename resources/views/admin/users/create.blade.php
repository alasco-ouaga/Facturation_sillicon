@extends('layouts.admin')
@section('content')
<body class="bodycolor">
    <div class="container size col-xl-9 col-lg-10  themarge card">
    <div class="card row alert text-white header-color text-uppercase gras text-italic"> créer un agent</div>
     
        @if (session()->has('success'))
        <div class="container alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        @if (session()->has('phone_error'))
        <div class="container alert alert-danger">
            {{ session()->get('phone_error') }}
        </div>
        @endif

        @if (session()->has('email_error'))
        <div class="container alert alert-danger">
            {{ session()->get('email_error') }}
        </div>
        @endif

        <div class="row mt-1"> 
            <div class="col-xl-6 col-lg-6 ">
                <form action="{{ route('save_users') }}" method="POST" >
                    @csrf

                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Nom<span class="etoille">*</span></label>
                        <input type="text" id="first_name" name="first_name"  value="{{ old('first_name') }}" required  class="form-control @error('first_name') is-invalid @enderror" placeholder="votre nom">
                    </div>

                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Prenom<span class="etoille">*</span></label>
                        <input type="text" id="last_name" name="last_name" required class="form-control"  value="{{ old('last_name') }}" placeholder="votre prenom">
                    </div>

            </div>

            <div class=" col-xl-6 col-lg-6 ">

                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Email <span class="etoille">*</span></label>
                        <input type="email" name="email" required class="form-control" id="exampleFormControlInput1" value="{{ old('email') }}" placeholder="example@gmail.com">
                    </div>

                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Telephone(whatsapp) <span class="etoille">*</span></label>
                        <input type="number" name="phone" id="phone" required class="form-control" id="exampleFormControlInput1" value="{{ old('phone') }}" placeholder="75455370">
                    </div>

            </div>
        </div>

        <div class="containner mt-2">
        @foreach($roles as $role)
           @if($administrateur == false && $role->name == 'administrateur')
          
           @else
           <div  class="row alert alert-success r-marge">
                <div class="col-10 ">
                    <div class="row  rr-marge">
                    {{$role->name }}
                    </div>
                </div>
                <div class="col-2 ">
                    <input class="form-check-input tailleinput"  name="choix_{{$role->id}}" type="checkbox"  value="{{$role->id}}">
                </div>
            </div>
            @endif
        @endforeach
        </div>
        <div class="row r-marge">
            <button class="text-center btn btn-success float-right ml-auto  mb-2" type="submit"> {{ trans('global.save') }}</button>
        </div>  
        </form>
    </div>
</body>
@endsection