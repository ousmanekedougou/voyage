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
                            <h4 class="mb-sm-0 font-size-18">Votre Profile</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h5 class="text-primary">
                                            @if($admin->is_admin == 1)
                                                Administrateur
                                            @elseif($admin->is_admin == 2)
                                                {{$admin->agence_name}}
                                            @elseif($admin->is_admin == 3)
                                               {{$admin->agence_name}}
                                            @endif
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{ Storage::url($admin->image_agence) }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <img src="{{ Storage::url($admin->logo) }}" alt="" class="img-thumbnail rounded-circle" data-bs-toggle="modal" data-bs-target=".orderEditModal-{{ $admin->id }}">
                                        </div>
                                        <h5 class="font-size-15 text-truncate">{{$admin->name}}</h5>
                                        <p class="text-muted mb-0 text-truncate">
                                            @if($admin->is_admin == 1)
                                                Administrateur
                                            @elseif($admin->is_admin == 2)
                                                Agence
                                            @elseif($admin->is_admin == 3)
                                                Agent
                                            @endif
                                        </p>
                                    </div>

                                    <div class="col-sm-8">
                                        <div class="pt-4">
                                            {{--                                             
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5 class="font-size-15">125</h5>
                                                    <p class="text-muted mb-0">Projects</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="font-size-15">$1245</h5>
                                                    <p class="text-muted mb-0">Revenue</p>
                                                </div>
                                            </div> --}}
                                            <div class="mt-4">
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target=".orderEditModal-{{ $admin->id }}" class="btn btn-info waves-effect waves-light btn-sm">Image <i class="fa fa-camera-retro ms-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Informations Personnel</h4>
                                @if($admin->is_admin == 2)
                                <h4 class="card-title mb-4">{{ $admin->name }}</h4>
                                <p class="text-muted mb-4">{!! $admin->slogan !!}</p>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nom Complet :   </th>
                                                <td>{{$admin->name}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Mobile :</th>
                                                <td>{{$admin->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">E-mail :</th>
                                                <td>{{$admin->email}}</td>
                                            </tr>
                                            @if($admin->is_admin == 3 )
                                            <tr>
                                                <th scope="row">Siege :</th>
                                                <td>{{ $admin->siege->name }}  ({{ $admin->siege->adress }})</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>         
                    
                    <div class="col-xl-8">
                        <!-- Les premiers informations -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Modifier vos information</h4>
                                <div class="table-responsive">
                                    <form action="{{ route('admin.profil.update',Auth::guard('web')->user()->slug) }}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <div class="modal-body">
                                            <input type="hidden" name="hidden" value="1">
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
                                                <input id="phone" name="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?? $admin->phone }}" required autocomplete="phone">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-block">Enregistre</button>
                                            <button type="button" class="btn btn-secondary btn-block" data-bs-dismiss="modal">Fermer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Fin des premiers information -->

                        <!-- Des modification consernant agence -->
                        @if(Auth::user()->is_admin == 2)
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Autres information</h4>
                                <div class="table-responsive">
                                    <form action="{{ route('admin.profil.update',Auth::guard('web')->user()->slug) }}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                        <div class="modal-body">
                                                <input type="hidden" name="hidden" value="4">

                                            <div class="mb-3">
                                            <label class="form-label">Slogan de l'agence</label>
                                            <div>
                                                <textarea required id="slogan" class="form-control @error('slogan') is-invalid @enderror" name="slogan" value="{{ old('slogan') }}" autocomplete="slogan" class="form-control" rows="3"> {!! $admin->slogan !!} </textarea>
                                                    @error('slogan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Adresse de l'agence</label>
                                            <input type="text" class="form-control" required id="adress" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') ?? $admin->adress}}" autocomplete="adress"
                                                placeholder="Adresse de l'agence" />
                                                @error('adress')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>

                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-block">Enregistre</button>
                                            <button type="button" class="btn btn-secondary btn-block" data-bs-dismiss="modal">Fermer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                             <!-- Les premiers informations -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Modifier les informations de l'agence</h4>
                                <div class="table-responsive">
                                    <form action="{{ route('admin.profil.update',Auth::guard('web')->user()->slug) }}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <div class="modal-body">
                                            <input type="hidden" name="hidden" value="5">
                                            <div class="mb-3">
                                                <label for="name_agence">Nom de l'agence * </label>
                                                <input id="name_agence" name="name_agence" type="text" class="form-control @error('name_agence') is-invalid @enderror"  value="{{ old('name_agence') ?? $admin->name_agence }}" required autocomplete="name_agence">
                                                @error('name_agence')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="manufacturerbrand">adresse email de votre agence * </label>
                                                <input id="email_agence" name="email_agence" type="email_agence" class="form-control @error('email_agence') is-invalid @enderror" value="{{ old('email_agence') ?? $admin->email_agence }}" required autocomplete="email_agence">
                                                @error('email_agence')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="manufacturerbrand">Image de l'agence * </label>
                                                <input id="image_agence" name="image_agence" type="file" class="form-control @error('image_agence') is-invalid @enderror" value="{{ old('image_agence') }}"  autocomplete="image_agence" style="width: 100%;">
                                                @error('image_agence')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-block">Enregistre</button>
                                            <button type="button" class="btn btn-secondary btn-block" data-bs-dismiss="modal">Fermer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Fin des premiers information -->
                        @endif
                        <!-- Fin Des modification consernant agence -->


                            <!-- Les seconds informations -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Modifier votre mot de passe</h4>
                                <div class="table-responsive">
                                    <form action="{{ route('admin.profil.update',Auth::guard('web')->user()->slug) }}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                        <div class="modal-body">
                                                <input type="hidden" name="hidden" value="2">
                                            <div class="mb-3">
                                                <label for="manufacturerbrand">Password * </label>
                                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required autocomplete="password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="manufacturerbrand">Confirm Password * </label>
                                                <input id="password-confirm" name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password-confirm') }}" required autocomplete="password">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-block">Enregistre</button>
                                            <button type="button" class="btn btn-secondary btn-block" data-bs-dismiss="modal">Fermer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Fin des seconds information -->


                         @if($admin->is_admin == 3 && $admin->role == 1)

                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-8"><h4 class="card-title">Configuration de vos sms</h4></div>
                                        <div class="col-3 text-center">
                                            @if($sms->count() == 1)
                                                <button type="submit" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#staticBackdropSmsClient-{{$sms->id}}"> <i class="fa fa-edit"></i> Modifier</button>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-nowrap mb-0">
                                            <tbody>
                                            @if($sms->count() == 1)
                                                <tr>
                                                    <th scope="row">clientId :   </th>
                                                    <td>{{$sms->clientId}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">clientSecret :</th>
                                                    <td>{{$sms->clientSecret}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Status de rappelle sms :</th>
                                                    <td> 
                                                       
                                                        <div class="form-check form-switch mb-3" dir="ltr">
                                                            
                                                            <input class="form-check-input" type="checkbox"
                                                                id="SwitchCheckSizesm" @if($sms->status == 1) checked @endif  data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$sms->id}}">
                                                            <label class="form-check-label" for="SwitchCheckSizesm"></label>
                                                            @if($sms->status == 1)
                                                                <span class="badge bg-success"><i class="bx bxs-check-circle me-1"></i>
                                                                        Active
                                                                </span>
                                                                @else
                                                                <span class="badge bg-danger"><i class="bx bxs-x-square me-1"></i>
                                                                        Desactive
                                                                </span>
                                                            @endif
                                                        </div>
                                                        
                                                    </td>
                                                </tr>
                                                @else
                                            <tr>

                                                <td class="text-center text-default">
                                                    Vous aviez pas de donnes de configuration pour sms
                                                </td>
                                                <td class="">
                                                    <button type="submit" class="btn btn-primary btn-block text-center" data-bs-toggle="modal" data-bs-target="#staticBackdropSmsClient" style="margin-top:-10px;"> <i class="fa fa-plus"></i> Ajouter</button>
                                                </td>
                                            </tr>
                                            @endif
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <!-- end card -->
                        @endif
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->



        <div class="modal fade orderEditModal-{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="orderdetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <div class="avatar-md mx-auto mb-4">
                                <div class="avatar-title bg-light rounded-circle text-primary h1">
                                        <img src="{{ Storage::url($admin->logo) }}" alt="" class="img-thumbnail rounded-circle">
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-xl-10">
                                    <h4 class="text-primary">{{$admin->name}}</h4>
                                    <p class="text-muted font-size-14 mb-4">Vous allez modifier votre image de profile</p>

                                    <div class="input-group rounded">
                                        <form  id="update-form-{{$admin->id}}" method="post" action="{{ route('admin.profil.update',$admin->slug) }}" style="width: 100%;" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            <input type="hidden" name="hidden" value="3">
                                                <p>
                                                    <label for="image">Image</label>
                                                    <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}"  autocomplete="image" style="width: 100%;">
                                                </p>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </form>
                                        <a  href="" onclick=" if(confirm('Etes Vous sure de modifier cette image ?')){  event.preventDefault();document.getElementById('update-form-{{$admin->id}}').submit();
            
                                        }else{event.preventDefault();} " class="btn btn-primary btn-block" style="width: 100%;"><i class="fa fa-camera-retro me-2"></i>Modifier votre image profile</a>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal pour la desactivation de l'agence -->
            <!-- Static Backdrop Modal -->
            <div class="modal fade modal-md" id="staticBackdrop-{{$sms->id}}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" role="dialog"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                                @if($sms->status == 1)
                                    <span class="text-danger">Desactivation Sms</span>
                                @else
                                    <span class="text-success">Activation Sms</span>
                                @endif
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if($sms->status == 1)
                                <p class="text-danger">Etse vous sure de desactiver les rappelles des sms pour les clients</p>
                            @else
                                <p class="text-primary">Etse vous sure d'activer les rappelles des sms pour les clients</p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.profil.sendSms',$sms->id) }}" method="post">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                    <input type="hidden" name="status" value="{{$sms->status}}">

                                <button type="reset" class="btn btn-light"
                                    data-bs-dismiss="modal">Ferner</button>
                                <button type="submit"
                                @if($sms->status == 1)
                                    class="btn btn-danger">Desactiver
                                @else
                                    class="btn btn-success">Activer
                                @endif
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Fin du modal pour la desactivation de l'admin -->

        <!-- Ajout des information api -->
        <div class="modal fade" id="staticBackdropSmsClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Ajouter vos information de Sms   </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <p>
                                <form class="custom-validation" action="{{ route('admin.profil.sendApi',$sms->id) }}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <input type="hidden" name="status" value="1">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="mb-3" >
                                                <label class="form-label">clientId</label>
                                                <div>
                                                    <input data-parsley-type="number" type="text" id="clientId" class="form-control @error('clientId') is-invalid @enderror" name="clientId" value="{{ old('clientId')}}" autocomplete="clientId"
                                                        required placeholder="Numero de clientId"  />
                                                        <input type="hidden" name="indicatif" id="indicatif">
                                                        @error('clientId')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">clientSecret</label>
                                                <div>
                                                    <input data-parsley-type="number" type="text" id="clientSecret" class="form-control @error('clientSecret') is-invalid @enderror" name="clientSecret" value="{{ old('clientSecret') }}" autocomplete="clientSecret"
                                                        required placeholder="Numero de votre clientSecret" />
                                                        @error('clientSecret')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                Envoyer
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
        <!--  -->

        <!-- Modification des informatio api sms -->
        <div class="modal fade" id="staticBackdropSmsClient-{{$sms->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modifier vos information de Sms   </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <p>
                                <form class="custom-validation" action="{{ route('admin.profil.sendApi',$sms->id) }}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <input type="hidden" name="status" value="2">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="mb-3" >
                                                <label class="form-label">clientId</label>
                                                <div>
                                                    <input data-parsley-type="number" type="text" id="clientId" class="form-control @error('clientId') is-invalid @enderror" name="clientId" value="{{ old('clientId') ?? $sms->clientId }}" autocomplete="clientId"
                                                        required placeholder="Numero de clientId"  />
                                                        <input type="hidden" name="indicatif" id="indicatif">
                                                        @error('clientId')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">clientSecret</label>
                                                <div>
                                                    <input data-parsley-type="number" type="text" id="clientSecret" class="form-control @error('clientSecret') is-invalid @enderror" name="clientSecret" value="{{ old('clientSecret') ?? $sms->clientSecret }}" autocomplete="clientSecret"
                                                        required placeholder="Numero de votre clientSecret" />
                                                        @error('clientSecret')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                Envoyer
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
        <!--  -->


@endsection


@section('footersection')

@endsection