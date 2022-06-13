<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Enregistrer</title>
</head>

<body class="pt-20">
    <div class="container flex justify-center items-center">

        <form action="/Control/EnregistrerBD.php" method="POST">

            <div class="mb-3">
                <label for="Nom" class="block text-gray-700 text-sm font-bold mb-2"> Nom </label>
                <input type="text" name="Nom" class="border rounded w-full py-2 px-3 text-gray-700">
            </div>
            <div class="mb-3">
                <label for="Prenom" class="block text-gray-700 text-sm font-bold mb-2"> Prenom </label>
                <input type="text" name="Prenom" class="border rounded w-full py-2 px-3 text-gray-700">
            </div>
            <div class="mb-3">
                <label for="Mail" class="block text-gray-700 text-sm font-bold mb-2"> Email </label>
                <input type="text" name="Mail" class="border rounded w-full py-2 px-3 text-gray-700">
            </div>
            <div class="mb-3">
                <label for="Password" class="block text-gray-700 text-sm font-bold mb-2"> Mot de pass </label>
                <input type="text" name="Password" class="border rounded w-full py-2 px-3 text-gray-700">
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Enregistrer</button>
            </div>

        </form>

    </div>
</body>

</html>