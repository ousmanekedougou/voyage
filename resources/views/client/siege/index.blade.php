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
                                            <img src="{{(Storage::url(Auth::guard('client')->user()->image))}}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="text-muted">
                                                <p class="mb-2">Bienvenue sur votre compte client</p>
                                                <h5 class="mb-1">TouCki</h5>
                                                <p class="mb-0">
                                                    Client
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 align-self-center">
                                    <div class="text-lg-center mt-4 mt-lg-0">
                                        <div class="row">
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Total Agences</p>
                                                    <h5 class="mb-0"></h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Total Sieges</p>
                                                    <h5 class="mb-0">10</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Newsletter</p>
                                                    <h5 class="mb-0">10</h5>
                                                    
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

            <!-- currency price section start-->
            <div class="row">
                @foreach($sieges as $siege)
                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="avatar-xs me-3">
                                    <span
                                        class="avatar-title rounded-circle bg-info bg-soft text-warning font-size-18">
                                        @if($siege->image == '')
                                            <i class="mdi mdi-bus"></i>
                                        @else
                                            <img src="{{Storage::url($siege->image)}}" alt="" style="width:100%;">
                                        @endif
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h5>Siege de {{ $siege->name }}</h5>
                                    <p class="text-muted  mb-1"><i class="fa fa-envelope"></i> {{ $siege->email }} </p>
                                    <p class="text-muted  mb-2"><i class="fa fa-mobile"></i> {{ $siege->phone }} </p>
                                    <ul class="list-inline mb-0 text-center">
                                        <li class="list-inline-item me-3">
                                            <a href="#" class="badge bg-success p-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$siege->id}}"> <i class="fa fa-user-plus"></i> S'inscrire</a>
                                        </li>
                                        <li class="list-inline-item me-3">
                                            <a href="{{route('customer.client.show',$siege->id)}}" class="badge bg-info p-1"><i class="fa fa-ticket-alt"></i> Tickets</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- end row -->
            <!-- currency price section end -->

            <div class="row">
                <div class="col-lg-12">
                   
                </div>
            </div>
            <!-- end row -->
         
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    

     <!-- Static Backdrop Modal de l'ajout -->
    @foreach($sieges as $siege)
        <div class="modal fade" id="staticBackdrop-{{$siege->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">S'inscrire sur {{ $siege->name }} </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <p>
                                <form class="custom-validation" action="{{ route('customer.client.store') }}" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validation()">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="mb-3 row">
                                                <label class="form-label">Selectionner votre ville de voyage</label>
                                                <div class="col-md-12">
                                                    <select class="form-control select2 @error('ville') is-invalid @enderror" name="ville" required autocomplete="ville" required>
                                                        <option>Select</option>
                                                        
                                                            @foreach($siege->itineraires as $itineraire)
                                                                <optgroup label="{{$itineraire->name}}">
                                                                    @foreach($itineraire->villes as $ville)
                                                                        <option value="{{ $ville->id }}">{{$ville->name}}</option>
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
                                        
                                            <div class="mb-3 row">
                                                <label class="form-label">Selectionner une date de votre voyage</label>
                                                <div class="col-md-12">
                                                    <select  class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="date" required>
                                                        
                                                            @foreach($siege->itineraires as $itineraire)
                                                                <optgroup label="{{$itineraire->name}}">
                                                                    @foreach($itineraire->date_departs as $date)
                                                                        @if($date->depart_at >= carbon_today())
                                                                            @if($date->buses->count() >= 1)
                                                                                <option value="{{ $date->id }}"> le {{$date->depart_at}}</option>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </optgroup>
                                                            @endforeach
                                                    </select>
                                                    @error('date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{--
                                            <div class="mb-3 row">
                                                <label class="form-label">Selectionner un bus</label>
                                                <div class="col-md-12">
                                                    <select  class="form-control @error('bus') is-invalid @enderror" name="bus" required autocomplete="bus" required>
                                                        
                                                        @foreach($siege->itineraires as $itineraire)
                                                            <optgroup label="{{$itineraire->name}}">
                                                                @foreach($itineraire->date_departs as $date)
                                                                    <optgroup label="{{$date->depart_at}}" style="margin-left: 15px;">
                                                                        @foreach($date->buses as $bus)
                                                                                @if($bus->plein == 0)
                                                                                <option value="{{ $bus->id }}"> bus {{ $bus->matricule }} N{{ $bus->number }}</option>
                                                                                @endif
                                                                        @endforeach
                                                                    </optgroup>
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    </select>
                                                    @error('bus')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            --}}
                                        </div>
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                Enregistrer Ce Client
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect btn-block">
                                                Anuller
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </p>
                        </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Fin du modal de l'ajout -->






           
@endsection