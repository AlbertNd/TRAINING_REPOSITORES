<!doctype html>
<html>

<head>
    <!-- ... --->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Artbeltrans</title>
</head>

<body>
    <div id="secteur" class="p-3 sm:pt-20 min-h-screen">
        <!-- titre -->
        <div class="w-full text-center">
            <h1 class=" text-xl text-green-800 font-thin font-serif font-bold sm:text-2xl md:text-3xl 2xl:text-5xl uppercase"> Secteurs d'activité ciblés
            </h1>
            <h2 class="text-xs md:text-xl text-center font-serif text-green-800 uppercase italic p-5">
                Transport routier des marchandises pour compte de tiers
            </h2>
        </div>
        <!-- La ligne -->
        <div class="flex justify-center">
            <div class=" w-1/5 border-b-2 border-green-800">
            </div>
        </div>
        <!-- Les slides-->
        <div class="test overflow-hidden p-2 sm:p-10 " id="myDiv">
            <!-- Contenant daffichage -->
            <div class="relative h-64 sm:h-96 grid grid-cols-6">
                <!-- Boutton gauche-->
                <div class="flex justify-center items-center">
                    <button class=" bg-green-800 w-10 h-10 sm:w-20 sm:h-20 cursor-pointer rounded-full my-auto text-white hover:text-green-800 hover:bg-gray-200 border border-green-800" id="prevbtn">
                        &#10094;
                    </button>
                </div>
                <!--  Contenant des slides -->
                <div class="affSlide h-64 sm:h-96 h-auto w-full flex flex-col justify-center items-center rounded sm:shadow-2xl col-span-4">
                    <!-- Les slides -->
                    <div class="mySlide hidden h-96 w-full bg-cover bg-center rounded" style="background-image: url(https://images.pexels.com/photos/2348359/pexels-photo-2348359.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500)" id="myslide">
                        <div class="bg-green-800 bg-opacity-50 w-full h-full flex justify-center items-center text-white text-center text-lg font-thin font-serif font-bold">
                            <span class="font-thin font-serif font-bold uppercase">Transporteur de marchandises </span>
                        </div>
                    </div>
                    <div class="mySlide hidden h-96 w-full bg-cover bg-center rounded" style="background-image: url(https://images.pexels.com/photos/6169661/pexels-photo-6169661.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500)" id="myslide">
                        <div class=" bg-green-800 bg-opacity-50 w-full h-full flex justify-center items-center text-white text-center text-lg font-thin font-serif font-bold">
                            <span class="font-thin font-serif font-bold uppercase">Déménagement </span>
                        </div>
                    </div>
                    <div class="mySlide hidden h-96 w-full bg-cover bg-center rounded" style="background-image: url(https://images.pexels.com/photos/6169664/pexels-photo-6169664.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500)" id="myslide">
                        <div class="bg-green-800 bg-opacity-50 w-full h-full flex justify-center items-center text-white text-center text-lg font-thin font-serif font-bold">
                            <span class="font-thin font-serif font-bold uppercase">Livraisons </span>
                        </div>
                    </div>
                    <div class="mySlide hidden h-96 w-full bg-cover bg-center rounded" style="background-image: url(https://images.pexels.com/photos/797570/pexels-photo-797570.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500)" id="myslide">
                        <div class=" bg-green-800 bg-opacity-50 w-full h-full flex justify-center items-center text-white text-center text-lg font-thin font-serif font-bold">
                            <span class="font-thin font-serif font-bold uppercase">Dépannage automobile </span>
                        </div>
                    </div>
                </div>
                <!--Boutton gauche -->
                <div class="flex justify-center items-center">
                    <button class=" bg-green-800 w-10 h-10 sm:w-20 sm:h-20 cursor-pointer rounded-full my-auto text-white hover:text-green-800 hover:bg-gray-200 border border-green-800" id="nextbtn">
                        &#10095;
                    </button>
                </div>

            </div>

        </div>
        <!-- texte bas de page -->
        <div>
            <h4 class="text-xs text-center font-serif font-bold  text-green-800 uppercase italic p-3">
                Pour accéder à la profession de transporteur routier de marchandises pour compte de tiers, le candidat-transporteur doit satisfaire à quatre conditions essentielles
            </h4>
            <div>
                <ul class="list list-decimal list-inside ">
                    <li class="text-xs text-center font-serif text-green-800 uppercase italic p-1">avoir un siège d’établissement effectif en Belgique </li>
                    <li class="text-xs text-center font-serif text-green-800 uppercase italic p-1">satisfaire à la condition de capacité professionnelle</li>
                    <li class="text-xs text-center font-serif text-green-800 uppercase italic p-1">Satisfont à la condition d’honorabilité</li>
                    <li class="text-xs text-center font-serif text-green-800 uppercase italic p-1">satisfaire à la condition de capacité financière</li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>

<script src="{{ asset('js/slidejs.js')}}" defer></script>