@extends('admin.layouts.app')
@section('headsection')
    <link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

            <div class="page-content">
                <div class="container-fluid">

                      <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Bagages</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                    <div class="row">
                        @foreach($clients as $client)
                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            @if($client->image !== null)
                                                <div class="avatar-md me-4">
                                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                        <img src="{{Storage::url($client->customer->image)}}" alt="" height="30">
                                                    </span>
                                                </div>
                                            @else
                                                <div class="avatar-md me-4">
                                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                        <img src="{{Storage::url($client->image)}}" alt="" height="30">
                                                    </span>
                                                </div>
                                            @endif

                                            <div class="media-body overflow-hidden">
                                                @if($client->name == null)
                                                <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">{{ $client->customer->name }}</a></h5>
                                                <p class="text-muted mb-1"> <i class="fa fa-mobile"></i> {{ $client->customer->phone }}</p>
                                                @else
                                                <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">{{ $client->name }}</a></h5>
                                                <p class="text-muted mb-1"> <i class="fa fa-mobile"></i> {{ $client->phone }}</p>
                                                @endif
                                                <p class="text-muted mb-1 font-size-10"><i class="fa fa-mobile"></i> {{ $client->ville->name }} | {{$client->ville->amount}} f</p>
                                                <p class="text-muted mb-3 font-size-10"><i class="fa fa-mobile"></i> Date : {{$client->bus->date_depart->depart_at}}</p>
                                                {{--
                                                <div class="avatar-group">
                                                    <div class="avatar-group-item font-size-11">
                                                         <span>Rv : {{$client->bus->date_depart->rendez_vous}} | Depart : {{ $client->bus->date_depart->depart_time }}</span>
                                                    </div>
                                                </div>
                                                --}}
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="font-size-11 text-center">
                                                    <span>Rv : {{$client->bus->date_depart->rendez_vous}} | Depart : {{ $client->bus->date_depart->depart_time }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top text-center">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                <a href="" data-bs-toggle="modal" data-bs-target="#AddBagage-{{$client->id}}"> <i class="fa fa-suitcase-rolling font-size-12"></i></a>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <a href="{{ route('agent.bagage.show',$client->id) }}"><i class="fa fa-eye font-size-12"></i></a>
                                            </li>
                                            
                                            <li class="list-inline-item me-3">
                                                <a href="{{ route('agent.bagage.show',$client->id) }}"><i class="fa fa-print font-size-12"></i></a>
                                            </li>
                                             <li class="list-inline-item me-3">
                                                <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalclient-{{ $client->id }}"><i class="bx bx-trash me-1 text-danger font-size-12"></i></a>
                                                <div class="modal modal-xs fade" id="subscribeModalclient-{{ $client->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="text-center mb-4">
                                                                    <div class="avatar-md mx-auto mb-4">
                                                                        <div class="avatar-title bg-danger rounded-circle text-white h1">
                                                                            <i class="fa fa-trash"></i>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row justify-content-center">
                                                                        <div class="col-xl-10">
                                                                            <h4 class="text-danger text-uppercase">Attention !</h4>
                                                                            <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer {{ $client->name }}</p>

                                                                            <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                                                <form method="post" action="{{ route('agent.bagage.destroy',$client->id) }}"  style="display:flex;text-align:center;width:100%;">
                                                                                    {{csrf_field()}}
                                                                                    {{method_field('delete')}}
                                                                                    <button type="submit" class="btn btn-danger btn-xs" style="margin-left: 70px;margin-right:20px;"> Oui je veux bien </button> 
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
                           {{$clients->links()}}
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
                <!-- End Page-content -->

                <!-- Modal -->


                @foreach($clients as $client_bagage)
                 <!-- Static Backdrop Modal de l'ajout -->
                <div class="modal fade" id="AddBagage-{{$client_bagage->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="NewClientBagageLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                @if($client_bagage->name !== null)
                                    <h5 class="modal-title" id="NewClientBagageLabel">Ajouter des bagages pour {{ $client_bagage->name }}</h5>
                                @else
                                    <h5 class="modal-title" id="NewClientBagageLabel">Ajouter des bagages pour {{ $client_bagage->customer->name }}</h5>
                                @endif
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                    <form class="custom-validation" action="{{ route('agent.bagage.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="clientId" value="{{ $client->id }}">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Image</label>
                                                        <input type="file" class="form-control" required id="image" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image"
                                                        placeholder="" />
                                                        @error('image')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Nom du bagage</label>
                                                        <div>
                                                            <input data-parsley-type="text" type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name"
                                                                required placeholder="" />
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Prix</label>
                                                        <div>
                                                            <input data-parsley-type="number" type="number" id="prix" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}" autocomplete="prix"
                                                                required placeholder="" />
                                                                @error('prix')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Description</label>
                                                        <div>
                                                            <textarea required id="desc" class="form-control @error('desc') is-invalid @enderror" name="desc" value="{{ old('desc') }}" autocomplete="desc" class="form-control" rows="3"></textarea>
                                                                @error('desc')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
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
                <!-- Fin du modal de l'ajout -->
                @endforeach



@endsection


@section('footersection')
<script src="{{asset('admin/assets/js/table.js')}}"></script>
@endsection