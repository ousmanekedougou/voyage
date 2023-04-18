   {{--
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

            <ul class="navbar-nav ms-auto navbar-mobile-show" id="topnav-menu">
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
                    <a class="nav-link {{ set_active_roote('client.index') }} " href="{{ route('client.index') }}"><i class="fa fa-suitcase-rolling"></i> Vos réservation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ set_active_roote('setting.index') }} " href="{{ route('setting.index') }}"><i class="fa fa-cog"></i> Comment ça marche ?</a>
                </li>

                    <li class="nav-item">
                    <a class="nav-link {{ set_active_roote('contact.index') }} " href="#contact"
                    data-bs-toggle="modal"
                                        data-bs-target=".ContactUs"
                    ><i class="fa fa-at"></i> Contact</a>
                </li>

            </ul>

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
                        <a class="nav-link {{ set_active_roote('client.index') }} " href="{{ route('client.index') }}"><i class="fa fa-suitcase-rolling"></i> Vos réservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('setting.index') }} " href="{{ route('setting.index') }}"><i class="fa fa-cog"></i> Comment ça marche ?</a>
                    </li>

                     <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('contact.index') }} " href="#contact"
                        data-bs-toggle="modal"
                                            data-bs-target=".ContactUs"
                        ><i class="fa fa-at"></i> Contact</a>
                    </li>

                </ul>
              
                @if(!Auth::guard('web')->user() && !Auth::guard('agence')->user() && !Auth::guard('agent')->user() && !Auth::guard('client')->user())
                <div class="dropdown d-inline-block">
                        <span id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="d-xl-inline-block ms-1 btn btn-outline-success" key="t-henry">Se Connecter
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
                    @if(Auth::guard('web')->user())
                        <div class="my-2 ms-lg-2 btn-sign-ine">
                          
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger  w-xs"> Se Deconnecter <i class="fa fa-sign-up-alt"></i> </button>
                            </form>
                        </div>
                    @elseif(Auth::guard('agence')->user())
                        <div class="my-2 ms-lg-2 btn-sign-ine">
                            <form id="logout-form-agence" action="{{ route('agence.agence.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger  w-xs"> Se Deconnecter <i class="fa fa-sign-up-alt"></i> </button>
                            </form>
                        </div>
                    @elseif(Auth::guard('agent')->user())
                        <div class="my-2 ms-lg-2 btn-sign-ine">
                           
                            <form id="logout-form-agent" action="{{ route('agent.agent.logout') }}" method="POST" >
                                @csrf
                                <button type="submit" class="btn btn-outline-danger  w-xs"> Se Deconnecter <i class="fa fa-sign-up-alt"></i> </button>
                            </form>
                        </div>
                    @elseif(Auth::guard('client')->user())
                        <div class="my-2 ms-lg-2 btn-sign-ine">
                            <form id="logout-form-customer" action="{{ route('customer.customer.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger  w-xs"> Se Deconnecter <i class="fa fa-sign-up-alt"></i> </button>
                            </form>
                        </div>
                    @endif
                @endif

            </div>
        </div>
        
    </nav>
    --}}
    

     <nav class="navbar navbar-expand-lg navigation fixed-top sticky">
        
        <div class="container">
            <a class="navbar-logo" href="/">
                <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="" height="19" class="logo logo-dark">
                <img src="{{asset('admin/assets/images/logo-light.png')}}" alt="" height="19" class="logo logo-light">
            </a>
            {{--
            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            --}}

            <ul class="navbar-mobile-show">
                <li class="nav-item">
                    <a class="nav-link {{ set_active_roote('index') }} " href="{{ route('index') }}" ><i class="fa fa-home fa-fa-item"></i></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ set_active_roote('about.index') }}" href="{{ route('about.index') }}"><i class="fa fa-bookmark fa-fa-item"></i></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ set_active_roote('client.index') }} " href="{{ route('client.index') }}"><i class="fa fa-suitcase-rolling fa-fa-item"></i> </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ set_active_roote('setting.index') }} " href="{{ route('setting.index') }}"><i class="fa fa-cogs fa-fa-item"></i></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ set_active_roote('contact.index') }} " href="{{ route('contact.index') }}"><i class="fa fa-at fa-fa-item"></i></a>
                </li>
                <li class="nav-item drop-down-mobile">
                    @if(!Auth::guard('web')->user() && !Auth::guard('agence')->user() && !Auth::guard('agent')->user() && !Auth::guard('client')->user())
                        <div class="dropdown d-inline-block ">
                            <span class="d-xl-inline-block login-user-button btn btn-outline-secondary" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" key="t-henry">
                                <i class="fa fa-sign-in-alt fa-fa-item d-xl-inline-block"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-end">
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
                    @endif
                </li>
                <li class="nav-item logout-button">
                    @if(Auth::guard('web')->user())
                    <a class="nav-link btn btn-outline-danger text-danger logout-a" href="" onclick="event.preventDefault(); document.getElementById('logout-form-web').submit();"><i
                            class="fa fa-sign-out-alt fa-fa-item"></i></a>
                        <form id="logout-form-web" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    @elseif(Auth::guard('agence')->user())
                    <a class="nav-link btn btn-outline-danger text-danger logout-a" href="" onclick="event.preventDefault(); document.getElementById('logout-form-agence').submit();"><i
                            class="fa fa-sign-out-alt fa-fa-item"></i></a>
                        <form id="logout-form-agence" action="{{ route('agence.agence.logout') }}" method="POST">
                            @csrf
                        </form>
                    @elseif(Auth::guard('agent')->user())
                    <a class="nav-link btn btn-outline-danger text-danger logout-a" href="" onclick="event.preventDefault(); document.getElementById('logout-form-agent').submit();"><i
                            class="fa fa-sign-out-alt fa-fa-item"></i></a>
                        <form id="logout-form-agent" action="{{ route('agent.agent.logout') }}" method="POST">
                            @csrf
                        </form>
                    @elseif(Auth::guard('client')->user())
                    <a class="nav-link btn btn-outline-danger text-danger logout-a" href="" onclick="event.preventDefault(); document.getElementById('logout-form-customer').submit();"><i
                            class="fa fa-sign-out-alt fa-fa-item"></i></a>
                        <form id="logout-form-customer" action="{{ route('customer.customer.logout') }}" method="POST">
                            @csrf
                        </form>
                    @endif
                </li>
            </ul>

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav ms-auto" id="topnav-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('index') }} " href="/"><i class="fa fa-home"></i> acceuil</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('about.index') }}" href="{{ route('about.index') }}">A propos</a>
                    </li> --}}
                    {{--
                    <li class="nav-item">
                        <a class="nav-link {{ set_active_roote('agence.index') }} " href="{{ route('agence.index') }}"><i class="fa fa-building"></i> agences</a>
                    </li>
                    --}}
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
                {{--
                <div class="my-2 ms-lg-2 btn-sign-ine">
                    <!-- <a href="{{ route('agence.create') }}" class="btn btn-outline-primary w-xs {{ set_active_roote('agence.create') }}"><i class="fa fa-user-plus"></i> Creer un compte agence</a> -->
                    <a href="{{ route('login') }}" class="btn btn-outline-success  w-xs {{ set_active_roote('login') }}" data-bs-toggle="modal"
                                            data-bs-target=".bs-exampleLogin-modal-lg"> Se connecter <i class="fa fa-sign-in-alt"></i>  <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i></a>
                </div>
                --}}
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
                    @if(Auth::guard('web')->user())
                        <div class="my-2 ms-lg-2 btn-sign-ine">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-xs mt-2"> Se Deconnecter <i class="fa fa-sign-up-alt"></i> </button>
                            </form>
                        </div>
                    @elseif(Auth::guard('agence')->user())
                        <div class="my-2 ms-lg-2 btn-sign-ine">
                            <form id="logout-form-agence" action="{{ route('agence.agence.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-xs mt-2"> Se Deconnecter <i class="fa fa-sign-up-alt"></i> </button>
                            </form>
                        </div>
                    @elseif(Auth::guard('agent')->user())
                        <div class="my-2 ms-lg-2 btn-sign-ine">
                           
                            <form id="logout-form-agent" action="{{ route('agent.agent.logout') }}" method="POST" >
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-xs mt-2"> Se Deconnecter <i class="fa fa-sign-up-alt"></i> </button>
                            </form>
                        </div>
                    @elseif(Auth::guard('client')->user())
                        <div class="my-2 ms-lg-2 btn-sign-ine">
                            <form id="logout-form-customer" action="{{ route('customer.customer.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-xs mt-2"> Se Deconnecter <i class="fa fa-sign-up-alt"></i> </button>
                            </form>
                        </div>
                    @endif
                @endif

            </div>
        </div>
        
    </nav>



    

        

        

   

       

         