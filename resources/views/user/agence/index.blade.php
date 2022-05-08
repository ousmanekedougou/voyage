@extends('user.layouts.app',['title' => 'Agence'])
 <meta name="csrf-token" content="{{ csrf_token() }}">
@section('main-content')

 

   <!-- hero section start -->
    <section class="section hero-section bg-ico-hero bg-agence"  id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal" style="margin-top: -70px;" >
                <div class="col-lg-offset-8 card_show">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-2 hero-title text-center">Voyage par tout au sénégal avec nos agences </h1>
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
                     <div class="col-md-2">
                    </div>
                     <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('agence.search') }}" method="post" style="margin-bottom: -15px;">
                                    <div class="row">
                                        @csrf
                                        <div class="col-md-9">
                                            <div class="mb-3">
                                                <input  type="text" id="q" class="form-control @error('q') is-invalid @enderror bg-default p-3" name="q" value="{{ old('q') }}" required autocomplete="q" parsley-type="q"
                                                    placeholder="Recherchez une agence de transport" />
                                                    @error('q')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" style="width: 100%;" class="btn btn-outline-primary p-3">Recherche</button>
                                        </div>
                                    </div>
                                </form>
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
                                        @if($agence->image_agence != Null)
                                        <img src="{{Storage::url($agence->image_agence)}}" alt="" height="30">
                                        @else
                                        <i class="fa fa-bus"></i>
                                        @endif
                                    </span>
                                </div>

                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">{{ $agence->name_agence }}</a></h5>
                                    <p class="text-muted mb-1"> <i class="bx bx-envelope me-1"> {{ $agence->email_agence }}</i> </p>
                                    <p class="text-muted mb-1"> <i class="bx bx-mobile me-1"> {{ $agence->agence_phone }}</i> </p>
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
                                    <a href="{{ route('agence.show',$agence->slug) }}" class="btn btn-success btn-xs"><i class="bx bx-show me-1"></i>Voir nos sieges</a>
                                </li>
                                {{--
                                <li class="list-inline-item me-3">
                                    <a href="{{ route('agence.about',$agence->slug) }}" class="btn btn-primary btn-xs"><i class="bx bx-file me-1"></i>A propos</a>
                                </li>
                                --}}
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
        
    </section>
    <!-- Blog end -->

    

 
           
@endsection