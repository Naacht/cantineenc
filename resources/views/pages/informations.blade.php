<!-- informations.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Your custom styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1, h2 {
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        a {
            color: #4caf50;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .section {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        /* Styles for the sections */
        .informations-section {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .reservations-section {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>


<div class="max-w-7xl mx-auto p-6 lg:p-8 container">
    <div class="informations-section flex items-center justify-center mb-4">
        <img width="50" height="50" src="{{asset("/image/logo-enc.jpg")}}"/>
        <h1 class="ml-4 text-xl font-semibold text-gray-900">Informations</h1>

    <!-- Informations Section -->
    <div class="mt-6">
        <p>Solde de la restauration : {{ $soldeRestauration }}</p>
        <p>Prix de la restauration : {{ $prixRestauration }}</p>
        </div>
    </div>

    <!-- Réservations Section -->
    <div class="row-span-1">
    <div class="reservations-section">
        <h2>Réservations</h2>

        @if(count($reservations) > 0)
            <ul>
                @foreach($reservations as $reservation)
                    <li>
                        {{ $reservation->nom_repas }} - {{ $reservation->date_reservation }}
                        <a href="{{ route('annuler', ['id' => $reservation->id]) }}">Annuler</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Aucune réservation pour le moment.</p>
        @endif
    </div>
        </div>

    <div class="max-w-7xl mx-auto p-6 lg:p-8 container text-right">
        <a href="{{ url('/dashboard') }}" class="p-4 bg-gray-300 text-gray-800 hover:bg-gray-400 rounded-md m-4">Retour</a>
    </div>

</div>
</body>
</html>
