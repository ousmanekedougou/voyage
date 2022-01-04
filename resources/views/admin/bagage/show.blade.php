<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/email-template-alert.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Mar 2021 16:18:58 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Ticker Bagage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('admin/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/css/style.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <style>
             @media print {
            #print_Button{
                display: none;
            }
        }
        </style>
    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <!-- end page title -->

                        <div class="row bagage_show" id="print">
                            <div class="col-12">
                                <p class="mb-2">Prenom et Nom: <span class="text-primary">{{ $client->client_name }}</span></p>
                                    <p class="mb-2">Telephone: <span class="text-primary">{{ $client->client_phone }}</span></p>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap">
                                            <thead>
                                                <tr>
                                                <th scope="col">Images</th>
                                                <th scope="col">Nom et Description</th>
                                                <th scope="col">Prix</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($client->bagage_clients as $bag)
                                                    <tr>
                                                        <th scope="row">
                                                            <div>
                                                                <img src=" {{ Storage::url($bag->image) }}" alt="" class="avatar-sm">
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div>
                                                                <h5 class="text-truncate font-size-14">{{ $bag->name }}</h5>
                                                                <p class="text-muted mb-0">{{ $bag->desc }}</p>
                                                            </div>
                                                        </td>
                                                        <td>{{ $bag->prix }} f</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="2" class="text-center">
                                                       <h4 class="m-0 text-left">Total: {{$client->prix_total}} f</h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-center">
                                                        <button  class="btn btn-success btn-xs" style="margin-left: 70px;margin-right:20px;" id="print_Button" onclick="printDiv()"><i class="fa fa-print"> Imprimer le ticker</i></button> 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('admin/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/node-waves/waves.min.js')}}"></script>

        <script src="{{asset('admin/assets/js/app.js')}}"></script>

           <script src="{{asset('admin/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- dashboard init -->
        <script src="{{asset('admin/assets/js/pages/dashboard.init.js')}}"></script>


        <!-- VALIDATION FORNM -->
        <script src="{{asset('admin/assets/libs/parsleyjs/parsley.min.js')}}"></script>

        <script src="{{asset('admin/assets/js/pages/form-validation.init.js')}}"></script>

           <script type="text/javascript">
        function printDiv(){
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>

    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/email-template-alert.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Mar 2021 16:18:58 GMT -->
</html>
