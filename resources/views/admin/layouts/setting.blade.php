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
              @if(Session::has('flashy_notification.message'))
                <script id="flashy-template" type="text/template">
                    <div class="flashy flashy--{{ Session::get('flashy_notification.type') }}">
                        <i class="material-icons">speaker_notes</i>
                        <a href="#" class="flashy__body" target="_blank"></a>
                    </div>
                </script>

                <script>
                    flashy("{{ Session::get('flashy_notification.message') }}", "{{ Session::get('flashy_notification.link') }}");
                </script>
            @endif
            <script src="//code.jquery.com/jquery.js"></script>

        <script>
        function validation()
        {
            var phone = document.forms["myform"]["phone"];
            var get_num_1 = String(phone.value).charAt(0);
            var get_num_2 = String(phone.value).charAt(1);
            var get_num_final = get_num_1+''+get_num_2;
            var first_num = Number(get_num_final);
            if (isNaN(phone.value)) {
                alert('Votre numero de telephone est invalide');
                return false;
            }else if(phone.value.length != 9){
                alert('Votre numero de telphone doit etre de 9 caracter exp: 77xxxxxxx');
                return false;
            }else if(first_num != 77 & first_num != 78 & first_num != 76 & first_num != 70 & first_num != 75  ){
                alert('Votre numero de telphone doit commencer par un (77 ou 78 ou 76 ou 70 ou 75)')
                return false;
            }
            
            var cni = document.forms["myform"]["cni"];
            if (isNaN(cni.value)) {
                alert('Votre numero numero de piece est invalide');
                return false;
            }else if(cni.value.length != 13){
                alert('Votre numero de piece doit etre de 13 carractere');
                return false;
            }
            return true;
        }
    </script>

        @section('settingsection')
        
        @show
