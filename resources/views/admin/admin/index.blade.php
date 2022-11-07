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
                                    <h4 class="mb-sm-0 font-size-18">Administrateurs</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                            <li class="breadcrumb-item active">Users Grid</li> -->
                                            <li class="breadcrumb-item active"> <button type="button" class="btn btn-success btn-rounded waves-effect waves-light btn-xs " data-bs-toggle="modal" data-bs-target=".orderdetailsModal"><i class="mdi mdi-plus me-1"></i> Ajouter un membre</button></li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            @foreach($admins as $admin)
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <img class="rounded-circle avatar-sm" src="{{ Storage::url($admin->logo) }}" alt="">
                                            </div>
                                            <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">{{$admin->name}}</a></h5>
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
                                                    <a data-bs-toggle="modal" data-bs-target=".orderdetailsModal-{{$admin->id}}" class="text-success"><i class="bx bx-edit"></i></a>
                                                </div>
                                                <div class="flex-fill">
                                                    <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalAdmin-{{ $admin->id }}"><i class="bx bx-trash"></i></a>

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
                                                                                <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer cet administrateur</p>

                                                                                <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                                                    <form method="post" action="{{ route('admin.admin.destroy',$admin->id) }}"  style="display:flex;text-align:center;width:100%;">
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

                        <div class="row">
                            <div class="col-12">
                                <div class="text-center my-3">
                                    <a href="javascript:void(0);" class="text-success"><i class="bx bx-hourglass bx-spin me-2"></i> Load more </a>
                                </div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->



                  <!-- Modal -->
                <div class="modal fade orderdetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderdetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderdetailsModalLabel">Ajouter un administrateur</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                             <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
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

                                    <!-- <div class="mb-3">
                                        <label for="image">Le status *</label>
                                        <div class="d-flex text-center">
                                            <div class="form-check form-radio-primary mb-3" style="margin: 0 20px;">
                                                <input class="form-check-input @error('image') is-invalid @enderror" type="radio" required value="{{ old('radio') ?? 1 }}" name="radio" id="formRadioColor1" >
                                                <label class="form-check-label" for="formRadioColor1">
                                                    Admin
                                                </label>
                                            </div>

                                            <div class="form-check form-radio-primary mb-3" style="margin: 0 20px;">
                                                <input class="form-check-input @error('image') is-invalid @enderror" type="radio" required value="{{ old('radio') ?? 2 }}" name="radio" id="formRadioColor2" >
                                                <label class="form-check-label" for="formRadioColor2">
                                                    Auteur
                                                </label>
                                            </div>
                                            <div class="form-check form-radio-primary mb-3" style="margin: 0 20px;">
                                                <input class="form-check-input @error('image') is-invalid @enderror" type="radio" required value="{{ old('radio') ?? 3 }}" name="radio" id="formRadioColor3" >
                                                <label class="form-check-label" for="formRadioColor3">
                                                    Editeur
                                                </label>
                                            </div>
                                            @error('radio')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                        </div>
                                    </div> -->

                                    
                                
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


                   <!-- Modal -->
                @foreach($admins as $admin)
                    <div class="modal fade orderdetailsModal-{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="orderdetailsModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="orderdetailsModalLabel">Modifier le status de {{ $admin->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                                          
                                <form action="{{ route('admin.admin.update',$admin->id) }}" method="post">
                                     {{csrf_field()}}
                                        {{method_field('PUT')}}
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <img class="rounded-circle avatar-sm" src="{{ Storage::url($admin->image) }}" alt="">
                                            </div>
                                            <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">{{$admin->name}}</a></h5>
                                            <p class="text-muted">{{$admin->email}}</p>

                                            <div>
                                                <a href="#" class="badge bg-primary font-size-11 m-1">{{$admin->phone}}</a>
                                                <a href="#" class="badge bg-primary font-size-11 m-1">{{$admin->adress}}</a>
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="image">Le status *</label>
                                                <div class="d-flex text-center pt-3" style="padding-left:10em;">
                                                    <div class="form-check form-radio-primary">
                                                        <input class="form-check-input @error('radio') is-invalid @enderror" type="radio"
                                                            @if($admin->is_active == 1 || $admin->status == 1)
                                                                checked
                                                            @endif
                                                        name="radio" required value="{{ old('radio') ?? 1 }}" id="formRadioColor1" name="radio"  >
                                                        <label class="form-check-label" for="formRadioColor1">
                                                            Activer
                                                        </label>
                                                    </div>

                                                    <div class="form-check form-radio-danger mb-3" style="margin-left: 35px;">
                                                        <input class="form-check-input @error('radio') is-invalid @enderror" type="radio" 
                                                            @if($admin->is_active == 0 || $admin->status == 2)
                                                                checked
                                                            @endif
                                                        name="radio" required value="{{ old('radio') ?? 0 }}" id="formRadioColor2" name="radio"  >
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
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- end modal -->

@endsection


@section('footersection')

@endsection