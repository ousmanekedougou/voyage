@extends('user.layouts.app',['title' => 'Termes et conditions'])
<link rel="stylesheet" href="{{asset('user/assets/build/css/intlTelInput.css')}}">
<style>
     .bg-ico-hero{
        background-image:url(./user/assets/images/dowload/setting.jpg) !important;
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
        text-align: justify;
    }
</style>
@section('main-content')

     <!-- hero section start -->
    <section class="section hero-section bg-ico-hero section-responsive" id="home">
        <div class="container">
            <div class="row align-items-center row_pricipal">
                <div class="col-lg-12 card_show">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title"> Termes et conditions d'utilisation</h1>
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
            {{--
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
                        </div>
                    </div>
                    <!-- end vertical nav -->
                </div>
            </div>
            <!-- end row -->
            --}}
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h2 class="text-bold h2-title">I.À propos de TouCki</h2>
                    <p>
                        L'application TouCki et Omio font partie de TouCki Corp. (ci-après "TouCki", "Omio", "nous"). Pour plus d'informations sur TouCki, veuillez consulter notre Mentions légales.
                    </p>
                    <p>
                        Sous les bannières du web, TouCki exploite des plateformes Internet dans différentes langues ainsi que des applications mobiles.
                    </p>
                    <p>
                        Nos services comprennent l'identification, la comparaison et l'intermédiation des services de transport. Pour certaines offres, nous proposons également d'autres options de service (agences de vente et location de vehiculles,agence immobilier). Nous ne proposons pas de forfaits vacances. TouCki est une société indépendante. Nous ne fournissons pas nos propres services de transport et n'organisons pas nos propres circuits; nous ne possédons aucun des fournisseurs (Agences de transport ou de vente et location de vehiculle , ni agence immobilier) et nous ne sommes pas sous le contrôle économique de l'un de ces fournisseurs (agences).
                    </p>
                </div>

                <div class="col-lg-8 offset-lg-2">
                    <h2 class="text-bold h2-title">II.Termes et conditions d'utilisation</h2>
                    <p>
                        Avec notre politique de confidentialité, les présentes conditions d'utilisation (« CG ») régissent l'utilisation des services, sites Web et applications mobiles de TouCki et constituent la base de l'accord d'utilisation entre TouCki et l'utilisateur. Les accords individuels entre l'utilisateur et TouCki, par exemple dans le cadre d'une réservation, prévaudront. Les conditions générales de vente divergentes ou opposées détenues par l'utilisateur ne sont pas applicables.
                    </p>
                    <p>
                        Si vous êtes un utilisateur qui achète un billet auprès d'une agence de transport, la filiale senegalaise de TouCki, agira en tant que partie contractante en ce qui concerne votre réservation. Aux fins de ces réservations, « TouCki » désigne l'entité juridique, le cas échéant.
                    </p>
                    <p>
                        Ces CG s'appliquent exclusivement aux services de TouCki, à savoir l'identification des correspondances de voyage et notre intermédiation de services proposés par des prestataires (agences) (transporteurs et autres prestataires de services). En outre, et indépendamment de celles-ci, les conditions générales de chaque fournisseur (agences) s'appliqueront à tous les billets et services proposés par les dits fournisseurs (par exemple, transport, agence de ventes et location de vehiculle, agence immobilier). En outre, des conditions générales supplémentaires peuvent s'appliquer aux plateformes de réservation tierces vers lesquelles vous êtes redirigé. TouCki n'a aucune influence sur les conditions fournies par des fournisseurs (agences).
                    </p>
                </div>

                <div class="col-lg-8 offset-lg-2">
                    <h2 class="text-bold h2-title">III. Services offerts par TouCki</h2>
                    <p>
                        Les services TouCki sont conçus pour vous faciliter la planification de votre voyage, de votre vehicule a louer ou l'immeuble de votre choix en vous fournissant les informations dont vous avez besoin et en vous fournissant une comparaison claire des options de votre demande.
                    </p>
                    <p>
                        Les services de voyage proprement dits (par exemple, le transport de A à B) ne font pas partie du service TouCki mais font plutôt partie d'un contrat séparé conclu entre vous et le fournisseur (agences) concerné. TouCki agit en tant qu'intermédiaire ou courtier entre l'utilisateur et chaque (agences). Nous ne sommes donc pas responsables du service de voyage fourni par l'agences ni de la manière dont ce service de voyage est fourni.
                    </p>

                    <h3 class="h3-title">TouCki services include:</h3>

                    <h4 class="h4-title">1. Moteur de recherche + plateforme de comparaison pour les services de voyage</h4>
                    <p>
                        Sur la base de votre recherche, nous vous fournissons un aperçu clair des différentes options de voyage utilisant différents modes de transport (par exemple, bus, ou voiture de location). Comme nous nous appuyons sur les informations mises à disposition par des (agences), des plateformes de réservation et des plateformes d'information, nous ne pouvons garantir l'exactitude ou l'exhaustivité des résultats. Vous pouvez comparer les options de voyage en fonction du prix, de la durée du voyage et d'autres aspects.
                    </p>

                    <h4 class="h4-title">2. Réservation via des prestataires (agences) externes</h4>
                    <p>
                        Notre page de résultats comprend des liens directs vers les pages de réservation des fournisseurs (agences) respectifs. En cliquant sur un lien, vous serez redirigé vers la page de réservation du fournisseur (agences), où vous pourrez acheter le service correspondant et effectuer une réservation.
                    </p>
                    <p>
                        Un contrat de services de voyage ne sera conclu qu'avec le fournisseur (agences) concerné. Pour cette raison, seules les conditions du fournisseur (agences) concerné s'appliqueront aux services de voyage réservés de cette manière. Le paiement est effectué via le système de paiement fourni sur la plateforme (TouCki). Toute modification ou annulation doit être effectuée directement auprès de l'agence concerné.
                    </p>
                    <p>
                        Nous recevons une commission du fournisseur (agences) pour avoir agi en tant qu'intermédiaire. Des frais supplémentaires imposés par les fournisseurs (agences) respectifs peuvent également s'appliquer.
                    </p>
                    <p>
                        <span>En général, l'utilisateur n'a pas droit à un droit de rétractation</span>
                        parce qu'il s'agit de contrats de prestation de services, où le contrat prévoit une date ou une période d'exécution spécifique.

                    <h4 class="h4-title">3. Réservation directe sur notre site internet</h4>
                    <p>
                        Pour les fournisseurs (agences) et les connexions sélectionnés, nous vendons les billets au nom et pour le compte des fournisseurs (agences) sur notre site Web en tant qu'agent commercial du fournisseur (agences). Dans ces cas, nous proposons des options de réservation en ligne sécurisées directement sur notre site Web et vous ne serez pas redirigé vers la page de réservation du fournisseur (agences) respectif.
                    </p>
                    <p>
                        Lorsque vous réservez une connexion via notre site Web, nous collectons les données nécessaires (par exemple, le nom du voyageur, l'adresse e-mail, les informations de paiement) conformément à notre politique de confidentialité. En tant qu'agent commercial du fournisseur de services de voyage, nous soumettons ensuite la réservation au fournisseur de services de voyage concerné. Les billets sont vendus au nom et pour le compte du fournisseur (agences) respectif.
                    </p>
                    <p style="color:red;">
                        En cliquant sur le bouton sur notre page de réservation ("Payer maintenant"), vous faites une offre ferme pour conclure un contrat pour le service de transport ou de voyage respectif. Le contrat est conclu une fois que vous recevez une confirmation de réservation par l'agence concerné (déclaration d'acceptation par l'agence). Vous recevrez une confirmation de réservation par e-mail ainsi que les documents de voyage et notre facture. Les documents de voyage sont généralement des billets imprimables émis par le prestataire de services concerné et sont généralement envoyés sous forme de fichier PDF ou dans d'autres formats électroniques courants (tels que des billets mobiles avec codes QR). Dans certains cas et pour certaines correspondances, vous pouvez recevoir un code de réservation ou un bon de billet à la place des billets imprimables. Ceux-ci doivent être remboursés ou échangés contre un billet à la gare ou à l'aéroport avant le départ (au guichet ou à un distributeur automatique de billets).
                    </p>
                    <p>
                        Une fois reçus, les documents de voyage doivent être vérifiés immédiatement. Toute erreur ou information incorrecte doit être immédiatement communiquée à TouCki pour permettre une correction rapide des documents. Vous pouvez contacter notre service client ici : <a href="{{ route('contact.index') }}" target="_blank" rel="noopener noreferrer">Centre d'aide</a>
                    </p>
                    <p>
                        Dans la mesure où cela a été convenu au moment de la réservation, nous facturons des frais de service pour les services qui vous sont fournis en vertu des présentes conditions d'utilisation. Nous recevons également une commission du fournisseur (agences) respectif. Des frais supplémentaires imposés par les fournisseurs (agences) respectifs peuvent également s'appliquer.
                    </p>
                    <p>
                        La réservation directe de services de transport et de voyage sur notre site Web ne peut être effectuée qu'en utilisant le mode de paiement fourni. Pour la collecte des paiements, nous utilisons Wave et Orange Money. TouCki est autorisé à collecter les paiements au nom de chacun des (agences) concernés prestataires du parti. Aux fins des réservations, Wave et Orange Money. Avec le paiement réussi à TouCki, vous avez rempli vos obligations de paiement envers le fournisseur de services de voyage avec effet libératoire
                    </p>
                    <p>
                        Si vous souhaitez annuler le service de transport ou de voyage et résilier le contrat, les conditions et les frais d'annulation applicables seront basés sur les conditions énoncées par le prestataire (agences) concerné. Vous pouvez contacter par téléphone ou par e-mail l'agence si vous avez pas de compte client TouCki. Dans le cas ou vous avez le compte, il peut être possible d'annuler directement sur votre compte. Ainsi les frais de remboursement se feront si les conditions du billet le permettent.
                    </p>
                    <p>
                        Nous déclinons toute responsabilité quant à la disponibilité du voyage au moment de la réservation ou quant à l'exécution du voyage réservé par un prestataire (agences).
                    </p>

                    <h4 class="h4-title">5. Nos Services</h4>
                    <p>
                        Une relation juridique entre vous, le client, et nous-mêmes naîtra dans les cas où nous offrons nos propres services contre paiement.
                    </p>

                    <h4 class="h4-title">6. Inscription</h4>
                    <p>
                        Vous pouvez créer un compte avec TouCki Vous pouvez accéder à votre profil individuel en saisissant votre e-mail et le mot de passe sélectionné.Vos données personnelles et informations de réservation seront traitées conformément à notre politique de confidentialité.
                    </p>
                    <p>
                        Seules les personnes majeures et les personnes physiques jouissant de la pleine capacité juridique peuvent devenir des utilisateurs enregistrés. L'utilisateur doit fournir toutes les informations requises de manière complète et correcte et, si nécessaire, fournir des mises à jour. L'inscription n'est pas transférable.
                    </p>
                    <p>
                        Une fois inscrit, votre compte sera actif pour une durée indéterminée. L'utilisateur et TouCki ont le droit de résilier le compte à tout moment moyennant un préavis de deux jours. Le droit de résiliation sans préavis pour un motif valable reste inchangé.
                    </p>

                    <h4 class="h4-title">7. Paiements et frais</h4>
                    <p>
                        Vous recevrez une ventilation des coûts et des frais qui comprennent le montant dû pour chaque réservation, y compris les frais facturés par le fournisseur. Vous acceptez de payer ou d'autoriser le paiement de tous ces frais, ainsi que de tous frais ou coûts supplémentaires pouvant être encourus par nos fournisseurs de services de paiement, le cas échéant. Votre paiement ne peut être effectué que via le ou les systèmes de paiement acceptables spécifiés sur la page de réservation.

                    <h4 class="h4-title">7.1. Frais de service</h4>
                    <p>
                        Lorsque vous réservez directement sur notre site Web, nous facturons des frais de réservation pour notre service qui vous est fourni en vertu des présentes conditions générales d'utilisation. Les frais de service varient et seront affichés au moment de la réservation. Lorsque vous utilisez une devise étrangère, des frais de transaction étrangère peuvent également s'appliquer.
                    </p>
                    <p>
                        Veuillez noter que nos frais de service ne sont pas remboursables. En effet, Nos Frais sont facturés pour les services d'intermédiation fournis par TouCki, qui sont exécutés lorsque la réservation Vous a été confirmée.
                    </p>
                    <h4 class="h4-title">7.2. Frais de traitement des cartes</h4>
                    {{--
                    <p>
                        Nous Vous facturerons également des frais supplémentaires pour l'utilisation de certains modes de paiement conformément aux lois applicables, c'est-à-dire si Vous utilisez une carte d'entreprise ou un système tripartite (American Express ou Diners). Ces frais ne sont pas remboursables. Veuillez noter que nos systèmes détectent automatiquement le mode de paiement que vous utilisez réellement et les frais supplémentaires correspondants sont facturés, le cas échéant.
                    </p>
                    --}}

                    <h4 class="h4-title">7.3. Frais de service pour les modifications ou les annulations</h4>
                    <p>
                        Selon le fournisseur (agences) et le type de tarif, vous pouvez soit annuler et obtenir un remboursement de votre billet, soit modifier votre billet en ligne, via le votre profile ou directement auprès du fournisseur (agences). Nous vous informerons généralement des principales conditions lors du processus de réservation, mais nous vous conseillons vivement de lire et de comprendre les conditions générales des (agences) avant de finaliser votre réservation.
                    </p>
                    <p>
                        Noter bien que le remboursement du biellet dependra des conditions de du fournisseur ou du status du biellt.
                    </p>
                    <p>
                       Veuillez noter que nos frais de service n'incluent pas les montants éventuellement facturés par les fournisseurs (agences), selon leurs termes et conditions. Les frais de service TouCki ne sont pas remboursables.
                    </p>
                    <p>
                        Nous ne modifierons, n'annulerons, ne remplacerons ni ne rembourserons les billets frauduleux.
                    </p>

                    
                    <h4 class="h4-title">Frais de service TouCki pour les modifications ou les annulations :</h4>
                    <p>Tableau</p>
                    <p>
                        *Si votre réservation d'origine a été traitée dans une devise différente du FCA, veuillez noter qu'un montant équivalent sera calculé à l'aide d'un taux applicable à l'ensemble du système, appelé taux de change de base. Ce taux est utilisé pour la conversion des devises en utilisant les données d'un ou plusieurs (agences). Nous mettons régulièrement à jour le taux de change de base, il peut toutefois ne pas être identique au taux du marché en temps réel.
                    </p>
                    <p>
                        Un voyage est considéré comme national lorsque votre ville de départ et votre ville de destination sont situées dans le même pays. Contrairement au domestique, un voyage est considéré comme transfrontalier lorsque votre ville de départ et votre ville de destination sont situées dans des pays différents.
                    </p>
                    <p>
                        Modification désigne votre demande volontaire de modification de votre réservation (date, itinéraire, nom, achat de services complémentaires, surclassement de votre tarif, etc.). Veuillez noter que toute modification est soumise aux conditions du fournisseur.
                    </p>



                    <h3 class="h3-title">8. Limites</h3>
                    <p>
                        Nous mettons notre site Web et ses fonctions respectives à la disposition des utilisateurs ; il n'existe aucun droit à la fourniture de fonctions spécifiques. Nous avons le droit d'apporter des modifications au contenu ou aux fonctionnalités à tout moment (par exemple : via des correctifs, des mises à jour ou des modifications). Nous ne garantissons pas la disponibilité permanente de notre site Web. Plus précisément, des problèmes techniques indépendants de notre volonté peuvent entraîner des temps d'arrêt. La maintenance du site Web peut affecter la disponibilité et sera effectuée, dans la mesure du possible, avec le plus grand soin pour éviter toute interruption. Les droits de propriété et tous les autres droits relatifs à ce site Web appartiennent à TouCki.
                    </p>



                    <h3 class="h3-title">9. Devoirs et obligations de l'utilisateur, conseils</h3>
                    <p>
                        En tant qu'utilisateur, vous êtes responsable de vous assurer que vous respectez toutes les formalités de voyage (exigences en matière d'identification , la réglementations douanières et monétaires, exigences en matière de vaccination et autres ordonnances sanitaires). Pour assurer le bon déroulement de votre voyage, vous devez prendre connaissance des instructions et conseils fournis par les voyagistes et transmis par TouCki.
                    </p>
                </div>

                <div class="col-lg-8 offset-lg-2">
                    <h2 class="text-bold h2-title">IV. Responsabilité limitée de TouCki, fournisseurs (agences)</h2>
                    <p>
                        Nous nous efforçons de nous assurer que les informations présentées sur notre site Web sont exactes. Lorsque nous fournissons des détails sur les services de voyage et les correspondances, nous nous appuyons sur les informations qui nous sont transmises par les prestataires (agences) concernés. Nous ne sommes pas en mesure de vérifier pleinement l'exactitude ou l'actualité des informations que nous recueillons et affichons. Nos révisions sont effectuées sur une base. Nous vous demandons donc de vérifier vous-même les détails de votre voyage. Nous ne faisons aucune déclaration ni garantie, et nous ne pouvons offrir à nos utilisateurs aucune garantie quant à l'exactitude, l'exhaustivité ou l'actualité des informations de voyage. Il en va de même pour toutes les autres informations présentées sur notre site Web qui sont ou ont été mises à notre disposition par des fournisseurs (agences).
                    </p>
                    <p>
                        Nous ne participons pas à la présentation ou à la description des prestations de voyage sur les sites Internet de prestataires (agences). Nous ne sommes donc pas responsables du contenu des offres de (agences) ou des éventuels contrats conclus avec des prestataires (agences).
                    </p>
                    <p>
                        Lorsque nous agissons en tant qu'intermédiaire pour des offres de (agences), nous déclinons toute responsabilité quant à la disponibilité des services ou des correspondances de voyage au moment de la réservation (sur les sites Web des fournisseurs (agences)) ou quant à la livraison effective et à la bonne exécution des services réservés auprès de (agences). prestataires du parti. Ni nous ni nos sociétés affiliées ne faisons de déclaration ou de garantie concernant les informations, produits, services ou logiciels fournis sur ou contenus dans notre site Web, en particulier en ce qui concerne l'adéquation à un usage spécifique - à moins que cela n'ait été expressément et individuellement convenu. avec nos utilisateurs. Toute demande de garantie ou demande de dommages-intérêts doit être intentée directement contre le fournisseur (agences) concerné.
                    </p>
                    <p>
                        Nous ne sommes pas responsables de toute perturbation ou interférence dans le réseau qui n'a pas été causée par nous. Nous nous efforçons d'assurer le fonctionnement technique irréprochable et ininterrompu de notre service. Nous ne pouvons cependant assumer aucune responsabilité quant à l'accessibilité ou la disponibilité ininterrompue et rapide de notre service. Ceci s'applique en particulier aux retards et pannes techniques et aux dommages qui en résultent.
                    </p>
                    <p>
                        Notre propre responsabilité conformément à la section V. ci-dessous reste inchangée.
                    </p>
                </div>


                <div class="col-lg-8 offset-lg-2">
                    <h2 class="text-bold h2-title">V. Limitation de responsabilité</h2>
                    <p>
                        Notre responsabilité et celle de nos employés, représentants légaux ou agents sera limitée à l'intention délibérée et à la négligence grave. Cette limitation ne s'applique pas aux atteintes à la vie, à l'intégrité physique ou à la santé, aux violations de garantie, aux réclamations en vertu de la loi senegalaise sur la responsabilité du fait des produits ou à la violation substantielle du contrat, c'est-à-dire aux obligations qui sont essentielles à la bonne exécution du contrat ou à l'exécution de l'objet du contrat ou sur le respect duquel le partenaire contractuel peut régulièrement se prévaloir.
                    </p>
                    <p>
                        En cas de violation d'obligations contractuelles essentielles par négligence légère ou simple, nous ne sommes responsables que des dommages typiques et prévisibles.
                    </p>
                </div>


                <div class="col-lg-8 offset-lg-2">
                    <h2 class="text-bold h2-title">VI. Protection des données</h2>
                    <p>
                        Notre politique de confidentialité décrit la manière dont nous traitons vos données lorsque vous utilisez notre service. En utilisant notre site Web et/ou nos applications mobiles, vous consentez à l'utilisation de vos informations conformément à notre politique de confidentialité.
                    </p>
                </div>


                <div class="col-lg-8 offset-lg-2">
                    <h2 class="text-bold h2-title">VII. Modifications de nos conditions d'utilisation</h2>
                    <p>
                        Nos services sont en constante évolution et expansion. Nous nous réservons donc le droit de modifier ces conditions générales à tout moment. Pour les utilisateurs existants, les termes et conditions en vigueur au moment de la dernière réservation s'appliqueront, sauf si un avis de modification a été reçu au préalable.
                    </p>
                </div>


                <div class="col-lg-8 offset-lg-2">
                    <h2 class="text-bold h2-title">VIII. Coordonnées / Notifications</h2>
                    <p>
                        Si vous avez des plaintes ou si vous pensez que le contenu de notre site Web viole les droits des agences, veuillez nous en informer :
                    </p>
                    <p>
                        TouCki senegal <br>
                       <span>Email : yabaye07@gmail.com</span> <br>
                       <span>Telephone : 77 000 00 00</span> <br>
                       <span>Adresse : Kedougou - Dalaba</span> <br>
                    </p>
                    <p>
                        Pour plus d'informations sur TouCki, veuillez visiter notre Mentions légales

                        Aidez-nous à améliorer notre service. Nous apprécions vos commentaires, négatifs ou positifs, ainsi que toute suggestion d'amélioration. Laissez des commentaires, évaluez notre service ou écrivez-nous simplement :

                        <a href="{{ route('contact.index') }}" target="_blank" rel="noopener noreferrer">sur notre page de contact</a>

                        En soumettant vos commentaires, vous consentez à ce que nous les utilisions et les partagions gratuitement et de manière anonyme à nos propres fins commerciales. Cela sera bien sûr effectué conformément à notre politique de confidentialité.
                    </p>
                </div>
            </div>
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