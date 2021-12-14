    <nav class="navbar navbar-expand-lg navigation fixed-top sticky">
        
        <div class="container">
            <a class="navbar-logo" href="/">
                <h3 height="19" class="logo logo-dark">TouCKi</h3>
                <h3  height="19" class="logo logo-light text-dark">TouCKi</h3>
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
                        <a class="nav-link {{ set_active_roote('index') }} " href="/"><i class="fa fa-home"></i> Acceuil</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('about.index') }}" href="{{ route('about.index') }}">A propos</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('agence.index') }} " href="{{ route('agence.index') }}"><i class="fa fa-building"></i> Nos agences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('setting.index') }} " href="{{ route('setting.index') }}"><i class="fa fa-cog"></i> Comment ça Marche ?</a>
                    </li>

                     <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('contact.index') }} " href="{{ route('contact.index') }}"><i class="fa fa-at"></i> Contact</a>
                    </li>

                </ul>

                <div class="my-2 ms-lg-2 btn-sign-ine">
                    <a href="{{ route('agence.create') }}" class="btn btn-outline-info w-xs {{ set_active_roote('agence.create') }}"><i class="fa fa-user-plus"></i> Creer votre compte agence</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-success w-xs {{ set_active_roote('login') }}"><i class="fa fa-sign-in-alt"></i> Se Connecter</a>
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
                                        <i class="fa fa-user-plus"></i>
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="col-xl-10">
                                        <h4 class="text-success">Message d'inscription</h4>
                                        <p class="text-success font-size-14 mb-4 text-left">
                                            {!! session('success') !!}
                                        </p>

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
                    <div class="modal-content bg-warning">
                        <div class="modal-header border-bottom-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center mb-4">

                                <div class="avatar-md mx-auto mb-4">
                                    <div class="avatar-title bg-white rounded-circle text-warning h1">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="col-xl-10">
                                        <h4 class="text-white">chères Clients</h4>
                                        <p class="text-white font-size-20 mb-4" style="text-align: left;">
                                            {!! session('error') !!}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->
           
		@endif

   

       

         