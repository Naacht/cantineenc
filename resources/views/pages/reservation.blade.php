<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Réservation de la cantine') }}
        </h2>
    </x-slot>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <style>

            .date-input-container {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            .reservation-container {
                background-color: #fff;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 400px;
                text-align: center;
                margin: 0 auto;
            }


            .date-input {
                width: 200px;
            }

            .reservation-btn {
                width: 200px;
            }

        </style>



        <form method="post" action="{{ route('reservation') }}">
            @csrf
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Récupérer l'élément d'entrée de la date
                    var dateInput = document.getElementById('date');

                    // Définir la date minimum
                    var today = new Date();
                    var minDate = today.toISOString().split('T')[0];

                    // Définir la date minimum dans l'élément d'entrée de la date
                    dateInput.setAttribute('min', minDate);

                    document.getElementById('reservation-btn').addEventListener('click', function () {
                        // Récupérer la date entrée par l'utilisateur
                        var selectedDate = new Date(dateInput.value);

                        // Options de formatage pour le mois
                        var options = { month: 'long' };
                        var month = new Intl.DateTimeFormat('fr-FR', options).format(selectedDate);

                        // Construction de la date au format souhaité
                        var formattedDate = ' ' + selectedDate.getDate() + ' ' + month + ' ' + selectedDate.getFullYear();

                        // Afficher la date formatée
                        var successMessage = document.getElementById('success-message');
                        successMessage.innerHTML = 'Réservation réussie pour le ' + formattedDate;
                        successMessage.style.display = 'block';
                    });
                });

            </script>

    <body class="bg-gray-100">
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="mt-6 reservation-container bg-white rounded-lg shadow-md p-6">
            @csrf
            <div class="form-group date-input-container">
            <div class="form-group">
                <label for="date" class="block font-semibold">Date</label>
                <input type="date" id="date" name="date" required
                       class="date-input block w-full border-gray-300 rounded-md shadow-sm focus:border-green-400 focus:ring focus:ring-green-200">
            </div>
            <div class="form-group">
                <button type="submit" id="reservation-btn"
                        class="reservation-btn block w-full bg-green-500 text-white rounded-md py-2 px-4 font-semibold">Réserver</button>
            </div>
            </div>
            <div id="success-message" class="success-message" style="display: none;"></div>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    </body>
</x-app-layout>
