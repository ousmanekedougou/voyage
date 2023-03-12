@extends('admin.layouts.app')

@section('headSection')
   <!-- DataTables -->
    <link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('admin/assets/css/app.min.css')}}"  rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="media">
                                        <div class="me-3">
                                            <img src="{{(Storage::url(Auth::guard('agent')->user()->agence->logo))}}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="text-muted">
                                                <h5 class="mb-1">Agence {{Auth::guard('agent')->user()->agence->name}}</h5>
                                                <p class="mb-2">Siege de {{Auth::guard('agent')->user()->siege->name}}</p>
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
            


            {{--
            <div class="row" id="member_row">
                @foreach($clients as $client)
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    @if($client->image == null)
                                        <div class="avatar-md me-4">
                                            <span class="avatar-title rounded-circle bg-light text-danger">
                                                <img src="{{Storage::url($client->customer->image)}}" alt="">
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
                                            <p class="text-muted mb-1"> <i class="fa fa-mobile"></i> {{ $client->cni }}</p>
                                        @endif
                                        <p class="text-muted mb-1 font-size-12"><i class="bx bxs-map"></i> Destination : {{ $client->ville->name }} </p> 
                                        <p class="text-muted mb-1 font-size-12"><i class="fa fa-clock"></i> Date : {{ $client->registered_at }} </p> 
                                        <p class="text-muted font-size-12"><i class="fas fa-money-bill "></i> Prix : {{$client->ville->amount}} f </p> 
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 border-top">
                                <ul class="list-inline mb-0 text-center">
                                    @if(Auth::guard('agent')->user()->agence->mathod_tiket == 0)
                                        @if($client->status == 1)
                                            <li class="list-inline-item">
                                                <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdropPayer-{{$client->id}}" class="btn btn-success btn-sm btn-block"><i class="fas fa-money-bill me-1"></i> Rembourser le ticket de {{$client->ville->amount}} f </a>
                                            </li>
                                        @elseif($client->status == 2)
                                            <p class="text-primary mb-1 font-size-15">Le ticket n'est plus remboursable</p> 
                                        @endif
                                    @else
                                            <p class="text-primary mb-1 font-size-15">Le ticket n'est plus remboursable</p> 
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- end row -->
            --}}

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center"> La liste des clients qui ont annuler leurs tickets</h4>
                            <table id="datatable-buttons"
                                class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Prenom & nom</th>
                                        <th>Telephone</th>
                                        <th>Prix</th>
                                        <th>Ticket</th>
                                        <th>Detail</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach($clients as $client)
                                        <tr>
                                            <td>
                                                @if($client->image != null)
                                                    <img src="{{Storage::url($client->customer->image)}}" style="width: 40px;height:40px;" alt=""
                                                        class="avatar-sm rounded-circle header-profile-user">
                                                @else
                                                    <img src="{{ asset('admin/assets/images/users/profil.jpg') }}" style="width: 40px;height:40px;" alt=""
                                                        class="avatar-sm rounded-circle header-profile-user">
                                                @endif
                                            </td>
                                            @if($client->name == null)
                                            <td>{{ $client->customer->name }}</td>
                                            <td>{{ $client->customer->phone }}</td>
                                            @else
                                            <td>{{ $client->name }}</td>
                                            <td>{{ $client->phone }}</td>
                                            @endif
                                            <td>
                                                <span class="badge badge-pill badge-soft-info font-size-12">{{ $client->ville->amount }} f</span>
                                            </td>
                                            <td>
                                                @if($client->amount == $client->ville->amount)
                                                    <span class="badge badge-pill badge-soft-primary font-size-12"><i class="fab fa-cc-mastercard me-1"></i> Wave</span>
                                                @elseif($client->amount != $client->ville->amount)
                                                    <span class="badge badge-pill badge-soft-danger font-size-12">Non Payer</span>
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target="#subscribeModalagenceDetails-{{$client->id}}">
                                                    Details
                                                </button>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-3 text-center">
                                                    @if(Auth::guard('agent')->user()->agence->mathod_tiket == 0)
                                                        @if($client->status == 1)
                                                                <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdropPayer-{{$client->id}}" class="btn btn-success btn-sm btn-block"><i class="fas fa-money-bill me-1"></i> Rembourser le ticket de {{$client->ville->amount}} f </a>
                                                            
                                                        @elseif($client->status == 2)
                                                            <p class="text-primary mb-1 font-size-15">Le ticket n'est plus remboursable</p> 
                                                        @endif
                                                    @else
                                                            <p class="text-primary mb-1 font-size-15">Le ticket n'est plus remboursable</p> 
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
            {{--
            <div class="row">
                <div class="col-lg-12">
                    {{$clients->links()}}
                </div>
            </div>
            <!-- end row -->
            --}}

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- Modal pour la presence du client -->
    @foreach($clients as $client_presence)
        <div class="modal fade modal-xs modal-center" id="subscribeModalagenceDetails-{{$client_presence->id}}" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" role="dialog"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                                <span class="text-muted">Detail du ticket de {{ $client_presence->customer->name }}</span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="row">
                            <table class="body-wrap"
                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;">
                                <tr
                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                                        valign="top"></td>
                                    <td class="container" width="600"
                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                                        valign="top">
                                        <div class="content"
                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto;">
                                            <table class="main" width="100%" cellpadding="0" cellspacing="0"
                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px;  margin: 0; border: none;">
                                                <tr
                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;
                                                    ">
                                                    <td class="content-wrap aligncenter"
                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; color: #495057;background-color: #fff;"
                                                        align="center" valign="top">
                                                        <table width="100%" cellpadding="0" cellspacing="0"
                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                           
                                                            <tr
                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <td class="content-block aligncenter"
                                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0;"
                                                                    align="center" valign="top">
                                                                    <table class="invoice"
                                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;  box-sizing: border-box; font-size: 14px; text-align: left; width: 90%; margin: -15px auto;margin-left:-4px;">
                                                                        <tr
                                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                                                                                valign="top">
                                                                                <br style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif,;font-weight:bold; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                                                                <span style="float: left;">Destination : {{ $client_presence->ville->name }}</span> <span style="float: right;">Date : {{$client_presence->registered_at}}</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr
                                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;"
                                                                                valign="top">
                                                                                <table class="invoice-items"
                                                                                    cellpadding="0" cellspacing="0"
                                                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; margin: 0;">
                                                                                    <tr
                                                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                            valign="top">Email
                                                                                        </td>
                                                                                        <td class="alignright"
                                                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                            align="right" valign="top">
                                                                                            {{$client_presence->customer->email}}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr
                                                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                            valign="top">Telephone
                                                                                        </td>
                                                                                        <td class="alignright"
                                                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                            align="right" valign="top">
                                                                                            {{$client_presence->customer->phone}}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr
                                                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                            valign="top">CNI
                                                                                        </td>
                                                                                        <td class="alignright"
                                                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                            align="right" valign="top">
                                                                                            {{$client_presence->customer->cni}}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr
                                                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                            valign="top">Voyage
                                                                                        </td>
                                                                                        <td class="alignright"
                                                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                            align="right" valign="top">
                                                                                            @if($client_presence->voyage_status == 1)
                                                                                                Effectuer
                                                                                            @else
                                                                                                Non effectuer
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr
                                                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                            valign="top">Ticket
                                                                                        </td>
                                                                                        <td class="alignright"
                                                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                            align="right" valign="top">
                                                                                            @if($client_presence->amount == $client_presence->ville->amount)
                                                                                                {{$client_presence->amount}}
                                                                                            @else
                                                                                                0.000
                                                                                            @endif
                                                                                            f
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr
                                                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                            valign="top">Bus
                                                                                        </td>
                                                                                        <td class="alignright"
                                                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                            align="right" valign="top">
                                                                                            {{$client_presence->bus->matricule}}
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr
                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <td class="content-block aligncenter"
                                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;"
                                                                    align="center" valign="top">
                                                                    @if($client_presence->voyage_status == 2 && $client_presence->amount == $client_presence->ville->amount)
                                                                        <a class="badge bg-primary font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-warning" data-bs-target="#staticBackdroppaiment-{{ $client_presence->id }}">
                                                                        <i class="bx bx-money  me-1 text-white text-bold">Rembourser</i></a>
                                                                    @endif
                                                                </td>
                                                            </tr>

                                                            <tr
                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <td class="content-block"
                                                                    style="text-align: center;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0;"
                                                                    valign="top">
                                                                    <script>document.write(new Date().getFullYear())</script> © TouCki
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <!-- end table -->
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Fin du modal pour la presence du client -->



    @foreach($clients as $ticket)
        <!-- Static Backdrop Modal de l'ajout -->
        <div class="modal fade" id="staticBackdropPayer-{{$ticket->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="" id="v-pills-payment" role="tabpanel"
                                            aria-labelledby="v-pills-payment-tab">
                                            <div>
                                                <h4 class="card-title">Payment information</h4>
                                                <p class="card-title-desc">Fill all information below</p>

                                                <form action="{{ route('customer.client.paiment') }}" method="GET">
                                                    @csrf
                                                    <input type="hidden" name="siege" value="{{ $ticket->siege->id }}">
                                                    <input type="hidden" name="ville" value="{{ $ticket->ville->amount }}">
                                                    <input type="hidden" name="registered_at" value="{{ $ticket->registered_at }}">
                                                    <div>
                                                        <div class="form-check form-check-inline font-size-16">
                                                            <input class="form-check-input" type="radio"
                                                                name="paymentoptionsRadio" id="paymentoptionsRadio1"
                                                                checked>
                                                            <label class="form-check-label font-size-13"
                                                                for="paymentoptionsRadio1"><i
                                                                    class="fab fa-cc-mastercard me-1 font-size-20 align-top"></i>
                                                                Credit / Debit Card</label>
                                                        </div>
                                                        <div class="form-check form-check-inline font-size-16">
                                                            <input class="form-check-input" type="radio"
                                                                name="paymentoptionsRadio" id="paymentoptionsRadio2">
                                                            <label class="form-check-label font-size-13"
                                                                for="paymentoptionsRadio2"><i
                                                                    class="fab fa-cc-paypal me-1 font-size-20 align-top"></i>
                                                                Paypal</label>
                                                        </div>
                                                        <div class="form-check form-check-inline font-size-16">
                                                            <input class="form-check-input" type="radio"
                                                                name="paymentoptionsRadio" id="paymentoptionsRadio3">
                                                            <label class="form-check-label font-size-13"
                                                                for="paymentoptionsRadio3"><i
                                                                    class="far fa-money-bill-alt me-1 font-size-20 align-top"></i>
                                                                Cash on Delivery</label>
                                                        </div>
                                                    </div>

                                                    <h5 class="mt-5 mb-3 font-size-15">For card Payment</h5>
                                                    <div class="p-4 border">
                                                        <div class="form-group mb-0">
                                                            <label for="cardnumberInput">Card Number</label>
                                                            <input type="text" class="form-control"
                                                                id="cardnumberInput"
                                                                placeholder="0000 0000 0000 0000">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group mt-4 mb-0">
                                                                    <label for="cardnameInput">Name on card</label>
                                                                    <input type="text" class="form-control"
                                                                        id="cardnameInput"
                                                                        placeholder="Name on Card">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-group mt-4 mb-0">
                                                                    <label for="expirydateInput">Expiry date</label>
                                                                    <input type="text" class="form-control"
                                                                        id="expirydateInput" placeholder="MM/YY">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-group mt-4 mb-0">
                                                                    <label for="cvvcodeInput">CVV Code</label>
                                                                    <input type="text" class="form-control"
                                                                        id="cvvcodeInput"
                                                                        placeholder="Enter CVV Code">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="row mt-4">
                                                        <div class="col-sm-6">
                                                        <button type="button" data-bs-dismiss="modal"
                                                                class="btn text-muted d-none d-sm-inline-block btn-link">
                                                                <i class="mdi mdi-arrow-left me-1"></i> Back to Shopping Cart </button>
                                                        </div> <!-- end col -->
                                                        <div class="col-sm-6">
                                                            <div class="text-end">
                                                                <button type="submit" class="btn btn-success">
                                                                    <i class="mdi mdi-truck-fast me-1"></i> Proceed to Shipping </button>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- Fin du modal de l'ajout -->
    @endforeach
@endsection

@section('footerSection')
<!-- Responsive Table js -->
    <script src="{{asset('admin/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('admin/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

    <!-- Responsive examples -->
    <script src="{{asset('admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{asset('admin/assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{asset('admin/assets/js/app.js')}}"></script>

   
@endsection
