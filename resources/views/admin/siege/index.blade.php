@extends('admin.layouts.app')

@section('headsection')

@endsection

@section('main-content')

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Vos sieges de travail</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ajouter un siege</a></li>
                                        <!-- <li class="breadcrumb-item active">Projects List</li> -->
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table project-list-table table-nowrap align-middle table-borderless">
                                        <thead>
                                            <tr>
                                                <!-- <th scope="col" style="width: 100px">#</th> -->
                                                <th scope="col">Nom du siege</th>
                                                <th scope="col">Telephone du siege</th>
                                                <th scope="col">Adress du siege</th>
                                                <th scope="col">Agents du siege</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sieges as $siege)
                                            <tr>
                                                <!-- <td><img src="assets/images/companies/img-1.png" alt=""
                                                        class="avatar-sm"></td> -->
                                                <td>
                                                    <h5 class="text-truncate font-size-14"><a href="#"
                                                            class="text-dark">{{$siege->name}}</a></h5>
                                                    <p class="text-muted mb-0">{{$siege->email}}</p>
                                                </td>
                                                <td>{{$siege->phone}}</td>
                                                <td><span class="badge bg-success">{{$siege->adress}}</span></td>
                                                <td class="text-center">
                                                    <div class="avatar-group">
                                                        <div class="text-center">
                                                            <a href="{{ route('admin.agent.show',$siege->id) }}" class="d-inline-block">
                                                                <img src="{{asset('admin/assets/images/users/avatar-2.jpg')}}" alt=""
                                                                    class="rounded-circle avatar-xs">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle card-drop"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#" class="text-primary waves-effect waves-light " data-bs-toggle="modal" data-bs-target="#editmodalsiege-{{ $siege->id }}"><i class="bx bx-edit me-1"> Modifier</i></a>
                                                            <a class="dropdown-item" href="#" class="text-danger waves-effect waves-light" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $siege->id }}"><i class="bx bx-trash me-1"> Supprimer</i></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Modal pour la suppression de l'agence -->
                                                <div class="modal modal-md fade" id="subscribeModalagence-{{ $siege->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                                                            <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer {{$siege->name}}</p>

                                                                            <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                                                <form method="post" action="{{ route('admin.siege.destroy',$siege->id) }}"  style="display:flex;text-align:center;width:100%;">
                                                                                    {{csrf_field()}}
                                                                                    {{method_field('DELETE')}}
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
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="text-center my-3">
                                <a href="javascript:void(0);" class="text-success"><i
                                        class="bx bx-loader bx-spin font-size-18 align-middle mr-2"></i> Load more </a>
                            </div>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->




            <!-- Static Backdrop Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Ajouter un siege de votre agence</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                                <p>
                                    <form class="custom-validation" action="{{ route('admin.siege.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Nom de votre siege</label>
                                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                                        placeholder="Nom de votre siege" />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">E-Mail de votre siege</label>
                                                    <div>
                                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" parsley-type="email"
                                                            placeholder="E-Mail de votre siege" />
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Numero de telephone votre siege</label>
                                                    <div>
                                                        <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                                            required placeholder="Numero de telephone votre siege" />
                                                             @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Adresse du siege</label>
                                                    <input type="text" class="form-control" required id="adress" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" autocomplete="adress"
                                                    placeholder="Adresse du siege" />
                                                    @error('adress')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                             
                                              
                                            </div>
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                    Enregistrer le siege de votre agence
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


            @foreach($sieges as $edit_siege)
            <div class="modal fade" id="editmodalsiege-{{ $edit_siege->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Ajouter un siege de votre agence</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                                <p>
                                    <form class="custom-validation" action="{{ route('admin.siege.update',$edit_siege->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{method_field('PUT')}}
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Nom de votre siege</label>
                                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $edit_siege->name}}" required autocomplete="name"
                                                        placeholder="Nom de votre siege" />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">E-Mail de votre siege</label>
                                                    <div>
                                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $edit_siege->email}}" required autocomplete="email" parsley-type="email"
                                                            placeholder="E-Mail de votre siege" />
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Numero de telephone votre siege</label>
                                                    <div>
                                                        <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $edit_siege->phone}}" autocomplete="phone"
                                                            required placeholder="Numero de telephone votre siege" />
                                                             @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Adresse du siege</label>
                                                    <input type="text" class="form-control" required id="adress" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') ?? $edit_siege->adress}}" autocomplete="adress"
                                                    placeholder="Adresse du siege" />
                                                    @error('adress')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                             
                                              
                                            </div>
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                    Modifief le siege de votre agence
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

            



@endsection


@section('footersection')

@endsection