@extends('admin.layouts.app')

@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Tableau de bord</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="media">
                                        <div class="me-3">
                                            <img src="{{(Storage::url(Auth::guard('client')->user()->image))}}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="text-muted">
                                                <p class="mb-2">Bienvenue sur votre compte client</p>
                                                <h5 class="mb-1">TouCki</h5>
                                                <p class="mb-0">
                                                    Client
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 align-self-center">
                                    <div class="text-lg-center mt-4 mt-lg-0">
                                        <div class="row">
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Total Agences</p>
                                                    <h5 class="mb-0">{{ $agenceCount }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Total Sieges</p>
                                                    <h5 class="mb-0">10</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Newsletter</p>
                                                    <h5 class="mb-0">{{ $newsletters->count() }}</h5>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 d-lg-block">
                                   
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Blog start -->
                <div class="row">
                    @foreach($agences as $agence)
                    <div class="col-xl-4 col-sm-6">
                        <div class="card" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-md me-4">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            @if($agence->logo != Null)
                                            <img src="{{Storage::url($agence->logo)}}" alt="" height="30">
                                            @else
                                            <i class="fa fa-bus"></i>
                                            @endif
                                        </span>
                                    </div>

                                    <div class="media-body overflow-hidden">
                                        <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">{{ $agence->name }}</a></h5>
                                        <p class="text-muted mb-1"> <i class="bx bx-envelope me-1"> {{ $agence->email }}</i> </p>
                                        <p class="text-muted mb-1"> <i class="bx bx-mobile me-1"> {{ $agence->phone }}</i> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-0" style="margin-top: -15px;">
                                <h6 class="text-center"> <i class="fa fa-blog badge bg-success"> Slogan</i></h6>
                                <p class="text-muted text-center">{{ $agence->slogan }}</p>
                            </div>
                            <div class="px-4 py-3 border-top bg-light">
                                <ul class="list-inline mb-0 text-center">
                                    <li class="list-inline-item me-3">
                                        <a href="{{ route('customer.agence.show',$agence->slug) }}" class="btn btn-success btn-xs"><i class="bx bx-show me-1"></i>Voir nos sieges</a>
                                    </li>
                                    {{--
                                    <li class="list-inline-item me-3">
                                        <a href="{{ route('agence.about',$agence->slug) }}" class="btn btn-primary btn-xs"><i class="bx bx-file me-1"></i>A propos</a>
                                    </li>
                                    --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- end container -->
                    <div class="row ">
                        <div class="col-12">
                            <div class="" style="margin-right:40%;">
                                <a href="javascript:void(0);" class="text-success"> {{$agences->links()}} </a>
                            </div>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->
                </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                   
                </div>
            </div>
            <!-- end row -->
         
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->




           
@endsection