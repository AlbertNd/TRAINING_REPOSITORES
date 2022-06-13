<?php if (!isset($_SESSION['LOGGED_USER'])) : ?>

    <div class="contenaire flex justify-center">
        <form action="index.php" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
                <div class="alert arte-danger" role="alert">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2"> email</label>
                <input type="email" name="email" id="" class="border rounded w-full py-2 px-3 text-gray-700">
            </div>
            <div class="mb-3">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mot de pass</label>
                <input type="password" name="password" id="" class="border rounded w-full py-2 px-3 text-gray-700" >
            </div>
            <div class="mb-3 flex justify-center">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded "> connecter</button>
            </div>

        </form>

    </div>

<?php endif; ?>