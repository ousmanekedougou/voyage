@extends('user.layouts.app',['title' => 'Colie'])

@section('main-content')

     <!-- hero section start -->
    <section class="section hero-section bg-ico-hero section-responsive" id="home">
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
                            <div class="col-xl-1 col-sm-3">
                            </div>
                            <div class="col-xl-10 col-sm-6">
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
                                                                    <tr>
                                                                        <th scope="col">Images</th>
                                                                        <th scope="col">Nom & Déscription</th>
                                                                        <th scope="col">Prix</th>
                                                                        <th scope="col">Envoye par</th>
                                                                        <th scope="col">Status</th>
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
                                                                            <p class="text-muted mb-0">{{ $colieClient->detail }}</p>
                                                                        </td>
                                                                        <td>{{ $colieClient->prix }} f</td>
                                                                        <td>
                                                                            <h5 class="font-size-14 text-truncate"><a
                                                                                    class="text-dark">{{ $colieClient->colie->name }}</a></h5>
                                                                            <p class="text-muted mb-0">{{ $colieClient->colie->phone }}</p>
                                                                        </td>
                                                                        <td>
                                                                            @if($colieClient->status == 0)
                                                                                <span class="badge bg-warning">Non Payer</span>
                                                                            @else
                                                                                <span class="badge bg-success">Payer</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    <tr>
                                                                        <td colspan="3">
                                                                            <div class="   p-3 rounded">
                                                                                <h5
                                                                                    class="font-size-14 mb-0">
                                                                                   
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#suppresionDuColie" ><i class="fa fa-check-double me-2"></i> Cofirmer la récéption</a>
                                                                                   
                                                                                     <span class="float-end">Total : </span>
                                                                                </h5>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    
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
                            <div class="col-xl-1 col-sm-3">
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



           
@endsection