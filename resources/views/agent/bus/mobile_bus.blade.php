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
                                <h5 class="text-truncate font-size-14 mb-1">{{$itineraire->name}}</h5>
                                <p class="text-truncate mb-0">{{Auth::guard('agent')->user()->agence->slogan}}</p>
                            </div>
                            <div class="font-size-11 button-right-siege">
                                <span> {{$itineraire->buses->count()}} Buse(s)</span>
                                <span data-bs-toggle="modal" data-bs-target="#staticBackdrop"class="mt-3 badge bg-primary font-size-11"><i class="mdi mdi-plus me-1"></i>Ajouter</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <br>
                <ul class="list-unstyled chat-list" data-simplebar style="max-height: 410px;">
                    @foreach($itineraire->buses as $bus)
                        <li class="" >
                            <a onclick="event.preventDefault();">
                                <div class="media">
                                    <div class="align-self-center me-3" onclick="location.href='{{ route('agent.client.show',$bus->id) }}'">
                                        @if($bus->logo != Null)
                                            <img src="{{Storage::url($bus->logo)}}" class="rounded-circle avatar-xs" alt="">
                                        @else
                                            <img src="{{asset('admin/assets/images/bus_agence.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                        @endif
                                    </div>
                                    
                                    <div class="media-body overflow-hidden">
                                        <h5 class="text-truncate font-size-14 mb-1">Bus {{ $bus->matricule }}</h5>
                                        <p class="text-truncate mb-0"> <i class="mdi mdi-arrow-right font-size-10"></i> {{ $bus->number }} {{ $bus->number == 1 ? 'er' : 'em' }} Buse | {{ $bus->inscrit }} Inscrit(s)</p>
                                        <span class="span-chat-siege span-chat1">
                                            <span onclick="location.href='{{ route('agent.client.show',$bus->id) }}'"  class="badge bg-primary  mr-3"><i class="fa fa-users"></i> Tous</span>
                                            <span onclick="location.href='{{route('agent.client.jour',$bus->id)}}'"  class="badge bg-success ml-3"><i class=""></i> Aujourdhu</span>
                                        </span>
                                    </div>

                                    <div class="font-size-12 button-right-siege">
                                        <span class="span-chat-siege span-chat1 rounded-circle">
                                            {{ $bus->place }} place(s)
                                        </span>
                                        
                                        <span class="span-chat-siege span-chat1">
                                            <span  data-bs-toggle="modal" data-bs-target="#staticBackdropeditbus-{{ $bus->id }}" class="text-success mr-2"><i class="mdi mdi-pencil font-size-18"></i></span>
                                            <span  data-bs-toggle="modal" data-bs-target="#subscribeModalDeletebus-{{ $bus->id }}" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></span>
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

    


<!-- Static Backdrop Modal de l'ajout -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ajouter un bus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <p>
                        <form class="custom-validation" action="{{ route('agent.bus.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <input type="hidden" value="{{ $itineraire->id }}" name="itineraire">
                                    <div class="mb-3">
                                        <label class="form-label">Numero du bus</label>
                                        <div>
                                            <input data-parsley-type="number" type="number" id="numero" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" autocomplete="numero"
                                                required placeholder="Nombre de numero du bus" />
                                                @error('numero')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Matricule du bus</label>
                                        <input type="text" id="matricule" class="form-control @error('matricule') is-invalid @enderror" name="matricule" value="{{ old('matricule') }}" required autocomplete="matricule"
                                            placeholder="Matricule du bus" />
                                        @error('matricule')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nombre de place du bus</label>
                                        <div>
                                            <input data-parsley-type="number" type="number" id="place" class="form-control @error('place') is-invalid @enderror" name="place" value="{{ old('place') }}" autocomplete="place"
                                                required placeholder="Nombre de place du bus" />
                                                @error('place')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label for="example-time-input" class="col-md-12 col-form-label">Heure Rendez-vous</label>
                                            <div class="col-md-10">
                                                <input class="form-control @error('rv_time') is-invalid @enderror" name="rv_time" type="time" value="{{ old('rv_time') }}"
                                                    id="example-time-input">
                                            </div>
                                                @error('rv_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="example-time-input" class="col-md-12 col-form-label">Heure de depart</label>
                                            <div class="col-md-10">
                                                <input class="form-control @error('depart_time') is-invalid @enderror" type="time" name="depart_time" value="{{ old('depart_time') }}"
                                                    id="example-time-input">
                                            </div>
                                            @error('depart_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                        Enregistrer le bus
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


@foreach($itineraire->buses as $edit_bus)
    <div class="modal fade" id="staticBackdropeditbus-{{$edit_bus->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modifier le bus {{$edit_bus->matricule}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        <form class="custom-validation" action="{{ route('agent.bus.update',$edit_bus->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{Method_field('PUT')}}
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="mb-3">
                                        <label class="form-label">Numero du bus</label>
                                        <div>
                                            <input data-parsley-type="number" type="number" id="numero" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') ?? $edit_bus->number }}" autocomplete="numero"
                                                required placeholder="Nombre de numero du bus" />
                                                @error('numero')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Matricule du bus</label>
                                        <input type="text" id="matricule" class="form-control @error('matricule') is-invalid @enderror" name="matricule" value="{{ old('matricule') ?? $edit_bus->matricule}}" required autocomplete="matricule"
                                            placeholder="Matricule du bus" />
                                        @error('matricule')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nombre de place du bus</label>
                                        <div>
                                            <input data-parsley-type="number" type="number" id="place" class="form-control @error('place') is-invalid @enderror" name="place" value="{{ old('place') ?? $edit_bus->place}}" autocomplete="place"
                                                required placeholder="Nombre de place du bus" />
                                                @error('place')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label for="example-time-input" class="col-md-12 col-form-label">Heure Rendez-vous</label>
                                            <div class="col-md-10">
                                                <input class="form-control @error('rv_time') is-invalid @enderror" name="rv_time" type="time" value="{{old('rv_time') ?? $edit_bus->heure_rv}}"
                                                    id="example-time-input">
                                            </div>
                                                @error('rv_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="example-time-input" class="col-md-12 col-form-label">Heure de depart</label>
                                            <div class="col-md-10">
                                                <input class="form-control @error('depart_time') is-invalid @enderror" type="time" name="depart_time" value="{{old('depart_time') ?? $edit_bus->heure_depart}}"
                                                    id="example-time-input">
                                            </div>
                                                @error('depart_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                        Enregistrer le bus
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

<!-- Modale de suppression -->
@foreach($itineraire->buses as $bus)
<div class="modal modal-xs fade" id="subscribeModalDeletebus-{{ $bus->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                            <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer le bus {{$bus->matricule}}</p>

                            <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                <form method="post" action="{{ route('agent.bus.destroy',$bus->id) }}"  style="display:flex;text-align:center;width:100%;">
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

<!-- Fin du modal de suppression -->



@endsection

@section('footerSection')

@endsection