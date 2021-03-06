    <!--  Large modal example -->
    <div class="modal fade bs-exampleLogin-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                            <button type="button" class="btn-close rounded-circle bg-primary bg-soft font-size-18" style="float:right;" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                        <div class="row">
                            <div class="col-7 contact-login-title">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Content de vous revoir !</h5>
                                    <p>Connectez-vous pour continuer vers TouKi.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end contact-login-img">
                                <img src="{{asset('user/assets/images/profile-img.png')}}" alt="" class="img-fluid">
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
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> 
     <!--  Large modal example -->
    <div class="modal fade bs-exampleContact-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                            <button type="button" class="btn-close rounded-circle bg-primary bg-soft font-size-18" style="float:right;" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                        <div class="row">
                            <div class="col-8 contact-login-title">
                                <div class="text-primary p-2">
                                    <h5 class="text-primary">Nous contacter</h5>
                                    <p>Vous souhaitez des renseignements compl??mentaires,prendre un rendez-vous, n???h??sitez pas ?? nous contacter</p>
                                </div>
                            </div>
                            <div class="col-4 align-self-end contact-login-img">
                                <img src="{{asset('user/assets/images/profile-img.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0"> 
                        <div class="auth-logo">
                            <a href="/" class="auth-logo-light">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="{{asset('admin/assets/images/bus.svg')}}" alt="" class="rounded-circle" height="34">
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
                            <form class="form-horizontal" action="{{ route('contact.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Prenom et Nom</label>
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                        placeholder="Prenom et Nom" />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Votre adresse email </label>
                                    <div>
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" parsley-type="email"
                                            placeholder="E-Mail" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                            
                                <div class="mb-3">
                                    <label class="form-label">Votre Message</label>
                                    <div>
                                        <textarea required id="msg" class="form-control @error('msg') is-invalid @enderror" name="msg" value="{{ old('msg') }}" autocomplete="msg" class="form-control" rows="5"></textarea>
                                            @error('msg')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2 col-lg-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                        Envoyer
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect btn-block">
                                        Anuller
                                    </button>
                                </div>
                            </form>
                        </div>
    
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->            
        
    <footer class="">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    TouCki 2021 ?? <script>document.write(new Date().getFullYear())</script>  .
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by K??dWeb
                    </div>
                </div>
            </div>
            <button id="topBtn"> <i class="fas fa-arrow-up"></i> </button>
        </div>
    </footer>

            
    @section('footersection')

    <script>
        $(document).ready(function(){

            $(window).scroll(function(){
                if($(this).scrollTop() > 40) {
                    $("#topBtn").fadeIn();
                }else{
                    $("#topBtn").fadeOut();
                }
            });

            $("#topBtn").click(function(){
                $('html ,body').animate({scrollTop : 0},2000);
            });
        });
    </script>


   

    @show
          