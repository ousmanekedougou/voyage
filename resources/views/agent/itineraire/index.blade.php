@extends('admin.layouts.app')

@section('headsection')
   <link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

                <div class="page-content">
                    <div class="container-fluid sectionCompteDesktope">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Liste des itineraires</h4>
                                     <div class="text-sm-end">
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary text-white button_ajout_client"
                                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 "><i
                                                            class="mdi mdi-plus me-1"></i>Ajouter un itineraire</button>
                                                </div> 
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th style="width: 20px;">
                                                        <div class="form-check font-size-16 align-middle">
                                                            <input class="form-check-input" type="checkbox" id="transactionCheck01">
                                                            <label class="form-check-label" for="transactionCheck01"></label>
                                                        </div>
                                                    </th>
                                                    <th class="align-middle">Images</th>
                                                    <th class="align-middle">Nom de l'itineraire </th>
                                                    <th class="align-middle">Buses</th>
                                                    <th class="align-middle">Villes</th>
                                                    <th class="align-middle">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($itineraires as $itineraire)
                                                <tr>
                                                    <td>
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="transactionCheck02">
                                                            <label class="form-check-label" for="transactionCheck02"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <i class="fa fa-road font-size-20"></i>
                                                    </td>
                                                    
                                                    <td><a href="javascript: void(0);" class="text-body fw-bold">{{ $itineraire->name }}</a> </td>
                                                    <td>
                                                        <a href="{{ route('agent.bus.show',$itineraire->id) }}" class="badge badge-pill badge-soft-primary font-size-14">{{$itineraire->buses->count()}} Buse(s)</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('agent.ville.edit',$itineraire->id) }}" class="badge badge-pill badge-soft-success font-size-14">{{ $itineraire->villes->count() }} Ville(s)</span>
                                                    </td>
                                                    <td>
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item me-2">
                                                                <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-primary" data-bs-target="#staticBackdropedititineraire-{{$itineraire->id}}"><i class="bx bx-edit mt-1 font-size-18"></i></a>
                                                            </li>
                                                            <li class="list-inline-item me-3">
                                                                <a href="" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalDeleteitineraire-{{ $itineraire->id }}"><i class="mdi mdi-delete font-size-18"></i></a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table-responsive -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                {{$itineraires->links()}}
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->


                    <div class="tab-pane show active sectionCompteMobile" id="chat">
                        <div>
                                <ul class="list-unstyled chat-list">
                                    <li class="mb-4">
                                        <div class="media">
                                            <div class="align-self-center me-3">
                                                <img src="@if(Auth::guard('agent')->user()->agence->logo == '') https://ui-avatars.com/api/?name={{Auth::guard('agent')->user()->agence->name}} @else {{(Storage::url(Auth::guard('agent')->user()->agence->logo))}} @endif" class="rounded-circle avatar-sm" alt="">
                                            </div>
                                            <div class="media-body overflow-hidden">
                                                <h5 class="text-truncate font-size-14 mb-1">{{Auth::guard('agent')->user()->agence->name}}</h5>
                                                <p class="text-truncate mb-0">{{Auth::guard('agent')->user()->agence->slogan}}</p>
                                            </div>
                                            <div class="font-size-11 button-right-siege">
                                                <span> {{$itineraires->count()}} Itineraire(s)</span>
                                                <span data-bs-toggle="modal" data-bs-target="#staticBackdrop"class="mt-3 badge badge-pill badge-soft-success font-size-11"><i class="mdi mdi-plus me-1"></i>Ajouter</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="list-unstyled chat-list">
                                    @if(Auth::guard('agent')->user()->role == 4)
                                        <div class="text-center">
                                            <span onclick="location.href='{{route('agent.client.renoncer')}}'" class="mt-2 badge badge-pill badge-soft-primary font-size-11 mb-4"><i class="fa fa-users fa-item me-1"></i>Archives Clients</span>
                                            <span onclick="location.href='{{route('agent.bagage.index')}}'" class="mt-2 badge badge-pill badge-soft-success font-size-11 mb-4">Bagages</span>
                                            <span onclick="location.href='{{route('agent.colis.index')}}'" class="mt-2 badge badge-pill badge-soft-info font-size-11 mb-4">Colies</span>
                                        </div>
                                        @else
                                        <span onclick="location.href='{{route('agent.client.renoncer')}}'" class="mt-3 badge badge-pill badge-soft-primary font-size-11 mb-4" style="width:100%;"><i class="fa fa-users fa-item me-1"></i>Tickets annuler</span>
                                    @endif
                                    @foreach($itineraires as $itineraire)
                                        <li class="mb-3" >
                                            <div class="media">
                                                <div onclick="location.href='{{route('agent.itineraire.show',$itineraire->id)}}'" class="align-self-center me-3">
                                                    <i class="fa fa-road avatar-xs" style="font-size: 25px;"></i>
                                                </div>
                                                
                                                <div onclick="location.href='{{route('agent.itineraire.show',$itineraire->id)}}'" class="media-body overflow-hidden">
                                                    <h5 class="text-truncate font-size-14 mt-2" style="font-weight:600;">{{ $itineraire->name }}</h5>
                                                    <p class="text-truncate mb-0"> <i class="mdi mdi-arrow-right font-size-10"></i> {{ $itineraire->buses->count() }} buse(s)</p>
                                                </div>
                                                
                                                <div class="font-size-12 button-right-siege" onclick="event.preventDefault();">
                                                    <span class="span-chat-siege span-chat1">
                                                        <span class="badge badge-pill badge-soft-primary" onclick="location.href='{{ route('agent.ville.show',$itineraire->id) }}'"> {{ $itineraire->villes->count() }} Ville(s)</span>
                                                    </span>

                                                    <span class="span-chat-siege span-chat1">
                                                        <span  data-bs-toggle="modal" data-bs-target="#staticBackdropedititineraire-{{ $itineraire->id }}" class="text-success mr-2"><i class="mdi mdi-pencil font-size-18"></i></span>
                                                        <span  data-bs-toggle="modal" data-bs-target="#subscribeModalDeleteitineraire-{{ $itineraire->id }}" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                        </div>
                    </div>
                </div>
                <!-- End Page-content -->

               

             

                


            <!-- Static Backdrop Modal de l'ajout -->
             
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Ajouter un itineraire</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                        <form class="custom-validation" action="{{ route('agent.itineraire.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nom de l'itineraire</label>
                                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                                            placeholder="Nom de l'itineraire" />
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                        Enregistrer Cette itineraire
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

             <!-- Modal de la modification -->
                @foreach($itineraires as $edit_itineraire)

                    <div class="modal fade" id="staticBackdropedititineraire-{{$edit_itineraire->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modifier l'itineraire {{ $edit_itineraire->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <p>
                                            <form class="custom-validation" action="{{ route('agent.itineraire.update',$edit_itineraire->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                {{Method_field('PUT')}}
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nom de l'itineraire</label>
                                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $edit_itineraire->name}}" required autocomplete="name"
                                                                placeholder="Nom de l'itineraire" />
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                            Enregistrer cette itineraire
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
                <!-- Fin du modal de la modification -->

                @foreach($itineraires as $itineraire)

                <div class="modal modal-xs fade" id="subscribeModalDeleteitineraire-{{ $itineraire->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                            <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer ce itineraire</p>

                                            <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                <form method="post" action="{{ route('agent.itineraire.destroy',$itineraire->id) }}"  style="display:flex;text-align:center;width:100%;">
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


            <!-- _____________________________________________________________________ -->

            


           


            



@endsection


@section('footersection')
    <!-- Responsive Table js -->
    <script src="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script>

    <!-- Init js -->
    <script src="{{asset('admin/assets/js/pages/table-responsive.init.js')}}"></script>
     <script src="{{asset('admin/assets/js/table.js')}}"></script>
@endsection