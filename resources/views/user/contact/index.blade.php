@extends('user.layouts.app',['title' => 'Contact'])
@section('headsection')

@endsection
@section('main-content')

 <!-- Features start -->
      <section class="section hero-section bg-ico-hero" id="home" style="margin-top:-70px;">
        <div class="bg-overlay bg-primary"></div>
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

            <div class="row align-items-center">
                 <div class="col-md-6 col-sm-8 col-lg-6 col-xs-12">
                   <div class="overflow-hidden mb-0 mt-3 mt-lg-0">
                        <img src="{{asset('user/assets/images/profile-img.png')}}" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
                <div class="col-md-5 col-lg-6 col-xs-12 ms-auto ">
                    <div class="mt-4 mt-md-auto">
                        <div class="d-flex align-items-center mb-2">
                            <h1 class="mb-0 text-white">Travaillons ensemble</h1>
                        </div>
                        <p class="text-white">Pour toute question, informations supplémentaires ou demande de devis, n’hésitez pas à nous contacter.</p>
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

 
    <!-- about section start -->
    <section class="section pt-4 bg-white" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-muted">
                        <h4>Nous contacter</h4>
                        <p>Vous souhaitez des renseignements complémentaires, une demande de devis ou prendre un rendez-vous, n’hésitez pas à nous contacter</p>
                            
                        <!-- <div class="button-items">
                            <a href="#" class="btn btn-success">Read More</a>
                            <a href="#" class="btn btn-outline-primary">How It work</a>
                        </div> -->

                        <div class="row mt-4 text-center">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="mt-4">
                                    <div class="avatar-xs me-3" style="margin-left:70px;">
                                        <span 
                                            class="avatar-title  rounded-circle bg-white bg-soft text-primary" style="font-size: 4em;">
                                            <i class="mdi mdi-email"></i>
                                        </span>
                                    </div>
                                    <p class="mt-2">email@gmail.com</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="mt-4">
                                    <div class="avatar-xs me-3" style="margin-left:70px;">
                                        <span 
                                            class="avatar-title  rounded-circle bg-white bg-soft text-success" style="font-size: 4em;">
                                            <i class="mdi mdi-phone"></i>
                                        </span>
                                    </div>
                                    <p class="mt-2">+221 77000000</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="mt-4">
                                    <div class="avatar-xs me-3" style="margin-left:70px;">
                                        <span 
                                            class="avatar-title  rounded-circle bg-white bg-soft text-info" style="font-size: 4em;">
                                            <i class="mdi mdi-email"></i>
                                        </span>
                                    </div>
                                    <p class="mt-2">Kedougou</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 ms-auto">
                    <div class="mt-4 mt-lg-0">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">

                                    <form class="custom-validation" action="{{ route('contact.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Prenom et Nom</label>
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                                placeholder="Prenom et Nom" />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">E-Mail </label>
                                            <div>
                                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" parsley-type="email"
                                                    placeholder="E-Mail" />
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                
                                        <div class="mb-3">
                                            <label class="form-label">Message</label>
                                            <div>
                                                <textarea required id="msg" class="form-control @error('msg') is-invalid @enderror" name="msg" value="{{ old('msg') }}" autocomplete="msg" class="form-control" rows="3"></textarea>
                                                    @error('msg')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Envoyer
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect">
                                                Anuller
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-5 pb-5">
                <div class="card-body">
                    <h4 class="card-title">Street View Panoramas</h4>
                    <p class="card-title-desc">Example of google maps.</p>
                    <!-- <div id="panorama" class="gmaps-panaroma"></div> -->
                    <iframe src="https://www.google.sn/maps/place/EMPRO+SN/@14.7111341,-17.4506503,699m/data=!3m2!1e3!4b1!4m5!3m4!1s0xec173eabb264a3f:0x3b03193b00bf067c!8m2!3d14.7111343!4d-17.4484441" style="width: 100%;height:160%;"></iframe>
                </div>
            </div> <!-- end row -->

        </div>
        <!-- end container -->
    </section>
    <!-- about section end -->
    
           
@endsection
