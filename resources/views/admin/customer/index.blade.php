@extends('admin.layouts.app')

    @section('headSection')
        <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
        
    @endsection

@section('main-content')

            <div class="page-content">
                <div class="container-fluid sectionCompteDesktope">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Les utilisateurs</h4>
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
                                                <th class="align-middle">Nom de l'agence </th>
                                                <th class="align-middle">Email</th>
                                                <th class="align-middle">Phone</th>
                                                <th class="align-middle">Status compte</th>
                                                <th class="align-middle">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="form-check font-size-16">
                                                        <input class="form-check-input" type="checkbox" id="transactionCheck02">
                                                        <label class="form-check-label" for="transactionCheck02"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($user->image != null)
                                                        <img src="{{Storage::url($user->customer->image)}}" style="width: 40px;height:40px;" alt=""
                                                            class="avatar-sm rounded-circle header-profile-user">
                                                    @else
                                                        <img src="{{ asset('admin/assets/images/users/profil.jpg') }}" style="width: 40px;height:40px;" alt=""
                                                            class="avatar-sm rounded-circle header-profile-user">
                                                    @endif
                                                </td>
                                                <td><a href="javascript: void(0);" class="text-body fw-bold">{{ $user->name }}</a> </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>{{ $user->phone }}</td>
                                                <td>
                                                    <span class="badge badge-pill @if($user->is_active == 1) badge-soft-success @else badge-soft-success  @endif font-size-11">@if($user->is_active == 1) Compte Actif @else Non actif  @endif</span>
                                                </td>
                                                <td>
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-3">
                                                            <!-- <a href=""><i class="bx bx-block me-1"></i></a> -->
                                                            <div class="form-check form-switch mb-3" dir="ltr">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="SwitchCheckSizesm" @if($user->is_active == 1) checked @endif  data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$user->id}}">
                                                                <label class="form-check-label" for="SwitchCheckSizesm"></label>
                                                            </div>
                                                        </li>
                                                            <li class="list-inline-item me-3">
                                                            <a href="" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $user->id }}"><i class="mdi mdi-delete font-size-18"></i></a>
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
                           {{$users->links()}}
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
                                        <div class="align-self-center me-3">
                                            <img src="{{asset('admin/assets/images/users/profil.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                        </div>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="text-truncate font-size-14 mb-1">{{Auth::guard('web')->user()->name}}</h5>
                                        <p class="text-truncate mb-0">Admins</p>
                                    </div>
                                    <div class="font-size-11 button-right-siege">
                                        <span>{{ $users->count() }} Users(s)</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-unstyled chat-list">
                            @foreach($users as $user)
                                <li class="" >
                                    <a onclick="onclick().event.preventDefault()">
                                        <div class="media">
                                            <div class="align-self-center me-3">
                                                @if($user->image != Null)
                                                    <img src="{{Storage::url($user->image)}}" class="rounded-circle avatar-xs" alt="">
                                                @else
                                                    <img src="{{asset('admin/assets/images/users/profil.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                                @endif
                                            </div>
                                            
                                            <div class="media-body overflow-hidden">
                                                <h5 class="text-truncate font-size-14 mb-1">
                                                    {{ $user->name }}
                                                </h5>
                                                <p class="text-truncate mb-0"> <i class="fa fa-mobile font-size-10"></i>
                                                    {{ $user->phone }}
                                                </p>
                                            </div>
                                            <div class="font-size-12 button-right-siege">
                                                <span class="span-chat-siege mb-1 badge @if($user->is_active == 1) bg-success @else bg-danger @endif"><i class=" @if($user->is_active == 1) bx bxs-check-circle @else bx bxs-x-square @endif"></i>
                                                    @if($user->is_active == 1)
                                                        Active
                                                    @else
                                                        Desactive
                                                    @endif
                                                </span>

                                                <span class="span-chat-siege span-chat1 form-check form-switch">
                                                        <input class="form-check-input mt-2" type="checkbox"
                                                            id="SwitchCheckSizesm" @if($user->is_active == 1) checked @endif  data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$user->id}}">
                                                        <label class="form-check-label" for="SwitchCheckSizesm"></label>
                                                    
                                                    <span  aria-disabled="true" data-bs-toggle="modal"  data-bs-target="#subscribeModalagence-{{ $user->id }}" class="text-danger action-button ml-3"><i class="mdi mdi-delete font-size-18"></i></span>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>



            </div>
            <!-- End Page-content -->

            @foreach($users as $user)
            <!-- Modal pour la suppression de l'agence -->
                <div class="modal modal-md fade" id="subscribeModalagence-{{ $user->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                            <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer {{$user->name}}</p>

                                            <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                <form method="post" action="{{ route('admin.agence.destroy',$user->id) }}"  style="display:flex;text-align:center;width:100%;">
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

            @foreach($users as $user)
            <!-- Modal pour la desactivation de l'agence -->
                <!-- Static Backdrop Modal -->
                <div class="modal fade modal-md" id="staticBackdrop-{{$user->id}}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" role="dialog"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">
                                    @if($user->is_active == 1)
                                        <span class="text-danger">Desactivation du compte du client</span>
                                    @else
                                        <span class="text-success">Activation du compte du client</span>
                                    @endif
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if($user->is_active == 1)
                                    <p class="text-danger">Etse vous sure de desactiver {{ $user->name }}</p>
                                @else
                                    <p class="text-primary">Etse vous sure d'activer {{ $user->name }}</p>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('admin.admin.updateCustomer',$user->id) }}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    @if($user->is_active == 1)
                                        <input type="hidden" name="is_active" value="0">
                                    @else
                                        <input type="hidden" name="is_active" value="1">
                                    @endif
                                    <button type="reset" class="btn btn-light"
                                        data-bs-dismiss="modal">Ferner</button>
                                    <button type="submit"
                                    @if($user->is_active == 1)
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


@section('footersection')

@endsection