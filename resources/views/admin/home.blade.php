@extends('admin.layouts.app')
    @section('headSection')
        <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
        <style>
            .action-button{
                float:right;
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
                        <h4 class="mb-sm-0 font-size-18">Tableau de bord</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="media">
                                        <div class="me-3">
                                            <img src="{{(Storage::url($user->logo))}}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="text-muted">
                                                <p class="mb-2">Bienvenue sur TouCki</p>
                                                <h5 class="mb-1">{{$user->name}}</h5>
                                                <p class="mb-0">
                                                    @if($user->is_admin == 0)
                                                        Super Admin
                                                    @elseif($user->is_admin == 1)
                                                        Agent TouCki
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 align-self-center">
                                    <div class="text-lg-center mt-4 mt-lg-0">
                                        <div class="row">
                                            <div class="col-3">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Total Agences</p>
                                                    <h5 class="mb-0">{{$agences->count()}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Utilisateurs</p>
                                                    <h5 class="mb-0">{{$customerCount->count()}}</h5>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Abones</p>
                                                    <h5 class="mb-0">{{$newCount->count()}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

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
                                        <th class="align-middle">Nom de l'agence </th>
                                        <th class="align-middle">Email</th>
                                        <th class="align-middle">Phone</th>
                                        <th class="align-middle">Methode</th>
                                        <th class="align-middle">Orders</th>
                                        <th class="align-middle">Status compte</th>
                                        <th class="align-middle">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($agences as $agence)
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="transactionCheck02">
                                                <label class="form-check-label" for="transactionCheck02"></label>
                                            </div>
                                        </td>
                                        <td>
                                            @if($agence->image != null)
                                                <img src="{{Storage::url($agence->customer->image)}}" style="width: 40px;height:40px;" alt=""
                                                    class="avatar-sm rounded-circle header-profile-user">
                                            @else
                                                <img src="{{ asset('admin/assets/images/users/profil.jpg') }}" style="width: 40px;height:40px;" alt=""
                                                    class="avatar-sm rounded-circle header-profile-user">
                                            @endif
                                        </td>
                                        
                                        <td><a href="javascript: void(0);" class="text-body fw-bold">{{ $agence->name }}</a> </td>
                                        <td>
                                            {{ $agence->email }}
                                        </td>
                                        <td>{{ $agence->phone }}</td>
                                        <td>
                                            <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                View Details
                                            </button>
                                        </td>
                                        <td>
                                            <span class="badge badge-pill @if($agence->is_active == 1) badge-soft-success @else badge-soft-success  @endif font-size-11">@if($agence->is_active == 1) Compte Actif @else Non actif  @endif</span>
                                        </td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item me-3">
                                                    <!-- <a href=""><i class="bx bx-block me-1"></i></a> -->
                                                    <div class="form-check form-switch mb-3" dir="ltr">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="SwitchCheckSizesm" @if($agence->is_active == 1) checked @endif  data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$agence->id}}">
                                                        <label class="form-check-label" for="SwitchCheckSizesm"></label>
                                                    </div>
                                                </li>
                                                    <li class="list-inline-item me-3">
                                                    <a href="" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $agence->id }}"><i class="mdi mdi-delete font-size-18"></i></a>
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
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    {{$agences->links()}}
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="text-center my-3">
                        <a href="javascript:void(0);" class="text-success"><i class="bx bx-hourglass bx-spin me-2"></i> Load more </a>
                    </div>
                </div> <!-- end col-->
            </div>
            <!-- end row -->
         
        </div>
        <!-- container-fluid -->

        <div class="tab-pane show active sectionCompteMobile mb-4" id="chat">
            <div>
                <ul class="list-unstyled chat-list ">
                    <li class="active">
                        <a href="#">
                            <div class="media">

                                <div class="align-self-center me-3">
                                    <img src="{{asset('admin/assets/images/icone-ticke.png')}}" class="rounded-circle avatar-xs" alt="">
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-14 mb-1">Bonjour {{ Auth::guard('web')->user()->name }}</h5>
                                    <p class="text-truncate mb-0">Bienvenue sur TouCki</p>
                                </div>
                                <div class="font-size-11">Agences ({{ $agences->count() }}) </div>
                            </div>
                        </a>
                    </li>
                </ul>
            
                <ul class="list-unstyled chat-list">
                    {{-- data-simplebar style="max-height: 410px;" --}}
                    @foreach($agences as $agence)
                        <li class="">
                            <a onclick="event.preventDefault();">
                                <div class="media">
                                    <div class="align-self-center me-3">
                                        <i class="mdi mdi-arrow-right font-size-10"></i>
                                    </div>
                                    <div class="align-self-center me-3">
                                        @if($agence->logo != Null)
                                            <img src="{{Storage::url($agence->logo)}}" class="rounded-circle avatar-xs" alt="">
                                        @else
                                            <img src="{{asset('admin/assets/images/bus_agence.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                        @endif
                                    </div>
                                    
                                    <div class="media-body overflow-hidden">
                                        <h5 class="text-truncate font-size-14 mb-1">{{ $agence->name }}</h5>
                                        <p class="text-truncate mb-0"> <i class="fa fa-mobile"></i> {{ $agence->phone }}</p>
                                    </div>
                                    <div class="font-size-12 button-right-siege">
                                        <span class="span-chat-siege span-chat1 rounded-circle">
                                            <span class="badge @if($agence->is_active == 1) bg-success @else bg-danger @endif"><i class=" @if($agence->is_active == 1) bx bxs-check-circle @else bx bxs-x-square @endif"></i>
                                                @if($agence->is_active == 1)
                                                    Active
                                                @else
                                                    Desactive
                                                @endif
                                            </span>
                                        {{ $agence->sieges->count() }} Siege(s)
                                        </span>
                                        
                                        <span class="span-chat-siege span-chat1 form-check form-switch ">
                                            <input class="form-check-input mt-1 action-button" type="checkbox"
                                                id="SwitchCheckSizesm" @if($agence->is_active == 1) checked @endif  data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$agence->id}}">
                                            
                                            <span  data-bs-toggle="modal" data-bs-target="#subscribeModalagence-{{ $agence->id }}" class="text-danger action-button ml-3"><i class="mdi mdi-delete font-size-18"></i></span>
                                            <span  data-bs-toggle="modal" data-bs-target="#edit-agence-{{ $agence->id }}" class="text-success action-button mr-3"><i class="mdi mdi-eye font-size-18"></i></span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <br>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page-content -->



            @foreach($agences as $agence_edit)
            <!-- Static Backdrop Modal -->
            <div class="modal fade" id="edit-agence-{{$agence_edit->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Detail de l'agence</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                                <p>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="media">
                                                        <img src="{{Storage::url($agence_edit->image_agence)}}" alt="" class="avatar-sm me-4">

                                                        <div class="media-body overflow-hidden">
                                                            <h5 class="text-truncate font-size-15">{{$agence_edit->name}}</h5>
                                                            <p class="text-muted">{{$agence_edit->slogan}}</p>
                                                        </div>
                                                    </div>

                                                    <h5 class="font-size-15 mt-4">Informations :</h5>

                                                    <!-- <p class="text-muted">To an English person, it will seem like simplified English, as
                                                        a skeptical Cambridge friend of mine told me what Occidental is. The European
                                                        languages are members of the same family. Their separate existence is a myth.
                                                        For science, music, sport, etc,</p> -->

                                                    <div class="text-muted mt-4">
                                                        <p><i class="bx bxs-envelope me-1 text-primary me-1"></i>{{$agence_edit->email}} </p>
                                                        <p><i class="bx bxs-mobile text-primary me-1"></i>{{$agence_edit->phone}}</p>
                                                        <p><i class="bx bx-map-pin text-primary me-1"></i> {{ $agence_edit->adress }}</p>
                                                        <p><i class="bx bx-fingerprint text-primary me-1"></i> {{ $agence_edit->registre_commerce }}</p>
                                                    </div>

                                                    <div class="row task-dates">
                                                        <div class="col-sm-4 col-6">
                                                            <div class="mt-4">
                                                                <h5 class="font-size-14"><i
                                                                        class="bx bx-calendar me-1 text-primary"></i> Start Date</h5>
                                                                <p class="text-muted mb-0">08 Sept, 2019</p>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4 col-6">
                                                            <div class="mt-4">
                                                                <h5 class="font-size-14"><i
                                                                        class="bx bx-calendar-check me-1 text-primary"></i> Due Date
                                                                </h5>
                                                                <p class="text-muted mb-0">12 Oct, 2019</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </p>
                            </div>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($agences as $agence)
            <!-- Modal pour la suppression de l'agence -->
                <div class="modal modal-md fade" id="subscribeModalagence-{{ $agence->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                            <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer {{$agence->name}}</p>

                                            <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                <form method="post" action="{{ route('admin.agence.destroy',$agence->id) }}"  style="display:flex;text-align:center;width:100%;">
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

            @foreach($agences as $agence)
            <!-- Modal pour la desactivation de l'agence -->
                <!-- Static Backdrop Modal -->
                <div class="modal fade modal-md" id="staticBackdrop-{{$agence->id}}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" role="dialog"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">
                                    @if($agence->is_active == 1)
                                        <span class="text-danger">Desactivation d'agence</span>
                                    @else
                                        <span class="text-success">Activation d'agence</span>
                                    @endif
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    @if($agence->is_active == 1)
                                    <p class="text-danger">Etse vous sure de desactiver {{ $agence->name }}</p>
                                @else
                                    <p class="text-primary">Etse vous sure d'activer {{ $agence->name }}</p>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('admin.agence.update',$agence->id) }}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                        <input type="hidden" name="is_active" value="{{$agence->is_active}}">

                                    <button type="reset" class="btn btn-light"
                                        data-bs-dismiss="modal">Ferner</button>
                                    <button type="submit"
                                    @if($agence->is_active == 1)
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
            <!-- Fin du modal pour la desactivation de l'agence -->
            @endforeach



           
@endsection