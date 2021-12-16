### Comment envoyer un courriel avec PHPMailer dans Laravel sur serveur d'hébergement . 

1. Telechargement de la librairie [PHPMailer](https://github.com/PHPMailer/PHPMailer). 
    - Soit le ZIP 
    - soit via la commande `composer require phpmailer/phpmailer` (Bien savoir ou se trouve le dossier téléchargé) 
2. Lancer l'application laravel 
3. Creation du controleur Contact 
    -`php artisan make:controller ContactController`
    - Dans le controlleur Contact:
        1. Creation d'une fonction index():
            ```
                function index(){
                    return view('email.index')
                }
            ```
        2. Creation d'une fonction send():
            ```
                function send(Request $request){
                    echo "l'envois atterri ici "
                }
            ```
            - La configuration de cette fonction est reprise à la section **6.2** 
4. Creation de la view 
    - ressources
        - views
            - creation du dossier mails
                - fichier : `index.blade.php`
    - Dans la views index.blade.php : 
        -   Creation de l'interface d'utilisateur 

        ```
            <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Send email</title>
                        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                    </head>
                    <body>
                        <div class="bg-green-500 flex items-center justify-center min-h-screen">
                            <div class="w-full max-w-xs">
                                <form action="{{ route('email.send')}}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                            name
                                        </label>
                                        <input class="shadow appearance-none border w-full py-2 px-3 " type="text" placeholder="your name" name="name">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                            Email
                                        </label>
                                        <input class="shadow appearance-none border w-full py-2 px-3 " type="text" placeholder="your email" name="email">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">
                                            Subject
                                        </label>
                                        <input class="shadow appearance-none border w-full py-2 px-3 " type="text" placeholder="name" name="sujbect">
                                    </div>
                                    <div class="mb-4">
                                        <textarea class="shadow appearance-none border w-full" name="message" cols="30" rows="10"></textarea>
                                    </div>  
                                    <div class="flex justify-center">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                            Send
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </body>
                </html>
        ```
        -   **NB : pas oublier le @csrf dans le formulaire**

5. Creation de la route 
    - routes
        - web.php
            1. importation de la classe ContactController
                - `use App\Http\Controllers\ContactController`
            2. Route pour la fonction index 
                - Route::get('contact',[ContactController::class,'index'])
            3. test du fonctionnement correct de la route dans la bar d'URL `...\contact`
            4. Route d'envois
                - Route::post('send',[ContactController::class,'send'])->name('email.send')
                    - Le nom `email.send` sera à utiliser comme attribut de la valeur action du formuaire 
                        ```
                            <form action="{{ route('email.send')}}" method="post">
                        ```
            5. Test du fonction du button sumettre et ainsi que de la route post 
                - si possible completer la fonction send() pour un retour preci:
                    -   ```
                            function send(Request $request)
                                {
                                    $name = $request->name;
                                    $email = $request->email;
                                    $subject = $request->subject;
                                    $message = $request->message;

                                    return $request->input();
                                }
                        ```

6.  Importation de la librairie telecharger dans le dossier public de l'application.
    1. Copier et coller le dossier PHPMailer dans le dossier public de l'application
    2. Configuration de la fonction **send()**
        -   ```
                
            ```