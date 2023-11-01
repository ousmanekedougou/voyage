

<!doctype html>
@extends('user.layouts.app',['title' => 'Connexion'])
@section('headSection')
<style>
    .navbar-expand-lg{
        background:#586ce4 !important;
    }
    @media only screen and (max-width:1000px) {
        .navbar-expand-lg{background:white !important;
            z-index: 20;
        }
        .account-pages{
        }
    }
</style>
@endsection
@section('main-content')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Compte agence TouCki</h5>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{asset('admin/assets/images/bus.svg')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0"> 
                            <div class="auth-logo">
                                <a href="/" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{asset('admin/assets/images/logo-light.svg')}}" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="/" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{asset('admin/assets/images/bus.svg')}}" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                @if(count($errors) > 0)
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            {{ $error }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endforeach
                                @endif
                                <form class="form-horizontal" action="{{ route('agence.agence.login') }}" method="POST">
                                    @csrf
    
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Votre adresse email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="username" placeholder="Entrer votre adresse email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
            
                                    <div class="mb-3">
                                        <label class="form-label">Votre mot de passe</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Entrer votre mot de passe" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Se Connecter</button>
                                    </div>

                                        
                                    @if (Route::has('password.request'))
                                        <div class="mt-4 text-center">
                                            <a href="{{ route('customer.password.reset') }}" class="text-primary"><i class="mdi mdi-lock me-1"></i> J'ai oublier mon mot de passe ?</a>
                                            <p class="mt-2"><a href="{{route('agence.create')}}" class="fw-medium text-primary"> Créer votre compte agence TouCki </a> </p>
                                            <p style="font-weight: 500;">© TouCki <script>document.write(new Date().getFullYear())</script></p>
                                        </div>
                                        @endif
                                </form>
                            </div>
        
                        </div>
                    </div>
            
                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->
@endsection






