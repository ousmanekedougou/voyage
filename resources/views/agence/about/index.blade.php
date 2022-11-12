@extends('admin.layouts.app')
@section('headsection')
 <link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Page de presentation de votre agence</h4>
                </div>
            </div>
        </div>

        <!-- About -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('agence.about.about') }}" method="POST" class="outer-repeater"> 
                            @csrf
                            @method('PUT')
                            <div data-repeater-list="outer-group" class="outer">
                                <div data-repeater-item class="outer">
                                    <div class="mb-3">
                                        <label for="formmessage">Presentation :</label>
                                        <textarea id="formmessage" name="abaout" class="form-control text-left @error('abaout') is-invalid @enderror" value="{{ old('abaout') ?? $agence->abaout }}" rows="3">
                                        {{ $agence->abaout }}
                                        </textarea>
                                        @error('abaout')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enregistre votre presentation</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <!-- Partie de la motivation -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('agence.about.motivation') }}" method="POST" class="outer-repeater"> 
                            @csrf
                            @method('PUT')
                            <div data-repeater-list="outer-group" class="outer">
                                <div data-repeater-item class="outer">
                                    <div class="mb-3">
                                        <label for="formmessage">Votre texte de motivation :</label>
                                        <textarea id="formmessage" name="motivation" class="form-control text-left @error('motivation') is-invalid @enderror" value="{{ old('motivation') ?? $agence->motivation }}" rows="3">
                                        {{ $agence->motivation }}
                                        </textarea>
                                        @error('motivation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enregistre votre text de motivation</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- Fin de la partie de la motivation -->


        <!-- Partie de la politique de ticket -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('agence.about.ticket') }}" method="POST" class="outer-repeater"> 
                            @csrf
                            @method('PUT')
                            <div data-repeater-list="outer-group" class="outer">
                                <div data-repeater-item class="outer">
                                    <div class="mb-3">
                                        <label for="formmessage">Systeme de tickets :</label>
                                        <textarea id="formmessage" name="politic_ticket" class="form-control text-left @error('politic_ticket') is-invalid @enderror" value="{{ old('politic_ticket') ?? $agence->politic_ticket }}" rows="3">
                                        {{ $agence->politic_ticket }}
                                        </textarea>
                                        @error('politic_ticket')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enregistre votre systeme de ticket</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- Fin de la partie de la politique de ticket -->


        <!-- Partie de la politique de bagage et colis -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                       <form action="{{ route('agence.about.bagagec') }}" method="POST" class="outer-repeater"> 
                            @csrf
                            @method('PUT')
                            <div data-repeater-list="outer-group" class="outer">
                                <div data-repeater-item class="outer">
                                    <div class="mb-3">
                                        <label for="formmessage">Votre texte de pour les bagages et colis :</label>
                                        <textarea id="formmessage" name="politic_bc" class="form-control text-left @error('politic_bc') is-invalid @enderror" value="{{ old('politic_bc') ?? $agence->politic_bc }}" rows="3">
                                        {{ $agence->politic_bc }}
                                        </textarea>
                                        @error('politic_bc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enregistre votre politique de bagages et colis</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- Fin de la partie de la politique de bagage et colis -->


        <!-- Partie de la apte -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('agence.about.personne') }}" method="POST" class="outer-repeater"> 
                            @csrf
                            @method('PUT')
                            <div data-repeater-list="outer-group" class="outer">
                                <div data-repeater-item class="outer">
                                    <div class="mb-3">
                                        <label for="formmessage">Personnes aptent de voyager :</label>
                                        <textarea id="formmessage" name="politic_apte" class="form-control text-left @error('politic_apte') is-invalid @enderror" value="{{ old('politic_apte') ?? $agence->politic_apte }}" rows="3">
                                        {{ $agence->politic_apte }}
                                        </textarea>
                                        @error('politic_apte')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enregistre le type de voyageurs</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- Fin de la partie de la apte -->


        <!-- Partie de la motivation -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                       <form action="{{ route('agence.about.villeArret') }}" method="POST" class="outer-repeater"> 
                            @csrf
                            @method('PUT')
                            <div data-repeater-list="outer-group" class="outer">
                                <div data-repeater-item class="outer">
                                    <div class="mb-3">
                                        <label for="formmessage">Villes arrets et objectifs :</label>
                                         <textarea id="formmessage" name="ville_arret" class="form-control text-left @error('ville_arret') is-invalid @enderror" value="{{ old('ville_arret') ?? $agence->ville_arret }}" rows="3">
                                        {{ $agence->ville_arret }}
                                        </textarea>
                                        @error('ville_arret')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enregistre vos arrets</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- Fin de la partie de la motivation -->






        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- Static Backdrop Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Ajouter un siege de votre agence</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                                <p>
                                    <form class="custom-validation" action="{{ route('agence.siege.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Nom de votre siege</label>
                                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                                        placeholder="Nom de votre siege" />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">E-Mail de votre siege</label>
                                                    <div>
                                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" parsley-type="email"
                                                            placeholder="E-Mail de votre siege" />
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Numero de telephone votre siege</label>
                                                    <div>
                                                        <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                                            required placeholder="Numero de telephone votre siege" />
                                                             @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Adresse du siege</label>
                                                    <input type="text" class="form-control" required id="adress" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" autocomplete="adress"
                                                    placeholder="Adresse du siege" />
                                                    @error('adress')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                             
                                              
                                            </div>
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                    Enregistrer le siege de votre agence
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


           
@endsection

@section('footersection')
  <!-- apexcharts -->
        <script src="{{asset('admin/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
        
        <!-- Saas dashboard init -->
        <script src="{{asset('admin/assets/js/pages/saas-dashboard.init.js')}}"></script>
@endsection