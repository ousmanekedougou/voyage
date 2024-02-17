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
                                <h4 class="mb-sm-0 font-size-18">Partenaires</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active" style="float:right;"> <button type="button" class="btn btn-success btn-rounded waves-effect waves-light btn-xs" data-bs-toggle="modal" data-bs-target=".orderdetailsModal"><i class="mdi mdi-plus me-1"></i> Ajouter</button></li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        @foreach($admins as $admin)
                            <div class="col-xl-3 col-sm-6">
                                <div class="card text-center @if($admin->is_active == 0) bg-danger @endif">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="client-images">
                                                <img src="{{ Storage::url($admin->logo) }}" alt="client-img"
                                                    class="mx-auto img-fluid d-block">
                                            </div>
                                        </div>
                                        <h5 class="font-size-15 mb-1"><a href="{{ $admin->lien }}" class="text-dark">{{$admin->name}}</a></h5>
                                        <p class="text-muted">{{$admin->email}}</p>

                                        <div>
                                            <a href="" class="badge bg-success font-size-11 m-1">{{$admin->phone}}</a>
                                            <a href="#" class="badge bg-primary font-size-11 m-1">{{$admin->adress}}</a>
                                            <!-- <a href="#" class="badge bg-primary font-size-11 m-1">2 + more</a> -->
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            <div class="flex-fill">
                                                <a data-bs-toggle="modal" data-bs-target=".orderdetailsModal-{{$admin->id}}" class="text-primary"><i class="bx bx-edit-alt "></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a data-bs-toggle="modal" data-bs-target=".orderdetailsModalModification-{{$admin->id}}" class="text-success"><i class="bx bx-edit"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger @if($admin->is_active == 0) text-white @endif" data-bs-target="#subscribeModalAdmin-{{ $admin->id }}"><i class="bx bx-trash"></i></a>

                                                <div class="modal modal-xs fade" id="subscribeModalAdmin-{{ $admin->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                                                            <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer ce partenaire</p>

                                                                            <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                                                <form method="post" action="{{ route('admin.partenaire.destroy',$admin->id) }}"  style="display:flex;text-align:center;width:100%;">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->



                  <!-- Modal -->
                <div class="modal fade orderdetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderdetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderdetailsModalLabel">Ajouter un partenaire</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                             <form action="{{ route('admin.partenaire.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name">Nom complet * </label>
                                        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="manufacturerbrand">adresse email * </label>
                                        <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="manufacturerbrand">Numero Telephone * </label>
                                        <input id="phone" name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required autocomplete="phone">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="manufacturerbrand">Adresse * </label>
                                        <input id="adress" name="adress" type="adress" class="form-control @error('adress') is-invalid @enderror" value="{{ old('adress') }}" required autocomplete="adress">
                                        @error('adress')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="lien">Lien du site * </label>
                                        <input id="lien" name="lien" type="text" class="form-control @error('lien') is-invalid @enderror"  value="{{ old('lien') }}" required autocomplete="lien">
                                        @error('lien')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="logo">Logo du partenaire *</label>
                                            <input id="logo" name="logo" type="file" class="form-control @error('logo') is-invalid @enderror" value="{{ old('logo') }}" required autocomplete="logo">
                                        @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Enregistre</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                             </form>
                        </div>
                    </div>
                </div>
                <!-- end modal -->


                <!-- Modal de la modification du partenaire -->
                 @foreach($admins as $admin)
                    <div class="modal fade orderdetailsModalModification-{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="orderdetailsModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="orderdetailsModalLabel">Ajouter un partenaire</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.partenaire.update',$admin->id) }}" method="post" enctype="multipart/form-data">
                                     {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <input type="hidden" name="hidden" value="1">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name">Nom complet * </label>
                                            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') ?? $admin->name }}" required autocomplete="name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="manufacturerbrand">adresse email * </label>
                                            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $admin->email }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="manufacturerbrand">Numero Telephone * </label>
                                            <input id="phone" name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?? $admin->phone }}" required autocomplete="phone">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="manufacturerbrand">Adresse * </label>
                                            <input id="adress" name="adress" type="adress" class="form-control @error('adress') is-invalid @enderror" value="{{ old('adress') ?? $admin->address }}" required autocomplete="adress">
                                            @error('adress')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="lien">Lien du site * </label>
                                            <input id="lien" name="lien" type="text" class="form-control @error('lien') is-invalid @enderror"  value="{{ old('lien') ?? $admin->lien }}" required autocomplete="lien">
                                            @error('lien')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="logo">Logo du partenaire *</label>
                                                <input id="logo" name="logo" type="file" class="form-control @error('logo') is-invalid @enderror" value="{{ old('logo') }}" required autocomplete="logo">
                                            @error('logo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Enregistre</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- end modal du modal de la modification du partenaire-->


                <!-- Modal de l'activation du partenaire-->
                @foreach($admins as $admin)
                    <div class="modal fade orderdetailsModal-{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="orderdetailsModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="orderdetailsModalLabel">Modifier le status de votre partenaire {{ $admin->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                                          
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <img class="rounded-circle avatar-sm" src="{{ Storage::url($admin->logo) }}" alt="">
                                        </div>
                                        <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">{{$admin->name}}</a></h5>
                                    </div>
                                </div>
                                <form action="{{ route('admin.partenaire.update',$admin->id) }}"  method="post">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                    <input type="hidden" name="hidden" value="2">
                                    <div class="modal-body ">
                                        <div class="mb-3 text-center" style="padding-left:9em;">
                                            <div class="d-flex">
                                                <div class="form-check form-radio-primary mb-3 text-center" style="margin: 0 20px;">
                                                    <input class="form-check-input @error('radio') is-invalid @enderror" type="radio"
                                                        @if($admin->is_active == 1)
                                                            checked
                                                        @endif
                                                     name="radio" required value="{{ old('radio') ?? 1 }}" id="formRadioColor1" @if($admin->status == 1) checked @endif name="radio"  >
                                                    <label class="form-check-label" for="formRadioColor1">
                                                        Activer
                                                    </label>
                                                </div>

                                                <div class="form-check form-radio-danger mb-3" style="margin: 0 20px;">
                                                    <input class="form-check-input @error('radio') is-invalid @enderror" type="radio" 
                                                        @if($admin->is_active == 0)
                                                            checked
                                                        @endif
                                                    name="radio" required value="{{ old('radio') ?? 0 }}" id="formRadioColor2" @if($admin->status == 2) checked @endif name="radio"  >
                                                    <label class="form-check-label" for="formRadioColor2">
                                                        Desactiver
                                                    </label>
                                                </div>
                                                @error('radio')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Enregietre la decision</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- end modal du modal de l'activation du patrenaire-->

@endsection


@section('footersection')

@endsection