  <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" key="t-menu">Menu</li>
                        @if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 0)
                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <span class="badge rounded-pill bg-success float-end" key="t-new">New</span>
                                    <i class="bx bx-detail"></i>
                                    <span key="t-blog">Administrateur</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.agence.index') }}" key="t-blog-list">Agences</a></li>
                                    @if(Auth::user()->is_admin == 0)
                                    <li><a href="{{ route('admin.admin.index') }}" key="t-blog-list">Admins</a></li>
                                    <li><a href="{{ route('admin.partenaire.index') }}" key="t-blog-list">Partenaires</a></li>
                                    @endif
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bxs-user-detail"></i>
                                    <span key="t-contacts">Contacts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="" key="t-user-grid">Contact Cart</a></li>
                                    <li><a href="contacts-list.html" key="t-user-list">Contact list</a></li>
                                </ul>
                            </li>
                        @endif

                        @if(Auth::user()->is_admin == 2)
                            <!-- La partie des agence -->
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-store"></i>
                                    <span key="t-ecommerce">Agents</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    @foreach(all_siege() as $siege)
                                    <li><a href="{{ route('admin.agent.show',$siege->id) }}" key="t-products">{{$siege->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-store"></i>
                                    <span key="t-ecommerce">Sieges</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.siege.index') }}" key="t-products">Sieges</a></li>
                                </ul>
                            </li>
                            <!-- Fin de la partie des agence -->
                        @endif

                        @if(Auth::user()->is_admin == 3)

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-store"></i>
                                    <span key="t-ecommerce">Voyage</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.itineraire.index') }}" key="t-products">Itineraire</a></li>
                                    <li><a href="{{ route('admin.depart.index') }}" key="t-products">Les Dates</a></li>
                                    <li><a href="{{ route('admin.bus.index') }}" key="t-products">Bus</a></li>
                                    <li><a href="{{ route('admin.historique.index') }}" key="t-products">Historiques</a></li>
                                </ul>
                            </li>
                            <li class="menu-title" key="t-menu">Vos Clients</li>
                             <li><a href="{{ route('admin.client.index') }}" key="t-products">Ajouter un client</a></li>
                            @foreach(itineraire_all() as $itineraire)
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="bx bx-trending-up"></i>
                                        <span key="t-email">{{$itineraire->name}}</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        @foreach($itineraire->date_departs as $date)
                                            
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <span key="" class="bx bx-stopwatch">
                                                            @if($date->depart_at == carbon_today())
                                                                liste du jour
                                                            @elseif($date->depart_at == carbon_tomorrow())
                                                                liste de demain
                                                            @elseif($date->depart_at > carbon_tomorrow())
                                                                Apres demain
                                                            @else
                                                                {{ $date->depart_at }}
                                                            @endif
                                                        </span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        @foreach($date->buses as $bus)
                                                        <li><a href="{{route('admin.client.show',$bus->id)}}" key="t-products"> <i class="bx bxs-bus Bus"></i>   Bus  {{ $bus->number }} | {{ $bus->matricule }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach

                         
                          
                        @endif

        
                       

                        <!-- <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <span class="badge rounded-pill bg-success float-end" key="t-new">New</span>
                                <i class="bx bx-detail"></i>
                                <span key="t-blog">Blog</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="blog-list.html" key="t-blog-list">Blog List</a></li>
                                <li><a href="blog-grid.html" key="t-blog-grid">Blog Grid</a></li>
                                <li><a href="blog-details.html" key="t-blog-details">Blog Details</a></li>
                            </ul>
                        </li>

                        <li class="menu-title" key="t-pages">Pages</li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <span class="badge rounded-pill bg-success float-end" key="t-new">New</span>
                                <i class="bx bx-user-circle"></i>
                                <span key="t-authentication">Authentication</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="auth-login.html" key="t-login">Login</a></li>
                                <li><a href="auth-login-2.html" key="t-login-2">Login 2</a></li>
                                <li><a href="auth-register.html" key="t-register">Register</a></li>
                                <li><a href="auth-register-2.html" key="t-register-2">Register 2</a></li>
                                <li><a href="auth-recoverpw.html" key="t-recover-password">Recover Password</a></li>
                                <li><a href="auth-recoverpw-2.html" key="t-recover-password-2">Recover Password 2</a>
                                </li>
                                <li><a href="auth-lock-screen.html" key="t-lock-screen">Lock Screen</a></li>
                                <li><a href="auth-lock-screen-2.html" key="t-lock-screen-2">Lock Screen 2</a></li>
                                <li><a href="auth-confirm-mail.html" key="t-confirm-mail">Confirm Mail</a></li>
                                <li><a href="auth-confirm-mail-2.html" key="t-confirm-mail-2">Confirm Mail 2</a></li>
                                <li><a href="auth-email-verification.html" key="t-email-verification">Email
                                        verification</a></li>
                                <li><a href="auth-email-verification-2.html" key="t-email-verification-2">Email
                                        verification 2</a></li>
                                <li><a href="auth-two-step-verification.html" key="t-two-step-verification">Two step
                                        verification</a></li>
                                <li><a href="auth-two-step-verification-2.html" key="t-two-step-verification-2">Two step
                                        verification 2</a></li>
                            </ul>
                        </li> -->

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>