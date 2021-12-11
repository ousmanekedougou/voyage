@extends('user.layouts.app',['title' => 'Setting'])

@section('main-content')

     <!-- hero section start -->
    <section class="section hero-section bg-ico-hero" style="margin-top:-50px;" id="home">
        <!-- <div class="bg-overlay bg-primary"></div> -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">Yombalal Toucki Thi Biir Rewmi</h1>
                        <p class="font-size-20">
                            Le secteur du tourisme a fort à faire dans une conjoncture économique pleine de défis. Pour vous démarquer, en tant qu’agence de voyages.
                        </p>

                        <!-- <div class="button-items mt-4">
                            <a href="{{ route('agence.create') }}" class="btn btn-success">Creer votre compte agence</a>
                            <a href="{{ route('agence.index') }}" class="btn btn-light">Nos agences de transport</a>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-10 ms-lg-auto">
                   
                    <div class="overflow-hidden mb-0 mt-3 mt-lg-0">
                         <img src="{{ asset('user/assets/images/img-1.png') }}" style="width: 100%;"  alt="" srcset="">
                        <!-- <div class="card-header text-center">
                            <h5 class="mb-0">ICO Countdown time</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center">

                                <h5>Time left to Ico :</h5>
                                <div class="mt-4">
                                    <div data-countdown="2021/12/31" class="counter-number ico-countdown"></div>
                                </div>

                                <div class="mt-4">
                                    <button type="button" class="btn btn-success w-md">Get Token</button>
                                </div>

                                <div class="mt-5">
                                    <h4 class="font-weight-semibold">1 ETH = 2235 SKT</h4>
                                    <div class="clearfix mt-4">
                                        <h5 class="float-end font-size-14">5234.43</h5>
                                    </div>
                                    <div class="progress p-1 progress-xl softcap-progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 15%"
                                            aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-label">15 %</div>
                                        </div>
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="progress-label">30 %</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->



     <!-- Faqs start -->
    <section class="section" id="faqs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Informations</div>
                        <h4>Comment marche notre structure</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="vertical-nav">
                        <div class="row">
                            <div class="col-lg-2 col-sm-4">
                                <div class="nav flex-column nav-pills" role="tablist">
                                    <a class="nav-link active" id="v-pills-gen-ques-tab" data-bs-toggle="pill"
                                        href="#v-pills-gen-ques" role="tab">
                                        <i class="bx bx bx-user nav-icon d-block mb-2"></i>
                                        <p class="font-weight-bold mb-0">Clients</p>
                                    </a>
                                    <a class="nav-link" id="v-pills-token-sale-tab" data-bs-toggle="pill"
                                        href="#v-pills-token-sale" role="tab">
                                        <i class="fa fa-user-tie nav-icon d-block mb-2"></i>
                                        <p class="font-weight-bold mb-0">Agents</p>
                                    </a>
                                    <a class="nav-link" id="v-pills-roadmap-tab" data-bs-toggle="pill"
                                        href="#v-pills-roadmap" role="tab">
                                        <i class="bx bx-building d-block nav-icon mb-2"></i>
                                        <p class="font-weight-bold mb-0">Agences</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-10 col-sm-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="v-pills-gen-ques"
                                                role="tabpanel">
                                                <h4 class="card-title mb-4">General Questions</h4>

                                                <div>
                                                    <div id="gen-ques-accordion" class="accordion custom-accordion">
                                                        <div class="mb-3">
                                                            <a href="#general-collapseOne" class="accordion-list"
                                                                data-bs-toggle="collapse" aria-expanded="true"
                                                                aria-controls="general-collapseOne">

                                                                <div>What is Lorem Ipsum ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>

                                                            </a>

                                                            <div id="general-collapseOne" class="collapse show"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">Everyone realizes why a new common
                                                                        language would be desirable: one could refuse to
                                                                        pay expensive translators. To achieve this, it
                                                                        would be necessary to have uniform grammar,
                                                                        pronunciation and more common words.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapseTwo"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapseTwo">
                                                                <div>Why do we use it ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseTwo" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">If several languages coalesce, the
                                                                        grammar of the resulting language is more simple
                                                                        and regular than that of the individual
                                                                        languages. The new common language will be more
                                                                        simple and regular than the existing European
                                                                        languages.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapseThree"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapseThree">
                                                                <div>Where does it come from ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseThree" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">It will be as simple as Occidental;
                                                                        in fact, it will be Occidental. To an English
                                                                        person, it will seem like simplified English, as
                                                                        a skeptical Cambridge friend of mine told me
                                                                        what Occidental.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <a href="#general-collapseFour"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapseFour">
                                                                <div>Where can I get some ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseFour" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">To an English person, it will seem
                                                                        like simplified English, as a skeptical
                                                                        Cambridge friend of mine told me what Occidental
                                                                        is. The European languages are members of the
                                                                        same family. Their separate existence is a myth.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-token-sale" role="tabpanel">
                                                <h4 class="card-title mb-4">Token sale</h4>

                                                <div>
                                                    <div id="token-accordion" class="accordion custom-accordion">
                                                        <div class="mb-3">
                                                            <a href="#token-collapseOne"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="token-collapseOne">
                                                                <div>Why do we use it ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="token-collapseOne" class="collapse"
                                                                data-bs-parent="#token-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">If several languages coalesce, the
                                                                        grammar of the resulting language is more simple
                                                                        and regular than that of the individual
                                                                        languages. The new common language will be more
                                                                        simple and regular than the existing European
                                                                        languages.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#token-collapseTwo" class="accordion-list"
                                                                data-bs-toggle="collapse" aria-expanded="true"
                                                                aria-controls="token-collapseTwo">

                                                                <div>What is Lorem Ipsum ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>

                                                            </a>

                                                            <div id="token-collapseTwo" class="collapse show"
                                                                data-bs-parent="#token-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">Everyone realizes why a new common
                                                                        language would be desirable: one could refuse to
                                                                        pay expensive translators. To achieve this, it
                                                                        would be necessary to have uniform grammar,
                                                                        pronunciation and more common words.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#token-collapseThree"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="token-collapseThree">
                                                                <div>Where can I get some ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="token-collapseThree" class="collapse"
                                                                data-bs-parent="#token-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">To an English person, it will seem
                                                                        like simplified English, as a skeptical
                                                                        Cambridge friend of mine told me what Occidental
                                                                        is. The European languages are members of the
                                                                        same family. Their separate existence is a myth.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <a href="#token-collapseFour"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="token-collapseFour">
                                                                <div>Where does it come from ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="token-collapseFour" class="collapse"
                                                                data-bs-parent="#token-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">It will be as simple as Occidental;
                                                                        in fact, it will be Occidental. To an English
                                                                        person, it will seem like simplified English, as
                                                                        a skeptical Cambridge friend of mine told me
                                                                        what Occidental.</p>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-roadmap" role="tabpanel">
                                                <h4 class="card-title mb-4">Roadmap</h4>

                                                <div>
                                                    <div id="roadmap-accordion" class="accordion custom-accordion">

                                                        <div class="mb-3">
                                                            <a href="#roadmap-collapseOne" class="accordion-list"
                                                                data-bs-toggle="collapse" aria-expanded="true"
                                                                aria-controls="roadmap-collapseOne">



                                                                <div>Where can I get some ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>

                                                            </a>

                                                            <div id="roadmap-collapseOne" class="collapse show"
                                                                data-bs-parent="#roadmap-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">Everyone realizes why a new common
                                                                        language would be desirable: one could refuse to
                                                                        pay expensive translators. To achieve this, it
                                                                        would be necessary to have uniform grammar,
                                                                        pronunciation and more common words.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#roadmap-collapseTwo"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="roadmap-collapseTwo">
                                                                <div>What is Lorem Ipsum ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="roadmap-collapseTwo" class="collapse"
                                                                data-bs-parent="#roadmap-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">If several languages coalesce, the
                                                                        grammar of the resulting language is more simple
                                                                        and regular than that of the individual
                                                                        languages. The new common language will be more
                                                                        simple and regular than the existing European
                                                                        languages.</p>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="mb-3">
                                                            <a href="#roadmap-collapseThree"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="roadmap-collapseThree">
                                                                <div>Why do we use it ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="roadmap-collapseThree" class="collapse"
                                                                data-bs-parent="#roadmap-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">To an English person, it will seem
                                                                        like simplified English, as a skeptical
                                                                        Cambridge friend of mine told me what Occidental
                                                                        is. The European languages are members of the
                                                                        same family. Their separate existence is a myth.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <a href="#roadmap-collapseFour"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="roadmap-collapseFour">
                                                                <div>Where does it come from ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="roadmap-collapseFour" class="collapse"
                                                                data-bs-parent="#roadmap-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">It will be as simple as Occidental;
                                                                        in fact, it will be Occidental. To an English
                                                                        person, it will seem like simplified English, as
                                                                        a skeptical Cambridge friend of mine told me
                                                                        what Occidental.</p>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end vertical nav -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Faqs end -->
           
@endsection