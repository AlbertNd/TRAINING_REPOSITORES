<?php
require_once('Control/Verification.php');
?>
<?php if (!isset($loggedUser)) : ?>
    <div class=" max-w-xs">

        <form action="index.php" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

            <?php if (isset($errorMessage)) : ?>
                <H1>
                    <?php echo $errorMessage; ?>
                </H1>
            <?php endif; ?>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="text" name="email" id="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">password</label>
                <input type="password" name="password" id="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Envoyer</button>

        </form>

    </div>

<?php else : ?>
    <h1>
        <?php echo $loggedUser['email']; ?> bienvenu
    </h1>
<?php endif; ?>