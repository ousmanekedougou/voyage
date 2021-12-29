@extends('user.layouts.app',['title' => 'Agence'])

@section('main-content')

 

   <!-- hero section start -->
    <section class="section hero-section bg-ico-hero" style="margin-top:-50px;" id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
              <div class="row row_pricipal">
                <div class="col-lg-12">
                    <div class="text-center mb-5 text-white">
                        <h4 class="text-white text-uppercase">Toutes nos agences de transports</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                @foreach($agences as $agence)
                <div class="col-xl-4 col-sm-6">
                    <div class="card" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                        <div class="card-body">
                            <div class="media">
                                <div class="avatar-md me-4">
                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                        <img src="{{Storage::url($agence->logo)}}" alt="" height="30">
                                    </span>
                                </div>

                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">{{ $agence->name }}</a></h5>
                                    <p class="text-muted mb-1"> <i class="bx bx-envelope me-1"> {{ $agence->email }}</i> </p>
                                    <p class="text-muted mb-1"> <i class="bx bx-mobile me-1"> {{ $agence->phone }}</i> </p>
                                </div>
                            </div>
                        </div>
                        <div class="row p-0">
                            <h6 class="text-center"> <i class="fa fa-blog badge bg-success"> Slogan</i></h6>
                            <p class="text-muted text-center">{{ $agence->slogan }}</p>
                        </div>
                        <div class="px-4 py-3 border-top">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-3">
                                    <a href="{{ route('agence.show',$agence->slug) }}" class="btn btn-outline-success btn-xs"><i class="bx bx-show me-1"></i>Voire nos sieges</a>
                                </li>
                                <li class="list-inline-item me-3">
                                    <a href="" class="btn btn-outline-primary btn-xs"><i class="bx bx-file me-1"></i>A propos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->

  {{--
    <!-- Blog start -->
    <section class="section bg-white" id="agence">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <h4>Toutes les agences de transports du senegal</h4>
                        <div class="small-title">Fait votre choix</div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                @foreach($agences as $agence)
                <div class="col-xl-4 col-sm-6">
                    <div class="card" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                        <div class="card-body">
                            <div class="media">
                                <div class="avatar-md me-4">
                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                        <img src="{{Storage::url($agence->logo)}}" alt="" height="30">
                                    </span>
                                </div>

                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">{{ $agence->name }}</a></h5>
                                    <p class="text-muted mb-1"> <i class="bx bx-envelope me-1"></i> {{ $agence->email }}</p>
                                    <p class="text-muted mb-1"> <i class="bx bx-mobile me-1"></i> {{ $agence->phone }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row p-3">
                            <h6>Slogan</h6>
                            <p class="text-muted text-left">{{ $agence->slogan }}</p>
                        </div>
                        <div class="px-4 py-3 border-top">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-3">
                                    <a href="{{ route('agence.show',$agence->slug) }}" class="btn btn-outline-success btn-xs"><i class="bx bx-show me-1"></i>Voire nos sieges</a>
                                </li>
                                <li class="list-inline-item me-3">
                                    <a href="" class="btn btn-outline-primary btn-xs"><i class="bx bx-file me-1"></i>A propos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Blog end -->
--}}
 
           
@endsection