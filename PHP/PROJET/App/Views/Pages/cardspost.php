<?php foreach ($datas->selectionDonneUtilisateuPost() as $data) { ?>
    <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md m-2">
        <a href="#">
            <img class="rounded-t-lg" src="https://cdn.pixabay.com/photo/2022/03/01/00/12/tree-7040298_960_720.jpg" alt="" />
        </a>
        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold text-gray-900 ">
                <?php echo $data['titre'] ?>
            </h5>

            <div class="mb-3 font-normal text-gray-700 ">
                <?php echo $data['contenu'] ?>
            </div>
            <div class="mb-3">
                Mis en ligne le : <?php echo $data['date'] ?>
            </div>
            <div class="mb-3">
                Auteur de l'offre : <?php echo $data['nom'] ?>
            </div>
            <?php if ($_SESSION['LOGGED_USER'] && $_SESSION['LOGGED_STATUS'] === 0) : ?>
                <input class="bg-green-700 hover:bg-blue-800 py-4 px2 text-center w-full rounded-lg text-white" name="<?php echo $data['post_id'] ?>" value="Postuler">

            <?php elseif ($_SESSION['LOGGED_USER'] && $_SESSION['LOGGED_STATUS'] === 1):?>
                <?php if ($_SESSION['LOGGED_ID'] === $data['user_id']):?>
                    <div class="flex">
                        <input class="bg-green-700 hover:bg-green-800 py-2 px-2 m-1 text-center w-full rounded-lg text-white" name="<?php echo $data['post_id'] ?>" value="Editer">

                        <input class="bg-red-700 hover:bg-red-800 py-2 px-2 m-1 text-center w-full rounded-lg text-white" name="<?php echo $data['post_id'] ?>" value="Supprimer">
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <button class="bg-blue-700 hover:bg-blue-800 py-4 px2 text-center w-full rounded-lg text-white">
                    Connectez vous pour postuler
                </button>
            <?php endif; ?>
        </div>

    </div>
<?php } ?>