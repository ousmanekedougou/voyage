 
     <nav class="navbar navbar-expand-lg navigation fixed-top sticky">
        
        <div class="container">
            <a class="navbar-logo" href="/">
                <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="" height="19" class="logo logo-dark">
                <img src="{{asset('admin/assets/images/logo-light.png')}}" alt="" height="19" class="logo logo-light">
            </a>
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav ms-auto" id="topnav-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('index') }} " href="/"><i class="fa fa-home"></i> acceuil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#about"> <i class="fa fa-bookmark"></i> A propos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  " href="#features"><i class="fa fa-at"></i> comptes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  " href="#roadmap"><i class="fa fa-suitcase-rolling"></i> réservation</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  " href="#faqs"><i class="fa fa-cog"></i> comment ça marche</a>
                    </li>
                    {{--
                    <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('contact.index') }} " href="{{ route('contact.index') }}"
                        
                        ><i class="fa fa-at"></i> contact</a>
                    </li>
                    --}}
                </ul>
                @if(!Auth::guard('web')->user() && !Auth::guard('agence')->user() && !Auth::guard('agent')->user() && !Auth::guard('client')->user())
                <div class="dropdown d-inline-block">
                        <span id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="d-xl-inline-block ms-1 btn btn-info" key="t-henry">Se Connecter
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </span>
                    <div class="dropdown-menu dropdown-menu-end text-center">
                        <!-- item-->
                        <a class="dropdown-item {{ set_active_roote('customer.login') }}" href="{{ route('customer.customer.login') }}"><i
                                class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-my-wallet">Espace Client</span>
                        </a>

                        <a class="dropdown-item {{ set_active_roote('agent.agent.login') }}" href="{{ route('agent.agent.login') }}"><i class="bx bx-user-circle  font-size-16 align-middle me-1"></i>
                            <span key="t-profile">Espace Agent</span>
                        </a>
                        
                        <a class="dropdown-item {{ set_active_roote('agence.agence.login') }}" href="{{ route('agence.agence.login') }}">
                            <i class="bx bx-building font-size-16 align-middle me-1"></i><span
                                key="t-settings">Espace Agence</span>
                        </a>
                    </div>
                </div>
                @else
                    <div class="my-2 ms-lg-2 btn-sign-ine">
                        <form id="logout-form" 
                        action="
                            @if(Auth::guard('web')->user())
                                {{ route('logout') }}
                            @elseif(Auth::guard('agence')->user())
                                {{ route('agence.agence.logout') }}
                            @elseif(Auth::guard('agent')->user())
                                {{ route('agent.agent.logout') }}
                            @elseif(Auth::guard('client')->user())
                                {{ route('customer.customer.logout') }}
                            @endif
                        " method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-xs mt-2"> Se Deconnecter <i class="fa fa-sign-up-alt"></i> </button>
                        </form>
                    </div>
                @endif

            </div>


            {{--
                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav ms-auto" id="topnav-menu">
                        <li class="nav-item">
                            <a class="nav-link {{ set_active_roote('index') }} " href="/"><i class="fa fa-home"></i> acceuil</a>
                        </li><li class="nav-item">
                            <a class="nav-link {{ set_active_roote('about.index') }}" href="{{ route('about.index') }}">A propos</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link {{ set_active_roote('agence.index') }} " href="{{ route('agence.index') }}"><i class="fa fa-building"></i> agences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ set_active_roote('client.index') }} " href="{{ route('client.index') }}"><i class="fa fa-suitcase-rolling"></i> réservation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ set_active_roote('setting.index') }} " href="{{ route('setting.index') }}"><i class="fa fa-cog"></i> comment ça marche</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ set_active_roote('contact.index') }} " href="{{ route('contact.index') }}"
                            
                            ><i class="fa fa-at"></i> contact</a>
                        </li>
                    </ul>
                </div>    
            --}}
        </div>
        
    </nav>



    

        

        

   

       

         