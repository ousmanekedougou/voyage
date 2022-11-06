@extends('admin.layouts.app')

@section('headsection')
    <link href="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
     {{-- <style>
        .invoice-container{
            padding: 2mm;
            margin: 0 auto;
            width: 58mm;
        }
    </style> --}}
@endsection

@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

          <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="media">
                                        <div class="me-3">
                                            <img src="{{(Storage::url(Auth::guard('agent')->user()->agence->logo))}}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="text-muted">
                                                <h5 class="mb-1">Agence {{Auth::guard('agent')->user()->agence->name}}</h5>
                                                <p class="mb-2">Itineraire de {{ $getBuse->itineraire->name }}</p>
                                                <p class="mb-0">
                                                    La liste des client du buse {{ $getBuse->matricule }}
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
                                                {{-- <p class="text-muted mb-1 font-size-10"><i class=""></i> </p> --}}

                                                <div class="avatar-group">
                                                    <div class="avatar-group-item font-size-11">
                                                         <span class="badge btn-primary p-1 text-bold">Destination {{ $client->ville->name }} | {{$client->ville->amount}} f</span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top text-center">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                @if($client->voyage_status == 0)
                                                    <span class="badge bg-warning"><i class="bx bxs-check-circle me-1"></i>
                                                        Non effectuer
                                                    </span>
                                                @elseif($client->voyage_status == 1)
                                                    <span class="badge bg-success"><i class="bx bxs-x-square me-1"></i>
                                                        Present
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger"><i class="bx bxs-x-square me-1"></i>
                                                        Anuller
                                                    </span>
                                                @endif
                                                
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <a href="" data-bs-toggle="modal" data-bs-target="#subscribeModalagenceDetails-{{$client->id}}"><i class="bx bx-show me-1"></i></a>
                                            </li>
                                            
                                            <li class="list-inline-item me-3">
                                                <!-- <a href=""><i class="bx bx-block me-1"></i></a> -->
                                                <div class="form-check form-switch mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizesm" @if($client->is_active == 1) checked @endif  data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$client->id}}">
                                                    <label class="form-check-label" for="SwitchCheckSizesm"></label>
                                                </div>
                                            </li>
                                             <li class="list-inline-item me-3">
                                                <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalclient-{{ $client->id }}"><i class="bx bx-trash me-1 text-danger"></i></a>
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
                                                                                <form method="post" action="{{ route('agent.client.destroy',$client->id) }}"  style="display:flex;text-align:center;width:100%;">
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
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                           {{$clients->links()}}
                        </div>
                    </div>
                    <!-- end row -->


            {{--
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    @include('admin.layouts.search')
                                </div>
        
        
                                <div class="col-sm-8">
                                    <div class="text-sm-end">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary text-white button_ajout_client"
                                            class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-plus me-1"></i>Ajouter un client</button>
                                    </div>
                                </div><!-- end col-->
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table responsive-table align-middle table-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Num</th>
                                            <th>Nom Complet</th>
                                            <th>Telephone</th>
                                            <th>Destination</th>
                                            <th>Paiment</th>
                                            <th>Voyage</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clients as $client)
                                        <tr>
                                            <td>
                                                <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                    <img src="{{Storage::url($client->image)}}" alt="" height="30">
                                                </span>
                                            </td>
                                            <td>{{$client->customer->name}}</td>
                                            <td>
                                                <p class="mb-1">{{$client->customer->phone}}</p>
                                            </td>
                                            <td>
                                                <p class="mb-1">{{$client->ville->name}}</p>
                                            </td>
                                            <td>
                                                    
                                                    <p class="mb-1">
                                                        @if($client->amount !== $client->ville->amount && $client->amount !== 2)
                                                            <a href="" class="badge bg-primary font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#staticBackdroppaiment-{{ $client->id }}">
                                                                <i class="bx bx-money  me-1 text-white"> 0 f </i></a>
                                                        @elseif($client->amount == $client->ville->amount)
                                                            <a class="badge bg-success font-size-12 text-white" role="button"> 
                                                                {{ $client->amount }} f</i>
                                                            </a>
                                                        @endif
                                                    </p>
                                                    
                                                    <p class="mb-1">
                                                        @if($client->amount == 0)
                                                            <span class="badge bg-warning"><i class="bx bx-money  me-1 text-white"> 0 f </i></span>
                                                        @else
                                                            <span class="badge bg-success"><i class="bx bx-money  me-1 text-white"> {{$client->amount}} f</i></span>
                                                        @endif
                                                    </p>
                                            </td>

                                            <td>
                                                <p class="mb-1">
                                                    @if($client->voyage_status == 0)
                                                        <a href="" class="badge bg-primary font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $client->id }}"><i class="bx bx-highlight  me-1 text-white"> Statut</i>
                                                        </a>
                                                    @elseif($client->voyage_status == 1)
                                                        <a href="" class="badge bg-success font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $client->id }}"> 
                                                            <i class="bx bxs-check-circle me-1 text-white">Effectuer</i>
                                                        </a>
                                                    @else
                                                        <a href="" class="badge bg-danger font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalagence-{{ $client->id }}"><i class="bx bx-money me-1"></i> Non effectuer</a>
                                                    @endif
                                                </p>
                                            </td>
                                            
                                            <td>
                                                <div class="d-flex gap-3 div_button">
                                                    <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-primary" data-bs-target="#staticBackdrop-{{$client->id}}"><i class="bx bx-edit mt-1 font-size-18"></i></a>
                                                    <a href="{{ route('agent.ticker',$client->id) }}" role="button"  class="text-primary"><i class="fa fa-print mt-1 font-size-18"></i></a>
                                                    <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-suucess" data-bs-target="#subscribeModalagenceDetails-{{ $client->id }}"><i class="mdi mdi-eye font-size-18"></i></a>
                                                    <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalclient-{{ $client->id }}"><i class="mdi mdi-delete font-size-18"></i></a>
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
                                                                                    <form method="post" action="{{ route('agent.client.destroy',$client->id) }}"  style="display:flex;text-align:center;width:100%;">
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
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            {{$clients->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            --}}

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- Modal pour la presence du client -->
    @foreach($clients as $client_presence)
        <div class="modal modal-xs fade" id="subscribeModalagence-{{ $client_presence->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-4">

                            <div class="row justify-content-center">
                                <div class="col-xl-10">
                                    <h4 class="text-warning text-uppercase">Presence !</h4>
                                    <p class="text-muted font-size-14 mb-1">Etes vous sure de bien vouloire modifier la presence de {{ $client_presence->name }}</p>
                                    <p class="font-size-14 badge bg-warning text-white">Destination : {{$client_presence->ville->name}} | Somme : {{ $client_presence->ville->amount}} f</p>

                                    <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                        <form method="post" action="{{ route('agent.client.presence',$client_presence->id) }}"  style="display:block;text-align:center;width:100%;">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            <p class="text-muted font-size-14 mb-4">
                                                <div class="d-flex text-center">
                                                    <div style="margin-left: 30px;margin-right: 30px;">
                                                        <div class="form-check form-check-left">
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
                                                                name="presence" value="2" id="formRadiosRight2absence"
                                                                @if($client_presence->voyage_status == 2) checked @endif
                                                                >
                                                            <label class="form-check-label" for="formRadiosRight2absence">
                                                                Est absent
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </p>

                                            <button type="submit" class="btn btn-success btn-xs" style="margin-left: 70px;margin-right:20px;"> Oui je veux bien </button> 
                                            <button type="button" class="btn btn-danger btn-xs" data-bs-dismiss="modal" aria-label="Close"> x Anuller</button>
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
    <!-- Fin du modal pour la presence du client -->

   


        <!-- Static Backdrop Modal du paiment -->
    @foreach($clients as $client_tdy)
     <div class="modal modal-xs fade" id="staticBackdroppaiment-{{ $client_tdy->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">

                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <h4 class="text-danger text-uppercase">Attention !</h4>
                                <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire valider le paiment de {{ $client_tdy->name }}</p>
                                <p class="font-size-14 mb-4 badge bg-warning text-white">Destination : {{$client_tdy->ville->name}} | Somme : {{ $client_tdy->ville->amount}} f</p>

                                <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                    <form method="post" action="{{ route('agent.payer',$client_tdy->id) }}"  style="display:flex;text-align:center;width:100%;">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                         <input type="hidden" name="client_amount" value="{{$client_tdy->client_amount}}">
                                        <input type="hidden" name="confirmation_token" value="{{$client_tdy->confirmation_token}}">

                                        <button type="submit" class="btn btn-success btn-xs" style="margin-left: 70px;margin-right:20px;"> Oui je veux bien </button> 
                                        <button type="button" class="btn btn-danger btn-xs" data-bs-dismiss="modal" aria-label="Close"> x Anuller</button>
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
    <!-- Fin du modal du paiment -->





   


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
                                                                                <span style="float: left;">Destination : {{$client_presence->ville->name}}</span> <span style="float: right;">Date : {{$client_presence->registered_at}}</span>
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
@endsection


@section('footersection')
<!-- Responsive Table js -->
    <script src="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/select2/js/select2.min.js')}}"></script>
    <!-- Init js -->
    <script src="{{asset('admin/assets/js/pages/table-responsive.init.js')}}"></script>
    <script src="{{asset('admin/assets/js/table.js')}}"></script>
@endsection
