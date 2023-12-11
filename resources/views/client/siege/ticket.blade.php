@extends('admin.layouts.app')
@section('headSection')
    <link href="{{asset('admin/assets/css/format_ticket_mobile.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('main-content')

    <div class="page-content" id="ticket-contente-page">
        <div class="container-fluid">

            <!-- start page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="media">
                                        <div class="me-3">
                                            <img src="{{(Storage::url(Auth::guard('client')->user()->image))}}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="text-muted">
                                                <h5 class="mb-1">TouCki</h5>
                                                <p class="mb-2">Géstion de vos tickets</p>
                                                <p class="mb-0">
                                                    Client
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 align-self-center">
                                    <div class="text-lg-center mt-4 mt-lg-0">
                                        
                                    </div>
                                </div>
    
                                <div class="col-lg-4 d-lg-block">
                                    
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- currency price section start-->
            <div class="row">
                @foreach($tickets as $ticket)
                    <div class="col-xl-4 col-sm-6">
                        <div class="card @if($ticket->status == 1) bg-warning text-white @elseif($ticket->status == 2) bg-light @endif">
                            <div class="card-body ">
                                <div class="media">
                                    <div class="avatar-md me-4">
                                        <span class="avatar-title rounded-circle bg-light text-danger">
                                            @if($ticket->siege->agence->logo != '')
                                                <!-- height="30" pour l'image -->
                                                <img src="{{Storage::url($ticket->siege->agence->logo)}}"  alt="" class="avatar-md rounded-circle img-thumbnail">
                                            @else
                                                <i class="fa fa-bus"></i>
                                            @endif
                                        </span>
                                    </div>

                                    <div class="media-body overflow-hidden">
                                        <h5 class="text-truncate font-size-15"><a href="#" class="@if($ticket->status == 1) text-white @else text-muted @endif">
                                            {{$ticket->siege->agence->name}}</a>
                                        </h5>
                                        <p class="@if($ticket->status == 1) text-white @else text-muted @endif mb-1"> Siege de {{ $ticket->siege->name }}</p>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="invoice " style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 90%; margin: 10px auto;">
                                        <tr
                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; width:100%;"
                                                valign="top">
                                                <br style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif,;font-weight:bold; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                                <span style="float:left;font-weight:600;">{{ $ticket->customer->name }}</span>
                                                <span style="float:right;font-weight:600;">Date : {{$ticket->registered_at}}</span>
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
                                                            valign="top">Déstination
                                                        </td>
                                                        <td class="alignright"
                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                            align="right" valign="top">
                                                            {{ $ticket->ville->name }}
                                                        </td>
                                                    </tr>
                                                    
                                                
                                                    <tr
                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                            valign="top">Bus {{$ticket->bus->number}} , Matricule : {{$ticket->bus->matricule}}
                                                        </td>
                                                        <td class="alignright"
                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                            align="right" valign="top">
                                                            {{$ticket->position}}{{ $ticket->position == 1 ? 'ere' : 'eme' }} place
                                                        </td>
                                                    </tr>
                                                    <tr
                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                            valign="top">Prix
                                                        </td>
                                                        <td class="alignright"
                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                            align="right" valign="top">
                                                            {{$ticket->ville->getAmount()}}
                                                        </td>
                                                    </tr>
                                                    <tr
                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                            valign="top">Status Voyage
                                                        </td>
                                                        <td class="alignright"
                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                            align="right" valign="top">
                                                            @if($ticket->voyage_status == 1)
                                                                <span class="badge bg-success">Effectue</span>
                                                            @elseif($ticket->voyage_status == 0)
                                                                <span class="badge bg-warning">Non effectue</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr
                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                            valign="top">Status Ticket
                                                        </td>
                                                        <td class="alignright"
                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                            align="right" valign="top">
                                                            @if($ticket->amount == $ticket->ville->amount)
                                                                <span class="badge bg-success">Ticket Paye</span>
                                                                @if($ticket->status > 0)
                                                                    <span class="badge bg-danger">Anuller</span>
                                                                @endif
                                                            @else
                                                                <span class="badge bg-warning">Tiket Non Paye</span>
                                                            @endif
                                                        </td>
                                                        
                                                    </tr>
                                                    
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="border-top @if($ticket->status == 1) bg-warning text-white @elseif($ticket->status == 2) bg-light @endif" style="margin-top: -30px;">
                                @if($ticket->amount != $ticket->ville->amount)
                                    <p class="text-success text-center pt-3" style="width: 100%;font-weight:600;">Délais d'attente de paiment du ticket est de 24h</p>
                                @else
                                    @if($ticket->status == 1)
                                        <p class="text-white text-center mt-3" style="width: 100%; font-weight:700;">Votre ticket a ete annuler le remboursement sera fait dans l'immedia</p>
                                    @elseif($ticket->status == 2)
                                        <p class="text-danger text-center mt-3" style="width: 100%; font-weight:700;">Votre ticket a ete annuler mais ne sera pas rembourser, car vous avez depasser le delais d'attente d'annulation</p>
                                    @else
                                        <p class="text-success text-center mt-3" style="width: 100%; font-weight:700;">Votre ticket a ete payer  <a href="{{ route('customer.ticker_pdf',$ticket->id) }}" class="badge bg-success p-1"> <i class="fa fa-download"></i> Ticket</a> </p>
                                    @endif
                                @endif
                            </div>
                            @if($ticket->status == 0)
                                <div class="px-4 py-3 border-top">
                                    <ul class="list-inline mb-0 text-center">
                                        @if($ticket->amount == $ticket->ville->amount)
                                            @if($ticket->voyage_status == 0)
                                                <li class="list-inline-item me-3">
                                                    <a href="#" class="badge bg-info p-1" data-bs-toggle="modal" data-bs-target="#staticBackdropDate-{{$ticket->id}}"> <i class="fa fa-calendar-alt"></i> Repporter</a>
                                                </li>
                                                <li class="list-inline-item me-3">
                                                    <a href="#" class="badge bg-primary p-1" data-bs-toggle="modal" data-bs-target="#staticBackdropRevendre-{{$ticket->id}}"> <i class="fa fa-reply-all "></i> Revendre</a>
                                                </li>
                                                <li class="list-inline-item me-3">
                                                    <a href="#" class="badge bg-warning p-1" data-bs-toggle="modal" data-bs-target="#staticBackdropArchiver-{{$ticket->id}}"> <i class="fa fa-trash-restore-alt "></i> Annuler</a>
                                                </li>
                                            @elseif($ticket->voyage_status == 1)
                                                <li class="list-inline-item me-3">
                                                    <a href="#" class="badge bg-info p-1" data-bs-toggle="modal" data-bs-target="#staticBackdropDate-{{$ticket->id}}"> <i class="fa fa-edit"></i> Modifier</a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="list-inline-item me-3">
                                                <a href="#" class="badge bg-info p-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$ticket->id}}"> <i class="fa fa-edit"></i> Modifier</a>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <a href="#" class="badge bg-success p-1" data-bs-toggle="modal" data-bs-target="#staticBackdropPayer-{{$ticket->id}}"> <i class="fa fa-ticket-alt"></i> Payer</a>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <a href="#" class="badge bg-danger p-1" data-bs-toggle="modal" data-bs-target="#staticBackdropSupprimer-{{$ticket->id}}"> <i class="fa fa-trash"></i> Supprimer</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <div class="aside">
        <aside class="app">
            <div class="screen-wrap">
                <section class="screen-bus">
                {{--
                    <div class="screen-bus__location-filter-wrap">
                        <div class="screen-bus__location-filter-row">
                        <div class="screen-bus__location">
                            <div class="screen-bus__location-row">
                            <span class="screen-bus__location-col">{{Auth::guard('client')->user()->name}}</span>
                            <span class="screen-home__rs-arrow"></span>
                            <span class="screen-bus__location-col"></span>
                            </div>
                            <div class="screen-bus__date-row">
                            <span>Wed, 10/ 12/ 2019</span> - <span>Fri, 12/ 12/ 2019</span>
                            </div>
                        </div>
                        <div class="screen-bus__filter">
                            <figure>
                                <img src="https://i.ibb.co/ZJt9tkM/filter.png">
                            </figure>
                        </div>
                        </div>
                    </div>
                --}}

                    <div class="screen-bus__travels-wrap">
                        <div class="screen-bus__travels-row">
                            @foreach($tickets as $ticket)
                                <div class="screen-bus__travels-col
                                    @if($ticket->voyage_status == 1) bg-success text-white @endif
                                ">
                                    <div class="screen-bus__name-time-seat">
                                        <div class="screen-bus__name-wrap">
                                            <span class="screen-bus__name">{{ $ticket->siege->agence->name }}</span>
                                            <span class="screen-bus__type @if($ticket->voyage_status == 1) bg-success text-white @endif"><i class="bx bx-map fa-item"></i> {{ $ticket->siege->name }}</span>
                                        </div>
                                        <div class="screen-bus__time-wrap">
                                            <div class="screen-bus__time">
                                                <div class="screen-bus__start"> {{ $ticket->bus->getTimeStart() }}</div>
                                                <div class="screen-bus__time-arrow-wrap">
                                                    <span class="screen-bus__time-arrow"></span>
                                                </div>
                                                <div class="screen-bus__end">{{ $ticket->bus->getTimeEnd() }}</div>
                                            </div>
                                            <div class="screen-bus__hrs">
                                                <span class="@if($ticket->voyage_status == 1) bg-success text-white @endif"> <i class="fa fa-road fa-item "></i> {{ $ticket->ville->name }}</span>
                                            </div>
                                        </div>
                                        <div class="screen-bus__seat-wrap">
                                            <div>
                                                {{ $ticket->registered_at }}
                                            </div>
                                            <div class="screen-bus__payment">
                                                <span class="@if($ticket->voyage_status == 1) bg-success text-white @endif">
                                                    @if($ticket->payment_methode == 1)
                                                        <img src="{{asset('user/assets/images/wave.png')}}" alt="" class="image-methode-payment align-middle me-2"> Wave
                                                    @elseif($ticket->payment_methode == 2)
                                                        <img src="{{asset('user/assets/images/orange-money.png')}}" alt="" class="image-methode-payment align-middle me-2"> Orange Money
                                                    @else
                                                        <img src="{{asset('user/assets/images/image.png')}}" alt="" class="image-methode-payment align-middle me-2"> Non payé
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="screen-bus__rating-price">
                                        <div class="screen-bus__rating-price-row">
                                            @if($ticket->status == 0)
                                                <div class="screen-bus__rating">
                                                    <ul class="screen-bus__rating-row ul_fomat_mobile">
                                                        <li class="li_fomat_mobile"><figure><a href="#" title="Details ticket" class="p-1 @if($ticket->voyage_status == 1) bg-success text-white @endif text-success " data-bs-toggle="modal" data-bs-target="#staticBackdropView-{{$ticket->id}}"> <i class="fa fa-eye"></i></a></figure></li>
                                                        @if($ticket->amount == $ticket->ville->amount)
                                                            @if($ticket->voyage_status == 0)
                                                                <li class="li_fomat_mobile"><figure><a href="#" title="Renouvellement date" class="p-1 text-info" data-bs-toggle="modal" data-bs-target="#staticBackdropDate-{{$ticket->id}}"> <i class="fa fa-calendar-alt"></i></a></figure></li>
                                                                <li class="li_fomat_mobile"><figure><a href="#" title="Transferer ticket" class="p-1 text-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropRevendre-{{$ticket->id}}"> <i class="fa fa-reply-all"></i></a></figure></li>
                                                                <li class="li_fomat_mobile"><figure><a href="#" title="Anuller ticket" class="p-1 text-warning" data-bs-toggle="modal" data-bs-target="#staticBackdropArchiver-{{$ticket->id}}"> <i class="fa fa-trash-restore-alt "></i></a></figure></li>
                                                            @elseif($ticket->voyage_status == 1)
                                                                <li class="li_fomat_mobile"><figure><a href="#" class="p-1 text-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropDate-{{$ticket->id}}"> <i class="fa fa-edit"></i></a></figure></li>
                                                            @endif
                                                        @else
                                                            <li class="li_fomat_mobile"><figure><a href="#" title="Modifier ticket"  class="p-1 text-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$ticket->id}}"> <i class="fa fa-edit"></i></a></figure></li>
                                                            <li class="li_fomat_mobile"><figure><a href="#" title="Payer ticket" class="p-1 text-success" data-bs-toggle="modal" data-bs-target="#staticBackdropPayer-{{$ticket->id}}"> <i class="fa fa-ticket-alt"></i></a></figure></li>
                                                            <li class="li_fomat_mobile"><figure><a href="#" title="Supprimer ticket" class="p-1 text-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropSupprimer-{{$ticket->id}}"> <i class="fa fa-trash"> </i> </a></figure></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="screen-bus__price">
                                                    <span class="badge p-1 @if( $ticket->getAmount() == $ticket->ville->getAmount()) bg-success @else bg-warning @endif ">
                                                        @if($ticket->getAmount() == $ticket->ville->getAmount())
                                                            <a href="{{ route('customer.ticker_pdf',$ticket->id) }}" class="badge bg-success p-1"> {{$ticket->getAmount()}} : Ticket payé <i class="fa fa-download"></i></a>
                                                        @else
                                                            {{$ticket->ville->getAmount()}} : Ticket non payé
                                                        @endif
                                                    </span>
                                                </div>
                                            @else
                                                <div class="screen-bus__rating">
                                                    <ul class="screen-bus__rating-row ul_fomat_mobile">
                                                        <li class="li_fomat_mobile"><figure><a href="#" title="Details ticket" class="p-1 @if($ticket->voyage_status == 1) bg-success text-white @endif text-success " data-bs-toggle="modal" data-bs-target="#staticBackdropView-{{$ticket->id}}"> <i class="fa fa-eye"></i></a></figure></li>
                                                        <li class="li_fomat_mobile text-center"><figure class="badge p-1 bg-warning"> Vous avez anuller ce ticket de {{ $ticket->getAmount()}} </figure></li>
                                                        <li class="li_fomat_mobile text-center"><figure class="badge p-1 bg-primary"> Ticket payé </figure></li>
                                                    </ul>
                                                </div>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </aside>
    </div>

    
    @foreach($tickets as $ticket)
        <!-- Static Backdrop Modal de l'ajout -->
            <div class="modal fade" id="staticBackdrop-{{$ticket->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel text-center">Modifier ce ticket {{ $ticket->siege->name }} </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                                <p class="text-bold text-center">
                                    <span class="text-warning">Attention:</span> la modification n'est possible qu'avant le paiement de votre ticker
                                </p>
                                <p>
                                    <form class="custom-validation" action="{{ route('customer.client.update',$ticket->id) }}" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validation()">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-3 row">
                                                    <label class="form-label">Selectionner votre ville de voyage</label>
                                                    <div class="col-md-12">
                                                        <select class="form-control select2 @error('ville') is-invalid @enderror" name="ville" required autocomplete="ville" required>
                                                            <option>Select</option>
                                                            
                                                                @foreach($ticket->siege->itineraires as $itineraire)
                                                                    <optgroup label="{{$itineraire->name}}">
                                                                        @foreach($itineraire->villes as $ville)
                                                                            <option value="{{ $ville->id }}"
                                                                            @if($ville->id == $ticket->ville->id) selected @endif
                                                                            >{{$ville->name}}</option>
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
                                            
                                                <div class="mb-3">
                                                    <label class="form-label" for="example-date-input" >Votre date de voyage</label>
                                                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') ?? $ticket->registered_at}}" required autocomplete="date"
                                                        id="example-date-input" />
                                                    @error('date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                    Modifier votre ticket
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

    @foreach($tickets as $ticket)
        <!-- Static Backdrop Modal de l'ajout -->
            <div class="modal fade" id="staticBackdropDate-{{$ticket->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel text-center">Renouvellement de la date ce ticket pour {{ $ticket->siege->name }} </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                                <p class="text-bold text-center">
                                    <span class="text-warning">Attention:</span> vous ne pouvez modifier que la date de votre voayage
                                </p>
                                <p>
                                    <form class="custom-validation" action="{{ route('customer.client.renew',$ticket->id) }}" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validation()">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <div class="row">
                                            <input type="hidden" name="current_date" value="{{ $ticket->registered_at }}">
                                            <input type="hidden" name="amount" value="{{ $ticket->amount }}">
                                            <input type="hidden" name="ville" value="{{ $ticket->ville->id }}">
                                            <div class="col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="example-date-input" >Renouveller votre date de voyage</label>
                                                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') ?? $ticket->registered_at}}" required autocomplete="date"
                                                        id="example-date-input" />
                                                    @error('date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                    Renouveler la date de ce ticket
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

    @foreach($tickets as $ticket)
    <!-- Static Backdrop Modal de l'ajout -->
        <div class="modal fade" id="staticBackdropRevendre-{{$ticket->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel text-center">Vente d'un ticket </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <p class="text-bold text-center">
                                <span class="text-warning">Attention:</span> etes vous sur de vouloire revendre ce ticket
                            </p>
                            <p>
                                <form class="custom-validation" action="{{ route('customer.client.revente',$ticket->id) }}" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validation()">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <div class="row">
                                        <input type="hidden" name="current_date" value="{{ $ticket->registered_at }}">
                                        <input type="hidden" name="amount" value="{{ $ticket->amount }}">
                                        <input type="hidden" name="ville" value="{{ $ticket->ville->id }}">
                                        <div class="col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="example-phone-input" >Entrez le numero de telephone du client a revendre</label>
                                                <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                                                     id="example-phone-input" />
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                Validez la vente de votre ticket
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
  

    @foreach($tickets as $ticket)
        <div class="modal modal-xs fade" id="staticBackdropArchiver-{{ $ticket->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <div class="avatar-md mx-auto mb-4">
                                <div class="avatar-title bg-warning rounded-circle text-white h1">
                                    <i class="fa fa-trash"></i>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-xl-10">
                                    <h4 class="text-warning text-uppercase">Attention !</h4>
                                    <p class="text-warning font-size-14 mb-4 text-left">Etes vous sure de bien vouloire anuller votre ticket de {{ $ticket->ville->name }}, car il ne sera plus utilisable apres l'annulation.</p>
                                    @if($ticket->siege->agence->method_ticket == 0)
                                        <p class="text-success font-size-14 mb-4 text-left">NB : Ce ticket est remborsable apres votre annulation</p>
                                    @else
                                        <p class="text-warning font-size-14 mb-4 text-left">NB : Votre ticket sera rembourser si toute fois vous l'avez annuler avant le depart du bus</p>
                                    @endif

                                    <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                        <form method="post" action="{{ route('customer.client.annuler',$ticket->id) }}"  style="display:flex;text-align:center;width:100%;">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            <button type="submit" class="btn btn-warning btn-xs" style="margin-left: 70px;margin-right:20px;"> Oui je veux bien </button> 
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

    @foreach($tickets as $ticket)
        <div class="modal modal-xs fade" id="staticBackdropSupprimer-{{ $ticket->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                    <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer ce ticket de {{ $ticket->ville->name }}</p>

                                    <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                        <form method="post" action="{{ route('customer.client.destroy',$ticket->id) }}"  style="display:flex;text-align:center;width:100%;">
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


    @foreach($tickets as $ticket)
    <!-- Static Backdrop Modal de l'ajout -->
        <div class="modal fade" id="staticBackdropView-{{$ticket->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel text-center">Details de votre ticket </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <p>
                                <div class="card @if($ticket->status == 1) bg-warning text-white @elseif($ticket->status == 2) bg-light @endif">
                                    <div class="card-body ">
                                        <div class="media">
                                            <div class="avatar-md me-4">
                                                <span class="avatar-title rounded-circle bg-light text-danger">
                                                    @if($ticket->siege->agence->logo != '')
                                                        <!-- height="30" pour l'image -->
                                                        <img src="{{Storage::url($ticket->siege->agence->logo)}}"  alt="" class="avatar-md rounded-circle img-thumbnail">
                                                    @else
                                                        <i class="fa fa-bus"></i>
                                                    @endif
                                                </span>
                                            </div>

                                            <div class="media-body overflow-hidden">
                                                <h5 class="text-truncate font-size-15"><a href="#" class="@if($ticket->status == 1) text-white @else text-muted @endif">
                                                    {{$ticket->siege->agence->name}}</a>
                                                </h5>
                                                <p class="@if($ticket->status == 1) text-white @else text-muted @endif mb-1"> Siege de {{ $ticket->siege->name }}</p>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <table class="invoice " style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 90%; margin: 10px auto;">
                                                <tr
                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; width:100%;"
                                                        valign="top">
                                                        <br style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif,;font-weight:bold; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                                        <span style="float:left;font-weight:600;">{{ $ticket->customer->name }}</span>
                                                        <span style="float:right;font-weight:600;">Date : {{$ticket->registered_at}}</span>
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
                                                                    valign="top">Déstination
                                                                </td>
                                                                <td class="alignright"
                                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                    align="right" valign="top">
                                                                    {{ $ticket->ville->name }}
                                                                </td>
                                                            </tr>
                                                            
                                                        
                                                            <tr
                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                    valign="top">Bus {{$ticket->bus->number}} , Matricule : {{$ticket->bus->matricule}}
                                                                </td>
                                                                <td class="alignright"
                                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                    align="right" valign="top">
                                                                    {{$ticket->position}}{{ $ticket->position == 1 ? 'ere' : 'eme' }} place
                                                                </td>
                                                            </tr>
                                                            <tr
                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                    valign="top">Prix
                                                                </td>
                                                                <td class="alignright"
                                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                    align="right" valign="top">
                                                                    {{$ticket->ville->getAmount()}}
                                                                </td>
                                                            </tr>
                                                            <tr
                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                    valign="top">Status Voyage
                                                                </td>
                                                                <td class="alignright"
                                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                    align="right" valign="top">
                                                                    @if($ticket->voyage_status == 1)
                                                                        <span class="badge bg-success">Effectue</span>
                                                                    @elseif($ticket->voyage_status == 0)
                                                                        <span class="badge bg-warning">Non effectue</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr
                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                    valign="top">Status Ticket
                                                                </td>
                                                                <td class="alignright"
                                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                    align="right" valign="top">
                                                                    @if($ticket->amount == $ticket->ville->amount)
                                                                        <span class="badge bg-success">Ticket Paye</span>
                                                                        @if($ticket->status > 0)
                                                                            <span class="badge bg-danger">Anuller</span>
                                                                        @endif
                                                                    @else
                                                                        <span class="badge bg-warning">Tiket Non Paye</span>
                                                                    @endif
                                                                </td>
                                                                
                                                            </tr>
                                                            
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="border-top @if($ticket->status == 1) bg-warning text-white @elseif($ticket->status == 2) bg-light @endif" style="margin-top: -30px;">
                                        @if($ticket->amount != $ticket->ville->amount)
                                            <p class="text-success text-center pt-3" style="width: 100%;font-weight:600;">Délais d'attente de paiment du ticket est de 24h</p>
                                        @else
                                            @if($ticket->status == 1)
                                                <p class="text-white text-center pt-3" style="width: 100%; font-weight:600;">Votre ticket a ete annuler le remboursement sera fait dans l'immedia</p>
                                            @elseif($ticket->status == 2)
                                                <p class="text-danger text-center pt-3" style="width: 100%; font-weight:600;">Votre ticket a ete annuler mais ne sera pas rembourser, car vous avez depasser le delais d'attente d'annulation</p>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </p>
                        </div>
                </div>
            </div>
        </div>
    <!-- Fin du modal de l'ajout -->
    @endforeach


    @foreach($tickets as $ticket)
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
                                                        <h4 class="card-title text-center">Payer votre ticket avec !</h4>
                                                        <div class="mt-5 mb-2">

                                                            <div class="row">
                                                                <div class="col-xl-6 col-sm-4">
                                                                    <label class="card-radio-label mb-3">
                                                                        <div class="card-radio">
                                                                            <a href="{{ route('customer.ticket.show',$ticket->id) }}">
                                                                                <img src="{{asset('user/assets/images/wave.png')}}" alt="" class="rounded avatar-sm">
                                                                                <span class="text-muted">Wave Sénégal</span>
                                                                            </a>
                                                                        </div>
                                                                    </label>
                                                                </div>

                                                                <div class="col-xl-6 col-sm-4">
                                                                    <label class="card-radio-label mb-3">
                                                                        <div class="card-radio">
                                                                            <a href="{{ route('customer.ticket.edit',$ticket->id) }}">
                                                                                <img src="{{asset('user/assets/images/orange-money.png')}}" alt="" class="rounded avatar-sm">
                                                                            <span class="text-muted">Orange Money</span>
                                                                            </a>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
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
    <script src="{{asset('admin/assets/js/TweenMax.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/TweenMax-jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/format_ticket_mobile.js')}}"></script>
@endsection