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

                    <div class="row">
                        <h3 class="btn btn-primary btn-block">Les agents du siege de {{ $siege->name }}</h3>
                        @foreach($agents as $agent)
                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="text-lg-center">
                                                    <div
                                                        class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none">
                                                        <span
                                                            class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                                            @if($agent->logo != '')
                                                                <img src="{{Storage::url($agent->logo)}}" alt="" style="width:100%;border-radius:100%;">
                                                            @else
                                                                <img src="{{ asset('admin/assets/images/users/profil.jpg') }}" alt="" style="width:100%;border-radius:100%;">
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <h5 class="">{{ $agent->name }}</h5>
                                                </div>
                                            </div>

                                            <div class="col-lg-8">
                                                <div>
                                                    <h6 class="text-truncate "> <i class="fa fa-mobile"></i> {{$agent->phone}}</h6>
                                                    <p class=""> <i class="fa fa-envelope"></i> {{$agent->email}} </p>
                                                    <p class=" d-flex">
                                                            <span class="badge bg-warning">
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
                                                    </p>
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-3">
                                                            @if($agent->is_active == 1)
                                                            <span href="" ><i class="bx bxs-user-check  me-1 text-success"></i></span>
                                                            @else
                                                            <span href="" ><i class="bx bxs-user-x  me-1 text-danger"></i></span>
                                                            @endif
                                                            
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <!-- <a href=""><i class="bx bx-block me-1"></i></a> -->
                                                            <div class="form-check form-switch mb-3" dir="ltr">
                                                                <input class="form-check-input" type="checkbox" 
                                                                role="button" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#subscribeModalRoleActivationAgent-{{ $agent->id }}"
                                                                    id="SwitchCheckSizesm" @if($agent->is_active == 1) checked @endif  data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$agent->id}}">
                                                                <label class="form-check-label" for="SwitchCheckSizesm"></label>
                                                            </div>
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <a href="" style="margin-right: 8px;" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-warning" data-bs-target="#subscribeModalRole-{{ $agent->id }}"><i class="fa fa-pencil-ruler me-1 text-warning"></i></a>
                                                            <a href="" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $agent->id }}"><i class="bx bx-trash me-1 text-danger"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    
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
                                        @if(Auth::guard('agence')->user()->logo != Null)
                                            <img src="{{Storage::url(Auth::guard('agence')->user()->logo)}}" class="rounded-circle avatar-xs" alt="">
                                        @else
                                            <img src="{{asset('admin/assets/images/bus_agence.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                        @endif
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
                        <ul class="list-unstyled chat-list">
                            @foreach($agents as $agent)
                                <li class="" >
                                    <a onclick="onclick().event.preventDefault()">
                                        <div class="media">
                                            <div class="align-self-center me-3">
                                                @if($agent->image != Null)
                                                    <img src="{{Storage::url($agent->image)}}" class="rounded-circle avatar-xs" alt="">
                                                @else
                                                    <img src="{{asset('admin/assets/images/users/profil.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                                @endif
                                            </div>
                                            
                                            <div class="media-body overflow-hidden">
                                                <h5 class="text-truncate font-size-14 mb-1">
                                                    {{ $agent->name }}
                                                </h5>
                                                <p class="text-truncate mb-0"> <i class="fa fa-mobile font-size-10"></i>
                                                    {{ $agent->phone }}
                                                </p>
                                                <span class="badge bg-warning">
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
                                            </div>
                                            <div class="font-size-12 button-right-siege">
                                                <span class="span-chat-siege span-chat1 form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" 
                                                    role="button" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#subscribeModalRoleActivationAgent-{{ $agent->id }}"
                                                        id="SwitchCheckSizesm" @if($agent->is_active == 1) checked @endif  data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$agent->id}}">
                                                    <label class="form-check-label" for="SwitchCheckSizesm">@if($agent->is_active == 1) Actif @else Desactive @endif </label>
                                                </span>

                                                <span class="span-chat-siege span-chat1" onclick="event.preventDefault();">
                                                    <span  role="button" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#subscribeModalRole-{{ $agent->id }}" class="text-success mr-2"><i class="fa fa-pencil-ruler me-1 text-warning"></i></span>
                                                    <span  role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $agent->id }}"><i class="mdi mdi-delete font-size-18"></i></span>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
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
                                            <p class="font-size-14 badge bg-warning text-white">Destination :</p>

                                            <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                <form method="post" action="{{ route('agence.agent.edite',$agent_role->id) }}"  style="display:block;text-align:center;width:100%;">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                                    <p class="text-muted font-size-14 mb-4">
                                                        <div class="d-flex text-center">

                                                             <div style="margin-left: 30px;">
                                                                <div class="form-check form-check-left">
                                                                    <input class="form-check-input" type="radio" 
                                                                        name="role" value="4" id="formRadiosRightTous-5-{{ $agent_role->id }}" 
                                                                            @if($agent_role->role == 4) checked @endif
                                                                        >
                                                                    <label class="form-check-label" for="formRadiosRightTous-5-{{ $agent_role->id }}">
                                                                        Tous
                                                                    </label>
                                                                </div>
                                                            </div>


                                                            <div style="margin-left: 10px;margin-right: 20px;">
                                                                <div class="form-check form-check-left">
                                                                    <input class="form-check-input" type="radio" 
                                                                        name="role" value="1" id="formRadiosRightclient-6-{{ $agent_role->id }}" 
                                                                            @if($agent_role->role == 1) checked @endif
                                                                        >
                                                                    <label class="form-check-label" for="formRadiosRightclient-6-{{ $agent_role->id }}">
                                                                        Clients
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        
                                                            <div style="margin-left: 5px;">
                                                                <div class="form-check form-check-right">
                                                                    <input class="form-check-input" type="radio" 
                                                                        name="role" value="2" id="formRadiosRightbagage-7-{{ $agent_role->id }}"
                                                                        @if($agent_role->role == 2) checked @endif
                                                                        >
                                                                    <label class="form-check-label" for="formRadiosRightbagage-7-{{ $agent_role->id }}">
                                                                        Bagages
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div style="margin-left: 10px;">
                                                                <div class="form-check form-check-right">
                                                                    <input class="form-check-input" type="radio" 
                                                                        name="role" value="3" id="formRadiosRightcolis-8-{{ $agent_role->id }}"
                                                                        @if($agent_role->role == 3) checked @endif
                                                                        >
                                                                    <label class="form-check-label" for="formRadiosRightcolis-8-{{ $agent_role->id }}">
                                                                        Colis
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </p>

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
                                                <p class="text-muted font-size-14 mb-4">
                                                    <label class="form-label">Assigner un role</label>
                                                    <div class="d-flex text-center">

                                                        <div style="margin-left: 30px;">
                                                            <div class="form-check form-check-left">
                                                                <input class="form-check-input" type="radio" 
                                                                    name="role" value="4" id="formRadiosRightTous-1">
                                                                <label class="form-check-label" for="formRadiosRightTous-1">
                                                                    Tous
                                                                </label>
                                                            </div>
                                                        </div>


                                                        <div style="margin-left: 10px;margin-right: 10px;">
                                                            <div class="form-check form-check-left">
                                                                <input class="form-check-input" type="radio" 
                                                                    name="role" value="1" id="formRadiosRightclient-2">
                                                                <label class="form-check-label" for="formRadiosRightclient-2">
                                                                    Clients
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div style="margin-left: 5px;">
                                                            <div class="form-check form-check-right">
                                                                <input class="form-check-input" type="radio" 
                                                                    name="role" value="2" id="formRadiosRightbagage-3">
                                                                <label class="form-check-label" for="formRadiosRightbagage-3">
                                                                    Bagages
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div style="margin-left: 10px;">
                                                            <div class="form-check form-check-right">
                                                                <input class="form-check-input" type="radio" 
                                                                    name="role" value="3" id="formRadiosRightcolis-4">
                                                                <label class="form-check-label" for="formRadiosRightcolis-4">
                                                                    Colis
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </p>
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