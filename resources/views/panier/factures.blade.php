<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture - Société X</title>
    <style>
        body{
            margin-left: 4em;
        }
        div.title{
            margin-left: 23em;
        }
        p.title{
            text-align: center;
        }
        div.sous-title{
            display:flex;
            color: blue;
            margin-left: 20em;
            margin-top: -2.5em;
        }
        div.desc{
            margin-left: 2em;
            margin-right: 1em;
        }
        div.img{
            height: 50px;
            width: 50px;
        }
        div.contact{
            margin-left: 20em; 
        }





        .services {
            margin-top: 10em;
            margin-left: 21em;
            width: 60%;

            
        }
        .services table {
            width: 100%;
            border-collapse: collapse;
        }
        .services th, .services td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .total {
            margin-top: 20px;
        }
        div.content{
            background-image: url('logo.jpg');
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.5;
        }
    </style>
</head>
<body>
    <div class="title">
       <h1 style=" font-size:xxx-large">
            S <img src="{{ asset('logo.jpg')}}" alt="" style="width: 40px; height: 40px"> LERGY_SOLUTIONS <br>
       </h1> 
        <p ><h1 style="margin-left: 7.7em; margin-top: -1em">sarl</h1></p>
    </div>
    <div class="sous-title">
        <div class="img1">
            <img src="{{asset('img3.jpg')}}" alt="" style="position: relative; height: 6em">
        </div>
        <div class="desc">
            <h2>
                <strong style="font-family: 'Agency FB';">
                    Prestations de services, Installation solaire, <br>
                    Fourniture du matériel, Electricité bâtiment, <br>
                    Domotique et systèmes innovants
                </strong>
            </h2>


        </div>
        <div class="img2">
            <img src="{{asset('img7.jpg')}}" alt="" style="position: relative; height: 6em">
        </div>
    </div>
    <div class="contact">
        <p style="margin-top: -0.5em;">
            <strong >NIU: M092316074072K</strong> <strong style="margin-left: 2em;">facebook : facebook/solergysolutions</strong> <strong style="margin-left: 2em;">Contacts : 6 57 24 89 25</strong>
        </p>
        <p style="margin-top: -0.5em;">
            <strong >Code marchand ORANGE MONEY : 80 08 89</strong>  <strong style="margin-left: 2em;">Email :solutionssolergy@gmail.com</strong>
        </p>
        <div style="margin-top: 2em;">
            <p >
                <strong>REF : CA_DLA_AVR_24_8</strong>  
            </p>
            <div style="display: flex;">
                <div>
                    <strong >Agent opérant : @auth {{ Auth::User()->name}}  @endauth</strong> <br > 
                    <strong >TEL : 6 94 95 48 18</strong>
                </div>
                <div style="margin-left: 10em;">
                    <strong >client :</strong> <br>
                    <strong >TEL : 6 94 95 48 18</strong>
                </div>
            </div>

        </div>

    </div>
    <div class="content">
        <p class="title">
            <u>
                DEVIS INSTALLATION SOLAIRE
            </u>
        </p>
        <p style="margin-left: 20em;">
            <strong><u>  note</u> </strong>  BACKUP HYBRIDE ET REPROFILAGE ELECTRIQUE DES APPARTEMENTS
        </p>

        <div class="services">
            <table>
                <tr>
                    <th>Qté</th>
                    <th>Désignation</th>
                    <th>P.U.</th>
                    <th>P.Total</th>
                </tr>
                @foreach(Cart::getContent() as $produit)
                <!-- Remplacer les lignes vides par les détails réels de la facture -->
                <tr>
                    <td>{{$produit->quantity}}</td>
                    <td>{{$produit->name}}</td>
                    <td>{{$produit->price}}</td>
                    <td>{{$produit->price * $produit->quantity}}</td>
                </tr>
                @endforeach
                <!-- Ajouter d'autres lignes si nécessaire -->
            </table>
        </div>
        <div class="footer" style="text-align:center">'
            <div  class="total"> <strong style="margin-bottom: 3em; background-color:aqua">Arrêtée la présente facture à la somme de : {{Cart::getTotal()}} Francs CFA</strong></div>
            <div style="margin-bottom: 3em;">Signature Client _________________________</div>
            <div>Signature Vendeur</div>
        </div>

    </div>
</body>
</html>