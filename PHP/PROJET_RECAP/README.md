## Projet de récapitulation 
### Création d'une plate forme de post d'offre pour chaufeur 

#### Documenation du projet

##### Description

1. **La page d'acceuille*** 
    1. ***Contenu visuel pour l'utilisateur non connecter***
        1. La bare de navigation. 
            - Lien de connecion
                - Formulaire de connection  
            - Lien enregistrement 
                - Formulaire d'enregistrement 
        2. Contenu de la page  
            - Message de bienvenu et offres proposé
    2. ***Contenu visuel pour l'utilisateur connecter***
        1. La bare de navigation. 
            - Nom et prenom de l'utilisateur 
            - Lien de déconnection. 
        2. Contenu de la page 
            - Liste des offres 
            - Lien pour poster une offres 
                - Formualire d'insertion d'une offres dans la base de donnée  
            - Lien pour  Modifier un poste 
                - Formulaire 
            - Lien pour supprimer une offres 
                - Formulaire.
2.  **Techniquement**
    1. Architecture MVC. 
        1. Un fichier ***index.php***
        2. Un dossier **Source**
            1. Un dossier **Controllers**
                1. Un fichier ***homePage***
                2. un fichier ***Poste***
            2. Un fichier ***Model***
        3. Un dossier **Vues** 
            1. Un fichier ***homePage***
            2. un fichier ***Post***

