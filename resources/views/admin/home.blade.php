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
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">Content de te revoir !</h5>
                                        <p>Tableau de bord Ousmane Diallo</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <img src="" alt="" class="img-thumbnail rounded-circle">
                                    </div>
                                    <h5 class="font-size-15 text-truncate">Ousmane Diallo</h5>
                                    <p class="text-muted mb-0 text-truncate">
                                    </p>
                                </div>

                                <div class="col-sm-8">
                                    <div class="pt-4">

                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="font-size-15">125</h5>
                                                <p class="text-muted mb-0">Projects</p>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="font-size-15">$1245</h5>
                                                <p class="text-muted mb-0">Revenue</p>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a href="{{ route('admin.profil.show',Auth::user()->slug) }}" class="btn btn-primary waves-effect waves-light btn-sm">Votre Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Gain mensuel</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-muted">Ce mois-ci</p>
                                    <h3>70 000 000 f</h3>
                                    <p class="text-muted"><span class="text-success me-2"> 12% <i class="mdi mdi-arrow-up"></i> </span> De la période précédente</p>

                                    <div class="mt-4">
                                        <a href="#" class="btn btn-primary waves-effect waves-light btn-sm">Voir plus <i class="mdi mdi-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mt-4 mt-sm-0">
                                        <div id="radialBar-chart" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-0">Nous créons une pensée numérique, graphique et dimensionnelle.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                        @foreach($itineraires as $itineraire)
                            <h5>{{ $itineraire->name }}</h5>
                            <div class="row">
                                @foreach($itineraire->date_departs as $date)
                                    @if($date->depart_at == carbon_today())
                                        @foreach($date->buses as $bus)
                                            <h6>Bus {{ $bus->matricule }}</h6>
                                            <div class="col-md-4">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <p class="text-muted fw-medium">Total Inscrit</p>
                                                                <h4 class="mb-0">{{$bus->clients->count()}} Clients</h4>
                                                            </div>

                                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                                <span class="avatar-title">
                                                                    <i class="fa fa-users font-size-24"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <p class="text-muted fw-medium">Total Valider</p>
                                                                <h4 class="mb-0">{{ $client_today_payer->count() }} Clients</h4>
                                                            </div>

                                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                                <span class="avatar-title rounded-circle bg-primary">
                                                                    <i class="fa fa-check-double font-size-24"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <p class="text-muted fw-medium">Montant Total</p>
                                                                <h4 class="mb-0">{{ $client_total }}00000000 f</h4>
                                                            </div>

                                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                                <span class="avatar-title rounded-circle bg-primary">
                                                                    <i class="fa fa-coins font-size-24"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    <!-- end row -->

                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h4 class="card-title mb-4">Email Sent</h4>
                                <div class="ms-auto">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Week</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Month</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Year</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Social Source</h4>
                            <div class="text-center">
                                <div class="avatar-sm mx-auto mb-4">
                                    <span class="avatar-title rounded-circle bg-primary bg-soft font-size-24">
                                            <i class="mdi mdi-facebook text-primary"></i>
                                        </span>
                                </div>
                                <p class="font-16 text-muted mb-2"></p>
                                <h5><a href="#" class="text-dark">Facebook - <span class="text-muted font-16">125 sales</span> </a></h5>
                                <p class="text-muted">Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus tincidunt.</p>
                                <a href="#" class="text-primary font-16">Learn more <i class="mdi mdi-chevron-right"></i></a>
                            </div>
                            <div class="row mt-4">
                                <div class="col-4">
                                    <div class="social-source text-center mt-3">
                                        <div class="avatar-xs mx-auto mb-3">
                                            <span class="avatar-title rounded-circle bg-primary font-size-16">
                                                    <i class="mdi mdi-facebook text-white"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-15">Facebook</h5>
                                        <p class="text-muted mb-0">125 sales</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="social-source text-center mt-3">
                                        <div class="avatar-xs mx-auto mb-3">
                                            <span class="avatar-title rounded-circle bg-info font-size-16">
                                                    <i class="mdi mdi-twitter text-white"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-15">Twitter</h5>
                                        <p class="text-muted mb-0">112 sales</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="social-source text-center mt-3">
                                        <div class="avatar-xs mx-auto mb-3">
                                            <span class="avatar-title rounded-circle bg-pink font-size-16">
                                                    <i class="mdi mdi-instagram text-white"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-15">Instagram</h5>
                                        <p class="text-muted mb-0">104 sales</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">Activity</h4>
                            <ul class="verti-timeline list-unstyled">
                                <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle font-size-18"></i>
                                    </div>
                                    <div class="media">
                                        <div class="me-3">
                                            <h5 class="font-size-14">22 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                Responded to need “Volunteer Activities
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle font-size-18"></i>
                                    </div>
                                    <div class="media">
                                        <div class="me-3">
                                            <h5 class="font-size-14">17 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                Everyone realizes why a new common language would be desirable... <a href="#">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list active">
                                    <div class="event-timeline-dot">
                                        <i class="bx bxs-right-arrow-circle font-size-18 bx-fade-right"></i>
                                    </div>
                                    <div class="media">
                                        <div class="me-3">
                                            <h5 class="font-size-14">15 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                Joined the group “Boardsmanship Forum”
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle font-size-18"></i>
                                    </div>
                                    <div class="media">
                                        <div class="me-3">
                                            <h5 class="font-size-14">12 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                Responded to need “In-Kind Opportunity”
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="text-center mt-4"><a href="#" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Top Cities Selling Product</h4>

                            <div class="text-center">
                                <div class="mb-4">
                                    <i class="bx bx-map-pin text-primary display-4"></i>
                                </div>
                                <h3>1,456</h3>
                                <p>San Francisco</p>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table align-middle table-nowrap">
                                    <tbody>
                                        <tr>
                                            <td style="width: 30%">
                                                <p class="mb-0">San Francisco</p>
                                            </td>
                                            <td style="width: 25%">
                                                <h5 class="mb-0">1,456</h5></td>
                                            <td>
                                                <div class="progress bg-transparent progress-sm">
                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 94%" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Los Angeles</p>
                                            </td>
                                            <td>
                                                <h5 class="mb-0">1,123</h5>
                                            </td>
                                            <td>
                                                <div class="progress bg-transparent progress-sm">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="mb-0">San Diego</p>
                                            </td>
                                            <td>
                                                <h5 class="mb-0">1,026</h5>
                                            </td>
                                            <td>
                                                <div class="progress bg-transparent progress-sm">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Dernière transaction</h4>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-check">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;" class="align-middle">
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th class="align-middle">Order ID</th>
                                            <th class="align-middle">Billing Name</th>
                                            <th class="align-middle">Date</th>
                                            <th class="align-middle">Total</th>
                                            <th class="align-middle">Payment Status</th>
                                            <th class="align-middle">Payment Method</th>
                                            <th class="align-middle">Livraison Method</th>
                                            <th class="align-middle">Details</th>
                                            <th class="align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                    <label class="form-check-label" for="orderidcheck01"></label>
                                                </div>
                                            </td>
                                            <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td>
                                            <td>Ousmane Diallo</td>
                                            <td>
                                                Le 12-09-46774
                                            </td>
                                            <td>
                                               90000 f
                                            </td>
                                            <td>
                                                    <span class="badge badge-pill badge-soft-success font-size-12">Rétrofacturation</span>
                                            </td>
                                            <td>
                                                <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                            </td>
                                            <td>
                                                    <span class="badge badge-pill badge-soft-success font-size-12">A Livre</span>
                                            </td>
                                            <td class="text-center">
                                                <!-- Button trigger modal -->
                                                <a href="javascript:void(0);" role="button" aria-disabled="true" class="text-primary text-center" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                                    <i class="mdi mdi-eye font-size-18"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <a href="javascript:void(0);" class="text-success"  data-bs-toggle="modal" data-bs-target=".orderEditModal"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <form  id="delete-form" method="post" action=""  style="display:none">
                                                        {{csrf_field()}}
                                                        {{method_field('delete')}}
                                                    </form>
                                                    <a  href="javascript:void(0);" onclick=" if(confirm('Etes Vous sure de supprimer cette commande ?')){  event.preventDefault();document.getElementById('delete-form').submit();
                        
                                                    }else{event.preventDefault();} " class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <ul class="pagination pagination-rounded justify-content-end mb-2">
                                <li class="page-item disabled">
                                    <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                        <i class="mdi mdi-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                                <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                        <i class="mdi mdi-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- subscribeModal -->
    <!-- <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <div class="avatar-md mx-auto mb-4">
                            <div class="avatar-title bg-light rounded-circle text-primary h1">
                                <i class="mdi mdi-email-open"></i>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <h4 class="text-primary">Subscribe !</h4>
                                <p class="text-muted font-size-14 mb-4">Subscribe our newletter and get notification to stay update.</p>

                                <div class="input-group bg-light rounded">
                                    <input type="email" class="form-control bg-transparent border-0" placeholder="Enter Email address" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    
                                    <button class="btn btn-primary" type="button" id="button-addon2">
                                        <i class="bx bxs-paper-plane"></i>
                                    </button>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end modal -->

           
@endsection