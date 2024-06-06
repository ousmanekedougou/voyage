@extends('admin.layouts.app')
@section('main-content')

    <div class="page-content bg-white" id="page-content">
        <div class="container-fluid">

            <!-- start page title -->

            <div class="row sectionCompteDesktope">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <div class="text-muted">
                                                <h5 class="mb-1">Bonjour {{ Auth::guard('client')->user()->name }}</h5>
                                                <p class="mb-2">Bienvenue sur votre compte TouCki</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 align-self-center">
                                    <div class="text-lg-center mt-4 mt-lg-0">
                                        <div class="row">
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Total Agences</p>
                                                    <h5 class="mb-0">{{ $agenceCount }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Total Sieges</p>
                                                    <h5 class="mb-0">{{ $siege_all->count() }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 d-lg-block">
                                   
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                    @if($NotificationTravelDay)
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                                Salut <b>{{Auth::guard('client')->user()->name}}</b> vous devez effectuer un voyage <b>{{ $NotificationTravelDay }}</b> pour <b>{{ $getClientDate->ville->name }}</b> a {{ $getClientDate->bus->heure_depart }}
                                <br>
                                <b>Agence : {{$getClientDate->siege->agence->name}}</b> , <b>Siege de : {{$getClientDate->siege->name}}</b>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
            <!-- end row -->

            <!-- Blog start -->
                <div class="row mb-1 sectionCompteDesktope">
                    @foreach($agences as $agence)
                        <div class="col-xl-4 col-sm-6">
                            <div class="card" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="avatar-md me-4">
                                            <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                    <img src="
                                                        @if($agence->image != null)
                                                            {{Storage::url($agence->logo)}}
                                                        @else
                                                                https://ui-avatars.com/api/?name={{$agence->name}}
                                                        @endif
                                                    " alt="">
                                                
                                            </span>
                                        </div>

                                        <div class="media-body overflow-hidden">
                                            <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">{{ $agence->name }}</a></h5>
                                            {{--<p class="text-muted mb-1"> <i class="bx bx-envelope me-1"> {{ $agence->email }}</i> </p>--}}
                                            <p class="text-muted mb-1"> <i class="bx bx-mobile me-1"> {{ $agence->phone }}</i> </p>
                                        </div>
                                    </div>
                                    <div class="row p-1 text-center show-agence-lg-mobile" >
                                        <ul class="list-inline mb-0 text-center">
                                            <li class="list-inline-item me-3">
                                                <a href="{{ route('customer.agence.about',$agence->slug) }}" class="badge bg-primary text-center p-2"> <i class="bx bx-file"></i> Infos</a>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <a href="{{ route('customer.agence.show',$agence->slug) }}" class="badge bg-success text-center p-2"> <i class="bx bx-map"></i> Sieges</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                {{--
                                    <div class="px-1 py-1 border-top bg-light">
                                        <ul class="list-inline mb-0 text-center">
                                            <li class="list-inline-item me-3">
                                                <a href="{{ route('customer.agence.about',$agence->slug) }}" class="btn btn-primary btn-xs text-center"> <i class="bx bx-file"></i> Details</a>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <a href="{{ route('customer.agence.show',$agence->slug) }}" class="btn btn-primary btn-xs text-center"> <i class="bx bx-map"></i> Sieges</a>
                                            </li>
                                            <!-- La partie des docial reseau  -->
                                                <li class="list-inline-item me-3">
                                                    <a href="{{ route('customer.agence.about',$agence->slug) }}" title="Detail" class="btn btn-primary position-relative rounded-circle p-0 avatar-xs  ">
                                                        <span class="avatar-title bg-transparent text-reset">
                                                            <i class="bx bx-file"></i>  
                                                        </span>
                                                    </a>
                                                </li>

                                                <li class="list-inline-item me-3">
                                                    <a href="{{ route('customer.agence.show',$agence->slug) }}" title="Sieges" class="btn btn-light position-relative p-0 avatar-xs rounded-circle bg-primary text-white">
                                                        <span class="avatar-title bg-transparent text-reset">
                                                            <i class="bx bx-map"></i>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li class="list-inline-item me-3">
                                                    <div class="d-flex flex-wrap gap-3">

                                                        <button type="button" class="btn btn-light position-relative p-0 avatar-xs rounded-circle bg-primary text-white">
                                                            <span class="avatar-title bg-transparent text-reset">
                                                                <i class="bx bxl-facebook "></i>
                                                            </span>
                                                        </button>

                                                        <button type="button" class="btn btn-light position-relative p-0 avatar-xs rounded-circle bg-success text-white">
                                                            <span class="avatar-title bg-transparent text-reset">
                                                                <i class="bx bxl-whatsapp "></i>
                                                            </span>
                                                        </button>

                                                        <button type="button" class="btn btn-light position-relative p-0 avatar-xs rounded-circle bg-secondary text-white">
                                                            <span class="avatar-title bg-transparent text-reset">
                                                                <i class="bx bxl-instagram"></i>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </li>
                                            <!-- Fin de la partie des social reseu  -->
                                        </ul>
                                    </div>
                                --}}
                            </div>
                        </div>
                    @endforeach
                    <!-- end container -->

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="" style="margin-right:40%;">
                                <a href="javascript:void(0);" class="text-success"> {{$agences->links()}} </a>
                            </div>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->
                </div>
            <!-- end row -->
         
        </div>
        <!-- container-fluid -->

        <div class="tab-pane show active sectionCompteMobile mb-4" id="chat" style="margin-top:-2rem;">
            <div>
                <ul class="list-unstyled chat-list mb-4">
                    <li class="active">
                        <a href="#">
                            <div class="media">
                                <div class="align-self-center me-3">
                                    <img src="{{asset('admin/assets/images/icone-ticke.png')}}" class="rounded-circle avatar-xs" alt="">
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-14 mb-1">{{ Auth::guard('client')->user()->name }}</h5>
                                    <p class="text-truncate mb-0">Bienvenue sur TouCki</p>
                                </div>
                                <div class="font-size-11">Agences ({{ $agences->count() }}) </div>
                            </div>
                        </a>
                    </li>
                </ul>

                @if($NotificationTravelDay)
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        Salut <b>{{Auth::guard('client')->user()->name}}</b> vous devez effectuer un voyage <b>{{ $NotificationTravelDay }}</b> pour <b>{{ $getClientDate->ville->name }}</b> a {{ $getClientDate->bus->heure_depart }}
                        <br>
                        <b>Agence : {{$getClientDate->siege->agence->name}}</b> <br> <b>Siege de : {{$getClientDate->siege->name}}</b>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            
                <ul class="list-unstyled chat-list">
                    {{-- data-simplebar style="max-height: 410px;" --}}
                @foreach($agences as $agence)
                    <li class="mb-2">
                        <div class="media">
                            <div class="align-self-center me-3" onclick="location.href='{{route('customer.agence.show',$agence->slug)}}'">
                                    <img src="

                                    @if($agence->image != null)
                                        {{Storage::url($agence->logo)}}
                                    @else
                                            https://ui-avatars.com/api/?name={{$agence->name}}
                                    @endif
                                    
                                    " class="rounded-circle avatar-xs" alt="">
                            </div>
                            
                            <div class="media-body overflow-hidden" onclick="location.href='{{route('customer.agence.show',$agence->slug)}}'">
                                <h5 class="text-truncate font-size-11 mb-1" style="font-weight:600;">{{ $agence->name }}</h5>
                                <p class="text-truncate mb-0 font-size-10"> <i class="bx bx-mobile-alt "></i> {{ $agence->phone }}</p>
                            </div>
                            
                            <div class="">
                                <span class="span-chat-siege span-chat1 rounded-circle font-size-10" style="margin-right: 5px;">
                                    {{ $agence->sieges->count() }} Siege(s)
                                </span>
                                <span class="span-chat-siege span-chat1 text-info font-size-13" onclick="location.href='{{route('customer.agence.about',$agence->slug)}}'">
                                    <i class="bx bx-info-circle"></i>
                                </span>
                            </div>
                        </div>
                    </li>
                    <br>
                @endforeach
                    {{--
                    <li>
                        <a href="#">
                            <div class="media">
                                <div class="align-self-center me-3">
                                    <i class="mdi mdi-circle font-size-10"></i>
                                </div>

                                <div class="avatar-xs align-self-center me-3">
                                    <span class="avatar-title rounded-circle bg-primary bg-soft text-primary">
                                        M
                                    </span>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-14 mb-1">Mitchel Givens</h5>
                                    <p class="text-truncate mb-0">Hey! there I'm available</p>
                                </div>
                                <div class="font-size-11">3 hrs</div>
                            </div>
                        </a>
                    </li>
                    --}}
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page-content -->
@endsection