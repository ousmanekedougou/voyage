<!doctype html>
<html lang="en">

<style>
    .tr_col{
        display: flex;
        font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;
        color: yellowgreen;
    }
    .tr_col .col-left{
        width: 20%;
        padding: 20px;
    }
    .tr_col .col-left img{
        width: 100%;
        border-radius: 100%;
    }
    .tr_col .col-rigth{
        width: 80%;
        text-align: left;
    }
    .tr_col .col-rigth h1{
        font-size: 3em;
    }
    .tr_col .col-rigth .title{
        font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 24px; vertical-align: top;margin: 0; padding: 0 0 10px;
        text-decoration: underline;
        margin-left: 40px;

    }
    .tr_col .col-rigth .slogan{
        font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 10px; vertical-align: top;margin: 0; padding: 0 0 10px;
        margin-left: 50px;

    }

    .info_tiker{
        display:flex;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;
        width: 140%;
    }
    .place,.rendez_vous,.phone{
        width: 30%;
        text-align: center;
    }
    .info_tiker .place{
        text-align: left;
    }
    .nb_info{
        width: 100%;
    }
    .nb_info .nb{
        width: 100%;
        font-size: 11px;
    }
    .date_depart{
        text-align: center;
        font-weight: bold;
    }
    .div_border{
        display: flex;
    }
    .content-block{
         width: 30%;
    }
    .content-block2{
        width: 70%;
        text-align: right;
    }
</style>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;">
                                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                                    <td class="container" width="600" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;" valign="top">
                                        <div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                            <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 7px; background-color: #fff; color: #495057; margin: 0;" bgcolor="#fff">
                                                <div class="tr_col">
                                                   <div class="col-left">
                                                       <img src="http://localhost:8000{{$image}}" alt="" srcset="">
                                                   </div>
                                                   <div class="col-rigth">
                                                       <h1>{{$client->agence}}</h1>
                                                       <p class="slogan">Voyage en bonne compagine</p>
                                                        <p class="title" valign="top">Ticket de voyage</p>
                                                   </div>
                                                </div>
                                                <tr class="tr_infos" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                                                        <p class="date_depart">Date Depart : {{$client->registered_at}}</p>
                                                        <table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"> 
                                                            <div class="div_border" style="display: flex; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <div class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                                    Prenom & Nom
                                                                </div>
                                                                <div class="content-block2" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                                    {{$client->name}}
                                                                </div>
                                                            </div>
                                                            <div class="div_border" style="display: flex;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <div class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                                    Voyage pour
                                                                </div>
                                                                <div class="content-block2" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                                    {{$client->ville->name}}
                                                                </div>
                                                            </div>
                                                            <div class="div_border" style="display: flex;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <div class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                                    Tarif
                                                                </div>
                                                                <div class="content-block2" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                                    {{$client->ville->amount}} f
                                                                </div>
                                                            </div>

                                                            <div style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <div class=" info_tiker">
                                                                    <span class="place">Place : {{$client->position}}</span>
                                                                    <span class="rende_vous">RV : {{$client->heure}}</span>
                                                                    <span class="phone">Tel : 778909876</span>
                                                                </div>
                                                            </div>
                                                            <div style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <div class="nb_info">
                                                                    <p class="nb">Nous portons a votre connaissance qu'auccun rembourssement n,est admin après le depart du vehicule</p>
                                                                </div>
                                                            </div>

                                                            <div style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <div class="" style="text-align: center;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0;" valign="top">
                                                                    © <script>document.write(new Date().getFullYear())</script> <span style="font-weight: 900;">TouCKi</span>
                                                                </div>
                                                            </div>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <!-- end table -->
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->



    </div>

</body>

<!-- Mirrored from themesbrand.com/skote/layouts/email-template-alert.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Mar 2021 16:18:58 GMT -->

</html>