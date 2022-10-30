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
                                                Administrateur
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
                                                Administrateur
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
                                        <img src="{{ Storage::url($admin->image) }}" alt="" class="img-thumbnail rounded-circle">
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


@endsection


@section('footersection')

@endsection