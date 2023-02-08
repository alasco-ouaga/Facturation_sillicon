@extends('layouts.login')
@section('content')
<body>
<div   class="container col-xl-5 col-lg-5  principal">
        <div class="card">
            <div class="card-header alert ">
                Se connecter vous securise plus 
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="email" placeholder="Email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Email incorrecte.</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="password" placeholder="Mot de passe" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback ml-auto" role="alert">
                                        <strong>Mot de passe incorrecte </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <a class="nav-link  mb-3 btn-link" href="{{ route('register') }}">
                                    Créer un compte
                                </a>
                            </div>
                            <div class="col-6">
                                <a class="nav-link  mb-3 btn-link" href="{{ route('password.request') }}">
                                    Mot de passe oublier
                                </a>
                            </div>
                        </div>
        
                        <button type="submit" class="btn btn-md btn-primary btn-block">
                            Se connecter 
                        </button>
                </form>
                <a class="nav-link  mt-3 mb-3 btn-md text-center btn-success " href="{{ route('noconnect') }}">
                    Payer sans se connecter
                </a>
            </div>
        </div>
    </div>
</body>
@endsection
 </html>
