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
        <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    @endsection
@section('main-content')

    <div class="page-content">
        <div class="container-fluid sectionCompteDesktope">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Tableau de bord</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">{{Auth::guard('agent')->user()->agence->name}}</h5>
                                        <p>Siege de {{Auth::guard('agent')->user()->siege->name}}</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img style="width:100px;height:100px;border-radius:50%;" src="@if(Auth::guard('agent')->user()->agence->logo == '') https://ui-avatars.com/api/?name={{Auth::guard('agent')->user()->agence->name}} @else {{(Storage::url(Auth::guard('agent')->user()->agence->logo))}} @endif" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <img src="@if(Auth::guard('agent')->user()->image == null) https://ui-avatars.com/api/?name={{Auth::guard('agent')->user()->name}} @else {{(Storage::url(Auth::guard('agent')->user()->image))}} @endif" alt=""
                                            class="img-thumbnail rounded-circle">
                                    </div>
                                    <h5 class="font-size-15 text-truncate">{{ Auth::guard('agent')->user()->name }}</h5>
                                    <p class="text-muted mb-0 text-truncate">
                                        Gestionaire @if(Auth::guard('agent')->user()->role == 1) Client @endif
                                    </p>
                                </div>

                                <div class="col-sm-5">
                                    <div class="pt-4">
                                        <div class="mt-4">
                                            <a href="{{ route('agent.profil.show',Auth::guard('agent')->user()->slug) }}"
                                                class="btn btn-primary waves-effect waves-light btn-sm">Votre Profile<i class="mdi mdi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Itineraires</p>
                                            <h4 class="mb-0">{{ $itineraires->count() }}</h4>
                                        </div>

                                        <div
                                            class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="fa fa-road font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Buses</p>
                                            <h4 class="mb-0">{{$buses->count()}}</h4>
                                        </div>

                                        <div
                                            class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="fa fa-bus font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Clients du jours</p>
                                            <h4 class="mb-0">{{ $clientCount->count() }}</h4>
                                        </div>

                                        <div
                                            class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="fa fa-users font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Montant du jours</p>
                                            <h4 class="mb-0">{{ montant_today() }} f</h4>
                                        </div>

                                        <div
                                            class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="fa fa-coins font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end row -->
            

            
            <div class="row">
                <div class="col-12">
                    <h5 class="btn btn-soft text-white bg-primary" style="width: 100%;font-weight:bold;"> <i class="fa fa-users"></i> La liste des clients qui ont rates leurs bus</h5>
                    
                    <div class="card">
                        <div class="card-body">
                            <table id=""
                                class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Prenom & nom</th>
                                        <th>Telephone</th>
                                        <th>Prix</th>
                                        <th>Methode</th>
                                        <th>Date</th>
                                        <th>Detail</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach($clients as $client)
                                        <tr>
                                            <td>
                                                @if($client->image != null)
                                                    <img src="{{Storage::url($client->customer->image)}}" style="width: 40px;height:40px;" alt=""
                                                        class="avatar-sm rounded-circle header-profile-user">
                                                @else
                                                    <img src="{{ asset('admin/assets/images/users/profil.jpg') }}" style="width: 40px;height:40px;" alt=""
                                                        class="avatar-sm rounded-circle header-profile-user">
                                                @endif
                                            </td>
                                            @if($client->name == null)
                                            <td>{{ $client->customer->name }}</td>
                                            <td>{{ $client->customer->phone }}</td>
                                            @else
                                            <td>{{ $client->name }}</td>
                                            <td>{{ $client->phone }}</td>
                                            @endif
                                            <td>
                                                <span class="badge badge-pill badge-soft-info font-size-12">{{ $client->getAmount() }}</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-soft-primary font-size-12">
                                                    @if($client->payment_methode == 1)
                                                        <img src="{{asset('user/assets/images/wave.png')}}" alt="" class="image-methode-payment align-middle me-2"> Wave
                                                    @elseif($client->payment_methode == 2)
                                                        <img src="{{asset('user/assets/images/orange-money.png')}}" alt="" class="image-methode-payment align-middle me-2"> OM
                                                    @else
                                                        Non payer
                                                    @endif
                                                </span>
                                            </td>
                                            <td>{{ $client->registered_at }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target="#subscribeModalagenceDetails-{{$client->id}}">
                                                    Details
                                                </button>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-3 text-center">
                                                    @if(Auth::guard('agent')->user()->agence->mathod_tiket == 0)
                                                        @if($client->status == 1)
                                                            <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdropPayer-{{$client->id}}" class="btn btn-success btn-sm btn-block"><i class="fas fa-money-bill me-1"></i> Rembourser le ticket de {{$client->ville->amount}} f </a>
                                                        @elseif($client->status == 2)
                                                            <p class="text-primary mb-1 font-size-15">Le ticket n'est plus remboursable</p> 
                                                        @else
                                                            <p class="text-warning mb-1 font-size-15">En cours</p> 
                                                        @endif
                                                    @else
                                                            <p class="text-primary mb-1 font-size-15">Le ticket n'est plus remboursable</p> 
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            
         
        </div>
        <!-- container-fluid -->


        <div class="tab-pane show active sectionCompteMobile" id="chat">
            <div>
                    <ul class="list-unstyled chat-list">
                        <li class="mb-4">
                            <div class="media">
                                <div class="align-self-center me-3">
                                    <img src="@if(Auth::guard('agent')->user()->agence->logo == '') https://ui-avatars.com/api/?name={{Auth::guard('agent')->user()->agence->name}} @else {{(Storage::url(Auth::guard('agent')->user()->agence->logo))}} @endif" class="rounded-circle avatar-sm" alt="">
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-14 mb-1">{{Auth::guard('agent')->user()->agence->name}}</h5>
                                    <p class="text-truncate mb-0">{{Auth::guard('agent')->user()->agence->slogan}}</p>
                                </div>
                                <div class="font-size-11 button-right-siege">
                                    <span> {{$itineraires->count()}} Itineraire(s)</span>
                                    <span data-bs-toggle="modal" data-bs-target="#staticBackdrop"class="mt-3 badge bg-primary font-size-11"><i class="mdi mdi-plus me-1"></i>Ajouter</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-unstyled chat-list">
                        @if(Auth::guard('agent')->user()->role == 4)
                            <div class="text-center">
                                <span onclick="location.href='{{route('agent.client.renoncer')}}'" class="mt-2 badge bg-primary font-size-11 mb-4"><i class="fa fa-users fa-item me-1"></i>Archives Clients</span>
                                <span onclick="location.href='{{route('agent.bagage.index')}}'" class="mt-2 badge bg-success font-size-11 mb-4">Bagages</span>
                                <span onclick="location.href='{{route('agent.colis.index')}}'" class="mt-2 badge bg-info font-size-11 mb-4">Colies</span>
                            </div>
                            @else
                            <span onclick="location.href='{{route('agent.client.renoncer')}}'" class="mt-3 badge bg-primary font-size-11 mb-4" style="width:100%;"><i class="fa fa-users fa-item me-1"></i>Archives Clients</span>
                        @endif
                        @foreach($itineraires as $itineraire)
                            <li class="mb-3" >
                                <div class="media">
                                    <div onclick="location.href='{{route('agent.itineraire.show',$itineraire->id)}}'" class="align-self-center me-3">
                                        <i class="fa fa-road avatar-xs" style="font-size: 25px;"></i>
                                    </div>
                                    
                                    <div onclick="location.href='{{route('agent.itineraire.show',$itineraire->id)}}'" class="media-body overflow-hidden">
                                        <h5 class="text-truncate font-size-14 mt-2" style="font-weight:600;">{{ $itineraire->name }}</h5>
                                        <p class="text-truncate mb-0"> <i class="mdi mdi-arrow-right font-size-10"></i> {{ $itineraire->buses->count() }} buse(s)</p>
                                    </div>
                                    
                                    <div class="font-size-12 button-right-siege" onclick="event.preventDefault();">
                                        <span class="span-chat-siege span-chat1">
                                            <span class="badge bg-primary" onclick="location.href='{{ route('agent.ville.show',$itineraire->id) }}'"> {{ $itineraire->villes->count() }} Ville(s)</span>
                                        </span>

                                        <span class="span-chat-siege span-chat1">
                                            <span  data-bs-toggle="modal" data-bs-target="#staticBackdropedititineraire-{{ $itineraire->id }}" class="text-success mr-2"><i class="mdi mdi-pencil font-size-18"></i></span>
                                            <span  data-bs-toggle="modal" data-bs-target="#subscribeModalDeleteitineraire-{{ $itineraire->id }}" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></span>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
            </div>
        </div>
    </div>
    <!-- End Page-content -->


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter un itineraire</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <p>
                            <form class="custom-validation" action="{{ route('agent.itineraire.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="mb-3">
                                            <label class="form-label">Nom de l'itineraire</label>
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                                placeholder="Nom de l'itineraire" />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                            Enregistrer Cette itineraire
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect btn-block">
                                            Anuller
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </p>
                    </div>
            </div>
        </div>
    </div>


    <!-- Modal de la modification -->
    @foreach($itineraires as $edit_itineraire)

    <div class="modal fade" id="staticBackdropedititineraire-{{$edit_itineraire->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modifier l'itineraire {{ $edit_itineraire->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <p>
                            <form class="custom-validation" action="{{ route('agent.itineraire.update',$edit_itineraire->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{Method_field('PUT')}}
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="mb-3">
                                            <label class="form-label">Nom de l'itineraire</label>
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $edit_itineraire->name}}" required autocomplete="name"
                                                placeholder="Nom de l'itineraire" />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                            Enregistrer cette itineraire
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect btn-block">
                                            Anuller
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </p>
                    </div>
            </div>
        </div>
    </div>

    @endforeach
    <!-- Fin du modal de la modification -->


<!-- _____________________________________________________________________ -->

    <!-- Modal de l'ajout des ville -->
    @foreach($itineraires as $itineraire_ville_iti)
    <div class="modal fade" id="staticBackdropAjouteVille-{{$itineraire_ville_iti->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-sm" role="document">
            <div class="modal-content text-white">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Ajouter une ville pour {{ $itineraire_ville_iti->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <p>
                            <form class="custom-validation" action="{{ route('agent.ville.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $itineraire_ville_iti->id }}" name="itineraire">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="mb-3">
                                            <label class="form-label">Nom de la ville</label>
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                                placeholder="Nom de la ville" />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Prix du voyage</label>
                                            <div>
                                                <input data-parsley-type="number" type="number" id="prix" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}" autocomplete="prix"
                                                    required placeholder="Prix du voyage" />
                                                    @error('prix')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                            Ajouter cette ville
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect btn-block">
                                            Anuller
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </p>
                    </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Fin du modal de l'ajout des ville -->


    <!-- Modal du delete des itineraire -->
    @foreach($itineraires as $itineraire)

    <div class="modal modal-xs fade" id="subscribeModalDeleteitineraire-{{ $itineraire->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <div class="avatar-md mx-auto mb-4">
                            <div class="avatar-title bg-warning rounded-circle text-white h1">
                                <i class="fa fa-exclamation-circle"></i>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <h4 class="text-danger">Attention !</h4>
                                <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer {{ $itineraire->name }}</p>

                                <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                    <form method="post" action="{{ route('agent.itineraire.destroy',$itineraire->id) }}"  style="display:flex;text-align:center;width:100%;">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                        <button type="submit" class="btn btn-danger btn-xs" style="margin-left: 70px;margin-right:20px;"> Oui je veux bient </button> 
                                        <button type="button" class="btn btn-success btn-xs" data-bs-dismiss="modal" aria-label="Close"> x Anuller</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    @endforeach

    <!-- Fin du moda de delete des itineraire -->

    


           
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