@extends('admin.layouts.app')
    @section('headSection')
        <!-- DataTables -->
        <link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
            type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{asset('admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"
            type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('admin/assets/css/app.min.css')}}"  rel="stylesheet" type="text/css" />
    @endsection
@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Tableau de bord</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="media">
                                        <div class="me-3">
                                            <img src="{{Storage::url($user->agence->logo)}}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="text-muted">
                                                <h5 class="mb-2">Bienvenue sur {{$user->agence->name}}</h5>
                                                <p class="mb-1">Siege de {{$user->siege->name}}</p>
                                                <p class="mb-0">Agent {{$user->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 align-self-center">
                                    <div class="text-lg-center mt-4 mt-lg-0">
                                        <div class="row">
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Itinairaires</p>
                                                    <h5 class="mb-0">{{ $itineraires->count() }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Buses</p>
                                                    <h5 class="mb-0">{{$busCount->count()}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Clients du jour</p>
                                                    <h5 class="mb-0">{{ $clientCount->count() }} </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 d-lg-block">
                                    <!-- d-none -->
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium text-center">Montant Total du jour</p>
                                            <h4 class="mb-0 text-center">@if(montant_today()) > 0 {{montant_today()}} @else 0 @endif f</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="fa fa-coins font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            

            
            <div class="row">
                @foreach($itineraires as $itineraire)
                    <div class="col-lg-12">
                        <div class="p-0">
                            <div class="">
                                <h5 class="btn btn-soft-white bg-white text-center" style="width: 100%;font-weight:bold;"> <i class="fa fa-road"></i> Itineraire de {{ $itineraire->name }}</h5>
                                
                                <div class="row">
                                    @foreach($itineraire->buses as $bus)
                                    
                                    @if(getBusToday() > 0)
                                        <div class="col-xl-4">
                                            <div class="card bg-soft bg-white" style="width:100%;">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <div class="text-primary p-3">
                                                                <h6 class="text-default font-size-13">Bus {{$bus->number}} | {{ $bus->matricule }} </h6>

                                                                <ul class="ps-0 mb-0">
                                                                    <li class="py-1 text-muted" style="list-style: none;"><i class="fa fa-user-plus"></i> Inscrits : {{ $bus->clients->count() }}</li>
                                                                    <li class="py-1 text-success" style="list-style: none;"><i class="fa fa-check-double"></i> Valider : {{ $bus->valider }}</li>
                                                                    <li class="py-1 text-primary" style="list-style: none;"><i class="fa fa-coins"></i> {{ $bus->montant }} f</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-5 align-self-start">
                                                            <img src="{{asset('admin/assets/images/bus.svg')}}" alt="" class="img-fluid">
                                                            <a href="{{ route('agent.client.jour',$bus->id) }}" class="btn btn-info  font-size-10 text-center mt-2"> <i class="fa fa-user-plus"></i> Clients du jour</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
         
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


           
@endsection

@section('footerSection')
<!-- Responsive Table js -->
  <!-- Required datatable js -->
    <script src="{{asset('admin/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('admin/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

    <!-- Responsive examples -->
    <script src="{{asset('admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{asset('admin/assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{asset('admin/assets/js/app.js')}}"></script>


     <script>
        
        $('.toggle-class').on('change' ,function(){
            var voyage_status = $(this).prop('checked') == true ? 1 : 0;
            var client_id = $(this).data('id');
            var amount = $(this.data('amount'));
            
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: "{{ route('agent.client.presence') }}",
                data: 
                    {
                        'voyage_status': voyage_status,
                        'client_id': client_id,
                        'amount': amount
                    },
                success: function(data){
                    console.log('success')
                }
            });
            
        });
    </script>
   
@endsection