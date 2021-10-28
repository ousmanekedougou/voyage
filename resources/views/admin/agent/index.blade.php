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
                                <h4 class="mb-sm-0 font-size-18">Listes des agents</h4>

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
                                @foreach($siege->users as $agent)
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
                                                                    M
                                                                </span>
                                                            </div>
                                                            <!-- <h5 class="mb-1 font-size-10">{{ $agent->name }}</h5> -->
                                                            <a href="#" class="text-muted">{{$agent->phone}}</a>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-8">
                                                        <div>
                                                            <h5 class="text-truncate ">{{$agent->name}}</h5>
                                                            <a href="invoices-detail.html"
                                                                class="d-block text-primary mb-4 mb-lg-5">{{$agent->email}}</a>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item me-3">
                                                                    @if($agent->is_active == 1)
                                                                    <span class="badge bg-success"><i class="bx bxs-check-circle me-1"></i>
                                                                            Active
                                                                    </span>
                                                                    @else
                                                                    <span class="badge bg-danger"><i class="bx bxs-x-square me-1"></i>
                                                                            Desactive
                                                                    </span>
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
                                                        <form action="{{ route('admin.agent.update',$agent->id) }}" method="post">
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

                    @foreach($siege->users as $agent)
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
                                                        <form method="post" action="{{ route('admin.agent.destroy',$agent->id) }}"  style="display:flex;text-align:center;width:100%;">
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
                                    <form class="custom-validation" action="{{ route('admin.agent.store') }}" method="POST" enctype="multipart/form-data">
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

                                                <div class="mb-3">
                                                    <label class="form-label">Mot de passe de l'agent</label>
                                                    <div>
                                                        <input type="password" id="pass2"  class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" required
                                                            placeholder="Mot de passe de l'agent" />
                                                             @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                    <div class="mt-2">
                                                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password"
                                                            data-parsley-equalto="#pass2" placeholder="Confirmer le mot de passe" />
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