<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/auth-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Mar 2021 16:19:26 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Modification de votre mot de passe </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/bus.svg') }}">

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
                                        <h5 class="text-primary"> Réinitialiser le mot de passe</h5>
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
                                            <img src="{{ asset('admin/assets/images/bus.svg') }}" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>

                            <div class="p-2">
                                <div class="alert alert-success text-center mb-4" role="alert">
                                    Veuiller entre votre nouveau mot de passe pour l'adresse " {{$email}} "
                                </div>
                                <form class="form-horizontal" method="POST" action="{{ route('agence.password.update',$email) }}">
                                    @csrf
                                    {{Method_field('PUT')}}
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Adresse E-mail</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocusid="useremail" placeholder="Enter email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Le nouveau mot de passe</label>

                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password-confirm" class="form-label">Confirmer le nouveau mot de passe</label>

                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Renouveller votre mot de passe</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Si vous vous souvenez ? <a href="{{ route('agence.agence.login') }}" class="fw-medium text-primary"> Se Connecter ici</a> </p>
                        <p>© <script>
                                document.write(new Date().getFullYear())
                            </script> TouCki</p>
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