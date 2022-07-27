<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="Css/style.css">
</head>

<body>
  <nav class="w-full p-5">
    <div class="flex">
      <div class="flex-none w-full md:w-1/3  h-24 bg-red-500">
        <div class="flex md:justify-center items-center">
          <?php include('logo.php'); ?>



          
        </div>
      </div>
      <div class="grow h-24 bg-red-200 hidden md:block">
        <div class="border border-green-500 h-12">
        </div>
        <div class="border border-black h-12 flex justify-center">
          <ul class="flex items-center md:space-x-8">
            <li class=" lien md:p-2">Lien 1</li>
            <li class=" md:p-2">Lien 2</li>
            <li class=" md:p-2">Lien 3</li>
          </ul>

        </div>
      </div>

    </div>
  </nav>
  
</body>

</html>