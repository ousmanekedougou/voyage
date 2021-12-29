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
                                <h4 class="mb-sm-0 font-size-18">Liste des bus</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Customers</li>
                                    </ol>
                                </div>

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
                                            <div class="search-box me-2 mb-2 d-inline-block">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Search...">
                                                    <i class="bx bx-search-alt search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-sm-end">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary text-white"
                                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                        class="mdi mdi-plus me-1"></i>Ajouter un bus</button>
                                            </div>
                                        </div><!-- end col-->
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Numero</th>
                                                    <th>Marticule</th>
                                                    <th>Nombre de place</th>
                                                    <th>Plein</th>
                                                    <th>Itineraire</th>
                                                    <th>Date depart</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($buses as $bus)
                                                <tr>
                                                    <td>
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="customerlistcheck08">
                                                            <label class="form-check-label"
                                                                for="customerlistcheck08"></label>
                                                        </div>
                                                    </td>
                                                    <td>{{$bus->number}}</td>
                                                    <td>{{$bus->matricule}}</td>
                                                    <td>
                                                        <p class="mb-1">{{$bus->place}}</p>
                                                    </td>

                                                    <td>
                                                        @if($bus->plein == 0)
                                                            <span class="badge bg-primary font-size-12"><i class="mdi mdi-star me-1"></i>{{ $bus->place }} / {{ $bus->inscrit }}</span>
                                                        @elseif($bus->plein == 1)
                                                            <span class="badge bg-success font-size-12"><i class="mdi mdi-star me-1"></i> {{ $bus->place }} / {{ $bus->inscrit }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{$bus->itineraire->name}} <span data-bs-toggle="modal" data-bs-target="#staticBackdropVille-{{$bus->id}}" class="badge text-primary font-size-12"><i class="fas fa-building me-1"></i></span>
                                                    </td>

                                                    <td>
                                                        {{ $bus->date_depart->depart_at }}
                                                    </td>
                                                    
                                                    <td>
                                                        <div class="d-flex gap-3">

                                                            <a href="{{ route('admin.client.show',$bus->id) }}" class="text-primary"><i class="fas fa-users mt-1 font-size-18"></i></a>
                                                            <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-primary" data-bs-target="#staticBackdropeditbus-{{$bus->id}}"><i class="bx bx-edit mt-1 font-size-18"></i></a>
                                                            <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalbus-{{ $bus->id }}"><i class="mdi mdi-delete font-size-18"></i></a>
                                                            <div class="modal modal-xs fade" id="subscribeModalbus-{{ $bus->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                                                                        <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer ce bus</p>

                                                                                        <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                                                            <form method="post" action="{{ route('admin.bus.destroy',$bus->id) }}"  style="display:flex;text-align:center;width:100%;">
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
                                   {{$buses->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
                <!-- End Page-content -->

                <!-- Modal de la modification -->
                @foreach($buses as $edit_bus)
                    <div class="modal fade" id="staticBackdropeditbus-{{$edit_bus->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modifier le bus {{$edit_bus->matricule}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <p>
                                            <form class="custom-validation" action="{{ route('admin.bus.update',$edit_bus->id) }}" method="POST" enctype="multipart/form-data">
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

                                                        {{--<div class="mb-3 row">
                                                            <label class="form-label">Selectionner un status</label>
                                                            <div class="col-md-12">
                                                                <select class="form-select" class="form-control @error('status') is-invalid @enderror" name="status" required autocomplete="status" required>
                                                                        <option value="1"
                                                                            @if($edit_bus->status == 1)
                                                                            selected
                                                                            @endif
                                                                        >Va voyager</option>
                                                                        <option value="2"
                                                                             @if($edit_bus->status == 2)
                                                                            selected
                                                                            @endif
                                                                        >Ne voyage pas</option>
                                                                </select>
                                                                @error('status')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        --}}
                                                        <div class="mb-3 row">
                                                            <label class="form-label">Selectionner un itineraire</label>
                                                            <div class="col-md-12">
                                                                <select class="form-select" class="form-control @error('itineraire') is-invalid @enderror" name="itineraire" required autocomplete="itineraire" required>
                                                                        @foreach($itineraires as $itineraire)
                                                                            <option value="{{ $itineraire->id }}"
                                                                                @foreach($buses as $bus)
                                                                                    @if($bus->itineraire_id == $itineraire->id) selected @endif
                                                                                @endforeach    
                                                                            >{{ $itineraire->name }}</option>
                                                                        @endforeach
                                                                </select>
                                                                @error('itineraire')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="form-label">Selectionner une date</label>
                                                            <div class="col-md-12">
                                                                <select class="form-select" class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="date" required>
                                                                    @foreach($itineraires as $itineraire)
                                                                            <optgroup label="{{$itineraire->name}}">
                                                                                @foreach($itineraire->date_departs as $date)
                                                                                    <option value="{{ $date->id }}"> {{ $date->depart_at }}</option>
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
                @endforeach
                <!-- Fin du modal de la modification -->

               


                 <!-- Static Backdrop Modal de la liste des ville -->
                 @foreach($buses as $bus)
                    <div class="modal fade" id="staticBackdropVille-{{$bus->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Itineraire de {{ $bus->itineraire->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        @foreach($bus->itineraire->villes as $ville)
                                        <p class="bg-primary text-white mt-1 p-2 text-center">
                                           {{$ville->name}} <span class="ml-3 mr-2">  <i class="fas fa-arrow-right ml-1"></i>  {{$ville->amount}}</span> f
                                        </p>
                                        @endforeach
                                       
                                    </div>
                            </div>
                        </div>
                    </div>
                 @endforeach
                <!-- Fin du modal de la liste des ville -->
                


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
                                    <form class="custom-validation" action="{{ route('admin.bus.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12">
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

                                               
                                                {{--
                                                <div class="mb-3 row">
                                                    <label class="form-label">Selectionner un status</label>
                                                    <div class="col-md-12">
                                                        <select class="form-select" class="form-control @error('status') is-invalid @enderror" name="status" required autocomplete="status" required>
                                                                <option value="1">Va voyager</option>
                                                                <option value="2">Ne voyage pas</option>
                                                        </select>
                                                        @error('status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                --}}
                                                <div class="mb-3 row">
                                                    <label class="form-label">Selectionner un itineraire</label>
                                                    <div class="col-md-12">
                                                        <select class="form-select" class="form-control @error('itineraire') is-invalid @enderror" name="itineraire" required autocomplete="itineraire" required>
                                                                @foreach($itineraires as $itineraire)
                                                                    <option value="{{ $itineraire->id }}">{{ $itineraire->name }}</option>
                                                                @endforeach
                                                        </select>
                                                        @error('itineraire')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="form-label">Selectionner une date</label>
                                                    <div class="col-md-12">
                                                        <select class="form-select" class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="date" required>
                                                               @foreach($itineraires as $itineraire)
                                                                    <optgroup label="{{$itineraire->name}}">
                                                                        @foreach($itineraire->date_departs as $date)
                                                                            <option value="{{ $date->id }}"> {{ $date->depart_at }}</option>
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
            <!-- Fin du modal de l'ajout -->



@endsection


@section('footersection')

@endsection