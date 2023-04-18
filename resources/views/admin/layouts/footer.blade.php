            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        @if(Auth::guard('client')->user())
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

                                    <li class="{{ set_active_roote_bottom_bar('customer.bagage.index') }} ">
                                        <a href="{{ route('customer.colis.index') }}" id="store">
                                            <span>Colis</span>
                                            <i class="bx bx-store-alt  fa-fa-item"></i>
                                        </a>
                                    </li>

                                    <li class="{{ set_active_roote_bottom_bar('customer.colis.index') }} ">
                                        <a href="{{ route('customer.bagage.index') }}" id="wishlist">
                                            <span>Bagages</span>
                                            <i class="bx bx-package  fa-fa-item"></i>
                                        </a>
                                    </li>

                                    <li class="{{ set_active_roote_bottom_bar('setting.index') }}">
                                        <a href="#" class="header-item noti-icon right-bar-toggle" id="nav-toggle">
                                            <span>Regions</span>
                                            <i class="bx bx-map fa-fa-item"></i>
                                        </a>
                                    </li>
                                </ul>
                            </main>
                        </div>
                        
                        @else

                        <div class="col-sm-4 footer-info-mobile">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © TouCki
                        </div>
                        <div class="col-sm-8 footer-info-mobile text-sm-end d-none d-sm-block">
                                Développé par KdgWeb
                        </div>
                        @endif

                    </div>
                </div>

                <div class="right-bar">
                    <div data-simplebar class="h-100">
                        <div class="rightbar-title d-flex align-items-center px-3 py-4">

                            <h5 class="m-0 me-2">Agences d'autres regions</h5>

                            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                                <i class="mdi mdi-close noti-icon"></i>
                            </a>
                        </div>

                        <!-- Settings -->
                        @foreach(region() as $region)
                        <hr class="" />
                        <div class="p-1">
                            <a href="{{ route('customer.agence.region',$region->slug) }}" class="region-list">
                                <i class="bx bx-map align-middle me-2"></i> {{$region->name}}
                            </a>
                        </div>
                        @endforeach

                    </div> <!-- end slimscroll-menu-->
                </div>

            </footer>

            @section('footersection')
            @show

