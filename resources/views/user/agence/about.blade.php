@extends('user.layouts.app',['title' => 'A propos de '])
 <meta name="csrf-token" content="{{ csrf_token() }}">
@section('main-content')

 

   <!-- hero section start -->
    <section class="section hero-section bg-ico-hero bg-agence"  id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal" style="margin-top: -70px;" >
                <div class="col-lg-offset-8 card_show">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-2 hero-title text-center">Voyage par tout au sénégal avec nos agences </h1>
                        <p class="font-size-16 text-white text-center">
                            Plus {{$slug->name_agence}} de compagnies de voyages nous font confiance pour vendre leurs billets sur une seule plateforme.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->
    
    
  

    

 
           
@endsection