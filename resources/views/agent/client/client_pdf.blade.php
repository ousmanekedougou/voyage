
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TouCki | {{Auth::guard('agent')->user()->agence->name}}</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
            margin-top:10px;
        }
        .brand-section{
           background-color:#2a3042;
           padding: 10px 40px;
        }

        .row{
            display: flex;
            justify-content:center;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
            margin-right:-21px;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
       
        .float-right{
            float: right;
        }
        @media print {
        #print_Button{
            display: none;
            }
      
        }
        .agence_name{
            margin-left:-21px;
        }
        .row .heading-title{
            width:50%;
            float:left;
        }
        .row .button{
            width:50%;
        }
        .row .button .btn{
            float:right;
            margin-right:5px;
        }

        .row .button .btn{
            border: 1px solid #0d1033;
            border-radius: 4px;
            padding: 5px;
            color:#fff;background-color:#0d1033;border-color:#0d1033;
            font-size: 15px;
            font-weight: 700;
        }
        .row .button .btn:focus{
            color:#fff;
            background-color:#0d1033;
            border-color:#255625
        }

        .row .button .btn:hover{
            color:#fff;
            background-color:#0d1033;
            border-color:#398439
        }
        .siege{
            text-align:right;
        }
        .wave-png{
            width:20px;
            height:auto;
            overflow:hidden;
            margin-bottom:-4px;
        }
        .om-png{
            width:20px;
            height:auto;
            overflow:hidden;
            margin-bottom:-4px;
        }
        .free-png{
            width:50px;
            height:auto;
            overflow:hidden;
            /* margin-bottom:-4px; */
        }

    </style>
</head>
<body >

    <div class="container" id="print">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white agence_name">{{Auth::guard('agent')->user()->agence->name}}</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">Email : {{Auth::guard('agent')->user()->agence->email}}</p>
                        <p class="text-white">Téléphone : {{Auth::guard('agent')->user()->agence->phone}}</p>
                        <p class="text-white">RCCM : CI Abj 03 2021 B12</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Matricule Buse: {{$getBuse->matricule}}</h2>
                    <p class="sub-heading" style="font-weight:600;">Itineraire: {{ $getBuse->itineraire->name }} </p>
                    <p class="sub-heading">Date: {{ carbon_today() }} / Rv : {{ $getBuse->heure_rv }} / Départ : {{ $getBuse->heure_depart }}</p>
                    <p class="sub-heading"></p>
                </div>
                <div class="col-6 siege">
                    <p class="heading">Siège de {{Auth::guard('agent')->user()->siege->name}} </p>
                    <p class="sub-heading">Email : {{Auth::guard('agent')->user()->siege->email}}  </p>
                    <p class="sub-heading">Téléphone : {{Auth::guard('agent')->user()->siege->phone}}</p>
                    <p class="sub-heading">Adresse : {{Auth::guard('agent')->user()->siege->adress}}</p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <h3 class="heading-title">Liste des clients</h3>
                <div class="button">
                    <button  class="btn" id="print_Button" onclick="printDiv()"><i class="fa fa-print"> Télécharger le reçu </i> <i class="fa-solid fa-download"></i></button> 
                </div>
            </div>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Place</th>
                        <th class="w-20">Prénom & nom</th>
                        <th class="w-20">Téléphone</th>
                        <th class="w-20">Déstination</th>
                        <th class="w-20">Prix du ticket</th>
                        <th class="w-20">Méthode Paiement</th>
                        <th class="w-20">Présence</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td> 
                                {{ $client->position }}
                            </td>
                            @if($client->name == null)
                                <td>{{ $client->customer->name }}</td>
                                <td>{{ $client->customer->phone }}</td>
                                @else
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->phone }}</td>
                            @endif
                            <td>
                            {{ $client->ville->name }}
                            </td>
                            <td>
                                @if($client->amount == $client->ville->amount)
                                    <span class="badge badge-pill badge-soft-getBuse font-size-12">{{ $client->ville->getAmount() }}</span>
                                @else
                                    <span class="badge badge-pill badge-soft-warning font-size-12">Non Payer</span>
                                @endif
                            </td>
                            <td>
                                @if($client->amount == $client->ville->amount)
                                    @if($client->payment_methode == 1)
                                        <span class="badge badge-pill badge-soft-success font-size-12"> <img class="wave-png" src="{{ asset('admin/assets/images/wave.png') }}" alt="" sizes="" srcset=""> Wave</span>
                                    @elseif($client->payment_methode == 2)
                                        <span class="badge badge-pill badge-soft-success font-size-12"> <img class="om-png" src="{{ asset('admin/assets/images/om.png') }}" alt="" sizes="" srcset=""> Orange Money</span>
                                    @else
                                        <span class="badge badge-pill badge-soft-success font-size-12"><img class="free-png" src="{{ asset('admin/assets/images/free.png') }}" alt="" sizes="" srcset=""> Free Money</span>
                                    @endif
                                @else
                                    <a class="badge badge-pill badge-soft-warning font-size-12">Non payer <i class="fab fa-cc-mastercard me-1"></i></a>
                                @endif
                            </td>
                            <td>
                            <label for="">
                                    <input type="checkbox" name="" id="" disabled> <span>Oui</span>
                            </label>
                                <label for="">
                                    <input type="checkbox" name="" id="" disabled> <span>Non</span>
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
        </div>

        <div class="body-section">
            <p>&copy; TouCki <script>document.write(new Date().getFullYear())</script>.
                <span  class="float-right">Agent : {{Auth::guard('agent')->user()->name}}</span>
            </p>
        </div>      
    </div>      


    <script type="text/javascript">
        function printDiv(){
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>

</body>
</html>
