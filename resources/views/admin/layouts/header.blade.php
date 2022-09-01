        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        @if(Auth::guard('agent')->user())
                            <a href="{{ route('agent.home') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <!-- <span class="text-bold text-uppercase text-white"></span> -->
                                    @if(Auth::guard('agent')->user()->agence->logo == null)
                                        <img src="{{asset('admin/assets/images/bus.svg')}}" alt="" height="22">
                                    @else
                                        <img src="{{Storage::url(Auth::guard('agent')->user()->agence->logo)}}" alt="" height="22">
                                    @endif
                                </span>
                                <span class="logo-lg">
                                    <span class="text-bold text-uppercase text-white">{{Auth::guard('agent')->user()->name}}</span>
                                     @if(Auth::guard('agent')->user()->agence->logo == null)
                                        <img src="{{asset('admin/assets/images/bus.svg')}}" alt="" height="17">
                                    @else
                                        <img src="{{Storage::url(Auth::guard('agent')->user()->agence->logo)}}" alt="" height="17">
                                    @endif
                                </span>
                            </a>

                            <a href="{{ route('agent.home') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <!-- <span class="text-bold text-uppercase text-white">{{Auth::guard('agent')->user()->logo}}</span> -->
                                    @if(Auth::guard('agent')->user()->agence->logo == null)
                                        <img src="{{asset('admin/assets/images/bus.svg')}}" alt="" height="22">
                                    @else
                                        <img src="{{Storage::url(Auth::guard('agent')->user()->agence->logo)}}" alt="" height="22">
                                    @endif
                                </span>
                                <span class="logo-lg">
                                     <span class="text-bold text-uppercase text-white" style="font-size: 14px;margin-left:-25px;">{{Auth::guard('agent')->user()->agence->name}}</span>
                                    
                                    @if(Auth::guard('agent')->user()->agence->logo == null)
                                        <img src="{{asset('admin/assets/images/bus.svg')}}" alt=""  style="width: 50px;height:50px;border-radius:100%;">
                                    @else
                                        <img src="{{Storage::url(Auth::guard('agent')->user()->agence->logo)}}" alt="" style="width: 50px;height:50px;border-radius:100%;">
                                    @endif
                                </span>
                            </a>
                        @endif
                        @if(Auth::guard('agence')->user())
                               <a href="{{ route('agence.agence.home') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <!-- <span class="text-bold text-uppercase text-white"></span> -->
                                    @if(Auth::guard('agence')->user()->logo == null)
                                        <img src="{{asset('admin/assets/images/bus.svg')}}" alt="" height="22">
                                    @else
                                        <img src="{{Storage::url(Auth::guard('agence')->user()->logo)}}" alt="" height="22">
                                    @endif
                                </span>
                                <span class="logo-lg">
                                    <span class="text-bold text-uppercase text-white">{{Auth::guard('agence')->user()->name}}</span>
                                     @if(Auth::guard('agence')->user()->logo == null)
                                        <img src="{{asset('admin/assets/images/bus.svg')}}" alt="" height="17">
                                    @else
                                        <img src="{{Storage::url(Auth::guard('agence')->user()->logo)}}" alt="" height="17">
                                    @endif
                                </span>
                            </a>

                            <a href="{{ route('agence.agence.home') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <!-- <span class="text-bold text-uppercase text-white">{{Auth::guard('agence')->user()->agence_name}}</span> -->
                                    @if(Auth::guard('agence')->user()->logo == null)
                                        <img src="{{asset('admin/assets/images/bus.svg')}}" alt="" height="22">
                                    @else
                                        <img src="{{Storage::url(Auth::guard('agence')->user()->logo)}}" alt="" height="22">
                                    @endif
                                </span>
                                <span class="logo-lg">
                                     <span class="text-bold text-uppercase text-white" style="font-size: 14px;margin-left:-25px;">{{Auth::guard('agence')->user()->name}}</span>
                                    
                                    @if(Auth::guard('agence')->user()->logo == null)
                                        <img src="{{asset('admin/assets/images/bus.svg')}}" alt=""  style="width: 50px;height:50px;border-radius:100%;">
                                    @else
                                        <img src="{{Storage::url(Auth::guard('agence')->user()->logo)}}" alt="" style="width: 50px;height:50px;border-radius:100%;">
                                    @endif
                                </span>
                            </a>
                        @endif
                        @if(Auth::guard('web')->user())
                            <a href="{{ route('admin.home') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    @if(Auth::guard('web')->user()->logo == null)
                                    <img src="{{asset('admin/assets/images/bus.svg')}}" alt="" height="22">
                                    @else
                                    <img src="{{Storage::url(Auth::guard('web')->user()->logo)}}}" alt="" height="22">
                                    @endif
                                </span>
                                <span class="logo-lg">
                                    <span class="text-bold text-uppercase text-white">{{Auth::guard('web')->user()->name}}</span>
                                    @if(Auth::guard('web')->user()->logo == null)
                                    <img src="{{asset('admin/assets/images/bus.svg')}}" alt="" height="17">
                                    @else
                                    <img src="{{Storage::url(Auth::guard('web')->user()->logo)}}}" alt="" height="17">
                                    @endif
                                </span>
                            </a>

                            <a href="{{ route('admin.home') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    @if(Auth::guard('web')->user()->logo == null)
                                    <img src="{{asset('admin/assets/images/bus.svg')}}" alt="" height="22">
                                    @else
                                    <img src="{{Storage::url(Auth::guard('web')->user()->logo)}}}" alt="" height="22">
                                    @endif
                                </span>
                                <span class="logo-lg">
                                    <span class="text-bold text-uppercase text-white">{{Auth::guard('web')->user()->name}}</span>
                                    @if(Auth::guard('web')->user()->logo == null)
                                    <img src="{{asset('admin/assets/images/bus.svg')}}" alt="" height="19">
                                    @else
                                    <img src="{{Storage::url(Auth::guard('web')->user()->logo)}}}" alt="" height="19">
                                    @endif
                                </span>
                            </a>
                        @endif

                        @if(Auth::guard('client')->user())                        
                            <a href="{{ route('customer.home') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    @if(Auth::guard('client')->user()->image == null)
                                    <img src="{{ asset('admin/assets/images/users/profil.jpg') }}" alt="" height="22">
                                    @else
                                    <img src="{{Storage::url(Auth::guard('client')->user()->image)}}}" alt="" height="22">
                                    @endif
                                </span>
                                <span class="logo-lg">
                                    <span class="text-bold text-uppercase text-white">{{Auth::guard('client')->user()->name}}</span>
                                    @if(Auth::guard('client')->user()->image == null)
                                    <img src="{{ asset('admin/assets/images/users/profil.jpg') }}" alt="" height="17">
                                    @else
                                    <img src="{{Storage::url(Auth::guard('client')->user()->image)}}}" alt="" height="17">
                                    @endif
                                </span>
                            </a>

                            <a href="{{ route('customer.home') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    @if(Auth::guard('client')->user()->image == null)
                                    <img src="{{ asset('admin/assets/images/users/profil.jpg') }}" alt="" height="22">
                                    @else
                                    <img src="{{Storage::url(Auth::guard('client')->user()->image)}}}" alt="" height="22">
                                    @endif
                                </span>
                                <span class="logo-lg">
                                    <span class="text-bold text-uppercase text-white">{{Auth::guard('client')->user()->name}}</span>
                                    @if(Auth::guard('client')->user()->image == null)
                                        <img src="{{ asset('admin/assets/images/users/profil.jpg') }}" alt="" height="19">
                                    @else
                                        <img src="{{Storage::url(Auth::guard('client')->user()->image)}}}" alt="" height="19">
                                    @endif
                                </span>
                            </a>
                        @endif
                    </div>
                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    
                    {{--
                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bx bx-search-alt"></span>
                        </div>
                    </form>
                    --}}
                </div>

                <div class="d-flex">
                    {{--
                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img id="header-lang-img" src="{{asset('admin/assets/images/flags/us.jpg')}}" alt="Header Language"
                                height="16">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="en">
                                <img src="{{asset('admin/assets/images/flags/us.jpg')}}" alt="user-image" class="me-1" height="12"> <span
                                    class="align-middle">English</span>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                                <img src="{{asset('admin/assets/images/flags/spain.jpg')}}" alt="user-image" class="me-1" height="12">
                                <span class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                                <img src="{{asset('admin/assets/images/flags/germany.jpg')}}" alt="user-image" class="me-1" height="12">
                                <span class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                                <img src="{{asset('admin/assets/images/flags/italy.jpg')}}" alt="user-image" class="me-1" height="12">
                                <span class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                                <img src="{{asset('admin/assets/images/flags/russia.jpg')}}" alt="user-image" class="me-1" height="12">
                                <span class="align-middle">Russian</span>
                            </a>
                        </div>
                    </div>

                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-customize"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <div class="px-lg-2">
                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/github.png" alt="Github">
                                            <span>GitHub</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                            <span>Bitbucket</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                            <span>Dribbble</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                            <span>Dropbox</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/mail_chimp.png" alt="mail_chimp">
                                            <span>Mail Chimp</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/slack.png" alt="slack">
                                            <span>Slack</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    --}}
                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="bx bx-fullscreen"></i>
                        </button>
                    </div>
                    
                    @if(Auth::guard('agent')->user() && Auth::guard('agent')->user()->role == 1)
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="bx bx-bell bx-tada"></i>
                            <span class="badge bg-danger rounded-pill">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0" key="t-notifications"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small" key="t-view-all"> View All</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="#" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="bx bx-cart"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1" key="t-your-order">Your order is placed</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1" key="t-grammer">If several languages coalesce the
                                                    grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span
                                                        key="t-min-ago">3 min ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="text-reset notification-item">
                                    <div class="media">
                                        <img src="assets/images/users/avatar-3.jpg"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">James Lemire</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1" key="t-simplified">It will seem like simplified English.
                                                </p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span
                                                        key="t-hours-ago">1 hours ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                                <i class="bx bx-badge-check"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1" key="t-shipped">Your item is shipped</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1" key="t-grammer">If several languages coalesce the
                                                    grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span
                                                        key="t-min-ago">3 min ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="text-reset notification-item">
                                    <div class="media">
                                        <img src="assets/images/users/avatar-4.jpg"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Salena Layfield</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1" key="t-occidental">As a skeptical Cambridge friend of
                                                    mine occidental.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span
                                                        key="t-hours-ago">1 hours ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top d-grid">
                                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                    <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View
                                        More..</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(Auth::guard('web')->user())
                                @if(Auth::guard('web')->user()->logo !== null)
                                <img class="rounded-circle header-profile-user" src="{{ Storage::url(Auth::guard('web')->user()->logo) }}"
                                    alt="Header Avatar">
                                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"> {{ Auth::guard('web')->user()->name }}</span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                @else
                                 <img class="rounded-circle header-profile-user" src="{{ asset('admin/assets/images/users/profil.jpg') }}"
                                alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry"> {{ Auth::guard('web')->user()->name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                @endif
                            @endif

                            @if(Auth::guard('agence')->user())
                                @if(Auth::guard('agence')->user()->logo !== null)
                                <img class="rounded-circle header-profile-user" src="{{ Storage::url(Auth::guard('agence')->user()->logo) }}"
                                    alt="Header Avatar">
                                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"> {{ Auth::guard('agence')->user()->name }}</span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                @else
                                 <img class="rounded-circle header-profile-user" src="{{ asset('admin/assets/images/users/profil.jpg') }}"
                                alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry"> {{ Auth::guard('agence')->user()->name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                @endif
                            @endif

                             @if(Auth::guard('agent')->user())
                                @if(Auth::guard('agent')->user()->logo !== null)
                                <img class="rounded-circle header-profile-user" src="{{ Storage::url(Auth::guard('agent')->user()->logo) }}"
                                    alt="Header Avatar">
                                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"> {{ Auth::guard('agent')->user()->name }}</span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                @else
                                 <img class="rounded-circle header-profile-user" src="{{ asset('admin/assets/images/users/profil.jpg') }}"
                                alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry"> {{ Auth::guard('agent')->user()->name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                @endif
                            @endif

                             @if(Auth::guard('client')->user())
                                @if(Auth::guard('client')->user()->image == null)
                                     <img class="rounded-circle header-profile-user" src="{{ asset('admin/assets/images/users/profil.jpg') }}"
                                alt="Header Avatar">
                                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"> {{ Auth::guard('client')->user()->name }}</span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                @else
                                <img class="rounded-circle header-profile-user" src="{{ Storage::url(Auth::guard('client')->user()->image) }}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry"> {{ Auth::guard('client')->user()->name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                @endif
                            @endif
                            {{--
                            <span class="d-none d-xl-inline-block ms-1" key="t-henry"> name</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            --}}
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            @if(Auth::guard('web')->user())
                            <a class="dropdown-item" href="{{ route('admin.profil.show',Auth::guard('web')->user()->slug) }}"><i class="bx bx-user font-size-16 align-middle me-1"></i>
                                <span key="t-profile">Profile</span></a>
                            @elseif(Auth::guard('agence')->user())
                             <a class="dropdown-item" href="{{ route('agence.profil.show',Auth::guard('agence')->user()->slug) }}"><i class="bx bx-user font-size-16 align-middle me-1"></i>
                                <span key="t-profile">Profile</span></a>
                            @elseif(Auth::guard('agent')->user())
                             <a class="dropdown-item" href="{{ route('agent.profil.show',Auth::guard('agent')->user()->slug) }}"><i class="bx bx-user font-size-16 align-middle me-1"></i>
                                <span key="t-profile">Profile</span></a>
                            @elseif(Auth::guard('client')->user())
                             <a class="dropdown-item" href="{{ route('customer.profil.show',Auth::guard('client')->user()->slug) }}"><i class="bx bx-user font-size-16 align-middle me-1"></i>
                                <span key="t-profile">Profile</span></a>
                            @endif
                            {{--
                            <a class="dropdown-item" href=""><i
                                    class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My
                                    Wallet</span></a>
                            <a class="dropdown-item d-block" href=""><span
                                    class="badge bg-success float-end">11</span><i
                                    class="bx bx-wrench font-size-16 align-middle me-1"></i> <span
                                    key="t-settings">Settings</span></a>
                            <a class="dropdown-item" href=""><i
                                    class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span
                                    key="t-lock-screen">Lock screen</span></a>
                            --}}
                            <div class="dropdown-divider"></div>

                            @if(Auth::guard('web')->user())
                            <a class="dropdown-item text-danger" href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form-1').submit();"><i
                                    class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                    key="t-logout" >Deconexion</span></a>
                                     <form id="logout-form-1" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            @elseif(Auth::guard('agence')->user())
                            <a class="dropdown-item text-danger" href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form-2').submit();"><i
                                    class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                    key="t-logout" >Deconexion</span></a>
                                     <form id="logout-form-2" action="{{ route('agence.agence.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            @elseif(Auth::guard('agent')->user())
                            <a class="dropdown-item text-danger" href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form-3').submit();"><i
                                    class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                    key="t-logout" >Deconexion</span></a>
                                     <form id="logout-form-3" action="{{ route('agent.agent.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            @elseif(Auth::guard('client')->user())
                            <a class="dropdown-item text-danger" href="" onclick="event.preventDefault();
                                    document.getElementById('logout-form-4').submit();"><i
                                    class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                    key="t-logout" >Deconexion</span></a>
                                     <form id="logout-form-4" action="{{ route('customer.customer.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            @endif
                        </div>
                    </div>

                </div>
          
            </div>
            
        </header>

         {!! Toastr::message() !!}

       

         