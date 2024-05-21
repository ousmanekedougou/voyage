@extends('admin.layouts.app')
@section('headsection')
 <link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('main-content')

    <div class="page-content">
        <div class="container-fluid sectionCompteDesktope">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Tableau de bord</h4>
                    </div>
                    @if(!$isPaymentDay)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-alert-outline me-2"></i>
                                Vous ne pourrez effectuer un paiment de salaire qu'a la date du paiment. 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>


            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="media">
                                        <div class="me-3">
                                            <img src="@if(Auth::guard('agence')->user()->logo == '') https://ui-avatars.com/api/?name={{Auth::guard('agence')->user()->name}} @else {{(Storage::url(Auth::guard('agence')->user()->logo))}} @endif" alt="" class="avatar-md rounded-circle img-thumbnail">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="text-muted">
                                                <h5 class="mb-1">{{ Auth::guard('agence')->user()->name }}</h5>
                                                <p class="mb-2">Bienvenu sur {{ Auth::guard('agence')->user()->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($isPaymentDay)
                                    <div class="col-lg-5 mt-3 d-lg-block">
                                        <div class="clearfix mt-4 mt-lg-0">
                                            <div class="dropdown float-end">
                                                <a href="{{ route('agence.paiement.init') }}" class="btn btn-primary dropdown-toggle">
                                                     Effectuer un nouveau paiment de salaire
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <h1 class="btn btn-primary btn-xs" style="width:100%;">Liste des paiements effectuer pour ce mois</h1>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-check">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;" class="align-middle">
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>Images</th>
                                            <th class="align-middle">References</th>
                                            <th class="align-middle">Agents</th>
                                            <th class="align-middle">Montant Paye</th>
                                            <th class="align-middle">Date de transaction</th>
                                            <th class="align-middle">Mois</th>
                                            <th class="align-middle">Annee</th>
                                            <th class="align-middle">Status</th>
                                            <th class="align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($payments->count() > 0)
                                            @foreach($payments as $payment)
                                                <tr>
                                                    <td>
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                            <label class="form-check-label" for="orderidcheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    <img src="
                                                        @if($payment->agent->image != Null)
                                                            {{Storage::url($payment->image)}}
                                                        @else
                                                            https://ui-avatars.com/api/?name={{$payment->agent->name}}
                                                        @endif
                                                        " class="rounded-circle avatar-xs" alt="">
                                                    </td>
                                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#{{$payment->reference}}</a> </td>
                                                    <td>{{$payment->agent->name}}</td>
                                                    <td>
                                                        <i class="fa fa-money me-1"></i> {{$payment->getAmountTotal()}}
                                                    </td>
                                                    <td>
                                                        {{date('d/m/y',strtotime($payment->launch_date))}}
                                                    </td>
                                                    <td>
                                                        <span class="font-size-12">{{$payment->month}}</span>
                                                    </td>
                                                    <td>
                                                         {{$payment->year}}
                                                    </td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-success btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                                            {{$payment->status}}
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-3">
                                                            <a href="javascript:void(0);" class="text-primary"><i class="mdi mdi-download font-size-18"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                        <tr>
                                            <td colspan="10" class="text-center p-5">
                                                Accune transaction effectue 
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            {{$payments->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            
            
            



        </div>
        <!-- container-fluid -->



    </div>
    <!-- End Page-content -->

    <!-- Static Backdrop Modal -->

    <!-- Modal -->
    <div class="modal fade orderdetailsModal" tabindex="-1" role="dialog" aria-labelledby=orderdetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id=orderdetailsModalLabel">Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                    <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap">
                            <thead>
                                <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div>
                                            <img src="assets/images/product/img-7.png" alt="" class="avatar-sm">
                                        </div>
                                    </th>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                            <p class="text-muted mb-0">$ 225 x 1</p>
                                        </div>
                                    </td>
                                    <td>$ 255</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div>
                                            <img src="assets/images/product/img-4.png" alt="" class="avatar-sm">
                                        </div>
                                    </th>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Hoodie (Blue)</h5>
                                            <p class="text-muted mb-0">$ 145 x 1</p>
                                        </div>
                                    </td>
                                    <td>$ 145</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Sub Total:</h6>
                                    </td>
                                    <td>
                                        $ 400
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Shipping:</h6>
                                    </td>
                                    <td>
                                        Free
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Total:</h6>
                                    </td>
                                    <td>
                                        $ 400
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->


           
@endsection

@section('footersection')
  <!-- apexcharts -->
        <script src="{{asset('admin/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
        
        <!-- Saas dashboard init -->
        <script src="{{asset('admin/assets/js/pages/saas-dashboard.init.js')}}"></script>
@endsection