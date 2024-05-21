            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        @if(Auth::guard('web')->user())
                            <div class="container">
                                <main>
                                    <ul>
                                        <li class="{{ set_active_roote_bottom_bar('admin.home') }} ">
                                            <a href="{{ route('admin.home') }}" id="home">
                                                <span> Acceuil</span>
                                                <i class="bx bx-home-circle   fa-fa-item"></i>
                                            </a>
                                        </li>
                                        
                                        @if(Auth::guard('web')->user()->is_admin == 0)
                                            <li class="{{ set_active_roote_bottom_bar('admin.admin.index') }} ">
                                                <a href="{{ route('admin.admin.index') }}" id="drop">
                                                    <span>Admins</span>
                                                    <i class="bx bx-user fa-fa-item"></i>
                                                </a>
                                            </li>

                                            <li class="{{ set_active_roote_bottom_bar('admin.partenaire.index') }} ">
                                                <a href="{{ route('admin.partenaire.index') }}" id="store">
                                                    <span>Partenaires</span>
                                                    <i class="bx bx-store-alt  fa-fa-item"></i>
                                                </a>
                                            </li>

                                            <li class="{{ set_active_roote_bottom_bar('admin.admin.create') }} ">
                                                <a href="{{ route('admin.admin.create') }}" id="wishlist">
                                                    <span>Users</span>
                                                    <i class="bx bx-user  fa-fa-item"></i>
                                                </a>
                                            </li>

                                        @endif
                                        <li class="{{ set_active_roote_bottom_bar('admin.contact.index') }}">
                                            <a href="{{ route('admin.contact.index') }}" class="">
                                                <span>Contacts</span>
                                                <i class="bx bxs-user-detail fa-item"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </main>
                            </div>
                        @elseif(Auth::guard('agent')->user())
                            @if(Auth::guard('agent')->user()->role == 1)
                                <div class="container">
                                    <main>
                                        <ul>
                                            <li class="{{ set_active_roote_bottom_bar('agent.home') }} ">
                                                <a href="{{ route('agent.home') }}" id="home">
                                                    <span> Acceuil</span>
                                                    <i class="bx bx-home-circle   fa-fa-item"></i>
                                                </a>
                                            </li>
                                            <li class="{{ set_active_roote_bottom_bar('agent.itineraire.index') }} ">
                                                <a href="{{ route('agent.itineraire.index') }}" id="drop">
                                                    <span>Itineraires</span>
                                                    <i class="bx bx-map-pin fa-fa-item"></i>
                                                </a>
                                            </li>

                                            <li class="{{ set_active_roote_bottom_bar('agent.client.index') }} ">
                                                <a href="{{ route('agent.client.index') }}" id="store">
                                                    <span>Clients</span>
                                                    <i class="bx bxs-group fa-fa-item"></i>
                                                </a>
                                            </li>

                                            <li class="{{ set_active_roote_bottom_bar('agent.client.renoncer') }} ">
                                                <a href="{{ route('agent.client.renoncer') }}" id="wishlist">
                                                    <span>Anuller</span>
                                                    <i class="bx bx-error-circle fa-fa-item"></i>
                                                </a>
                                            </li>

                                            <li class="{{ set_active_roote_bottom_bar('agent.absent') }} ">
                                                <a href="{{ route('agent.absent') }}" id="wishlist">
                                                    <span>Absences</span>
                                                    <i class="bx bxs-hide fa-fa-item"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </main>
                                </div>
                            @endif
                        @elseif(Auth::guard('client')->user())
                            <div class="container">
                                <main>
                                    <ul>
                                        <li class="{{ set_active_roote_bottom_bar('customer.home') }} ">
                                            <a href="{{ route('customer.home') }}" id="home">
                                                <span> Home</span>
                                                <i class="bx bx-home-circle   fa-fa-item"></i>
                                            </a>
                                        </li>

                                        <li class="{{ set_active_roote_bottom_bar('customer.client.show') }} ">
                                            <a href="{{ route('customer.client.show') }}" id="drop">
                                                <span>Ticket</span>
                                                <i class="bx bx-credit-card  fa-fa-item"></i>
                                            </a>
                                        </li>

                                        <li class="{{ set_active_roote_bottom_bar('customer.colis.index') }} ">
                                            <a href="{{ route('customer.colis.index') }}" id="store">
                                                <span>Colis</span>
                                                <i class="bx bx-store-alt  fa-fa-item"></i>
                                            </a>
                                        </li>

                                        <li class="{{ set_active_roote_bottom_bar('customer.bagage.index') }} ">
                                            <a href="{{ route('customer.bagage.index') }}" id="wishlist">
                                                <span>Bagages</span>
                                                <i class="bx bx-package  fa-fa-item"></i>
                                            </a>
                                        </li>

                                        <li class="{{ set_active_roote_bottom_bar('setting.index') }}">
                                            <a href="#" class="header-item noti-icon right-bar-toggle" id="nav-toggle">
                                                <span>Regions</span>
                                                <i class="bx bx-map fa-item"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </main>
                            </div>

                            <div class="right-bar">
                                <div data-simplebar class="h-100">
                                    <div class="rightbar-title d-flex align-items-center px-3 py-4">

                                        <h5 class="m-0 me-2">Autres regions</h5>

                                        <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                                            <i class="mdi mdi-close noti-icon"></i>
                                        </a>
                                    </div>

                                    <div class="tab-content py-4">
                                        <div class="tab-pane show active" id="chat">
                                            <div>
                                                <ul class="list-unstyled chat-list" data-simplebar>
                                                    @foreach(region() as $region)
                                                        <li class="">
                                                            <a href="{{ route('customer.agence.region',$region->slug) }}">
                                                                <div class="media">
                                                                    <div class="align-self-center me-3">
                                                                        <img src="{{asset('admin/assets/images/map_siege.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                                                    </div>
                                                                    
                                                                    <div class="media-body overflow-hidden">
                                                                        <h5 class="text-truncate font-size-14 mb-1">{{$region->name}}</h5>
                                                                        <p class="text-truncate mb-0">{{$region->agences->count()}} agences</p>
                                                                    </div>
                                                                    {{--<div class="font-size-11">05 min</div>--}}
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end slimscroll-menu-->
                            </div>
                        @else
                            <div class="col-sm-4 footer-info-mobile">
                            TouCki © <script>
                                    document.write(new Date().getFullYear())
                                </script> 
                            </div>
                            <div class="col-sm-8 footer-info-mobile text-sm-end d-none d-sm-block">
                                Développé par KdgWeb
                            </div>
                        @endif
                    </div>
                </div>

                

            </footer>

            @section('footersection')
            @show

