<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de demande d'inscription au Registre National de la Population</title>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('{{ asset('assets/images/back.jpeg') }}');
            background-size: cover;
        }

        .header {
            text-align: center;
            padding: 20px 0;
        }

        .header img {
            height: 100px;
        }

        .container {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            background-color: #d0e7ff;
            color: #000000;
            text-align: center;
            padding: 9px;
            font-size: 21px;
        }

        h2 {
            background-color: #e4e4e4;
            font-size: 17px;
            text-align: center;
            color: #000000;
            margin-bottom: 6px;
            margin-top: 5px;

        }

        p {
    font-size: 10px;
    font-family: Arial, sans-serif;
}


        .separator {
            height: 2px;
            background-color: #000000;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="https://www.rnp.ma/pre-registration-ui/assets/img/header-logo.png" alt="Logo">
        <h1>Formulaire de demande d'inscription au Registre National de la Population</h1>
    </div>
    <div class="container">
        <h2>Informations Personnelles</h2>
        <p><b>Name :</b> {{ $citoyen->nom }}</p>
        <p><b>Prénom :</b> {{ $citoyen->prenom }}</p>
        <p><b>Date de naissance :</b> {{ $citoyen->date_naissance }}</p>
        <p><b>Age :</b> {{ $citoyen->age }}</p>
        <p><b>Genre :</b> {{ $citoyen->genre }}</p>
        <p><b>Status de résidence :</b> {{ $citoyen->status_de_residence }}</p>
        <p><b>Je suis né(e) au Maroc * :</b> {{ $citoyen->ne_au_maroc }}</p>


        <h2>Adresse Personnelle</h2>
        <p><b>Région : </b> {{ $citoyen->region->name }}</p>
        <p><b>Province : </b> {{ $citoyen->province->name }}</p>
        <p><b>Pachalik : </b> {{ $citoyen->pachalik->name }}</p>
        <p><b>Quartier :</b> {{ $citoyen->quartier->name }}</p>
        <p><b>Avenue :</b> {{ $citoyen->avenue->name }}</p>
        <p><b>Type d'habitat :</b> {{ $citoyen->type_dhabitat }}</p>
        <p><b>Numéro de porte :</b> {{ $citoyen->n_de_porte }}</p>
        <p><b>Adresse :</b> {{ $citoyen->adresse }}</p>
        <p><b>Code postal :</b> {{ $citoyen->code_postal }}</p>


        <h2>Données d'identité</h2>
        <p><b>CNI :</b> {{ $citoyen->Cnie }}</p>
        <p><b>Date d'expiration :</b> {{ $citoyen->date_expiration }}</p>
        <p><b>Je dispose d'une CNI sécurisée :</b> {{ $citoyen->je_dipose_idcs }}</p>


        <h2>Contacts</h2>
        <p><b>Téléphone :</b> {{ $citoyen->telephone }}</p>
        <p><b>Email :</b> {{ $citoyen->email_insc }}</p>
    </div>
    <div class="separator"></div>

</body>

</html>
