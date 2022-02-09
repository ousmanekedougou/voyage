@extends('admin.layouts.app')

@section('headsection')
   <!-- DataTables -->
        <link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{asset('admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />  
@endsection

@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Activities</h4>

                                        <ul class="nav nav-tabs nav-tabs-custom">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#">All</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Buy</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Sell</a>
                                            </li>
                                        </ul>

                                        <div class="mt-4">
                                            <div class="table-responsive">
                                                <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>ID No</th>
                                                            <th>Date</th>
                                                            <th>Type</th>
                                                            <th>Currency</th>
                                                            <th>Amount</th>
                                                            <th>Amount in USD</th>
                                                        </tr>
                                                    </thead>
                
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK3215</a></td>
                                                            
                                                            <td>03 Mar, 2020</td>
                                                            <td>Buy</td>
                                                            <td>Bitcoin</td>
                                                            <td>1.00952 BTC</td>
                                                            <td>$ 9067.62</td>
                                                        </tr>
    
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK3216</a></td>
                                                            
                                                            <td>04 Mar, 2020</td>
                                                            <td>Sell</td>
                                                            <td>Ethereum</td>
                                                            <td>0.00413 ETH</td>
                                                            <td>$ 2123.01</td>
                                                        </tr>
    
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK3217</a></td>
                                                            
                                                            <td>04 Mar, 2020</td>
                                                            <td>Buy</td>
                                                            <td>Bitcoin</td>
                                                            <td>0.00321 BTC</td>
                                                            <td>$ 1802.62</td>
                                                        </tr>
    
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK3218</a></td>
                                                            
                                                            <td>05 Mar, 2020</td>
                                                            <td>Buy</td>
                                                            <td>Litecoin</td>
                                                            <td>0.00224 LTC</td>
                                                            <td>$ 1773.01</td>
                                                        </tr>
    
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK3219</a></td>
                                                            
                                                            <td>06 Mar, 2020</td>
                                                            <td>Buy</td>
                                                            <td>Ethereum</td>
                                                            <td>1.04321 ETH</td>
                                                            <td>$ 9423.73</td>
                                                        </tr>
    
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK3220</a></td>
                                                            
                                                            <td>07 Mar, 2020</td>
                                                            <td>Sell</td>
                                                            <td>Bitcoin</td>
                                                            <td>0.00413 ETH</td>
                                                            <td>$ 2123.01</td>
                                                        </tr>
    
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK3221</a></td>
                                                            
                                                            <td>07 Mar, 2020</td>
                                                            <td>Buy</td>
                                                            <td>Bitcoin</td>
                                                            <td>1.00952 BTC</td>
                                                            <td>$ 9067.62</td>
                                                        </tr>
    
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK3222</a></td>
                                                            
                                                            <td>08 Mar, 2020</td>
                                                            <td>Sell</td>
                                                            <td>Ethereum</td>
                                                            <td>0.00413 ETH</td>
                                                            <td>$ 2123.01</td>
                                                        </tr>
    
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK3223</a></td>
                                                            
                                                            <td>09 Mar, 2020</td>
                                                            <td>Sell</td>
                                                            <td>Litecoin</td>
                                                            <td>1.00952 LTC</td>
                                                            <td>$ 9067.62</td>
                                                        </tr>
    
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK3224</a></td>
                                                            
                                                            <td>10 Mar, 2020</td>
                                                            <td>Buy</td>
                                                            <td>Ethereum</td>
                                                            <td>0.00413 ETH</td>
                                                            <td>$ 2123.01</td>
                                                        </tr>

                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK3225</a></td>
                                                            
                                                            <td>11 Mar, 2020</td>
                                                            <td>Buy</td>
                                                            <td>Bitcoin</td>
                                                            <td>1.00952 BTC</td>
                                                            <td>$ 9067.62</td>
                                                        </tr>
    
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK3226</a></td>
                                                            
                                                            <td>12 Mar, 2020</td>
                                                            <td>Sell</td>
                                                            <td>Ethereum</td>
                                                            <td>0.00413 ETH</td>
                                                            <td>$ 2123.01</td>
                                                        </tr>
    
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

@endsection


@section('footersection')

 <!-- apexcharts -->
        <script src="{{asset('admin/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- Required datatable js -->
        <script src="{{asset('admin/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        
        <!-- Responsive examples -->
        <script src="{{asset('admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
        
        <!-- crypto-wallet init -->
        <script src="{{asset('admin/assets/js/pages/crypto-wallet.init.js')}}"></script>

@endsection

