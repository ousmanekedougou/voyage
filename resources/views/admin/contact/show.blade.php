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
                    <h4 class="mb-sm-0 font-size-18">Lire l'email</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-2"></div>
            <!-- Right Sidebar -->
            <div class=" mb-3 col-8">

                <div class="card">
                    {{--
                    <div class="btn-toolbar p-3" role="toolbar">
                        <div class="btn-group me-2 mb-2 mb-sm-0">
                            <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-inbox"></i></button>
                            <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-exclamation-circle"></i></button>
                            <button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button>
                        </div>
                        <div class="btn-group me-2 mb-2 mb-sm-0">
                            <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-folder"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Updates</a>
                                <a class="dropdown-item" href="#">Social</a>
                                <a class="dropdown-item" href="#">Team Manage</a>
                            </div>
                        </div>
                        <div class="btn-group me-2 mb-2 mb-sm-0">
                            <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Updates</a>
                                <a class="dropdown-item" href="#">Social</a>
                                <a class="dropdown-item" href="#">Team Manage</a>
                            </div>
                        </div>

                        <div class="btn-group me-2 mb-2 mb-sm-0">
                            <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                More <i class="mdi mdi-dots-vertical ms-2"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Mark as Unread</a>
                                <a class="dropdown-item" href="#">Mark as Important</a>
                                <a class="dropdown-item" href="#">Add to Tasks</a>
                                <a class="dropdown-item" href="#">Add Star</a>
                                <a class="dropdown-item" href="#">Mute</a>
                            </div>
                        </div>
                    </div>
                    --}}
                    <div class="card-body">
                        <div class="media mb-4">
                            <img class="d-flex me-3 rounded-circle avatar-sm" src="{{asset('admin/assets/images/users/profil.jpg')}}" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="font-size-14 mt-1">{{$show->name}}</h5>
                                <small class="text-muted">{{$show->email}}</small>
                            </div>
                        </div>

                        <h4 class="mt-0 font-size-16"> Objet : {{$show->subject}}</h4>

                        <p>{!! $show->msg !!}</p>
                        <a href="{{route('admin.contact.index')}}" class="btn btn-info waves-effect mt-4"><i class="mdi mdi-arrow-left"></i> Retour</a>
                        <a href="javascript: void(0);" class="btn btn-success waves-effect mt-4" data-bs-toggle="modal" data-bs-target="#composemodal"><i class="mdi mdi-reply"></i> Repondre</a>
                    </div>

                </div>
            </div>
            <!-- card -->
            <div class="col-2"></div>
        </div>
        <!-- end Col-9 -->

    </div>
    <!-- End row -->
</div>


    <!-- Modal -->
    <div class="modal fade" id="composemodal" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="composemodalTitle">Repondre a {{ $show->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <form action="{{ route('admin.contact.store') }}" method="POST">
                            @csrf
                        <div>
                                <input type="hidden" name="name" value="{{ $show->name }}">
                                <input type="hidden" name="email" value="{{ $show->email }}">
                                @if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 0)
                                    <input type="hidden" name="image" value="{{asset('admin/assets/images/logo-light.png')}}">
                                @elseif(Auth::user()->is_admin == 3)
                                    <input type="hidden" name="image" value="{{Storage::url(Auth::user()->image_agence)}}">
                                @endif
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <div>
                                        <textarea required id="msg" class="form-control @error('msg') is-invalid @enderror" name="msg" value="{{ old('msg') }}" autocomplete="msg" class="form-control" rows="5"></textarea>
                                            @error('msg')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Repondre <i class="fab fa-telegram-plane ms-1"></i></button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->

@endsection


@section('footersection')

@endsection

