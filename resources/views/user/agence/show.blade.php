@extends('user.layouts.app',['title' => 'Siege'])

@section('headSection')
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('user/assets/build/css/intlTelInput.css')}}">
     <style>
        /* .bg-ico-hero {
            background-image:url(./user/assets/images/client.jpg) !important;
            background-size:cover;background-position:top !important;
            height: 100px !important;
        } */
    </style>
@endsection

@section('main-content')

    <!-- hero section start -->
    <section class="section hero-section bg-ico-hero section-responsive"  id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal" style="margin-top: -70px;" >
                <div class="card_show">
                    <div class="text-white-50">
                        <h1 class="text-white font-size-23 font-weight-semibold mb-3 hero-title">Réservez vos billets de bus sur <span class="text-success">{{$agence->name}}</span> au meilleur prix</h1>
                    </div>
                   <p class="font-size-16 text-white text-center">
                       Nous comptons {{$sieges->count()}} sieges de voyages au sein notre agence.
                    </p>
                </div>
            </div>

            
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->


    <!-- currency price section start-->
    <section class="section p-0 section-siege-mobile">
        <div class="container">
            <div class="currency-price">
                <div class="row section-agence-information">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-4">{{$agence->name}}</h4>
                            <div id="task-1">
                                <div id="upcoming-task" class="pb-1 task-list">
                                    <div class="card task-box" id="uptask-1">
                                        <div class="card-body">
                                            <div>
                                                <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Nous comptons {{$sieges->count()}} sieges</a></h5>
                                                <p class="text-muted mb-4">14 Oct, 2019</p>
                                            </div>
                                            <div class="avatar-group float-start task-assigne">
                                                <div class="avatar-group-item">
                                                    <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                                    </a>
                                                </div>
                                                <div class="avatar-group-item">
                                                    <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                                        <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                                    </a>
                                                </div>
                                                <div class="avatar-group-item">
                                                    <a href="javascript: void(0);" class="d-inline-block" value="member-6">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                                                    </a>
                                                </div>
                                                <div class="avatar-group-item">
                                                    <a href="javascript: void(0);" class="d-inline-block">
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                                {{$agence->agents->count()}}
                                                            </span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="text-end">
                                                <h5 class="font-size-15 mb-1" id="task-budget">{{$agence->agents->count()}}</h5>
                                                <p class="mb-0 text-muted">Agents</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($sieges as $siege)
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-xs me-3">
                                        <span
                                            class="avatar-title rounded-circle bg-info bg-soft text-warning font-size-18">
                                            @if($siege->image == '')
                                                <i class="mdi mdi-bus"></i>
                                                @else
                                            <img src="{{Storage::url($siege->image)}}" alt="" style="width:100%;">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h5>Siege de {{ $siege->name }}</h5>
                                        <p class="text-muted  mb-1"><i class="fa fa-envelope"></i> {{ $siege->email }} </p>
                                        <p class="text-muted  mb-2"><i class="fa fa-mobile"></i> {{ $siege->phone }} </p>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                    {{--<a href="#" class="badge bg-primary p-1" data-bs-toggle="modal" data-bs-target="#staticBackdropEmailAgence-{{$siege->id}}"> <i class="fa fa-address-card"></i> Nous Contacter ici</a>--}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- currency price section end -->



@endsection

@section('footerSection')
    <script src=" {{ asset('js/app.js') }} "></script>
    <script src="{{asset('user/assets/build/js/intlTelInput.js')}}"></script>
    {{-- <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
        utilsScript: "user/assets/build/js/utils.js",
        });

        function validation(){
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
            return true;
        }
    </script> --}}
@endsection