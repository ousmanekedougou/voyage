    <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="{{asset('admin/assets/images/layouts/layout-1.jpg')}}" class="img-fluid img-thumbnail" alt="">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="{{asset('admin/assets/images/layouts/layout-2.jpg')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="{{asset('admin/assets/css/bootstrap-dark.min.css')}}" data-appStyle="{{asset('admin/assets/css/app-dark.min.css')}}">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="{{asset('admin/assets/images/layouts/layout-3.jpg')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="{{asset('admin/assets/css/app-rtl.min.css')}}">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

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


        <!-- VALIDATION FORNM -->
        <script src="{{asset('admin/assets/libs/parsleyjs/parsley.min.js')}}"></script>

        <script src="{{asset('admin/assets/js/pages/form-validation.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('admin/assets/js/app.js')}}"></script>

        @section('settingsection')
        
        @show
