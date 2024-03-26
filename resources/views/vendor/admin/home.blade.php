@component('admin::layouts.app')
<style>
    h1 {
        text-align: center;
        font-size: 2.8em;
        color: #6178e6;
        text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
        font-family: 'Arial', sans-serif;
    }

    h3 {
        font-size: 2em;
        color: #6178e6;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        font-family: 'Arial', sans-serif;
    }

    li {
        font-size: 1.2em;
        text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
        font-family: 'Arial', sans-serif;
    }
    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 0 auto;
        padding: 10px;
    }

    .content {
        flex: 1;
    }

    .image {
        max-width: 700px;
        height: auto;
    }
</style>
<h1>Tableau de bord de Registre National de la Population</h1>

<div class="container">
    <div class="content">
        <br>   <br>
        <br>

        <h3>Encadrée par :</h3>
        <ul>
            <li>Mr Ghailani Mohammed .</li>
            <li>Mr Bouhdidi Jaber .</li>
        </ul>
        <br>
        <br>

        <h3>Réalisée par :</h3>
        <ul>
            <li>Ajiach Moahmmed</li>
            <li>Fatmi Hakim</li>
            <li>Oulad ben lhcen Anas</li>
            <li>Chatri Taha</li>
            <li>Okha Aimane</li>
            <li>Esseti Mohammed Reda</li>
        </ul>
    </div>
    <div>
        <img src="{{ asset('assets/images/logo2.png') }}" alt="Image" class="image" width="9000">
    </div>
</div>
@endcomponent
