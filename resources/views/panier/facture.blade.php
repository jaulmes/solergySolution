<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;

        }
        .invoice {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            background-image: url('logo.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh; /* Hauteur de l'écran */
            width: 100%;
        }
        .header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .services {
            margin-top: 20px;

            
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
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">SOLERGY SOLUTIONS SARL</div>
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
        <div class="total">Arrêtée la présente facture à la somme de : {{Cart::getTotal()}} Francs CFA</div>
        <div>Signature Client _________________________</div>
        <div>Signature Vendeur</div>
    </div>
</body>
</html>
