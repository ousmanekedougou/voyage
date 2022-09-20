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
                                    <h4 class="mb-sm-0 font-size-18">Vos colis sur {{ $getColi->siege->agence->name }}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-xl-12">
                                <p class="text-muted mb-2 text-left font-size-15">Recu au siege de  {{ $getColi->siege->name }} </p>
                            </div>
                           
                            <div class="col-xl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-middle mb-0 table-nowrap">
                                                
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Images</th>
                                                        <th>Nom & Detail</th>
                                                        <th>Envoyer Par</th>
                                                        <th>Ville</th>
                                                        <th>Prix</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($colis as $bag)
                                                    <tr>
                                                        <td>
                                                            <img src="{{Storage::url($bag->image)}}" alt="product-img"
                                                                title="product-img" class="avatar-md" />
                                                        </td>
                                                       <td>
                                                            <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$bag->name}}</a></h5>
                                                            <p class="mb-0">{{$bag->detail}} </span></p>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$bag->colie->customer->name}}</a></h5>
                                                            <p class="mb-0"> {{$bag->colie->customer->phone}}</span></p>
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $bag->ville->name }}
                                                        </td>
                                                        <td>
                                                            {{$bag->prix}} f
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <a href="" class="btn btn-secondary">
                                                    <i class="mdi mdi-arrow-left me-1"></i> Retoure </a>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                 <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Order Summary</h4>

                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Quantite :</td>
                                                        <td>{{ $colis->count() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total :</th>
                                                        <th>{{$getColi->prix_total}} f</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                         <div class="row mt-4">
                                            <div class="col-sm-12">
                                                <div class="text-sm-end mt-2 mt-sm-0">
                                                    <a href="" class="btn btn-success btn-block" style="width: 100%;">
                                                        <i class="mdi mdi-cart-arrow-right me-1"></i> Payer </a>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                    </div>
                                </div>
                                <!-- end card -->
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