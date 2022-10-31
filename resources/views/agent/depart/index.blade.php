@extends('admin.layouts.app')

@section('headsection')
   <!-- Responsive Table css -->
    <link href="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('admin/assets/css/table.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Definire une date pour chaque itineraire</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        @foreach(itineraire_all() as $itineraire)
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <!-- <div class="search-box me-2 mb-2 d-inline-block">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="Search...">
                                                        <i class="bx bx-search-alt search-icon"></i>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="text-sm-end">
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$itineraire->id}}" class="btn btn-primary text-white"
                                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                            class="mdi mdi-plus me-1"></i>Ajouter une date pour {{ $itineraire->name }}</button>
                                                </div>
                                            </div><!-- end col-->
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table responsive-table align-middle table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Num</th>
                                                        <th>Date depart</th>
                                                        <th>Heure rendez-vous</th>
                                                        <th>Heure depart</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($itineraire->date_departs as $date)
                                                    <tr>
                                                        <td>
                                                           {{$date->id}}
                                                        </td>
                                                        <td>
                                                            <p class="mb-1">{{ $date->depart_at }}</p>
                                                        </td>

                                                        <td>
                                                            <span class="badge bg-primary font-size-12"><i class="mdi mdi-star me-1"></i> {{ $date->rendez_vous }}</span>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-success font-size-12"><i class="mdi mdi-star me-1"></i> {{ $date->depart_time }}</span>
                                                        </td>
                                                        
                                                        <td>
                                                            <div class="d-flex gap-3 div_button">
                                                                <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-primary" data-bs-target="#staticBackdropeditdate-{{$date->id}}"><i class="bx bx-edit mt-1 font-size-18"></i></a>
                                                                <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModaldate-{{ $date->id }}"><i class="mdi mdi-delete font-size-18"></i></a>
                                                                <div class="modal modal-xs fade" id="subscribeModaldate-{{ $date->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                                                                            <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer cette date</p>

                                                                                            <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                                                                <form method="post" action="{{ route('agent.depart.destroy',$date->id) }}"  style="display:flex;text-align:center;width:100%;">
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
                                                            
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        @endforeach
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Modal de la modification -->
                @foreach($itineraires as $itineraire)
                    @foreach($itineraire->date_departs as $edit_itineraire)
                        <div class="modal fade" id="staticBackdropeditdate-{{$edit_itineraire->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modifier cette date {{ $edit_itineraire->itineraire->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <div class="modal-body">
                                            <p>
                                                <form class="custom-validation" action="{{ route('agent.depart.update',$edit_itineraire->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    {{Method_field('PUT')}}
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <input type="hidden" name="itineraire" value="{{ $edit_itineraire->itineraire->id }}">
                                                            <div class="mb-3">
                                                                <label class="form-label">Date du vayage</label>
                                                                <input type="date" 
                                                                    id="example-date-input" class="form-control @error('date_depart') is-invalid @enderror" name="date_depart" value="{{ old('date_depart') ?? $edit_itineraire->depart_at}}" required autocomplete="date_depart"
                                                                    placeholder="Date du vayage" />
                                                                @error('date_depart')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Heure du rendez-vous</label>
                                                                <div>
                                                                    <input  type="time"
                                                                    id="example-time-input"  class="form-control @error('heure_rv') is-invalid @enderror" name="heure_rv" value="{{ old('heure_rv') ?? $edit_itineraire->rendez_vous}}" autocomplete="heure_rv"
                                                                        required placeholder="Heure du rendez-vous" />
                                                                        @error('heure_rv')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Heur de depart</label>
                                                                <div>
                                                                    <input  type="time"
                                                                    id="example-time-input"  class="form-control @error('heure_dep') is-invalid @enderror" name="heure_dep" value="{{ old('heure_dep') ?? $edit_itineraire->depart_time}}" autocomplete="heure_dep"
                                                                        required placeholder="Heur de depart" />
                                                                        @error('heure_dep')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-wrap gap-2">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                                Enregistrer cette itineraire
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
                    @endforeach
                @endforeach
                <!-- Fin du modal de la modification -->

             


                


            <!-- Static Backdrop Modal de l'ajout -->
             @foreach($itineraires as $itineraire)
                <div class="modal fade" id="staticBackdrop-{{$itineraire->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Ajouter une date pour {{ $itineraire->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>
                                        <form class="custom-validation" action="{{ route('agent.depart.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <input type="hidden" name="itineraire" value="{{ $itineraire->id }}">
                                                    <div class="mb-3">
                                                        <label class="form-label">Date du vayage</label>
                                                        <input type="date" 
                                                            id="example-date-input" class="form-control @error('date_depart') is-invalid @enderror" name="date_depart" value="{{ old('date_depart') }}" required autocomplete="date_depart"
                                                            placeholder="Date du vayage" />
                                                        @error('date_depart')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Heure du rendez-vous</label>
                                                        <div>
                                                            <input  type="time"
                                                            id="example-time-input"  class="form-control @error('heure_rv') is-invalid @enderror" name="heure_rv" value="{{ old('heure_rv') }}" autocomplete="heure_rv"
                                                                required placeholder="Heure du rendez-vous" />
                                                                @error('heure_rv')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Heur de depart</label>
                                                        <div>
                                                            <input  type="time"
                                                            id="example-time-input"  class="form-control @error('heure_dep') is-invalid @enderror" name="heure_dep" value="{{ old('heure_dep') }}" autocomplete="heure_dep"
                                                                required placeholder="Heur de depart" />
                                                                @error('heure_dep')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">
                                                        Enregistrer Cette itineraire
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
                
            @endforeach
            <!-- Fin du modal de l'ajout -->


            <!-- _____________________________________________________________________ -->

  



@endsection


@section('footersection')
    <!-- Responsive Table js -->
    <script src="{{asset('admin/assets/libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script>

    <!-- Init js -->
    <script src="{{asset('admin/assets/js/pages/table-responsive.init.js')}}"></script>
    <script src="{{asset('admin/assets/js/table.js')}}"></script>
@endsection