<?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
    <div class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md ">
        <form action="index.php" method="POST">

            <?php if (isset($logMessage)) : ?>
                <div class="text-center font-serif ">
                    <?php echo $logMessage ?>
                </div>
            <?php endif ?>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="mail">Mail</label>
                <input class="border rounded w-full py-2 px-3 text-gray-700 mb-2" type="text" name="mail" id="">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pass">Mot de pass</label>
                <input class="border rounded w-full py-2 px-3 text-gray-700 mb-4" type="password" name="pass" id="">
            </div>
            <div class="flex items-start">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" value="" class="w-4 h-4 bg-gray-50 rounded border border-gray-300">
                    </div>
                    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Se souvenir </label>
                </div>
                <a href="#" class="ml-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Mot de oublier ?</a>
            </div>
            <div class="flex justify-center">
                <button class="bg-green-500 text-white px-4 py-2 m-3 rounded" type="submit">connection</button>
            </div>
        </form>
    </div>
<?php endif; ?>