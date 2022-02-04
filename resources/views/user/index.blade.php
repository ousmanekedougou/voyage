@extends('user.layouts.app',['title' => 'Acceuil'])

@section('main-content')

     <!-- hero section start -->
     {{--
    <section class="section hero-section bg-ico-hero" id="home">
        <div class="bg-overlay bg-primary"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">Skote - Ico Landing for a
                            cryptocurrency business</h1>
                        <p class="font-size-14">It will be as simple as occidental in fact to an English person, it will
                            seem like simplified as a skeptical Cambridge</p>

                        <div class="button-items mt-4">
                            <a href="#" class="btn btn-success">Get Whitepaper</a>
                            <a href="#" class="btn btn-light">How it work</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-8 col-sm-10 ms-lg-auto">
                    <div class="card overflow-hidden mb-0 mt-5 mt-lg-0">
                        <div class="card-header text-center">
                            <h5 class="mb-0">ICO Countdown time</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center">

                                <h5>Time left to Ico :</h5>
                                <div class="mt-4">
                                    <div data-countdown="2021/12/31" class="counter-number ico-countdown"></div>
                                </div>

                                <div class="mt-4">
                                    <button type="button" class="btn btn-success w-md">Get Token</button>
                                </div>

                                <div class="mt-5">
                                    <h4 class="font-weight-semibold">1 ETH = 2235 SKT</h4>
                                    <div class="clearfix mt-4">
                                        <h5 class="float-end font-size-14">5234.43</h5>
                                    </div>
                                    <div class="progress p-1 progress-xl softcap-progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 15%"
                                            aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-label">15 %</div>
                                        </div>
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="progress-label">30 %</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    --}}
    <!-- hero section end -->

  <!-- hero section start -->
    <section class="section hero-section bg-ico-hero">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal" style="margin-top: -70px;" >
                <div class="col-lg-8 card_show">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title ">Yombalal Toucki Thi Biir Rewmi</h1>
                        <p class="font-size-20 text-white" >
                            Toutes les options de voyage sur une seule plateforme
                        </p>

                        <!-- <div class="button-items mt-4 ">
                            <a href="{{ route('agence.create') }}" class="btn btn-success">Creer votre compte agence</a>
                            <a href="{{ route('agence.index') }}" class="btn btn-light">Nos agences de transport</a>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->


    
 <!-- currency price section start -->
    <section class="section bg-white p-0 section_lg">
        <div class="container">
            <div class="currency-price">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                           <img src="{{ asset('user/assets/images/app.webp') }}" style="width:100%;" alt="" srcset="">
                                       </div>
                                    <div class="col-md-8">
                                        <h5>Billets sur votre mobile</h5>
                                        Accès facile à vos billets, peu importe votre destination, même hors connexion
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                           <img src="{{ asset('user/assets/images/planing.webp') }}" style="width:100%;" alt="" srcset="">
                                       </div>
                                    <div class="col-md-8">
                                        <h5>Planificateur de voyages à portée de main</h5>
                                       Tout ce dont vous avez besoin dans une seule application
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                           <img src="{{ asset('user/assets/images/notify.webp') }}" style="width:100%;" alt="" srcset="">
                                       </div>
                                    <div class="col-md-8">
                                        <h5>Notifications en temps réel</h5>
                                        Mises à jour et rappels tout au long du trajet pour un voyage réussi
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


 <!-- currency price section start -->
    <section class="section bg-white p-0 section_sm">
        <div class="container">
            <div class="currency-price">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-xs me-3">
                                        <span
                                            class="avatar-title rounded-circle bg-warning bg-soft text-warning font-size-18">
                                            <i class="mdi mdi-bitcoin"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h5>Billets sur votre mobile</h5>
                                        <p class="text-muted  mb-0">Accès facile à vos billets, peu importe votre destination, même hors connexion</p>
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
                                            <i class="mdi mdi-ethereum"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h5>Planificateur de voyages à portée de main</h5>
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
                                            class="avatar-title rounded-circle bg-info bg-soft text-info font-size-18">
                                            <i class="mdi mdi-litecoin"></i>
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
    <section class="section pt-4 bg-white" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">A propos de TouCki</div>
                        <h4>TouCki est l’application tout-en-un des voyageurs</h4>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5">

                    <div class="text-muted">
                        <h4>Réservez vos billets de bus avec TouCki</h4>
                        <p>
                            Recherchez, comparez et réservez vos billets de bus en toute simplicité sur TouCki ! <br> Notre plateforme tout-en-un est également un comparateur bus qui vous permet de visualiser tous les trajets de bus de différents transporteurs au Senegal et de les trier par prix, par heure de départ, ou selon le temps et le type de trajet. <br> Une fois votre itinéraire choisi, il ne vous reste plus qu’à réserver votre bus en quelques clics et obtenir vos billets de bus en ligne.
                            
                        </p>
                        <p class="mb-4">
                            Avec TouCki, vous profitez notamment de voyages connectés avec notre application. Embarquez rapidement avec votre billet mobile, recevez des notifications de rappele de voyage en temps réel,gestion de vos bagage et colis. Tout est à portée de main !
                        </p>

                        <div class="button-items">
                            <a href="#" class="btn btn-success">Read More</a>
                            <a href="#" class="btn btn-outline-primary">How It work</a>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-4 col-6">
                                <div class="mt-4">
                                    <h4>$ 6.2 M</h4>
                                    <p>Invest amount</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="mt-4">
                                    <h4>16245</h4>
                                    <p>Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 ms-auto">
                    <div class="mt-4 mt-lg-0">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <i class="mdi mdi-bitcoin h2 text-success"></i>
                                        </div>
                                        <h5>Lending</h5>
                                        <p class="text-muted mb-0">At vero eos et accusamus et iusto blanditiis</p>

                                    </div>
                                    <div class="card-footer bg-transparent border-top text-center">
                                        <a href="#" class="text-primary">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card border mt-lg-5">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <i class="mdi mdi-wallet-outline h2 text-success"></i>
                                        </div>
                                        <h5>Wallet</h5>
                                        <p class="text-muted mb-0">Quis autem vel eum iure reprehenderit</p>

                                    </div>
                                    <div class="card-footer bg-transparent border-top text-center">
                                        <a href="#" class="text-primary">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

                <h5 class="text-center">Des relations de confiance</h5>
            <hr class="my-5">

            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme clients-carousel" id="clients-carousel" dir="ltr">
                        @foreach( part() as $part)
                            <div class="item">
                                <div class="client-images">
                                    <img src="{{ Storage::url($part->logo) }}" alt="client-img"
                                        class="mx-auto img-fluid d-block">
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
    <section class="section" id="features">
        <div class="container">
             <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <h2 class="text-center text-primary text-uppercase">Pourquoi TouKi ?</h2>
                        <p class="text-mueted text-center fs-4">
                            Nous sommes convaincus que le digital est un facteur de croissance et de survie pour toutes entreprises quels que soient la taille et le secteur, c’est pourquoi nous nous engageons à vous accompagner à maximiser votre performance et vos résultats grâce à la digitalisation. 
                        </p>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </section>


     <!-- Features start -->
    <section class="section bg-white" id="features">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="">
                        <div class="d-flex align-items-center">
                            <div class="features-number font-weight-semibold display-4 me-3">01</div>
                            <h4 class="mb-0">Toutes les options de voyage sur une seule plateforme</h4>
                        </div>
                        <p class="text-muted">
                            Grâce à un réseau développé au Sénégal, de nombreux trajets en bus et car pas chers de courte et longue-distance vous sont proposés par des compagnies routières renommées. Voyager en bus, c’est choisir des trajets à prix réduits dans tout le Sénégal, comparés au train et à l’avion.
                            Avec des itinéraires quotidiens vers les villes et capitales du pays, vous pouvez organiser des escapades parfaitement adaptées à tous les budgets !.
                        </p>
                        <div class="button-items">
                            <a href="{{ route('agence.create') }}" class="btn btn-success">Creer votre compte agence</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-8 ms-md-auto">
                    <div class="mt-4 me-md-0">
                        <img src="{{('admin/assets/images/crypto/features-img/img-2.png')}}" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Features end -->

      <!-- Features start -->
    <section class="section" id="features">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div>
                        <img src="{{('user/assets/images/updateClient.svg')}}" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
                <div class="col-md-6 ms-auto">
                    <div class="mt-4 mt-md-auto">
                        <div class="d-flex align-items-center mb-2">
                            <div class="features-number font-weight-semibold display-4 me-3">02</div>
                            <h4 class="mb-0">L’application tout-en-un des voyageurs</h4>
                        </div>
                        <p class="text-muted">
                            Téléchargez gratuitement l'application Omio pour bénéficier d’une expertise de qualité et organiser vos voyages en toute confiance.
                        </p>
                        <div class="text-muted mt-4">
                            <p class="mb-2"><i class="mdi mdi-circle-medium text-success me-1"></i>Donec pede justo vel
                                aliquet</p>
                            <p><i class="mdi mdi-circle-medium text-success me-1"></i>Aenean et nisl sagittis</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Features end -->


      <!-- Roadmap start -->
    <section class="section bg-white" id="roadmap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="text-center mb-3">
                        <div class="small-title">LE MONDE DE TouCki</div>
                        <h4 class="text-center">Recevez des réductions exclusives et des mises à jour de voyage directement dans votre boîte de réception.</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row align-items-center">
                <div class="col-md-8 col-sm-8">
                    <div class="mb-3">
                        <label class="form-label">Votre adresse e-Mail</label>
                        <div>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" parsley-type="email"
                                placeholder="E-Mail du client" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">dhdhdh</div>
            </div>
            <!-- end row -->

        </div>
        <!-- end container -->
    </section>
    <!-- Roadmap end -->

    

  

           
@endsection