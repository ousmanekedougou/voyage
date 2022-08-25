@extends('admin.layouts.app')

@section('headsection')

@endsection

@section('main-content')

                <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Customers</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Customers</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-sm-4">
                                            <div class="search-box me-2 mb-2 d-inline-block">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Search...">
                                                    <i class="bx bx-search-alt search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-sm-end">
                                                <button type="button"
                                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                        class="mdi mdi-plus me-1"></i> New Customers</button>
                                            </div>
                                        </div><!-- end col-->
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NomComplet</th>
                                                    <th>Telephone / Email</th>
                                                    <th>Address</th>
                                                    <th>Notation</th>
                                                    <th>Portefeuille</th>
                                                    <th>Inscription</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($costomers as $costomer)
                                                <tr>
                                                    <td>
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="customerlistcheck08">
                                                            <label class="form-check-label"
                                                                for="customerlistcheck08"></label>
                                                        </div>
                                                    </td>
                                                    <td>{{$costomer->name}}</td>
                                                    <td>
                                                        <p class="mb-1">{{$costomer->phone}}</p>
                                                        <p class="mb-0">{{$costomer->email}}</p>
                                                    </td>

                                                    <td>
                                                      {{$costomer->address}}
                                                    </td>
                                                    <td><span class="badge bg-success font-size-12"><i
                                                                class="mdi mdi-star me-1"></i> 4.1</span></td>
                                                    <td>$5,2870</td>
                                                    <td>{{ $costomer->created_at }}</td>
                                                    <td>
                                                        <div class="d-flex gap-3">

                                                            <a href="javascript:void(0);" role="button" aria-disabled="true" data-bs-toggle="modal" class="text-danger" data-bs-target="#subscribeModalcostomer-{{ $costomer->id }}"><i class="mdi mdi-delete font-size-18"></i></a>
                                                            <div class="modal modal-xs fade" id="subscribeModalcostomer-{{ $costomer->id }}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
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
                                                                                        <p class="text-muted font-size-14 mb-4">Etes vous sure de bien vouloire supprimer ce client</p>

                                                                                        <div class="input-group bg-white rounded text-center" style="text-align:center;">
                                                                                            <form method="post" action="{{ route('admin.costomer.destroy',$costomer->id) }}"  style="display:flex;text-align:center;width:100%;">
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
                                    <ul class="pagination pagination-rounded justify-content-end mb-2">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                                <i class="mdi mdi-chevron-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link"
                                                href="javascript: void(0);">1</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
                <!-- End Page-content -->

                <!-- Modal -->
                @foreach($costomers as $costomer)
                    <div class="modal fade orderEditCostomerModal-{{ $costomer->id }}" tabindex="-1" role="dialog" aria-labelledby=orderdetailsModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center mb-4">
                                        <div class="avatar-md mx-auto mb-4">
                                            <div class="avatar-title bg-light rounded-circle text-primary h1">
                                                <img src="{{ asset('admin/assets/images/users/profil.jpg') }}" alt="" class="img-thumbnail rounded-circle">
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <h4 class="text-primary">{{$costomer->name}}</h4>
                                                <p class="text-muted font-size-14 mb-4">
                                                    @if($costomer->isActive == 1)
                                                        Ce compte est actif
                                                    @else
                                                        Ce compte est desactive
                                                    @endif
                                                </p>

                                                <div class="input-group bg-white rounded">
                                                        <form  id="update-form-{{$costomer->id}}" method="post" action="{{ route('admin.costomer.update',$costomer->id) }}">
                                                            <div class="form-check form-switch form-switch-lg mb-3" dir="ltr" style="width: 100%;">
                                                                <input class="form-check-input" name="isActive" type="checkbox" id="SwitchCheckSizelg"
                                                                @if($costomer->isActive == 1)
                                                                    checked
                                                                @endif
                                                                >
                                                                <label class="form-check-label" for="SwitchCheckSizelg">Option d'activation du compte</label>
                                                            </div>
                                                            {{csrf_field()}}
                                                            {{method_field('PUT')}}
                                                        </form>
                                                        <a  href="" onclick=" if(confirm('Etes Vous sure de que la commande a ete payer ?')){  event.preventDefault();document.getElementById('update-form-{{$costomer->id}}').submit();
                            
                                                        }else{event.preventDefault();} " class="btn btn-success btn-block" style="width: 100%;"><i class="fas fa-credit-card me-2"></i>Enregistre la modification</a>
                                                        
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- end modal -->



@endsection


@section('footersection')

@endsection