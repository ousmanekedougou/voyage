@extends('user.layouts.app',['title' => 'Creation de compte client'])
    <style>
        .bg-ico-hero{
            background-image:url(./user/assets/images/client.jpg) !important;
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
                        <h1 class="text-white font-weight-semibold mb-3 hero-title ">Créer votre compte client</h1>
                        <p class="font-size-20 text-white" >
                            Toutes les options de voyage sur une seule plateforme
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
                        <div class="text-center mb-1">
                            <img class="setting-img" src="{{asset('user/assets/images/register.svg') }}" alt="" srcset="">
                            
                        </div>
                        <h4 class="text-center">Créer votre compte client</h4>
                    </div>
                </div>
                <form class="custom-validation card" action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row card-body">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label class="form-label">Prénom et nom</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                    placeholder="Prenom et nom" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Votre adrésse email</label>
                                <div>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" parsley-type="email"
                                        placeholder="Votre adresse email" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Numero de téléphone</label>
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
                                <label class="form-label">Votre carte d'identité nationale</label>
                                <div>
                                    <input data-parsley-type="number" type="number" id="cni" class="form-control @error('cni') is-invalid @enderror" name="cni" value="{{ old('cni') }}" autocomplete="cni"
                                        required placeholder="Votre carte d'idente nationale" />
                                            @error('cni')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                           
                        </div>
                        <div class="col-xl-6">
                            
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
                            <div class="mb-3">
                                <label class="form-label">Selectionner votre region</label>
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
                                <label class="form-label">Votre mot de passe</label>
                                <div>
                                    <input type="password" id="pass2"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" required
                                        placeholder="Votre mot de passe" />
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
                                    <p class="mb-0">Acceptez  <a href="{{ route('setting.condition') }}" target="_blank" class="text-primary">les conditions d'utilisation de TouCki</a></p>
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