@extends('user.layouts.app',['title' => 'Client'])
@section('headSection')
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('user/assets/build/css/intlTelInput.css')}}">
@endsection
@section('main-content')

    <!-- hero section start -->
    <section class="section hero-section bg-ico-hero" id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center" style="margin-top: -70px;">
                <div class="">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">Vérifiez toutes vos résérvations</h1>
                        <p class="font-size-16 text-white">
                            
                        </p>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->

{{--
<!-- currency price section start Version mobile-->
    <section class="section bg-white p-0">
        <div class="container">
            <div class="currency-price">
                <div class="row">
                    <div class="col-xl-4 col-sm-6">
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
                    <div class="col-xl-4 col-sm-6">
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
                    <div class="col-xl-4 col-sm-6">
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

--}}

  <!-- Features start -->
    <section class="section " id="features">
        <div class="container">
             <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <h6 class="text-default text-uppercase text-center">Vérifiez votre colis</h6>
                        <p class="text-mueted">
                            <i class="mdi mdi-circle-medium text-success me-1"></i>
                            Pour vous aider à retrouver vos colis saisissez ci-dessous votre le numero de telephone dont vous avez recu la notification et entrez le siege de la provenance du colis. 
                        </p>
                        <p class="text-mueted">
                            <i class="mdi mdi-circle-medium text-success me-1"></i>
                            Accès facile à vos colis, peu importe sa destination</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 ms-auto">
                    <div class="mt-4 mt-md-auto">
                        <div class="d-flex align-items-center">
                          <img src="{{('user/assets/images/updateClient.svg')}}" alt="" class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
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
                                                    <optgroup label="{{$agence->name}}">
                                                        @foreach($sieges as $siege)
                                                            @if($agence->id == $siege->agence_id)
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
                                        Verifier
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
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Features end -->

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
                        <form class="custom-validation" action="{{ route('client.ticket') }}" method="POST" name="myform" onsubmit="return validation()" >
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

@section('footerSection')
    <script src="{{asset('admin/assets/js/pages/form-wizard.init.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
    <script src=" {{ asset('js/app.js') }} "></script>
  <script src="{{asset('user/assets/build/js/intlTelInput.js')}}"></script>
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      utilsScript: "user/assets/build/js/utils.js",
    });
</script>

<script>
	function validation(){
		var phone = document.forms["myform"]["phone"];
		var get_num_1 = String(phone.value).charAt(0);
		var get_num_2 = String(phone.value).charAt(1);
		var get_num_final = get_num_1+''+get_num_2;
		var first_num = Number(get_num_final);
		if (isNaN(phone.value)) {
			alert('Votre numero de telephone est invalide');
			return false;
		}else if(phone.value.length != 9){
			alert('Votre numero de telphone doit etre de 9 caracter exp: 77xxxxxxx');
			return false;
		}else if(first_num != 77 & first_num != 78 & first_num != 76 & first_num != 70 & first_num != 75  ){
			alert('Votre numero de telphone doit commencer par un (77 ou 78 ou 76 ou 70 ou 75)')
			return false;
		}
        var cni = document.forms["myform"]["cni"];
		if (isNaN(cni.value)) {
			alert('Votre numero numero de piece est invalide');
			return false;
		}else if(cni.value.length != 13){
			alert('Votre numero de piece doit etre de 13 carractere');
			return false;
		}
		return true;
	}
</script>
@endsection