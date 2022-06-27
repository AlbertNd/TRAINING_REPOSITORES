<?php foreach ($datas->selectionDonneUtilisateuPost() as $data) { ?>
    <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md m-2">
        <a href="#">
            <img class="rounded-t-lg" src="https://cdn.pixabay.com/photo/2022/03/01/00/12/tree-7040298_960_720.jpg" alt="" />
        </a>
        <div class="p-5">

            <h5 class="mb-2 text-2xl font-bold text-gray-900 ">
                <?php echo $data['titre'] ?>
            </h5>

            <p class="mb-3 font-normal text-gray-700 ">
                <?php echo $data['contenu'] ?>
            </p>
            <?php if($_SESSION['LOGGED_USER']): ?>
                <button class="bg-blue-700 hover:bg-blue-800 py-4 px2 text-center w-full rounded-lg text-white">
                Postuler                
                </button>
            <?php else : ?>
                <button class="bg-blue-700 hover:bg-blue-800 py-4 px2 text-center w-full rounded-lg text-white">
                Connectez vous pour postuler
            </button>
            <?php endif; ?>
        </div>

    </div>
<?php } ?>