@extends('user.layouts.app',['title' => 'About'])
<style>

</style>
@section('main-content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">A propos de TouCki</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12 col-xl-12">

                    <!-- Simple card -->
                    <div class="card">
                        <div class="card-img text-center p-5">
                            <img class="card-img-top img-fluid" src="{{asset('user/assets/images/dowload/about.png')}}" alt="Card image cap" style="width: 100%;height:auto">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title mt-0 btn btn-light">Toutes les options de voyage sur TouCki</h4>
                            <p class="card-text">
                                Grâce à un réseau développé au Sénégal, de nombreux trajets en bus et car pas chers de courte et longue-distance vous sont proposés par des compagnies routières renommées.
                                Voyager en bus, c’est choisir des trajets à prix réduits dans tout le Sénégal, comparés au train et à l’avion.
                                Avec des itinéraires quotidiens vers les villes et capitales du pays, vous pouvez organiser des escapades parfaitement adaptées à tous les budgets. 
                            </p>

                            <h4 class="card-title mt-3 btn btn-light">Pour Quoi avoir un compte agence ou client sur TouCki ?</h4>
                            <p class="card-text">
                                Nous sommes convaincus que le digital est un facteur de croissance et de survie pour toutes entreprises quels que soient la taille et le secteur, c’est pourquoi nous nous engageons à vous accompagner à maximiser votre performance et vos résultats grâce à la digitalisation. 
                            </p>
                            <p class="card-text">
                                Nous méttons à votre disposition une multitude d'agences de transport. Des mises à jour de bus en direct aux billets mobiles, notre application innovante est le moyen idéal pour planifier et suivre votre voyage. 
                            </p>
                        </div>
                    </div>

                </div><!-- end col -->

                <div class="col-md-6 col-xl-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <div class="mt-4 me-md-0">
                                        <img src="{{('user/assets/images/dowload/compteClient.svg')}}" alt="" class="img-fluid mx-auto d-block" style="width: 60%;">
                                    </div>
                                    <h5 class="text-center">Pour quoi digitaliser votre agence de transport</h5>
                                    <div class="mt-4 mt-md-auto">
                                        <p class="text-muted">If several languages coalesce, the grammar of the resulting language is
                                            more simple and regular than of the individual will be more simple and regular than the
                                            existing.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-body bg-primary text-white">
                        <h5 class="mt-0 mb-3 text-white"><i class="mdi mdi-check-all me-1"></i> Avoir une vitrine sur la boutique en ligne de Google</h5>
                        <p class="card-text">
                            <span>C’est gratuit !</span> <br>
                            Avoir un site permet, à tout internaute qui cherche une agence de voyages à proximité de son domicile ou de son travail, d’apparaitre sur Google qui devient, par la force des choses, une sorte d’annuaire universel. 
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-body bg-success text-white">
                        <h5 class="mt-0 mb-3 text-white"><i class="mdi mdi-check-all me-1"></i> Votre identité</h5>
                        <p class="card-text">
                            Le site de votre agence est votre identité.

                            Donner un visage à celui-ci : photos des vendeurs, du chef d’agence, des langues que vous parlez, des outils dont vous disposez.

                            Les agences, avec les nouvelles technologies ont changé depuis 10 ans. Les clients ne le savent pas toujours.

                            Votre site est un moyen d’en apporter la preuve. 
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-body bg-warning text-white">
                        <h5 class="mt-0 mb-3 text-white"><i class="mdi mdi-check-all me-1"></i> Être informé sur sa clientèle</h5>
                        <p class="card-text">
                            La formule est connue : "un homme informé en vaut deux’".

                            C’est transposable dans le commerce. Connaître ses clients apporte de meilleures chances de conclure des ventes.
                            "grâce aux statistiques fournies par le site, l’agence de voyages accède à de multiples informations. 
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-body bg-secondary text-white">
                        <h5 class="mt-0 mb-3 text-white"><i class="mdi mdi-check-all me-1"></i> Interactivité</h5>
                        <p class="card-text">

                            Penser interactivité. Vos clients s’expriment sur la Toile.
                            Accompagnez cette tendance avec un simple formulaire de contact, un espace témoignage, un forum, etc. 
                            Les personnes et pas seulement les jeunes ont pris l’habitude de partager leurs impressions et leurs opinions sur le net. 
                            Récupérez, pour le profit de votre commerce, ces habitudes qui sont aujourd’hui ancrées dans notre culture.
                        </p>
                    </div>
                </div>

                 <div class="col-lg-4">
                    <div class="card card-body bg-info text-white">
                        <h5 class="mt-0 mb-3 text-white"><i class="mdi mdi-check-all me-1"></i> Avis</h5>
                        <p class="card-text">
                            La dernière enquête Ebay/Médiamétrie nous informe que les avis sur internet continuent à bien se porter : +8% de consultation et + 7% d’avis publiés.

                            C’est une tendance lourde. Pourtant on peut dénoncer l’existence de faux avis. Justement les avis de vos clients sont authentiques et permettent de crédibiliser votre rôle tout en valorisant l’excellence de votre profession.
                        </p>
                    </div>
                </div>

                 <div class="col-lg-4">
                    <div class="card card-body">
                        <h5 class="mt-0 mb-3"><i class="mdi mdi-check-all me-1"></i> Maintenir le contact avec le client</h5>
                        <p class="card-text">
                            À partir de 19 heures, en général, l’agence est fermée.

                            Pourtant, c’est le soir, à leur domicile, que les clients prennent du temps pour la préparation de leurs vacances.C’est tellement facile de mettre en place une rubrique spécifique qui permet aux clients de retrouver ses réservations, à tout moment, en dehors des horaires d’ouverture.

                            Dans l'activite du transport,le service est un critère important.
                        </p>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection