@extends('admin.layouts.app')

@section('headsection')
    <link href="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

      <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Resultats des reherches </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                               @include('admin.layouts.search')
                                            </div>
                 
                 
                                            <div class="col-sm-8">
                                                <div class="text-sm-end">
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary text-white"
                                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                            class="mdi mdi-plus me-1"></i>Ajouter un client</button>
                                                </div>
                                            </div><!-- end col-->
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Prenom et nom</th>
                                                        <th>Telephone</th>
                                                        <th>CNI</th>
                                                        <th>Itineraires</th>
                                                        <th>Voyage</th>
                                                        <th>Bus</th>
                                                        <th>Place</th>
                                                        <th>Paiment</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($clients as $client)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check font-size-16">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="customerlistcheck08">
                                                                <label class="form-check-label"
                                                                    for="customerlistcheck08"></label>
                                                            </div>
                                                        </td>
                                                        <td>{{$client->name}}</td>
                                                        <td>
                                                            <p class="mb-1">{{$client->phone}}</p>
                                                        </td>

                                                        <td>
                                                            <p class="mb-1">{{$client->cni}}</p>
                                                        </td>

                                                        <td>
                                                            <p class="mb-1">{{$client->ville->itineraire->name}}</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1">{{$client->ville->name}}</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1">{{$client->bus->matricule}}</p>
                                                        </td>
                                                         <td>
                                                            <p class="mb-1">
                                                                @if($client->position == 1)
                                                                    {{$client->position}} ere
                                                                @else
                                                                    {{$client->position}} em 
                                                                @endif
                                                            </p>
                                                        </td>
                                                        <td>
                                                               <p class="mb-1">
                                                                @if($client->amount !== $client->ville->amount && $client->amount !== 2)
                                                                    <a href="" class="badge bg-primary font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#staticBackdroppaiment-{{ $client->id }}">
                                                                        <i class="bx bx-money  me-1 text-white"> 0 f </i></a>
                                                                @elseif($client->amount == $client->ville->amount)
                                                                    <a href="" class="badge bg-success font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#staticBackdroppaiment-{{ $client->id }}"> 
                                                                        {{ $client->amount }} f</i>
                                                                    </a>
                                                                @elseif($client->amount == 2)
                                                                    <a href="" class="badge bg-danger font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#staticBackdroppaiment-{{ $client->id }}"><i class="bx bx-money me-1"></i> Rembourse</a>
                                                                @endif
                                                            </p>
                                                        </td>

                                                        <td>
                                                            <p class="mb-1">
                                                                @if($client->voyage_status == 0)
                                                               <a href="" class="badge bg-primary font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $client->id }}"><i class="bx bx-highlight  me-1 text-white"> Designation</i>
                                                                    
                                                                </a>
                                                                @elseif($client->voyage_status == 1)
                                                               <a href="" class="badge bg-success font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $client->id }}"> 
                                                                    <i class="bx bxs-check-circle me-1 text-white">Voyage</i>
                                                                        
                                                                </a>
                                                                @else
                                                                <a href="" class="badge bg-danger font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $client->id }}"><i class="bx bx-money me-1"></i> Absent</a>
                                                                @endif
                                                            </p>
                                                        </td>
                                                        
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                         
                                                                <!-- @if($client->amount == $client->ville->amount)
                                                                Payer
                                                                @else
                                                                    <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-primary" data-bs-target="#staticBackdroppaiment-{{$client->id}}"><i class="bx bx-money mt-1 font-size-18"></i></a>
                                                                @endif -->

                                                                <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-primary" data-bs-target="#staticBackdrop-{{$client->id}}"><i class="bx bx-edit mt-1 font-size-18"></i></a>
                                                                <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalclient-{{ $client->id }}"><i class="mdi mdi-delete font-size-18"></i></a>
                                                                <div class="modal modal-xs fade" id="subscribeModalclient-{{ $client->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                                                                            <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer {{ $client->name }}</p>

                                                                                            <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                                                                <form method="post" action="{{ route('admin.client.destroy',$client->id) }}"  style="display:flex;text-align:center;width:100%;">
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
                                                            
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <ul class="pagination pagination-rounded justify-content-end mb-2">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                                    <i class="mdi mdi-chevron-left"></i>
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link"
                                                    href="javascript: void(0);">1</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                                    <i class="mdi mdi-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Modal pour la presence du client -->
                @foreach($clients as $client_presence)
                    <div class="modal fade modal-xs modal-center" id="subscribeModalagence-{{$client_presence->id}}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" role="dialog"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">
                                            <span class="text-muted">Etse vous sure de modifier {{ $client_presence->name }}</span>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.client.presence',$client_presence->id) }}" method="post" >
                                    <div class="modal-body">
                                        <p>
                                            <div class="mt-4 d-flex text-center">
                                                <div style="margin-left: 30px;margin-right: 30px;">
                                                    <div class="form-check form-check-right">
                                                        <input class="form-check-input" type="radio" 
                                                            name="presence" value="1" id="formRadiosRight1presnce" 
                                                                @if($client_presence->voyage_status == 1) checked @endif
                                                            >
                                                        <label class="form-check-label" for="formRadiosRight1presnce">
                                                            A voyager
                                                        </label>
                                                    </div>
                                                </div>

                                                <div style="margin-left: 30px;">
                                                    <div class="form-check form-check-right">
                                                        <input class="form-check-input" type="radio" 
                                                            name="presence" value="2" id="formRadiosRight2absence">
                                                        <label class="form-check-label" for="formRadiosRight2absence"
                                                            @if($client_presence->voyage_status == 2) checked @endif
                                                        >
                                                            Est absent
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="modal-footer" class="text-center">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                            <input type="hidden" name="voyage_status" value="{{$client_presence->voyage_status}}">

                                        <button type="reset" class="btn btn-light"
                                            data-bs-dismiss="modal">Ferner</button>
                                        <button type="submit" class="btn btn-primary">Modifier </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Fin du modal pour la presence du client -->

                <!-- Static Backdrop Modal de la modification -->
                @foreach($clients as $client_tdy)
                <div class="modal fade" id="staticBackdrop-{{$client_tdy->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modifier un client</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                        <form class="custom-validation" action="{{ route('admin.client.update',$client_tdy->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            {{ Method_field('PUT') }}
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Prenom et nom du client</label>
                                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $client_tdy->name}}" required autocomplete="name"
                                                            placeholder="Prenom et nom du client" />
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">E-Mail du client</label>
                                                        <div>
                                                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $client_tdy->email}}" required autocomplete="email" parsley-type="email"
                                                                placeholder="E-Mail du client" />
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Numero de telephone</label>
                                                        <div>
                                                            <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $client_tdy->phone}}" autocomplete="phone"
                                                                required placeholder="Numero de telephone" />
                                                                @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Numero de votre CNI</label>
                                                        <div>
                                                            <input data-parsley-type="number" type="number" id="cni" class="form-control @error('cni') is-invalid @enderror" name="cni" value="{{ old('cni') ?? $client_tdy->cni}}" autocomplete="cni"
                                                                required placeholder="Numero de votre CNI" />
                                                                @error('cni')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label class="form-label">Selectionner ville de voyage</label>
                                                        <div class="col-md-12">
                                                            <select class="form-control select2 @error('ville') is-invalid @enderror" name="ville" required autocomplete="ville" required>
                                                               <option>Select</option>
                                                                @foreach($itineraires as $itineraire)
                                                                    <optgroup label="{{$itineraire->name}}">
                                                                        @foreach($itineraire->villes as $ville)
                                                                            <option value="{{ $ville->id }}"
                                                                                @if($ville->id == $client_tdy->ville_id)
                                                                                    selected
                                                                                @endif    
                                                                            >{{$ville->name}}</option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                @endforeach
                                                            </select>
                                                            @error('ville')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                     <div class="mb-3 row">
                                                        <label class="form-label">Selectionner une date</label>
                                                        <div class="col-md-12">
                                                            <select  class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="date" required>
                                                               
                                                                    @foreach($itineraires as $itineraire)
                                                                        <optgroup label="{{$itineraire->name}}">
                                                                            @foreach($itineraire->date_departs as $date)
                                                                                @if($date->buses->count() >= 1)
                                                                                    <option value="{{ $date->id }}"> le {{$date->depart_at}}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </optgroup>
                                                                    @endforeach
                                                            </select>
                                                            @error('date')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--
                                                    <div class="mb-3 row">
                                                        <label class="form-label">Selectionner un bus</label>
                                                        <div class="col-md-12">
                                                            <select  class="form-control @error('bus') is-invalid @enderror" name="bus" required autocomplete="bus" required>
                                                                @foreach($itineraires as $itineraire)
                                                                    <optgroup label="{{$itineraire->name}}">
                                                                        @foreach($itineraire->date_departs as $date)
                                                                            <optgroup label="{{$date->depart_at}}" style="margin-left: 15px;">
                                                                                @foreach($date->buses as $bus)
                                                                                    @if($bus->plein == 0)
                                                                                        <option value="{{ $bus->id }}"
                                                                                            @if($bus->id == $client_tdy->bus->id) selected @endif    
                                                                                        > bus {{ $bus->matricule }} N{{ $bus->number }}</option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </optgroup>
                                                                        @endforeach
                                                                    </optgroup>
                                                                @endforeach
                                                            </select>
                                                            @error('bus')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    --}}
                                                </div>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                        Modifier Ce Client
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


                  <!-- Static Backdrop Modal du paiment -->
                @foreach($clients as $client_tdy)
                <div class="modal fade" id="staticBackdroppaiment-{{$client_tdy->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">
                                        Avis du paiment du client {{ $client_tdy->name }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @if($client_tdy->amount == Null)
                                        <h5 class="modal-title" id="staticBackdropLabel">Accepter le paiement du client {{ $client_tdy->name }}</h4>
                                    @elseif($client_tdy->amount == $client_tdy->ville->amount)
                                        <h5 class="modal-title" id="staticBackdropLabel">Remourser le client {{ $client_tdy->name }}</h4>
                                    @elseif($client_tdy->amount == 2)
                                        <h5 class="modal-title" id="staticBackdropLabel">Le client {{ $client_tdy->name }} a ete rembourser le {{ $client_tdy->updated_at }}</h4>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.payer',$client_tdy->id) }}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                            <input type="hidden" name="client_amount" value="{{$client_tdy->client_amount}}">
                                            <input type="hidden" name="confirmation_token" value="{{$client_tdy->confirmation_token}}">

                                        <button type="reset" class="btn btn-light"
                                            data-bs-dismiss="modal">Ferner</button>
                                        @if($client_tdy->amount == Null)
                                        <button type="submit"
                                            class="btn btn-success">Valider le paiement
                                        </button>
                                        @elseif($client_tdy->amount == $client_tdy->ville->amount )
                                        <button type="submit"
                                            class="btn btn-primary">Valider le remboursement
                                         </button>
                                         @elseif($client_tdy->amount == 2 )
                                            <button type="submit"
                                                class="btn btn-info">Anuller le remboursement
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Fin du modal du paiment -->


                <!-- Static Backdrop Modal de l'ajout -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Ajouter un client</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                        <form class="custom-validation" action="{{ route('admin.client.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Prenom et nom du client</label>
                                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                                            placeholder="Prenom et nom du client" />
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">E-Mail du client</label>
                                                        <div>
                                                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" parsley-type="email"
                                                                placeholder="E-Mail du client" />
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Numero de telephone</label>
                                                        <div>
                                                            <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                                                required placeholder="Numero de telephone" />
                                                                @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Numero de votre CNI</label>
                                                        <div>
                                                            <input data-parsley-type="number" type="number" id="cni" class="form-control @error('cni') is-invalid @enderror" name="cni" value="{{ old('cni') }}" autocomplete="cni"
                                                                required placeholder="Numero de votre CNI" />
                                                                @error('cni')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label class="form-label">Selectionner ville de voyage</label>
                                                        <div class="col-md-12">
                                                            <select class="form-control select2 @error('ville') is-invalid @enderror" name="ville" required autocomplete="ville" required>
                                                               <option>Select</option>
                                                                @foreach($itineraires as $itineraire)
                                                                    <optgroup label="{{$itineraire->name}}">
                                                                        @foreach($itineraire->villes as $ville)
                                                                            <option value="{{ $ville->id }}">{{$ville->name}}</option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                @endforeach
                                                            </select>
                                                            @error('siege')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mb-3 row">
                                                        <label class="form-label">Selectionner une date</label>
                                                        <div class="col-md-12">
                                                            <select  class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="date" required>
                                                               
                                                                    @foreach($itineraires as $itineraire)
                                                                        <optgroup label="{{$itineraire->name}}">
                                                                            @foreach($itineraire->date_departs as $date)
                                                                            @if($date->buses->count() >= 1)
                                                                                <option value="{{ $date->id }}"> le {{$date->depart_at}}</option>
                                                                            @endif
                                                                            @endforeach
                                                                        </optgroup>
                                                                    @endforeach
                                                            </select>
                                                            @error('date')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    {{--
                                                    <div class="mb-3 row">
                                                        <label class="form-label">Selectionner un bus</label>
                                                        <div class="col-md-12">
                                                            <select  class="form-control @error('bus') is-invalid @enderror" name="bus" required autocomplete="bus" required>
                                                                @foreach($itineraires as $itineraire)
                                                                    <optgroup label="{{$itineraire->name}}">
                                                                        @foreach($itineraire->date_departs as $date)
                                                                            <optgroup label="{{$date->depart_at}}" style="margin-left: 15px;">
                                                                                @foreach($date->buses as $bus)
                                                                                     @if($bus->plein == 0)
                                                                                        <option value="{{ $bus->id }}"> bus {{ $bus->matricule }} N{{ $bus->number }}</option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </optgroup>
                                                                        @endforeach
                                                                    </optgroup>
                                                                @endforeach
                                                            </select>
                                                            @error('bus')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    --}}
                                                </div>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                        Enregistrer Ce Client
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
                <!-- Fin du modal de l'ajout -->

@endsection


@section('footersection')
<!-- Responsive Table js -->
    <script src="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/select2/js/select2.min.js')}}"></script>
    <!-- Init js -->
    <script src="{{asset('admin/assets/js/pages/table-responsive.init.js')}}"></script>
@endsection