@extends('admin.layouts.app')

@section('headsection')

@endsection

@section('main-content')

            <div class="page-content">
                <div class="container-fluid">

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
                                                            <img src="{{Storage::url($agent->logo)}}" alt="" style="width:100%;border-radius:100%;">
                                                        </span>
                                                    </div>
                                                    <h5 class="mb-1 font-size-10">{{ $agent->name }}</h5>
                                                </div>
                                            </div>

                                            <div class="col-lg-8">
                                                <div>
                                                    <h6 class="text-truncate "><i class="fa fa-mobile"> {{$agent->phone}}</i></h6>
                                                    <p class="d-flex"><i class="fa fa-envelope"> {{$agent->email}}</i></p>
                                                    <p class=" d-flex">
                                                            <span class="badge bg-warning">
                                                        @if($agent->role == 1)
                                                            Gestion Clients
                                                        @elseif($agent->role == 2)
                                                            Gestion Bagages
                                                        @elseif($agent->role == 3)
                                                            Gestion Colis
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
                                                                    id="SwitchCheckSizesm" @if($agent->is_active == 1) checked @endif  data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$agent->id}}">
                                                                <label class="form-check-label" for="SwitchCheckSizesm"></label>
                                                            </div>
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <a href="" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $agent->id }}"><i class="bx bx-trash me-1 text-danger"></i></a>
                                                            <a href="" style="margin-left: 8px;" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-warning" data-bs-target="#subscribeModalRole-{{ $agent->id }}"><i class="fa fa-pencil-ruler me-1 text-warning"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Modal pour la desactivation de l'agence -->
                                <!-- Static Backdrop Modal -->
                                <div class="modal fade modal-sm modal-center" id="staticBackdrop-{{$agent->id}}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" role="dialog"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">
                                                    @if($agent->is_active == 1)
                                                        <span class="text-danger">Desactivation d'agent</span>
                                                    @else
                                                        <span class="text-success">Activation d'agent</span>
                                                    @endif
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if($agent->is_active == 1)
                                                    <p class="text-danger">Etse vous sure de desactiver {{ $agent->name }}</p>
                                                @else
                                                    <p class="text-primary">Etse vous sure d'activer {{ $agent->name }}</p>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('agence.agent.update',$agent->id) }}" method="post">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                                        <input type="hidden" name="is_active" value="{{$agent->is_active}}">

                                                    <button type="reset" class="btn btn-light"
                                                        data-bs-dismiss="modal">Ferner</button>
                                                    <button type="submit"
                                                    @if($agent->is_active == 1)
                                                        class="btn btn-danger">Desactiver
                                                    @else
                                                        class="btn btn-success">Activer
                                                    @endif
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- Fin du modal pour la desactivation de l'agence -->
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
                                                            <div style="margin-left: 30px;margin-right: 30px;">
                                                                <div class="form-check form-check-left">
                                                                    <input class="form-check-input" type="radio" 
                                                                        name="role" value="1" id="formRadiosRight1client" 
                                                                            @if($agent_role->role == 1) checked @endif
                                                                        >
                                                                    <label class="form-check-label" for="formRadiosRight1client">
                                                                        Clients
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div style="margin-left: 30px;">
                                                                <div class="form-check form-check-right">
                                                                    <input class="form-check-input" type="radio" 
                                                                        name="role" value="2" id="formRadiosRight2bagage"
                                                                        @if($agent_role->role == 2) checked @endif
                                                                        >
                                                                    <label class="form-check-label" for="formRadiosRight2bagage">
                                                                        Bagages
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div style="margin-left: 30px;">
                                                                <div class="form-check form-check-right">
                                                                    <input class="form-check-input" type="radio" 
                                                                        name="role" value="3" id="formRadiosRight2colis"
                                                                        @if($agent_role->role == 3) checked @endif
                                                                        >
                                                                    <label class="form-check-label" for="formRadiosRight2colis">
                                                                        Colis
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </p>

                                                    <button type="submit" class="btn btn-success btn-xs" style="margin-left: 70px;margin-right:20px;"> Oui je veux bien </button> 
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
                                                <div class="mb-3 row">
                                                    <label class="form-label">Selectionner une siege</label>
                                                    <div class="col-md-12">
                                                        <select class="form-select" class="form-control @error('siege') is-invalid @enderror" name="siege" required autocomplete="siege" required>
                                                            @foreach($sieges as $siege)
                                                                <option value="{{ $siege->id }}">{{$siege->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('siege')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <p class="text-muted font-size-14 mb-4">
                                                    <label class="form-label">Assigner un role</label>
                                                    <div class="d-flex text-center">
                                                        <div style="margin-left: 30px;margin-right: 30px;">
                                                            <div class="form-check form-check-left">
                                                                <input class="form-check-input" type="radio" 
                                                                    name="role" value="1" id="formRadiosRight1client">
                                                                <label class="form-check-label" for="formRadiosRight1client">
                                                                    Clients
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div style="margin-left: 30px;">
                                                            <div class="form-check form-check-right">
                                                                <input class="form-check-input" type="radio" 
                                                                    name="role" value="2" id="formRadiosRight2bagage">
                                                                <label class="form-check-label" for="formRadiosRight2bagage">
                                                                    Bagages
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div style="margin-left: 30px;">
                                                            <div class="form-check form-check-right">
                                                                <input class="form-check-input" type="radio" 
                                                                    name="role" value="3" id="formRadiosRight2colis">
                                                                <label class="form-check-label" for="formRadiosRight2colis">
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