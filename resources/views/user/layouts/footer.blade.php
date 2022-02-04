            
        
            <footer class="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                           TouCki 2021 © <script>document.write(new Date().getFullYear())</script>  .
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by KDGWeb
                            </div>
                        </div>
                    </div>
                    <button id="topBtn"> <i class="fas fa-arrow-up"></i> </button>
                </div>
            </footer>

            
    @section('footersection')

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
                $('html ,body').animate({scrollTop : 0},2000);
            });
        });
    </script>


   

    @show
          