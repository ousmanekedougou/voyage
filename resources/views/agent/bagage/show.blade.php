@extends('admin.layouts.app')
@section('headsection')
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
                                    <h4 class="mb-sm-0 font-size-18">Bagages</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary text-white">Ajouter des bagages</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                        <div class="col-xl-12">
                            <p class="mb-2 text-center font-size-15 btn bnt-block btn-light btn-xs" style="width: 100%;">
                                Auteur des bagages
                                @if($client->name == null)
                                    {{ $client->customer->name }}
                                    {{ $client->customer->phone }}
                                @else
                                    {{ $client->name }}
                                    {{ $client->phone }}
                                @endif
                            </p>
                            </div>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-middle mb-0 table-nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Images</th>
                                                        <th>Nom & Details</th>
                                                        <th>Quantites</th>
                                                        <th>Prix Unitaire</th>
                                                        <th>Prix Total</th>
                                                        <th>References</th>
                                                        <th colspan="2">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($bagages as $bag)
                                                    <tr>
                                                        <td>
                                                            <img src="{{Storage::url($bag->image)}}" alt="product-img"
                                                                title="product-img" class="avatar-md" />
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$bag->name}}</a></h5>
                                                            <p class="mb-0">{{$bag->detail}} : <span class="fw-medium">Maroon</span></p>
                                                        </td>
                                                        <td>
                                                            {{$bag->quantity}}
                                                        </td>
                                                        <td>
                                                            {{$bag->getAmountUnitaire()}}
                                                        </td>
                                                        <td>
                                                            {{$bag->getAmount()}}
                                                        </td>
                                                        
                                                        <td class="text-uppercase">
                                                            {{$bag->client->ville->name}}_{{$bag->reference}}
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon text-primary" data-bs-toggle="modal" data-bs-target="#EditBagage-{{$bag->id}}"> <i class="bx bx-edit font-size-18"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon text-danger" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalBag-{{ $bag->id }}"> <i class="mdi mdi-trash-can font-size-18"></i></a>
                                                            
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-3">
                                                <a href="{{ route('agent.bagage.index') }}" class="btn btn-secondary">
                                                    <i class="mdi mdi-arrow-left me-1"></i> Retoure </a>
                                            </div> <!-- end col -->
                                            <div class="col-sm-9">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                
                                                                <th> Quantite total : {{ $quantiteTotalBagage }}</th>
                                                            
                                                                
                                                                <th>Prix total de tous les bagage :   {{$amountTotalClient}} CFA</th>
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
                                <div class="align-self-center me-3">
                                    <div class="align-self-center me-3">
                                        <img src="
                                            @if(Auth::guard('agent')->user()->agence->logo != Null)
                                                {{Storage::url(Auth::guard('agent')->user()->agence->logo)}}
                                            @else
                                                https://ui-avatars.com/api/?name={{Auth::guard('agent')->user()->agence->name}}
                                            @endif
                                            " class="rounded-circle avatar-sm" alt="">
                                    </div>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-14 mb-1" style="font-weight:600;">{{Auth::guard('agent')->user()->agence->name}}</h5>
                                    <p class="text-truncate mb-0">Siege de {{Auth::guard('agent')->user()->siege->name}}</p>
                                </div>
                                <div class="font-size-11 button-right-siege">
                                    <span>{{ $bagages->count() }} Bagage(s)</span>
                                    <span class="badge bg-info mt-2 font-size-10" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-suitcase-rolling"></i> Ajouter</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                        <span class="mb-3 font-size-14 badge badge-soft-info p-2 " style="width:100%;">
                            Bagages de
                            @if($client->name == null)
                                {{ $client->customer->name }}
                                {{ $client->customer->phone }}
                            @else
                                {{ $client->name }}
                                {{ $client->phone }}
                            @endif
                        </span>
                    <table class="table align-middle mt-3 mb-0 table-nowrap">
                        <div class="row">
                        
                        @foreach($bagages as $bag)
                            <tbody class="card col-lg-4">
                                <tr>
                                    <td class="">
                                        <img src="{{asset('admin/assets/images/product/img-1.png')}}" alt="product-img"
                                            title="product-img" class="avatar-md" />
                                    </td>
                                    <td class="">
                                        <h5 class="font-size-14 text-truncate">{{ $bag->name }}</h5><span class="action-icon badge bg-primary" data-bs-toggle="modal" data-bs-target="#EditBagage-{{$bag->id}}"> <i class="bx bx-edit font-size-11"></i> Modifier</span>
                                        <span class="action-icon badge bg-danger btn-delete-mobile" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalBag-{{ $bag->id }}"> <i class="mdi mdi-trash-can font-size-11"></i> Archiver</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-mobile">Reference : </td>
                                    <td class="td-mobile text-uppercase">{{$bag->client->ville->name}}_{{$bag->reference}}</td>
                                </tr>
                                <tr>
                                    <td class="td-mobile">Quantite : </td>
                                    <td class="td-mobile">{{$bag->quantity}}</td>
                                </tr>
                                <tr>
                                    <td class="td-mobile">Désc :</td>
                                    <td class="td-mobile">
                                        {{ $bag->detail }} 
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-mobile">Prix unitaire : </td>
                                    <td class="td-mobile">{{$bag->getAmountUnitaire()}}</td>
                                </tr>
                                <tr>
                                    <td class="td-mobile">Prix Total: </td>
                                    <td class="td-mobile">{{$bag->getAmount()}}</td>
                                </tr>
                                
                            </tbody>
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
                                                <td>{{ $quantiteTotalBagage }}</td>
                                            </tr>
                                            <tr>
                                                <th>Prix total de tous les bagage  : {{$amountTotalClient}} CFA </th>
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
               
                


                @foreach($bagages as $client_bagage)
                 <!-- Static Backdrop Modal de l'ajout -->
                <div class="modal fade" id="EditBagage-{{$client_bagage->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="NewClientBagageLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="NewClientBagageLabel">Modifier ce bagage pour {{ $client_bagage->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                    <form class="custom-validation" action="{{ route('agent.bagage.update',$client_bagage->id) }}" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="clientId" value="{{ $client_bagage->client->id }}">
                                            @csrf
                                            {{method_field('PUT')}}
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
                                                        <label class="form-label">Quantite </label>
                                                        <div>
                                                            <input data-parsley-type="number" type="number" id="quantity" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') ?? $client_bagage->quantity }}" autocomplete="quantity"
                                                                required placeholder="" />
                                                                @error('quantity')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Nom du bagage</label>
                                                        <div>
                                                            <input data-parsley-type="text" type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $client_bagage->name }}" autocomplete="name"
                                                                 placeholder="" />
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
                                                            <input data-parsley-type="number" type="number" id="prix" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') ?? $client_bagage->prix }}" autocomplete="prix"
                                                                 placeholder="" />
                                                                @error('prix')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Description</label>
                                                        <div>
                                                            <textarea  id="desc" class="form-control @error('desc') is-invalid @enderror text-left" name="desc" value="{{ old('desc') ?? $client_bagage->detail }}" autocomplete="desc" class="form-control" rows="3">
                                                                {{$client_bagage->detail}}
                                                            </textarea>
                                                                @error('desc')
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


                @foreach($bagages as $bag)

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
                                                    <form method="post" action="{{ route('agent.bagage.destroy',$bag->id) }}"  style="display:flex;text-align:center;width:100%;">
                                                        <input type="hidden" name="clientId" value="{{ $bag->client->id }}">
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

                 <!-- Static Backdrop Modal de l'ajout -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="NewClientBagageLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                @if($client->name !== null)
                                    <h5 class="modal-title" id="NewClientBagageLabel">Ajouter des bagages pour {{ $client->name }}</h5>
                                @else
                                    <h5 class="modal-title" id="NewClientBagageLabel">Ajouter des bagages pour {{ $client->customer->name }}</h5>
                                @endif
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                    <form class="custom-validation" action="{{ route('agent.bagage.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="clientId" value="{{ $client->id }}">
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
                                                        <label class="form-label">Nom du bagage</label>
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