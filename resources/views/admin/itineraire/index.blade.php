@extends('admin.layouts.app')

@section('headsection')
   <!-- Responsive Table css -->
    <link href="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Itineraires des itineraire</h4>

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
                                                            class="mdi mdi-plus me-1"></i>Ajouter un itineraire</button>
                                                </div>
                                            </div><!-- end col-->
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nom de l'itinaire</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($itineraires as $itineraire)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check font-size-16">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="customerlistcheck08">
                                                                <label class="form-check-label"
                                                                    for="customerlistcheck08"></label>
                                                            </div>
                                                        </td>
                                                        <td>{{$itineraire->name}}</td>
                                                        
                                                        <td>
                                                            <div class="d-flex gap-3">

                                                                <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-primary" data-bs-target="#staticBackdropprenicpaleVille-{{$itineraire->id}}"><i class="fas fa-building mt-1 font-size-18"></i></a>
                                                                <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-primary" data-bs-target="#staticBackdropedititineraire-{{$itineraire->id}}"><i class="bx bx-edit mt-1 font-size-18"></i></a>
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
                                                                                                <form method="post" action="{{ route('admin.itineraire.destroy',$itineraire->id) }}"  style="display:flex;text-align:center;width:100%;">
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
                                            <form class="custom-validation" action="{{ route('admin.itineraire.update',$edit_itineraire->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <h5 class="modal-title" id="staticBackdropLabel">Ville de {{ $itineraire_ville->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                <button data-bs-toggle="modal" data-bs-target="#staticBackdropAjouteVille-{{$itineraire_ville->id}}" class="btn btn-primary btn-xs">Ajouter une ville pour {{ $itineraire_ville->name }}</button>
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
                                        <form class="custom-validation" action="{{ route('admin.itineraire.store') }}" method="POST" enctype="multipart/form-data">
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
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content bg-success text-white">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Ajouter une ville pour {{ $itineraire_ville_iti->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                        <form class="custom-validation" action="{{ route('admin.ville.store') }}" method="POST" enctype="multipart/form-data">
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
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content bg-success text-white">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel-{{$ville->id}}">Modifier de {{ $ville->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                        <form class="custom-validation" action="{{ route('admin.ville.update',$ville->id) }}" method="POST" enctype="multipart/form-data">
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
                                                <form method="post" action="{{ route('admin.ville.destroy',$ville->id) }}"  style="display:flex;text-align:center;width:100%;">
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
@endsection