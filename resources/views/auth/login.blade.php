{{--
<!doctype html>
<html lang="en">
<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Mar 2021 16:19:25 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Voyage|Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href="{{asset('user/assets/images/favicon.ico')}}"> -->
        <link rel="shortcut icon" href="{{ asset('user/assets/images/bus.png') }}">

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
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Content de vous revoir !</h5>
                                            <p>Connectez-vous pour continuer vers TouKi.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{asset('admin/assets/images/bus.')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="auth-logo">
                                    <a href="/" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('user/assets/images/logo-light.svg')}}" alt="" class="rounded-circle" height="34">
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
                                    <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                                        @csrf
        
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Votre adresse email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="username" placeholder="Enter username">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label">Votre mot de passe</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}  id="remember-check">
                                            <label class="form-check-label" for="remember-check">
                                                Se souvenir de moi
                                            </label>
                                        </div>
                                        
                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Se Connecter</button>
                                        </div>

                                         
                                        @if (Route::has('password.request'))
                                            <div class="mt-4 text-center">
                                                <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock me-1"></i> J'ai oublier mon mot de passe ?</a>
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
--}}


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="shortcut icon" href="{{asset('admin/assets/images/bus.svg')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('user/assets/css/login2.css') }}" />
  <title>TouCki|Connexion</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="{{ route('login') }}" method="post" class="sign-in-form">
          @csrf
          <h2 class="title">Se Connécter</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="username" placeholder="Entrez votre adresse email" />
          </div>
           <p style="width: 70%;font-size:11px;color:red;">
              @error('email')
                <span class="invalid-feedback" role="alert" style="width: 100%;">
                    {{ $message }}
                </span>
            @enderror
           </p>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Entrez votre mot de passe" aria-label="Password" aria-describedby="password-addon" />
          </div>
            @error('password')
              <p style="width: 70%;font-size:11px;color:red;">
                <span class="invalid-feedback" role="alert" >
                  {{ $message }}
              </span>
              </p>
            @enderror
          <input type="submit" value="Connexion" name="signin" class="btn solid"/>
          <p style="display: flex;justify-content: center;align-items: center;margin-top: 20px;"><a href="{{ route('password.request') }}" style="color: #4590ef;"> <i style="margin-right:4px;" class="fas fa-unlock"></i> Mot de passe oublié? </a></p>
        </form>

        <form action="" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Full Name" name="signup_full_name" value="" required />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email Address" name="signup_email" value="" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="signup_password" value="" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirm Password" name="signup_cpassword" value="" required />
          </div>
          <input type="submit" class="btn" name="signup" value="Sign up" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>TouCki cii Sénégal</h3>
          <p>
            Nous sommes convaincus que le digital est un facteur de croissance et de survie pour toutes entreprises quels que soient la taille et le secteur, c’est pourquoi nous nous engageons à vous accompagner à maximiser votre performance et vos résultats grâce à la digitalisation. 
          </p>
          <!-- <button class="btn transparent" id="sign-up-btn">
            Creer un compte agence
          </button> -->
        </div>
        <img src="{{asset('admin/assets/images/bus.svg')}}" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="{{asset('user/assets/images/register.svg')}}" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="{{asset('user/assets/js/pages/login2.js')}}"></script>
  <script src="app.js"></script>
</body>

</html>