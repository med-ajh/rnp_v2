<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receiver = $_POST["email"];
    $subject = "Code de vérification - pré-inscription au registre national de la population";
    $verificationCode = rand(100000, 999999);
    $body = "Madame/Monsieur,\n\nVotre code de vérification pour l'opération de pré-inscription est $verificationCode.";
    $sender = "From: notification_RNP@rnp.ma";

    if (mail($receiver, $subject, $body, $sender)) {
        $response = array("success" => true, "message" => "Un code de vérification a été envoyé à votre adresse email.");
    } else {
        $response = array("success" => false, "message" => "Une erreur s'est produite lors de l'envoi de l'email.");
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de langue et saisie d'email</title>
    <meta name="google" content="notranslate">
    <link href="https://fonts.googleapis.com/css?family=Roboto&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&amp;family=Lato:wght@400;500;700&amp;family=Montserrat:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script> <!-- Include reCAPTCHA script -->

    <style>
        body {
            font-family: 'Lato';
            margin: 0;
            padding: 0;
            position: relative;
            min-height: 100vh;
            background-size: cover;
            background-position: center;
            background-image: url('{{ asset('assets/images/back.jpeg') }}');
        }

        #container {
            position: absolute;
            top: 35vh; /* 40% from the top */
            right: 10%; /* 40% from the right */
            background-color: rgba(255, 255, 255, 1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: calc(100% - 40%); /* Adjusted width to accommodate the right offset */
        }

        .intro-paragraph {
            padding: 20px;
            border-radius: 5px;
            max-width: calc(50% - 60px);
            position: absolute;
            left: 20px;
            top: 60%;
            transform: translateY(-50%);
        }

        .ad {
            color: rgba(0, 0, 0, .87);
            direction: ltr;
            font-family: Lato, sans-serif;
            box-sizing: border-box;
            font-size: 25px;
            font-weight: bold;
        }

        .za {
            color: grey;
            direction: ltr;
            font-family: Lato, sans-serif;
            font-size: 15px;
        }

        .navbar {
            background-color: rgb(255, 255, 255);
            text-align: center;
            padding: 8px 0;
        }

        .navbar img {
            height: 100px;
            display: inline-block;
        }

        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="intro-paragraph">
        <div _ngcontent-c6="" class="heading">
            <span _ngcontent-c6="" class="line"><b _ngcontent-c6="">"Pré-inscription"</b></span>
        </div>
        <p _ngcontent-c6="" class="h2-intro-paragraph"><b>Bienvenue dans le parcours de préinscription au RNP</b></p>
        <p _ngcontent-c6="">Vous serez amené dans les prochaines étapes à remplir le formulaire d’inscription en ligne et à prendre un rendez-vous au Centre de Services aux Citoyens (CSC) auquel est rattaché votre lieu de résidence.</p>
        <p _ngcontent-c6="">Cette procédure est facultative, mais vous permettra de gagner du temps sur votre parcours d’inscription au RNP.</p>
        <p _ngcontent-c6="" class="ng-star-inserted">Pour démarrer votre préinscription, veuillez saisir un numéro de téléphone ou email personnel afin de recevoir le code à saisir et ne rater aucune information sur les étapes de votre inscription.</p>
    </div>

    <div class="navbar">
        <img src="{{ asset('assets/images/logo2.png') }}" alt="Logo">
    </div>

    <div id="container">
        <div _ngcontent-c6="" class="ad">
            <span _ngcontent-c6="" class="line">Étapes rapides et faciles</span>
        </div>
        <br>
        <div _ngcontent-c6="" class="za">Merci de choisir la langue et saisir l'adresse Email ou le numéro de GSM.</div>
        <br>
        <br>
        <select id="langue">
            <option value="fr">Français</option>
            <option value="en">English</option>
            <option value="es">Español</option>
        </select>
        <br>
        <br>
        <input type="email" id="email" placeholder="Entrez votre adresse e-mail...">
        <div class="g-recaptcha" data-sitekey="6LfVaYUpAAAAAOkLQ6gulUFX1b9p3INrcVQPX-0i"></div> <!-- Include reCAPTCHA widget with your site key -->
        <br>
        <br>
        <button onclick="navigateToCreate()">Soumettre</button>
    </div>


    <script>
        function soumettre() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                alert("Veuillez résoudre le captcha.");
            } else {
                var email = document.getElementById('email').value;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "verification_code.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var result = JSON.parse(xhr.responseText);
                        if (result.success) {
                            alert(result.message);
                            var verificationCodeInput = document.createElement("input");
                            verificationCodeInput.type = "text";
                            verificationCodeInput.placeholder = "Entrez le code de vérification";
                            verificationCodeInput.name = "verificationCode";
                            verificationCodeInput.id = "verificationCode";
                            verificationCodeInput.required = true;
                            document.getElementById("container").appendChild(verificationCodeInput);
                        } else {
                            alert(result.message);
                        }
                    }
                };
                xhr.send("email=" + encodeURIComponent(email));
            }
        }
    </script>
    <script>
        function navigateToCreate() {
            window.location.href = "{{ route('citoyens.create') }}";
        }
    </script>
</body>

</html>

