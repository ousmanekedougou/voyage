@extends('admin.layouts.app')
@section('headsection')
<link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
<link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
<style>
    .td-mobile{
        width:100%;
    }
    .btn-recept-mobile{
        margin-right:5px;
    }
    .btn-delete-mobile{
        margin-left:8px;
    }
</style>
@endsection

@section('main-content')

            <div class="page-content">
                <div class="container-fluid sectionCompteDesktope">

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
                           
                            <div class="col-xl-12">
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
                                                        <th>Quantites</th>
                                                        <th>Prix Unitaire</th>
                                                        <th>Prix Total</th>
                                                        <th>Status</th>
                                                        <th>Reçu</th>
                                                        <th>References</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($colis as $coliClient)
                                                    <tr>
                                                        <td>
                                                            <img src="{{Storage::url($coliClient->image)}}" alt="product-img"
                                                                title="product-img" class="avatar-md" />
                                                        </td>
                                                       <td>
                                                            <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$coliClient->name}}</a></h5>
                                                            <p class="mb-0">{{$coliClient->detail}} </span></p>
                                                        </td>
                                                        <td>
                                                            @if($coliClient->customer_id != null)
                                                                <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$coliClient->name_recept}}</a></h5>
                                                                <p class="mb-0"> {{$coliClient->phone_recept}}</span></p>
                                                            @else
                                                                <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$coliClient->customer->name}}</a></h5>
                                                                <p class="mb-0"> {{$coliClient->customer->phone}}</span></p>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $coliClient->ville->name }}
                                                        </td>
                                                        <td>
                                                            {{$coliClient->quantity}}
                                                        </td>
                                                        <td>
                                                            {{$coliClient->getAmountUnitaire()}}
                                                        </td>
                                                        <td>
                                                            {{$coliClient->getAmount()}}
                                                        </td>
                                                        
                                                        
                                                        <td>
                                                            @if($coliClient->recepteurPay == 1)
                                                                <span class="badge bg-info">Arriver Payer</span>
                                                            @else
                                                                <span class="badge bg-success">Payer</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($coliClient->status == 1)
                                                                <span class="text-success">Par
                                                                    @if($coliClient->recepteur_info != null)
                                                                        {{$coliClient->recepteur_info}}</span>
                                                                    @else
                                                                        Vous
                                                                    @endif
                                                            @else
                                                                <span class="text-warning">Colis non reçu</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-uppercase">
                                                            {{$coliClient->ville->name}}_{{$coliClient->code_validation}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <a href="{{ route('agent.colis.index') }}" class="btn btn-secondary">
                                                    <i class="mdi mdi-arrow-left me-1"></i> Retoure </a>
                                            </div> <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                
                                                                <th> Quantite total : {{ $quantiteTotalColi }}</th>
                                                            
                                                                
                                                                <th>Prix total de tous les bagage :   {{$amountTotalColi}} CFA</th>
                                                                
                                                                {{--
                                                                <th>
                                                                    <span class="btn btn-success btn-block" style="width: 100%;margin-top:-10px;">
                                                                    <i class="mdi mdi-cart-arrow-right me-1"></i> Payer </span>
                                                                </th>
                                                                --}}
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                </div> <!-- container-fluid -->

                <!-- Show colis partie mobile -->

                <div class="table-responsive sectionCompteMobile">
                    <ul class="list-unstyled chat-list">
                        <li class="mb-4">
                            <div class="media">
                                <div class="align-self-center me-3">
                                    <div class="align-self-center">
                                        <img src="
                                            @if($getColi->siege->agence->image != Null)
                                                {{Storage::url($getColi->siege->agence->image)}}
                                            @else
                                                https://ui-avatars.com/api/?name={{$getColi->siege->agence->name}}
                                            @endif
                                            " class="rounded-circle avatar-sm" alt="">
                                    </div>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-14 mb-1" style="font-weight:600;">
                                        {{ $getColi->siege->agence->name }}
                                    </h5>
                                    <p class="text-truncate mb-0">{{ $getColi->siege->name }}</p>
                                </div>
                                <div class="font-size-11 button-right-siege">
                                    <span>{{ $colis->count() }} Coli(s)</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <table class="table align-middle mb-0 table-nowrap">
                        <div class="row">
                        @foreach($colis as $coliClient)
                            <tbody class="card col-lg-4">
                                <tr>
                                    <td class="">
                                        <img src="{{asset('admin/assets/images/product/img-1.png')}}" alt="product-img"
                                            title="product-img" class="avatar-md" />
                                    </td>
                                    <td class="">
                                        <h5 class="font-size-14 text-truncate">{{ $coliClient->name }}</h5>
                                        {{--
                                            @if($coliClient->recepteurPay == 1)
                                                <span class="action-icon badge bg-success btn-recept-mobile" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#ColiRecue-{{ $coliClient->id }}"> <i class="mdi mdi-cart-arrow-right me-1"></i> Payer </span>
                                            @endif
                                        --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-mobile">Reference : </td>
                                    <td class="td-mobile text-uppercase">{{$coliClient->ville->name}}_{{$coliClient->code_validation}}</td>
                                </tr>
                                
                                <tr>
                                    <td class="td-mobile">Désc :</td>
                                    <td class="td-mobile">
                                        {{ $coliClient->detail }} 
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-mobile">Envoyer par :</td>
                                    <td class="td-mobile">
                                        @if($coliClient->customer_id != null)
                                            {{ $coliClient->customer->name }} | {{ $coliClient->customer->phone  }}
                                        @else
                                            {{ $coliClient->name_recept }} | {{ $coliClient->phone_recept }}
                                        @endif
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="td-mobile">Ville :</td>
                                    <td class="td-mobile">{{ $coliClient->ville->name }} </td>
                                </tr>
                                <tr>
                                    <td class="td-mobile">Quantite : </td>
                                    <td class="td-mobile">{{$coliClient->quantity}}</td>
                                </tr>
                                <tr>
                                    <td class="td-mobile">Prix unitaire : </td>
                                    <td class="td-mobile">{{$coliClient->getAmountUnitaire()}}</td>
                                </tr>
                                <tr>
                                    <td class="td-mobile">Prix Total: </td>
                                    <td class="td-mobile">{{$coliClient->getAmount()}}</td>
                                </tr>
                                <tr>
                                <th class="td-mobile">Reçu :
                                        @if($coliClient->status == 1)
                                            <span class="text-success">Par
                                                @if($coliClient->recepteur_info != null)
                                                    {{$coliClient->recepteur_info}}</span>
                                                @else
                                                    Vous
                                                @endif
                                        @else
                                            <span class="text-warning">Colis non reçu</span>
                                        @endif
                                    </th>
                                    @if($coliClient->recepteurPay == 1)
                                        <td class="td-mobile">
                                            <span class="badge bg-info">Arriver Payer</span>
                                        </td>
                                    @endif
                                </tr>
                                
                            </tbody>
                        @endforeach
                        </div>
                    </table>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Résumé de la reservation</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Quantite :</td>
                                                <td>{{ $quantiteTotalColi }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total :</th>
                                                <th>{{$amountTotalColi}} CFA</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                                {{--
                                @if($Onpayer->count() >= 2)
                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <div class="text-sm-end mt-2 mt-sm-0">
                                            <span class="btn btn-success btn-block" style="width: 100%;">
                                                <i class="mdi mdi-cart-arrow-right me-1"></i> Payer 
                                            </span>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row-->
                                @endif
                                --}}
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    
                </div>

                <!-- Fin du show colis partie mobile -->


            </div>

@endsection


@section('footersection')
<script src="{{asset('admin/assets/js/table.js')}}"></script>
 <!-- Bootrstrap touchspin -->
<script src="{{asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>

<script src="{{asset('admin/assets/js/pages/ecommerce-cart.init.js')}}"></script>
@endsection