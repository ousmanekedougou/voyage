
        <button id="topBtn"> <i class="fas fa-arrow-up"></i> </button>
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

      <script>
        $(document).ready(function(){

            $(window).scroll(function(){
                if($(this).scrollTop() > 40) {
                    $("#topBtn").fadeIn();
                }else{
                    $("#topBtn").fadeOut();
                }
            });

            $("#topBtn").click(function(){
                $('html ,body').animate({scrollTop : 0},1000);
            });
        });
    </script>

        <script src="{{asset('admin/assets/toastr/jquery.min.js')}}"></script>
        <script src="{{asset('admin/assets/toastr/toastr.min.js')}}"></script>
         {!! Toastr::message() !!}
        @section('settingsection')
        
        @show
