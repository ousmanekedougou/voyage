@extends('admin.layouts.app')

@section('headsection')
    <link href="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
     {{-- <style>
        .invoice-container{
            padding: 2mm;
            margin: 0 auto;
            width: 58mm;
        }
    </style> --}}
@endsection

@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">la liste des clients</h4>
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
                                                    <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-primary" data-bs-target="" onclick="PrintReceiptContent('iprimerTiker-{{ $client->id }}')"><i class="fa fa-print mt-1 font-size-18"></i></a>
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
                                                                        <option value="{{ $date->id }}"> le {{$date->depart_at->format('d-m-y')}}</option>
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
                            <form class="custom-validation" action="{{ route('admin.client.store') }}" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validation()">
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
                                                                    <option value="{{ $date->id }}"> le {{$date->depart_at->format('d-m-y')}}</option>
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



     <!-- Static Backdrop Modal de l'ajout -->
     @foreach($clients as $clienTiker)
        <div class="modal fade" id="iprimerTiker-{{ $clienTiker->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="avatar-md me-4">
                                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                            <img src="{{Storage::url(Auth::user()->image_agence)}}" alt="" height="30">
                                                        </span>
                                                    </div>

                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">{{ $clienTiker->name}}</a></h5>
                                                        <p class="text-muted mb-1">{{ $clienTiker->email }}</p>
                                                        <p class="text-muted mb-4">{{ $clienTiker->phone }}</p>
                                                    
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="assets/images/users/avatar-4.jpg" alt=""
                                                                        class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="assets/images/users/avatar-5.jpg" alt=""
                                                                        class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <div class="avatar-xs">
                                                                        <span
                                                                            class="avatar-title rounded-circle bg-success text-white font-size-16">
                                                                            A
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="assets/images/users/avatar-2.jpg" alt=""
                                                                        class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-4 py-3 border-top">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item me-3">
                                                        <span class="badge bg-success"><i class="bx bxs-check-circle me-1"></i>
                                                        </span>
                                                        
                                                    </li>
                                                    <li class="list-inline-item me-3">
                                                        <!-- <a href=""><i class="bx bx-edit me-1"></i></a> -->
                                                    </li>
                                                    <li class="list-inline-item me-3">
                                                        <a href="" data-bs-toggle="modal" data-bs-target="#"><i class="bx bx-show me-1"></i></a>
                                                    </li>
                                                    <li class="list-inline-item me-3">
                                                        <a href="" data-bs-toggle="modal" data-bs-target="#"><i class="bx bxs-file-txt me-1"></i></a>
                                                    </li>
                                                    <li class="list-inline-item me-3">
                                                        <!-- <a href=""><i class="bx bx-block me-1"></i></a> -->
                                                        <div class="form-check form-switch mb-3" dir="ltr">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="SwitchCheckSizesm">
                                                            <label class="form-check-label" for="SwitchCheckSizesm"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-inline-item me-3">
                                                        <a href="" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#"><i class="bx bx-trash me-1 text-danger"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Fin du modal de l'ajout -->




@endsection


@section('footersection')
<!-- Responsive Table js -->
    <script src="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/select2/js/select2.min.js')}}"></script>
    <!-- Init js -->
    <script src="{{asset('admin/assets/js/pages/table-responsive.init.js')}}"></script>

    <script>
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


    <!-- Print section script -->
    <script>
        function PrintReceiptContent(el){
            var data = '<input type="button" id="printPageButton" class="printPageButton" style="display:block; width:100%; border:none; background-color:#008BBB;color:white; padding:14px 28px;font-size:16px;cursor:pointor;text-align:center;" value="Imprimer" onClick="window.print()">';
            data += document.getElementById(el).innerHTML;
            myReceipt = window.open("" , "myWin" , "left=500, top=130, width=400, height=400");
                myReceipt.screnX = 0;
                myReceipt.screnY = 0;
                myReceipt.document.write(data);
                myReceipt.document.title = "Imprimer votre ticker";
            myReceipt.focus();
            setTimeout(() => {
                myReceipt.close();
            },10000);
        }
    </script>
@endsection
