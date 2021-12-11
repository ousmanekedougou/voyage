@extends('user.layouts.app',['title' => 'Agence'])

@section('main-content')

 

   <!-- hero section start -->
    <section class="section hero-section bg-ico-hero" style="margin-top:-50px;" id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">Yombalal Toucki Thi Biir Rewmi</h1>
                        <p class="font-size-20">
                            Le secteur du tourisme a fort à faire dans une conjoncture économique pleine de défis. Pour vous démarquer, en tant qu’agence de voyages.
                        </p>

                        <!-- <div class="button-items mt-4">
                            <a href="{{ route('agence.create') }}" class="btn btn-success">Creer votre compte agence</a>
                            <a href="{{ route('agence.index') }}" class="btn btn-light">Nos agences de transport</a>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-10 ms-lg-auto">
                   
                    <div class="card overflow-hidden mb-0 mt-3 mt-lg-0">
                         <img src="{{ asset('user/assets/images/bus.png') }}" style="width: 100%;"  alt="" srcset="">
                        <!-- <div class="card-header text-center">
                            <h5 class="mb-0">ICO Countdown time</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center">

                                <h5>Time left to Ico :</h5>
                                <div class="mt-4">
                                    <div data-countdown="2021/12/31" class="counter-number ico-countdown"></div>
                                </div>

                                <div class="mt-4">
                                    <button type="button" class="btn btn-success w-md">Get Token</button>
                                </div>

                                <div class="mt-5">
                                    <h4 class="font-weight-semibold">1 ETH = 2235 SKT</h4>
                                    <div class="clearfix mt-4">
                                        <h5 class="float-end font-size-14">5234.43</h5>
                                    </div>
                                    <div class="progress p-1 progress-xl softcap-progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 15%"
                                            aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-label">15 %</div>
                                        </div>
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="progress-label">30 %</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->

  
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
                                    <a href="{{ route('show',$agence->slug) }}" class="btn btn-outline-success btn-xs"><i class="bx bx-show me-1"></i>Voire nos sieges</a>
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

 
           
@endsection