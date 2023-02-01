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
                <div class="col-sm-12">
                    <div class="row" data-masonry='{"percentPosition": true }'>
                        <div class="col-lg-4">
                            <div class="card border border-primary">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-primary">1<i class="mdi mdi-bullseye-arrow me-3"></i>Primary outline Card</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card border border-primary">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-primary">2<i class="mdi mdi-bullseye-arrow me-3"></i>Primary outline Card</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card border border-primary">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-primary">3<i class="mdi mdi-bullseye-arrow me-3"></i>Primary outline Card</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card border border-primary">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-primary">4<i class="mdi mdi-bullseye-arrow me-3"></i>Primary outline Card</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card border border-primary">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-primary">5<i class="mdi mdi-bullseye-arrow me-3"></i>Primary outline Card</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card border border-primary">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-primary">6<i class="mdi mdi-bullseye-arrow me-3"></i>Primary outline Card</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection