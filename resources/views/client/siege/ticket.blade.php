@extends('admin.layouts.app')

@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Tableau de bord</h4>
                    </div>
                </div>
            </div>

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
                                                <p class="mb-2">Bienvenue sur votre compte client</p>
                                                <h5 class="mb-1">TouCki</h5>
                                                <p class="mb-0">
                                                    Client
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 align-self-center">
                                    <div class="text-lg-center mt-4 mt-lg-0">
                                        <div class="row">
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Total Agences</p>
                                                    <h5 class="mb-0"></h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Total Sieges</p>
                                                    <h5 class="mb-0">10</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Newsletter</p>
                                                    <h5 class="mb-0">10</h5>
                                                    
                                                </div>
                                            </div>
                                        </div>
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
                    <div class="card @if($ticket->voyage_status == 1) bg-success @endif">
                        <div class="card-body">
                            <div class="media">
                                <div class="avatar-md me-4">
                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                        <!-- height="30" pour l'image -->
                                        <img src="{{Storage::url($siege->agence->logo)}}"  alt="" style="width: 100%;height:auto;border-radius:100%;">
                                    </span>
                                </div>

                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">
                                        {{$siege->agence->name}}</a>
                                    </h5>
                                    <p class="text-muted mb-1"> Siege de {{ $siege->name }}</p>
                                    <p class="text-muted mb-1"> Destination {{ $ticket->ville->name }}</p>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <table class="invoice" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 90%; margin: 10px auto;">
                                    <tr
                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                                            valign="top">
                                            <br style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif,;font-weight:bold; box-sizing: border-box; font-size: 14px; margin: 0;" />Date de depart : {{$ticket->registered_at}}
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
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top">
                            <ul class="list-inline mb-0 text-center">
                                <li class="list-inline-item me-3">
                                    <a href="#" class="badge bg-info p-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$ticket->id}}"> <i class="fa fa-edit"></i> Modifier</a>
                                </li>
                                <li class="list-inline-item me-3">
                                    <a href="#" class="badge bg-success p-1" data-bs-toggle="modal" data-bs-target="#staticBackdropPayer-{{$ticket->id}}"> <i class="fa fa-ticket-alt"></i> Payer</a>
                                </li>
                                <li class="list-inline-item me-3">
                                    <a href="#" class="badge bg-danger p-1" data-bs-toggle="modal" data-bs-target="#staticBackdropSupprimer-{{$ticket->id}}"> <i class="fa fa-trash"></i> Annuler</a>
                                </li>
                            </ul>
                        </div>
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
                        <h5 class="modal-title" id="staticBackdropLabel text-center">Modifier ce ticket {{ $siege->name }} </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <p class="text-bold text-center">
                                <span class="text-warning">Attention:</span> la modification n'est possible qu'avant le paiement de votre ticker
                            </p>
                            <p>
                                <form class="custom-validation" action="{{ route('customer.client.update',$ticket) }}" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validation()">
                                      {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="mb-3 row">
                                                <label class="form-label">Selectionner votre ville de voyage</label>
                                                <div class="col-md-12">
                                                    <select class="form-control select2 @error('ville') is-invalid @enderror" name="ville" required autocomplete="ville" required>
                                                        <option>Select</option>
                                                        
                                                            @foreach($siege->itineraires as $itineraire)
                                                                <optgroup label="{{$itineraire->name}}">
                                                                    @foreach($itineraire->villes as $ville)
                                                                        <option value="{{ $ville->id }}"
                                                                        @if($ville->id == $ticket->ville->id) selected @endif
                                                                        >{{$ville->name}}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            @endforeach
                                                        
                                                    </select>
                                                    @error('siege')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        
                                            <div class="mb-3 row">
                                                <label class="form-label">Selectionner une date de votre voyage</label>
                                                <div class="col-md-12">
                                                    <select  class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="date" required>
                                                        
                                                            @foreach($siege->itineraires as $itineraire)
                                                                <optgroup label="{{$itineraire->name}}">
                                                                    @foreach($itineraire->date_departs as $date)
                                                                        @if($date->depart_at >= carbon_today())
                                                                            @if($date->buses->count() >= 1)
                                                                                <option value="{{ $date->id }}"> le {{$date->depart_at}}</option>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </optgroup>
                                                            @endforeach
                                                    </select>
                                                    @error('date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                Enregistrer Ce Client
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
-


           
@endsection