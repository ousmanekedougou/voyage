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
                                    <h4 class="mb-sm-0 font-size-18">Bagages</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->



                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center"> Clients Bagages </h4>
                                    <table id="datatable"
                                        class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Prenom & nom</th>
                                                <th>Telephone</th>
                                                <th>Ville</th>
                                                <th>Ajouter</th>
                                                <th>Bagages</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach($clients as $client)
                                                <tr>
                                                    <td>
                                                            <img src="
                                                            @if($client->image != Null)
                                                                {{Storage::url($client->image)}}
                                                            @else
                                                                @if($client->name == null)
                                                                    https://ui-avatars.com/api/?name={{$client->customer->name}}
                                                                @else
                                                                    https://ui-avatars.com/api/?name={{$client->name}}
                                                                @endif
                                                            @endif" 
                                                         style="width: 40px;height:40px;" alt=""
                                                                class="avatar-sm rounded-circle header-profile-user">
                                                    </td>
                                                    @if($client->name == null)
                                                    <td>{{ $client->customer->name }}</td>
                                                    <td>{{ $client->customer->phone }}</td>
                                                    @else
                                                    <td>{{ $client->name }}</td>
                                                    <td>{{ $client->phone }}</td>
                                                    @endif
                                                    <td>
                                                    {{ $client->ville->name }}
                                                    </td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <a data-bs-toggle="modal" data-bs-target="#AddBagage-{{$client->id}}" class="btn btn-success btn-sm btn-rounded">
                                                            Ajouter
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <a href="{{ route('agent.bagage.show',$client->id) }}" class="btn btn-primary btn-sm btn-rounded">
                                                            Bagages ({{$client->bagages->count()}})
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div> <!-- container-fluid -->


                <!-- show client colis en modal -->
                <div class="tab-pane show active sectionCompteMobile" id="chat">
                    <div>
                        <ul class="list-unstyled chat-list">
                            <li class="mb-4">
                                <div class="media">
                                    <div class="align-self-center">
                                        <div class="align-self-center me-3">
                                            <img src="
                                            @if(Auth::guard('agent')->user()->agence->logo != Null)
                                                {{Storage::url(Auth::guard('agent')->user()->agence->logo)}}
                                            @else
                                                https://ui-avatars.com/api/?name={{Auth::guard('agent')->user()->agence->name}}
                                            @endif
                                            " class="rounded-circle avatar-sm" alt="">
                                        </div>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="text-truncate font-size-14 mb-1" style="font-weight:600;">{{Auth::guard('agent')->user()->agence->name}}</h5>
                                        <p class="text-truncate mb-0">Siege de {{Auth::guard('agent')->user()->siege->name}}</p>
                                    </div>
                                    <div class="font-size-11 button-right-siege">
                                        <span>{{ $clients->count() }} Client(s)</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <hr>
                        <ul class="list-unstyled chat-list">
                            @foreach($clients as $client)
                                <li class="mb-4">
                                    <div class="media">
                                        <div class="align-self-center me-3" onclick="location.href='{{route('agent.bagage.show',$client->id)}}'">

                                            <img src="
                                                @if($client->image != Null)
                                                    {{Storage::url($client->image)}}
                                                @else
                                                    @if($client->name == null)
                                                        https://ui-avatars.com/api/?name={{$client->customer->name}}
                                                    @else
                                                        https://ui-avatars.com/api/?name={{$client->name}}
                                                    @endif
                                                @endif
                                            " class="rounded-circle avatar-xs" alt="">
                                            
                                        </div>
                                        
                                        <div class="media-body overflow-hidden" onclick="location.href='{{route('agent.bagage.show',$client->id)}}'">
                                            <h5 class="text-truncate font-size-14 mt-2" style="font-weight:600;">
                                                @if($client->name == null)
                                                    {{ $client->customer->name }}
                                                @else
                                                    {{ $client->name }}
                                                @endif
                                            </h5>
                                            <p class="text-truncate mb-0"> <i class="fa fa-mobile font-size-10"></i>
                                                @if($client->name == null)
                                                    {{ $client->customer->phone }}
                                                @else
                                                    {{ $client->phone }}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="font-size-12 button-right-siege">
                                            <span data-bs-toggle="modal" data-bs-target="#AddBagage-{{$client->id}}" class="badge bg-primary button-client-add mt-3 mb-3" onclick="onclick().event.preventDefault()"> <i class="fa fa-suitcase-rolling font-size-8"> </i> Ajouter</span> 
                                            <span  class="button-client-add text-muted badge badge-soft-info" onclick="onclick().event.preventDefault()"> {{ $client->bagages->count() }} Bagage(s)</span> 
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>



            </div>
                <!-- End Page-content -->

                <!-- Modal -->


            @foreach($clients as $client_bagage)
                <!-- Static Backdrop Modal de l'ajout -->
            <div class="modal fade" id="AddBagage-{{$client_bagage->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="NewClientBagageLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            @if($client_bagage->name != null)
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
                                        <input type="hidden" name="clientId" value="{{ $client_bagage->id }}">
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
                                                    <label class="form-label">Quantite </label>
                                                    <div>
                                                        <input data-parsley-type="number" type="number" id="quantity" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" autocomplete="quantity"
                                                            required placeholder="" />
                                                            @error('quantity')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
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
                                                    <label class="form-label">Prix unitaire</label>
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

            @foreach($clients as $client)

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

            @endforeach



@endsection


@section('footersection')
<script src="{{asset('admin/assets/js/table.js')}}"></script>
@endsection