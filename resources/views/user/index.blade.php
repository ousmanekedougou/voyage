@extends('user.layouts.app',['title' => 'Acceuil'])
<style>
     .bg-ico-hero{
        background-image:url(./user/assets/images/dowload/home.jpg) !important;
        background-size:cover;background-position:top !important;
        height: 100px !important;
        background:#586ce4 !important;
        /* background:#0404d7 !important; */
    }
    .btn-block-for-agence-create,.btn-block-for-client-create{
        width: 100%;
    }
    .section .container .row_pricipal{
        margin-top:-70px;
    }
</style>
@section('headSection')
<link rel="stylesheet" href="{{asset('admin/assets/css/card.css')}}">
@endsection
@section('main-content')
  <!-- hero section start -->
    <section class="section hero-section bg-ico-hero section-responsive">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal">
                <div class="card_show">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">Yombalal Toucki Thi Biir Réwmi</h1>
                        <p class="font-size-16 text-white">
                            Toutes les options de voyage sur une seule plateforme
                        </p>

                        <div class="button-items mt-4">
                            <a target="_blank" href="{{ route('setting.condition') }}" class="btn btn-light text-bold"><i class="fa fa-pencil-ruler"></i> Termes & Conditions</a>
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

                    <div class="col-md-12 sectionCompteMobile">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                         <div class="mt-4 me-md-0">
                                            <img src="{{('user/assets/images/dowload/compteClient.svg')}}" alt="" class="img-fluid mx-auto d-block" style="width: 60%;">
                                        </div>
                                        <h5 class="text-center">Creer votre compte TouCki</h5>
                                        <div class="mt-4 mt-md-auto">
                                            <p class="text-muted">
                                                Profitez de réservations et de remboursements plus rapides ainsi que d'un accès à agences de transport qui repondent à tout vos attentes partout dans le pays .
                                            </p>
                                        </div>
                                        <div class="button-items mb-3 d-flex">
                                            <a href="{{ route('client.register') }}" class="btn btn-success btn-block-for-client-create"> <i class="bx bx-user-circle"> </i> Compte Client</a>
                                            <a href="{{ route('agence.create') }}" class="btn btn-primary btn-block-for-agence-create"> <i class="bx bxs-institution "> </i> Compte Agence</a>
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
    

  
   <!-- about section start -->
    <section class="section pt-0 mb-5 bg-white sectionCompteDesktope" id="about">
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
                    <div class="button-items mb-3">
                        <a href="#whileAgence" class="btn btn-primary btn-block-for-agence-create"> <i class="bx bxs-institution"></i> Pour Quoi avoir un compte agence ou client sur TouCki ?</a>
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

    <section class="section sectionCompteDesktope">
        <div class="container">
            <div class="currency-price">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="text-bold">Pour quoi avoir un compte TouCki ?</h4>
                                        <p class="text-muted mb-0">
                                            Nous sommes convaincus que le digital est un facteur de croissance et de survie pour toutes entreprises quels que soient la taille et le secteur, c’est pourquoi nous nous engageons à vous accompagner à maximiser votre performance et vos résultats grâce à la digitalisation. 
                        
                                            Nous méttons à votre disposition une multitude d'agences de transport. Des mises à jour de bus en direct aux billets mobiles, notre application innovante est le moyen idéal pour planifier et suivre votre voyage.
                                        </p>
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

    <section class="section p-1 sectionCompteDesktope card-first" id="whileAgence">
        <div class="container py-2">
            <article class="postcard  blue card card-body light">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="{{asset('admin/assets/images/identity.jpg')}}" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h5 class="postcard__title blue"><a href="#">Votre identité</a></h5>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">
                        Le site de votre agence est votre identité.

                        Donner un visage à celui-ci : photos des vendeurs, du chef d’agence, des langues que vous parlez, des outils dont vous disposez.

                        Les agences, avec les nouvelles technologies ont changé depuis 10 ans. Les clients ne le savent pas toujours.

                        Votre site est un moyen d’en apporter la preuve.
                    </div>
                </div>
            </article>
            <article class="postcard  red card card-body light">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="{{asset('admin/assets/images/vitrine.png')}}" alt="Image Title" />	
                </a>
                <div class="postcard__text t-dark">
                    <h5 class="postcard__title red"><a href="#">Avoir une vitrine en ligne</a></h5>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">
                        <span>C’est gratuit !</span> <br>
                        Avoir un site permet, à tout internaute qui cherche une agence de voyages à proximité de son domicile ou de son travail, d’apparaitre sur Google qui devient, par la force des choses, une sorte d’annuaire universel. 
                    </div>
                </div>
            </article>
            <article class="postcard  green card card-body light">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="{{asset('admin/assets/images/information1.png')}}" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h5 class="postcard__title green"><a href="#">Être informé sur sa clientèle</a></h5>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">
                        La formule est connue : "un homme informé en vaut deux’".

                        C’est transposable dans le commerce. Connaître ses clients apporte de meilleures chances de conclure des ventes.
                        "grâce aux statistiques fournies par le site, l’agence de voyages accède à de multiples informations.
                    </div>
                </div>
            </article>
            <article class="postcard  yellow card card-body light">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="{{asset('admin/assets/images/Interactivité.jpg')}}" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h5 class="postcard__title yellow"><a href="#">Interactivité</a></h5>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">
                        Penser interactivité. Vos clients s’expriment sur la Toile.
                        Accompagnez cette tendance avec un simple formulaire de contact, un espace témoignage, un forum, etc. 
                        Les personnes et pas seulement les jeunes ont pris l’habitude de partager leurs impressions et leurs opinions sur le net. 
                        Récupérez, pour le profit de votre commerce, ces habitudes qui sont aujourd’hui ancrées dans notre culture.
                    </div>
                </div>
            </article>
            <article class="postcard  green card card-body light">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="{{asset('admin/assets/images/avis.png')}}" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h5 class="postcard__title green"><a href="#">Avis</a></h5>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">
                        La dernière enquête Ebay/Médiamétrie nous informe que les avis sur internet continuent à bien se porter : +8% de consultation et + 7% d’avis publiés.

                        C’est une tendance lourde. Pourtant on peut dénoncer l’existence de faux avis. Justement les avis de vos clients sont authentiques et permettent de crédibiliser votre rôle tout en valorisant l’excellence de votre profession.
                    </div>
                </div>
            </article>
            <article class="postcard  yellow card card-body light">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="{{asset('admin/assets/images/contact.png')}}" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h5 class="postcard__title yellow"><a href="#">Maintenir le contact avec le client</a></h5>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">
                        À partir de 19 heures, en général, l’agence est fermée.

                        Pourtant, c’est le soir, à leur domicile, que les clients prennent du temps pour la préparation de leurs vacances.C’est tellement facile de mettre en place une rubrique spécifique qui permet aux clients de retrouver ses réservations, à tout moment, en dehors des horaires d’ouverture.

                        Dans l'activite du transport,le service est un critère important.
                    </div>
                </div>
            </article>
        </div>
    </section>

    <!-- Features start -->
    <section class="section bg-white sectionCompteDesktope" id="features">
        <div class="container">

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
                        <p class="text-muted">
                            La technologie a bouleversé le monde des affaires au point que si une entreprise de transporteur n'a pas de visibilité sur le web, elle n'existe pas. Dans le marché concurrentiel d'aujourd'hui, le référencement est plus important que jamais.
                        </p>
                        <p class="text-muted">
                            Avec notre site web, une agence de voyages pourra bien se familiariser avec les différentes étapes de l'évolution du marché qui est en perpétuelle mutation. Ainsi, ce renseignement dont vous pouvez faire permettra d'adapter vos tarifs et votre méthode à la réalité du marché tout en étant très compétitif.
                        </p>
                        <div class="text-muted mt-4">
                            <p class="mb-2"><i class="mdi mdi-circle-medium text-success me-1"></i>
                                Un bon positionnement de votre agence de transporteur sur les moteurs de recherche
                            </p>
                            <p><i class="mdi mdi-circle-medium text-success me-1"></i>
                                Accroître la visibilité et le trafic sur votre agence de transporteur
                            </p>
                        </div>
                    </div>
                    <div class="button-items mb-3">
                        <a href="{{ route('agence.create') }}" class="btn btn-primary btn-block-for-agence-create"> <i class="bx bxs-institution "> </i> Créer votre compte agence TouCki</a>
                    </div> 
                </div>
            </div>
            <!-- end row  -->
        </div>
        <!-- end container -->
    </section>
    <!-- Features end -->


     <section class="section sectionCompteDesktope" id="features">
        <div class="container">
            <div class="row align-items-center mt-5 pt-md-5">
                <div class="col-md-5">
                    <div class="mt-4 mt-md-0">
                        <div class="d-flex align-items-center mb-2">
                            <div class="features-number font-weight-semibold display-4 me-3">02</div>
                            <h4 class="mb-0">Pourquoi est-il avantageux de creer un compte client ?</h4>
                        </div>
                        <p class="text-muted">
                            Profitez pleinement de l'expérience TouCki, <br>
                            Profitez des réservations et des remboursements plus rapides ainsi que d'un accès à des réductions grâce à des agences de transport dans tout le pays.
                        </p>
                        <div class="text-muted mt-4">
                            <p class="mb-2"><i class="mdi mdi-circle-medium text-success me-1"></i>
                                Horaires et billets pour tous vos déplacements.
                            </p>
                            <p><i class="mdi mdi-circle-medium text-success me-1"></i>
                                Il n'a jamais été aussi simple de réserver un billet de bus au Sénégal.
                            </p>
                        </div>
                        <div class="button-items mb-3">
                            <a href="{{ route('client.register') }}" class="btn btn-primary btn-block-for-client-create"> <i class="bx bx-user-circle"> </i> Créer votre compte client TouCki</a>
                        </div> 
                    </div>
                </div>
                <div class="col-md-6  col-sm-8 ms-md-auto">
                    <div class="mt-4 me-md-0">
                        <img src="{{('user/assets/images/dowload/mobile.svg')}}" alt="" class="img-fluid mx-auto d-block" style="width:
                        70%;height:auto;">
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
     </section>

    
    
    <!-- Features start -->
    <section class="section sectionCompteDesktope bg-white" id="features">
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