@extends('user.layouts.app',['title' => 'Bagage'])

@section('main-content')

     <!-- hero section start -->
    <section class="section hero-section bg-ico-hero" id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">Tout vos bagage</h1>
                        
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
                                                        <h4 class="card-title mb-4 text-center bg-primary bg-soft p-3 rounded">Les bagages de {{ $client->name }}</h4>
                                                        <div class="table-responsive">
                                                            <table class="table align-middle mb-0 table-nowrap">
                                                                <thead class="table-light">
                                                                    <tr class="text-center">
                                                                        <td>
                                                                            <h5 class="font-size-14 text-truncate"><a
                                                                                    class="text-dark">Prenom et nom</a></h5>
                                                                            <p class="text-muted mb-0">{{ $bagage->client_name }}</p>
                                                                        </td>
                                                                       
                                                                        <td>
                                                                            <h5 class="font-size-14 text-truncate"><a
                                                                                    class="text-dark">Téléphone</a></h5>
                                                                            <p class="text-muted mb-0">{{ $bagage->client_phone }}</p>
                                                                        </td>
                                                                        <td>
                                                                             <h5 class="font-size-14 text-truncate"><a
                                                                                    class="text-dark">Ville</a></h5>
                                                                            <p class="text-muted mb-0">{{ $bagage->ville }} </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="col">Images</th>
                                                                        <th scope="col">Nom & Description</th>
                                                                        <th scope="col">Prix</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($bagage_clients as $bagageClient)
                                                                    <tr>
                                                                        <th scope="row"><img
                                                                                src="{{Storage::url($bagageClient->image)}}"
                                                                                alt="product-img" title="product-img"
                                                                                class="avatar-md"></th>
                                                                        <td>
                                                                            <h5 class="font-size-14 text-truncate"><a
                                                                                    class="text-dark">{{ $bagageClient->name }}</a></h5>
                                                                            <p class="text-muted mb-0">{{ $bagageClient->desc }}</p>
                                                                        </td>
                                                                        <td>{{ $bagageClient->prix }} f</td>
                                                                    </tr>
                                                                    @endforeach
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <h6 class="m-0 text-end">Total:</h6>
                                                                        </td>
                                                                        <td>
                                                                            {{$bagage->prix_total}} f
                                                                        </td>
                                                                    </tr>
                                                                    {{--
                                                                    <tr>
                                                                        <td colspan="3">
                                                                            <div class="bg-primary bg-soft p-3 rounded">
                                                                                <h5
                                                                                    class="font-size-14 text-primary mb-0">
                                                                                    <i
                                                                                        class="fas fa-shipping-fast me-2"></i>
                                                                                    Shipping <span
                                                                                        class="float-end">Free</span>
                                                                                </h5>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
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
           
@endsection