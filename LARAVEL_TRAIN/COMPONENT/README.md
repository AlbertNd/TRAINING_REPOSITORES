## Etapes de creation d'un composant
[tuto youtube](https://www.youtube.com/watch?v=VJ1yeoJqpr0&list=PLcpCZL_oOP_5GcxuvMDx1PELWqLV1txf6&index=1&t=352s)

1. Dans le terminale:
    - `php artisan make:component nom_du_composant` 
        - **LA commande a creer deux fichiers** : 
            1. `app/View/Components/nom_du_composant.php` 
            2. `ressource/views/components/nom_du_composant.php`
2. Dans le fichier 1 **app/View/Components/nom_du_composant.php**:
    - Une class portant le nom du composant
        - une fonction render qui returne la view qui se trouve dans le fichier 2 (`ressource/views/components/nom_du_composant.php`) 
3. Dans la fichier 2 **ressource/views/components/nom_du_composant.php**
    - Contient le contenu à afficher lorsque l'on appelle le composant 
4. Inclure le composant dans une view differente:
    - `<x-nom_du_composant/>` : NB : le nom_du_composant doit comment par une minuscule et si le composant à ete fait avec une combinaison (AlertMessage) alorson ecrit : `<x-alert-message/>`
**Nb**: Pour le moment le contenue est statique.
5. Rendre un contenu dynamique: 
    - **Les possibilités**:
        1. Apartir de la balise creer dans le view `<x-nom_du_composant/>`: on lui passe un paramettre
            1. `<x-nom_du_composant message="le message à diffuser" />`
            2. Definir la viariable message:
                - Dans `app/View/Components/nom_du_composant.php`
                    - Dans le **constructeur** 
                        -   ```
                                public function __construct($message){
                                    $this->message = $message;
                                }
                            ```
                    - Definition de la variable dans la class
                        - `public $message` ( just au dessus de la fonction du controlleur) 
            **NB** Il est possible d'avoir une erreur de type : **Unresolvable dependency resolving [ .....]**
                - Dans ce cas on nettoie le residu de la view :`php artisan view:clear`
            3. Pour mettre le message dans le view:
                - {{ $message }} ou dans une "div"
            4. pour y inclure un message d'erreur par exemple:
                - Rajout d'une autre paramettre:
                    1. `<x-nom_du_composant message="le message à diffuser" type="error"/>`
                    2. Dans le constructeur on y rajoute le deuxieme paramettre 
                        -   ```
                                public function __construct($message, $error){
                                    $this->message = $message;
                                    $this->type=$type;
                                }
                            ```
                        - Definition de la variable dans la class
                        - `public $type`
                    3. rejout d'une methode de gestion d'action en fonction d'error par exemple changement du de la couleur du back ground (rouge si error et verte si pas d'erreur et/ou par defaut):
                        -   ```
                                public fucntion typeClass(){
                                    if($this->type === 'error){
                                        return 'bg-red-600 text-white';
                                    }
                                    return 'bg-green-600 text-white'
                                }
                            ```
                    4. Rajout de la methode dans la div cible: 
                        - `<div class="flex items-center justify-between px-6 py-4 rounded {{ $typeClass()}}"> ..... </div>`
                    5. Pour rendre le paramettre optionnel : 

                        -   ```
                                public function __construct($message, $error = null){
                                    $this->message = $message;
                                    $this->type=$type;
                                }
                            ```

        2. Passe la variable de aniere plus dinamique c'est à dire pas dans la balise:
            - Rajout de "**:**" avant la variable dans la balise.
            - Rajout d'un guillemet car c'est du php ( pour declarer un string) 
                - `<x-nom_du_composant :message="'le message à diffuser'" type="error"/>`
            - Passer n'importe quelle variable: 
                - `<x-nom_du_composant :message="session('activeNav')" type="error"/>`
                    - **NB** : le session('activeNav') provient du controlleur Home  dans la fonction index  
        
        3. Le **slot** pour dans le cas ou on ne veut pas passer les message par la voie precedente.
            - Dans le fichier de depart: 

            ```
                <x-nom_du_composant>
                contenu à afficher dans la vue 
                </x-nom_du_composant>

            ```
            - Dans la vue: 

            ```
                <div>
                {{$slot}} 
                </div>

            ```
6. Organisation des composant dans different dossiers 
    - Dans la fonction render()
        - return view('components.dossier_souhaité.nom_du_composant)
    - Via le trminal :
        - php artisan make:component Dossier_souhaité/nom_composant