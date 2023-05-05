@extends('user.layouts.app',['title' => 'Client'])
@section('headSection')
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('user/assets/build/css/intlTelInput.css')}}">
    <style>
        .bg-ico-hero{
            background-image:url(../user/assets/images/agence.webp) !important;
            background-size:cover;background-position:top !important;
            height: 100px !important;
        }
        .section .container .row_pricipal{
            margin-top:-70px;
        }
        .img-fluid{
            width: 70%;
        }
    </style>
@endsection
@section('main-content')

    <!-- hero section start -->
    <section class="section hero-section bg-ico-hero section-responsive" id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center row_pricipal">
                <div class="col-lg-12 card_show text-center">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title text-center">Vérifiez toutes vos résérvations : <br> Tickets , Bagages & Colis</h1>
                        <p class="font-size-16 text-white">
                            
                        </p>
                    
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->


     <!-- currency price section start Version mobile-->
    <section class="section p-0 verification-text-mobile">
        <div class="container">
            <div class="currency-price">
                <div class="row">
                    <div class="col-md-12">
                        <div class="media">
                            <div class="media-body">
                                <h5 class="text-center">Télécharger votre ticket de bus</h5>
                                <img src="{{('../user/assets/images/dowload/downloa-ticket.svg')}}" alt="" class="img-fluid mx-auto d-block">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- currency price section end -->





  <!-- Features start -->
    <section class="section " id="features">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6 img-verification-mobile">
                    <img src="{{('../user/assets/images/dowload/email-tickets.svg')}}" alt="" class="img-fluid mx-auto d-block">
                </div>
                <div class="col-xl-4 col-md-6">
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
                                            <span style="float:left;font-weight:600;">{{ $ticket->name }}</span>
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
                                                        valign="top">Status Tiket
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
                        <div class="px-4 py-3 border-top">
                            <ul class="list-inline mb-0 text-center">
                                <li class="list-inline-item me-3">
                                    <a href="#" class="btn btn-primary waves-effect waves-light w-sm font-size-16"> <i class="mdi mdi-download"></i> Télécharger le ticket</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Features end -->

@endsection
