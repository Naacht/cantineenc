<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informations') }}
        </h2>
    </x-slot>

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

            .informations-section, .reservations-section {
                width: 100%; /* Changer la largeur maximale à 100% */
                margin-bottom: 20px; /* Ajouter une marge basse pour l'espace */
            }
        </style>
    <body>

    <div class="max-w-7xl mx-auto p-6 lg:p-8 container flex flex-col items-center justify-center">
        <div class="informations-section max-w-md">
            <img width="50" height="50" src="{{asset("/image/logo-enc.jpg")}}"  class="mx-auto" />

            <!-- Informations Section -->
            <div class="mt-6 text-center">
                <p>Solde de la restauration : {{ $soldeRestauration }}</p>
                <p>Prix de la restauration : {{ $prixRestauration }}</p>
            </div>
        </div>

        <!-- Réservations Section -->
            <div class="reservations-section max-w-md">
                <h2 class="text-center mb-5">Réservations</h2>

                @if(count($reservations) > 0)
                    <ul>
                        @foreach($reservations as $reservation)
                            <li class="flex justify-between">
                                <div>
                                    {{ $reservation->nom_repas }} {{ date('d F Y', strtotime($reservation->date_reservation)) }}
                                </div>
                                <a href="{{ route('annuler', ['id' => $reservation->id]) }}" class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-0.5 px-2 rounded float-right">Annuler</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center">Aucune réservation pour le moment.</p>
                @endif
            </div>
        </div>

    </div>
    </body>
</x-app-layout>
