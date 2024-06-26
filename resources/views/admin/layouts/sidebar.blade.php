  <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" key="t-menu">Menu</li>
                        @if(Auth::guard('web')->user())
                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <span class="badge rounded-pill bg-success float-end" key="t-new">New</span>
                                    <i class="bx bx-detail"></i>
                                    <span key="t-blog">Administrateur</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.agence.index') }}" key="t-blog-list"> <i class="fa fa-project-diagram"></i> Agences Transport</a></li>
                                    <li><a href="" key="t-blog-list"> <i class="fa fa-project-diagram"></i> Agences Touristique</a></li>
                                    <li><a href="" key="t-blog-list"> <i class="fa fa-project-diagram"></i> Parcs Automobile</a></li>
                                    <li><a href="" key="t-blog-list"> <i class="fa fa-project-diagram"></i> Location Voiture</a></li>
                                    @if(Auth::guard('web')->user()->is_admin == 0)
                                        <li><a href="{{ route('admin.admin.index') }}" key="t-blog-list">Admins</a></li>
                                        <li><a href="{{ route('admin.partenaire.index') }}" key="t-blog-list">Partenaires</a></li>
                                        <li><a href="{{ route('admin.admin.create') }}" key="t-blog-list">Utilisateurs</a></li>
                                    @endif
                                </ul>
                            </li>
                            
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bxs-user-detail"></i>
                                    <span key="t-contacts">Contacts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.contact.index') }}" key="t-user-list">Liste contacts</a></li>
                                    <li><a href="{{ route('admin.contact.create') }}" key="t-user-list">News</a></li>
                                </ul>
                            </li>
                        @endif

                        @if(Auth::guard('agence')->user())
                            <li>
                                <a href="{{ route('agence.about.index') }}" class="waves-effect">
                                    <i class="bx bx-food-menu"></i>
                                    <span key="t-file-manager">Presentation</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-store"></i>
                                    <span key="t-ecommerce">Paiments</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('agence.paiement.agent') }}" key="t-products"> <i class="bx bx-file"></i>Paiement Agents</a></li>
                                    <li><a href="" key="t-products"> <i class="bx bx-file"></i>Paiement TouCki</a></li>
                                </ul>
                            </li>

                            <!-- La partie des agence -->
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-store"></i>
                                    <span key="t-ecommerce">Sieges</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('agence.siege.index') }}" key="t-products">Sieges</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fa fa-users-cog"></i>
                                    <span key="t-ecommerce">Agents</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    @foreach(all_siege() as $siege)
                                        <li><a href="{{ route('agence.agent.show',$siege->id) }}" key="t-products">{{$siege->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <!-- Fin de la partie des agence -->
                        @endif

                        @if(Auth::guard('agent')->user())

                            @if(Auth::guard('agent')->user()->role == 1 || Auth::guard('agent')->user()->role == 4)
                                {{--
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="bx bxs-user-detail"></i>
                                        <span key="t-contacts">Contacts</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('agent.contact.index') }}" key="t-user-list">Vos Contacts</a></li>
                                    </ul>
                                </li>
                                --}}
                                <hr>
                                <li>
                                    <a href="{{ route('agent.itineraire.index') }}" key="t-products"> <i class="fa fa-road"></i>Vos Itineraires</a>
                                    {{--<li><a href="{{ route('agent.bus.index') }}" key="t-products"><i class="fa fa-bus"></i>Vos Buses</a></li>--}}
                                    
                                </li>
                                {{--
                                 <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="fa fa-user-plus"></i>
                                        <span key="t-contacts">Clients</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#FooterstaticBackdrop" key="t-products" class=""> <i class="fa fa-user-plus"></i> Ajouter un client</a></li>
                                    </ul>
                                </li>
                                --}}
                                <hr>
                                <li class="menu-title" key="t-menu"> <i class="fa fa-user-check"></i> Listes de vos clients</li>
                                @foreach(itineraire_all() as $itineraire)
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                                            <i class="fa fa-road"></i>
                                            <span key="t-email">{{$itineraire->name}}</span>
                                        </a>
                                    
                                        <ul class="sub-menu" aria-expanded="false">
                                            @foreach($itineraire->buses as $bus)
                                                <li><a href="{{route('agent.client.show',$bus->id)}}" key="t-products"> <i class="bx bxs-bus Bus"></i>   Bus  {{ $bus->number }} | {{ $bus->matricule }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                                <hr>
                                <li>
                                    <a href="{{ route('agent.client.renoncer') }}" key="t-products" class=""> <i class="fa fa-money-bill "></i> Ticket annuler</a>
                                </li>
                                @if(Auth::guard('agent')->user()->agence->method_ticket == 0)
                                    <li>
                                        <a href="{{ route('agent.absent') }}" key="t-products" class=""> <i class="fa fa-users "></i>Clients absents</a>
                                    </li>
                                @endif
                                
                            @endif

                            @if(Auth::guard('agent')->user()->role != 1 || Auth::guard('agent')->user()->role == 4 )
                            
                                @if(Auth::guard('agent')->user()->role == 2 || Auth::guard('agent')->user()->role == 4 )
                                    <li><a href="{{route('agent.bagage.index')}}" key="t-products"> <i class="fa fa-luggage-cart"></i>Clients bagages</a></li>
                                @endif

                                @if(Auth::guard('agent')->user()->role == 3 || Auth::guard('agent')->user()->role == 4 )
                                    <li><a href="{{route('agent.colis.index')}}" key="t-products"> <i class="fa fa-suitcase-rolling"></i>Clients colis</a></li>
                                @endif
                            @endif
                        @endif

                        @if(Auth::guard('client')->user())
                            <li>
                                <a href="{{ route('customer.client.show') }}" class="waves-effect">
                                    <i class="fa fa-ticket-alt"></i>
                                    <span key="t-file-manager">Tickets</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('customer.colis.index') }}" class="waves-effect">
                                    <i class="fa fa-suitcase-rolling"></i>
                                    <span key="t-file-manager">Colis Evoyer</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('customer.bagage.index') }}" class="waves-effect">
                                    <i class="fa fa-luggage-cart"></i>
                                    <span key="t-file-manager">Bagages</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fa fa-map-marker-alt "></i>
                                    <span key="t-maps">D'autres regions</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    @foreach(region() as $region)
                                    <li><a href="{{ route('customer.agence.region',$region->slug) }}" key="t-g-maps-{{$region->id}}"><i class="bx bx-map"></i> {{$region->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>