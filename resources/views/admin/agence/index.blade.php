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
                                <h4 class="mb-sm-0 font-size-18">Agences de transport</h4>


                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        @foreach($agences as $agence)
                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="avatar-md me-4">
                                                <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                    <img src="{{Storage::url($agence->logo)}}" alt="" height="30">
                                                </span>
                                            </div>

                                            <div class="media-body overflow-hidden">
                                                <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">{{ $agence->name }}</a></h5>
                                                <p class="text-muted mb-1"> <i class="fa fa-envelope"></i> {{ $agence->email }}</p>
                                                <p class="text-muted mb-4 font-size-10"><i class="fa fa-mobile"></i> {{ $agence->phone }}</p>
                                                
                                                <div class="avatar-group">
                                                    <div class="avatar-group-item font-size-11">
                                                        {{$agence->slogan}}
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                @if($agence->is_active == 1)
                                                <span class="badge bg-success"><i class="bx bxs-check-circle me-1"></i>
                                                        Active
                                                </span>
                                                @else
                                                 <span class="badge bg-danger"><i class="bx bxs-x-square me-1"></i>
                                                        Desactive
                                                </span>
                                                @endif
                                                
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <!-- <a href=""><i class="bx bx-edit me-1"></i></a> -->
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <a href="" data-bs-toggle="modal" data-bs-target="#edit-agence-{{$agence->id}}"><i class="bx bx-show me-1"></i></a>
                                            </li>
                                            @if(Auth::user()->is_admin == 0)
                                                <li class="list-inline-item me-3">
                                                    <a href="{{ route('admin.agence.show',$agence->id) }}"><i class="fa fa-file-invoice me-1"></i></a>
                                                </li>
                                            @endif
                                            <li class="list-inline-item me-3">
                                                <!-- <a href=""><i class="bx bx-block me-1"></i></a> -->
                                                <div class="form-check form-switch mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizesm" @if($agence->is_active == 1) checked @endif  data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$agence->id}}">
                                                    <label class="form-check-label" for="SwitchCheckSizesm"></label>
                                                </div>
                                            </li>
                                             <li class="list-inline-item me-3">
                                                <a href="" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $agence->id }}"><i class="bx bx-trash me-1 text-danger"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            

                            

                            
                        @endforeach
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                           {{$agences->links()}}
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
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
                                                        <img src="{{Storage::url($agence_edit->logo)}}" alt="" class="avatar-sm me-4">

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


@section('footersection')

@endsection