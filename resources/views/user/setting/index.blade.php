@extends('user.layouts.app',['title' => 'Setting'])
<link rel="stylesheet" href="{{asset('user/assets/build/css/intlTelInput.css')}}">
<style>
     .bg-ico-hero{
        background-image:url(./user/assets/images/setting.webp) !important;
        background-size:cover;background-position:top !important;
        height: 100px !important;
    }
    .section .container .row_pricipal{
        margin-top:-70px;
    }
    .settings-section-mobile{
        margin-top: -70px;
    }
    .h2-title{
        margin-bottom: 15px;
        font-size: 1.5rem;
        font-weight: 900;
    }
    .h3-title{
        font-weight: 900;
        margin-bottom: 15px;
    }
    .h4-title{
        font-weight: 900;
        margin-bottom: 15px;
    }
    p{
        font-size: 14px;
        margin-bottom: 5px;
        text-align: left;
    }
</style>
@section('main-content')

     <!-- hero section start -->
    <section class="section hero-section bg-ico-hero section-responsive" id="home">
        <div class="container">
            <div class="row align-items-center row_pricipal">
                <div class="col-lg-12 card_show">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title"> Tout savoir sur l’utilisation de votre application de TouCki</h1>
                        
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->



    <!-- Faqs start -->
    <section class="section settings-section-mobile" id="faqs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <img class="setting-img" src="{{asset('user/assets/images/faqs-bus.webp') }}" alt="" srcset="">
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="vertical-nav">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="v-pills-gen-ques"
                                                role="tabpanel">
                                                <h4 class="h4-title" class="card-title mb-4 btn btn-primary text-center" style="width: 100%;">Pour les clients</h4>
                                                <div>
                                                    <div id="gen-ques-accordion" class="accordion custom-accordion">
                                                        <div class="mb-3">
                                                            <a href="#general-collapse1Client" class="accordion-list"
                                                                data-bs-toggle="collapse" aria-expanded="true"
                                                                aria-controls="general-collapse1Client">

                                                                <div>Comment créer un compte client TouCki ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>

                                                            </a>

                                                            <div id="general-collapse1Client" class="collapse show"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <h5>Pour créer un compte client chez TouCki</h5>
                                                                    <div>
                                                                        <ul class="verti-timeline list-unstyled">
                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">1</i>
                                                                                </div>
                                                                                <p class="text-muted">Allez sur https://www.toucki.aeerk-sn.com/client-create ou téléchargez notre application TouCki sur play-Stor ou App-Stor.</p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">2</i>
                                                                                </div>
                                                                                <p class="text-muted">Saisissez votre nom prénom et nom, une adresse électronique valide, mettez votre numéro de téléphone, mettez votre numéro identification nationale.séléctione votre région,mettez votre image de profil (facultatif) et créez un mot de passe.</p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">3</i>
                                                                                </div>
                                                                                <p class="text-muted">

                                                                                Lisez attentivement les conditions d’utilisation
                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">4</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Cochez sur “Accepter” en bas des conditions d’utilisation et cliquez sur “Créer mon compte”
                                                                                </p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse2Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse2Client">
                                                                <div>Comment activer mon compte client TouCki ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse2Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <h5>La procédure d’activation d’un compte business se fait en deux étapes: </h5>
                                                                    <div>
                                                                        <ul class="verti-timeline list-unstyled">
                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">1</i>
                                                                                </div>
                                                                                <p class="text-muted">La validation par mail. <br> <br>

                                                                                    Connectez-vous à votre boîte mail et ouvrez le mail de notification envoyé par TouCki <br> <br>
                                                                                    Cliquez sur le lien de validation et marquez vos premiers pas chez TouCki

                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">2</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Important <br> <br>
                                                                                    Merci de bien vérifier que le numéro de téléphone renseigné lors de la création de votre compte PayDunya est fonctionnel et qu’il s’agit bien d’un numéro de téléphone mobile.
                                                                                </p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse3Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse3Client">
                                                                <div>Quelles sonts les fonctonnalites disponibles votre client TouCki</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse3Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <h5>Les fonctionnalités disponibles au niveau du compte client TouCki sont les suivantes : </h5>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse4Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse4Client">
                                                                <div>Comment puis je faire un reservation de ticket</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse4Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <div class="card-body">
                                                                        <h5>Systeme de reservation de ticket </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse6Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse6Client">
                                                                <div>Reception et envoi de colis ou bagage</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse6Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <div class="card-body">
                                                                        <h5>Vérifiez toutes vos résérvations : Tickets , Bagages & Colis </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse7Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse7Client">
                                                                <div>Comment paye vos ticket de bus en ligne</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse7Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <div class="card-body">
                                                                        <h5>Vérifiez toutes vos résérvations : Tickets , Bagages & Colis </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                          <div class="mb-3">
                                                            <a href="#general-collapse8Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse8Client">
                                                                <div>Systeme de remboursement de ticket en cas d'absence</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse8Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <div class="card-body">
                                                                        <h5>Vérifiez toutes vos résérvations : Tickets , Bagages & Colis </h5>
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
                            
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Responsive embed video 16:9</h4>
                                        <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>
        
                                        <!-- 16:9 aspect ratio -->
                                        <div class="ratio ratio-16x9">
                                            <iframe src="https://www.youtube.com/embed/1y_kfWUCFDQ" title="YouTube video" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                           

                            <div class="col-lg-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="v-pills-gen-ques"
                                                role="tabpanel">
                                                <h4 class="h4-title" class="card-title mb-4 btn btn-primary text-center" style="width: 100%;">Pour les agences</h4>
                                                <div>
                                                    <div id="gen-ques-accordion" class="accordion custom-accordion">
                                                        <div class="mb-3">
                                                            <a href="#general-collapseOne" class="accordion-list"
                                                                data-bs-toggle="collapse" aria-expanded="true"
                                                                aria-controls="general-collapseOne">

                                                                <div>C'est qoi TouCki ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>

                                                            </a>

                                                            <div id="general-collapseOne" class="collapse show"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">
                                                                        TouCki est une application cree 
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapseTwo"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapseTwo">
                                                                <div>Pourquoi l'utilisons-nous ?</div>
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
                                                                <div>D'où est ce que ça vient ?</div>
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
                                                                <div>Où puis-je m'en procurer ?</div>
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
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Responsive embed video 16:9</h4>
                                        <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>
        
                                        <!-- 16:9 aspect ratio -->
                                        <div class="ratio ratio-16x9">
                                            <iframe src="https://www.youtube.com/embed/1y_kfWUCFDQ" title="YouTube video" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
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
@section('footerSection')
<script>
   jQuery(document).ready(function($) {
  var alterClass = function() {
    var ww = document.body.clientWidth;
    if (ww < 600) {
      $('.setting-mobile').removeClass('flex-column');
    } else if (ww >= 601) {
      $('.setting-mobile').addClass('flex-column');
    };
  };
  $(window).resize(function(){
    alterClass();
  });
  //Fire it when the page first loads:
  alterClass();
});
</script>
@endsection