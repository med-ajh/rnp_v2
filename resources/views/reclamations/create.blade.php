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

<div class="navbar">
    <img src="{{ asset('assets/images/logo2.png') }}" alt="Logo">
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('reclamations.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="type">Type:</label>
                            <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}">
                        </div>

                        <div class="form-group">
                            <label for="titre">Titre:</label>
                            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre') }}">
                        </div>

                        <div class="form-group">
                            <label for="nom_prenom">Nom et Prénom:</label>
                            <input type="text" class="form-control" id="nom_prenom" name="nom_prenom" value="{{ old('nom_prenom') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="telephone">Téléphone:</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}">
                        </div>

                        <div class="form-group">
                            <label for="input-region">Région:</label>
                            <select id="input-region" class="form-control" name="region_id">
                                <option value="">Selectectionner a Region</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="input-province">Province:</label>
                            <select id="input-province" class="form-control" name="province_id">
                                <option value="">Selectinner a Province</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="descriptif">Descriptif:</label>
                            <textarea class="form-control" id="descriptif" name="descriptif">{{ old('descriptif') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#input-region').change(function () {
            var regionId = $(this).val();

            $('#input-province').empty().append('<option value="">Select Province</option>');

            $.ajax({
                type: "POST",
                url: "{{ route('filter.provinces') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    region_id: regionId
                },
                success: function (response) {
                    $.each(response, function (key, value) {
                        $('#input-province').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });
    });
</script>
