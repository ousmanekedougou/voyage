    <nav class="navbar navbar-expand-lg navigation fixed-top sticky">
        
        <div class="container">
            <a class="navbar-logo" href="/">
                <h3 height="19" class="logo logo-dark">Toucki Bi</h3>
                <h3  height="19" class="logo logo-light text-white">Toucki Bi</h3>
                <!-- <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="" height="19" class="logo logo-dark">
                <img src="{{asset('admin/assets/images/logo-light.png')}}" alt="" height="19" class="logo logo-light"> -->
            </a>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav ms-auto" id="topnav-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('index') }}" href="/">Acceuil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('about.index') }}" href="{{ route('about.index') }}">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('agence.index') }}" href="{{ route('agence.index') }}">Nos agences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('setting.index') }}" href="{{ route('setting.index') }}">Comment ça Marche ?</a>
                    </li>

                     <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('contact.index') }}" href="{{ route('contact.index') }}">Contact</a>
                    </li>

                </ul>

                <div class="my-2 ms-lg-2">
                    <!-- <a href="{{ route('agence.create') }}" class="btn btn-outline-success w-xs {{ set_active_roote('agence.create') }}">Creer votre compte agence</a> -->
                    <a href="{{ route('login') }}" class="btn btn-outline-success w-xs {{ set_active_roote('login') }}">Se Connecter</a>
                </div>
            </div>
        </div>
    </nav>
        {{--
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                    {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper me-2"></i>
                    {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        --}}
		@if(session('success'))

            <!-- subscribeModal -->
            <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center mb-4">

                                <div class="avatar-md mx-auto mb-4">
                                    <div class="avatar-title bg-light rounded-circle text-primary h1">
                                        <i class="mdi mdi-email-open"></i>
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="col-xl-10">
                                        <h4 class="text-primary">Message d'inscription</h4>
                                        <p class="text-muted font-size-14 mb-4" style="text-align: left;">
                                            {!! session('success') !!}
                                        </p>

                                        <div class="input-group bg-light rounded">
                                            <input type="email" class="form-control bg-transparent border-0"
                                                placeholder="Enter Email address" aria-label="Recipient's username"
                                                aria-describedby="button-addon2">

                                            <button class="btn btn-primary" type="button" id="button-addon2">
                                                <i class="bx bxs-paper-plane"></i>
                                            </button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->
           
		@endif

        @if(session('error'))

            <!-- subscribeModal -->
            <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center mb-4">

                                <div class="avatar-md mx-auto mb-4">
                                    <div class="avatar-title bg-light rounded-circle text-danger h1">
                                        <i class="mdi mdi-email-open"></i>
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="col-xl-10">
                                        <h4 class="text-primary">Message d'erreure</h4>
                                        <p class="text-danger font-size-14 mb-4" style="text-align: left;">
                                            {!! session('error') !!}
                                        </p>

                                        <div class="input-group bg-light rounded">
                                            <input type="email" class="form-control bg-transparent border-0"
                                                placeholder="Enter Email address" aria-label="Recipient's username"
                                                aria-describedby="button-addon2">

                                            <button class="btn btn-primary" type="button" id="button-addon2">
                                                <i class="bx bxs-paper-plane"></i>
                                            </button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->
           
		@endif


       

         