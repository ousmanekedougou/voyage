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
    <section class="section hero-section bg-ico-hero" style="margin-top:-50px;">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal" >
                <div class="col-lg-5 card_show">
                    <div class="text-white-50">
                        <h2 class="text-white font-weight-semibold mb-3 ">Yombalal Toucki Thi Biir Rewmi</h2>
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
                                        <p class="text-muted">Bitcoin</p>
                                        <h5>$ 9134.39</h5>
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
                                        <p class="text-muted">Ethereum</p>
                                        <h5>$ 245.44</h5>
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
                                        <p class="text-muted">Litecoin</p>
                                        <h5>$ 63.61</h5>
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
    <section class="section pt-4 bg-white" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">About us</div>
                        <h4>What is ICO Token?</h4>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5">

                    <div class="text-muted">
                        <h4>Best ICO for your cryptocurrency business</h4>
                        <p>If several languages coalesce, the grammar of the resulting that of the individual new common
                            language will be more simple and regular than the existing.</p>
                        <p class="mb-4">It would be necessary to have uniform pronunciation.</p>

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
                        <div class="item">
                            <div class="client-images">
                                <img src="{{('admin/assets/images/clients/1.png')}}" alt="client-img"
                                    class="mx-auto img-fluid d-block">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-images">
                                <img src="{{('admin/assets/images/clients/2.png')}}" alt="client-img"
                                    class="mx-auto img-fluid d-block">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-images">
                                <img src="{{('admin/assets/images/clients/3.png')}}" alt="client-img"
                                    class="mx-auto img-fluid d-block">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-images">
                                <img src="{{('admin/assets/images/clients/4.png')}}" alt="client-img"
                                    class="mx-auto img-fluid d-block">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-images">
                                <img src="{{('admin/assets/images/clients/5.png')}}" alt="client-img"
                                    class="mx-auto img-fluid d-block">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-images">
                                <img src="{{('admin/assets/images/clients/6.png')}}" alt="client-img"
                                    class="mx-auto img-fluid d-block">
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

            <div class="row align-items-center pt-4">
                <div class="col-md-6 col-sm-8">
                    <div>
                        <img src="{{('admin/assets/images/crypto/features-img/img-1.png')}}" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
                <div class="col-md-5 ms-auto">
                    <div class="mt-4 mt-md-auto">
                        <div class="d-flex align-items-center mb-2">
                            <div class="features-number font-weight-semibold display-4 me-3">01</div>
                            <h4 class="mb-0">Clients</h4>
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
                </div>
            </div>
            <!-- end row -->

            <div class="row align-items-center mt-5 pt-md-5">
                <div class="col-md-5">
                    <div class="mt-4 mt-md-0">
                        <div class="d-flex align-items-center mb-2">
                            <div class="features-number font-weight-semibold display-4 me-3">02</div>
                            <h4 class="mb-0">Agences</h4>
                        </div>
                        <p class="text-muted">It will be as simple as Occidental; in fact, it will be Occidental. To an
                            English person, it will seem like simplified English, as a skeptical Cambridge friend.</p>
                        <div class="text-muted mt-4">
                            <p class="mb-2"><i class="mdi mdi-circle-medium text-success me-1"></i>Donec pede justo vel
                                aliquet</p>
                            <p><i class="mdi mdi-circle-medium text-success me-1"></i>Aenean et nisl sagittis</p>
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


      <!-- Roadmap start -->
    <section class="section bg-white" id="roadmap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Timeline</div>
                        <h4>Our Roadmap</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="hori-timeline" dir="ltr">
                        <div class="owl-carousel owl-theme events navs-carousel" id="timeline-carousel">
                            <div class="item event-list">
                                <div>
                                    <div class="event-date">
                                        <div class="text-primary mb-1">December, 2019</div>
                                        <h5 class="mb-4">ICO Platform Idea</h5>
                                    </div>
                                    <div class="event-down-icon">
                                        <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                    </div>

                                    <div class="mt-3 px-3">
                                        <p class="text-muted">It will be as simple as occidental in fact it will be
                                            Cambridge</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item event-list">
                                <div>
                                    <div class="event-date">
                                        <div class="text-primary mb-1">January, 2020</div>
                                        <h5 class="mb-4">Research on project</h5>
                                    </div>
                                    <div class="event-down-icon">
                                        <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                    </div>

                                    <div class="mt-3 px-3">
                                        <p class="text-muted">To an English person, it will seem like simplified English
                                            existence.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item event-list active">
                                <div>
                                    <div class="event-date">
                                        <div class="text-primary mb-1">February, 2020</div>
                                        <h5 class="mb-4">ICO & Token Design</h5>
                                    </div>
                                    <div class="event-down-icon">
                                        <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                    </div>

                                    <div class="mt-3 px-3">
                                        <p class="text-muted">For science, music, sport, etc, Europe uses the same
                                            vocabulary.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item event-list">
                                <div>
                                    <div class="event-date">
                                        <div class="text-primary mb-1">March, 2020</div>
                                        <h5 class="mb-4">ICO Launch Platform</h5>
                                    </div>
                                    <div class="event-down-icon">
                                        <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                    </div>

                                    <div class="mt-3 px-3">
                                        <p class="text-muted">New common language will be more simple than existing.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item event-list">
                                <div>
                                    <div class="event-date">
                                        <div class="text-primary mb-1">April, 2020</div>
                                        <h5 class="mb-4">Token sale round 1</h5>
                                    </div>
                                    <div class="event-down-icon">
                                        <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                    </div>

                                    <div class="mt-3 px-3">
                                        <p class="text-muted">It will be as simple as occidental in fact it will be
                                            Cambridge</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item event-list">
                                <div>
                                    <div class="event-date">
                                        <div class="text-primary mb-1">May, 2020</div>
                                        <h5 class="mb-4">Token sale round 2</h5>
                                    </div>
                                    <div class="event-down-icon">
                                        <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                    </div>

                                    <div class="mt-3 px-3">
                                        <p class="text-muted">To an English person, it will seem like simplified English
                                            existence.</p>
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
    <!-- Roadmap end -->

    

  

           
@endsection