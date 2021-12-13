@extends('user.layouts.app',['title' => 'Create Agence'])

@section('main-content')

 

    <!-- Features start -->
     <section class="section hero-section bg-ico-hero " style="padding: 60px;" id="home" style="margin-top: -10px;">
     <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Features</div>
                        <h4>Key features of the product</h4>
                    </div>
                </div>
            </div> -->
            <!-- end row -->

            <div class="row align-items-center pt-4">
                <div class="col-md-6 col-sm-8 col-lg-6 col-xs-12">
                    <div style="padding:20px ;width:100%;" >
                        <img src="{{asset('user/assets/images/crypto/features-img/img-1.png')}}" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
                <div class="col-md-5 col-lg-6 col-xs-12 ms-auto ">
                    <div class="mt-4 mt-md-auto">
                        <div class="d-flex align-items-center mb-2">
                            <!-- <div class="features-number font-weight-semibold display-4 me-3">01</div> -->
                            <h4 class="mb-0 text-white">Create Agence</h4>
                        </div>
                        <p class="text-white">If several languages coalesce, the grammar of the resulting language is
                            more simple and regular than of the individual will be more simple and regular than the
                            existing.</p>
                        <div class="text-wite mt-4">
                            <p class="mb-2 text-white"><i class="mdi mdi-circle-medium text-success me-1"></i>Donec pede justo vel
                                aliquet</p>
                            <p class="text-white"><i class="mdi mdi-circle-medium text-success me-1"></i>Aenean et nisl sagittis</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Features end -->


        <section class="section bg-white" id="agence">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <h4>Creer votre agence de transport</h4>
                            <!-- <div class="small-title">Fait votre choix</div> -->
                        </div>
                    </div>
                </div>
                <form class="custom-validation" action="{{ route('agence.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
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
                                <div class="mt-2">
                                    <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password"
                                        data-parsley-equalto="#pass2" placeholder="Confirmer le mot de passe" />
                                </div>
                            </div>

                            
                            
                        </div>
                        <div class="col-xl-6">
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
                            <div class="mb-3">
                                <label class="form-label">Logo de l'agence</label>
                                <input type="file" class="form-control" required id="image" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image"
                                    placeholder="Logo de l'agence" />
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Slogan de l'agence</label>
                                <div>
                                    <textarea required id="slogan" class="form-control @error('slogan') is-invalid @enderror" name="slogan" value="{{ old('slogan') }}" autocomplete="slogan" class="form-control" rows="3"></textarea>
                                        @error('slogan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                Enregistrer l'agence
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect btn-block">
                                Anuller
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

 

 
           
@endsection