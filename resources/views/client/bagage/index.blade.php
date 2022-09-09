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
                                    <h4 class="mb-sm-0 font-size-18">Bagages</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-middle mb-0 table-nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Images</th>
                                                        <th>Nom & Detail</th>
                                                        <th>Prix</th>
                                                        <th colspan="2">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($bagages as $bagage)
                                                    <tr>
                                                        <td>
                                                            <img src="{{Storage::url($bagage->image)}}" alt="product-img"
                                                                title="product-img" class="avatar-md" />
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$bagage->name}}</a></h5>
                                                            <p class="mb-0">{{$bagage->detail}} </p>
                                                        </td>
                                                        <td>
                                                            {{$bagage->prix}} f
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="javascript:void(0);" class="action-icon text-danger"> <i class="mdi mdi-trash-can font-size-18"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <a href="{{route('customer.home')}}" class="btn btn-secondary">
                                                    <i class="mdi mdi-arrow-left me-1"></i> Retoure </a>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Order Summary</h4>

                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Quatite :</td>
                                                        <td>{{ $bagages->count() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total :</th>
                                                        <th>{{$client->prix_total}}</th>
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