<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu de la semaine') }}
        </h2>
    </x-slot>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            border: 1px solid #000 !important;
            text-align: center;
        }

        th {
            background-color: #fff;
        }

        tr:nth-child(even) {
            background-color: #fff;
        }

        tr:hover {
            background-color: #fff;
        }

        table {
            width: 80%;
            margin: 0 auto ;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border: 1px solid #e5e7eb;
            text-align: center;
        }

    </style>


        <div class="mt-6">
            <table>
                <thead>
                <tr>
                    <th>Lundi</th>
                    <th>Mardi</th>
                    <th>Mercredi</th>
                    <th>Jeudi</th>
                    <th>Vendredi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <h4 style="font-weight: bold;"> Entrée </h4>
                        <br>
                        Radis rose
                    </td>


                    <td>
                        <h4 style="font-weight: bold;"> Entrée </h4>
                        <br>
                        Salade verte
                    </td>

                    <td>
                        <h4 style="font-weight: bold;"> Entrée </h4>
                        <br>
                        Radis rose
                    </td>

                    <td>
                        <h4 style="font-weight: bold;"> Entrée </h4>
                        <br>
                        Salade verte
                    </td>

                    <td>
                        <h4 style="font-weight: bold;"> Entrée </h4>
                        <br>
                        Radis rose
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4 style="font-weight: bold;"> Plat </h4>
                        <br>
                        Sauté de boeuf sauce poivrade
                    </td>

                    <td>
                        <h4 style="font-weight: bold;"> Plat </h4>
                        <br>
                        Beignets de poisson blanc
                    </td>

                    <td>
                        <h4 style="font-weight: bold;"> Plat </h4>
                        <br>
                        Sauté de boeuf sauce poivrade
                    </td>

                    <td>
                        <h4 style="font-weight: bold;"> Plat </h4>
                        <br>
                        Beignets de poisson blanc
                    </td>

                    <td>
                        <h4 style="font-weight: bold;"> Plat </h4>
                        <br>
                        Sauté de boeuf sauce poivrade
                    </td>
                </tr>


                <td>
                    <h4 style="font-weight: bold;"> Garnitures </h4>
                    <br>
                    Haricots verts persillées
                </td>

                <td>
                    <h4 style="font-weight: bold;"> Garnitures </h4>
                    <br>
                    Spaghetti
                </td>

                <td>
                    <h4 style="font-weight: bold;"> Garnitures </h4>
                    <br>
                    Haricots verts persillées
                </td>

                <td>
                    <h4 style="font-weight: bold;"> Garnitures </h4>
                    <br>
                    Spaghetti
                </td>

                <td>
                    <h4 style="font-weight: bold;"> Garnitures </h4>
                    <br>
                    Haricots verts persillées
                </td>

                <tr>

                <td>
                    <h4 style="font-weight: bold;"> Produits laitiers </h4>
                    <br>
                    Assortiment de yaourts
                </td>

                    <td>
                        <h4 style="font-weight: bold;"> Produits laitiers </h4>
                        <br>
                        Fromage fondu la vache qui rit
                    </td>

                    <td>
                        <h4 style="font-weight: bold;"> Produits laitiers </h4>
                        <br>
                        Assortiment
                    </td>

                    <td>
                        <h4 style="font-weight: bold;"> Produits laitiers </h4>
                        <br>
                        Fromage fondu la vache qui rit
                    </td>

                    <td>
                        <h4 style="font-weight: bold;"> Produits laitiers </h4>
                        <br>
                        Assortiment
                    </td>

                </tr>

                <tr>
                    <td>
                        <h4 style="font-weight: bold;"> Dessert </h4>
                        <br>
                        Corbeille de fruit
                    </td>

                    <td>
                        <h4 style="font-weight: bold;"> Dessert </h4>
                        <br>
                        Pudding aux fruits rouges
                    </td>

                    <td>
                        <h4 style="font-weight: bold;"> Dessert </h4>
                        <br>
                        Corbeille de fruit
                    </td>

                    <td>

                        <h4 style="font-weight: bold;"> Dessert </h4>
                        <br>
                        Pudding aux fruits rouges
                    </td>

                    <td>
                        <h4 style="font-weight: bold;"> Dessert </h4>
                        <br>
                        Corbeille de fruit
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

        </x-app-layout>
