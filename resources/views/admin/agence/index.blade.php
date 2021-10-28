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

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ajouter une agence</a></li>
                                    </ol>
                                </div>

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
                                                <p class="text-muted mb-1">{{ $agence->email }}</p>
                                                <p class="text-muted mb-4">{{ $agence->slogan }}</p>
                                                {{--
                                                <div class="avatar-group">
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-4.jpg" alt=""
                                                                class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-5.jpg" alt=""
                                                                class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <div class="avatar-xs">
                                                                <span
                                                                    class="avatar-title rounded-circle bg-success text-white font-size-16">
                                                                    A
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-2.jpg" alt=""
                                                                class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                </div>
                                                --}}
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
                                            <li class="list-inline-item me-3">
                                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable-{{$agence->id}}"><i class="bx bxs-file-txt me-1"></i></a>
                                            </li>
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

                            <!-- Modal pour la desactivation de l'agence -->
                                <!-- Static Backdrop Modal -->
                                <div class="modal fade modal-sm" id="staticBackdrop-{{$agence->id}}" data-bs-backdrop="static"
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

                            <!-- Modal de la facture -->
                                <div class="modal fade" id="exampleModalScrollable-{{$agence->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Scrollable
                                                    Modal</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title mb-4">Latest Transaction</h4>
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
                                                                                    <th class="align-middle">Order ID</th>
                                                                                    <th class="align-middle">Billing Name</th>
                                                                                    <th class="align-middle">Date</th>
                                                                                    <th class="align-middle">Total</th>
                                                                                    <th class="align-middle">Payment Status</th>
                                                                                    <th class="align-middle">Payment Method</th>
                                                                                    <th class="align-middle">View Details</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-check font-size-16">
                                                                                            <input class="form-check-input" type="checkbox" id="transactionCheck02">
                                                                                            <label class="form-check-label" for="transactionCheck02"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td>
                                                                                    <td>Neal Matthews</td>
                                                                                    <td>
                                                                                        07 Oct, 2019
                                                                                    </td>
                                                                                    <td>
                                                                                        $400
                                                                                    </td>
                                                                                    <td>
                                                                                        <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                                                                    </td>
                                                                                    <td>
                                                                                        <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                                                                    </td>
                                                                                    <td>
                                                                                        <!-- Button trigger modal -->
                                                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                                                            View Details
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-check font-size-16">
                                                                                            <input class="form-check-input" type="checkbox" id="transactionCheck03">
                                                                                            <label class="form-check-label" for="transactionCheck03"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2541</a> </td>
                                                                                    <td>Jamal Burnett</td>
                                                                                    <td>
                                                                                        07 Oct, 2019
                                                                                    </td>
                                                                                    <td>
                                                                                        $380
                                                                                    </td>
                                                                                    <td>
                                                                                        <span class="badge badge-pill badge-soft-danger font-size-11">Chargeback</span>
                                                                                    </td>
                                                                                    <td>
                                                                                        <i class="fab fa-cc-visa me-1"></i> Visa
                                                                                    </td>
                                                                                    <td>
                                                                                        <!-- Button trigger modal -->
                                                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                                                            View Details
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-check font-size-16">
                                                                                            <input class="form-check-input" type="checkbox" id="transactionCheck04">
                                                                                            <label class="form-check-label" for="transactionCheck04"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2542</a> </td>
                                                                                    <td>Juan Mitchell</td>
                                                                                    <td>
                                                                                        06 Oct, 2019
                                                                                    </td>
                                                                                    <td>
                                                                                        $384
                                                                                    </td>
                                                                                    <td>
                                                                                        <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                                                                    </td>
                                                                                    <td>
                                                                                        <i class="fab fa-cc-paypal me-1"></i> Paypal
                                                                                    </td>
                                                                                    <td>
                                                                                        <!-- Button trigger modal -->
                                                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                                                            View Details
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-check font-size-16">
                                                                                            <input class="form-check-input" type="checkbox" id="transactionCheck05">
                                                                                            <label class="form-check-label" for="transactionCheck05"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2543</a> </td>
                                                                                    <td>Barry Dick</td>
                                                                                    <td>
                                                                                        05 Oct, 2019
                                                                                    </td>
                                                                                    <td>
                                                                                        $412
                                                                                    </td>
                                                                                    <td>
                                                                                        <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                                                                    </td>
                                                                                    <td>
                                                                                        <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                                                                    </td>
                                                                                    <td>
                                                                                        <!-- Button trigger modal -->
                                                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                                                            View Details
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-check font-size-16">
                                                                                            <input class="form-check-input" type="checkbox" id="transactionCheck06">
                                                                                            <label class="form-check-label" for="transactionCheck06"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2544</a> </td>
                                                                                    <td>Ronald Taylor</td>
                                                                                    <td>
                                                                                        04 Oct, 2019
                                                                                    </td>
                                                                                    <td>
                                                                                        $404
                                                                                    </td>
                                                                                    <td>
                                                                                        <span class="badge badge-pill badge-soft-warning font-size-11">Refund</span>
                                                                                    </td>
                                                                                    <td>
                                                                                        <i class="fab fa-cc-visa me-1"></i> Visa
                                                                                    </td>
                                                                                    <td>
                                                                                        <!-- Button trigger modal -->
                                                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                                                            View Details
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-check font-size-16">
                                                                                            <input class="form-check-input" type="checkbox" id="transactionCheck07">
                                                                                            <label class="form-check-label" for="transactionCheck07"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2545</a> </td>
                                                                                    <td>Jacob Hunter</td>
                                                                                    <td>
                                                                                        04 Oct, 2019
                                                                                    </td>
                                                                                    <td>
                                                                                        $392
                                                                                    </td>
                                                                                    <td>
                                                                                        <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                                                                    </td>
                                                                                    <td>
                                                                                        <i class="fab fa-cc-paypal me-1"></i> Paypal
                                                                                    </td>
                                                                                    <td>
                                                                                        <!-- Button trigger modal -->
                                                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                                                            View Details
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- end table-responsive -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </p>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                            <!-- fin du modal de la facture -->
                        @endforeach
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="pagination pagination-rounded justify-content-center mt-2 mb-5">
                                <li class="page-item disabled">
                                    <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">3</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">4</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">5</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

              
             <!-- Static Backdrop Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Ajouter une agence de transport</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                                <p>
                                    <form class="custom-validation" action="{{ route('admin.agence.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Nom de l'agence</label>
                                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                                        placeholder="Nom de l'agence" />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">E-Mail de l'agence</label>
                                                    <div>
                                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" parsley-type="email"
                                                            placeholder="E-Mail de l'agence" />
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Numero de telephone</label>
                                                    <div>
                                                        <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                                            required placeholder="Numero de telephone" />
                                                             @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Mot de passe de l'agence</label>
                                                    <div>
                                                        <input type="password" id="pass2"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" required
                                                            placeholder="Mot de passe de l'agence" />
                                                             @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                    <div class="mt-2">
                                                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password"
                                                            data-parsley-equalto="#pass2" placeholder="Confirmer le mot de passe" />
                                                    </div>
                                                </div>

                                             
                                              
                                            </div>
                                            <div class="col-xl-6">
                                                 <div class="mb-3">
                                                    <label class="form-label">Adresse de l'agence</label>
                                                    <input type="text" class="form-control" required id="adress" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" autocomplete="adress"
                                                        placeholder="Adresse de l'agence" />
                                                        @error('adress')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Registre de commerce</label>
                                                    <div>
                                                        <input data-parsley-type="digits" type="text" id="registre_commerce" class="form-control @error('registre_commerce') is-invalid @enderror" name="registre_commerce" value="{{ old('registre_commerce') }}" autocomplete="registre_commerce"
                                                            required placeholder="Registre de commerce" />
                                                            @error('registre_commerce')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Logo de l'agence</label>
                                                    <input type="file" class="form-control" required id="image" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image"
                                                        placeholder="Logo de l'agence" />
                                                          @error('image')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Slogan de l'agence</label>
                                                    <div>
                                                        <textarea required id="slogan" class="form-control @error('slogan') is-invalid @enderror" name="slogan" value="{{ old('slogan') }}" autocomplete="slogan" class="form-control" rows="3"></textarea>
                                                          @error('slogan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                    Enregistrer l'agence
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



@endsection


@section('footersection')

@endsection