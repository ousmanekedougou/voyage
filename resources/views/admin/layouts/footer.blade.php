            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        @if(Auth::guard('client')->user())
                        <div class="container">
                            <main>
                                <ul>
                                    <li class="">
                                        <a class="{{ set_active_roote('customer.home') }} " href="{{ route('customer.home') }}" id="home">
                                            <span> Home</span>
                                            <i class="bx bx-home-circle   fa-fa-item"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="{{ set_active_roote('customer.client.show') }} " href="{{ route('customer.client.show') }}" id="drop">
                                            <span>Ticket</span>
                                            <i class="bx bx-credit-card  fa-fa-item"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="{{ set_active_roote('customer.bagage.index') }} " href="{{ route('customer.bagage.index') }}" id="store">
                                            <span>Colis</span>
                                            <i class="bx bx-store-alt  fa-fa-item"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="{{ set_active_roote('customer.colis.index') }} " href="{{ route('customer.colis.index') }}" id="wishlist">
                                            <span>Bagages</span>
                                            <i class="bx bx-package  fa-fa-item"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="{{ set_active_roote('setting.index') }} dropdown-toggle" id="cart"  data-bs-toggle="dropdown" aria-expanded="false">
                                            <span>Regions</span>
                                            <i class="bx bx-map  fa-fa-item"></i>
                                        </a>
                                        <div class="dropdown-menu drop-down-mobile scrollable-menu">
                                            @foreach(region() as $region)
                                                <a href="{{ route('customer.agence.region',$region->slug) }}" class="dropdown-item" >
                                                    <i class="fa fa-city text-mueted"></i> {{$region->name}}
                                                </a>
                                            @endforeach
                                        </div>
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