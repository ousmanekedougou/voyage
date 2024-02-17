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
    <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

    <div class="page-content">
        <div class="container-fluid sectionCompteDesktope">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="media">
                                        <div class="me-3">
                                            <img src="{{(Storage::url(Auth::guard('agent')->user()->agence->logo))}}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="text-muted">
                                                <h5 class="mb-1">Agence {{Auth::guard('agent')->user()->agence->name}}</h5>
                                                <p class="mb-2">Itineraire de {{ $getBuse->itineraire->name }}</p>
                                            </div>
                                        </div>
                                        <div class="page-title-right ajout-client-lg">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item">
                                                    <a data-bs-toggle="modal" data-bs-target="#staticBackdropAjoutClient" class="btn btn-success text-white btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                        class="mdi mdi-plus me-1"></i> Ajouter un client</a>
                                                </li>
                                            </ol>
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
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center"> La liste de tout les client du buse {{ $getBuse->matricule }} </h4>
                            <p class="card-title-desc">
                                <div class="button-items">
                                    <a target="_blank" href="{{ route('agent.client.jour',$getBuse->id) }}" class="btn btn-primary waves-effect btn-label waves-light"><i class="fa fa-users label-icon"></i> Clients du jour <i class="mdi mdi-eye font-size-16"></i></a>
                                </div>
                            </p>
                            <table id="datatable"
                                class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Images</th>
                                        <th>Prenom & nom</th>
                                        <th>Telephone</th>
                                        <th>Ville</th>
                                        <th>Date</th>
                                        <th>Prix</th>
                                        <th>Methode</th>
                                        <th>Detail</th>
                                        <th>Presence</th>
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
                                            {{ $client->ville->name }}
                                            </td>
                                            <td>
                                                {{$client->registered_at}}
                                            </td>
                                            <td>
                                                @if($client->amount == $client->ville->amount)
                                                    <span class="badge badge-pill badge-soft-info font-size-12">{{ $client->ville->getAmount() }}</span>
                                                @else
                                                    <span class="badge badge-pill badge-soft-warning font-size-12">Non Payer</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($client->amount == $client->ville->amount)
                                                    @if($client->payment_methode == 1)
                                                        <span class="badge badge-pill badge-soft-success font-size-12"><i class="fab fa-cc-mastercard me-1"></i> Wave</span>
                                                    @elseif($client->payment_methode == 2)
                                                        <span class="badge badge-pill badge-soft-success font-size-12"><i class="fab fa-cc-mastercard me-1"></i> Orange Money</span>
                                                    @else
                                                        <span class="badge badge-pill badge-soft-success font-size-12"><i class="fab fa-cc-mastercard me-1"></i> Free Money</span>
                                                    @endif
                                                @else
                                                    <a class="badge badge-pill badge-soft-warning font-size-12">Non payer <i class="fab fa-cc-mastercard me-1"></i></a>
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target="#subscribeModalagenceDetails-{{$client->id}}">
                                                    Details
                                                </button>
                                            </td>
                                            <td>
                                                @if($client->status == 0)
                                                    <div class="d-flex gap-3">
                                                        <input 
                                                        onclick="event.preventDefault();
                                                        document.getElementById('updatePresence-{{ $client->id }}').submit();" 
                                                        type="checkbox" id="switch-{{ $client->id }}" switch="bool" 
                                                        {{ $client->voyage_status ? 'checked' : '' }} />
                                                        <label for="switch-{{ $client->id }}" data-on-label="Oui" data-off-label="Non"></label>
                                                        <form id="updatePresence-{{ $client->id }}" action="{{ route('agent.client.presence') }}" method="POST">
                                                            @csrf  
                                                            @method('PUT')
                                                            <input type="hidden" name="client_id" value="{{ $client->id }}">
                                                            <input type="hidden" name="voyage_status" value="{{ $client->voyage_status }}">
                                                            <input type="hidden" name="amount" value="{{ $client->amount }}">
                                                        </form>
                                                    </div>
                                                @elseif($client->status == 1)
                                                    <span class="badge badge-pill badge-soft-warning font-size-12 mt-1"><i class="dripicons-cross"></i> Annuler</span>
                                                @endif
                                                </td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    @if($client->customer_id == null)
                                                        @if($client->status == 1)
                                                            <span class="badge badge-pill badge-soft-warning font-size-12 mt-1"><i class="dripicons-cross"></i> Annuler</span>
                                                        @else
                                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdropUpdateClient-{{ $client->id }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdropDeleteClient-{{ $client->id }}" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                                        @endif
                                                    @else
                                                        <span class="badge badge-pill badge-soft-success font-size-12 mt-1"><i class="bx bx-bell bx-tada me-1"></i> abonné</span>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{--
                        <a href="{{ route('agent.send_sms') }}" class="btn btn-primary text-white mt-2" style="width:100%;"> <i class="bx bxs-chat"> </i> Un message au absent du jour</a>
                        --}}
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->

        <div class="tab-pane show active sectionCompteMobile" id="chat">
            <div>
                <ul class="list-unstyled chat-list">
                    <li class="mb-4">
                        <div class="media">
                            <div class="align-self-center me-3">
                                <div class="align-self-center me-3">
                                    <i class="fa fa-road" style="font-size: 25px;"></i>
                                </div>
                            </div>
                            <div class="media-body overflow-hidden">
                                <h5 class="text-truncate font-size-14 mb-1">{{$getBuse->itineraire->name}}</h5>
                                <p class="text-truncate mb-0">{{ $getBuse->number }} {{ $getBuse->number == 1 ? 'er' : 'em' }} Buse | Matricule: {{ $getBuse->matricule }}</p>
                            </div>
                            <div class="font-size-11 button-right-siege">
                                <span>{{ $clients->count() }} Client(s)</span>
                                <span data-bs-toggle="modal" data-bs-target="#staticBackdropAjoutClient" class="badge bg-primary mt-2 font-size-10"><i class="fa fa-plus"></i> Ajouter</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="list-unstyled chat-list">
                        <div class="font-size-14 mb-2">
                            <span onclick="location.href='{{route('agent.client.jour',$getBuse->id)}}'" class="badge bg-info btn btn-block" style="width:100%;"><i class="fa fa-users"></i> Clients du Jour</span>
                        </div>
                    <br>
                    @foreach($clients as $client)
                        <li class="" >
                            <a onclick="onclick().event.preventDefault()">
                                <div class="media">
                                    <div class="align-self-center me-3">
                                        @if($client->image != Null)
                                            <img src="{{Storage::url($client->image)}}" class="rounded-circle avatar-xs" alt="">
                                        @else
                                            <img src="{{asset('admin/assets/images/users/profil.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                        @endif
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
                                        @if($client->amount == $client->ville->amount)
                                            <span class="span-chat-siege span-chat1 badge bg-success">
                                                {{ $client->amount }} f Payé
                                            </span>
                                        @else
                                            <span class="span-chat-siege span-chat1 badge bg-warning">
                                                {{ $client->amount }} f Non payé
                                            </span>
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
                                <span class="text-muted">Detail du ticket de @if($client_presence->name == null) {{ $client_presence->customer->name }} @else {{ $client_presence->name }} @endif</span>
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
                                                                                            @if($client_presence->email == null)
                                                                                                {{$client_presence->customer->email}}
                                                                                            @else
                                                                                                {{$client_presence->email}}
                                                                                            @endif
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
                                                                                            @if($client_presence->phone == null)
                                                                                                {{$client_presence->customer->phone}}
                                                                                            @else
                                                                                                {{$client_presence->phone}}
                                                                                            @endif
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
                                                                                            @if($client_presence->cni == null)
                                                                                                {{$client_presence->customer->cni}}
                                                                                            @else
                                                                                                {{$client_presence->cni}}
                                                                                            @endif
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
                                                                                                {{$client_presence->getAmount()}}
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


    @foreach($clients as $client)
        {{-- La partie suppression des clients --}}
        <div class="modal modal-xs fade" id="staticBackdropDeleteClient-{{ $client->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                    <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer {{ $client->name }}</p>

                                    <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                        <form method="post" action="{{ route('agent.client.destroy',$client->id) }}"  style="display:flex;text-align:center;width:100%;">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
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

        {{-- la partie de la modification des clients --}}
        <div class="modal fade" id="staticBackdropUpdateClient-{{ $client->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modifier le client {{ $client->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <form class="custom-validation" action="{{ route('agent.client.update',$client->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="getBus" value="{{$getBuse->id}}">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="mb-3">
                                            <label class="form-label">Prenom et nom du client</label>
                                            <div>
                                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $client->name }}" required autocomplete="name"
                                                placeholder="Prenom et nom du client" />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Adresse email du client (facultatif)</label>
                                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $client->email }}" required autocomplete="email"
                                                placeholder="Adresse email du client (facultatif)" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Numero de telephone</label>
                                            <div>
                                                <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $client->phone }}" autocomplete="phone"
                                                    required placeholder="Numero de telephone" />
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Le numero CNI du client</label>
                                            <div>
                                                <input data-parsley-type="number" type="number" id="cni" class="form-control @error('cni') is-invalid @enderror" name="cni" value="{{ old('cni') ?? $client->cni }}" autocomplete="cni"
                                                    required placeholder="Le numero CNI du client" />
                                                    @error('cni')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                                <label class="form-label">Entre la ville de voyage</label>
                                                <div class="col-md-12">
                                                    <select class="form-control select2 @error('ville') is-invalid @enderror" name="ville" required autocomplete="ville" required>
                                                        <option>Entre une ville</option>
                                                            @foreach($getBuse->siege->itineraires as $itineraire)
                                                                <optgroup label="{{$itineraire->name}}">
                                                                    @foreach($itineraire->villes as $ville)
                                                                        <option value="{{ $ville->id }}" @if($ville->id == $client->ville->id) selected @endif>{{$ville->name}}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            @endforeach
                                                        
                                                    </select>
                                                    @error('ville')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        
                                            <div class="mb-3 row">
                                                <label class="form-label" for="example-date-input" >Votre date de voyage</label>
                                                <div class="col-md-12">
                                                    <input name="date" class="form-control @error('date') is-invalid @enderror " type="date" value="{{ old('date') ?? $client->registered_at }}"
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
                                            Enregistrer le bus
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

        {{-- Partie pour envoyer des lien de paiment en ligne --}}
        <div class="modal modal-xs fade" id="staticBackdropSendSmsClient-{{ $client->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                    <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer {{ $client->name }}</p>

                                    <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                        <form method="post" action="{{ route('agent.client.destroy',$client->id) }}"  style="display:flex;text-align:center;width:100%;">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
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
    @endforeach



    <div class="modal fade" id="staticBackdropAjoutClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter un nouveau client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        <form class="custom-validation" action="{{ route('agent.client.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="getBus" value="{{$getBuse->id}}">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="mb-3">
                                        <label class="form-label">Prenom et nom du client</label>
                                        <div>
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                            placeholder="Prenom et nom du client" />
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Adresse email du client (facultatif)</label>
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Adresse email du client (facultatif)" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                        <label class="form-label">Le numero CNI du client</label>
                                        <div>
                                            <input data-parsley-type="number" type="number" id="cni" class="form-control @error('cni') is-invalid @enderror" name="cni" value="{{ old('cni') }}" autocomplete="cni"
                                                required placeholder="Le numero CNI du client" />
                                                @error('cni')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                            <label class="form-label">Entrez la ville de voyage</label>
                                            <div class="col-md-12">
                                                <select class="form-control select2 @error('ville') is-invalid @enderror" name="ville" required autocomplete="ville" required>
                                                    <option>Entre une ville</option>
                                                        @foreach($getBuse->siege->itineraires as $itineraire)
                                                            <optgroup label="{{$itineraire->name}}">
                                                                @foreach($itineraire->villes as $ville)
                                                                    <option value="{{ $ville->id }}">{{$ville->name}}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    
                                                </select>
                                                @error('ville')
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
                                        Enregistrer le bus
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
@endsection

@section('footerSection')
<!-- Responsive Table js -->
  <!-- Required datatable js -->
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


     <script>
        
        $('.toggle-class').on('change' ,function(){
            var voyage_status = $(this).prop('checked') == true ? 1 : 0;
            var client_id = $(this).data('id');
            var amount = $(this.data('amount'));
            
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: "{{ route('agent.client.presence') }}",
                data: 
                    {
                        'voyage_status': voyage_status,
                        'client_id': client_id,
                        'amount': amount
                    },
                success: function(data){
                    console.log('success')
                }
            });
            
        });
    </script>
   
@endsection
