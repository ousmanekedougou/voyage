@extends('admin.layouts.app')

@section('headsection')
    <link href="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('admin/assets/js/bootstrap-toggle.min.js')}}" ></script>
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap-toggle.css')}}" />
    <style>
        /* .invoice-container{
            padding: 2mm;
            margin: 0 auto;
            width: 58mm;
        } */
    </style> 
@endsection

@section('main-content')

    <div class="page-content">
        <div class="container-fluid sectionCompteDesktope">

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
                                                <p class="mb-2">Itineraire de </p>
                                                <p class="mb-0">
                                                    La liste des clients qui ont rates le bus
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
            </div>
            <!-- end row -->
            
            <div class="row">
                <div class="col-12">
                    <h4 class="text-center mb-2 btn btn-xs btn-primary" style="width: 100%;"> La liste des clients qui ont rates le bus</h4>
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable"
                                class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Prenom & nom</th>
                                        <th>Telephone</th>
                                        <th>Prix</th>
                                        <th>Methode</th>
                                        <th>Date</th>
                                        <th>Detail</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach($clients as $client)
                                        <tr>
                                            <td>
                                                <img src="@if($client->image == '') https://ui-avatars.com/api/?name={{$client->name}} @else {{Storage::url($client->customer->image)}} @endif" class="rounded-circle avatar-sm header-profile-use" alt="">
                                            </td>
                                            @if($client->name == null)
                                                <td>{{ $client->customer->name }}</td>
                                                <td>{{ $client->customer->phone }}</td>
                                            @else
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->phone }}</td>
                                            @endif
                                            <td>
                                                <span class="badge badge-pill badge-soft-info font-size-12">{{ $client->getAmount() }}</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-soft-primary font-size-12">
                                                    @if($client->payment_methode == 1)
                                                        <img src="{{asset('user/assets/images/wave.png')}}" alt="" class="image-methode-payment align-middle me-2"> Wave
                                                    @elseif($client->payment_methode == 2)
                                                        <img src="{{asset('user/assets/images/orange-money.png')}}" alt="" class="image-methode-payment align-middle me-2"> OM
                                                    @else
                                                        Non payer
                                                    @endif
                                                </span>
                                            </td>
                                            <td>{{ $client->registered_at }}</td>
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
                                                        @else
                                                            <p class="text-warning mb-1 font-size-15">En cours</p> 
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

            <div class="row">
                <div class="col-lg-12">
                    {{$clients->links()}}
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
                                    <img src="@if(Auth::guard('agent')->user()->agence->logo == '') https://ui-avatars.com/api/?name={{Auth::guard('agent')->user()->agence->name}} @else {{(Storage::url(Auth::guard('agent')->user()->agence->logo))}} @endif" class="rounded-circle avatar-sm" alt="">
                                </div>
                            </div>
                            <div class="media-body overflow-hidden">
                                <h5 class="text-truncate font-size-14 mb-1">{{Auth::guard('agent')->user()->agence->name}}</h5>
                                <p class="text-truncate mb-0">Siege de {{Auth::guard('agent')->user()->siege->name}}</p>
                            </div>
                            <div class="font-size-11 button-right-siege">
                                <span>{{ $clients->count() }} Client(s)</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="list-unstyled chat-list">
                    @foreach($clients as $client)
                        <li class="">
                            <a onclick="onclick().event.preventDefault()">
                                <div class="media">
                                    <div class="align-self-center me-3">
                                        <img src="
                                            @if($client->image != null)
                                                {{Storage::url($client->customer->image)}}
                                            @else
                                                @if($client->name == null)
                                                    https://ui-avatars.com/api/?name={{$client->customer->name}}
                                                @else
                                                    https://ui-avatars.com/api/?name={{$client->name}}
                                                @endif
                                            @endif" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    
                                    <div class="media-body overflow-hidden">
                                        <h5 class="text-truncate font-size-14 mb-1">
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
                                        @if(Auth::guard('agent')->user()->agence->mathod_tiket == 0)
                                            @if($client->status == 1)
                                                <span class="span-chat-siege span-chat1 badge badge badge-pill badge-soft-success"  data-bs-toggle="modal" data-bs-target="#staticBackdropPayer-{{$client->id}}" class="btn btn-success btn-sm btn-block">
                                                    @if($client->payment_methode == 1)
                                                        <img src="{{asset('user/assets/images/wave.png')}}" alt="" class="image-methode-payment align-middle me-2"> Wave
                                                    @elseif($client->payment_methode == 2)
                                                        <img src="{{asset('user/assets/images/orange-money.png')}}" alt="" class="image-methode-payment align-middle me-2"> OM
                                                    @endif

                                                    Rembourser {{$client->ville->getAmount}} 
                                                </span>
                                                
                                            @elseif($client->status == 2)
                                                <span class="span-chat-siege span-chat1 badge bg-warning">Non remboursable</span> 
                                            @endif
                                        @else
                                                <span class="span-chat-siege span-chat1 badge bg-warning">Non remboursable</span> 
                                        @endif

                                        <span class="span-chat-siege badge bg-info" data-bs-toggle="modal" data-bs-target="#subscribeModalagenceDetails-{{$client->id}}">
                                            <i class="fa fa-eye"></i> Voire
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

@section('footersection')
<!-- Responsive Table js -->

    <script src="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/select2/js/select2.min.js')}}"></script>
    <!-- Init js -->
    <script src="{{asset('admin/assets/js/pages/table-responsive.init.js')}}"></script>
    <script src="{{asset('admin/assets/js/table.js')}}"></script>


     <script>
        
        $('.toggle-class').on('change' ,function(){
            var voyage_status = $(this).prop('checked') == true ? 1 : 0;
            var client_id = $(this).data('id');
            // var amount = $(this.data('value'));
            
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: "{{ route('agent.client.presence') }}",
                data: 
                    {
                        'voyage_status': voyage_status,
                        'client_id': client_id,
                        // 'amount': amount
                    },
                success: function(data){
                    console.log('success')
                }
            });
            
        });
    </script>
   
@endsection
