@extends('admin.layouts.app')
@section('headSection')
    <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

    <div class="page-content bg-white">
        <div class="container-fluid">

            <!-- start page title -->
            

            <div class="row sectionCompteDesktope">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="media">
                                        <div class="me-2">
                                            @if($agence->logo != '')
                                                <img src="{{(Storage::url($agence->logo))}}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                            @else
                                                <span class="avatar-md rounded-circle text-muted font-size-16">
                                                    <i class="fa fa-bus"></i>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="text-muted">
                                                <h5 class="mb-1">Agence {{$agence->name}}</h5>

                                                <p class="mb-0">
                                                    {{$sieges->count()}} sieges
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning alert-dismissible fade show " role="alert">
                    <h6 class="" style="font-weight: 900;"> <i class="fa fa-exclamation-circle"> </i> Remarque: </h6>
                        @if($agence->method_ticket == 0) Votre tiket est remboursable meme apres le depart du bus.@else Votre tiket n'est remboursable @endif
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <!-- end row -->

            <!-- currency price section start-->
            <div class="row mb-4 sectionCompteDesktope">
                @foreach($sieges as $siege)
                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                           
                            <div class="media">
                                <div class="avatar-xs me-2">
                                    <span
                                        class="avatar-title rounded-circle bg-info bg-soft text-warning font-size-16">
                                        @if($siege->image == '')
                                            <i class="bx bx-map"></i>
                                        @else
                                            <img src="{{Storage::url($siege->image)}}" alt="" style="width:100%;">
                                        @endif
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h5>Siege de {{ $siege->name }}</h5>
                                    <p class="text-muted  mb-2"><i class="fa fa-mobile"></i> {{ $siege->phone }} </p>
                                    {{--
                                        <p class="text-muted  mb-1"><i class="fa fa-envelope"></i> {{ $siege->email }} </p>
                                        <p class="text-muted  mb-2"> <i class="fa fa-bus"> </i> {{ $siege->buses->count() }} bus a votre disposition </p>
                                    --}}
                                    <ul class="list-inline mb-0 text-left">
                                        <li class="list-inline-item me-1">
                                            <a href="#" class="badge bg-success p-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$siege->id}}"> <i class="fa fa-user-plus"></i> S'inscrire</a>
                                        </li>
                                        <li class="list-inline-item me-1">
                                            <a href="{{route('customer.client.show',$siege->id)}}" class="badge bg-info p-1"><i class="fa fa-ticket-alt"></i> Tickets</a>
                                        </li>
                                          <li class="list-inline-item me-1">
                                            <a href="{{route('customer.colis.edit',$siege->id)}}" class="badge bg-primary p-1"><i class="fa fa-suitcase-rolling"></i> Colis Recu</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- end row -->
            <!-- currency price section end -->
         
        </div>
        <!-- container-fluid -->

        <div class="tab-pane show active sectionCompteMobile siege-mobile-top" id="chat">
            <div>
                <ul class="list-unstyled chat-list">
                    <li class="mb-4">
                        <div class="media">
                            <div class="align-self-center me-3">
                                @if($agence->logo != Null)
                                <img src="{{Storage::url($agence->logo)}}" class="rounded-circle avatar-xs" alt="">
                                @else
                                <img src="{{asset('admin/assets/images/bus_agence.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                @endif
                            </div>
                            <div class="media-body overflow-hidden">
                                <h5 class="text-truncate font-size-14 mb-1">{{$agence->name}}</h5>
                                <p class="text-truncate mb-0">{{$agence->slogan}}</p>
                            </div>
                            <div class="font-size-11">
                                <a href="{{ route('customer.agence.about',$agence->slug) }}" class="btn btn-xs btn-primary text-white mt-1 p-1 "> <i class="bx bx-file"></i> Infos</a>
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
                                        <span class="span-chat-siege span-chat1 rounded-circle" onclick="onclick().event.preventDefault()" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$siege->id}}">
                                            S'inscrire <i class="fa fa-user-plus"></i>
                                        </span>
                                        
                                        <span class="span-chat-siege rounded-circle" onclick="location.href='{{route('customer.colis.edit',$siege->id)}}'">
                                            Colis reçue <i class="fa fa-suitcase-rolling"></i>
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

    

     <!-- Static Backdrop Modal de l'ajout -->
    @foreach($sieges as $siege)
        <div class="modal fade" id="staticBackdrop-{{$siege->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">S'inscrire sur {{ $siege->name }} </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <form class="custom-validation" action="{{ route('customer.client.store') }}" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validation()">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="mb-3 row">
                                            <label class="form-label">Selectionner votre ville de voyage</label>
                                            <div class="col-md-12">
                                                <select class="form-control select2 @error('ville') is-invalid @enderror" name="ville" required autocomplete="ville" required>
                                                    <option>Select</option>
                                                    
                                                        @foreach($siege->itineraires as $itineraire)
                                                            <optgroup label="{{$itineraire->name}}">
                                                                @foreach($itineraire->villes as $ville)
                                                                    <option value="{{ $ville->id }}">{{$ville->name}} | {{ $ville->getAmount() }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    
                                                </select>
                                                @error('siege')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    
                                        <div class="mb-3 row">
                                            <label class="form-label" for="example-date-input" >Votre date de voyage</label>
                                            <div class="col-md-12">
                                                <input name="date" class="form-control @error('date') is-invalid @enderror " type="date" value="{{ old('date') }}"
                                                    id="example-date-input">
                                            </div>
                                            @error('date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                            Enregistrer
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
    <!-- Fin du modal de l'ajout -->           
@endsection