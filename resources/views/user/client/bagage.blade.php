@extends('user.layouts.app',['title' => 'Bagage'])

@section('main-content')

     <!-- hero section start -->
    <section class="section hero-section bg-ico-hero" id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
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
                                                        <h4 class="card-title mb-4">Les bagages de Ousmane diallo</h4>

                                                        <div class="table-responsive">
                                                            <table class="table align-middle mb-0 table-nowrap">
                                                                <thead class="table-light">
                                                                    <tr>
                                                                        <th scope="col">Product</th>
                                                                        <th scope="col">Product Desc</th>
                                                                        <th scope="col">Price</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row"><img
                                                                                src="{{asset('admin/assets/images/product/img-1.png')}}"
                                                                                alt="product-img" title="product-img"
                                                                                class="avatar-md"></th>
                                                                        <td>
                                                                            <h5 class="font-size-14 text-truncate"><a
                                                                                    href="ecommerce-product-detail.html"
                                                                                    class="text-dark">Half sleeve
                                                                                    T-shirt (64GB) </a></h5>
                                                                            <p class="text-muted mb-0">$ 450 x 1</p>
                                                                        </td>
                                                                        <td>$ 450</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row"><img
                                                                                src="{{asset('admin/assets/images/product/img-7.png')}}"
                                                                                alt="product-img" title="product-img"
                                                                                class="avatar-md"></th>
                                                                        <td>
                                                                            <h5 class="font-size-14 text-truncate"><a
                                                                                    href="ecommerce-product-detail.html"
                                                                                    class="text-dark">Wirless Headphone
                                                                                </a></h5>
                                                                            <p class="text-muted mb-0">$ 225 x 1</p>
                                                                        </td>
                                                                        <td>$ 225</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <h6 class="m-0 text-end">Sub Total:</h6>
                                                                        </td>
                                                                        <td>
                                                                            $ 675
                                                                        </td>
                                                                    </tr>
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