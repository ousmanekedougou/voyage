@extends('admin.layouts.app')

@section('headsection')
    <link href="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18 text-center">Ajouter un client</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="custom-validation" action="{{ route('agent.client.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Prenom et nom du client</label>
                                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                                            placeholder="Prenom et nom du client" />
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">E-Mail du client</label>
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
                                                        <label class="form-label">Numero de telephone</label>
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
                                                        <label class="form-label">Numero de votre CNI</label>
                                                        <div>
                                                            <input data-parsley-type="number" type="number" id="cni" class="form-control @error('cni') is-invalid @enderror" name="cni" value="{{ old('cni') }}" autocomplete="cni"
                                                                required placeholder="Numero de votre CNI" />
                                                                @error('cni')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label class="form-label">Selectionner ville de voyage</label>
                                                        <div class="col-md-12">
                                                            <select class="form-control select2 @error('ville') is-invalid @enderror" name="ville" required autocomplete="ville" required>
                                                               <option>Select</option>
                                                                @foreach($itineraires as $itineraire)
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
                                                        <label class="form-label">Selectionner une date</label>
                                                        <div class="col-md-12">
                                                            <select  class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="date" required>
                                                               
                                                                    @foreach($itineraires as $itineraire)
                                                                        <optgroup label="{{$itineraire->name}}">
                                                                            @foreach($itineraire->date_departs as $date)
                                                                                @if($date->buses->count() >= 1)
                                                                                    <option value="{{ $date->id }}"> le {{ $date->depart_at->format('d-m-y') }}</option>
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
                                                                @foreach($itineraires as $itineraire)
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
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Static Backdrop Modal de la modification -->
                @foreach($client_todays as $client_tdy)
                <div class="modal fade" id="staticBackdrop-{{$client_tdy->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modifier un client</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                        <form class="custom-validation" action="{{ route('agent.client.update',$client_tdy->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            {{ Method_field('PUT') }}
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Prenom et nom du client</label>
                                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $client_tdy->name}}" required autocomplete="name"
                                                            placeholder="Prenom et nom du client" />
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">E-Mail du client</label>
                                                        <div>
                                                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $client_tdy->email}}" required autocomplete="email" parsley-type="email"
                                                                placeholder="E-Mail du client" />
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Numero de telephone</label>
                                                        <div>
                                                            <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $client_tdy->phone}}" autocomplete="phone"
                                                                required placeholder="Numero de telephone" />
                                                                @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Numero de votre CNI</label>
                                                        <div>
                                                            <input data-parsley-type="number" type="number" id="cni" class="form-control @error('cni') is-invalid @enderror" name="cni" value="{{ old('cni') ?? $client_tdy->cni}}" autocomplete="cni"
                                                                required placeholder="Numero de votre CNI" />
                                                                @error('cni')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label class="form-label">Selectionner ville de voyage</label>
                                                        <div class="col-md-12">
                                                            <select class="form-control select2 @error('ville') is-invalid @enderror" name="ville" required autocomplete="ville" required>
                                                               <option>Select</option>
                                                                @foreach($itineraires as $itineraire)
                                                                    <optgroup label="{{$itineraire->name}}">
                                                                        @foreach($itineraire->villes as $ville)
                                                                            <option value="{{ $ville->id }}"
                                                                                @if($ville->id == $client_tdy->ville_id)
                                                                                    selected
                                                                                @endif    
                                                                            >{{$ville->name}}</option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                @endforeach
                                                            </select>
                                                            @error('ville')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label class="form-label">Selectionner un bus</label>
                                                        <div class="col-md-12">
                                                            <select  class="form-control @error('bus') is-invalid @enderror" name="bus" required autocomplete="bus" required>
                                                                @foreach($itineraires as $itineraire)
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
                                                </div>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                        Modifier Ce Client
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
                <!-- Fin du modal de la modification -->


                  <!-- Static Backdrop Modal du paiment -->
                @foreach($client_todays as $client_tdy)
                <div class="modal fade" id="staticBackdroppaiment-{{$client_tdy->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Paiment du client</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                        <form class="custom-validation" action="{{ route('admin.payer',$client_tdy->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            {{ Method_field('PUT') }}
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    
                                                </div>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                        Paiment du Client
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
                <!-- Fin du modal du paiment -->



@endsection


@section('footersection')
<!-- Responsive Table js -->
    <script src="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/select2/js/select2.min.js')}}"></script>
    <!-- Init js -->
    <script src="{{asset('admin/assets/js/pages/table-responsive.init.js')}}"></script>
@endsection