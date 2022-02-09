@extends('admin.layouts.app')

@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Tableau de bord</h4>
                    </div>
                </div>
            </div>
            <!-- La partie des agents gerants des clients -->
            @if($user->is_admin == 3 && $user->role == 1 )
            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">Content de te revoir !</h5>
                                        <p>Tableau de bord {{$user->agence_name}}</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{Storage::url($user->image_agence)}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <img src="{{Storage::url($user->logo)}}" alt="" class="img-thumbnail rounded-circle">
                                    </div>
                                    <h5 class="font-size-15">{{$user->name}}</h5>
                                     <p class="text-muted mb-0 text-truncate">
                                            @if($user->is_admin == 1)
                                                Administrateur
                                            @elseif($user->is_admin == 2)
                                                Agence
                                            @elseif($user->is_admin == 3)
                                                Agent
                                            @endif
                                        </p>
                                </div>

                                <div class="col-sm-8">
                                    <div class="pt-4">

                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="font-size-15">{{$user->buses->count()}}</h5>
                                                <p class="text-muted mb-0">Buses</p>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="font-size-15">valeur</h5>
                                                <p class="text-muted mb-0">Clients</p>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a href="{{ route('admin.profil.show',$user->slug) }}" class="btn btn-primary waves-effect waves-light btn-sm">Votre Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Gain du jour</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3>{{montant_today()}} f</h3>
                                    <p class="text-muted"><span class="text-success me-2"><i class="fa fa-coins"></i> </span> La somme total des clients</p>

                                    <div class="mt-4">
                                        <a href="#" class="btn btn-primary waves-effect waves-light btn-sm">Voir plus <i class="mdi mdi-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mt-4 mt-sm-0">
                                        <div id="radialBar-chart" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                        @foreach($itineraires as $itineraire)
                            <h5 class="btn btn-primary" style="width: 100%;">Itineraire {{ $itineraire->name }}</h5>
                            <div class="row">
                                @foreach($itineraire->date_departs as $date)
                                    @if($date->depart_at == carbon_today())
                                        @foreach($date->buses as $bus)
                                            <h6 class="text-primary">Bus Numero {{$bus->number}} | Matricule {{ $bus->matricule }} <a href="{{ route('admin.client.show',$bus->id) }}" class="badge bg-success">Clients</a> </h6>
                                            <div class="col-md-4">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <p class="text-muted fw-medium">Total Inscrit</p>
                                                                <h4 class="mb-0">{{$bus->clients->count()}} Clients</h4>
                                                            </div>

                                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                                <span class="avatar-title">
                                                                    <i class="fa fa-users font-size-24"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <p class="text-muted fw-medium">Total Valider</p>
                                                                <h4 class="mb-0">{{ $bus->valider }} Clients</h4>
                                                            </div>

                                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                                <span class="avatar-title rounded-circle bg-primary">
                                                                    <i class="fa fa-check-double font-size-24"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <p class="text-muted fw-medium">Montant Total</p>
                                                                <h4 class="mb-0">{{ $bus->montant }} f</h4>
                                                            </div>

                                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                                <span class="avatar-title rounded-circle bg-primary">
                                                                    <i class="fa fa-coins font-size-24"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach
                                    @else
                                    <p class="text-muted text-center">Vous n'aviez pas de bus pour aujourdhuit</p>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    <!-- end row -->
                </div>
            </div>
            @endif
         
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


           
@endsection