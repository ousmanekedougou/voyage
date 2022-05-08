@extends('user.layouts.app',['title' => 'Colie'])

@section('main-content')

     <!-- hero section start -->
    <section class="section hero-section bg-ico-hero" id="home">
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
                            <div class="col-xl-2 col-sm-3">
                            </div>
                            <div class="col-xl-8 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-confir" role="tabpanel"
                                                aria-labelledby="v-pills-confir-tab">
                                                <div class="card shadow-none border mb-0">
                                                    <div class="card-body">

                                                        <div class="table-responsive">
                                                             <table class="table align-middle mb-0 table-nowrap">
                                                                 <thead class="table-light">
                                                                    <tr class="text-center">
                                                                        <td>
                                                                            <h5 class="font-size-14 text-truncate"><a
                                                                                    class="text-dark">Envoyé par</a></h5>
                                                                            <p class="text-muted mb-0">{{ $colie->name }} : {{ $colie->phone }}</p>
                                                                        </td>
                                                                       
                                                                        <td>
                                                                            <h5 class="font-size-14 text-truncate"><a
                                                                                    class="text-dark">Récépteur</a></h5>
                                                                            <p class="text-muted mb-0">{{ $colie->name_recept }} : {{ $colie->phone_recept }}</p>
                                                                        </td>
                                                                        <td>
                                                                             <h5 class="font-size-14 text-truncate"><a
                                                                                    class="text-dark">Ville</a></h5>
                                                                            <p class="text-muted mb-0">{{ $colie->ville }} </p>
                                                                        </td>
                                                                    </tr>
                                                                
                                                                    <tr>
                                                                        <th scope="col">Images</th>
                                                                        <th scope="col">Nom & Déscription</th>
                                                                        <th scope="col">Prix</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($coli_clients as $colieClient)
                                                                    <tr>
                                                                        <th scope="row"><img
                                                                                src="{{Storage::url($colieClient->image)}}"
                                                                                alt="product-img" title="product-img"
                                                                                class="avatar-md"></th>
                                                                        <td>
                                                                            <h5 class="font-size-14 text-truncate"><a
                                                                                    class="text-dark">{{ $colieClient->name }}</a></h5>
                                                                            <p class="text-muted mb-0">{{ $colieClient->desc }}</p>
                                                                        </td>
                                                                        <td>{{ $colieClient->prix }} f</td>
                                                                    </tr>
                                                                    @endforeach
                                                                    <tr>
                                                                        <td colspan="3">
                                                                            <div class=" @if($colie->status == 0) bg-success bg-soft @else bg-success text-white @endif  p-3 rounded">
                                                                                <h5
                                                                                    class="font-size-14 @if($colie->status == 0) text-primary @else text-white @endif mb-0">
                                                                                    @if($colie->status == 0)
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#suppresionDuColie" ><i class="fa fa-check-double me-2"></i> Cofirmer la récéption</a>
                                                                                    @elseif($colie->status == 1)
                                                                                        <i class="fa fa-check-double me-2"></i> <span class="">Vous avez confirmer la récéption de votre colie</span>
                                                                                    @endif
                                                                                     <span class="float-end">Total :  {{$colie->prix_total}} f</span>
                                                                                </h5>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    {{--
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <h6 class="m-0 text-end">Total:</h6>
                                                                        </td>
                                                                        <td>
                                                                            $ 675
                                                                        </td>
                                                                    </tr>
                                                                    --}}
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-sm-3">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end container -->
    </section>
<!-- currency price section end -->


 <!-- Modal pour la suppression de l'agence -->
    <div class="modal modal-md fade" id="suppresionDuColie" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <div class="avatar-md mx-auto mb-4">
                            <div class="avatar-title bg-success text-center rounded-circle text-white h1">
                                <i class="fa fa-check-double me-2"></i>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <h4 class="text-success">Confirmation de colie !</h4>
                                <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire confirmer la reception du colie de {{$colie->name}} </p>

                                <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                    <form method="post" action="{{ route('colis.confirme',$colie->id) }}"  style="display:flex;text-align:center;width:100%;">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                            <input type="hidden" name="delete" value="1">
                                        <button type="submit" class="btn btn-success btn-xs" style="margin-left: 70px;margin-right:20px;"> Oui je veux bient </button> 
                                        <button type="button" class="btn btn-info btn-xs" data-bs-dismiss="modal" aria-label="Close"> x Anuller</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Fin du modal pour la suppression de l'agence -->
           
@endsection