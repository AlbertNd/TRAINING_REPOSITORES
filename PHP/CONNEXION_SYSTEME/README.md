# La protectcion d'une page par un mot de passe

- Le but est d'avoir un formulaire de connexion avec e-mail et mot de passe et une fois connecter on affiche un message du type ***bonjour mail utilisateur et bienvenu*** 
    - La page souhaiter ne s'affiche que si l'utilisateur est connecter. 

##### Elaboration du plan
1. Soumission d'une email et d'un mot de pass dans un formualire de connexion 
    - Si le formulaire est valide on affiche un message de succès sinon on affiche une message d'erreur. la suite sera affiche que pour les utiisateur ayant eu un message de succès
2. Schematisation du code 
    - Le formulaire sera integré dans la page d'acceuil
        - Trois situation possible:
            1. pas connecté
            2. mot de pass invalid
            3. connexion avec succès
2. Deux pages :
    1. **login.php** : contient un simple formulaire comme vous savez les faire ;
    2. **home.php** : qui doit maintenant inclure une formulaire de connexion et une condition sur l'affichage des recettes.
