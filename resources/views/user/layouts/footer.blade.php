            
        
            <footer class="">
                <div class="container">

                    <hr class="my-5">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="owl-carousel owl-theme clients-carousel" id="clients-carousel" dir="ltr">
                               @foreach( part() as $part)
                                <div class="item">
                                    <div class="client-images">
                                        <img src="{{ Storage::url($part->logo) }}" alt="client-img"
                                            class="mx-auto img-fluid d-block">
                                    </div>
                                </div>
                                @endforeach
                                <!-- <div class="item">
                                    <div class="client-images">
                                        <img src="{{asset('user/assets/images/clients/2.png')}}" alt="client-img"
                                            class="mx-auto img-fluid d-block">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="client-images">
                                        <img src="{{asset('user/assets/images/clients/3.png')}}" alt="client-img"
                                            class="mx-auto img-fluid d-block">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="client-images">
                                        <img src="{{asset('user/assets/images/clients/4.png')}}" alt="client-img"
                                            class="mx-auto img-fluid d-block">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="client-images">
                                        <img src="{{asset('user/assets/images/clients/5.png')}}" alt="client-img"
                                            class="mx-auto img-fluid d-block">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="client-images">
                                        <img src="{{asset('user/assets/images/clients/6.png')}}" alt="client-img"
                                            class="mx-auto img-fluid d-block">
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <iframe src="" frameborder="0"></iframe>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Skote.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
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
          