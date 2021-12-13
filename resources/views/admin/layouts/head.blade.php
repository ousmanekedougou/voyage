
        <meta charset="utf-8" />
        <title>Admin|Voyage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">
        <!-- Bootstrap Css -->
        <link href="{{asset('admin/assets/css/bootstrap.min.css')}}"  rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('admin/assets/css/app.min.css')}}"  rel="stylesheet" type="text/css" />

        <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet'>



        @section('headsection')

        <style type="text/css">
        .flashy {
        font-family: "Source Sans Pro", Arial, sans-serif;
        padding: 11px 30px;
        border-radius: 4px;
        font-weight: 400;
        position: fixed;
        bottom: 20px;
        right: 20px;
        font-size: 16px;
        color: #fff;
        }
        </style>

        <script id="flashy-template" type="text/template">
        <div class="flashy flashy--{{ Session::get('flashy_notification.type') }}">
                <i class="material-icons">speaker_notes</i>
                <a href="#" class="flashy__body" target="_blank"></a>
        </div>
        </script>

        

        @show