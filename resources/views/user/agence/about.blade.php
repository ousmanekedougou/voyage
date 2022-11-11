@extends('user.layouts.app',['title' => 'A propos de '])
@section('main-content')

 

   <!-- hero section start -->
    <section class="section hero-section bg-ico-hero bg-agence"  id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal" style="margin-top: -70px;" >
                <div class="col-lg-12 card_show">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-2 hero-title">Agence {{ $agence->name }} </h1>
                        <p class="font-size-16 text-white">
                            Tout savoir sur notre agence
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->
    {{--
     <!-- currency price section start -->
    <section class="section bg-white p-0">
        <div class="container">
            <div class="currency-price">
                <div class="row">
                    <div class="col-md-12">
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
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- currency price section end -->
    --}}

    {{--
    <!-- about section start -->
    <section class="section pt-4 bg-white" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">A Propos de nous</div>
                        <h4>Qui sommes nous</h4>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12">

                    <div class="text-muted">
                        <h4>{{$agence->name}}</h4>
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

            </div>
            <!-- end row -->

            <hr class="my-5">
        </div>
        <!-- end container -->
    </section>
    <!-- about section end -->
    --}}

    <section class="section pt-4 bg-white" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">A Propos de nous</div>
                        <h4>Qui sommes nous</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-1">
                </div>
                <!-- end col -->
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                @if($agence->logo != '' )
                                    <img src="{{Storage::url($agence->logo)}}" alt="" class="avatar-sm me-4">
                                @else
                                    <img src="{{ asset('user/assets/images/bus.svg') }}" alt="" class="avatar-sm me-4">
                                @endif

                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15">{{$agence->name}}</h5>
                                    <p class="text-muted">Une agence de la region de {{ $agence->region->name }} - {{ $agence->adress }}</p>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-sm-7">
                                    <h5 class="font-size-15 mt-4">Presentation et Historique :</h5>

                                    <p class="text-muted">To an English person, it will seem like simplified English, as
                                        a skeptical Cambridge friend of mine told me what Occidental is. The European
                                        languages are members of the same family. Their separate existence is a myth.
                                        For science, music, sport, etc,</p>

                                    <div class="text-muted mt-4">
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> To achieve this, it
                                            would be necessary</p>
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Separate existence is
                                            a myth.</p>
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> If several languages
                                            coalesce</p>
                                    </div>
                                </div>

                                <div class="col-sm-5 ">
                                    @if($agence->logo != '' )
                                        <img src="{{Storage::url($agence->logo)}}" alt="" class="avatar-sm me-4"  style="width: 100%;">
                                    @else
                                        <img src="{{ asset('user/assets/images/bus.svg') }}" alt="" style="width: 100%;">
                                    @endif
                                </div>

                            </div>

                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class="text-center mb-5">
                                        <h4>Pour Quoi {{ $agence->name }}</h4>
                                        <p class="text-muted text-left">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos tenetur amet asperiores sed iste, qui molestiae vero et voluptatem, fugit exercitationem atque esse ad, architecto possimus aliquid. Nesciunt, magni culpa.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-center mb-5">
                                        <h4>Nos differents sieges de transport</h4>
                                    </div>
                                </div>
                                @if($agence->sieges->count() > 1)
                                    @foreach($agence->sieges as $siege)
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <h5 class="text-center">{{ $siege->name }}</h5>
                                                            <p class="text-muted  mb-1"><i class="fa fa-envelope"></i> {{ $siege->email }} </p>
                                                            <p class="text-muted  mb-2"><i class="fa fa-mobile"></i> {{ $siege->phone }} </p>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item me-3">
                                                                        {{--<a href="#" class="badge bg-primary p-1" data-bs-toggle="modal" data-bs-target="#staticBackdropEmailAgence-{{$siege->id}}"> <i class="fa fa-address-card"></i> Nous Contacter ici</a>--}}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center mb-5">
                                        <p>Cet agence ne dispose pas de siege</p>
                                    </div>
                                @endif
                            </div>

                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class="text-center mb-2">
                                        <h4>Notre politique de travail</h4>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="v-pills-gen-ques"
                                                    role="tabpanel">
                                                    <h4 class="card-title mb-4">Questions Generales</h4>

                                                    <div>
                                                        <div id="gen-ques-accordion" class="accordion custom-accordion">
                                                            <div class="mb-3">
                                                                <a href="#general-collapseOne" class="accordion-list"
                                                                    data-bs-toggle="collapse" aria-expanded="true"
                                                                    aria-controls="general-collapseOne">

                                                                    <div>Systeme de ticketing</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>

                                                                </a>

                                                                <div id="general-collapseOne" class="collapse show"
                                                                    data-bs-parent="#gen-ques-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">Everyone realizes why a new common
                                                                            language would be desirable: one could refuse to
                                                                            pay expensive translators. To achieve this, it
                                                                            would be necessary to have uniform grammar,
                                                                            pronunciation and more common words.</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <a href="#general-collapseTwo"
                                                                    class="accordion-list collapsed"
                                                                    data-bs-toggle="collapse" aria-expanded="false"
                                                                    aria-controls="general-collapseTwo">
                                                                    <div>Bagages & Colis</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                </a>
                                                                <div id="general-collapseTwo" class="collapse"
                                                                    data-bs-parent="#gen-ques-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">If several languages coalesce, the
                                                                            grammar of the resulting language is more simple
                                                                            and regular than that of the individual
                                                                            languages. The new common language will be more
                                                                            simple and regular than the existing European
                                                                            languages.</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <a href="#general-collapseThree"
                                                                    class="accordion-list collapsed"
                                                                    data-bs-toggle="collapse" aria-expanded="false"
                                                                    aria-controls="general-collapseThree">
                                                                    <div>Personne aptent a voyager</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                </a>
                                                                <div id="general-collapseThree" class="collapse"
                                                                    data-bs-parent="#gen-ques-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">It will be as simple as Occidental;
                                                                            in fact, it will be Occidental. To an English
                                                                            person, it will seem like simplified English, as
                                                                            a skeptical Cambridge friend of mine told me
                                                                            what Occidental.</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div>
                                                                <a href="#general-collapseFour"
                                                                    class="accordion-list collapsed"
                                                                    data-bs-toggle="collapse" aria-expanded="false"
                                                                    aria-controls="general-collapseFour">
                                                                    <div>Where can I get some ?</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                </a>
                                                                <div id="general-collapseFour" class="collapse"
                                                                    data-bs-parent="#gen-ques-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">To an English person, it will seem
                                                                            like simplified English, as a skeptical
                                                                            Cambridge friend of mine told me what Occidental
                                                                            is. The European languages are members of the
                                                                            same family. Their separate existence is a myth.
                                                                        </p>
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

                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class="text-center mb-2">
                                        <h4>Nos horaires de transport</h4>
                                    </div>
                                </div>
                                @if($agence->sieges->count() > 1)
                                    @foreach($agence->sieges as $siege_h)
                                        <div class="">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">Pour le siege de {{$siege_h->name}} </h4>

                                                <div class="table-responsive">
                                                    <table class="table table-nowrap align-middle mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Jours</th>
                                                                <th scope="col">Ouverture</th>
                                                                <th scope="col">Fermeture</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach(unserialize($siege_h->jours) as $jour)
                                                                <tr>
                                                                    <th scope="row">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-xs me-3">
                                                                            <span>
                                                                                @if($jour == 0)
                                                                                    Dimanche
                                                                                @elseif($jour == 1)
                                                                                    Lundi
                                                                                @elseif($jour == 2)
                                                                                    Mardi
                                                                                @elseif($jour == 3)
                                                                                    Mercredi
                                                                                @elseif($jour == 4)
                                                                                    Jeudi
                                                                                @elseif($jour == 5)
                                                                                    Vendredi
                                                                                @elseif($jour == 6)
                                                                                    Samedi  
                                                                                @endif
                                                                            </span>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                    <td>
                                                                        <div class="text-muted">
                                                                            {{$siege_h->opened_at}}
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-muted">{{$siege_h->closed_at}}</div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center mb-2">
                                        <h4>Cet agence n'a pas de siege</h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-1">
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        

    </section>
    
    
  

    

 
           
@endsection