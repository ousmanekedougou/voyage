@extends('admin.layouts.app')

@section('main-content')

    <div class="page-content">
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
                                                <p class="mb-2">Gestion de vos tickets</p>
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
                                    <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">
                                        {{$ticket->siege->agence->name}}</a>
                                    </h5>
                                    <p class="text-muted mb-1"> Siege de {{ $ticket->siege->name }}</p>
                                    <p class="text-muted mb-1"> Destination {{ $ticket->ville->name }}</p>
                                    
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
                                                        valign="top">Voyage
                                                    </td>
                                                    <td class="alignright"
                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                        align="right" valign="top">
                                                        @if($ticket->voyage_status == 1)
                                                            <span class="badge bg-success">Effectue</span>
                                                        @else
                                                            <span class="badge bg-warning">Non effectue</span>
                                                        @endif
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
                                                        N : {{$ticket->bus->number}} | {{$ticket->position}} place
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
                                                        {{$ticket->ville->amount}} f
                                                    </td>
                                                </tr>
                                                <tr
                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                        valign="top">Status
                                                    </td>
                                                    <td class="alignright"
                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                        align="right" valign="top">
                                                        @if($ticket->amount == $ticket->ville->amount)
                                                            <span class="badge bg-success">Ticket Paye</span>
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
                                <p class="text-danger text-center" style="width: 100%;">Delais d'attente de paiment 24h</p>
                            @else
                                @if($ticket->status == 1)
                                    <p class="text-muted text-center" style="width: 100%;">Votre ticket a ete annuler le remboursement sera fait dans l'immedia</p>
                                @elseif($ticket->status == 2)
                                    <p class="text-danger text-center" style="width: 100%;">Votre ticket a ete annuler mais ne sera pas rembourser, car vous avez depasser le delais d'attente d'annulation</p>
                                @else
                                    <p class="text-success text-center" style="width: 100%;">Votre ticket a ete payer</p>
                                @endif
                            @endif
                        </div>
                        @if($ticket->status != 1 && $ticket->status != 2)
                            <div class="px-4 py-3 border-top">
                                <ul class="list-inline mb-0 text-center">
                                    @if($ticket->amount == $ticket->ville->amount)
                                        @if($ticket->voyage_status == 0)
                                            <li class="list-inline-item me-3">
                                                <a href="#" class="badge bg-info p-1" data-bs-toggle="modal" data-bs-target="#staticBackdropDate-{{$ticket->id}}"> <i class="fa fa-edit"></i> Renouveller la date</a>
                                            </li>
                                        @endif
                                        <li class="list-inline-item me-3">
                                            <a href="#" class="badge bg-danger p-1" data-bs-toggle="modal" data-bs-target="#staticBackdropArchiver-{{$ticket->id}}"> <i class="fa fa-trash"></i> Annuler</a>
                                        </li>
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
            <!-- currency price section end -->

            <div class="row">
                <div class="col-lg-12">
                   
                </div>
            </div>
            <!-- end row -->
         
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    
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
                                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date"
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
                                        <div class="col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="example-date-input" >Renouveller votre date de voyage</label>
                                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date"
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
                                                Renouvveler la date de ce ticket
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
                            <div class="avatar-title bg-danger rounded-circle text-white h1">
                                <i class="fa fa-trash"></i>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <h4 class="text-danger text-uppercase">Attention !</h4>
                                <p class="text-muted font-size-14 mb-4 text-left">Etes vous sure de bien vouloire anuller votre ticket de {{ $ticket->ville->name }}</p>
                                @if($ticket->siege->agence->method_ticket == 0)
                                    <p class="text-success font-size-14 mb-4 text-left">NB : Votre ticket sera rembourser apres votre annulation, et meme si vous avez reter le bus</p>
                                @else
                                    <p class="text-danger font-size-14 mb-4 text-left">NB : Votre ticket sera rembourser si toute fois vous l'avez annuler avant le depart du bus</p>
                                @endif

                                <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                    <form method="post" action="{{ route('customer.client.annuler',$ticket->id) }}"  style="display:flex;text-align:center;width:100%;">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
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
-


           
@endsection