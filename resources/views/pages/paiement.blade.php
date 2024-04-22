<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Paiement') }}
        </h2>
    </x-slot>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>

        .payment-section {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style des étiquettes */
        label {
            display: block;
            margin-bottom: 8px;
        }

        /* Style des champs de saisie */
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        /* Style du bouton de soumission */
        button {
            background-color: #4caf50;
            color: #000000;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        /* Style du bouton de soumission au survol */
        button:hover {
            background-color: #45a049;
        }

        /* Style des messages d'erreur */
        .error-message {
            color: #d9534f;
            margin-top: -8px;
            margin-bottom: 16px;
        }


    </style>

<body class="antialiased min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">

    <div class="mt-6">
        <div class="payment-section">
            <form action="{{ route('process_payment') }}" method="POST">
                @csrf
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="montant">Montant à saisir</label>
        <input type="double" id="montant" name="montant" required>

        <label for="numero_carte">Numéro de carte de crédit</label>
        <input type="text" id="numero_carte" name="numero_carte" maxlength="16" required>

        <label for="date_expiration">Date d'expiration</label>
        <input type="text" id="date_expiration" name="date_expiration" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" placeholder="MM/AA" required>

        <label for="code_securite">Code de sécurité</label>
        <input type="text" id="code_securite" name="code_securite" maxlength="3" required>

         <script>

    document.addEventListener('DOMContentLoaded', function () {
        var expirationInput = document.getElementById('date_expiration');

        expirationInput.addEventListener('blur', function () {
            var inputValue = expirationInput.value;
            if (inputValue) {
                var pattern = /^(0[1-9]|1[0-2])\/[0-9]{2}$/;
                if (!pattern.test(inputValue)) {
                    alert('Veuillez entrer une date d\'expiration au format MM/AA.');
                    expirationInput.value = '';
                    expirationInput.focus();
                }
            }
        });
    });
</script>

        <button type="submit">Valider</button>
            </form>
        </div>
    </div>
</body>
</x-app-layout>
