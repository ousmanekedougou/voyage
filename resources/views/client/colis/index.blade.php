@extends('admin.layouts.app')
@section('headsection')
<link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endsection

@section('main-content')

            <div class="page-content">
                <div class="container-fluid">

                      <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Liste de vos colis</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                        @foreach($clients as $client)
                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="avatar-md me-4">
                                                <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                    <img src="{{Storage::url($client->siege->agence->logo)}}" alt="" height="30">
                                                </span>
                                            </div>

                                            <div class="media-body overflow-hidden">
                                                <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">{{ $client->siege->agence->name }}</a></h5>
                                                <p class="text-muted mb-1 font-size-11"> <i class="fa fa-mobile"></i> Siege de {{ $client->siege->name}}</p>
                                                <p class="text-muted mb-1 font-size-11"> <i class="fa fa-mobile"></i> {{ $client->siege->phone}}</p>
                                            </div>
                                        </div>
                                        {{--
                                        <div class="row mt-1">
                                            <div class="font-size-11 text-center">
                                                    <span class="badge bg-primary font-size-12">{{ $client->coli_clients->count()}} Colie(s) </span>
                                            </div>
                                        </div>
                                        --}}
                                    </div>
                                    <div class="px-4 py-3 border-top text-center">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                <a href="{{ route('customer.colis.show',$client->id) }} " class="badge bg-success" ><i class="fa fa-eye font-size-12"></i> {{ $client->coli_clients->count()}} Colie(s) Envoye</a>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <a href="{{ route('customer.colis.show',$client->id) }} " class="badge bg-primary" ><i class="fa fa-eye font-size-12"></i> {{ $client->coli_clients->count()}} Colie(s) recue</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                           {{$clients->links()}}
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
                <!-- End Page-content -->

                <!-- Modal -->



@endsection


@section('footersection')
<script src="{{asset('admin/assets/js/table.js')}}"></script>
 <!-- Bootrstrap touchspin -->
<script src="{{asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>

<script src="{{asset('admin/assets/js/pages/ecommerce-cart.init.js')}}"></script>
@endsection