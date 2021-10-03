# Gestion d'un formulaire de contact

1. Creation d'un controlleur et d'une route
    - Le controlleur :
        - Dans le terminal: 
            - `php artisan make:controller ContactFormController`
        - Dans le fichier `app/Http/controllers/ContactFormController`
            - Création de la fonction create:
                -   ```
                        class ContactFormController extends Controller
                        {
                            public function create()
                            {
                                return view('contact.create')
                            }
                        }
                    ```
                - La view : 
                    - Dans le dossier `ressources/views`
                        - Création du dossier *contact* et de la view *create.blade.php*
                    - Dans le fichier `create.blade.php`:
                        - Création du formulaire de contact
                            -   ```
                                    <form method="POST" action="/contact>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" value="{{ old('name')}}" class="form-control">
                                            <div>{{ $errors->('name')}}</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mail">Email</label>
                                            <input type="text" name="email" value="{{ old('email')}}" class="form-control">
                                            <div>{{ $errors->('email')}}</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea  name="message" id="message" cols="30" rows="10" class="form-control"> {{ old('message')}}</textarea>
                                            <div>{{ $errors->('message')}}</div>
                                        </div>

                                        @csrf
                                        
                                        <button type="submit" class="btn btn-primary"> Send message </button>
                                    </form>
                                ```
                            - L'*action* et la *methode* du formulaire: là ou le formulaire va etre poster (action="/contact" methode="post"). 
                                - Création d'une route *POST* ayant un fonction *store* pour stocker les message. 
                                    -  Dans le fichier `wep.php`:
                                        - `Route:: post('contact','ControlFormContact@store')`
            - Creation de la fonction store             
                - Dans le controller *ControlFormContact*:
                    -   ```
                            class ContactFormController extends Controller
                            {
                                public function create()
                                {
                                    return view('contact.create')
                                }
                                public function store()
                                {
                                    dd(request()->all())
                                }
                            }
                        ```
                    - NB : *dd()*(Dump and Die): Fonction lpermettant de tester le contenu d'une variable(afficher le texte à l'ecran)
                        - `dd(request()->all())`
            - Configuration de la validation des entrées
                - Dans le controller *ControlFormContact*:
                    -   ```
                            class ContactFormController extends Controller
                            {
                                public function create()
                                {
                                    return view('contact.create')
                                }
                                public function store()
                                {
                                    $data= request()->validate([
                                        'name'=>'required',
                                        'email'=>'required|email',
                                        'message'=>'required'
                                    ]);
                                        
                                    // Envoyer le mail
                                }
                            }
                        ```
    - La route: 
        - Dans le fichier `web.php`
            - `Route::get('contact',[ContactFormController::class,'create'])`;

2. Envois d'email :
    - Utilisation de la fonction *artisan make:mail*
        - Elle permet de creer une nouvelle class Email
            -  Dans le terminal : 
                - `php artisan make:mail ContactFormMail --markdown=emails.contact.contact-form`
                    - L'option markadown va permettre de creer une view bien disposer dans le mail recus et il est possible de voir le contenu de la view sur dans fichier local.
                    Autrement dit, il va creer une view dans le dossier views. mais etant donner que la view creer ne correspond (n'aucun lien directer avec les autre view) on le met dans une dossier bien spécifique a lui meme. Ce dossier va contenir toute les views de mail.
                    - Ceci va creer : 
                        - Un dossier `resources/view/emails/contact`
                            - Dans le dossier contact il y a une generation automatique de la disposition :
                            -   ```
                                    @component('mail::message')
                                    # Introduction

                                    The body of your message.

                                    @component('mail::button', ['url' => ''])
                                    Button Text
                                    @endcomponent

                                    Thanks,<br>
                                    {{ config('app.name') }}
                                    @endcomponent 
                                ```
    - Comment envoyer l'email. 
        - Pour tester le fonctionnement, il y a des outils telle que [mailtrap](https://mailtrap.io/)
            - NB : C'est pour le teste et lorsque on va produire on utilisera un autre service 
    1. Dans le dossier `app` un nouveau dossier appellé Mail a ete creer et dans le quelle se trouve un fichier `ContactFormMail.php` 
        - il contien une class qui appeller le contact-form.
            -   ```
                    public function build()
                    {
                        return $this->markdown('emails.contact.contact-form');
                    }
                ```
    2. Dans la fonction store du controller `ContactFormController`:
        -   ```
                public function store()
                            {
                                $data= request()->validate([
                                    'name'=>'required',
                                    'email'=>'required|email',
                                    'message'=>'required'
                                ]);
                                    
                                Mail::to(test@test.com)->send(new ContactFormMail());
                            }
            ```
            - NB : On envois une *Mail* ( importation de cette fonction 'use illuminate\Support\Facades\Mail;) on envois à *to(...)* on envois *send(new .....). Il y a aussi l'importation de ContactFormMail. (use App\Mail\ContactFormMail)
    3. Configuration du fichier *.env*:
        -   ```
                MAIL_MAILER=smtp
                MAIL_HOST=smtp.mailtrap.io
                MAIL_PORT=2525
                MAIL_USERNAME=2bb0d40593b8f1
                MAIL_PASSWORD=568f7725c20a74
                MAIL_ENCRYPTION=tls
                MAIL_FROM_ADDRESS=null
                MAIL_FROM_NAME="${APP_NAME}"
            ```
            - nb: Il ne faut pas oublie de mettre une adresse de depart dans la config du fichier .env sinon il y a un message d'erreur:
                - `MAIL_FROM_ADDRESS=test@test.com`
    4. Configuration du fichier de view `resources/views/emails/contact-form.blade.php` Pour avoir les donnée du formulaire dans notre email.
        1. Dans le controller `ContactFormController`
            - Passer la variable *$data* dans la fonction *ContactFormMail()*
                - `Mail::to('test@test.com')->send(new ContactFormMail($data));`
        2. Dans le fichier `app/Mail/ContactFormMail.php` accepter la variable *$data*
            -   ```
                    public $data
                    .
                    .
                    .
                    public function __construct($data)
                    {
                        $this->data=$data
                    }
        3. Dans le fichier `resources/view/emails/contact/contact-form.blade.php`:
        -   ```
                @component('mail::message')
                # Merci pour votre message
                <strong>Name</strong>{{ $data['name']}}
                <strong>Email</strong>{{ $data['email']}}
                <strong>Message</strong>
                {{$data['message']}}
                @endcomponent 
            ```
        4. Rediriger l'utilisateur ou mettre un message de transmission.
            - Dans la fonction store du controller ContactFormController :
                ```
                    public function store()
                                {
                                    $data= request()->validate([
                                        'name'=>'required',
                                        'email'=>'required|email',
                                        'message'=>'required'
                                    ]);
                                        
                                    Mail::to(test@test.com)->send(new ContactFormMail());
                                    return redirect('contact')
                                }
                ```