<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div class="relative bg-red-500 min-h-96 flex flex-col justify-center items-center" id="test">

        <div class="shoSlides bg-blue-800 h-96 w-96 flex justify-center items-center" id="parent">
            <div class="mySlide hidden" id="mySlide">
                <div class="text ">
                    texte 1
                </div>
            </div>
            <div class="mySlide hidden " id="mySlide">
                <div class="text">
                    texte 2
                </div>
            </div>
            <div class="mySlide hidden " id="mySlide">
                <div class="text">
                    texte 3
                </div>
            </div>
        </div>
        
                <button class=" bg-green-500 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer rounded-full z-10 inset-y-0 left-1/3 my-auto" id="prevbtn">
                    &#10094;
                </button>
            
            
                <button class=" bg-blue-500 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer rounded-full  z-10 inset-y-0 right-1/3 my-auto " id="nextbtn">
                    &#10095;
                </button>
            
        </div>


    </div>

    <script src="{{ asset('js/scripts.js')}}" defer></script>
</body>

</html>