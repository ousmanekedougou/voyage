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
                                    <li><a href="{{ route('admin.agence.index') }}" key="t-blog-list"> <i class="fa fa-project-diagram"></i> Agences</a></li>
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
                                    <span key="t-ecommerce">Sieges</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.siege.index') }}" key="t-products">Sieges</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fa fa-users-cog"></i>
                                    <span key="t-ecommerce">Agents</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    @foreach(all_siege() as $siege)
                                    <li><a href="{{ route('admin.agent.show',$siege->id) }}" key="t-products">{{$siege->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <!-- Fin de la partie des agence -->
                        @endif

                        @if(Auth::user()->is_admin == 3)

                         
                            @if(Auth::user()->role == 1)
                                <li><a href="{{ route('admin.itineraire.index') }}" key="t-products"> <i class="fa fa-road"></i>Vos Itineraires</a></li>
                                <li><a href="{{ route('admin.depart.index') }}" key="t-products"> <i class="fa fa-clock"></i> Vos Dates</a></li>
                                <li><a href="{{ route('admin.bus.index') }}" key="t-products"><i class="fa fa-bus"></i>Vos Bus</a></li>
                                
                                <li><a data-bs-toggle="modal" data-bs-target="#FooterstaticBackdrop" key="t-products" class="btn btn-primary"> <i class="fa fa-user-plus"></i> Ajouter un client</a></li>
                                <li class="menu-title" key="t-menu"></li>
                                <li class="menu-title" key="t-menu"> <i class="fa fa-user-check"></i> Liste de vos clients</li>
                                @foreach(itineraire_all() as $itineraire)
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                                            <i class="fa fa-road"></i>
                                            <span key="t-email">{{$itineraire->name}}</span>
                                        </a>
                                    
                                        <ul class="sub-menu" aria-expanded="false">
                                            @foreach($itineraire->date_departs as $date)
                                                
                                                    <li>
                                                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                            <span key="" class="fa fa-clock">
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
                            
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="fa fa-folder-open"></i>
                                        <span key="t-ecommerce">Historiques</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        @foreach(historical() as $history)
                                            <li><a href="{{route('admin.historique.show',$history->siege_id)}}" key="t-products"> <i class="fa fa-clock"></i> {{ $history->registered_at }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                            @if(Auth::user()->role == 2 || Auth::user()->role == 3)
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fa fa-store-alt"></i>
                                    <span key="t-ecommerce">Bagages et Colis</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                        @if(Auth::user()->role == 2)
                                        <li><a href="{{route('admin.bagage.index')}}" key="t-products"> <i class="fa fa-luggage-cart"></i>Bagages</a></li>
                                        @endif
                                        @if(Auth::user()->role == 3)
                                        <li><a href="{{route('admin.colis.index')}}" key="t-products"> <i class="fa fa-suitcase-rolling"></i>Colis</a></li>
                                        @endif
                                </ul>
                            </li>
                            @endif
                        @endif
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>