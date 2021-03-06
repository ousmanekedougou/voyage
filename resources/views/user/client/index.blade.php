@extends('user.layouts.app',['title' => 'Client'])

@section('main-content')

    <!-- hero section start -->
    <section class="section hero-section bg-ico-hero" id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center" style="margin-top: -70px;">
                <div class="col-lg-offset-8 ">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title text-center">Vérifiez toutes vos résérvations</h1>
                        <p class="font-size-16 text-center text-white">
                            Pour vous aider à retrouver votre billet,vos bagages ou vos colis saisissez ci-dessous votre référence de réservation (indiquée dans l'email ou sms de confirmation que vous avez reçu) et votre adresse email ou numero de telephone.
                        </p>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->


<!-- currency price section start Version mobile-->
    <section class="section bg-white p-0">
        <div class="container">
            <div class="currency-price">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-xs me-3">
                                        <span
                                            class="avatar-title rounded-circle bg-info bg-soft text-warning font-size-18">
                                            <i class="fa fa-box-open"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h5>Vérifiez votre colis</h5>
                                        <p class="text-muted  mb-0">Accès facile à vos billets, peu importe votre destination, même hors connexion</p>
                                        <div class="button-items text-center mt-1">
                                            <a href="" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropColisClient">Verifiez vos colis</a>
                                        </div>
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
                                            <i class="fa fa-suitcase-rolling"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h5>Vérifiez vos bagages</h5>
                                        <p class="text-muted  mb-0">Tout ce dont vous avez besoin dans une seule application</p>
                                        <div class="button-items text-center mt-1">
                                            <a href="" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropBagageClient">Verifiez vos bagages</a>
                                        </div>
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
                                            <i class="fa fa-ticket-alt"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h5>Modififer votre ticket</h5>
                                        <p class="text-muted  mb-0">Mises à jour et rappels tout au long du trajet pour un voyage réussi</p>
                                        <div class="button-items text-center mt-1">
                                            <a href="" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropTickerClient">Verifiez votre ticker</a>
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