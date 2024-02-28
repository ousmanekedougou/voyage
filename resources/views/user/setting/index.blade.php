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
                        <h1 class="text-white font-weight-semibold mb-3 hero-title"> Comment marche votre plateforme</h1>
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
                        <img class="setting-img" src="{{asset('user/assets/images/infos.jpg') }}" alt="" srcset="">
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
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse1Client">

                                                                <div>Comment créer un compte client TouCki ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>

                                                            </a>

                                                            <div id="general-collapse1Client" class="collapse"
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
                                                                    <h5>La procédure d’activation d’un compte client TouCki se fait en deux étapes: </h5>
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
                                                                                    Merci de bien vérifier que le numéro de téléphone renseigné lors de la création de votre compte client TouCKi est fonctionnel et qu’il s’agit bien d’un numéro de téléphone mobile.
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
                                                                <div>Quelles sonts les services disponibles sur votre compte client TouCki</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse3Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <h5>Les services disponibles au niveau du compte client TouCki sont les suivantes : </h5>
                                                                    <div>
                                                                        <ul class="verti-timeline list-unstyled">
                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">1</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Une reservation de ticket de voyage avec une multitude d'agence de voyage a votre disposition
                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">2</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                   Vous avez la possibilite d'ergistrer vos colis ou bagages et de voire cette liste sur votre compte TouCki
                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">3</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                   Vous avez la possibilite de modifier, de ropporer, d'annuler, de supprimer ou de transfere votre ticket en toute securite
                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">4</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                   Vous avez aussi le privillege de payer tous ces sevices en ligne via nos cannaux de paiement mobile tel Wave ou Orange Money 
                                                                                </p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse4Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse4Client">
                                                                <div>Comment puis je faire une résérvation de tickét</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse4Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <div class="card-body">
                                                                        <h5>Systéme de résérvation de tickét</h5>
                                                                        <div>
                                                                            <ul class="verti-timeline list-unstyled">
                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">1</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        Pour reserver un ticket sur TouCki, il vous faut d'abord vous connectez sur votre compte client. <br>
                                                                                        Arriver sur votre tableau de board vous aurez une liste de differentes agence de transport qui se trouvent dans votre localite.
                                                                                    </p>
                                                                                </li>

                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">2</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        Apres le choix de votre agence, vous allez cliquer sur le boutton siege pour acceder a la liste des sieges de l'agence conserne.
                                                                                        <br> Ainsi vous allez aussi cliquer sur le botton s'inscrire ensuite renseigner la date et la ville de votre destination.  
                                                                                    </p>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse7Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse7Client">
                                                                <div>Comment payé vos tickét de bus en ligne</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse7Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <div class="card-body">
                                                                        <h5>Systéme de paiement de tickét en ligne</h5>
                                                                        <div>
                                                                            <ul class="verti-timeline list-unstyled">
                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">1</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        Vous avez la possibilite de payer vos tickets en ligne a partire de votre compte. <br>
                                                                                        Dans partie ticket vous aurez la liste de vos reservations (recente ou anciennes), ainsi avec le boutton paye vous pouver paye vos ticket via Wave ou Orange Money
                                                                                    </p>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
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
                                                                        <h5>Se faire rembourser en cas d'anullation du ticket</h5>
                                                                        <div>
                                                                            <ul class="verti-timeline list-unstyled">
                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">1</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        <span>Attention !</span><br>
                                                                                        Le remboursement de votre ticket depend de la politique interne de l'agence de transport et non de TouCki
                                                                                        <br>
                                                                                        Si toute fois votre ticket vient d'une agence qui a choisi l'option de remboursement du ticket meme apres le depart du bus votre ticket est remboursable a tout moment.
                                                                                        <br> <br>
                                                                                        Si non dans le cas ou loption choisi est "Ticket non remboursable apres depart du bus" votre ticket ne sera remboursable que si vous annuler le ticket avant l'heure de depart du bus. 
                                                                                    </p>
                                                                                </li>
                                                                            </ul>
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
                            
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Une video illustrative pour les clients</h4>
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
                                                            <a href="#general-collapse1Client" class="accordion-list"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse1Client">

                                                                <div>Comment créer un compte agence TouCki ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>

                                                            </a>

                                                            <div id="general-collapse1Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <h5>Pour créer un compte agence chez TouCki</h5>
                                                                    <div>
                                                                        <ul class="verti-timeline list-unstyled">
                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">1</i>
                                                                                </div>
                                                                                <p class="text-muted">Allez sur <a href="https://www.toucki.aeerk-sn.com/agence-create" target="_blank" rel="noopener noreferrer">https://www.toucki.aeerk-sn.com/agence-create</a> ou téléchargez notre application TouCki sur play-Stor ou App-Stor.</p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">2</i>
                                                                                </div>
                                                                                <p class="text-muted">En suite entre toutes les informations demamder puis valider votre inscription</p>
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
                                                                <div>Comment activer mon compte agence TouCki ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse2Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <h5>La procédure d’activation d’un compte agence TouCki se fait en deux étapes: </h5>
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
                                                                                    Merci de bien vérifier que le numéro de téléphone renseigné lors de la création de votre compte client TouCKi est fonctionnel et qu’il s’agit bien d’un numéro de téléphone mobile.
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
                                                                <div>Quelles sonts les services disponibles sur votre compte agence TouCki</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse3Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <h5>Les services disponibles au niveau du compte agence TouCki sont les suivantes : </h5>
                                                                    <div>
                                                                        <ul class="verti-timeline list-unstyled">
                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">1</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Une gestion et une vue d'ensemble de tout les sieges de votre. <br>
                                                                                    Dans votre compte toucki vous avez tous ses avantages
                                                                                </p>
                                                                                <div class="text-muted mt-4">
                                                                                    <p class="mb-2"><i class="mdi mdi-circle-medium text-success me-1"></i>
                                                                                        Enregistre tous vos sieges de transports.
                                                                                    </p>
                                                                                    <p><i class="mdi mdi-circle-medium text-success me-1"></i>
                                                                                        Enregistre les employes par siege 
                                                                                    </p>
                                                                                    <p><i class="mdi mdi-circle-medium text-success me-1"></i>
                                                                                        Enregistre les bus par siege 
                                                                                    </p>
                                                                                    <p><i class="mdi mdi-circle-medium text-success me-1"></i>
                                                                                        Enregistre les bagages et colis des clients par siege 
                                                                                    </p>
                                                                                    <p><i class="mdi mdi-circle-medium text-success me-1"></i>
                                                                                        A partir de cette plateforme vous pouvez definir un politique de travails propre pour chaque siege de transport.
                                                                                    </p>
                                                                                </div>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">2</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                   Une planification de voyage dynamique et facile
                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">3</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                   Une sauvegarde des donnees clients (liste d'inscription)
                                                                                </p>
                                                                            </li>

                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">4</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    Autres avantages
                                                                                </p>
                                                                            </li>
                                                                            <li class="event-list">
                                                                                <div class="event-timeline-dot">
                                                                                   <i class="">4</i>
                                                                                </div>
                                                                                <p class="text-muted">
                                                                                   Autres avantages 
                                                                                </p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse4Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse4Client">
                                                                <div>Comment enregistrer une reservation de voyage</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse4Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <div class="card-body">
                                                                        <h5>Systéme de résérvation de tickét</h5>
                                                                        <div>
                                                                            <ul class="verti-timeline list-unstyled">
                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">1</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        Pour un clients qui n'a pas un compte ticket il est possible que l'agent administrateur puisse lui reserver un ticket de voyage. <br>
                                                                                        A partir de votre compte agent vous pouvez inscrire un client.
                                                                                    </p>
                                                                                </li>

                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">2</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        Aprés la réussite de l'inscription le client recevera un lien sms avec le quelle il poura payer son ticket. 
                                                                                    </p>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse7Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse7Client">
                                                                <div>Recevoir les paiement de tickets en ligne</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse7Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <div class="card-body">
                                                                        <h5>Systéme de paiement de tickét en ligne</h5>
                                                                        <div>
                                                                            <ul class="verti-timeline list-unstyled">
                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">1</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        Vous avez la possibilite de recevoir les paiment de ticket via Orange Money ou Wave.
                                                                                    </p>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapse8Client"
                                                                class="accordion-list collapsed"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapse8Client">
                                                                <div>Systeme de remboursement de ticket</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapse8Client" class="collapse"
                                                                data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <div class="card-body">
                                                                        <h5>Rembourser un ticket en cas d'anullation du ticket</h5>
                                                                        <div>
                                                                            <ul class="verti-timeline list-unstyled">
                                                                                <li class="event-list">
                                                                                    <div class="event-timeline-dot">
                                                                                    <i class="">1</i>
                                                                                    </div>
                                                                                    <p class="text-muted">
                                                                                        Le remboursement depend de votre politique ticketing.
                                                                                        <ul class="verti-timeline list-unstyled">
                                                                                            <li class="event-list">
                                                                                                <div class="event-timeline-dot">
                                                                                                <i class="">1</i>
                                                                                                </div>
                                                                                                <p class="text-muted">
                                                                                                    Le ticket est remboursable apres l'heure de depart du bus
                                                                                                </p>
                                                                                            </li>

                                                                                            <li class="event-list">
                                                                                                <div class="event-timeline-dot">
                                                                                                <i class="">2</i>
                                                                                                </div>
                                                                                                <p class="text-muted">
                                                                                                    Le ticket n'est remboursable qu'avant l'heure de depart du bus
                                                                                                </p>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </p>
                                                                                </li>
                                                                            </ul>
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

                             <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Une video illustrative pour les agences</h4>
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