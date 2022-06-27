<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex justify-center items-center">
    <div class="">
        <div class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">
            <form action="/index.php" method="POST">
                <?php if (isset($message)) : ?>
                    <div class="text-center font-serif ">
                        <?php echo $message ?>
                    </div>
                <?php endif ?>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="regnom">Nom</label>
                    <input class="border rounded w-full py-2 px-3 text-gray-700 mb-2" type="text" name="regnom" id="">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="regprenom">Prenom</label>
                    <input class="border rounded w-full py-2 px-3 text-gray-700 mb-2" type="text" name="regprenom" id="">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="regmail">Email</label>
                    <input class="border rounded w-full py-2 px-3 text-gray-700 mb-2" type="text" name="regmail" id="">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="regpass">Mot de pass</label>
                    <input class="border rounded w-full py-2 px-3 text-gray-700 mb-4" type="text" name="regpass" id="">
                </div>
                <div>
                    <button class="bg-blue-800 py-2 px-3 rounded-lg w-full text-white hover:bg-blue-700 " type="submit">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>