@extends('admin.layouts.app')

@section('headsection')
   <!-- Responsive Table css -->
    <link href="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Liste des itineraires</h4>
                                     <div class="text-sm-end">
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary text-white button_ajout_client"
                                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 "><i
                                                            class="mdi mdi-plus me-1"></i>Ajouter un itineraire</button>
                                                </div> 
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                        @foreach($itineraires as $itineraire)
                         <div class="col-xl-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="avatar-md me-4">
                                            <span class="avatar-title rounded-circle bg-light text-muted">
                                                <i class="fa fa-road" style="font-size: 50px;"></i>
                                            </span>
                                        </div>

                                        <div class="media-body overflow-hidden">
                                            <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">{{$itineraire->name}}</a></h5>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 border-top text-center">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item me-2">
                                           <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-primary" data-bs-target="#staticBackdropprenicpaleVille-{{$itineraire->id}}"><i class="fas fa-building mt-1 font-size-18"></i></a>
                                        </li>
                                        <li class="list-inline-item me-2">
                                           <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-primary" data-bs-target="#staticBackdropedititineraire-{{$itineraire->id}}"><i class="bx bx-edit mt-1 font-size-18"></i></a>
                                        </li>
                                        <li class="list-inline-item me-2">
                                           <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-primary" data-bs-target="#staticBackdropAjouteVille-{{$itineraire->id}}"><i class="fas fa-plus mt-1 font-size-18"></i></a>
                                        </li>
                                        <li class="list-inline-item me-2">
                                            <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalitineraire-{{ $itineraire->id }}"><i class="mdi mdi-delete font-size-18"></i></a>
                                            <div class="modal modal-xs fade" id="subscribeModalitineraire-{{ $itineraire->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                                                        <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer ce itineraire</p>

                                                                        <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                                            <form method="post" action="{{ route('agent.itineraire.destroy',$itineraire->id) }}"  style="display:flex;text-align:center;width:100%;">
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
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                         {{$itineraires->links()}}
                    </div>

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Modal de la modification -->
                @foreach($itineraires as $edit_itineraire)
                    <div class="modal fade" id="staticBackdropedititineraire-{{$edit_itineraire->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modifier l'itineraire {{ $edit_itineraire->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <p>
                                            <form class="custom-validation" action="{{ route('agent.itineraire.update',$edit_itineraire->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                {{Method_field('PUT')}}
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nom de l'itineraire</label>
                                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $edit_itineraire->name}}" required autocomplete="name"
                                                                placeholder="Nom de l'itineraire" />
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                            Enregistrer cette itineraire
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
                  @foreach($itineraires as $itineraire_ville)
                    <div class="modal fade" id="staticBackdropprenicpaleVille-{{$itineraire_ville->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Villes de {{ $itineraire_ville->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th data-priority="1">Nom de la ville</th>
                                                            <th data-priority="3">Prix</th>
                                                            <th data-priority="1">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($itineraire_ville->villes as $ville)
                                                            <tr>
                                                                <th> {{$ville->name}} </th>
                                                                <td> {{ $ville->amount }} f</td>
                                                                <td>
                                                                    <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-primary" data-bs-target="#staticBackdropeditville-{{$ville->id}}"><i class="bx bx-edit mt-1 font-size-18"></i></a>
                                                                    <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalville-{{ $ville->id }}"><i class="mdi mdi-delete font-size-18"></i></a>

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
                    </div>
                 @endforeach
                <!-- Fin du modal de la liste des ville -->
                


            <!-- Static Backdrop Modal de l'ajout -->
             
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Ajouter un itineraire</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                        <form class="custom-validation" action="{{ route('agent.itineraire.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nom de l'itineraire</label>
                                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                                            placeholder="Nom de l'itineraire" />
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label mb-3">Choisissez les jours de voyage de cette ittineraire</label>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-check form-check-primary mb-3">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="formCheckcolor0" name="jour[]" value="0">
                                                                    <label class="form-check-label" for="formCheckcolor0">
                                                                        Dimanche
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">    
                                                                <div class="form-check form-check-success mb-3">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="formCheckcolor1" name="jour[]" value="1" >
                                                                    <label class="form-check-label" for="formCheckcolor1">
                                                                        Lundi
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-check form-check-info mb-3">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="formCheckcolor2" name="jour[]" value="2" >
                                                                    <label class="form-check-label" for="formCheckcolor2">
                                                                        Mardi
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-check form-check-warning mb-3">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="formCheckcolor3" name="jour[]" value="3" >
                                                                    <label class="form-check-label" for="formCheckcolor3">
                                                                        Mercredi
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-3">
                                                                <div class="form-check form-check-danger mb-3">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="formCheckcolor4" name="jour[]" value="4" >
                                                                    <label class="form-check-label" for="formCheckcolor4">
                                                                        Jeudi
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-check form-check-pink mb-3">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="formCheckcolor5" name="jour[]" value="5" >
                                                                    <label class="form-check-label" for="formCheckcolor5">
                                                                        Vendredi
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-check form-check-secondary mb-3">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="formCheckcolor6" name="jour[]" value="6" >
                                                                    <label class="form-check-label" for="formCheckcolor6">
                                                                        Samdi
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                        Enregistrer Cette itineraire
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


            <!-- _____________________________________________________________________ -->

            <!-- Modal de l'ajout des ville -->
            @foreach($itineraires as $itineraire_ville_iti)
                <div class="modal fade" id="staticBackdropAjouteVille-{{$itineraire_ville_iti->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content text-white">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="staticBackdropLabel">Ajouter une ville pour {{ $itineraire_ville_iti->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                        <form class="custom-validation" action="{{ route('agent.ville.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $itineraire_ville_iti->id }}" name="itineraire">
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
            @endforeach
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
                <div class="modal modal-xs fade" id="subscribeModalville-{{ $ville->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                            <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer ce ville</p>

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


@section('footersection')
    <!-- Responsive Table js -->
    <script src="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script>

    <!-- Init js -->
    <script src="{{asset('admin/assets/js/pages/table-responsive.init.js')}}"></script>
     <script src="{{asset('admin/assets/js/table.js')}}"></script>
@endsection