



<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/auth-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Mar 2021 16:19:26 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Recover Password | </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('user/assets/images/favicon.ico')}}">

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
                                            <h5 class="text-primary">Agent password resete</h5>
                                            <p>Re-Password with Skote.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{asset('user/assets/images/profile-img.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('user/assets/images/logo.svg')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="p-2">
                                    @if (session('status'))
                                    <div class="alert alert-success text-center mb-4" role="alert">
                                        {{ session('status') }}
                                    </div>
                                    @else
                                    <div class="alert alert-success text-center mb-4" role="alert">
                                        Entrez votre email et les instructions vous seront envoyées!
                                    </div>
                                    @endif
                                    <form class="form-horizontal" method="POST" action="{{ route('agent.password.verify') }}">
                                       
                                            @csrf
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocusid="useremail" placeholder="Enter email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                    
                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Envoyer votre adresse email</button>
                                        </div>
    
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>Si vous vous souvenez ? <a href="{{ route('agent.agent.login') }}" class="fw-medium text-primary"> Se Connecter ici</a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script> Voyage. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('user/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('user/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('user/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('user/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('user/assets/libs/node-waves/waves.min.js')}}"></script>
        
        <!-- App js -->
        <script src="{{asset('user/assets/js/app.js')}}"></script>
    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/auth-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Mar 2021 16:19:26 GMT -->
</html>

