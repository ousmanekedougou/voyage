@extends('user.layouts.app',['title' => 'Contact'])
@section('headsection')

@endsection
@section('main-content')

   <!-- hero section start -->
    <section class="section hero-section bg-ico-hero"  id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
                <div class="row align-items-center row_pricipal" style="margin-top: -70px;" >
                <div class="col-lg-8 card_show">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title ">Réservez vos billets de bus au meilleur prix</h1>
                        <p class="font-size-20" >
                            Réservez des billets selon votre agence de choix
                        </p>
                    </div>
                </div>
            </div>

            
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->

 
    <!-- about section start -->
    <section class="section pt-4 bg-white" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="text-muted">
                    <h4 class="text-center">Nous contacter</h4>
                    <p class=" text-center">Vous souhaitez des renseignements complémentaires,prendre un rendez-vous, n’hésitez pas à nous contacter</p>
                        
                    <!-- <div class="button-items">
                        <a href="#" class="btn btn-success">Read More</a>
                        <a href="#" class="btn btn-outline-primary">How It work</a>
                    </div> -->

                    <div class="row mt-4 text-center">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                   
                                <p class=""> <span class="avatar-title rounded-circle bg-white bg-soft text-primary fs-1" style="font-size: 6em;">
                                        <i class="mdi mdi-email"></i>
                                    </span> email@gmail.com</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                   
                                <p class=""> <span class="avatar-title rounded-circle bg-white bg-soft text-primary fs-1" style="font-size: 6em;">
                                        <i class="mdi mdi-phone"></i> 
                                        <!-- mdi-cellphone-android -->
                                    </span> 339876456 / 339098752</p>
                        </div>
                       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                   
                                <p class=""> <span class="avatar-title rounded-circle bg-white bg-soft text-primary fs-1" style="font-size: 6em;">
                                        <i class="mdi mdi-map-marker"></i>
                                    </span> Kedougou</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row align-items-center">
                <div class="mt-4 mt-lg-0">
                    <div class="card">
                        <div class="card-body">

                            <form  class="custom-validation" action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="row align-items-center">
                                   <div class="col-md-6">
                                        <img src="{{asset('user/assets/images/profile-img.png')}}" style="width: 100%;" alt="" srcset="">
                                    </div>
                                    <div class="col-md-6">
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
                                                <textarea required id="msg" class="form-control @error('msg') is-invalid @enderror" name="msg" value="{{ old('msg') }}" autocomplete="msg" class="form-control" rows="5"></textarea>
                                                    @error('msg')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2 col-lg-12">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                Envoyer
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect btn-block">
                                                Anuller
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-5 pb-5">
                <div class="card-body">
                    <div id="panorama" class="gmaps-panaroma">
                        <iframe src="https://www.google.sn/maps/place/EMPRO+SN/@14.7111341,-17.4506503,699m/data=!3m2!1e3!4b1!4m5!3m4!1s0xec173eabb264a3f:0x3b03193b00bf067c!8m2!3d14.7111343!4d-17.4484441" style="width: 100%;height:100%;"></iframe>
                    </div>
                </div>
            </div> <!-- end row -->

        </div>
        <!-- end container -->
    </section>
    <!-- about section end -->


    
    
           
@endsection
