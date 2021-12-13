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
    <section class="section hero-section bg-ico-hero" style="margin-top:-50px;" id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal" >
                <div class="col-lg-5 card_show">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">Yombalal Toucki Thi Biir Rewmi</h1>
                        <p class="font-size-20" >
                            Le secteur du tourisme a fort à faire dans une conjoncture économique pleine de défis. Pour vous démarquer, en tant qu’agence de voyages.
                        </p>

                        <div class="button-items mt-4 ">
                            <a href="{{ route('agence.create') }}" class="btn btn-success">Creer votre compte agence</a>
                            <a href="{{ route('agence.index') }}" class="btn btn-light">Nos agences de transport</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-10 ms-lg-auto card_hide" >
                   
                    <div class="overflow-hidden mb-0 mt-3 mt-lg-0">
                         <img src="{{ asset('user/assets/images/sn2.jpg') }}" style="width: 100%;"  alt="" srcset="">
                        <!-- <div class="card-header text-center">
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
    <section class="section bg-white p-0">
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
                                        <h4 class="text-bold text-uppercase">Pays de présence </h4>
                                        <h6>Senegal</h6>
                                        <p class="text-muted text-truncate mb-0">+ 0.0012.23 ( 0.2 % ) <i
                                                class="mdi mdi-arrow-up ms-1 text-success"></i></p>
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
                                        <h4 class="text-bold text-uppercase">Agences Clients </h4>
                                        <h6>8</h6>
                                        <p class="text-muted text-truncate mb-0">- 004.12 ( 0.1 % ) <i
                                                class="mdi mdi-arrow-down ms-1 text-danger"></i></p>
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
                                        <h4 class="text-bold text-uppercase">Transactions par jour </h4>
                                        <h6>+ 50 0000</h6>
                                        <p class="text-muted text-truncate mb-0">+ 0.0001.12 ( 0.1 % ) <i
                                                class="mdi mdi-arrow-up ms-1 text-success"></i></p>
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
    <section class="section pt-4" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">A Propos de nous</div>
                        <h4>Qui sommes nous</h4>
                    </div>
                </div>
            </div>
            <div class="row align-items-center p-3">
                <div class="col-lg-6">
                    <div class="text-muted">
                        <div class="card border">
                            <div class="card-body">
                                <h4>C'est quoi TouKi</h4>
                                <p class="fs-5">If several languages coalesce, the grammar of the resulting that of the individual new common
                                    language will be more simple and regular than the existing.</p>
                                <p class="mb-4">It would be necessary to have uniform pronunciation.</p>

                                <div class="button-items">
                                    <!-- <a href="{{ route('setting.index') }}" class="btn btn-success">Comment ça marche ?</a> -->
                                    <!-- <a href="{{ route('agence.index') }}" class="btn btn-outline-primary">Nos agences</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-6">
                    <div class="text-muted">
                       <div class="card border">
                            <div class="card-body">
                                <h4>C'est quoi TouKi</h4>
                                <p class="fs-5">If several languages coalesce, the grammar of the resulting that of the individual new common
                                    language will be more simple and regular than the existing.</p>
                                <p class="mb-4">It would be necessary to have uniform pronunciation.</p>

                                <div class="button-items">
                                    <!-- <a href="{{ route('setting.index') }}" class="btn btn-success">Comment ça marche ?</a> -->
                                    <!-- <a href="{{ route('agence.index') }}" class="btn btn-outline-primary">Nos agences</a> -->
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
    <!-- about section end -->

    <section class="section pt-4" id="about">
        <div class="container">
            <div class="row align-items-center">
                <h2 class="text-center text-primary text-uppercase">Pourquoi TouKi ?</h2>
                <p class="text-mueted text-center fs-4">
                     Nous sommes convaincus que le digital est un facteur de croissance et de survie pour toutes entreprises quels que soient la taille et le secteur, c’est pourquoi nous nous engageons à vous accompagner à maximiser votre performance et vos résultats grâce à la digitalisation. 
                </p>
                <div class="row align-items-center mt-4">
                    <div class="col-sm-6">
                        <div class="card border">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="mdi mdi-bitcoin h2 text-success"></i>
                                </div>
                                <h5>Une Relation de proximité</h5>
                                <p class="text-muted mb-0 fs-5">Vous êtes notre priorité ! </p>
                                <p class="text-muted mb-0 fs-5"> Votre Business est le nôtre. Nous sommes constamment disponibles et à votre entière écoute ! </p>

                            </div>
                            <div class="card-footer bg-transparent border-top text-center">
                                <a href="#" class="text-primary">Learn more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card border">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="mdi mdi-wallet-outline h2 text-success"></i>
                                </div>
                                <h5>Service personnalisé</h5>
                                <p class="text-muted mb-0 fs-5">Vous êtes unique !</p>
                                <p class="text-muted mb-0 fs-5">Vous apporter la Solution à votre problème, de manière personnalisée constitue ce qui nous importe le plus ! </p>

                            </div>
                            <div class="card-footer bg-transparent border-top text-center">
                                <a href="#" class="text-primary">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

  

           
@endsection