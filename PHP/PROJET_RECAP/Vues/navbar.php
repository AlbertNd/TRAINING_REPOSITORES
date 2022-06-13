<div class="container flex flex-wrap justify-between items-center mx-auto">
    <div>
        <ul class="flex">
            <li class="p-3">lien 1</li>
            <li class="p-3">lien 2</li>
            <li class="p-3"> 
                <a href="Formulaire/Enregistre.php"> Enregistrer </a>
            </li>
        </ul>
    </div>
    <div>
        <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
            <a href="#">
                <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
                    Se connecter 
                </button>
            </a>
        <?php else : ?>
            <div class="container flex flex-wrap justify-center">
                <div class="mr-10 py-2 px-4 ">
                    <?php echo $_SESSION['LOGGED_USER'] ?>
                </div>
                <div>
                   <a href="/Formulaire/Logout.php">
                       <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
                           Deconnection
                       </button>
                   </a> 
                </div>

            </div>

        <?php endif; ?>
    </div>

</div>