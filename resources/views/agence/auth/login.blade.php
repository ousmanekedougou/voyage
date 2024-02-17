
    
<!doctype html>
<html lang="en">
<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Mar 2021 16:19:25 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>TouCki</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/assets/images/bus.svg') }}" style="width:100%;">

        <!-- Bootstrap Css -->
        <link href="{{asset('user/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('user/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('user/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center row-login">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Compte agence TouCki</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
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

       <!-- JAVASCRIPT -->
       <script src="{{asset('user/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('user/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('user/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('user/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('user/assets/libs/node-waves/waves.min.js')}}"></script>
        
        <!-- App js -->
        <script src="{{asset('user/assets/js/app.js')}}"></script>
    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Mar 2021 16:19:25 GMT -->
</html>





