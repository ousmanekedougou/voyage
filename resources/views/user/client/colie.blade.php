@extends('user.layouts.app',['title' => 'Colie'])
@section('headSection')
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
            <!-- hero section start -->
                <section class="section hero-section bg-ico-hero section-responsive sectionCompteDesktope" id="home">
                    <!-- <div class="bg-overlay bg-primary"></div> -->
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-12 text-center">
                                <div class="text-white-50">
                                    <h1 class="text-white font-weight-semibold mb-3 hero-title">Touts vos colis</h1>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container -->
                </section>
            <!-- hero section end -->



            <!-- currency price section start -->
                <section class="section bg-white p-0">
                    <div class="container">
                        <div class="currency-price">
                            <div class="row">
                                <div class="checkout-tabs">
                                    <div class="row">
                                        <div class="col-xl-12 col-sm-12">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-confir" role="tabpanel"
                                                    aria-labelledby="v-pills-confir-tab">
                                                    <div class="card shadow-none border mb-0">
                                                        <div class="card-body">

                                                            <div class="table-responsive">
                                                                    <table class="table align-middle mb-0 table-nowrap">
                                                                        <thead class="table-light">
                                                                        <tr>
                                                                            <th scope="col">Images</th>
                                                                            <th scope="col">Nom & Déscription</th>
                                                                            <th scope="col">Envoye par</th>
                                                                            <th>Ville</th>
                                                                            <th>Prix</th>
                                                                            <th>Status</th>
                                                                            <th>Reçu</th>
                                                                            <th>Code</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($coli_clients as $colieClient)
                                                                        <tr>
                                                                            <th scope="row"><img
                                                                                    src="{{Storage::url($colieClient->image)}}"
                                                                                    alt="product-img" title="product-img"
                                                                                    class="avatar-md">
                                                                            </th>
                                                                            <td>
                                                                                <h5 class="font-size-14 text-truncate"><a
                                                                                        class="text-dark">{{ $colieClient->name }}</a></h5>
                                                                                <p class="text-muted mb-0">{{ $colieClient->detail }}</p>
                                                                            </td>
                                                                            <td>
                                                                                <h5 class="font-size-14 text-truncate"><a
                                                                                        class="text-dark">{{ $colieClient->colie->name }}</a></h5>
                                                                                <p class="text-muted mb-0">{{ $colieClient->colie->phone }}</p>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                {{ $colieClient->ville->name }}
                                                                            </td>
                                                                            <td>{{ $colieClient->getAmount() }} </td>
                                                                            
                                                                            <td>
                                                                                @if($colieClient->recepteurPay == 1)
                                                                                    <span class="badge bg-info">Arriver Payer</span>
                                                                                @else
                                                                                    <span class="badge bg-success">Payer</span>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                @if($colieClient->status == 1)
                                                                                    <span class="text-success">Par
                                                                                        @if($colieClient->recepteur_info != null)
                                                                                            {{$colieClient->recepteur_info}}</span>
                                                                                        @else
                                                                                            Vous
                                                                                        @endif
                                                                                @else
                                                                                    <span class="text-warning">Colis non reçu</span>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                {{$colieClient->code_validation}}
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <a href="/" class="btn btn-secondary">
                                                <i class="mdi mdi-arrow-left me-1"></i> Retoure </a>
                                        </div> <!-- end col -->
                                        <div class="col-sm-6">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            
                                                            <th> Quantite : {{ $coli_clients->count() }}</th>
                                                        
                                                            
                                                            <th> Total : </th>
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
                                <!-- end row -->
                                
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                    <!-- end container -->
                </section>
            <!-- currency price section end -->



        <!-- Show colis partie mobile -->

            <div class="table-responsive sectionCompteMobile">
                <ul class="list-unstyled chat-list">
                    <li class="mb-4">
                        <div class="media">
                            <div class="align-self-center me-3">
                                <div class="align-self-center me-3">
                                    @if($getClientColie->colie->siege->agence->image != Null)
                                        <img src="{{Storage::url($getClientColie->siege->agence->image)}}" class="rounded-circle avatar-xs" alt="">
                                    @else
                                        <img src="{{asset('admin/assets/images/users/profil.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="media-body overflow-hidden">
                                <h5 class="text-truncate font-size-14 mb-1">
                                    {{ $getClientColie->colie->siege->agence->name }}
                                </h5>
                                <p class="text-truncate mb-0">{{ $getClientColie->colie->siege->name }}</p>
                            </div>
                            <div class="font-size-11 button-right-siege">
                                <span>{{ $coli_clients->count() }} Coli(s)</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <table class="table align-middle mb-0 table-nowrap">
                    <div class="row">
                    @foreach($coli_clients as $colie)
                        <tbody class="card col-lg-4">
                            <tr>
                                <td class="">
                                    <img src="{{asset('admin/assets/images/product/img-1.png')}}" alt="product-img"
                                        title="product-img" class="avatar-md" />
                                </td>
                                <td class="">
                                    <h5 class="font-size-14 text-truncate">{{ $colie->name }}</h5>
                                    {{--
                                        @if($colie->recepteurPay == 1)
                                            <span class="action-icon badge bg-success btn-recept-mobile" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#ColiRecue-{{ $colie->id }}"> <i class="mdi mdi-cart-arrow-right me-1"></i> Payer </span>
                                        @endif
                                    --}}
                                </td>
                            </tr>
                            <tr>
                                <td class="td-mobile">Désc :</td>
                                <td class="td-mobile">
                                    {{ $colie->detail }} 
                                </td>
                            </tr>
                            <tr>
                                <td class="td-mobile">Envoyer par :</td>
                                <td class="td-mobile">
                                    @if($colie->name == null)
                                        {{ $colie->customer->name }} | {{ $colie->customer->phone  }}
                                    @else
                                        {{ $colie->colie->name }} | {{ $colie->colie->phone }}
                                    @endif
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="td-mobile">Ville :</td>
                                <td class="td-mobile">{{ $colie->ville->name }} </td>
                            </tr>
                            <tr>
                                <td class="td-mobile">Prix : </td>
                                <td class="td-mobile">{{$colie->getAmount()}}</td>
                            </tr>
                            <tr>
                                <td class="td-mobile">Code : </td>
                                <td class="td-mobile">{{ $colie->code_validation }}</td>
                            </tr>
                            <tr>
                            <th class="td-mobile">Reçu :
                                    @if($colie->status == 1)
                                        <span class="text-success">Par
                                            @if($colie->recepteur_info != null)
                                                {{$colie->recepteur_info}}</span>
                                            @else
                                                Vous
                                            @endif
                                    @else
                                        <span class="text-warning">Colis non reçu</span>
                                    @endif
                                </th>
                                @if($colie->recepteurPay == 1)
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
                                            <td>{{ $coli_clients->count() }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total :</th>
                                            <th></th>
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
           
@endsection
