@extends('admin.layouts.app')

@section('headsection')
    <link href="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Historique de vos clients</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-4 ">
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
                                                            <form id="search-form" action="{{ route('admin.historique.search') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="hidden_date" value="2">
                                                               <input data-parsley-type="number" type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                                                required placeholder="Numero de telephone" />
                                                                @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </form>
                                                                    <a href="" onclick="
                                                                    event.preventDefault();document.getElementById('search-form').submit();
                                                                    
                                                                    "><i class="bx bx-search-alt search-icon"></i>
                                                                </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col-->
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table responsive-table align-middle table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Num</th>
                                                        <th>Prenom et nom</th>
                                                        <th>Telephone</th>
                                                        <th>Ville</th>
                                                        <th>Date voyage</th>
                                                        <th>Paiment</th>
                                                        <th>Presence</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($clients as $client)
                                                    <tr>
                                                        <td>
                                                            {{$client->id}}
                                                        </td>
                                                        <td>{{$client->name}}</td>
                                                        <td>
                                                            <p class="mb-1">{{$client->phone}}</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1">{{$client->ville_name}}</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1">{{$client->registered_at }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1">
                                                                @if($client->voyage_status == 1)
                                                                    <a class="badge bg-primary font-size-12" role="button">
                                                                    <i class="bx bx-money  me-1 text-white text-bold">{{$client->amount}}</i></a>
                                                                @elseif($client->voyage_status == 2)
                                                                    <a class="badge bg-primary font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-warning" data-bs-target="#staticBackdroppaiment-{{ $client->id }}">
                                                                    <i class="bx bx-money  me-1 text-white text-bold">Rembourser</i></a>
                                                                @elseif($client->voyage_status == 3)
                                                                    <a class="badge bg-success font-size-12" role="button">
                                                                    <i class="text-white text-bold"> A ete rembourser</i></a>
                                                                @endif
                                                            </p>
                                                        </td>

                                                        <td>
                                                            <p class="mb-1">
                                                                @if($client->voyage_status == 1)
                                                               <a class="badge bg-success font-size-12" role="button"> 
                                                                    <i class="bx bxs-check-circle me-1 text-white">A Voyage</i>
                                                                        
                                                                </a>
                                                                @else
                                                                <a class="badge bg-danger font-size-12" role="button" ><i class="fa fa-user-times me-1 text-white"> Etait Absent</i></a>
                                                                @endif
                                                            </p>
                                                        </td>
                                                         <td>
                                                               <p class="mb-1">
                                                                    <a class="badge bg-success font-size-12" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-warning" data-bs-target="#subscribeModalagence-{{ $client->id }}">
                                                                        <i class="fa fa-eye  me-1 text-white"> Voire</i></a>
                                                            </p>
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
                                            <span class="text-muted">Detail du client {{ $client_presence->name }}</span>
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
                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <td class="content-wrap aligncenter"
                                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; color: #495057;background-color: #fff;"
                                                                    align="center" valign="top">
                                                                    <table width="100%" cellpadding="0" cellspacing="0"
                                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                        <tr
                                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                            <td class="content-block"
                                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                                                                                valign="top">
                                                                                <h6 class="aligncenter"
                                                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif; box-sizing: border-box; font-size: 18px; color: #000; line-height: 1.2em; font-weight: 400; text-align: center; margin: 40px 0 0;"
                                                                                    align="center">Detail du client {{ $client_presence->name }}
                                                                                </h6>
                                                                            </td>
                                                                        </tr>
                                                                        <tr
                                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                            <td class="content-block aligncenter"
                                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0;"
                                                                                align="center" valign="top">
                                                                                <table class="invoice"
                                                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 90%; margin: 10px auto;">
                                                                                    <tr
                                                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                                                                                            valign="top">
                                                                                            <br
                                                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif,;font-weight:bold; box-sizing: border-box; font-size: 14px; margin: 0;" />Ville : {{$client_presence->ville_name}}
                                                                                            <br
                                                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif,;font-weight:bold; box-sizing: border-box; font-size: 14px; margin: 0;" />Date de depart : {{$client_presence->registered_at}}
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
                                                                                                        {{$client_presence->email}}
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
                                                                                                        {{$client_presence->phone}}
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
                                                                                                        {{$client_presence->cni}}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                 <tr
                                                                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                                        valign="top">Presence
                                                                                                    </td>
                                                                                                    <td class="alignright"
                                                                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                                        align="right" valign="top">
                                                                                                        @if($client_presence->voyage_status == 1)
                                                                                                            A voyager
                                                                                                        @else
                                                                                                            N'a pas voyager
                                                                                                        @endif
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr
                                                                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                                        valign="top">Ticker
                                                                                                    </td>
                                                                                                    <td class="alignright"
                                                                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                                        align="right" valign="top">
                                                                                                        {{$client_presence->amount}} f
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
                                                                                @if($client_presence->voyage_status == 2)
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
                                    <div class="avatar-md mx-auto mb-4">
                                        <div class="avatar-title bg-warning rounded-circle text-white h1">
                                            <i class="fa fa-exclamation-circle"></i>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-xl-10">
                                            <h4 class="text-danger">Attention !</h4>
                                            <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire bien rembourser le client {{ $client_tdy->name }}
                                                d'une somme de <span class="badge bg-info font-size-12">{{$client_tdy->amount}}f</span>
                                            </p>

                                            <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                <form action="{{ route('admin.historique.rembourser',$client_tdy->id) }}" method="post">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                                    <input type="hidden" name="client_amount" value="{{$client_tdy->amount}}">

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
                <!-- Fin du modal du paiment -->




@endsection


@section('footersection')
<!-- Responsive Table js -->
    <script src="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/select2/js/select2.min.js')}}"></script>
    <!-- Init js -->
    <script src="{{asset('admin/assets/js/pages/table-responsive.init.js')}}"></script>
     <script src="{{asset('admin/assets/js/table.js')}}"></script>
@endsection