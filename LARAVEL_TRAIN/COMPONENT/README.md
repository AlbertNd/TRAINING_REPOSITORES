## Etapes de creation d'un composant

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