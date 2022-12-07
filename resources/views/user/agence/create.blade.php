@extends('user.layouts.app',['title' => 'Create Agence'])
    <style>
        .bg-ico-hero{
            background-image:url(./user/assets/images/agence.webp) !important;
            background-size:cover;background-position:top !important;
            height: 100px !important;
        }
    </style>
@section('main-content')

 

   <!-- hero section start -->
    <section class="section hero-section bg-ico-hero section-responsive">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal" style="margin-top: -70px;" >
                <div class="col-lg-2"></div>
                <div class="col-lg-8 card_show text-center">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title ">Creer votre compte agence de transport</h1>
                        <p class="font-size-20 text-white" >
                            Digitaliser tous les activites de votre agence de transport sur une seule plateforme
                        </p>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->


        <section class="section bg-default" id="agence">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <h4>Creer votre compte agence</h4>
                            <!-- <div class="small-title">Fait votre choix</div> -->
                        </div>
                    </div>
                </div>
                <form class="custom-validation card" action="{{ route('agence.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row card-body">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label class="form-label">Nom de l'agence</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                    placeholder="Nom de l'agence" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">E-Mail de l'agence</label>
                                <div>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" parsley-type="email"
                                        placeholder="E-Mail de l'agence" />
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
                                <label class="form-label">Slogan de l'agence</label>
                                <div>
                                    <textarea required id="slogan" class="form-control @error('slogan') is-invalid @enderror" name="slogan" value="{{ old('slogan') }}" autocomplete="slogan" class="form-control" rows="1"></textarea>
                                        @error('slogan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                             <div class="mb-3">
                                <label class="form-label">Votre image de profile</label>
                                <input type="file" class="form-control" required id="image" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image"
                                    placeholder="Votre image" />
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                             <div class="mb-3">
                                <label class="form-label">Selectionner une region</label>
                                <select  class="form-control @error('region') is-invalid @enderror" name="region" required autocomplete="region" required>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                                </select>
                                @error('region')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Adresse de l'agence</label>
                                <input type="text" required id="adress" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" autocomplete="adress"
                                    placeholder="Adresse de l'agence" />
                                    @error('adress')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status des tickets des clients</label>
                                <div class="col-md-12">
                                    <select name="method_ticket" class="form-select form-control @error('method_ticket') is-invalid @enderror" value="{{ old('method_ticket') }}">
                                        <option value="0">Ticket remboursable apres le depart du bus</option>
                                        <option value="1">Ticket non remboursable apres le depart du bus</option>
                                    </select>
                                    @error('method_ticket')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            

                            <div class="mb-3">
                                <label class="form-label">Mot de passe de l'agence</label>
                                <div>
                                    <input type="password" id="pass2"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" required
                                        placeholder="Mot de passe de l'agence" />
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirmez votre mot de passe</label>
                                <div class="">
                                    <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password"
                                        data-parsley-equalto="#pass2" placeholder="Confirmer le mot de passe" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2 card-body">
                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                            Validez votre inscription
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect btn-block">
                            Anuller
                        </button>
                    </div>
                    
                </form>
                <br>

                {{--
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4 text-center">Creer votre compte agence TouCki</h4>

                                <div id="vertical-example" class="vertical-wizard">
                                    <!-- Seller Details -->
                                    <h3>Vos informations</h3>
                                    <section>
                                        <form class="custom-validation" action="{{ route('agence.store') }}" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                     <div class="mb-3">
                                                        <label class="form-label">Votre prenom et nom</label>
                                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                                            placeholder="Votre prenom et nom" />
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Votre email</label>
                                                        <div>
                                                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" parsley-type="email"
                                                                placeholder="Votre email" />
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
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
                                                </div>
                                                <div class="col-lg-6">
                                                   <div class="mb-3">
                                                        <label class="form-label">Votre image de profil</label>
                                                        <input type="file" class="form-control" required id="image" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image"
                                                            placeholder="Votre image" />
                                                            @error('image')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Mot de passe de votre compte</label>
                                                        <div>
                                                            <input type="password" id="pass2"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" required
                                                                placeholder="Mot de passe de l'agence" />
                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="">
                                                        <label class="form-label">Comfirmation de votre mot de passe</label>
                                                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password"
                                                            data-parsley-equalto="#pass2" placeholder="Confirmer le mot de passe" />
                                                    </div>
                                                </div>
                                             </div>
                                          
                                        </form>
                                    </section>

                                    <!-- Bank Details -->
                                    <h3>Information de l'agence</h3>
                                    <section>
                                        <div>
                                            <form class="custom-validation" action="{{ route('agence.store') }}" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nom de l'agence</label>
                                                            <input type="text" id="name_agence" class="form-control @error('name_agence') is-invalid @enderror" name="name_agence" value="{{ old('name_agence') }}" required autocomplete="name_agence"
                                                                placeholder="Nom de l'agence" />
                                                            @error('name_agence')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">E-mail de lagence</label>
                                                            <div>
                                                                <input type="email_agence" id="email_agence" class="form-control @error('email_agence') is-invalid @enderror" name="email_agence" value="{{ old('email_agence') }}" required autocomplete="email_agence" parsley-type="email_agence"
                                                                    placeholder="E-mail de lagence" />
                                                                    @error('email_agence')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Adresse de l'agence</label>
                                                            <input type="text" class="form-control" required id="adress" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" autocomplete="adress"
                                                                placeholder="Adresse de l'agence" />
                                                                @error('adress')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Registre de commerce</label>
                                                            <div>
                                                                <input data-parsley-type="digits" type="text" id="registre_commerce" class="form-control @error('registre_commerce') is-invalid @enderror" name="registre_commerce" value="{{ old('registre_commerce') }}" autocomplete="registre_commerce"
                                                                    required placeholder="Registre de commerce" />
                                                                    @error('registre_commerce')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Logo de votre agence</label>
                                                            <input type="file" class="form-control" required id="image_agence" class="form-control @error('image_agence') is-invalid @enderror" name="image_agence" value="{{ old('image_agence') }}" autocomplete="image_agence"
                                                                placeholder="Logo de l'agence" />
                                                                @error('image_agence')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3 row">
                                                            <label class="form-label">Selectionner une region</label>
                                                            <select  class="form-control @error('region') is-invalid @enderror" name="region" required autocomplete="region" required>
                                                                @foreach($regions as $region)
                                                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('region')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Slogan de l'agence</label>
                                                            <div>
                                                                <textarea required id="slogan" class="form-control @error('slogan') is-invalid @enderror" name="slogan" value="{{ old('slogan') }}" autocomplete="slogan" class="form-control" rows="1"></textarea>
                                                                    @error('slogan')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </section>

                                    <!-- Confirm Details -->
                                    <h3>Validation de l'inscription</h3>
                                    <section>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="text-center">
                                                    <div class="mb-4">
                                                        <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                                    </div>
                                                    <div>
                                                        <h5>Confirmation de l'inscription</h5>
                                                        <p class="text-muted">If several languages coalesce, the grammar of the resulting</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                --}}
            </div>
        </section>

@endsection
@section('footerSection')
    <script src="{{asset('admin/assets/js/pages/form-wizard.init.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
@endsection