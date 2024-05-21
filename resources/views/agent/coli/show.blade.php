@extends('admin.layouts.app')
@section('headSection')
<link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
<link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
<style>
    .td-mobile{
        width:100%;
    }
    .btn-recept-mobile{
        margin-right:5px;
    }
    .btn-delete-mobile{
        margin-left:8px;
    }
</style>
@endsection

@section('main-content')

            <div class="page-content">
                <div class="container-fluid sectionCompteDesktope">

                      <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Colis</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary text-white"> <div class="fa fa-plus"></div> Ajouter des colis</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-xl-12">
                                <p class="mb-2 text-center font-size-15 btn bnt-block btn-light btn-xs" style="width: 100%;">Colis de {{ $coli->name }} : {{ $coli->phone }}</p>
                            </div>
                           
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-middle mb-0 table-nowrap">
                                                
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Images</th>
                                                        <th>Nom & Detail</th>
                                                        <th>Récepteur</th>
                                                        <th>Destination</th>
                                                        <th>Qts</th>
                                                        <th>Prix unitaire</th>
                                                        <th>Total</th>
                                                        <th>Status</th>
                                                        <th>Reception</th>
                                                        <th colspan="2">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($coli->coli_clients as $getColi)
                                                        @if($getColi->status == 0)
                                                            <tr>
                                                                <td>
                                                                    <img src="{{Storage::url($getColi->image)}}" alt="product-img"
                                                                        title="product-img" class="avatar-md" />
                                                                </td>
                                                                <td>
                                                                    <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$getColi->name}}</a></h5>
                                                                    <p class="mb-0">{{$getColi->detail}}</p>
                                                                </td>
                                                                <td>
                                                                    <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$getColi->name_recept}}</a></h5>
                                                                    <p class="mb-0"> {{$getColi->phone_recept}}</p>
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $getColi->ville->name }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $getColi->quantity }}
                                                                </td>
                                                                
                                                                <td>
                                                                    {{$getColi->getAmountUnitaire()}}
                                                                </td>
                                                                <td>
                                                                    {{$getColi->getAmount()}}
                                                                </td>
                                                                <td>
                                                                    @if($getColi->recepteurPay == 1)
                                                                        <span class="badge bg-info">Arriver Payer</span>
                                                                    @else
                                                                        <span class="badge bg-success">Payer</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($getColi->status == 1)
                                                                        <span class="text-success">Par
                                                                            @if($getColi->recepteur_info != null)
                                                                                {{$getColi->recepteur_info}}</span>
                                                                            @else
                                                                                {{ $getColi->name_recept }} | {{ $getColi->phone_recept  }}
                                                                            @endif
                                                                    @else
                                                                        <span class="text-warning">Colis non reçu</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($getColi->recu == 0)
                                                                        <a href="javascript:void(0);" class="action-icon text-success" data-bs-toggle="modal" data-bs-target="#ColiRecue-{{$getColi->id}}"><i class="bx bx-check font-size-18"></i></a>
                                                                        <a href="javascript:void(0);" class="action-icon text-primary" data-bs-toggle="modal" data-bs-target="#EditBagage-{{$getColi->id}}"> <i class="bx bx-edit font-size-18"></i></a>
                                                                        <a href="javascript:void(0);" class="action-icon text-danger" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalBag-{{ $getColi->id }}"> <i class="mdi mdi-trash-can font-size-18"></i></a>
                                                                    @else
                                                                        <span class="text-success">Colis reçu</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-3">
                                                <a href="{{ route('agent.colis.index') }}" class="btn btn-secondary">
                                                    <i class="mdi mdi-arrow-left me-1"></i> Retoure </a>
                                            </div> <!-- end col -->
                                            <div class="col-lg-9">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                
                                                                <th> Quantite total : {{ $quantiteTotalColi }}</th>
                                                            
                                                                
                                                                <th>Prix total :   {{$amountTotalColi}} </th>
                                                                <th>
                                                                    <span class="btn btn-success btn-block" style="width: 100%;margin-top:-10px;">
                                                                    <i class="mdi mdi-cart-arrow-right me-1"></i> Payer </span>
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- end row -->

                </div> <!-- container-fluid -->

                <div class="table-responsive sectionCompteMobile">
                    <ul class="list-unstyled chat-list">
                        <li class="mb-4">
                            <div class="media">
                                <div class="align-self-center">
                                    <div class="align-self-center me-3">
                                        <img src="
                                            @if($coli->image != Null)
                                                {{Storage::url($coli->image)}}
                                            @else
                                                https://ui-avatars.com/api/?name={{$coli->name}}
                                            @endif
                                            " class="rounded-circle avatar-sm" alt="">
                                    </div>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-14 mb-1">
                                        @if($coli->name == null)
                                            {{ $coli->customer->name }}
                                        @else
                                            {{ $coli->name }}
                                        @endif
                                    </h5>
                                    <p class="text-truncate mb-0">{{ $coli->siege->name }}</p>
                                </div>
                                <div class="font-size-11 button-right-siege">
                                    <span>{{ $coli->coli_clients->count() }} Coli(s)</span>

                                    <span class="badge bg-info mt-2 font-size-10" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-suitcase-rolling"></i> Ajouter</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <hr>
                    <table class="table align-middle mb-0 table-nowrap">
                        <div class="row">
                        @foreach($coli->coli_clients as $getColi)
                            @if($getColi->status == 0)
                                <tbody class="card col-lg-4">
                                    <tr>
                                        <td class="">
                                            <img src="{{asset('admin/assets/images/product/img-1.png')}}" alt="product-img"
                                                title="product-img" class="avatar-md" />
                                        </td>
                                        <td class="">
                                            <h5 class="font-size-14 text-truncate">{{ $getColi->name }}</h5>
                                            @if($getColi->status == 0)
                                                <span class="action-icon badge bg-success btn-recept-mobile" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#ColiRecue-{{ $getColi->id }}"> <i class="@if($getColi->recepteurPay) mdi mdi-cart-arrow-right me-1 @else bx bx-check font-size-11 @endif"></i>@if($getColi->recepteurPay == 1)Payer @else Valider @endif</span>
                                                <span class="action-icon badge bg-primary" data-bs-toggle="modal" data-bs-target="#EditBagage-{{$getColi->id}}"> <i class="bx bx-edit font-size-11"></i> Modifier</span>
                                                <span class="action-icon badge bg-danger btn-delete-mobile" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalBag-{{ $getColi->id }}"> <i class="mdi mdi-trash-can font-size-11"></i> Archiver</span>
                                            @else
                                                <span class="action-icon font-size-12">Reçu par {{$getColi->recepteur_info}} </span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td-mobile">Reference : </td>
                                        <td class="td-mobile text-uppercase">{{ $getColi->ville->name }}_{{$getColi->code_validation }}</td>
                                    </tr>
                                    <tr>
                                        <td class="td-mobile">Désc :</td>
                                        <td class="td-mobile">
                                            {{ $getColi->detail }} 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td-mobile">Récepteur :</td>
                                        <td class="td-mobile">{{ $getColi->name_recept }} | {{ $getColi->phone_recept  }} </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="td-mobile">Ville :</td>
                                        <td class="td-mobile">{{ $getColi->ville->name }} </td>
                                    </tr>
                                    <tr>
                                        <td class="td-mobile">Quantite : </td>
                                        <td class="td-mobile">{{$getColi->quantity}}</td>
                                    </tr>
                                    <tr>
                                        <td class="td-mobile">Prix unitaire : </td>
                                        <td class="td-mobile">{{$getColi->getAmountUnitaire()}}</td>
                                    </tr>
                                    <tr>
                                        <td class="td-mobile">Prix Total: </td>
                                        <td class="td-mobile">{{$getColi->getAmount()}}</td>
                                    </tr>
                                    <tr>
                                        <th class="td-mobile">Reçu :
                                            @if($getColi->status == 1)
                                                <span class="text-success">Par
                                                    @if($getColi->recepteur_info != null)
                                                        {{$getColi->recepteur_info}}</span>
                                                    @else
                                                        {{ $getColi->name_recept }} | {{ $getColi->phone_recept  }}
                                                    @endif
                                            @else
                                                <span class="text-warning">Colis non reçu</span>
                                            @endif
                                        </th>
                                        @if($getColi->recepteurPay == 1)
                                            <td class="td-mobile">
                                                <span class="badge bg-info">Arriver Payer</span>
                                            </td>
                                        @endif
                                    </tr>
                                    
                                </tbody>
                            @endif
                        @endforeach
                        </div>
                    </table>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Résumé de la reservation</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Quantite total :</td>
                                                <td>{{ $quantiteTotalColi }}</td>
                                            </tr>
                                            <tr>
                                                <th>Prix total de tous les bagage  : {{$amountTotalColi}} CFA </th>
                                                <th></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                                    <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <div class="text-sm-end mt-2 mt-sm-0">
                                            <span class="btn btn-success btn-block" style="width: 100%;">
                                                <i class="mdi mdi-cart-arrow-right me-1"></i> Payer 
                                            </span>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row-->
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    
                </div>
            </div>
                <!-- End Page-content -->

                <!-- Modal -->


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
                                                    <label class="form-label">Quantite </label>
                                                    <div>
                                                        <input data-parsley-type="number" type="number" id="quantity" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" autocomplete="quantity"
                                                            required placeholder="" />
                                                            @error('quantity')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Prix Unitaire</label>
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

                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="formCheck1" value="1" name="arriver">
                                                    <label class="form-check-label" for="formCheck1">
                                                        Arriver payer
                                                    </label>
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
                                                        <label class="form-label">Quantite </label>
                                                        <div>
                                                            <input data-parsley-type="number" type="number" id="quantity" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') ?? $clientColi->quantity }}" autocomplete="quantity"
                                                                required placeholder="" />
                                                                @error('quantity')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Prix Unitaire</label>
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

                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck-{{ $clientColi->id }}" value="1" name="arriver" @if($clientColi->recepteurPay == 1) checked @endif>
                                                        <label class="form-check-label" for="formCheck-{{ $clientColi->id }}">
                                                            Arriver payer
                                                        </label>
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

                 
                <!-- Modal de la reception colis -->
                @foreach($coli->coli_clients as $colirecue)

                    <div class="modal modal-xs fade" id="ColiRecue-{{ $colirecue->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xs">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="NewClientBagageLabel">Reception du colis de {{ $colirecue->colie->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="custom-validation" action="{{ route('agent.colis.reception',$colirecue->id) }}" method="POST">
                                        @csrf
                                        {{method_field('PUT')}}
                                        <div class="row">
                                            <div class="col-xl-12">

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

                                                <div class="mb-3">
                                                    <label class="form-label">Code de reference du colis</label>
                                                    <div>
                                                        <input data-parsley-type="number" type="number" id="code_ref" class="form-control @error('code_ref') is-invalid @enderror" name="code_ref" value="{{ old('code_ref') }}" autocomplete="code_ref"
                                                            required placeholder="" />
                                                            @error('code_ref')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                @if($colirecue->recepteurPay == 1)
                                                    <div class="mb-3">
                                                        <label class="d-block mb-3">Canal de paiement :</label>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input @error('canal') is-invalid @enderror" type="radio" name="canal" id="inlineRadioA-{{ $colirecue->id }}" value="1">
                                                            <label class="form-check-label" for="inlineRadioA-{{ $colirecue->id }}">Wave</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input @error('canal') is-invalid @enderror" type="radio" name="canal" id="inlineRadioB-{{ $colirecue->id }}" value="2">
                                                            <label class="form-check-label" for="inlineRadioB-{{ $colirecue->id }}">Orange Money</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input @error('canal') is-invalid @enderror" type="radio" name="canal" id="inlineRadioC-{{ $colirecue->id }}" value="3">
                                                            <label class="form-check-label" for="inlineRadioC-{{ $colirecue->id }}">Liquide</label>
                                                        </div>
                                                        @error('canal')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror                                                          
                                                    </div>
                                                @endif
                                                

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
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

                <!-- Modale de la suppression colis -->
                @foreach($coli->coli_clients as $deletecoli)
                    <div class="modal modal-xs fade" id="subscribeModalBag-{{ $deletecoli->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                                <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer {{ $deletecoli->name }}</p>

                                                <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                    <form method="post" action="{{ route('agent.colis.delete',$deletecoli->id) }}"  style="display:flex;text-align:center;width:100%;">
                                                        <input type="hidden" name="colId" value="{{ $coli->id }}">
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
                @endforeach



@endsection


@section('footersection')
<script src="{{asset('admin/assets/js/table.js')}}"></script>
 <!-- Bootrstrap touchspin -->
<script src="{{asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>

<script src="{{asset('admin/assets/js/pages/ecommerce-cart.init.js')}}"></script>
@endsection