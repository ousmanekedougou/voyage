@extends('user.layouts.app',['title' => 'Client'])

@section('main-content')

     <!-- hero section start -->
    <section class="section hero-section bg-ico-hero" id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">Vérifiez toutes vos réservations</h1>
                        
                    </div>
                </div>
                <div class="col-lg-2"></div>
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
                   <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="text-center">La fiabilite et la tracabilite</h5>
                                           <p class="font-size-16">
                                                Pour nous aider à retrouver votre billet,vos bagages ou vos colis saisissez ci-dessous votre référence de réservation (indiquée dans l'email ou sms de confirmation que vous avez reçu) et votre adresse email ou numero de telephone.
                                            </p>
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

 <!-- currency price section start -->
    <section class="section bg-white p-0">
        <div class="container">
            <div class="currency-price">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 text-center pb-3">
                                           <i class="fas fa-suitcase-rolling" style="font-size:80px;"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <h5>Verifiez votre colis</h5>
                                        Accès facile à vos billets, peu importe votre destination, même hors connexion
                                        <div class="button-items text-center">
                                            <a href="" class="btn btn-outline-success btn-sm btn-block" data-bs-toggle="modal" data-bs-target="#staticBackdropColisClient" style="width: 100%;">Verifiez</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                     <div class="col-md-4 text-center pb-3">
                                           <i class="bx bx-cart-alt" style="font-size:80px;"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <h5>Verifiez vos bagages</h5>
                                        Accès facile à vos billets, peu importe votre destination, même hors connexion
                                        <div class="button-items text-center">
                                            <a href="" class="btn btn-outline-success btn-sm btn-block" data-bs-toggle="modal" data-bs-target="#staticBackdropBagageClient" style="width: 100%;">Verifiez</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 text-center pb-3">
                                           <i class="bx bxs-id-card " style="font-size:80px;"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <h5>Modififer votre ticket</h5>
                                        Accès facile à vos billets, peu importe votre destination, même hors connexion
                                        <div class="button-items text-center">
                                            <a href="" class="btn btn-outline-success btn-sm btn-block" data-bs-toggle="modal" data-bs-target="#staticBackdropTickerClient" style="width: 100%;">Verifiez</a>
                                        </div>
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

<div class="modal fade" id="staticBackdropColisClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Rechercez votre colis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <p class="text-bold text-center">
                        Entrez votre numero de telephone
                    </p>
                    <p>
                        <form class="custom-validation" action="{{ route('client.colis') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="mb-3" >
                                        <label class="form-label">Votre numero de telephone</label>
                                        <div>
                                            <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                            required placeholder="Numero de telephone"  />
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
                                                    <optgroup label="{{$agence->name_agence}}">
                                                        @foreach($sieges as $siege)
                                                            @if($agence->id == $siege->user_id)
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
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                        Envoyer
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

<div class="modal fade" id="staticBackdropBagageClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Rechercer vos bagages  </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                 <div class="modal-body">
                    <p class="text-bold text-center">
                        Entrez votre numero de telephone
                    </p>
                    <p>
                        <form class="custom-validation" action="{{ route('client.bagage') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="mb-3" >
                                        <label class="form-label">Votre numero de telephone</label>
                                        <div>
                                            <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                            required placeholder="Numero de telephone"  />
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
                                                    <optgroup label="{{$agence->name_agence}}">
                                                        @foreach($sieges as $siege)
                                                            @if($agence->id == $siege->user_id)
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
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                        Envoyer
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


<div class="modal fade" id="staticBackdropTickerClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modifier votre inscription  </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <p class="text-bold text-center">
                        <span class="text-warning">Attention:</span> la modification n'est possible qu'avant le paiement de votre ticker
                    </p>
                    <p>
                        <form class="custom-validation" action="{{ route('client.ticket') }}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('GET')}}
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="mb-3" >
                                        <label class="form-label">Votre numero de telephone</label>
                                        <div>
                                            <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                                required placeholder="Numero de telephone"  />
                                                <input type="hidden" name="indicatif" id="indicatif">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Votre numero reference</label>
                                        <div>
                                            <input data-parsley-type="number" type="number" id="ref" class="form-control @error('ref') is-invalid @enderror" name="ref" value="{{ old('ref') }}" autocomplete="ref"
                                                required placeholder="Numero de votre reference" />
                                                @error('ref')
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
                                                    <optgroup label="{{$agence->name_agence}}">
                                                        @foreach($sieges as $siege)
                                                            @if($agence->id == $siege->user_id)
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
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                        Envoyer
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