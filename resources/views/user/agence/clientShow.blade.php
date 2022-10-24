@extends('user.layouts.app',['title' => 'Modifier Ticket Client'])
@section('headSection')
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('user/assets/build/css/intlTelInput.css')}}">
    <style>
        .bg-ico-hero{
            background-image:url(./user/assets/images/client.jpg) !important;
            background-size:cover;background-position:top !important;
            height: 100px !important;
        }
    </style>
@endsection
@section('main-content')

   <!-- hero section start -->
    <section class="section hero-section bg-ico-hero">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal" style="margin-top: -70px;" >
                <div class="col-lg-2"></div>
                <div class="col-lg-8 card_show text-center">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title ">Creer votre agence de transport</h1>
                        <p class="font-size-20 text-white" >
                            Toutes les options de voyage sur une seule plateforme
                        </p>
                        <!-- <div class="button-items mt-4 ">
                            <a href="{{ route('agence.create') }}" class="btn btn-success">Creer votre compte agence</a>
                            <a href="{{ route('agence.index') }}" class="btn btn-light">Nos agences de transport</a>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->


    <section class="section bg-white" id="agence">
        <div class="container">
            <form class="custom-validation" action="{{ route('client.update',$client->id) }}" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validation()">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="row">
                    <div class="col-xl-6">
                        <p class="text-center">
                            Bonjour {{$client->name}} vous etes sur le point de modifier votre ticket sur @foreach($client->siege->users() as $client_us) {{$client_us->name}} @endforeach
                            pour le siege de {{$client->siege->name}}.
                            Nous vous informon que la modification ne peut se faire apres le paiement du ticket.
                        </p>
                        <img src="{{asset('user/assets/images/updateClient.svg')}}" style="width: 100%;" alt="" srcset="">
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label class="form-label">Prenom et nom</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $client->name }}" required autocomplete="name"
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
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $client->email }}" required autocomplete="email" parsley-type="email"
                                    placeholder="E-Mail du client" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="mb-3" >
                            <label class="form-label">Votre numero de telephone</label>
                            <div>
                                <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $client->phone }}" autocomplete="phone"
                                    required placeholder="Numero de telephone" style="width:100%;" />
                                    <input type="hidden" name="indicatif" id="indicatif">
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
                                <input data-parsley-type="number" type="number" id="cni" class="form-control @error('cni') is-invalid @enderror" name="cni" value="{{ old('cni') ?? $client->cni }}" autocomplete="cni"
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
                                                    <option value="{{ $ville->id }}"
                                                        @if($client->ville->id == $ville->id) selected @endif
                                                    >{{$ville->name}}</option>
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
                                                        @if($date->buses->count() > 0)
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

                         <div class="d-flex flex-wrap gap-2 text-center">
                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                            Modifier votre ticket
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect btn-block">
                            Anuller
                        </button>
                    </div>
                    </div>

                   
                </div>
                
            </form>
        </div>
    </section>

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