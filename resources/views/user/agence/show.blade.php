@extends('user.layouts.app',['title' => 'Siege'])

@section('headSection')
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('user/assets/build/css/intlTelInput.css')}}">
     <style>
        /* .bg-ico-hero {
            background-image:url(./user/assets/images/client.jpg) !important;
            background-size:cover;background-position:top !important;
            height: 100px !important;
        } */
    </style>
@endsection

@section('main-content')

    <!-- hero section start -->
    <section class="section hero-section bg-ico-hero section-responsive"  id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal" style="margin-top: -70px;" >
                <div class="card_show">
                    <div class="text-white-50">
                        <h1 class="text-white font-size-23 font-weight-semibold mb-3 hero-title">Réservez vos billets de bus sur <span class="text-success">{{$agence->name}}</span> au meilleur prix</h1>
                    </div>
                   <p class="font-size-16 text-white text-center">
                       Nous comptons {{$sieges->count()}} sieges de voyages au sein notre agence.
                    </p>
                </div>
            </div>

            
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->


    <!-- currency price section start-->
    <section class="section p-0 section-siege-mobile">
        <div class="container">
            <div class="currency-price">
                <div class="row section-agence-information">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-4">{{$agence->name}}</h4>
                            <div id="task-1">
                                <div id="upcoming-task" class="pb-1 task-list">
                                    <div class="card task-box" id="uptask-1">
                                        <div class="card-body">
                                            <div>
                                                <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Nous comptons {{$sieges->count()}} sieges</a></h5>
                                                <p class="text-muted mb-4">14 Oct, 2019</p>
                                            </div>
                                            <div class="avatar-group float-start task-assigne">
                                                <div class="avatar-group-item">
                                                    <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                                    </a>
                                                </div>
                                                <div class="avatar-group-item">
                                                    <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                                        <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                                    </a>
                                                </div>
                                                <div class="avatar-group-item">
                                                    <a href="javascript: void(0);" class="d-inline-block" value="member-6">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                                                    </a>
                                                </div>
                                                <div class="avatar-group-item">
                                                    <a href="javascript: void(0);" class="d-inline-block">
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                                {{$agence->agents->count()}}
                                                            </span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="text-end">
                                                <h5 class="font-size-15 mb-1" id="task-budget">{{$agence->agents->count()}}</h5>
                                                <p class="mb-0 text-muted">Agents</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                                    <a href="#" class="badge bg-primary p-1" data-bs-toggle="modal" data-bs-target="#staticBackdropEmailAgence-{{$siege->id}}"> <i class="fa fa-address-card"></i> Contacter ce siege</a>
                                            </li>
                                            {{--
                                            <li class="list-inline-item me-3">
                                                <a href="#" class="badge bg-info p-1" data-bs-toggle="modal" data-bs-target="#staticBackdropTickerClient-{{$siege->id}}"><i class="fa fa-ticket-alt"></i> Ticker</a>
                                            </li>
                                            --}}
                                        </ul>
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
        <!-- end container -->
    </section>
    <!-- currency price section end -->

    
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
                                            {{--
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
                                            --}}
                                            <div class="mb-3">
                                                <h6 class="text-center">Vous devez avoire un compte pour pouvoire vous inscrire</h6>
                                            </div>
                                            <div class="mb-3" >
                                                <label class="form-label">Votre numero de telephone</label>
                                                <div>
                                                    <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                                        required placeholder="Numero de telephone" style="width: 100%;"  />
                                                        <input type="hidden" name="indicatif" id="indicatif">
                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>
                                            {{--
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
                                            --}}
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


      <!-- Static Backdrop Modal de contact -->
    @foreach($sieges as $siege)
        <div class="modal fade" id="staticBackdropEmailAgence-{{$siege->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Contacter le siege de {{$siege->name}}   </h5>
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


    <!-- Static Backdrop Modal de update inscription -->
    @foreach($sieges as $siege)
        <div class="modal fade" id="staticBackdropTickerClient-{{$siege->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modifier votre inscription sur le siege de {{$siege->name}}   </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <p class="text-bold text-center">
                                <span class="text-warning">Attention:</span> la modification n'est possible qu'avant le paiement de votre ticker
                            </p>
                            <p>
                                <form class="custom-validation" action="{{ route('client.show',$siege->id) }}" method="POST" enctype="multipart/form-data">
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
            return true;
        }
    </script>
@endsection