@extends('user.layouts.app',['title' => 'Siege'])

@section('main-content')

    <!-- about section start -->
    <section class="section hero-section bg-ico-hero" style="margin-top: -30px;">
         <div class="bg-overlay bg-primary"></div>
         <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title text-white">About us</div>
                        <h4 class="text-white">{{$agence->name}}</h4>
                    </div>
                </div>
            </div>
            <div class="currency-price">
                <div class="row">
                    @foreach($sieges as $siege)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-xs me-3">
                                        <span
                                            class="avatar-title rounded-circle bg-primary text-white font-size-18">
                                            <i class="mdi mdi-bus"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-muted">Siege de {{$siege->name}}</p>
                                        <p class="text-muted text-truncate mb-0">
                                            <span> <i class="bx bx-envelope ms-1 text-success"></i> {{$siege->email}} </span> |
                                            <span> <i class="bx bx-phone ms-1 text-success"></i> {{$siege->phone}}</span>
                                        </p>
                                        <p class="text-muted text-truncate mb-0 mt-3">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$siege->id}}" class="btn btn-outline-primary btn-xs"> <i
                                                            class="mdi mdi-plus me-1"></i> S'isncrire </a>
                                             <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$siege->id}}" class="btn btn-outline-success btn-xs" style="margin-left: 8px;"> <i
                                                            class="bx bx-envelope ms-1"></i> Contacter </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- end row -->
            </div>
        </div>
    </section>
    <!-- about section end -->

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
                                <form class="custom-validation" action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="agence_name" value="{{ $agence->name }}">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label">Prenom et nom</label>
                                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                                    placeholder="Prenom et nom du client" />
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Votre adresse e-Mail</label>
                                                <div>
                                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" parsley-type="email"
                                                        placeholder="E-Mail du client" />
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Votre numero de telephone</label>
                                                <div>
                                                    <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                                        required placeholder="Numero de telephone" />
                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Votre numero de carte d'identite nationale</label>
                                                <div>
                                                    <input data-parsley-type="number" type="number" id="cni" class="form-control @error('cni') is-invalid @enderror" name="cni" value="{{ old('cni') }}" autocomplete="cni"
                                                        required placeholder="Numero de votre cni" />
                                                        @error('cni')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>

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
                                                <label class="form-label">Selectionner une date de votre</label>
                                                <div class="col-md-12">
                                                    <select  class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="date" required>
                                                        
                                                            @foreach($siege->itineraires as $itineraire)
                                                                <optgroup label="{{$itineraire->name}}">
                                                                    @foreach($itineraire->date_departs as $date)
                                                                        @if($date->buses->count() >= 1)
                                                                            <option value="{{ $date->id }}"> le {{$date->depart_at->format('d-m-y')}}</option>
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