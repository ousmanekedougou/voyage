

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('admin/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/node-waves/waves.min.js')}}"></script>

        <!-- apexcharts -->
        <script src="{{asset('admin/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- dashboard init -->
        <script src="{{asset('admin/assets/js/pages/dashboard.init.js')}}"></script>


        <script src="{{asset('admin/assets/libs/jquery.easing/jquery.easing.min.js')}}"></script>

        <!-- Plugins js-->
        <script src="{{asset('admin/assets/libs/jquery-countdown/jquery.countdown.min.js')}}"></script>

        <!-- owl.carousel js -->
        <script src="{{asset('admin/assets/libs/owl.carousel/owl.carousel.min.js')}}"></script>

        <!-- ICO landing init -->
        <script src="{{asset('admin/assets/js/pages/ico-landing.init.js')}}"></script>

        

        <!-- App js -->
        
        <script src="{{asset('admin/assets/toastr/jquery.min.js')}}"></script>
        <script src="{{asset('admin/assets/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/app.js')}}"></script>

        {!! Toastr::message() !!}

        @section('settingsection')
        
        @show
