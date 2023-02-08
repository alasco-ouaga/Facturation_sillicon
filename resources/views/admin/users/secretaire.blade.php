@extends('layouts.admin')
@section('content')
<body>
  <div class="container size themarge card">
  <div class="card row alert text-white header-color text-uppercase gras text-italic"> Liste des agents</div>

        @if(Session()->has('error'))
        <div class="container  text-center alert alert-danger">
            {{ Session()->get('error') }}
        </div>
        @endif

        @if(Session()->has('blocked_success'))
        <div class="container text-uppercase text-center  alert alert-danger">
            {{ Session()->get('blocked_success') }}
        </div>
        @endif

        @if(Session()->has('authorize_success'))
        <div class="container text-uppercase text-center  alert alert-success">
            {{ Session()->get('authorize_success') }}
        </div>
        @endif

        @if(Session()->has('delete_success'))
        <div class="container text-center text-uppercase  alert alert-danger">
            {{ Session()->get('delete_success') }}
        </div>
        @endif

        <!-- comptage du nombre de donnée à afficher -->
        @php
            $nb_user=0;
        @endphp
        @foreach($users as $user)
            @php
                $agent = true;
                        foreach($user->roles as $role){
                            if($role->name == 'moderateur' || $role->name == 'administrateur'){
                                $agent = false;
                            }
                        }
            @endphp
                    
            @if($agent == true)
                    @php
                        $nb_user++;
                    @endphp
            @endif
        @endforeach
    <!-- fin comptage du nombre de donnée à afficher -->

    @if($nb_user !=0)
    <div class="caontianer card mb-4">
        <table class="table table-bordered table-striped table-responsive-md">
            <thead>
                <tr>
                    <th class="gras" scope="col">Nom </th>
                    <th class="gras" scope="col">prenom </th>
                    <th class="gras" scope="col">Roles</th>
                    <th class="gras" scope="col">Permission</th>
                    @can('update_users_access')
                        <th class="gras" scope="col">Modifier</th>
                    @endcan
                    <th class="gras" scope="col">bloquer/authoriser</th>
                    <th class="gras" scope="col">supprimeree</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    @php
                    $agent = true;
                            foreach($user->roles as $role){
                                if($role->name == 'moderateur' || $role->name == 'administrateur'){
                                    $agent = false;
                                }
                            }
                    @endphp
                            
                    @if($agent == true)
                            <tr>
                                <td>
                                    {{ $user->first_name }}
                                </td>
                                <td>
                                    {{ $user->last_name }} <br> 
                                </td>
                                <td>
                                    @foreach($user->roles as $role)
                                        <div class="row  text-uppercase text-italic r-marge">
                                        {{$role->name }}
                                        </div>
                                    @endforeach
                                </td>
                                <td>
                                    @if($user->is_permits == false)
                                       <p> <span class="text-gras text-italic border px-2 py-2 text-red"> Refuser </span></p>
                                    @else
                                        <p> <span class="text-gras text-italic border px-2 py-2" > Accorder </span></p>
                                    @endif
                                </td>
                                @can('update_users_access')
                                <td>
                                    <form action="{{route('update_users')}}" method="POST" >
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$user->id}}" >
                                        <input type="hidden" name="indice" value="2" >
                                        <button class="btn btn-success" > modifier </button>
                                    </form>
                                </td>
                                @endcan
                                <td>
                                    @if($user->is_permits == false)
                                        <button class="btn btn-success" onclick="if(confirm('Etes vous sur pour authoriser cet agent ?'))
                                                {document.getElementById('form-authorize-{{$user->id}}').submit()}" > autorisé  
                                        </button>
                                        <form action="{{route('authorize_users')}}" id="form-authorize-{{$user->id}}" method="POST" >
                                            @csrf
                                            <input type="hidden" name="indice" value="2" >
                                            <input type="hidden" name="user_id" value="{{$user->id}}" >
                                        </form>
                                    @endif
                                    @if($user->is_permits == true)
                                        <button class="btn btn-danger" onclick="if(confirm('Etes vous sur de bloquer cet agent ?'))
                                                {document.getElementById('form-block-{{$user->id}}').submit()}" > bloquer
                                        </button>
                                        <form action="{{route('blocked_users')}}" id="form-block-{{$user->id}}" method="POST" >
                                            @csrf
                                            <input type="hidden" name="indice" value="2" >
                                            <input type="hidden" name="user_id" value="{{$user->id}}" >
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-danger" onclick="if(confirm('Attention : Les recus enregistrés au nom de cet agent seront desormais au nom du fondateur. Confirmez vous la suppression ?'))
                                            {document.getElementById('form-delete-{{$user->id}}').submit()}" > supprimer
                                    </button>
                                    <form action="{{route('delete_user')}}" id="form-delete-{{$user->id}}" method="POST" >
                                        @csrf
                                        <input type="hidden" name="indice" value="2" >
                                        <input type="hidden" name="user_id" value="{{$user->id}}" >
                                    </form>
                                </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@if($nb_user == 0)
<div class="container text-center col-6 mb-3">
        <span class=" text-uppercase text-red text-gras"> no data found</span>
</div>
@endif
  </div>
</body>
@endsection