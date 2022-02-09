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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="media">
                                        <div class="me-3">
                                            <img src="{{Storage::url($user->image_agence)}}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="text-muted">
                                                <p class="mb-2">Bienvenue sur {{$user->agence_name}}</p>
                                                <h5 class="mb-1">Siege de {{$user->siege->name}}</h5>
                                                <p class="mb-0">Agent {{$user->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 align-self-center">
                                    <div class="text-lg-center mt-4 mt-lg-0">
                                        <div class="row">
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Itinairaires</p>
                                                    <h5 class="mb-0">{{ $itineraires->count() }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Buses</p>
                                                    <h5 class="mb-0">{{$busCount->count()}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Clients du jour</p>
                                                    <h5 class="mb-0">{{ $clientCount->count() }} </h5>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 d-lg-block">
                                    <!-- d-none -->
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium text-center">Montant Total du jour</p>
                                            <h4 class="mb-0 text-center">{{montant_today()}} f</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="fa fa-coins font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                @foreach($itineraires as $itineraire)
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="btn btn-secondary text-center"> <i class="fa fa-arrow-down"></i> Itineraire de {{ $itineraire->name }}</h5>
                                @foreach($itineraire->date_departs as $date)
                                    <div class="row">
                                        @if($date->depart_at == carbon_today())
                                            @foreach($date->buses as $bus)
                                                <div class="col-xl-4">
                                                    <div class="card bg-soft bg-primary">
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-7">
                                                                    <div class="text-primary p-3">
                                                                        <h6 class="text-default font-size-13">Bus {{$bus->number}} | {{ $bus->matricule }} </h6>

                                                                        <ul class="ps-0 mb-0">
                                                                            <li class="py-1 text-muted" style="list-style: none;"><i class="fa fa-user-plus"></i> Inscrits : {{$bus->clients->count()}}</li>
                                                                            <li class="py-1 text-success" style="list-style: none;"><i class="fa fa-check-double"></i> Valider : {{ $bus->valider }}</li>
                                                                            <li class="py-1 text-primary" style="list-style: none;"><i class="fa fa-coins"></i> {{ $bus->montant }} f</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5 align-self-start">
                                                                    <img src="{{asset('admin/assets/images/bus.svg')}}" alt="" class="img-fluid">
                                                                    <a href="{{ route('admin.client.show',$bus->id) }}" class="btn btn-info  font-size-10 text-center mt-2"> <i class="fa fa-user-plus"></i> Clients</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @else
                                            <p class="text-muted text-center">Vous n'aviez pas de bus pour aujourdhuit</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
         
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


           
@endsection