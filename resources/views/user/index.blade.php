@extends('user.layouts.app',['title' => 'Acceuil'])
<style>
.btn-block-for-agence-create,.btn-block-for-client-create{
    width: 100%;
}
</style>
@section('main-content')
  <!-- hero section start -->
    <section class="section hero-section bg-ico-hero section-responsive">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal" style="margin-top: -70px;" >
                <div class="card_show">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">Yombalal Toucki Thi Biir Réwmi</h1>
                        <p class="font-size-16 text-white">
                            Toutes les options de voyage sur une seule plateforme
                        </p>

                        <div class="button-items mt-4">
                            <a href="{{ route('setting.index') }}" class="btn btn-light"><i class="fa fa-cog"></i> Comment ça marche</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->

    <section class="section p-0 home-section-mobile">
        <div class="container">
            <div class="row">
                <img class="setting-img" src="{{asset('user/assets/images/bus.svg') }}" alt="" srcset="">
            </div>
        </div>
    </section>

 <!-- currency price section start Version mobile  // section_sm-->
    <section class="section p-0 bg-white section-collumn">
        <div class="container">
            <div class="currency-price">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-xs me-3">
                                        <span
                                            class="avatar-title rounded-circle bg-info bg-soft text-warning font-size-18">
                                            <i class="fa fa-ticket-alt"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h5>Billets sur votre mobile</h5>
                                        <p class="text-muted  mb-0">Accès facile à vos billets,vos colis et vos bagages, peu importe votre destination</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-xs me-3">
                                        <span
                                            class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                            <i class="fa fa-ruler-combined"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h5>Planificateur de voyages</h5>
                                        <p class="text-muted  mb-0">Tout ce dont vous avez besoin dans une seule application</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-xs me-3">
                                        <span
                                            class="avatar-title rounded-circle bg-success bg-soft text-info font-size-18">
                                            <i class="fa fa-envelope-open-text"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h5>Notifications en temps réel</h5>
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
        <!-- end container -->
    </section>
<!-- currency price section end -->
    

  
   <!-- about section start -->
    <section class="section pt-0 mb-5 bg-white" id="about">
        <div class="container">
            <div class="row align-items-center p-1">
                <div class="col-lg-5">
                    <div class="text-muted">
                        <h4 class="mb-4">Toutes les options de voyage sur TouCki</h4>
                        <p class="text-muted mb-4 text-justify">
                            Grâce à un réseau développé au Sénégal, de nombreux trajets en bus et car pas chers de courte et longue-distance vous sont proposés par des compagnies routières renommées. 
                            <br> Voyager en bus, c’est choisir des trajets à prix réduits dans tout le Sénégal, comparés au train et à l’avion.
                            <br> Avec des itinéraires quotidiens vers les villes et capitales du pays, vous pouvez organiser des escapades parfaitement adaptées à tous les budgets.
                        </p>
                    </div>
                    <div class="text-muted mt-4">
                        <p class="mb-2"><i class="mdi mdi-circle-medium text-success me-1"></i>Donec pede justo vel
                            aliquet</p>
                        <p><i class="mdi mdi-circle-medium text-success me-1"></i>Aenean et nisl sagittis</p>
                    </div>
                    <div class="button-items mb-3">
                        <a href="#whileAgence" class="btn btn-primary btn-block-for-agence-create text-uppercase"> <i class="bx bxs-institution"></i> Pour Quoi avoir un compte agence ou client sur TouCki ?</a>
                    </div> 
                </div>

                <div class="col-lg-6 ms-auto home-about-img">
                    <img src="{{('user/assets/images/bus.svg')}}" alt="" class="img-fluid mx-auto d-block">
                </div>
            </div>
            <!-- end row -->

            <h5 class="text-center mt-5">Des relations de confiance</h5>
            <hr class="my-5">

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
        <!-- end container -->
    </section>
    <!-- about section end -->

     <!-- Features start -->
    <section class="section p-1" id="whileAgence">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0 text-center">Pour Quoi avoir un compte agence ou client sur TouCki ?</h4>

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="mt-4">
                                        <p class="card-title-desc">
                                            Nous sommes convaincus que le digital est un facteur de croissance et de survie pour toutes entreprises quels que soient la taille et le secteur, c’est pourquoi nous nous engageons à vous accompagner à maximiser votre performance et vos résultats grâce à la digitalisation. 
                                        </p>

                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Accordion Item #1
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="text-muted">
                                                            <strong class="text-dark">This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Accordion Item #2
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="text-muted">
                                                            <strong class="text-dark">This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Accordion Item #3
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="text-muted">
                                                            <strong class="text-dark">This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree4">
                                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree4" aria-expanded="false" aria-controls="collapseThree4">
                                                    Accordion Item #4
                                                    </button>
                                                </h2>
                                                <div id="collapseThree4" class="accordion-collapse collapse" aria-labelledby="headingThree4" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="text-muted">
                                                            <strong class="text-dark">This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree5">
                                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree5" aria-expanded="false" aria-controls="collapseThree5">
                                                    Accordion Item #5
                                                    </button>
                                                </h2>
                                                <div id="collapseThree5" class="accordion-collapse collapse" aria-labelledby="headingThree5" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="text-muted">
                                                            <strong class="text-dark">This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree6">
                                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree6" aria-expanded="false" aria-controls="collapseThree6">
                                                    Accordion Item #6
                                                    </button>
                                                </h2>
                                                <div id="collapseThree6" class="accordion-collapse collapse" aria-labelledby="headingThree6" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="text-muted">
                                                            <strong class="text-dark">This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end accordion -->
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </section>

    <!-- Features start -->
    <section class="section bg-white" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 bg-primary">
                    <div class="text-center">
                        <h4 class="text-white pt-2">Créer votre compte agence de transport sur TouCki</h4>
                        <div class="small-title text-white">Features</div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row align-items-center pt-4">
                <div class="col-md-6 col-sm-8">
                    <div>
                        <img src="{{('user/assets/images/dowload/compteAgence.svg')}}" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
                <div class="col-md-5 ms-auto">
                    <div class="mt-4 mt-md-auto">
                        <div class="d-flex align-items-center mb-2">
                            <div class="features-number font-weight-semibold display-4 me-3">01</div>
                            <h4 class="mb-0">Vous avez une agence de transport routier</h4>
                        </div>
                        <p class="text-muted">If several languages coalesce, the grammar of the resulting language is
                            more simple and regular than of the individual will be more simple and regular than the
                            existing.</p>
                        <div class="text-muted mt-4">
                            <p class="mb-2"><i class="mdi mdi-circle-medium text-success me-1"></i>Donec pede justo vel
                                aliquet</p>
                            <p><i class="mdi mdi-circle-medium text-success me-1"></i>Aenean et nisl sagittis</p>
                        </div>
                    </div>
                    <div class="button-items mb-3">
                        <a href="{{ route('agence.create') }}" class="btn btn-primary btn-block-for-agence-create"> <i class="bx bxs-institution "> </i> Créer votre compte agence TouCki</a>
                    </div> 
                </div>
            </div>
            <!-- end row  -->

            <div class="row align-items-center mt-5 pt-md-5">
                    <div class="col-lg-12 bg-primary">
                        <div class="text-center">
                            <h4 class="text-white pt-2">Créer votre compte client de voyage sur TouCki</h4>
                            <div class="small-title text-white">Features</div>
                        </div>
                    </div>
                <!-- end row -->
                <div class="col-md-5">
                    <div class="mt-4 mt-md-0">
                        <div class="d-flex align-items-center mb-2">
                            <div class="features-number font-weight-semibold display-4 me-3">02</div>
                            <h4 class="mb-0">Pourquoi est-il avantageux de creer un compte client ?</h4>
                        </div>
                        <p class="text-muted">
                            Profitez pleinement de l'expérience TouCki, <br>
                            Profitez de réservations et de remboursements plus rapides ainsi que d'un accès à des réductions grâce à notre programme de parrainage.
                        </p>
                        <div class="text-muted mt-4">
                            <p class="mb-2"><i class="mdi mdi-circle-medium text-success me-1"></i>Donec pede justo vel
                                aliquet</p>
                            <p><i class="mdi mdi-circle-medium text-success me-1"></i>Aenean et nisl sagittis</p>
                        </div>
                        <div class="button-items mb-3">
                            <a href="{{ route('client.register') }}" class="btn btn-primary btn-block-for-client-create"> <i class="bx bx-user-circle"> </i> Créer votre compte client TouCki</a>
                        </div> 
                    </div>
                </div>
                <div class="col-md-6  col-sm-8 ms-md-auto">
                    <div class="mt-4 me-md-0">
                        <img src="{{('user/assets/images/dowload/compteClient.svg')}}" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Features end -->



    <!-- Features start -->
    <section class="section " id="features">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 ms-auto">
                    <div class="mt-4 mt-md-auto">
                        <div class="d-flex align-items-center mb-2">
                            <h4 class="mb-0">L'application TouCki facilite la planification de voyage</h4>
                        </div>
                        <p class="text-muted">
                            Nous méttons à votre disposition une multitude d'agences de transport. Des mises à jour de bus en direct aux billets mobiles, notre application innovante est le moyen idéal pour planifier et suivre votre voyage.
                        </p>
                        <p class="text-muted">
                            Téléchargez gratuitement l'application TouCki pour bénéficier d’une expertise de qualité et organiser de vos voyages en toute confiance.
                        </p>
                        
                        <div class="text-muted mt-4">
                            <p class="mb-2"><i class="mdi mdi-circle-medium text-success me-1"></i>Donec pede justo vel
                                aliquet</p>
                            <p><i class="mdi mdi-circle-medium text-success me-1"></i>Aenean et nisl sagittis</p>
                        </div>
                        
                    </div>
                </div>
                 <div class="col-md-6">
                    <div>
                        <img src="{{('user/assets/images/updateClient.svg')}}" style="width: 80%;" alt="" class="img-fluid mx-auto d-block">
                        <div class="button-items mb-3 text-center">
                            <a href="" class="btn btn-primary"> <i class="bx bxl-play-store"></i> Télécharger sur Play Store</a>
                            <a href="" class="btn btn-success"> <i class="bx bxl-apple"></i> Télécharger sur App Store</a>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Features end -->

@endsection