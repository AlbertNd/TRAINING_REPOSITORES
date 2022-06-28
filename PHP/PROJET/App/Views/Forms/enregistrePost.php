<div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md m-2">
    <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
        <div class="flex justify-center items-center">
            <div class="p-5">
                <form action="/index.php" method="post">
                    <?php if(isset($regmessage)) : ?>
                        <div role="alert">
                            <div class="bg-green-500 text-white text-center font-bold rounded-t px-4 py-2">
                                Important
                            </div>
                            <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-800 text-center">
                                <p> <?php echo $regmessage?> </p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold m-2" for="titre">titre de l'offre</label>
                        <input class="border rounded w-full py-2 px-3 text-gray-700 mb-2" type="text" name="titre" id="">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold m-2" for="contenu">Description de l'offre </label>
                        <textarea class="border rounded w-full py-2 px-3 text-gray-700 mb-2" name="contenu" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="flex">
                        <button class="bg-green-800 py-2 px-3 rounded w-full text-white" type="submit"> Poster 
                        </button>
                    </div>
                </form>
                <form action="index.php" method="post">
                    <input class="bg-red-500 py-2 px-3 rounded text-white w-full mt-2" name="Annule" type="submit" value="Annuler">
                </form>
            </div>

        </div>
    <?php else : ?>
        <div class="">
            <div class="p-10 text-2xl ">
                Veuillez vous connecter avant de publier une offre
            </div>
        </div>
    <?php endif; ?>
</div>