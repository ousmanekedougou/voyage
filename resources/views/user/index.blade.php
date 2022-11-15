@extends('user.layouts.app',['title' => 'Acceuil'])

@section('main-content')
  <!-- hero section start -->
    <section class="section">
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <img src="{{ asset('user/assets/images/bus.svg') }}" alt="" class="avatar-sm me-4">

                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15">Plateforme TouCki</h5>
                                    <p class="text-muted">Separate existence is a myth. For science, music,
                                        sport, etc.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7">
                                    <h4 class="mb-4">Toutes les options de voyage sur TouCki</h4>

                                    <p class="text-muted mb-4 text-justify">
                                        Grâce à un réseau développé au Sénégal, de nombreux trajets en bus et car pas chers de courte et longue-distance vous sont proposés par des compagnies routières renommées. 
                                        <br> Voyager en bus, c’est choisir des trajets à prix réduits dans tout le Sénégal, comparés au train et à l’avion.
                                        <br> Avec des itinéraires quotidiens vers les villes et capitales du pays, vous pouvez organiser des escapades parfaitement adaptées à tous les budgets.
                                    </p>

                                    <div class="button-items mb-3 mt-3">
                                        <a href="{{ route('setting.index') }}" target="_blank" class="btn btn-xs text-uppercase btn-primary">Commencer</a>
                                    </div> 

                                    <div class="text-muted mt-4">
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> To achieve this, it
                                            would be necessary</p>
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Separate existence is
                                            a myth.</p>
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> If several languages
                                            coalesce</p>
                                    </div>

                                     
                                </div>
                                <div class="col-lg-5">
                                    <img src="{{ asset('user/assets/images/bus.svg') }}" alt="" class="img-fluid mx-auto d-block" style="width: 100%;">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="avatar-xs me-3">
                                                    <span
                                                        class="avatar-title rounded-circle bg-info bg-soft text-warning font-size-18">
                                                        <i class="fa fa-ticket-alt"></i>
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h6>Billets sur votre mobile</h6>
                                                    <p class="text-muted  mb-0">Accès facile à vos billets, bagages et colis peu importe votre destination</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="avatar-xs me-3">
                                                    <span
                                                        class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                        <i class="fa fa-ruler-combined"></i>
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h6>Planifier votre voyages</h6>
                                                    <p class="text-muted  mb-0">Tout ce dont vous avez besoin dans une seule application</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="avatar-xs me-3">
                                                    <span
                                                        class="avatar-title rounded-circle bg-success bg-soft text-info font-size-18">
                                                        <i class="fa fa-envelope-open-text"></i>
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h6>Notifications en temps réel</h6>
                                                    <p class="text-muted  mb-0">Mises à jour et rappels tout au long du trajet pour un voyage réussi</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->


                            
                        </div>
                    </div>
                </div>
                <!-- end col -->
                 <div class="col-lg-1"></div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->

    {{-- 
    <section class="section p-0 home-section-mobile">
        <div class="container">
            <div class="row">
                <img class="setting-img" src="{{asset('user/assets/images/bus.svg') }}" alt="" srcset="">
            </div>
        </div>
    </section>
    --}}



     <!-- Features start -->
    <section class="section" id="features" style="margin-top: -85px;">
        <div class="container">
            <div class="row">
                 <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="" style="font-weight: 600;">Pourquoi TouCki ?</h4>

                            <p class="text-muted"> Nous sommes convaincus que le digital est un facteur de croissance et de survie pour toutes entreprises quels que soient la taille et le secteur, c’est pourquoi nous nous engageons à vous accompagner à maximiser votre performance et vos résultats grâce à la digitalisation. </p>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="avatar-xs me-3">
                                                    <span
                                                        class="avatar-title rounded-circle bg-info bg-soft text-warning font-size-18">
                                                        <i class="fa fa-ticket-alt"></i>
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h6>Billets sur votre mobile</h6>
                                                    <p class="text-muted  mb-0">Accès facile à vos billets, bagages et colis peu importe votre destination</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="avatar-xs me-3">
                                                    <span
                                                        class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                        <i class="fa fa-ruler-combined"></i>
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h6>Planifier votre voyages</h6>
                                                    <p class="text-muted  mb-0">Tout ce dont vous avez besoin dans une seule application</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="avatar-xs me-3">
                                                    <span
                                                        class="avatar-title rounded-circle bg-success bg-soft text-info font-size-18">
                                                        <i class="fa fa-envelope-open-text"></i>
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h6>Notifications en temps réel</h6>
                                                    <p class="text-muted  mb-0">Mises à jour et rappels tout au long du trajet pour un voyage réussi</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->


                            <h5 class="text-center mt-5">Des relations de confiance</h5>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="owl-carousel owl-theme clients-carousel" id="clients-carousel" dir="ltr">
                                        @foreach( part() as $part)
                                            <div class="item">
                                                <div class="client-images">
                                                    <a href="{{ $part->lien }}" target="_blank" rel="noopener noreferrer">
                                                    <img src="{{ Storage::url($part->logo) }}" alt="client-img"
                                                        class="mx-auto img-fluid d-block">
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                        </div>
                    </div>
                </div>
                <!-- end col -->
                 <div class="col-lg-1"></div>
            </div>
            <!-- end row -->
        </div>
    </section>



      <!-- Features start -->
    <section class="section" id="features" style="margin-top: -85px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center bg-white">
                                <div class="col-md-6 ms-auto">
                                    <div class="mt-4 mt-md-auto">
                                        <div class="d-flex align-items-center mb-2">
                                        {{--<div class="features-number font-weight-semibold display-4 me-3">02</div>--}}
                                            <h4 class="mb-0">L'application incontournable des voyageurs</h4>
                                        </div>
                                        <p class="text-muted">
                                            Téléchargez gratuitement l'application TouCki pour bénéficier d’une expertise de qualité et organiser de vos voyages en toute confiance.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <img src="{{('user/assets/images/updateClient.svg')}}" alt="" class="img-fluid mx-auto d-block">
                                        <div class="button-items mb-3 text-center">
                                            <a href="" class="btn btn-outline-primary"> <i class="bx bxl-play-store"></i> Play Store</a>
                                            <a href="" class="btn btn-outline-success"> <i class="bx bxl-apple"></i> App Store</a>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- Features end -->

@endsection