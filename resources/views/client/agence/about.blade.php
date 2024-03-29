@extends('admin.layouts.app')


@section('main-content')

 <div class="page-content">
        <div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="media">
                                <div class="avatar-md me-4">
                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="
                                                @if($agence->image != null)
                                                    {{Storage::url($agence->logo)}}
                                                @else
                                                        https://ui-avatars.com/api/?name={{$agence->name}}
                                                @endif
                                            " alt="">
                                        
                                    </span>
                                </div>
                                <div class="media-body align-self-center">
                                    <div class="text-muted">
                                        <h5 class="mb-1">{{$agence->name}}</h5>
                                        <p class="mb-0">
                                            Une agence de la region de {{ $agence->region->name }} - {{ $agence->adress }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 align-self-center">
                            <div class="text-lg-center mt-4 mt-lg-0">
                                <div class="row">
                                    <div class="col-4">
                                        <div>
                                            <p class="text-muted text-truncate mb-2">Total Sieges</p>
                                            <h5 class="mb-0">{{ $agence->sieges->count() }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div>
                                            <p class="text-muted text-truncate mb-2">Total Agent</p>
                                            <h5 class="mb-0">{{ $agence->agents->count() }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div>
                                            <p class="text-muted text-truncate mb-2">Autres</p>
                                            <h5 class="mb-0"></h5>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 d-lg-block">
                            
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

     <section class="section pt-4" id="about">
        <div class="container">
            <div class="row bg-white pt-3">
                <!-- end col -->
                    <div class="">
                        <div class="">

                            <div class="row">

                                <div class="col-sm-7">
                                    <h5 class="font-size-15 mt-4">Presentation et Historique :</h5>

                                    <p class="text-muted">{{ $agence->abaout->abaout }}</p>

                                    <div class="text-muted mt-4">
                                        <p><i class="bx bx-envelope text-muted me-1"></i> {{$agence->email}} </p>
                                        <p><i class="bx bx-mobile text-muted me-1"></i> {{ $agence->phone }} </p>
                                        <p><i class="bx bx-map text-muted me-1"></i> {{ $agence->region->name }} ( {{ $agence->adress }} ) </p>
                                    </div>
                                </div>

                                <div class="col-sm-5 ">
                                    <img src="{{Storage::url($agence->logo)}}" alt="" class="avatar-sm me-4"  style="width: 100%; height:auto;">
                                </div>

                            </div>

                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class=" mb-5">
                                        <h4 class="btn btn-light btn-block btn-sm font-size-18 text-left text-black card-title" style="width: 100%;">Pour Quoi {{ $agence->name }}</h4>
                                        <p class="text-muted text-left">
                                            {{ $agence->abaout->motivation }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class=" mb-2">
                                        <h4 class="btn btn-light btn-block btn-sm font-size-18 text-left text-black card-title" style="width: 100%;">Nos differents sieges de transport</h4>
                                    </div>
                                </div>
                                @if($agence->sieges->count() > 1)
                                    @foreach($agence->sieges as $siege)
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="">
                                                <div class="card-body">
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <h5 class="">Siege de {{ $siege->name }}</h5>
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
                                        <p class="text-danger">Cet agence ne dispose pas de siege</p>
                                    </div>
                                @endif
                            </div>

                            

                            

                            
                        </div>
                    </div>
                <!-- end col -->
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        

    </section>

     <!-- Features start -->
    <section class="section" id="features" style="margin-top: -85px;">
        <div class="container">
            <div class="row bg-white pt-3">
                <h4 class="text-center" style="font-weight: 600;">Notre politique de travail</h4>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="v-pills-gen-ques"
                        role="tabpanel">
                        <h4 class="card-title mb-4 text-center">Questions Generales</h4>

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
                                            <p class="mb-0">{{ $agence->abaout->politic_ticket }}</p>
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
                                            <p class="mb-0">{{ $agence->abaout->politic_bc }}</p>
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
                                            <p class="mb-0">{{ $agence->abaout->politic_apte }}</p>
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
            <!-- end row -->
        </div>
    </section>

     <!-- Features start -->
    <section class="section" id="features" style="margin-top: -85px;">
        <div class="container">
            <div class="row bg-white pt-3">
                <h4 class="text-center" style="font-weight: 600;">Nos horaires de transport</h4>
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
                        <p class="text-danger">Cet agence n'a pas de siege</p>
                    </div>
                @endif
            </div>
            <!-- end row -->
        </div>
    </section>


     <!-- Features start -->
    <section class="section" id="features" style="margin-top: -85px;">
        <div class="container">
            <div class="row bg-white pt-3">
                <h4 class="text-center" style="font-weight: 600;">Itineraire, villes, tickets et arrets</h4>
                @if($agence->sieges->count() > 1)
                    @foreach($agence->sieges as $siege)
                        <div class="">
                            <div class="">
                                <h5 class="card-title mb-4 btn btn-sm bg-light" style="width: 100%;">Pour le siege de {{$siege->name}} </h5>
                                <div class="row">
                                    @foreach($siege->itineraires as $itineraire)
                                    <div class=" @if($siege->itineraires->count() > 1) col-xl-6 @else col-xl-12 @endif ">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title text-center">Itineraire de {{ $itineraire->name }}</h6>
                                                <p class="card-title-desc">
                                                    {{$itineraire->villes->count()}} villes
                                                </p>    
                                                
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                
                                                        <thead>
                                                            <tr>
                                                                <th>Villes</th>
                                                                <th></th>
                                                                <th>Prix</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($itineraire->villes as $ville)
                                                            <tr>
                                                                <td> De {{ $ville->name }}</td>
                                                                <td></td>
                                                                <td>{{ $ville->amount }} f</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <h6 class="card-title mt-4 mb-2">Les villes d'arrets :</h6>
                                                <p class="card-title-desc">
                                                    {{ $agence->abaout->ville_arret }}
                        
                                                <h4 class="card-title">Geolocalisation du bus</h4>
                                                <p class="card-title-dsec">Google Maps</p>
                
                                                <div id="gmaps-markers" class="gmaps">
                                                    <iframe src="https://www.google.sn/maps/place/Rue+39,+Dakar/@14.6870931,-17.4510948,18.46z/data=!4m5!3m4!1s0xec172f42ba43de9:0x2131ba43a638922f!8m2!3d14.6869267!4d-17.4512127?hl=fr&authuser=0" frameborder="0"
                                                    style="width: 100%; height:100%;"
                                                    ></iframe>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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
            <!-- end row -->
        </div>
    </section>

      </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->





           
@endsection