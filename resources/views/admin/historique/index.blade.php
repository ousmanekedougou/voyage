@extends('admin.layouts.app')

@section('headsection')
    <link href="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Historique de vos clients</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                            <li class="breadcrumb-item active">Customers</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <div class="search-box me-2 mb-2 d-inline-block">
                                                    <div class="position-relative">
                                                        <a href="" onclick="
                                                            event.preventDefault();document.getElementById('delete-form').submit();
                                                            
                                                            "><i class="bx bx-search-alt search-icon"></i>
                                                        </a>
                                                        <form id="delete-form" method="post" action="{{ route('admin.historique.search') }}">
                                                            @csrf
                                                            <input type="hidden" name="hidden_date" value="1">
                                                             <input type="date" 
                                                                id="example-date-input" class="form-control @error('search') is-invalid @enderror" name="search" value="{{ old('search')}}" required autocomplete="search"
                                                                placeholder="Date du vayage" />
                                                                 @error('search')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="text-sm-end">
                                                    <div class="search-box me-2 mb-2 d-inline-block">
                                                        <div class="position-relative">
                                                            <form action="{{ route('admin.historique.search') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="hidden_date" value="2">
                                                               <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                                                required placeholder="Numero de telephone" />
                                                                @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                <i class="bx bx-search-alt search-icon"></i>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col-->
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Prenom et nom</th>
                                                        <th>Telephone</th>
                                                        <th>Voyage</th>
                                                        <th>Date voyage</th>
                                                        <th>Paiment</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($clients as $client)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check font-size-16">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="customerlistcheck08">
                                                                <label class="form-check-label"
                                                                    for="customerlistcheck08"></label>
                                                            </div>
                                                        </td>
                                                        <td>{{$client->name}}</td>
                                                        <td>
                                                            <p class="mb-1">{{$client->phone}}</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1">{{$client->ville->name}}</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1">{{$client->registered_at}}</p>
                                                        </td>
                                                        <td>
                                                               <p class="mb-1">
                                                                @if($client->amount !== $client->ville->amount && $client->amount !== 2)
                                                                    <a href="" class="badge bg-primary font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#staticBackdroppaiment-{{ $client->id }}">
                                                                        <i class="bx bx-money  me-1 text-white"> Pas payer</i></a>
                                                                @elseif($client->amount == $client->ville->amount)
                                                                    <a href="" class="badge bg-success font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#staticBackdroppaiment-{{ $client->id }}"> 
                                                                        <i class="bx bx-money me-1 text-white"> (payer {{ $client->amount }} f )</i>
                                                                    </a>
                                                                @elseif($client->amount == 2)
                                                                    <a href="" class="badge bg-danger font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#staticBackdroppaiment-{{ $client->id }}"><i class="bx bx-money me-1"></i> Rembourse</a>
                                                                @endif
                                                            </p>
                                                        </td>

                                                        <td>
                                                            <p class="mb-1">
                                                                @if($client->voyage_status == 0)
                                                               <a href="" class="badge bg-primary font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $client->id }}"><i class="bx bx-highlight  me-1 text-white"> toto</i>
                                                                    
                                                                </a>
                                                                @elseif($client->voyage_status == 1)
                                                               <a href="" class="badge bg-success font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $client->id }}"> 
                                                                    <i class="bx bxs-check-circle me-1 text-white">Voyage</i>
                                                                        
                                                                </a>
                                                                @else
                                                                <a href="" class="badge bg-danger font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $client->id }}"><i class="bx bx-money me-1"></i> Absent</a>
                                                                @endif
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <ul class="pagination pagination-rounded justify-content-end mb-2">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                                    <i class="mdi mdi-chevron-left"></i>
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link"
                                                    href="javascript: void(0);">1</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                                    <i class="mdi mdi-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                   <!-- Modal pour la presence du client -->
                @foreach($clients as $client_presence)
                    <div class="modal fade modal-xs modal-center" id="subscribeModalagence-{{$client_presence->id}}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" role="dialog"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">
                                            <span class="text-muted">Etse vous sure de modifier {{ $client_presence->name }}</span>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.client.presence',$client_presence->id) }}" method="post" >
                                    <div class="modal-body">
                                        <p>
                                            <div class="mt-4 d-flex text-center">
                                                <div style="margin-left: 30px;margin-right: 30px;">
                                                    <div class="form-check form-check-right">
                                                        <input class="form-check-input" type="radio" 
                                                            name="presence" value="1" id="formRadiosRight1presnce" 
                                                                @if($client_presence->voyage_status == 1) checked @endif
                                                            >
                                                        <label class="form-check-label" for="formRadiosRight1presnce">
                                                            A voyager
                                                        </label>
                                                    </div>
                                                </div>

                                                <div style="margin-left: 30px;">
                                                    <div class="form-check form-check-right">
                                                        <input class="form-check-input" type="radio" 
                                                            name="presence" value="2" id="formRadiosRight2absence">
                                                        <label class="form-check-label" for="formRadiosRight2absence"
                                                            @if($client_presence->voyage_status == 2) checked @endif
                                                        >
                                                            Est absent
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="modal-footer" class="text-center">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                            <input type="hidden" name="voyage_status" value="{{$client_presence->voyage_status}}">

                                        <button type="reset" class="btn btn-light"
                                            data-bs-dismiss="modal">Ferner</button>
                                        <button type="submit" class="btn btn-primary">Modifier </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Fin du modal pour la presence du client -->

  
                
  <!-- Static Backdrop Modal du paiment -->
                @foreach($clients as $client_tdy)
                <div class="modal fade" id="staticBackdroppaiment-{{$client_tdy->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">
                                        Avis du paiment du client {{ $client_tdy->name }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @if($client_tdy->amount == Null)
                                        <h5 class="modal-title" id="staticBackdropLabel">Accepter le paiement du client {{ $client_tdy->name }}</h4>
                                    @elseif($client_tdy->amount == $client_tdy->ville->amount)
                                        <h5 class="modal-title" id="staticBackdropLabel">Remourser le client {{ $client_tdy->name }}</h4>
                                    @elseif($client_tdy->amount == 2)
                                        <h5 class="modal-title" id="staticBackdropLabel">Le client {{ $client_tdy->name }} a ete rembourser le {{ $client_tdy->updated_at }}</h4>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.payer',$client_tdy->id) }}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                            <input type="hidden" name="client_amount" value="{{$client_tdy->client_amount}}">
                                            <input type="hidden" name="confirmation_token" value="{{$client_tdy->confirmation_token}}">

                                        <button type="reset" class="btn btn-light"
                                            data-bs-dismiss="modal">Ferner</button>
                                        @if($client_tdy->amount == Null)
                                        <button type="submit"
                                            class="btn btn-success">Valider le paiement
                                        </button>
                                        @elseif($client_tdy->amount == $client_tdy->ville->amount )
                                        <button type="submit"
                                            class="btn btn-primary">Valider le remboursement
                                         </button>
                                         @elseif($client_tdy->amount == 2 )
                                            <button type="submit"
                                                class="btn btn-info">Anuller le remboursement
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Fin du modal du paiment -->




@endsection


@section('footersection')
<!-- Responsive Table js -->
    <script src="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/select2/js/select2.min.js')}}"></script>
    <!-- Init js -->
    <script src="{{asset('admin/assets/js/pages/table-responsive.init.js')}}"></script>
@endsection