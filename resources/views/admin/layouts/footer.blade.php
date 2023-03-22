            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        @if(Auth::guard('client')->user())
                        <div class="container">
                            <main>
                                <ul>
                                    <li class="{{ set_active_roote_bottom_bar('customer.home') }} ">
                                        <a  href="{{ route('customer.home') }}" id="home">
                                            <span> Home</span>
                                            <i class="bx bx-home-circle   fa-fa-item"></i>
                                        </a>
                                    </li>

                                    <li class="{{ set_active_roote_bottom_bar('customer.client.show') }} ">
                                        <a  href="{{ route('customer.client.show') }}" id="drop">
                                            <span>Ticket</span>
                                            <i class="bx bx-credit-card  fa-fa-item"></i>
                                        </a>
                                    </li>

                                    <li class="{{ set_active_roote_bottom_bar('customer.bagage.index') }} ">
                                        <a  href="{{ route('customer.colis.index') }}" id="store">
                                            <span>Colis</span>
                                            <i class="bx bx-store-alt  fa-fa-item"></i>
                                        </a>
                                    </li>

                                    <li class="{{ set_active_roote_bottom_bar('customer.colis.index') }} ">
                                        <a  href="{{ route('customer.bagage.index') }}" id="wishlist">
                                            <span>Bagages</span>
                                            <i class="bx bx-package  fa-fa-item"></i>
                                        </a>
                                    </li>

                                    <li class="{{ set_active_roote_bottom_bar('setting.index') }}">
                                            <a class="header-item noti-icon right-bar-toggle" id="nav-toggle">
                                                <span>Regions</span>
                                                <i class="bx bx-map fa-fa-item"></i>
                                            </a>
                                    </li>
                                </ul>
                            </main>
                        </div>
                       @endif
                        
                        <div class="col-sm-6 footer-info-mobile">
                            <script>document.write(new Date().getFullYear())</script> © TouCki
                        </div>
                        <div class="col-sm-6 footer-info-mobile">
                            <div class="text-sm-end d-none d-sm-block">
                                Develop by KdgWeb
                            </div>
                        </div>
                        
                        
                    </div>
                </div>

                <div class="right-bar">
                    <div data-simplebar class="h-100">
                        <div class="rightbar-title d-flex align-items-center px-3 py-4">

                            <h5 class="m-0 me-2">Agences d'autres regions</h5>

                            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                                <i class="mdi mdi-close noti-icon"></i>
                            </a>
                        </div>

                        <!-- Settings -->
                        @foreach(region() as $region)
                            <hr class="" />
                            <div class="p-1">
                                <a href="{{ route('customer.agence.region',$region->slug) }}" class="region-list">
                                    <i class="bx bx-map align-middle me-2"></i> {{$region->name}}
                                </a>
                            </div>
                        @endforeach

                    </div> <!-- end slimscroll-menu-->
                </div>
                
            </footer>
            {{--
            @if(Auth::guard('agent')->user())
            <!-- Static Backdrop Modal de l'ajout -->
            <div class="modal fade" id="FooterstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="FooterstaticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="FooterstaticBackdropLabel">Ajouter un client</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                                <p>
                                    <form class="custom-validation" action="{{ route('agent.client.store') }}" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validation()">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Prenom et nom du client</label>
                                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                                                        placeholder="Prenom et nom du client" />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">E-Mail du client</label>
                                                    <div>
                                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" parsley-type="email"
                                                            placeholder="E-Mail du client" />
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
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
                                                    <label class="form-label">Numero de votre CNI</label>
                                                    <div>
                                                        <input data-parsley-type="number" type="number" id="cni" class="form-control @error('cni') is-invalid @enderror" name="cni" value="{{ old('cni') }}" autocomplete="cni"
                                                            required placeholder="Numero de votre CNI" />
                                                            @error('cni')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="form-label">Selectionner ville de voyage</label>
                                                    <div class="col-md-12">
                                                        <select class="form-control select2 @error('ville') is-invalid @enderror" name="ville" required autocomplete="ville" required>
                                                            <option>Select</option>
                                                            @foreach(itineraire_all() as $itineraire)
                                                                <optgroup label="{{$itineraire->name}}">
                                                                    @foreach($itineraire->villes as $ville)
                                                                        <option value="{{ $ville->id }}">{{$ville->name}}</option>
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
                                                    <label class="form-label">Selectionner une date</label>
                                                    <div class="col-md-12">
                                                        <select  class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="date" required>
                                                            
                                                                @foreach(itineraire_all() as $itineraire)
                                                                    <optgroup label="{{$itineraire->name}}">
                                                                        @foreach($itineraire->date_departs as $date)
                                                                            @if($date->buses->count() >= 1)
                                                                                <option value="{{ $date->id }}"> le {{ $date->depart_at }}</option>
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
            @endif
           --}}

            @section('footersection')
            @show