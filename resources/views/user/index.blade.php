@extends('user.layouts.app',['title' => 'Acceuil'])
<style>
.btn-block-for-agence-create,.btn-block-for-client-create{
    width: 100%;
}
.section .container .row_pricipal{
    margin-top:-70px;
}
</style>
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
                                            <p class="text-muted">If several languages coalesce, the grammar of the resulting language is
                                                more simple and regular than of the individual will be more simple and regular than the
                                                existing.</p>
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
    <section class="section p-1 sectionCompteDesktope" id="whileAgence">
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

                                        <p class="text-muted">
                                            Nous méttons à votre disposition une multitude d'agences de transport. Des mises à jour de bus en direct aux billets mobiles, notre application innovante est le moyen idéal pour planifier et suivre votre voyage.
                                        </p>

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

    <section class="section p-1 sectionCompteDesktope" id="whileAgence">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-body">
                        <h4 class="card-title mt-0">Avoir une vitrine sur la boutique en ligne de Google</h4>
                        <p class="card-text">
                            <span>C’est gratuit !</span> <br>
                            Avoir un site permet, à tout internaute qui cherche une agence de voyages à proximité de son domicile ou de son travail, d’apparaitre sur Google qui devient, par la force des choses, une sorte d’annuaire universel. 
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-body">
                        <h4 class="card-title mt-0">Votre identité</h4>
                        <p class="card-text">
                            Le site de votre agence est votre identité.

                            Donner un visage à celui-ci : photos des vendeurs, du chef d’agence, des langues que vous parlez, des outils dont vous disposez.

                            Les agences, avec les nouvelles technologies ont changé depuis 10 ans. Les clients ne le savent pas toujours.

                            Votre site est un moyen d’en apporter la preuve. 
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-body">
                        <h4 class="card-title mt-0">Être informé sur sa clientèle</h4>
                        <p class="card-text">
                            La formule est connue : "un homme informé en vaut deux’".

                            C’est transposable dans le commerce. Connaître ses clients apporte de meilleures chances de conclure des ventes.
                            "grâce aux statistiques fournies par le site, l’agence de voyages accède à de multiples informations : qui fréquente le site, à quel moment, quels sont les produits qui sont recherchés et comment ils sont achetés, qui consulte, quelles sont les informations qui intéresse, etc. 
                        </p>
                    </div>
                </div>
                 <div class="col-lg-4">
                    <div class="card card-body">
                        <h4 class="card-title mt-0">Interactivité</h4>
                        <p class="card-text">

                            Penser interactivité. Vos clients s’expriment sur la Toile.
                            Accompagnez cette tendance avec un simple formulaire de contact, un espace témoignage, un forum, etc. 
                            Les personnes et pas seulement les jeunes ont pris l’habitude de partager leurs impressions et leurs opinions sur le net. 
                            Récupérez, pour le profit de votre commerce, ces habitudes qui sont aujourd’hui ancrées dans notre culture.
                            Et ne craignez pas des commentaires négatifs, ils sont rares et de toutes les façons vous pouvez les modérer. En définitive vous allez créer un profil identifiable et personnalisé à votre agence. 
                        </p>
                    </div>
                </div>

                 <div class="col-lg-4">
                    <div class="card card-body">
                        <h4 class="card-title mt-0">Avis</h4>
                        <p class="card-text">
                            La dernière enquête Ebay/Médiamétrie nous informe que les avis sur internet continuent à bien se porter : +8% de consultation et + 7% d’avis publiés.

                            C’est une tendance lourde. Pourtant on peut dénoncer l’existence de faux avis. Justement les avis de vos clients sont authentiques et permettent de crédibiliser votre rôle tout en valorisant l’excellence de votre profession.
                        </p>
                    </div>
                </div>

                 <div class="col-lg-4">
                    <div class="card card-body">
                        <h4 class="card-title mt-0">Maintenir le contact avec le client</h4>
                        <p class="card-text">
                            À partir de 19 heures, en général, l’agence est fermée.

                            Pourtant, c’est le soir, à leur domicile, que les clients prennent du temps pour la préparation de leurs vacances. Laurie Larchez précise : "C’est tellement facile de mettre en place une rubrique spécifique qui permet aux clients de retrouver ses réservations, à tout moment, en dehors des horaires d’ouverture".

                            Dans la vente de produit touristique, il n’y pas que la notion de prix qui compte. Le service arrive en deuxième critère. Ne pas l’oublier. 
                        </p>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </section>

    <!-- Features start -->
    <section class="section bg-white sectionCompteDesktope" id="features">
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
        </div>
        <!-- end container -->
    </section>
    <!-- Features end -->


     <section class="section bg-white sectionCompteDesktope" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 bg-primary">
                    <div class="text-center">
                        <h4 class="text-white pt-2">Créer votre compte client de voyage sur TouCki</h4>
                        <div class="small-title text-white">Features</div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row align-items-center mt-5 pt-md-5">
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
     </section>

    
    
    <!-- Features start -->
    <section class="section sectionCompteDesktope" id="features">
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