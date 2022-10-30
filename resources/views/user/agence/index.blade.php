@extends('user.layouts.app',['title' => 'Agence'])
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <style>
    .scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
}
.bg-agence{
    background-image:url(./user/assets/images/agence.webp) !important;
    background-size:cover;background-position:top !important;
    height: 100px !important;
 }
 </style>
@section('main-content')
   <!-- hero section start -->
    <section class="section hero-section bg-ico-hero bg-agence section-responsive" id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal" style="margin-top: -70px;" >
                <div class="col-lg-offset-8 card_show">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-2 hero-title text-center">Voyagez par tout au sénégal avec nos agences </h1>
                        <p class="font-size-16 text-white text-center">
                            Plus de {{$agenceCount}} compagnies de voyages nous font confiance pour vendre leurs billets sur une seule plateforme.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->
    
     <!-- currency price section start -->
    <section class="section p-0 section-search">
        <div class="container">
            <div class="currency-price">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-xl-8 col-sm-12">
                        <div class="card p-1">
                            <div class="row">
                                <div class="col-md-8 pt-3">
                                    <div class="search-box d-inline-block" style="width: 100%">
                                        <div class="position-relative">
                                                <form id="searchClients"  action=" {{ route('agence.search') }} " method="post">
                                                     @csrf
                                                    <input  type="text" id="recherche" class="form-control @error('recherche') is-invalid @enderror" name="recherche"  required autocomplete="recherche" value="{{ request()->recherche ?? old('recherche') }}" placeholder="Rechercher une agence de transport">
                                                    @error('recherche')
                                                        <span class="invalid-feedback text-center" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </form>
                                                <a onclick="event.preventDefault();document.getElementById('searchClients').submit();">
                                                    <i class="bx bx-search-alt search-icon"></i>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <div class="btn-group" style="width: 100%;">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Agences d'autres regions <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end scrollable-menu" style="width: 100%;">
                                            @foreach($autre_regions as $region)
                                                <a href="{{ route('agence.region',$region->slug) }}" class="dropdown-item" >
                                                    <i class="fa fa-city"></i> {{$region->name}}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- currency price section end -->
    
  
    <!-- Blog start -->
    <section class="section" id="agence" style="margin-top: -80px;">
        <div class="container">
            <div class="row">
                @foreach($agences as $agence)
                <div class="col-xl-4 col-sm-6">
                    <div class="card" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                        <div class="card-body">
                            <div class="media">
                                <div class="avatar-md me-4">
                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                        @if($agence->logo != Null)
                                        <img src="{{Storage::url($agence->logo)}}" alt="" height="30">
                                        @else
                                        <i class="fa fa-bus"></i>
                                        @endif
                                    </span>
                                </div>

                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">{{ $agence->name }}</a></h5>
                                    <p class="text-muted mb-1"> <i class="bx bx-envelope me-1"> {{ $agence->email }}</i> </p>
                                    <p class="text-muted mb-1"> <i class="bx bx-mobile me-1"> {{ $agence->phone }}</i> </p>
                                </div>
                            </div>
                        </div>
                        <div class="row p-0" style="margin-top: -15px;">
                            <h6 class="text-center"> <i class="fa fa-blog badge bg-success"> Slogan</i></h6>
                            <p class="text-muted text-center">{{ $agence->slogan }}</p>
                        </div>
                        <div class="px-4 py-3 border-top bg-light">
                            <ul class="list-inline mb-0 text-center">
                                
                                <li class="list-inline-item me-3">
                                    <a href="{{ route('agence.show',$agence->slug) }}" class="btn btn-success btn-xs"><i class="bx bx-show me-1"></i>Nos sieges</a>
                                </li>
                                
                                
                                <li class="list-inline-item me-3">
                                    <a href="{{ route('agence.about',$agence->slug) }}" class="btn btn-primary btn-xs"><i class="bx bx-file me-1"></i>A propos</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- end container -->
                <div class="row ">
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
        <button id="agenceBtn"> <i class="fa fa-plus"></i> </button>
    </section>
    <!-- Blog end -->

    

 
           
@endsection
