@extends('admin.layouts.app')
@section('headsection')
<link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endsection

@section('main-content')

            <div class="page-content">
                <div class="container-fluid">

                      <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Bagages</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary text-white">Ajouter des colis</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-xl-12">
                                <p class="text-muted mb-2 text-center font-size-15">Auteur des colis {{ $coli->name }} : {{ $coli->phone }}</p>
                            </div>
                           
                            <div class="col-xl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-middle mb-0 table-nowrap">
                                                
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Images</th>
                                                        <th>Nom & Detail</th>
                                                        <th>Nom Recveveur</th>
                                                        <th>Phone Receveur</th>
                                                        <th>Ville</th>
                                                        <th>Prix</th>
                                                        <th colspan="2">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($coli->coli_clients as $bag)
                                                    <tr>
                                                        <td>
                                                            <img src="{{Storage::url($bag->image)}}" alt="product-img"
                                                                title="product-img" class="avatar-md" />
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$bag->name}}</a></h5>
                                                            <p class="mb-0">{{$bag->detail}} : <span class="fw-medium">Maroon</span></p>
                                                        </td>
                                                        <td class="text-center">
                                                            {{$bag->name_recept}}
                                                        </td>
                                                        <td class="text-center">
                                                            {{$bag->phone_recept}}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $bag->ville->name }}
                                                        </td>
                                                        <td>
                                                            {{$bag->prix}} f
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon text-primary" data-bs-toggle="modal" data-bs-target="#EditBagage-{{$bag->id}}"> <i class="bx bx-edit font-size-18"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon text-primary" data-bs-toggle="modal" data-bs-target="#ColiRecue-{{$bag->id}}"> <i class="bx bx-check font-size-18"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon text-danger" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalBag-{{ $bag->id }}"> <i class="mdi mdi-trash-can font-size-18"></i></a>
                                                            <div class="modal modal-xs fade" id="subscribeModalBag-{{ $bag->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-xs">
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
                                                                                        <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer {{ $bag->name }}</p>

                                                                                        <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                                                            <form method="post" action="{{ route('agent.colis.delete',$bag->id) }}"  style="display:flex;text-align:center;width:100%;">
                                                                                                <input type="hidden" name="colId" value="{{ $bag->colie->id }}">
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
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <a href="{{ route('agent.colis.index') }}" class="btn btn-secondary">
                                                    <i class="mdi mdi-arrow-left me-1"></i> Retoure </a>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                 <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Order Summary</h4>

                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Quantite :</td>
                                                        <td>{{ $coli->coli_clients->count() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total :</th>
                                                        <th>{{$coli->prix_total}} f</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                         <div class="row mt-4">
                                            <div class="col-sm-12">
                                                <div class="text-sm-end mt-2 mt-sm-0">
                                                    <a href="" class="btn btn-success btn-block" style="width: 100%;">
                                                        <i class="mdi mdi-cart-arrow-right me-1"></i> Payer </a>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                        <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
                <!-- End Page-content -->

                <!-- Modal -->
               
                


                @foreach($coli->coli_clients as $clientColi)
                 <!-- Static Backdrop Modal de l'ajout -->
                <div class="modal fade" id="EditBagage-{{$clientColi->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="NewClientBagageLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="NewClientBagageLabel">Modifier ce coli pour {{ $clientColi->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                <form class="custom-validation" action="{{ route('agent.colis.updateColi',$clientColi->id) }}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <input type="hidden" name="coliId" value="{{ $clientColi->colie->id }}">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Image</label>
                                                    <input type="file" class="form-control"  id="image" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image"
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
                                                        <input data-parsley-type="text" type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $clientColi->name }}" autocomplete="name"
                                                            required placeholder="" />
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Prix</label>
                                                    <div>
                                                        <input data-parsley-type="number" type="number" id="prix" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix')  ?? $clientColi->prix }}" autocomplete="prix"
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
                                                                        <option value="{{ $ville->id }}" @if($ville->id == $clientColi->ville_id) selected @endif >{{$ville->name}}</option>
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
                                                        <textarea required id="desc" class="form-control @error('desc') is-invalid @enderror" name="desc" value="{{ old('desc') }}" autocomplete="desc" class="form-control" rows="3">{{ $clientColi->detail }}</textarea>
                                                            @error('desc')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Prenom et nom du recepteur</label>
                                                    <input type="text" id="name_recept" class="form-control @error('name_recept') is-invalid @enderror" name="name_recept" value="{{ old('name_recept')  ?? $clientColi->name_recept }}" required autocomplete="name_recept"
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
                                                        <input data-parsley-type="number" type="number" id="phone_recept" class="form-control @error('phone_recept') is-invalid @enderror" name="phone_recept" value="{{ old('phone_recept') ?? $clientColi->phone_recept }}" autocomplete="phone_recept"
                                                            required placeholder="" />
                                                            @error('phone_recept')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
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

                 <!-- Static Backdrop Modal de l'ajout -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="NewClientBagageLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title" id="NewClientBagageLabel">Ajouter des colis pour {{ $coli->name }}</h5>
                                
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    <form class="custom-validation" action="{{ route('agent.colis.post') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="clientId" value="{{ $coli->id }}">
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
                                                    <label class="form-label">Prix</label>
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



@endsection


@section('footersection')
<script src="{{asset('admin/assets/js/table.js')}}"></script>
 <!-- Bootrstrap touchspin -->
<script src="{{asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>

<script src="{{asset('admin/assets/js/pages/ecommerce-cart.init.js')}}"></script>
@endsection