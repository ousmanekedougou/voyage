@extends('user.layouts.app',['title' => 'Siege'])

@section('headSection')
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('user/assets/build/css/intlTelInput.css')}}">
  	<link rel="stylesheet" href="{{asset('user/assets/build/css/demo.css')}}">
@endsection

@section('main-content')

    <!-- about section start -->
    <section class="section hero-section bg-ico-hero agance_show" >
         <!-- <div class="bg-overlay bg-primary"></div> -->
         <div class="container">
             <div class="row">
                 <div class="col-sm-2"></div>
                 <div class="col-sm-8">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-sm-3 align-self-end">
                                    <img src="{{asset('admin/assets/images/profile-img.png')}}" alt="" class="img-fluid">
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="text-primary p-3 siege_show_text">
                                        <h1 class="text-primary">{{$agence->name}}</h1>
                                        <p>{{$agence->slogan}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-3 align-self-end text-center card_gif">
                                    <img src="{{asset('user/assets/images/buse.gif')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-sm-2"></div>
             </div>
            
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <h2 class="text-white">Nos Sieges</h2>
                    </div>
                </div>
            </div>
            <div class="currency-price">
                <div class="row">
                    @foreach($sieges as $siege)
                    <div class="col-md-4">
                        {{--
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
                                        <p class="text-muted text-truncate mb-0 siege_info">
                                            <span> <i class="bx bx-envelope ms-1"> {{$siege->email}}</i>  </span> <i class="slash">|</i>
                                            <span> <i class="bx bx-phone ms-1"> {{$siege->phone}}</i> </span>
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
                        --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="text-lg-center">
                                            <div
                                                class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none">
                                                <span
                                                    class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                                    @if($siege->image == '')
                                                     <i class="mdi mdi-bus"></i>
                                                     @else
                                                    <img src="{{Storage::url($siege->image)}}" alt="" style="width:100%;">
                                                    @endif
                                                </span>
                                            </div>
                                            <h5 class="mb-1 font-size-10 text-uppercase siege_show_title"> Siege de {{ $siege->name }}</h5>
                                        </div>
                                    </div>

                                    <div class="col-lg-8">
                                        <div>
                                            <h6 class="text-truncate "><i class="fa fa-mobile"> {{$siege->phone}}</i></h6>
                                            <p class="mb-4 mb-lg-5 d-flex"><i class="fa fa-envelope" style="font-size: 11px;"> {{$siege->email}}</i></p>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item me-3">
                                                     <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$siege->id}}" class="badge bg-primary btn-xs"> <i
                                                            class="fa fa-user-plus"> S'isncrire</i> </a>
                                                </li>
                                                 <li class="list-inline-item me-3">
                                                   <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdropEmailAgence-{{$siege->id}}" class="badge bg-info btn-xs"> <i
                                                            class="fa fa-user-plus"> Contacter</i> </a>
                                                </li>
                                            </ul>
                                        </div>
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
                                <form class="custom-validation" action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validation()">
                                    @csrf
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


      <!-- Static Backdrop Modal de l'ajout -->
    @foreach($sieges as $siege)
        <div class="modal fade" id="staticBackdropEmailAgence-{{$siege->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Nous Contacter </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <p>
                                <form class="custom-validation" action="{{ route('client.edit',$siege->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label">Votre prenom et nom</label>
                                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                                    placeholder="" />
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Votre email</label>
                                                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                                                    placeholder="" />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Objet</label>
                                                <input type="text" id="sub" class="form-control @error('sub') is-invalid @enderror" name="sub" value="{{ old('sub') }}" required autocomplete="sub"
                                                    placeholder="" />
                                                @error('sub')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Votre message</label>
                                                <div>
                                                    <textarea required id="sms" class="form-control @error('sms') is-invalid @enderror" name="sms" value="{{ old('sms') }}" autocomplete="sms" class="form-control" rows="3"></textarea>
                                                        @error('sms')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                Envoyer le message
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

@section('footerSection')
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