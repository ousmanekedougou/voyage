    <nav class="navbar navbar-expand-lg navigation fixed-top sticky">
        
        <div class="container">
            <a class="navbar-logo" href="/">
                <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="" height="19" class="logo logo-dark">
                <img src="{{asset('admin/assets/images/logo-light.png')}}" alt="" height="19" class="logo logo-light">
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
                        <a class="nav-link {{ set_active_roote('client.index') }} " href="{{ route('client.index') }}"><i class="fas fa-suitcase-rolling"></i> Vos réservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('setting.index') }} " href="{{ route('setting.index') }}"><i class="fa fa-cog"></i> Comment ça marche ?</a>
                    </li>

                     <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('contact.index') }} " href="{{ route('contact.index') }}" data-bs-toggle="modal"
                                            data-bs-target=".bs-exampleContact-modal-lg"><i class="fa fa-at"></i> Contact</a>
                    </li>

                </ul>

                <div class="my-2 ms-lg-2 btn-sign-ine">
                    <!-- <a href="{{ route('agence.create') }}" class="btn btn-outline-primary w-xs {{ set_active_roote('agence.create') }}"><i class="fa fa-user-plus"></i> Creer un compte agence</a> -->
                    <a href="{{ route('login') }}" class="btn btn-outline-success  w-xs {{ set_active_roote('login') }}" data-bs-toggle="modal"
                                            data-bs-target=".bs-exampleLogin-modal-lg"><i class="fa fa-sign-in-alt"></i> Se connecter</a>
                </div>
            </div>
        </div>
        
    </nav>
  


    

        

        

   

       

         