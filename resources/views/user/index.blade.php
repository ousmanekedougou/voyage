@extends('user.layouts.app',['title' => 'Acceuil'])
<style>
     .bg-ico-hero{
        background-image:url(./user/assets/images/dowload/home.jpg) !important;
        background-size:cover;background-position:top !important;
        height: 100px !important;
        /* background:#586ce4 !important; */
        /* background:#0404d7 !important; */ 
    }
    .btn-block-for-agence-create,.btn-block-for-client-create{
        width: 100%;
    }
    .section .container .row_pricipal{
        margin-top:-70px;
    }
    .home-section-mobile{
        margin-top:-4rem !important;
    }
    .img-fluid{
        width: 70%;
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

    
    <section class="section home-section-mobile" >
        <div class="container">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <img src="{{asset('user/assets/images/bus.svg') }}" alt="" class="avatar-sm me-4">

                            <div class="media-body overflow-hidden">
                                <h5 class="text-truncate font-size-15">Yombalal TouCki Thi Biir Réwmi</h5>
                                <p class="text-muted">Toutes les options de voyage sur une seule plateforme</p>
                            </div>
                        </div>

                        <h5 class="font-size-15 mt-4">A propos de TouCki :</h5>

                        <p class="text-muted mb-4 text-justify">
                            Grâce à un réseau développé au Sénégal, de nombreux trajets en bus et car pas chers de courte et longue-distance vous sont proposés par des compagnies routières renommées. 
                            <br> Voyager en bus, c’est choisir des trajets à prix réduits dans tout le Sénégal, comparés au train et à l’avion.
                            <br> Avec des itinéraires quotidiens vers les villes et capitales du pays, vous pouvez organiser des escapades parfaitement adaptées à tous les budgets.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


     <!-- currency price section start Version mobile  // section_sm-->
     <section class="section p-0 section-collumn">
        <div class="container">
            <div class="currency-price">
                <div class="row collumn-bg-img">
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
                <div class="row">
                    <div class="col-md-12 sectionCompteMobile">
                        <div class="card"> 
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                            <div class="mt-4 me-md-0">
                                            <img src="{{('user/assets/images/dowload/compteClient.svg')}}" alt="" class="img-fluid mx-auto d-block" style="width: 60%;">
                                        </div>
                                        <h5 class="text-center">créer votre compte TouCki</h5>
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
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- currency price section end -->



    <!-- about section start -->
    <section class="section pt-4 bg-white sectionCompteDesktope" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">A Propos</div>
                        <h4>C'est quoi TouCki</h4>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5">

                    <div class="text-muted">
                        <h4>Toutes les options de voyage sur TouCki</h4>
                        <p class="text-muted mb-4 text-justify">
                            Grâce à un réseau développé au Sénégal, de nombreux trajets en bus et car pas chers de courte et longue-distance vous sont proposés par des compagnies routières renommées.
                        </p>
                        <p>Voyager en bus, c’est choisir des trajets à prix réduits dans tout le Sénégal, comparés au train et à l’avion.</p>
                        <p>Avec des itinéraires quotidiens vers les villes et capitales du pays, vous pouvez organiser des escapades parfaitement adaptées à tous les budgets.</p>
                        <div class="button-items">
                            <a href="#" class="btn btn-success">Read More</a>
                            <a href="#" class="btn btn-outline-primary">How It work</a>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-4 col-6">
                                <div class="mt-4">
                                    <h4>{{$agences->count()}}</h4>
                                    <p>Agences</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="mt-4">
                                    <h4>{{$users->count()}}</h4>
                                    <p>Utilisateurs</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="mt-4">
                                    <h4>{{ $partenaires->count() }} </h4>
                                    <p>Partenaires</p>
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
    <section class="section sectionCompteDesktope" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Comptes Clients & Agences</div>
                        <h4>Pour quoi avoir un compte TouCki ?</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row align-items-center pt-4">
                <div class="col-md-6 col-sm-8">
                    <div>
                        <img src="{{asset('admin/assets/images/crypto/features-img/img-1.png')}}" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
                <div class="col-md-5 ms-auto">
                    <div class="mt-4 mt-md-auto">
                        <div class="d-flex align-items-center mb-2">
                            <div class="features-number font-weight-semibold display-4 me-3">01</div>
                            <h4 class="mb-0">Votre compte agence</h4>
                        </div>
                        <p class="text-muted">
                            La technologie a bouleversé le monde des affaires au point que si une entreprise de transport n'a pas de visibilité sur le web, elle n'existe pas. Dans le marché concurrentiel d'aujourd'hui, le référencement est plus important que jamais.
                        </p>
                        <p class="text-muted">
                            Avec notre site web, une agence de voyages pourra bien se familiariser avec les différentes étapes de l'évolution du marché qui est en perpétuelle mutation. Ainsi, ce renseignement dont vous pouvez faire permettra d'adapter vos tarifs et votre méthode à la réalité du marché tout en étant très compétitif.
                        </p>
                        <div class="text-muted mt-4">
                            <p class="mb-2"><i class="mdi mdi-circle-medium text-success me-1"></i>
                                Un bon positionnement de votre agence de transport sur les moteurs de recherche
                            </p>
                            <p><i class="mdi mdi-circle-medium text-success me-1"></i>
                                Accroître la visibilité et le trafic sur votre agence de transport
                            </p>
                        </div>
                        <div class="button-items mb-3">
                            <a href="{{ route('agence.create') }}" class="btn btn-primary btn-block-for-agence-create"> <i class="bx bxs-institution "> </i> Créer votre compte agence TouCki</a>
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
                            <h4 class="mb-0">Votre compte client</h4>
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
                        <img src="{{asset('admin/assets/images/crypto/features-img/img-2.png')}}" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Features end -->



    <!-- Roadmap start -->
    <section class="section bg-white sectionCompteDesktope" id="roadmap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Reservation</div>
                        <h4>Vérifiez toutes vos résérvations Tickets , Bagages & Colis</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->



            <div class="row align-items-center pt-4">
                <div class="col-md-6 col-sm-8">
                    <div>
                        <img src="{{('user/assets/images/dowload/email-tickets.svg')}}" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
                <div class="col-md-5 ms-auto">
                    <div class="mt-4 mt-md-auto">
                    <form class="custom-validation bg-white p-3" action="{{ route('client.colis') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <h5 class="text-reserve-on-mobile">Pour vous aider à retrouver vos colis ou ticket</h5>
                                <p class="text-muted  mb-0 text-reserve-on-mobile"> <i class="mdi mdi-circle-medium text-success me-1"></i> Saisissez ci-dessous votre le numero de telephone dont vous avez recu la notification, entrez le siege conserne et choisissez le type de votre verification. </p>
                                <p class="text-muted  mb-0 text-reserve-on-mobile"> <i class="mdi mdi-circle-medium text-success me-1"></i> Accès facile à vos colis et ticke, peu importe la destination </p>
                                <div class="col-xl-12">
                                    <div class="mb-3" >
                                        <label class="form-label">Votre numero de telephone</label>
                                        <div>
                                            <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                            required placeholder="Numero de telephone" style="width:100%;" />
                                            <input type="hidden" name="indicatif" id="indicatif">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="form-label">Selectionner le siege de l'agence</label>
                                        <div class="col-md-12">
                                            <select  class="form-control @error('siege') is-invalid @enderror" name="siege" required autocomplete="siege" required>
                                                @foreach($agences as $agence)
                                                    <optgroup label="{{$agence->name}}">
                                                        @foreach($sieges as $siege)
                                                            @if($agence->id == $siege->agence_id)
                                                                <option value="{{ $siege->id }}">{{$siege->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                            @error('siege')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="d-block mb-3">Type de verifications :</label>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('verify') is-invalid @enderror" type="radio" name="verify" id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">Colis</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('verify') is-invalid @enderror" type="radio" name="verify" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">Tickets</label>
                                        </div>
                                        @error('verify')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror                                                          
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" style="width:65%;" class="btn btn-primary waves-effect waves-light btn-block">
                                        Verifier
                                    </button>
                                    <button type="reset" style="width:33%;" class="btn btn-secondary waves-effect btn-block">
                                        Anuller
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Roadmap end -->




     <!-- Faqs start -->
     <section class="section sectionCompteDesktope" id="faqs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">comment ça marche</div>
                        <h4>Comment marche votre plateforme</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="vertical-nav">
                        <div class="row">
                            <div class="col-lg-2 col-sm-4">
                                <div class="nav flex-column nav-pills" role="tablist">
                                    <a class="nav-link active" id="v-pills-gen-ques-tab" data-bs-toggle="pill"
                                        href="#v-pills-gen-ques" role="tab">
                                        <i class="bx bx-help-circle nav-icon d-block mb-2"></i>
                                        <p class="font-weight-bold mb-0">Agences</p>
                                    </a>
                                    <a class="nav-link" id="v-pills-token-sale-tab" data-bs-toggle="pill"
                                        href="#v-pills-token-sale" role="tab">
                                        <i class="bx bx-receipt nav-icon d-block mb-2"></i>
                                        <p class="font-weight-bold mb-0">Clients</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-10 col-sm-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            

                                            <div class="tab-pane fade show active" id="v-pills-gen-ques-tab"
                                                role="tabpanel">
                                                <h4 class="h4-title" class="card-title mb-4 btn btn-primary text-center" style="width: 100%;">Pour les agences</h4>
                                                <div>
                                                    <div id="gen-ques-accordion" class="accordion custom-accordion">
                                                        <div class="mb-3">
                                                            <a href="#general-collapse1Client" class="accordion-list"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse1Client">

                                                                <div>Comment créer un compte agence TouCki ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>

                                                            </a>

                                                            <div id="general-collapse1Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <h5>Pour créer un compte agence chez TouCki</h5>
                                                                    <div>
                                                                        <ul class="verti-timeline list-unstyled">
                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">1</i>
                                                                                </div>
                                                                                <p class="text-muted">Allez sur <a href="https://www.toucki.aeerk-sn.com/agence-create" target="_blank" rel="noopener noreferrer">https://www.toucki.aeerk-sn.com/agence-create</a> ou téléchargez notre application TouCki sur play-Stor ou App-Stor.</p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">2</i>
                                                                                </div>
                                                                                <p class="text-muted">En suite entre toutes les informations demamder puis valider votre inscription</p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">3</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Lisez attentivement les conditions d’utilisation
                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">4</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Cochez sur “Accepter” en bas des conditions d’utilisation et cliquez sur “Créer mon compte”
                                                                                </p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse2Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse2Client">
                                                                <div>Comment activer mon compte agence TouCki ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse2Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <h5>La procédure d’activation d’un compte agence TouCki se fait en deux étapes: </h5>
                                                                    <div>
                                                                        <ul class="verti-timeline list-unstyled">
                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">1</i>
                                                                                </div>
                                                                                <p class="text-muted">La validation par mail. <br> <br>

                                                                                    Connectez-vous à votre boîte mail et ouvrez le mail de notification envoyé par TouCki <br> <br>
                                                                                    Cliquez sur le lien de validation et marquez vos premiers pas chez TouCki

                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">2</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Important <br> <br>
                                                                                    Merci de bien vérifier que le numéro de téléphone renseigné lors de la création de votre compte client TouCKi est fonctionnel et qu’il s’agit bien d’un numéro de téléphone mobile.
                                                                                </p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse3Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse3Client">
                                                                <div>Quelles sonts les services disponibles sur votre compte agence TouCki</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse3Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <h5>Les services disponibles au niveau du compte agence TouCki sont les suivantes : </h5>
                                                                    <div>
                                                                        <ul class="verti-timeline list-unstyled">
                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">1</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Une gestion et une vue d'ensemble de tout les sieges de votre. <br>
                                                                                    Dans votre compte toucki vous avez tous ses avantages
                                                                                </p>
                                                                                <div class="text-muted mt-4">
                                                                                    <p class="mb-2"><i class="mdi mdi-circle-medium text-success me-1"></i>
                                                                                        Enregistre tous vos sieges de transports.
                                                                                    </p>
                                                                                    <p><i class="mdi mdi-circle-medium text-success me-1"></i>
                                                                                        Enregistre les employes par siege 
                                                                                    </p>
                                                                                    <p><i class="mdi mdi-circle-medium text-success me-1"></i>
                                                                                        Enregistre les bus par siege 
                                                                                    </p>
                                                                                    <p><i class="mdi mdi-circle-medium text-success me-1"></i>
                                                                                        Enregistre les bagages et colis des clients par siege 
                                                                                    </p>
                                                                                    <p><i class="mdi mdi-circle-medium text-success me-1"></i>
                                                                                        A partir de cette plateforme vous pouvez definir un politique de travails propre pour chaque siege de transport.
                                                                                    </p>
                                                                                </div>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">2</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                   Une planification de voyage dynamique et facile
                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">3</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                   Une sauvegarde des donnees clients (liste d'inscription)
                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">4</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Autres avantages
                                                                                </p>
                                                                            </li>
                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">4</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                   Autres avantages 
                                                                                </p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse4Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse4Client">
                                                                <div>Comment enregistrer une reservation de voyage</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse4Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <div class="card-body">
                                                                        <h5>Systéme de résérvation de tickét</h5>
                                                                        <div>
                                                                            <ul class="verti-timeline list-unstyled">
                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">1</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        Pour un clients qui n'a pas un compte ticket il est possible que l'agent administrateur puisse lui reserver un ticket de voyage. <br>
                                                                                        A partir de votre compte agent vous pouvez inscrire un client.
                                                                                    </p>
                                                                                </li>

                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">2</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        Aprés la réussite de l'inscription le client recevera un lien sms avec le quelle il poura payer son ticket. 
                                                                                    </p>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse7Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse7Client">
                                                                <div>Recevoir les paiement de tickets en ligne</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse7Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <div class="card-body">
                                                                        <h5>Systéme de paiement de tickét en ligne</h5>
                                                                        <div>
                                                                            <ul class="verti-timeline list-unstyled">
                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">1</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        Vous avez la possibilite de recevoir les paiment de ticket via Orange Money ou Wave.
                                                                                    </p>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse8Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse8Client">
                                                                <div>Systeme de remboursement de ticket</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse8Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <div class="card-body">
                                                                        <h5>Rembourser un ticket en cas d'anullation du ticket</h5>
                                                                        <div>
                                                                            <ul class="verti-timeline list-unstyled">
                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">1</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        Le remboursement depend de votre politique ticketing.
                                                                                        <ul class="verti-timeline list-unstyled">
                                                                                            <li class="event-list">
                                                                                                <div class="event-timeline-dot">
                                                                                                <i class="">1</i>
                                                                                                </div>
                                                                                                <p class="text-muted">
                                                                                                    Le ticket est remboursable apres l'heure de depart du bus
                                                                                                </p>
                                                                                            </li>

                                                                                            <li class="event-list">
                                                                                                <div class="event-timeline-dot">
                                                                                                <i class="">2</i>
                                                                                                </div>
                                                                                                <p class="text-muted">
                                                                                                    Le ticket n'est remboursable qu'avant l'heure de depart du bus
                                                                                                </p>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </p>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                <div class="card-body">
                    
                                                    <h4 class="card-title">Une video illustrative pour les agences</h4>
                                                    <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>
                    
                                                    <!-- 16:9 aspect ratio -->
                                                    <div class="ratio ratio-16x9">
                                                        <iframe src="https://www.youtube.com/embed/1y_kfWUCFDQ" title="YouTube video" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>


                                            <div class="tab-pane fade show" id="v-pills-token-sale" role="tabpanel"
                                                role="tabpanel">
                                                <h4 class="h4-title" class="card-title mb-4 btn btn-primary text-center" style="width: 100%;">Pour les clients</h4>
                                                <div>
                                                    <div id="gen-ques-accordion" class="accordion custom-accordion">
                                                        <div class="mb-3">
                                                            <a href="#general-collapse1Client" class="accordion-list"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse1Client">

                                                                <div>Comment créer un compte client TouCki ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>

                                                            </a>

                                                            <div id="general-collapse1Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <h5>Pour créer un compte client chez TouCki</h5>
                                                                    <div>
                                                                        <ul class="verti-timeline list-unstyled">
                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                    <i class="">1</i>
                                                                                </div>
                                                                                <p class="text-muted">Allez sur https://www.toucki.aeerk-sn.com/client-create ou téléchargez notre application TouCki sur play-Stor ou App-Stor.</p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                    <i class="">2</i>
                                                                                </div>
                                                                                <p class="text-muted">Saisissez votre nom prénom et nom, une adresse électronique valide, mettez votre numéro de téléphone, mettez votre numéro identification nationale.séléctione votre région,mettez votre image de profil (facultatif) et créez un mot de passe.</p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                    <i class="">3</i>
                                                                                </div>
                                                                                <p class="text-muted">

                                                                                Lisez attentivement les conditions d’utilisation
                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                    <i class="">4</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Cochez sur “Accepter” en bas des conditions d’utilisation et cliquez sur “Créer mon compte”
                                                                                </p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse2Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse2Client">
                                                                <div>Comment activer mon compte client TouCki ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse2Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <h5>La procédure d’activation d’un compte client TouCki se fait en deux étapes: </h5>
                                                                    <div>
                                                                        <ul class="verti-timeline list-unstyled">
                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                    <i class="">1</i>
                                                                                </div>
                                                                                <p class="text-muted">La validation par mail. <br> <br>

                                                                                    Connectez-vous à votre boîte mail et ouvrez le mail de notification envoyé par TouCki <br> <br>
                                                                                    Cliquez sur le lien de validation et marquez vos premiers pas chez TouCki

                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                    <i class="">2</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Important <br> <br>
                                                                                    Merci de bien vérifier que le numéro de téléphone renseigné lors de la création de votre compte client TouCKi est fonctionnel et qu’il s’agit bien d’un numéro de téléphone mobile.
                                                                                </p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse3Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse3Client">
                                                                <div>Quelles sonts les services disponibles sur votre compte client TouCki</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse3Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <h5>Les services disponibles au niveau du compte client TouCki sont les suivantes : </h5>
                                                                    <div>
                                                                        <ul class="verti-timeline list-unstyled">
                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                    <i class="">1</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Une reservation de ticket de voyage avec une multitude d'agence de voyage a votre disposition
                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                    <i class="">2</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Vous avez la possibilite d'ergistrer vos colis ou bagages et de voire cette liste sur votre compte TouCki
                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                    <i class="">3</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Vous avez la possibilite de modifier, de ropporer, d'annuler, de supprimer ou de transfere votre ticket en toute securite
                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                    <i class="">4</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Vous avez aussi le privillege de payer tous ces sevices en ligne via nos cannaux de paiement mobile tel Wave ou Orange Money 
                                                                                </p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse4Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse4Client">
                                                                <div>Comment puis je faire une résérvation de tickét</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse4Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <div class="card-body">
                                                                        <h5>Systéme de résérvation de tickét</h5>
                                                                        <div>
                                                                            <ul class="verti-timeline list-unstyled">
                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">1</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        Pour reserver un ticket sur TouCki, il vous faut d'abord vous connectez sur votre compte client. <br>
                                                                                        Arriver sur votre tableau de board vous aurez une liste de differentes agence de transport qui se trouvent dans votre localite.
                                                                                    </p>
                                                                                </li>

                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">2</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        Apres le choix de votre agence, vous allez cliquer sur le boutton siege pour acceder a la liste des sieges de l'agence conserne.
                                                                                        <br> Ainsi vous allez aussi cliquer sur le botton s'inscrire ensuite renseigner la date et la ville de votre destination.  
                                                                                    </p>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse7Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse7Client">
                                                                <div>Comment payé vos tickét de bus en ligne</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse7Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <div class="card-body">
                                                                        <h5>Systéme de paiement de tickét en ligne</h5>
                                                                        <div>
                                                                            <ul class="verti-timeline list-unstyled">
                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">1</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        Vous avez la possibilite de payer vos tickets en ligne a partire de votre compte. <br>
                                                                                        Dans partie ticket vous aurez la liste de vos reservations (recente ou anciennes), ainsi avec le boutton paye vous pouver paye vos ticket via Wave ou Orange Money
                                                                                    </p>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse8Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse8Client">
                                                                <div>Systeme de remboursement de ticket en cas d'absence</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse8Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <div class="card-body">
                                                                        <h5>Se faire rembourser en cas d'anullation du ticket</h5>
                                                                        <div>
                                                                            <ul class="verti-timeline list-unstyled">
                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">1</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        <span>Attention !</span><br>
                                                                                        Le remboursement de votre ticket depend de la politique interne de l'agence de transport et non de TouCki
                                                                                        <br>
                                                                                        Si toute fois votre ticket vient d'une agence qui a choisi l'option de remboursement du ticket meme apres le depart du bus votre ticket est remboursable a tout moment.
                                                                                        <br> <br>
                                                                                        Si non dans le cas ou loption choisi est "Ticket non remboursable apres depart du bus" votre ticket ne sera remboursable que si vous annuler le ticket avant l'heure de depart du bus. 
                                                                                    </p>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="card">
                                                            <div class="card-body">
                                
                                                                <h4 class="card-title">Une video illustrative pour les clients</h4>
                                                                <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>
                                
                                                                <!-- 16:9 aspect ratio -->
                                                                <div class="ratio ratio-16x9">
                                                                    <iframe src="https://www.youtube.com/embed/1y_kfWUCFDQ" title="YouTube video" allowfullscreen></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end vertical nav -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Faqs end -->


   <!-- about section start -->


    <!-- Features start -->
    
    <section class="section sectionCompteDesktope bg-white" id="features">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 ms-auto">
                    <div class="mt-4 mt-md-auto">
                        <div class="d-flex align-items-center mb-2">
                            <h4 class="mb-0">Le logiciel TouCki facilite la planification de voyage</h4>
                        </div>
                        <p class="text-muted">
                            Nous méttons à votre disposition une multitude d'agences de transport. Des mises à jour de bus en direct aux billets mobiles, notre application innovante est le moyen idéal pour planifier et suivre votre voyage.
                        </p>
                        <p class="text-muted">
                            Téléchargez gratuitement votre logiciel TouCki pour bénéficier d’une expertise de qualité et organiser de vos voyages en toute confiance.
                        </p>
                        
                    </div>
                </div>
                 <div class="col-md-6">
                    <div>
                        <img src="{{('user/assets/images/crypto/features-img/img-1.png')}}"  alt="" class="img-fluid mb-4 mx-auto d-block">
                        <div class="button-items mb-3 text-center">
                            <a href="" class="btn btn-primary" style="width:100%;"> <i class="fa fa-download"></i> Télécharger le logiciel TouCki</a>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>


    <section class="section home-section-mobile mt-5 p-3" id="features">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 ms-auto">
                    <div class="mt-4 mt-md-auto">
                        <div class="d-block align-items-center mb-2">
                            <img src="{{('user/assets/images/updateClient.svg')}}" style="width: 80%;" alt="" class="img-fluid mx-auto d-block">
                            <h5 class="mb-0">L'application TouCki facilite votre voyage</h5>
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
                        <div class="button-items mb-3 text-center">
                            {{--
                                <a href="" class="btn btn-primary"> <i class="bx bxl-play-store"></i> Sur Play Store</a>
                                <a href="" class="btn btn-success"> <i class="bx bxl-apple"></i> Sur App Store</a>
                            --}}
                            <a href="" class="btn btn-success btn-block" style="width:100%;"> <i class="fa fa-download"></i> Télécharger Notre APK</a>
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

@section('footerSection')
<script src="{{asset('admin/assets/js/card_1.js')}}"></script>
<script src="{{asset('admin/assets/js/card_2.js')}}"></script>
    <script>
        // This adds some nice ellipsis to the description:
        document.querySelectorAll(".projcard-description").forEach(function(box) {
            $clamp(box, {clamp: 6});
        });
        
    </script>

<script>
    var swiper = new Swiper('.blog-slider', {
      spaceBetween: 30,
      effect: 'fade',
      loop: true,
      mousewheel: {
        invert: false,
      },
      autoHeight: true,
      pagination: {
        el: '.blog-slider__pagination',
        clickable: true,
      }
    });
</script>

@endsection