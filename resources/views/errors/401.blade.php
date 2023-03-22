
@extends('errors.layout',['title' => '401 Error Page | Modèle d\'administration et de tableau de bord'])
@section('main-content')
<div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <h1 class="display-2 fw-medium">4<i class="bx bx-buoy bx-spin text-primary display-3"></i>1</h1>
                        <h4 class="text-uppercase">Accés non autorisé</h4>
                        <div class="mt-5 text-center">
                            @if(Auth::guard('web')->user())
                                <a class="btn btn-primary waves-effect waves-light text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg" 
                                    href="{{ route('home')}}">
                                        {{ __('Retour a votre tableau de board') }}
                                </a>
                            @elseif(Auth::guard('agence')->user())
                                <a class="btn btn-primary waves-effect waves-light text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg" 
                                    href="{{ route('agence.home')}}">
                                        {{ __('Retour a votre tableau de board') }}
                                </a>
                            @elseif(Auth::guard('agent')->user())
                                <a class="btn btn-primary waves-effect waves-light text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg" 
                                    href="{{ route('agent.home')}}">
                                        {{ __('Retour a votre tableau de board') }}
                                </a>
                            @elseif(Auth::guard('client')->user())
                                <a class="btn btn-primary waves-effect waves-light text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg" 
                                    href="{{ route('customer.home')}}">
                                        {{ __('Retour a votre tableau de board') }}
                                </a>
                            @else
                                <a class="btn btn-primary waves-effect waves-light text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg" 
                                    href="{{ route('index')}}">
                                        {{ __('Retour a la page d\'acceuil') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-6">
                    <div>
                        <img src="{{asset('admin/assets/images/error-img.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection