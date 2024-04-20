@extends('admin.layouts.app')

@section('headsection')
<link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Liste des villes pour {{ $itineraire->name }}</h4>
                                    <div class="text-sm-end">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropAjouteVille" class="btn btn-primary text-white button_ajout_client"
                                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 "><i
                                                        class="mdi mdi-plus me-1"></i>Ajouter une ville</button>
                                            </div> 
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Villes</th>
                                                    <th>Prix du ticket</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($villes as $ville)
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
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
                <!-- End Page-content -->

<!-- Modal de l'ajout des ville -->
    <div class="modal fade" id="staticBackdropAjouteVille" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-sm" role="document">
            <div class="modal-content text-white">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Ajouter une ville pour {{ $itineraire->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <p>
                            <form class="custom-validation" action="{{ route('agent.ville.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $itineraire->id }}" name="itineraire">
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
<!-- Fin du modal de l'ajout des ville -->

 <!-- Modal de modification des ville -->
 @foreach($villes as $ville)
    <div class="modal fade" id="staticBackdropeditville-{{$ville->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel-{{$ville->id}}" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-sm" role="document">
            <div class="modal-content text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel-{{$ville->id}}">Modifier de {{ $ville->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <p>
                            <form class="custom-validation" action="{{ route('agent.ville.update',$ville->id) }}" method="POST" enctype="multipart/form-data">
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
                                <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer cette ville</p>

                                <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                    <form method="post" action="{{ route('agent.ville.destroy',$ville->id) }}"  style="display:flex;text-align:center;width:100%;">
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
 <script src="{{asset('admin/assets/js/table.js')}}"></script>
@endsection