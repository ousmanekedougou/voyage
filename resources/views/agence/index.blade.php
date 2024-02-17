@extends('admin.layouts.app')
@section('headsection')
 <link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
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


            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="media">
                                        <div class="me-3">
                                            <img src="" alt="" class="avatar-md rounded-circle img-thumbnail">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="text-muted">
                                                <p class="mb-2">Bienvenu sur {{ Auth::guard('agence')->user()->email }}</p>
                                                <h5 class="mb-1">{{ Auth::guard('agence')->user()->name }}</h5>
                                                <p class="mb-0">Admin</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 align-self-center">
                                    <div class="text-lg-center mt-4 mt-lg-0">
                                        <div class="row">
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Agents</p>
                                                    <h5 class="mb-0">{{$agents->count()}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Sieges</p>
                                                    <h5 class="mb-0">{{$sieges->count()}}</h5>
                                                </div>
                                            </div>
                                            {{--
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Clients</p>
                                                    <h5 class="mb-0">18</h5>
                                                    
                                                </div>
                                            </div>
                                            --}}
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 d-lg-block">
                                    <div class="clearfix mt-4 mt-lg-0">
                                        <div class="dropdown float-end">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i class="fa fa-plus"></i> Ajouter un siege
                                            </button>
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
                                        <td>
                                            <a href="{{ route('agence.agent.show',$siege->id) }}">
                                                <span class="badge bg-success">{{ $siege->agents->count() }} Agent(s) </span>
                                            </a>
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
                                                                        <form method="post" action="{{ route('agence.siege.destroy',$siege->id) }}"  style="display:flex;text-align:center;width:100%;">
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


            
            {{--
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-end">
                                    <div class="input-group input-group-sm">
                                        <select class="form-select form-select-sm">
                                            <option value="JA" selected>Jan</option>
                                            <option value="DE">Dec</option>
                                            <option value="NO">Nov</option>
                                            <option value="OC">Oct</option>
                                        </select>
                                        <label class="input-group-text">Month</label>
                                    </div>
                                </div>
                                <h4 class="card-title mb-4">Earning</h4>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="text-muted">
                                        <div class="mb-4">
                                            <p>This month</p>
                                            <h4>$2453.35</h4>
                                            <div><span class="badge badge-soft-success font-size-12 me-1"> + 0.2% </span> From previous period</div>
                                        </div>

                                        <div>
                                            <a href="#" class="btn btn-primary waves-effect waves-light btn-sm">View Details <i class="mdi mdi-chevron-right ms-1"></i></a>
                                        </div>
                                        
                                        <div class="mt-4">
                                            <p class="mb-2">Last month</p>
                                            <h5>$2281.04</h5>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div id="line-chart" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Sales Analytics</h4>

                            <div>
                                <div id="donut-chart" class="apex-charts"></div>
                            </div>

                            <div class="text-center text-muted">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mt-4">
                                            <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-primary me-1"></i> Product A</p>
                                            <h5>$ 2,132</h5>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-4">
                                            <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-success me-1"></i> Product B</p>
                                            <h5>$ 1,763</h5>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-4">
                                            <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-danger me-1"></i> Product C</p>
                                            <h5>$ 973</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            --}}
            
            



        </div>
        <!-- container-fluid -->
        <div class="tab-pane show active sectionCompteMobile siege-mobile-top" id="chat">
            <div>
                <ul class="list-unstyled chat-list mt-3">
                    <li class="mb-4">
                        <div class="media">
                            <div class="align-self-center me-3">
                                @if(Auth::guard('agence')->user()->logo != Null)
                                <img src="{{Storage::url(Auth::guard('agence')->user()->logo)}}" class="rounded-circle avatar-xs" alt="">
                                @else
                                <img src="{{asset('admin/assets/images/bus_agence.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                @endif
                            </div>
                            <div class="media-body overflow-hidden">
                                <h5 class="text-truncate font-size-14 mb-1">{{Auth::guard('agence')->user()->name}}</h5>
                                <p class="text-truncate mb-0">{{Auth::guard('agence')->user()->slogan}}</p>
                            </div>
                            <div class="font-size-11 button-right-siege">
                                <span onclick="location.href='{{ route('agence.about.index') }}'" class="badge bg-info font-size-11"> Presentation</span>
                                <span data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="mt-3 badge bg-primary font-size-11"><i class="mdi mdi-plus me-1"></i>Ajouter</span>
                                
                            </div>
                        </div>
                    </li>
                </ul>
                    
                <ul class="list-unstyled chat-list">
                    {{-- data-simplebar style="max-height: 410px;" --}}

                    @foreach($sieges as $siege)
                        <li class="" >
                            <a href="#">
                                <div class="media">
                                    <div class="align-self-center me-3">
                                        @if($siege->logo != Null)
                                            <img src="{{Storage::url($siege->logo)}}" class="rounded-circle avatar-xs" alt="">
                                        @else
                                            <img src="{{asset('admin/assets/images/map_siege.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                        @endif
                                    </div>
                                    
                                    <div class="media-body overflow-hidden">
                                        <h5 class="text-truncate font-size-14 mb-1">Siege de {{ $siege->name }}</h5>
                                        <p class="text-truncate mb-0"> <i class="fa fa-mobile"></i> {{ $siege->phone }}</p>
                                    </div>
                                    <div class="font-size-12 button-right-siege">
                                        <span class="span-chat-siege span-chat1">
                                            <span class="badge bg-primary" onclick="location.href='{{ route('agence.agent.show',$siege->id) }}'"> {{ $siege->agents->count() }} Agent(s)</span>
                                        </span>

                                        <span class="span-chat-siege span-chat1" onclick="event.preventDefault();">
                                            <span  data-bs-toggle="modal" data-bs-target="#editmodalsiege-{{ $siege->id }}" class="text-success mr-2"><i class="mdi mdi-pencil font-size-18"></i></span>
                                            <span  data-bs-toggle="modal" data-bs-target="#subscribeModalagence-{{ $siege->id }}" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></span>
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
                            <form class="custom-validation" action="{{ route('agence.siege.store') }}" method="POST" enctype="multipart/form-data">
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

                                        <div class="mb-3">
                                            <label class="form-label mb-3">Choisissez les jours de voyage de cette ittineraire</label>
                                            <div class="row">
                                                @foreach($jours as $jr)
                                                <div class="col-md-3">
                                                    <div class="form-check form-check-primary mb-3">
                                                        <input class="form-check-input @error('name') is-invalid @enderror" type="checkbox"
                                                            id="formCheckcolor-{{$jr->id}}" name="jour[]" value="{{ old('name') ?? $jr->index }}">
                                                        <label class="form-check-label" for="formCheckcolor-{{$jr->id}}">
                                                            {{$jr->name}}
                                                        </label>
                                                    </div>
                                                    @error('jour[]')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-md-6">
                                                <label for="example-time-input" class="col-md-12 col-form-label">Heure d'ouverture</label>
                                                <div class="col-md-10">
                                                    <input class="form-control @error('opened_at') is-invalid @enderror" name="opened_at" type="time" value="{{ old('opened_at') }}"
                                                        id="example-time-input">
                                                </div>
                                                    @error('opened_at')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="example-time-input" class="col-md-12 col-form-label">Heure de fermeture</label>
                                                <div class="col-md-10">
                                                    <input class="form-control @error('closed_at') is-invalid @enderror" type="time" name="closed_at" value="{{ old('closed_at') }}"
                                                        id="example-time-input">
                                                </div>
                                                @error('closed_at')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
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
                        <h5 class="modal-title" id="staticBackdropLabel">Modifier le siege {{ $edit_siege->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <p>
                                <form class="custom-validation" action="{{ route('agence.siege.update',$edit_siege->id) }}" method="POST" enctype="multipart/form-data">
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


                                            <div class="mb-3">
                                                <label class="form-label mb-3">Choisissez les jours de voyage de cette ittineraire</label>
                                                <div class="row">
                                                    @foreach($jours as $jr)
                                                    <div class="col-md-3">
                                                        <div class="form-check mb-3
                                                            @if($jr->index == 0)
                                                                form-check-primary
                                                            @elseif($jr->index == 1)
                                                                form-check-success
                                                            @elseif($jr->index == 2)
                                                                form-check-info
                                                            @elseif($jr->index == 3)
                                                                form-check-secondary
                                                            @elseif($jr->index == 4)
                                                                form-check-warning
                                                            @elseif($jr->index == 5)
                                                                form-check-danger
                                                            @elseif($jr->index == 6)
                                                                form-check-default
                                                            @endif
                                                        ">
                                                            <input class="form-check-input @error('name') is-invalid @enderror" type="checkbox"
                                                                id="formCheckcolor-{{$jr->id}}" name="jour[]" value="{{ old('name') ?? $jr->index }}"
                                                                
                                                                @foreach(unserialize($edit_siege->jours) as $jr_unserilize)
                                                                    @if($jr->index == $jr_unserilize)
                                                                        checked
                                                                    @endif
                                                                @endforeach

                                                                >
                                                            <label class="form-check-label" for="formCheckcolor-{{$jr->id}}">
                                                                {{$jr->name}}
                                                            </label>
                                                        </div>
                                                        @error('jour[]')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>


                                            <div class="mb-3 row">
                                                <div class="col-md-6">
                                                    <label for="example-time-input" class="col-md-12 col-form-label">Heure D'ouverture</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control @error('opened_at') is-invalid @enderror" name="opened_at" type="time" value="{{old('opened_at') ?? $edit_siege->opened_at }}"
                                                            id="example-time-input">
                                                    </div>
                                                        @error('opened_at')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="example-time-input" class="col-md-12 col-form-label">Heure de fermeture</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control @error('closed_at') is-invalid @enderror" type="time" name="closed_at" value="{{old('closed_at') ?? $edit_siege->closed_at}}"
                                                            id="example-time-input">
                                                    </div>
                                                        @error('closed_at')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
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


    @foreach($sieges as $siege)

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
                                        <form method="post" action="{{ route('agence.siege.destroy',$siege->id) }}"  style="display:flex;text-align:center;width:100%;">
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


           
@endsection

@section('footersection')
  <!-- apexcharts -->
        <script src="{{asset('admin/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
        
        <!-- Saas dashboard init -->
        <script src="{{asset('admin/assets/js/pages/saas-dashboard.init.js')}}"></script>
@endsection