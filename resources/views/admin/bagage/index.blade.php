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
                                    <h4 class="mb-sm-0 font-size-18">Bagages</h4>
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
                                                    <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2" data-bs-toggle="modal" data-bs-target="#NewClientBagage"><i class="fa fa-luggage-cart"></i> Ajouter des bagages</button>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-check">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="align-middle">Prenom et Nom</th>
                                                        <th class="align-middle">Telephone</th>
                                                        <th class="align-middle">Ville</th>
                                                        <th class="align-middle">Bagages</th>
                                                        <th class="align-middle">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($clients as $client)
                                                    <tr>
                                                        <td>{{ $client->client_name }}</td>
                                                        <td>
                                                            {{$client->client_phone}}
                                                        </td>
                                                        <td>
                                                            {{$client->client_ville}}
                                                        </td>
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal-{{$client->id}}">
                                                                <i class="fa fa-eye font-size-10"> Bagages</i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <a href="javascript:void(0);" class="text-primary" data-bs-toggle="modal" data-bs-target="#AddBagage-{{$client->id}}"><i class="fa fa-suitcase-rolling font-size-18"></i></a>
                                                               
                                                                    <a href="{{ route('admin.bagage.show',$client->id) }}" class="text-success"><i class="fa fa-print font-size-18"></i></a>
                                                               
                                                                <a href="javascript:void(0);" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $client->id }}"><i class="fa fa-trash font-size-18"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                     <!-- Modal pour la suppression de l'agence -->
                                                        <div class="modal modal-md fade" id="subscribeModalagence-{{ $client->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                                                                    <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer {{$client->client_name}}</p>

                                                                                    <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                                                        <form method="post" action="{{ route('admin.bagage.destroy',$client->id) }}"  style="display:flex;text-align:center;width:100%;">
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
                                                    <!-- Fin du modal pour la suppression de l'agence -->
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                       {{$clients->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
                <!-- End Page-content -->

                <!-- Modal -->
                
                @foreach($clients as $client_bag)
                    <div class="modal fade orderdetailsModal-{{ $client_bag->id }}" tabindex="-1" role="dialog" aria-labelledby="orderdetailsModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="orderdetailsModalLabel">Bagages Client</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-2">Prenom et Nom: <span class="text-primary">{{ $client_bag->client_name }}</span></p>
                                    <p class="mb-2">Telephone: <span class="text-primary">{{ $client_bag->client_phone }}</span></p>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap">
                                            <thead>
                                                <tr>
                                                <th scope="col">Images</th>
                                                <th scope="col">Nom et Description</th>
                                                <th scope="col">Prix</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($client_bag->bagage_clients as $bag)
                                                    <tr>
                                                        <th scope="row">
                                                            <div>
                                                                <img src=" {{ Storage::url($bag->image) }}" alt="" class="avatar-sm">
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div>
                                                                <h5 class="text-truncate font-size-14">{{ $bag->name }}</h5>
                                                                <p class="text-muted mb-0">{{ $bag->desc }}</p>
                                                            </div>
                                                        </td>
                                                        <td>{{ $bag->prix }} f</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                        <td colspan="2" class="text-center">
                                                            @foreach($clients as $client)
                                                            <h4 class="m-0 text-left">Total: {{$client->prix_total}} f</h4>
                                                            @endforeach
                                                        </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- end modal -->
                

                <!-- Static Backdrop Modal de l'ajout -->
                <div class="modal fade" id="NewClientBagage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="NewClientBagageLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="NewClientBagageLabel">Ajouter ce client</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                    <form class="custom-validation" action="{{ route('admin.bagage.store') }}" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validation()">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-12">
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


                @foreach($clients as $client_bagage)
                 <!-- Static Backdrop Modal de l'ajout -->
                <div class="modal fade" id="AddBagage-{{$client_bagage->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="NewClientBagageLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="NewClientBagageLabel">Ajouter des bagages pour {{ $client_bagage->client_name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                    <form class="custom-validation" action="{{ route('admin.bagage.update',$client_bagage->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            {{method_field('PUT')}}
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
                @endforeach



@endsection


@section('footersection')

@endsection