@extends('admin.layouts.app')

@section('headsection')
<link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

            <div class="page-content">
                <div class="container-fluid sectionCompteDesktope">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Listes des agents de {{ $siege->name }}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary text-white">Ajouter un agent</a></li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <h3 class="btn btn-primary btn-block text-center" style="width:100%;">Les agents du siege de {{ $siege->name }}</h3>


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-check">
                                            <thead class="table-light">
                                                <tr>
                                                    <th style="width: 20px;" class="align-middle">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                                            <label class="form-check-label" for="checkAll"></label>
                                                        </div>
                                                    </th>
                                                    <th class="align-middle">Image</th>
                                                    <th class="align-middle">Prenom & nom</th>
                                                    <th class="align-middle">Email</th>
                                                    <th class="align-middle">Phone</th>
                                                    <th class="align-middle">Montant Journaliere</th>
                                                    <th class="align-middle">Roles</th>
                                                    <th class="align-middle">Comptes</th>
                                                    <th class="align-middle">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($agents as $agent)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check font-size-16">
                                                                <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                                <label class="form-check-label" for="orderidcheck01"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                                <img src=" 
                                                                @if($agent->image != null)
                                                                    {{Storage::url($agent->customer->image)}}
                                                                @else
                                                                    @if($agent->name == null)
                                                                        https://ui-avatars.com/api/?name={{$agent->customer->name}}
                                                                    @else
                                                                        https://ui-avatars.com/api/?name={{$agent->name}}
                                                                    @endif
                                                                @endif
                                                                " style="width: 40px;height:40px;" alt=""
                                                                    class="avatar-sm rounded-circle header-profile-user">
                                                        </td>
                                                        <td>{{$agent->name}}</td>
                                                        <td>{{$agent->email}}</td>
                                                        <td>{{$agent->phone}}</td>
                                                        <td>
                                                             {{$agent->getAmount()}} <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#subscribeModalEditAmout-{{ $agent->id }}" class="text-success"><i class="bx bx-edit  font-size-17"></i></a>
                                                        </td>
                                                        <td >
                                                            <span class="badge badge-pill badge-soft-primary">
                                                                @if($agent->role == 1)
                                                                    Gestion Clients
                                                                @elseif($agent->role == 2)
                                                                    Gestion Bagages
                                                                @elseif($agent->role == 3)
                                                                    Gestion Colis
                                                                @elseif($agent->role == 4)
                                                                    Tous les roles
                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td>
                                                        <!-- Button trigger modal -->
                                                            <button type="button" class="btn @if($agent->is_active == 1) btn-success @else btn-warning @endif btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target="#subscribeModalRoleActivationAgent-{{ $agent->id }}">
                                                                @if($agent->is_active == 1) Activer @else Desactiver @endif
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#subscribeModalRole-{{ $agent->id }}" class="text-success"><i class="mdi mdi-pencil-ruler font-size-18"></i></a>
                                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#subscribeModalagence-{{ $agent->id }}" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    
                    <!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center my-3">
                                <a href="javascript:void(0);" class="text-success"><i
                                        class="bx bx-loader bx-spin font-size-18 align-middle me-2"></i> Recherche en cours </a>
                            </div>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->


                <div class="tab-pane show active sectionCompteMobile" id="chat">
                    <div>
                        <ul class="list-unstyled chat-list">
                            <li class="mb-4">
                                <div class="media">
                                    <div class="align-self-center me-3">
                                        <img src="@if(Auth::guard('agence')->user()->logo == '') https://ui-avatars.com/api/?name={{Auth::guard('agence')->user()->name}} @else {{(Storage::url(Auth::guard('agence')->user()->logo))}} @endif
                                        " class="rounded-circle avatar-sm" alt="">
                                    
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="text-truncate font-size-14 mb-1">{{Auth::guard('agence')->user()->name}}</h5>
                                        <p class="text-truncate mb-0">Siege de {{$siege->name}}</p>
                                    </div>
                                    <div class="font-size-11 button-right-siege">
                                        <span>{{ $agents->count() }} Agent(s)</span>
                                        <span data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="badge bg-info mt-2 font-size-10"><i class="fa fa-users"></i> Ajouter</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-unstyled chat-list mt-2">
                            @foreach($agents as $agent)
                                <li class="mb-3" >
                                    <div class="media">
                                        <div class="align-self-center me-3">
                                            <img src="
                                                @if($agent->logo == '') 
                                                    https://ui-avatars.com/api/?name={{$agent->name}} 
                                                @else 
                                                    {{Storage::url($agent->logo)}} 
                                                @endif
                                            " class="rounded-circle avatar-sm" alt="">
                                            
                                        </div>
                                        
                                        <div class="media-body overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mt-2" style="font-weight:600;">
                                                {{ $agent->name }}
                                            </h5>
                                            {{----}}
                                            <p class="text-truncate mb-0"> <i class="fa fa-mobile font-size-10"></i>
                                                {{ $agent->phone }}
                                            </p>
                                            <span class="badge badge-pill badge-soft-primary">
                                                @if($agent->role == 1)
                                                    Gestion Clients
                                                @elseif($agent->role == 2)
                                                    Gestion Bagages
                                                @elseif($agent->role == 3)
                                                    Gestion Colis
                                                @elseif($agent->role == 4)
                                                    Tous les roles
                                                @endif
                                            </span>
                                            <span class="badge badge-pill badge-soft-success"> {{ $agent->getAmount() }} / J </span>
                                        </div>
                                        <div class="font-size-12 button-right-siege">
                                            <span class="span-chat-siege span-chat1 form-check form-switch">
                                                <input class="form-check-input" type="checkbox" 
                                                role="button" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#subscribeModalRoleActivationAgent-{{ $agent->id }}"
                                                    id="SwitchCheckSizesm-{{ $agent->id }}" @if($agent->is_active == 1) checked @endif  data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$agent->id}}">
                                                <label class="form-check-label" for="SwitchCheckSizesm-{{ $agent->id }}">@if($agent->is_active == 1) Actif @else Desactive @endif </label>
                                            </span>

                                            <span class="span-chat-siege span-chat1" onclick="event.preventDefault();">
                                                <span  role="button" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#subscribeModalEditAmout-{{ $agent->id }}" class="text-success mr-2"><i class="mdi mdi-book-edit font-size-18  text-success"></i></span>
                                                <span  role="button" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#subscribeModalRole-{{ $agent->id }}" class="text-success mr-2"><i class="mdi mdi-pencil-ruler font-size-18  text-warning"></i></span>
                                                <span  role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $agent->id }}"><i class="mdi mdi-delete font-size-18"></i></span>
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


                @foreach($agents as $agent)
                <!-- Modal pour la suppression de l'agent -->
                    <div class="modal modal-md fade" id="subscribeModalagence-{{ $agent->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                                <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer {{$agent->name}}</p>

                                                <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                    <form method="post" action="{{ route('agence.agent.destroy',$agent->id) }}"  style="display:flex;text-align:center;width:100%;">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                            <input type="hidden" name="delete" value="1">
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
                <!-- Fin du modal pour la suppression de l'agent -->
                @endforeach


             <!-- Modal pour la presence du client -->
            @foreach($agents as $agent_role)
                <div class="modal modal-xs fade" id="subscribeModalRole-{{ $agent_role->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-4">

                                    <div class="row justify-content-center">
                                        <div class="col-xl-10">
                                            <h4 class="text-warning text-uppercase">Assigner un Role !</h4>
                                            <p class="text-muted font-size-14 mb-1">Etes vous sure de bien vouloire assigner un role a {{ $agent_role->name }}</p>
                                            <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                <form method="post" action="{{ route('agence.agent.edite',$agent_role->id) }}"  style="display:block;text-align:center;width:100%;">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}

                                                    <div class="mb-3 row">
                                                        <label class="form-label">Assigner un role</label>
                                                        <div class="col-lg-3 col-sm-4">
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="radio" name="role" @if($agent_role->role == 4) checked @endif value="4" id="formRadiosRightTous-A-{{ $agent->id }}">
                                                                <label class="form-check-label" for="formRadiosRightTous-A-{{ $agent->id }}">
                                                                    Tous
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 col-sm-4">
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="radio" name="role" @if($agent_role->role == 1) checked @endif value="1" id="formRadiosRightclient-B-{{ $agent->id }}">
                                                                <label class="form-check-label" for="formRadiosRightclient-B-{{ $agent->id }}">
                                                                    Client
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 col-sm-4">
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="radio" name="role" @if($agent_role->role == 2) checked @endif value="2" id="formRadiosRightbagage-C-{{ $agent->id }}">
                                                                <label class="form-check-label" for="formRadiosRightbagage-C-{{ $agent->id }}">
                                                                    Bagages
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 col-sm-4">
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="radio" name="role" @if($agent_role->role == 3) checked @endif value="3" id="formRadiosRightcolis-D-{{ $agent->id }}">
                                                                <label class="form-check-label" for="formRadiosRightcolis-D-{{ $agent->id }}">
                                                                    Colis
                                                                </label>
                                                            </div>
                                                        </div>

                                                        
                                                    </div>

                                                    <button type="submit" class="btn btn-success btn-xs" style="margin-left: 20px;margin-right:20px;"> Oui je veux bien </button> 
                                                    <button type="button" class="btn btn-danger btn-xs" data-bs-dismiss="modal" aria-label="Close"> x Anuller</button>
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
            <!-- Fin du modal pour la presence du client -->


            @foreach($agents as $agent)
            <div class="modal modal-xs fade" id="subscribeModalRoleActivationAgent-{{$agent->id}}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center mb-4">

                                <div class="row justify-content-center">
                                    <div class="col-xl-10">
                                        <h5 class="modal-title mb-4" id="staticBackdropLabel">
                                            @if($agent->is_active == 1)
                                                <span class="text-default">Desactivation d'agent</span>
                                            @else
                                                <span class="text-default">Activation d'agent</span>
                                            @endif
                                        </h5>
                                        @if($agent->is_active == 1)
                                            <p class="text-default font-size-14 mb-3">Etse vous sure de desactiver {{ $agent->name }}</p>
                                        @else
                                            <p class="text-default font-size-14 mb-3">Etse vous sure d'activer {{ $agent->name }}</p>
                                        @endif

                                        <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                            <form method="post" action="{{ route('agence.agent.update',$agent->id) }}"  style="display:block;text-align:center;width:100%;">
                                                {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                                         <input type="hidden" name="is_active" value="{{$agent->is_active}}">

                                                <button type="submit"  style="margin-left: 70px;margin-right:20px;" class="@if($agent->is_active == 1) btn btn-danger btn-xs @else btn btn-success btn-xs @endif" >
                                                    @if($agent->is_active == 1)
                                                        Desactiver
                                                    @else
                                                        Activer
                                                    @endif
                                                    </button> 
                                                <button type="button" class="btn btn-danger btn-xs" data-bs-dismiss="modal" aria-label="Close"> x Anuller</button>
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


             <!-- Modal pour la modification du montant journalier de l'agent -->
             @foreach($agents as $agent_role)
                <div class="modal modal-xs fade" id="subscribeModalEditAmout-{{ $agent_role->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-4">

                                    <div class="row justify-content-center">
                                        <div class="col-xl-10">
                                            <h5 class="text-primary">Modifier le montant journaliere de {{ $agent_role->name }}</h5>
                                            <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                <form method="post" action="{{ route('agence.agent.updateAmount',$agent_role->id) }}"  style="display:block;text-align:center;width:100%;">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}

                                                    <div class="mb-3 row">
                                                        <div class="mb-3">
                                                            <div>
                                                                <input data-parsley-type="number" type="number" id="montant" class="form-control @error('montant') is-invalid @enderror" name="montant" value="{{ old('montant') ?? $agent->montant_journaliere }}" autocomplete="montant"
                                                                    required placeholder="Montant journaliere" />
                                                                    @error('montant')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                    <button type="submit" class="btn btn-success btn-xs" style="margin-left: 20px;margin-right:20px;"> Enregistre </button> 
                                                    <button type="button" class="btn btn-danger btn-xs" data-bs-dismiss="modal" aria-label="Close"> x Anuller</button>
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
            <!-- Fin du modal pour la modification du montant journalier de l'agent -->

             



            <!-- Static Backdrop Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Ajouter un agent</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                                <p>
                                    <form class="custom-validation" action="{{ route('agence.agent.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="siege" value="{{ $siege->id }}">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Nom de l'agent</label>
                                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                                        placeholder="Nom de l'agent" />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">E-Mail de l'agent</label>
                                                    <div>
                                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" parsley-type="email"
                                                            placeholder="E-Mail de l'agent" />
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
                                                    <label class="form-label">Montant journaliere</label>
                                                    <div>
                                                        <input data-parsley-type="number" type="number" id="montant" class="form-control @error('montant') is-invalid @enderror" name="montant" value="{{ old('montant') }}" autocomplete="montant"
                                                            required placeholder="Montant journaliere" />
                                                             @error('montant')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="form-label">Assigner un role</label>
                                                    <div class="col-lg-3 col-xs-6">
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="radio" name="role" value="4" id="formRadiosRightTous-1">
                                                            <label class="form-check-label" for="formRadiosRightTous-1">
                                                                Tous
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-xs-6">
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="radio" name="role" value="1" id="formRadiosRightclient-2">
                                                            <label class="form-check-label" for="formRadiosRightclient-2">
                                                                Client
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-xs-6">
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="radio" name="role" value="2" id="formRadiosRightbagage-3">
                                                            <label class="form-check-label" for="formRadiosRightbagage-3">
                                                                Bagages
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-xs-6">
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="radio" name="role" value="3" id="formRadiosRightcolis-4">
                                                            <label class="form-check-label" for="formRadiosRightcolis-4">
                                                                Colis
                                                            </label>
                                                        </div>
                                                    </div>

                                                    
                                                </div>


                                            </div>
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                    Enregistrer l'agent
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

                



@endsection


@section('footersection')

@endsection