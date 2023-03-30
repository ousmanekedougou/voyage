@extends('user.layouts.app',['title' => 'Client'])
@section('headSection')
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('user/assets/build/css/intlTelInput.css')}}">
    <style>
        .bg-ico-hero{
            background-image:url(./user/assets/images/agence.webp) !important;
            background-size:cover;background-position:top !important;
            height: 100px !important;
        }
        .section .container .row_pricipal{
            margin-top:-70px;
        }
        .img-fluid{
            width: 70%;
        }
    </style>
@endsection
@section('main-content')

    <!-- hero section start -->
    <section class="section hero-section bg-ico-hero section-responsive" id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal">
                <div class="col-lg-12 card_show text-center">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title text-center">Vérifiez toutes vos résérvations : <br> Tickets , Bagages & Colis</h1>
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


     <!-- currency price section start Version mobile-->
    <section class="section p-0 verification-text-mobile">
        <div class="container">
            <div class="currency-price">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <h5>Vérifiez toutes vos résérvations</h5>
                                        <p class="text-muted  mb-0"> Pour vous aider à retrouver vos colis saisissez ci-dessous votre le numero de telephone dont vous avez recu la notification et entrez le siege de la provenance du colis. </p>
                                        <p class="text-muted  mb-0"> Accès facile à vos colis, peu importe la destination </p>
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



  <!-- Features start -->
    <section class="section " id="features">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 ms-auto">
                    <div class="mt-4 mt-md-auto">
                        <div class="d-flex align-items-center img-verification-mobile">
                          <img src="{{('user/assets/images/dowload/email-tickets.svg')}}" alt="" class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                       <form class="custom-validation bg-white p-3" action="{{ route('client.colis') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="row">
                                <h5 class="text-reserve-on-mobile">Vérifiez toutes vos résérvations</h5>
                                <p class="text-muted  mb-0 text-reserve-on-mobile"> Pour vous aider à retrouver vos colis saisissez ci-dessous votre le numero de telephone dont vous avez recu la notification et entrez le siege de la provenance du colis. </p>
                                <p class="text-muted  mb-0 text-reserve-on-mobile"> Accès facile à vos colis, peu importe la destination </p>
                                <div class="col-xl-12">
                                    <div class="mb-3" >
                                        <label class="form-label">Votre numero de telephone</label>
                                        <div>
                                            <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                            required placeholder="Numero de telephone" style="width:100%;" />
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