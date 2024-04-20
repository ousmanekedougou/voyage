@extends('admin.layouts.app')
    @section('headSection')
        <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    @endsection
@section('main-content')

    <div class="page-content bg-white">
        <div class="tab-pane show active sectionCompteMobile" id="chat">
            <div>
                <ul class="list-unstyled chat-list">
                    <li class="mb-4">
                        <div class="media">
                            <div class="align-self-center me-3">
                                <div class="align-self-center me-3">
                                    <i class="fa fa-road" style="font-size: 25px;"></i>
                                </div>
                            </div>
                            <div class="media-body overflow-hidden">
                                <h5 class="text-truncate font-size-14 mb-1">Itineraire de {{$itineraire->name}}</h5>
                                <p class="text-truncate mb-0">Siege de {{Auth::guard('agent')->user()->siege->name}}</p>
                            </div>
                            <div class="font-size-11 button-right-siege">
                                <span> {{$villes->count()}} Ville(s)</span>
                                <span data-bs-toggle="modal" data-bs-target="#staticBackdropAjouteVille"class="mt-3 badge bg-primary font-size-11"><i class="mdi mdi-plus me-1"></i>Ajouter</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <br>
                <ul class="list-unstyled chat-list">
                    @foreach($villes as $ville)
                        <li class="mb-4" >
                            <div class="media">

                                    <div class="align-self-center me-3">
                                        <img src="https://ui-avatars.com/api/?name={{$ville->name}}" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                
                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-14 mt-2" style="font-weight:600;"> {{ $ville->name }}</h5>
                                    <p class="text-truncate mb-0"> <i class="mdi mdi-arrow-right font-size-10"></i> {{ $ville->getAmount() }}</p>
                                </div>
                                <div class="font-size-12 button-right-siege">
                                    <span class="span-chat-siege span-chat1 rounded-circle">
                                        <span  data-bs-toggle="modal" data-bs-target="#staticBackdropeditville-{{ $ville->id }}" class="text-success mr-2"><i class="mdi mdi-pencil font-size-18"></i></span>
                                        <span  data-bs-toggle="modal" data-bs-target="#subscribeModaDeletelville-{{ $ville->id }}" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></span>
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

    <!-- Modal de l'ajout des ville -->
        <div class="modal fade" id="staticBackdropAjouteVille" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-sm" role="document">
                <div class="modal-content text-white">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="staticBackdropLabel">Ajouter une ville pour {{ $itineraire->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <p>
                                <form class="custom-validation" action="{{ route('agent.ville.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $itineraire->id }}" name="itineraire">
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
    <!-- Fin du modal de l'ajout des ville -->


    <!-- Modal de modification des ville -->
    @foreach($villes as $ville)
        <div class="modal fade" id="staticBackdropeditville-{{$ville->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel-{{$ville->id}}" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-sm" role="document">
                <div class="modal-content text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel-{{$ville->id}}">Modifier de {{ $ville->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <p>
                                <form class="custom-validation" action="{{ route('agent.ville.update',$ville->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{Method_field('PUT')}}
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label">Nom de la ville</label>
                                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $ville->name}}" required autocomplete="name"
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
                                                    <input data-parsley-type="number" type="number" id="prix" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') ?? $ville->amount}}" autocomplete="prix"
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
    <!-- Fin du modal de modification des ville -->



    <!-- Modal de la suppression des villes -->
    @foreach($villes as $ville)
        <div class="modal modal-xs fade" id="subscribeModaDeletelville-{{ $ville->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                    <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer {{ $ville->name }}</p>

                                    <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                        <form method="post" action="{{ route('agent.ville.destroy',$ville->id) }}"  style="display:flex;text-align:center;width:100%;">
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
    <!-- Fin du modal de la suppression des villes -->

    


           
@endsection

@section('footerSection')

@endsection