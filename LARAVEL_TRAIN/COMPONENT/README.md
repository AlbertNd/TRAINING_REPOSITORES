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
4. Iclure le composant dans une view differente:
    - `<x-nom_du_composant/>` : NB : le nom_du_composant doit comment par une minuscule et si le composant à ete fait avec une combinaison (AlertMessage) alorson ecrit : `<x-alert-message/>`