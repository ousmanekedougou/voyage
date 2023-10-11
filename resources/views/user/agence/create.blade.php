@extends('user.layouts.app',['title' => 'Creation de compte agence'])
    <style>
        .bg-ico-hero{
            background-image:url(./user/assets/images/agence.webp) !important;
            background-size:cover;background-position:top !important;
            height: 100px !important;
        }
        .section .container .row_pricipal{
            margin-top:-70px;
        }
        .settings-section-mobile{
            margin-top: -70px;
        }
    </style>
@section('main-content')

 

   <!-- hero section start -->
    <section class="section hero-section bg-ico-hero section-responsive">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal" style="margin-top: -70px;" >
                <div class="col-lg-12 card_show ">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">Créer votre compte agence de transport</h1>
                        <p class="font-size-20 text-white">
                            Digitaliser tous les activités de votre agence de transport sur une seule plateforme
                        </p>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->


        <section class="section bg-default settings-section-mobile" id="agence">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <div class="text-center mb-1">
                                <img class="setting-img" src="{{asset('user/assets/images/dowload/compteAgence.svg') }}" alt="" srcset="">
                                
                            </div>
                            <h4>Créer votre compte agence</h4>
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
                                <label class="form-label">Slogan de votre agence</label>
                                <div>
                                    <input type="text" required id="slogan" class="form-control @error('slogan') is-invalid @enderror" name="slogan" value="{{ old('slogan') }}" autocomplete="slogan">
                                    @error('slogan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                             <div class="mb-3">
                                <label class="form-label">Le logo de votre entreprise</label>
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
                        <div class="col-xl-6">
                            <div class="form-check">
                                <input class="form-check-input @error('terme') is-invalid @enderror" name="terme" value="{{ old('terme') ?? 1 }}" required type="checkbox" id="remember-check">
                                <label class="form-check-label" for="remember-check">
                                    <p class="mb-0">Acceptez <a href="{{ route('setting.condition') }}" target="_blank" class="text-primary">les conditions d'utilisation de TouCki</a></p>
                                </label>
                                @error('terme')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
               
            </div>
        </section>

@endsection
@section('footerSection')
    <script src="{{asset('admin/assets/js/pages/form-wizard.init.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
@endsection