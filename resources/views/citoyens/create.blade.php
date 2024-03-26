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
    font-family: 'Lato', sans-serif;
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
    top: 130%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    border-radius: 10px;
    max-width: 800px;
    width: calc(100% - 40px);
}

.card {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.card-body {
    padding: 20px;
}

.form-group {
    margin-bottom: 20px;
}

input[type="text"],
input[type="number"],
input[type="email"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="radio"],
input[type="checkbox"] {
    margin-right: 10px;
}

button {
    width: 100%;
    padding: 12px;
    background-color: #048345;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}




        .navbar {
            background-color: rgb(255, 255, 255);
            text-align: center;
            padding: 8px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar img {
            height: 100px;
            display: inline-block;
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



        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }


    </style>
</head>

<body>

<div class="navbar">
    <img src="{{ asset('assets/images/logo2.png') }}" alt="Logo">
</div>

<div id="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <title>Registre national de Population</title>
                <div class="card-body">
                    <form method="POST" action="{{ route('citoyens.store') }}">
                        @csrf


                        <h1 color style="color:#fff;background-color:#048345;text-align:center;">Informations Personnelles</h1>

                        <div class="form-group">
                            <label for="nom">Nom : </label>
                            <input type="text" name="nom" id="nom" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="prenom">Prenom : </label>
                            <input type="text" name="prenom" id="prenom" class="form-control" required>
                        </div>



                        <div class="form-group">
                            <label for="date_naissance">Date de naissance *</label>
                            <input type="date" name="date_naissance" id="date_naissance" class="form-control" required onchange="calculateAge()">
                        </div>

                        <div class="form-group">
                            <label for="age">Age:</label>
                            <span id="ageDisplay"></span>
                        </div>

                        <div class="form-group">
                            <label for="genre">Genre *     : </label>
                            <input type="radio" id="genre_male" name="genre" value="Homme" required>
                            <label for="genre_male">Homme</label>
                            <input type="radio" id="genre_female" name="genre" value="Femme" required>
                            <label for="genre_female">Femme
                        </div>


                        <div class="form-group">
                            <label for="status_de_residence">Statut de résidence * </label>
                            <input type="radio" name="status_de_residence" id="citoyen_marocain" value="Citoyen Marocain" required>
                            <label for="citoyen_marocain">Citoyen Marocain</label>
                            <input type="radio" name="status_de_residence" id="etranger_resident" value="Etranger Résident" required>
                            <label for="etranger_resident">Etranger Résident</label>
                        </div>

                        <div class="form-group">
                            <label>Je suis né(e) au Maroc * :</label>
                            <input type="radio" name="ne_au_maroc" id="ne_au_maroc_oui" value="oui" required>
                            <label for="ne_au_maroc_oui">Oui</label>
                            <input type="radio" name="ne_au_maroc" id="ne_au_maroc_non" value="non" required>
                            <label for="ne_au_maroc_non">Non</label>
                        </div>





                        <h1 color style="color:#fff;background-color:#048345;text-align:center;">Adresse Personnelle</h1>


                        <div class="form-group">
                            <label for="region_id">Région * :</label>
                            <select id="region_id" class="form-control" name="region_id" required>
                                <option value="">Sélectionner une Région</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="province_id">Province * :</label>
                            <select id="province_id" class="form-control" name="province_id" required>
                                <option value="">Sélectionner une Province</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="pachalik_id">Pachalik * :</label>
                            <select id="pachalik_id" class="form-control" name="pachalik_id" required>
                                <option value="">Sélectionner un Pachalik</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="quartier_id">Quartier * :</label>
                            <select id="quartier_id" class="form-control" name="quartier_id" required>
                                <option value="">Sélectionner un Quartier</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="avenue_id">Avenue * :</label>
                            <select id="avenue_id" class="form-control" name="avenue_id" required>
                                <option value="">Sélectionner une Avenue</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="type_dhabitat">Type d'habitat *     : </label>
                            <input type="radio" name="type_dhabitat" id="individuel" value="Individuel" required>
                            <label for="individuel">Individuel</label>
                            <input type="radio" name="type_dhabitat" id="collectif" value="Collectif" required>
                            <label for="collectif">Collectif</label>
                        </div>


                        <div class="form-group">
                            <label for="n_de_porte">Numero de Porte:</label>
                            <input type="text" name="n_de_porte" id="n_de_porte" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <label for="adresse">Adresse:</label>
                            <input type="text" name="adresse" id="adresse" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="code_postal">Code Postal:</label>
                            <input type="text" name="code_postal" id="code_postal" class="form-control" required>
                        </div>

                        <h1 color style="color:#fff;background-color:#048345;text-align:center;">Données d'identité</h1>


                        <div class="form-group">
                            <label for="Cnie">Cnie *:</label>
                            <input type="text" name="Cnie" id="Cnie" class="form-control" required>
                            <div id="cnieError" class="invalid-feedback">Cnie must be exactly 8 characters long.</div>
                        </div>


                        <div class="form-group">
                            <label for="date_expiration">Date de expiration *                                </label>
                            <input type="date" name="date_expiration" id="date_expiration" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <label for="je_dipose_idcs">Je dispose IDCS :   </label>
                            <input type="radio" name="je_dipose_idcs" id="oui_idcs" value="oui" required>
                            <label for="oui_idcs">Oui</label>
                            <input type="radio" name="je_dipose_idcs" id="non_idcs" value="non" required>
                            <label for="non_idcs">Non</label>
                        </div>




                        <h1 color style="color:#fff;background-color:#048345;text-align:center;">Contacts</h1>



                        <div class="form-group">
                            <label for="telephone">Telephone:</label>
                            <input type="text" name="telephone" id="telephone" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email_insc">Email:</label>
                            <input type="email" name="email_insc" id="email_insc" class="form-control" required>
                        </div>


                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var cnieInput = document.getElementById('Cnie');

    cnieInput.addEventListener('input', function(event) {
        var cnieValue = event.target.value;
        var cnieError = document.getElementById('cnieError');

        if (cnieValue.length !== 8) {
            cnieError.style.display = 'block';
        } else {
            cnieError.style.display = 'none';
        }
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#region_id').change(function () {
            var regionId = $(this).val();
            if (regionId) {
                $.ajax({
                    type: 'GET',
                    url: '{{ route("citoyens.filterProvinces") }}',
                    data: {'region_id': regionId},
                    success: function (data) {
                        $('#province_id').empty();
                        $('#province_id').append('<option value="">Select Province</option>');
                        $.each(data, function (key, value) {
                            $('#province_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#province_id').empty();
                $('#pachalik_id').empty();
                $('#quartier_id').empty();
                $('#avenue_id').empty();
            }
        });

        $('#province_id').change(function () {
            var provinceId = $(this).val();
            if (provinceId) {
                $.ajax({
                    type: 'GET',
                    url: '{{ route("citoyens.filterPachaliks") }}',
                    data: {'province_id': provinceId},
                    success: function (data) {
                        $('#pachalik_id').empty();
                        $('#pachalik_id').append('<option value="">Select Pachalik</option>');
                        $.each(data, function (key, value) {
                            $('#pachalik_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#pachalik_id').empty();
                $('#quartier_id').empty();
                $('#avenue_id').empty();
            }
        });

        $('#pachalik_id').change(function () {
            var pachalikId = $(this).val();
            if (pachalikId) {
                $.ajax({
                    type: 'GET',
                    url: '{{ route("citoyens.filterQuartiers") }}',
                    data: {'pachalik_id': pachalikId},
                    success: function (data) {
                        $('#quartier_id').empty();
                        $('#quartier_id').append('<option value="">Select Quartier</option>');
                        $.each(data, function (key, value) {
                            $('#quartier_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#quartier_id').empty();
                $('#avenue_id').empty();
            }
        });

        $('#quartier_id').change(function () {
            var quartierId = $(this).val();
            if (quartierId) {
                $.ajax({
                    type: 'GET',
                    url: '{{ route("citoyens.filterAvenues") }}',
                    data: {'quartier_id': quartierId},
                    success: function (data) {
                        $('#avenue_id').empty();
                        $('#avenue_id').append('<option value="">Select Avenue</option>');
                        $.each(data, function (key, value) {
                            $('#avenue_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#avenue_id').empty();
            }
        });
    });
</script>

<script>
    // Function to calculate age based on date of birth
    function calculateAge(dateOfBirth) {
        var today = new Date();
        var birthDate = new Date(dateOfBirth);
        var age = today.getFullYear() - birthDate.getFullYear();
        var month = today.getMonth() - birthDate.getMonth();
        if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    // Function to update age display
    function updateAgeDisplay() {
        var dateOfBirth = document.getElementById('date_naissance').value;
        var ageDisplay = document.getElementById('ageDisplay');
        var age = calculateAge(dateOfBirth);
        ageDisplay.textContent = age + '  ans';
    }

    // Event listener for input change on date of birth field
    document.getElementById('date_naissance').addEventListener('change', function() {
        updateAgeDisplay();
    });
</script>

</body>
</html>

