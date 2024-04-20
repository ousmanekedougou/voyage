@extends('admin.layouts.app')

@section('headSection')
    <link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .button-client-add{
            margin-right:13px
        }

        .button-client-delete{
            margin-left:13px
        }
    </style>
@endsection

@section('main-content')

                <div class="page-content">
                    <div class="container-fluid sectionCompteDesktope">

                        <!-- start page title -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0 font-size-18">Clients Colis</h4>
                                        <div class="text-sm-end">
                                            <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light mb-2 me-2" data-bs-toggle="modal" data-bs-target="#NewClientBagage"><i class="fa fa-user"></i> Ajouter</button>
                                        
                                            {{--<button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2" data-bs-toggle="modal" data-bs-target="#NewClientCustomer"><i class="fa fa-user-plus"></i> Ajouter un client confirme</button>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title text-center"> Clients Colis </h4>
                                            <table id="datatable"
                                                class="table table-bordered dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Prenom & nom</th>
                                                        <th>Telephone</th>
                                                        <th>CNI</th>
                                                        <th>Colis</th>
                                                        <th>Afficher</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    @foreach($clients as $client)
                                                        <tr>
                                                            <td>
                                                            <img src="
                                                                @if($client->image != Null)
                                                                    {{Storage::url($client->image)}}
                                                                @else
                                                                    @if($client->name == null)
                                                                        https://ui-avatars.com/api/?name={{$client->customer->name}}
                                                                    @else
                                                                        https://ui-avatars.com/api/?name={{$client->name}}
                                                                    @endif
                                                                @endif" 
                                                            style="width: 40px;height:40px;" alt=""
                                                                    class="avatar-sm rounded-circle header-profile-user">
                                                            </td>
                                                            @if($client->name == null)
                                                                <td>{{ $client->customer->name }}</td>
                                                                <td>{{ $client->customer->phone }}</td>
                                                            @else
                                                                <td>{{ $client->name }}</td>
                                                                <td>{{ $client->phone }}</td>
                                                            @endif
                                                            <td>
                                                            {{ $client->cni }}
                                                            </td>
                                                            <td>
                                                                <!-- Button trigger modal -->
                                                                <a data-bs-toggle="modal" data-bs-target="#AddBagage-{{$client->id}}" class="btn btn-success btn-sm btn-rounded">
                                                                    Ajouter
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <!-- Button trigger modal -->
                                                                <a href="{{ route('agent.colis.show',$client->id) }}" class="btn btn-primary btn-sm btn-rounded">
                                                                <i class="fa fa-eye font-size-12"></i> {{$client->coli_clients->count()}} Colie(s)
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <ul class="list-inline mb-0">
                                                                    
                                                                    <li class="list-inline-item me-3">
                                                                        <a href="" data-bs-toggle="modal" data-bs-target="#EditClientColie-{{$client->id}}"><i class="fa fa-edit font-size-12"></i></a>
                                                                    </li>
                                                                    <li class="list-inline-item me-3">
                                                                        <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalclient-{{ $client->id }}"><i class="bx bx-trash me-1 text-danger font-size-12"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                           {{$clients->links()}}
                        </div>
                    </div>
                    <!-- end row -->

                    </div> <!-- container-fluid -->

                    <!-- show client colis en modal -->
                    <div class="tab-pane show active sectionCompteMobile" id="chat">
                        <div>
                            <ul class="list-unstyled chat-list">
                                <li class="mb-4">
                                    <div class="media">
                                        <div class="align-self-center me-3">
                                            <div class="align-self-center">
                                            <img src="
                                                @if(Auth::guard('agent')->user()->agence->logo != Null)
                                                    {{Storage::url(Auth::guard('agent')->user()->agence->logo)}}
                                                @else
                                                    https://ui-avatars.com/api/?name={{Auth::guard('agent')->user()->agence->name}}
                                                @endif
                                                " class="rounded-circle avatar-sm" alt="">
                                            </div>
                                        </div>
                                        <div class="media-body overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-1" style="font-weight:600;">{{Auth::guard('agent')->user()->agence->name}}</h5>
                                            <p class="text-truncate mb-0">{{Auth::guard('agent')->user()->siege->name}}</p>
                                        </div>
                                        <div class="font-size-11 button-right-siege">
                                            <span>{{ $clients->count() }} Client(s)</span>

                                            <span class="badge bg-info mt-2 font-size-10" data-bs-toggle="modal" data-bs-target="#NewClientBagage"><i class="fa fa-user"></i> Ajouter</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <span class="mb-3 font-size-14 badge badge-soft-info p-2 " style="width:100%;">
                                Clients pour les colis
                            </span>
                            <ul class="list-unstyled chat-list">
                                @foreach($clients as $client)
                                    <li class="mb-4" >
                                        <div class="media">
                                            <div class="align-self-center me-3" onclick="location.href='{{route('agent.colis.show',$client->id)}}'">
                                                <img src="
                                                    @if($client->image != Null)
                                                        {{Storage::url($client->image)}}
                                                    @else
                                                        @if($client->name == null)
                                                            https://ui-avatars.com/api/?name={{$client->customer->name}}
                                                        @else
                                                            https://ui-avatars.com/api/?name={{$client->name}}
                                                        @endif
                                                    @endif
                                                " class="rounded-circle avatar-sm" alt="">
                                            </div>
                                            
                                            <div class="media-body overflow-hidden" onclick="location.href='{{route('agent.colis.show',$client->id)}}'">
                                                <h5 class="text-truncate font-size-14" style="font-weight:600;">
                                                    @if($client->name == null)
                                                        {{ $client->customer->name }}
                                                    @else
                                                        {{ $client->name }}
                                                    @endif
                                                </h5>
                                                <p class="text-truncate mb-0"> <i class="fa fa-mobile font-size-10"></i>
                                                    @if($client->name == null)
                                                        {{ $client->customer->phone }}
                                                    @else
                                                        {{ $client->phone }}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="font-size-12 button-right-siege">
                                                <span class="span-chat-siege span-chat1" onclick="onclick().event.preventDefault()">
                                                    <span data-bs-toggle="modal" data-bs-target="#AddBagage-{{$client->id}}" class="text-success button-client-add"> <i class="fa fa-suitcase-rolling font-size-12"></i></span>
                                                    <span data-bs-toggle="modal" data-bs-target="#EditClientColie-{{$client->id}}" class="text-primary"> <i class="fa fa-edit font-size-12"></i></span>
                                                    
                                                    <span class="span-chat-siege span-chat1 text-danger button-client-delete" data-bs-toggle="modal" data-bs-target="#subscribeModalclient-{{ $client->id }}">
                                                        <i class="fa fa-trash font-size-12"> </i>
                                                    </span>  
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

                <!-- Modal -->
                
                

                 <!-- Static Backdrop Modal de l'ajout -->
                <div class="modal fade" id="NewClientCustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="NewClientBagageLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="NewClientBagageLabel">Ajouter un client confirme</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                       <form class="custom-validation" action="{{ route('agent.colis.customer') }}" method="POST" enctype="multipart/form-data" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12">
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
                                            </div>
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                    Enregistrer Ce Client Confirmer
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
                <div class="modal fade" id="NewClientBagage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="NewClientBagageLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="NewClientBagageLabel">Ajouter un client de colis</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                       <form class="custom-validation" action="{{ route('agent.colis.store') }}" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validation()">
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




                @foreach($clients as $clientEdit)
                 <div class="modal fade" id="EditClientColie-{{$clientEdit->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="NewClientBagageLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="NewClientBagageLabel">Mofifier le client {{ $clientEdit->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                       <form class="custom-validation" action="{{ route('agent.colis.update',$clientEdit->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{method_field('PUT')}}
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Prenom et nom du client</label>
                                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $clientEdit->name }}" required autocomplete="name"
                                                        placeholder="Prenom et nom du client" />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Numero de telephone</label>
                                                    <div>
                                                        <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone')  is-invalid @enderror" name="phone" value="{{ old('phone') ?? $clientEdit->phone }}" autocomplete="phone"
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
                                                        <input data-parsley-type="number" type="number" id="cni" class="form-control @error('cni') is-invalid @enderror" name="cni" value="{{ old('cni') ?? $clientEdit->cni }}" autocomplete="cni"
                                                            required placeholder="Numero de votre CNI" />
                                                            @error('cni')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
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

                
                @foreach($clients as $client_bagage)
                 <!-- Static Backdrop Modal de l'ajout -->
                    <div class="modal fade" id="AddBagage-{{$client_bagage->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="NewClientBagageLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="NewClientBagageLabel">Ajouter des colis pour {{ $client_bagage->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <p>
                                        <form class="custom-validation" action="{{ route('agent.colis.post') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="clientId" value="{{ $client_bagage->id }}">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Image</label>
                                                            <input type="file" class="form-control" required id="image" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image"
                                                            placeholder="" />
                                                            @error('image')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Nom du colis</label>
                                                            <div>
                                                                <input data-parsley-type="text" type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name"
                                                                    required placeholder="" />
                                                                    @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Quantite </label>
                                                            <div>
                                                                <input data-parsley-type="number" type="number" id="quantity" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" autocomplete="quantity"
                                                                    required placeholder="" />
                                                                    @error('quantity')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Prix Unitaire</label>
                                                            <div>
                                                                <input data-parsley-type="number" type="number" id="prix" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}" autocomplete="prix"
                                                                    required placeholder="" />
                                                                    @error('prix')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="form-label">Destination du colis</label>
                                                            <div class="col-md-12">
                                                                <select class="form-control select2 @error('ville') is-invalid @enderror" name="ville" required autocomplete="ville" required>
                                                                    <option>Select</option>
                                                                    @foreach(itineraire_all() as $itineraire)
                                                                        <optgroup label="{{$itineraire->name}}">
                                                                            @foreach($itineraire->villes as $ville)
                                                                                <option value="{{ $ville->id }}">{{$ville->name}}</option>
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
                                                        <div class="mb-3">
                                                            <label class="form-label">Description</label>
                                                            <div>
                                                                <textarea required id="desc" class="form-control @error('desc') is-invalid @enderror" name="desc" value="{{ old('desc') }}" autocomplete="desc" class="form-control" rows="3"></textarea>
                                                                    @error('desc')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Prenom et nom du recepteur</label>
                                                            <input type="text" id="name_recept" class="form-control @error('name_recept') is-invalid @enderror" name="name_recept" value="{{ old('name_recept') }}" required autocomplete="name_recept"
                                                                placeholder="" />
                                                            @error('name_recept')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Numero de telephone du recepteur</label>
                                                            <div>
                                                                <input data-parsley-type="number" type="number" id="phone_recept" class="form-control @error('phone_recept') is-invalid @enderror" name="phone_recept" value="{{ old('phone_recept') }}" autocomplete="phone_recept"
                                                                    required placeholder="" />
                                                                    @error('phone_recept')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="checkbox" id="formCheck1" value="1" name="arriver">
                                                            <label class="form-check-label" for="formCheck1">
                                                                Arriver payer
                                                            </label>
                                                        </div>
                                                        

                                                    </div>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                            Enregistrer
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
                @endforeach

                @foreach($clients as $client)
                    <div class="modal modal-xs fade" id="subscribeModalclient-{{ $client->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center mb-4">
                                        <div class="avatar-md mx-auto mb-4">
                                            <div class="avatar-title bg-danger rounded-circle text-white h1">
                                                <i class="fa fa-trash"></i>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <h4 class="text-danger text-uppercase">Attention !</h4>
                                                <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer {{ $client->name }}</p>

                                                <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                    <form method="post" action="{{ route('agent.colis.destroy',$client->id) }}"  style="display:flex;text-align:center;width:100%;">
                                                        {{csrf_field()}}
                                                        {{method_field('delete')}}
                                                        <button type="submit" class="btn btn-danger btn-xs" style="margin-left: 70px;margin-right:20px;"> Oui je veux bien </button> 
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
                


@endsection


@section('footerSection')
<script src="{{asset('admin/assets/js/table.js')}}"></script>
@endsection