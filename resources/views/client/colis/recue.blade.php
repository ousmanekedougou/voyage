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
                                                        <th>Prix</th>
                                                        <th>Status</th>
                                                        <th>Reçu</th>
                                                        <th>Code</th>
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
                                                            <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$bag->customer->name}}</a></h5>
                                                            <p class="mb-0"> {{$bag->customer->phone}}</span></p>
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $bag->ville->name }}
                                                        </td>
                                                        <td>
                                                            {{$bag->getAmount()}}
                                                        </td>
                                                        <td>
                                                            @if($bag->recepteurPay == 1)
                                                                <span class="badge bg-info">Arriver Payer</span>
                                                            @else
                                                                <span class="badge bg-success">Payer</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($bag->status == 1)
                                                                <span class="text-success">Par
                                                                    @if($bag->recepteur_info != null)
                                                                        {{$bag->recepteur_info}}</span>
                                                                    @else
                                                                        Vous
                                                                    @endif
                                                            @else
                                                                <span class="text-warning">Colis non reçu</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{$bag->code_validation}}
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
                                                                
                                                                <th> Quantite : {{ $getColi->coli_clients->count() }}</th>
                                                            
                                                                
                                                                <th> Total : {{$getColi->getAmountTotal()}}</th>
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
                                    <div class="align-self-center me-3">
                                        @if($getColi->siege->agence->image != Null)
                                            <img src="{{Storage::url($getColi->siege->agence->image)}}" class="rounded-circle avatar-xs" alt="">
                                        @else
                                            <img src="{{asset('admin/assets/images/users/profil.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-14 mb-1">
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
                        @foreach($colis as $bag)
                            <tbody class="card col-lg-4">
                                <tr>
                                    <td class="">
                                        <img src="{{asset('admin/assets/images/product/img-1.png')}}" alt="product-img"
                                            title="product-img" class="avatar-md" />
                                    </td>
                                    <td class="">
                                        <h5 class="font-size-14 text-truncate">{{ $bag->name }}</h5>
                                        {{--
                                            @if($bag->recepteurPay == 1)
                                                <span class="action-icon badge bg-success btn-recept-mobile" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#ColiRecue-{{ $bag->id }}"> <i class="mdi mdi-cart-arrow-right me-1"></i> Payer </span>
                                            @endif
                                        --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-mobile">Désc :</td>
                                    <td class="td-mobile">
                                        {{ $bag->detail }} 
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-mobile">Envoyer par :</td>
                                    <td class="td-mobile">
                                        @if($bag->name == null)
                                            {{ $bag->customer->name }} | {{ $bag->customer->phone  }}
                                        @else
                                            {{ $bag->colie->name }} | {{ $bag->colie->phone }}
                                        @endif
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="td-mobile">Ville :</td>
                                    <td class="td-mobile">{{ $bag->ville->name }} </td>
                                </tr>
                                <tr>
                                    <td class="td-mobile">Prix : </td>
                                    <td class="td-mobile">{{$bag->getAmount()}}</td>
                                </tr>
                                <tr>
                                    <td class="td-mobile">Code : </td>
                                    <td class="td-mobile">{{ $bag->code_validation }}</td>
                                </tr>
                                <tr>
                                <th class="td-mobile">Reçu :
                                        @if($bag->status == 1)
                                            <span class="text-success">Par
                                                @if($bag->recepteur_info != null)
                                                    {{$bag->recepteur_info}}</span>
                                                @else
                                                    Vous
                                                @endif
                                        @else
                                            <span class="text-warning">Colis non reçu</span>
                                        @endif
                                    </th>
                                    @if($bag->recepteurPay == 1)
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
                                                <td>{{ $colis->count() }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total :</th>
                                                <th>{{$getColi->getAmountTotal()}}</th>
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