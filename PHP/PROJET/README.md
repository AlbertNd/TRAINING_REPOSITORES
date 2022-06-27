# Documentation 

Application web destinée à la propositon des candidatures pour chauffeurs. 
à l'ouverture de la page d'acceuille du site, le candidat consulter les differents offres postée par les employeur, celles ci ont un boutton avec la mention `Postuler` leur permattant de soumettre leur candidature via un formulaire. 
L'accès à ce formulaire est conditionner par une athentification et qui elle meme est condition par une inscription. 

## La base de donnée 
- Nom : Projet
- Tables: 
    1. Utilisateurs
        1. Identifiant : user_id (integer, clef primaire, auto-incrementation)
        2. Colonne 1 : nom (varchar 250)
        3. Colonne 2 : prenom (varchar 250)
        4. Colonne 3 : mail (varchar 250)
        5. colonne 4 : pass (varchar 250)
        6. Colonne 5 : status (boolean)
            1. Employeur : 1 
            2. chauffeur : 0
    2. Post
        1. Identifiant : post_id (integer,clef primaire, auto-incrementation)
        2. Identifiant : user_id (integer)
        3. Colonne 3 : titre (varchar 250)
        4. Colonne 4 : contenu (texte)
        5. Colonne 5 : date (date)
- Les tables sont relieés entre elles de maniere à ce qu'ont puisse identifier l'auteur du poste.  

## Application et ses fichier 
- **Dossier App** 
    - ***Dossier Modele***
        - Tout ce qui est requete vers la base de donnée 
            - Fonction de selection de donnée d'une jointure entre la table ***Utilisateur*** et la tables ***Post*** dans la base de donnée `selectionDonneUtilisateuPost()`
                - La fonction retourne: 
                    1. Le nom (Utilisateur)
                    2. Le prenom (Utilisateur)
                    3. Le titre (Post)
                    4. Le contenu (Post)
                    5. La date (Post)
            - Fonction d'insertion de donnée dans la table d'utilisateur `insertionUtilisateur()`
                - La fonction prend en argument:
                    1. Le nom 
                    2. Le prenom
                    3. Le mail
                    4. Le pass 
            - Fonction d'autentification par mail et mot de pass `authentification()`
                - La fonction prend en argument: 
                    1. Le mail 

    - ***Dossier Views***
        - Dossier Formulaire 
            - Formulaire d'enregistrement d'utilisateur `enregistre.php`                          
            - Formulaire de connection `login.php`
            - Formulmaire de déconnection `logout.php`
    - ***Dossier Controller***
        - Lien entre model et views
            - `loginForm.php` 

- **fichier index.php**