# Responsive navBar CSS & JS 

#### HtML

1. liaison des fichier 
    - javascript
    - Css

2. Création du header 
    - la bar de navigation 
        - les liens de la bar de navigation 
        - la div de **hamburger**
            - Les **span** pour les bars de l'hamburger 
     
    ```
      <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="styles.css">
            <title>Document</title>
        </head>
        <body>
            <header>
                <nav class="navbar">
                    <a href="http://" class="nav-branding">DEV.</a>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Contact</a>
                    </li>
                </ul>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>

                </nav>
            </header>

            <script src="scripts.js"></script>
        </body>
        </html>  

    ```
#### Le CSSS 

1. le hamburger 
2. les bars
3. Les media query 
    - fonction d'activation pour le js 

    ```
        body{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .hamburger{
            display: none;
            cursor: pointer;
        }

        .bar{
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            background-color: black;
        }

        @media screen and (max-width:768px) {
            .hamburger{
                display: block;
            }
            /* l'effet de la croix et disparition des bar (la classe active sera mis via  js*/

            .hamburger.active .bar:nth-child(2){
                opacity: 0;
            }
            .hamburger.active .bar:nth-child(1){
                transform: translateY(8px) rotate(45deg);
            }
            .hamburger.active .bar:nth-child(3){
                transform: translateY(-8px) rotate(-45deg);
            }

            /* le menu qui appait en bas etant donnée que l'autre doit disparaitre à la reduction */ 

            .nav-menu {
                position: fixed;
                left: -100%;
                top: 70px;
                gap: 0;
                flex-direction: column;
                width: 100%;
                text-align: center;
                transition: 0.3s;
            }

            .nav-item{
                margin: 16px 0;
            }

            .nav-menu.active{
                left:0;
            }
        }
    ```

#### Le JS 

```
    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");


    hamburger.addEventListener("click",()=>{
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    })

    /* une fois que l'on click sur un des lien le menu doit disparaitre */ 

    document.querySelectorAll(".nav-link").forEach(n => n.addEventListener("click", () => {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");
    }))
```