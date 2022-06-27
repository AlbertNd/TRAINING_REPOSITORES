<nav class="bg-white border border-green-800 px-4 py-3 m-5 rounded">
    <div class="flex justify-between">
        <div>
            <ul class="flex">
                <li class="px-5">
                    <a href="/"> Lien 1 </a>    
                </li>
                <li class="px-5">Lien 2</li>
                <li class="px-5">Lien 3</li>
            </ul>
        </div>
        <div class="flex justify-between">
            <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                

                    <div class="">
                        <h1><?php echo $_SESSION['LOGGED_USER']; ?></h1>
                    </div>
                
            <?php endif; ?>
        </div>
        <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
            <div>
                <a href="/App/Views/Forms/logout.php">
                    <button class="bg-green-500 py-1 px-4 text-white">
                        deconnection
                    </button>
                </a>
            </div>
        <?php endif; ?>
    </div>
</nav>