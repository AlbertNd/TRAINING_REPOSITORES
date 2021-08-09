# Chargement d'une view dans un div 

1. CDN jquery 
    - [CDN](https://code.jquery.com/)
        - `<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>`
        - NB : Prendre la version complete et non la slim 
2. Configuration de JQuery dans le fichier de gestion 
    -   ```
            <html>
                <head>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            </head>
                <body> .... </body>
            </html>
        ```
3. Configuration du fichier JS dans le fichier de gestion 
    -   ```
            <html>
                <head>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            </head>
                <body> .....
                 
                <script src="{{ asset('js/script.js')}}"></script>
                </body>
            </html>
        ```
4. Configuration de la div et du button 
    -   ```
            <button id="buton" onclick="show()">
                click on me
            </button>

            <div id="IdDiv">

            </div>
        ```

5. Configuration du fichier JS
    -   ```
            function show(){
                $(document).ready(function() {
                $('#IdDiv').load('/URL');
                });
            }
        ```

6. Configuration de la route (dans laravel)
    -   ```
            use Illuminate\Support\Facades\View;

            Route::get('/URL', function() {
                return View::make('LaView');
            });
        ```