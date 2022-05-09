# Exercice recaputilatif

#### Création d'un parc automobile qui se composer de : 
1. Une classe abstrait**Utilisateur**
    1. **Attributs** de la classe:
        - Nom (privé)
        - Prenom (privé)
        - Telephone (privé)
        - Status (privé)
        - Matricule (privé)
            - Le matricule doit etre composer de deux premiere lettre du nom, de deux premier lettre du renom, de la date de création et de PR si propriétaire et LO si locateaire tout en majuscule(ex : ALND090522PR)
                `strtoupper(substr($nom,0,2).substr($prenom,0,2).date("y").substr($status,0,2));`
    2. Une **fonction static** pour compter le nombre d'objet utilisateur instancié. 
    3. Un constructeur
    4. Méthodes: 
        1. accesseur pour chaque attibuts
        2. mutateur pour chaque attibuts
    5. ***La classe Utilisateur est parent de deux classes***
        1. Proprietaire
            1. Attributs:
                - Constante STATUS = 'Proprietaire';
                - Status (public)
            2. Une **fonction static** pour compter le nombre d'objet proprietaire instancié.
            3. Un constructeur 
                - Incremetation du nombre d'object propriétaire
                - Constructeur parent
                - Incrémentation du nombre d'objet utilisateur. 
        2. Locataire
            1. Attributs:
                - Constante STATUS = 'Locataire';
                - Status (public)
            2. Une **fonction static** pour compter le nombre d'objet locataire instancié.
            3. Un constructeur 
                - Incremetation du nombre d'object locataire
                - Constructeur parent
                - Incrémentation du nombre d'objet utilisateur. 
2. Une classe abstrait **Vehicule**
    1. **Attributs** de la classe:
        - Utilisateur (De la classe utilisateur)
        - Prix 
        - Couleur
        - Nombre de roue 
        - Status
        - Matricule
    2. Une **fonction static** pour compter le nombre d'objet vehicule instancié. 
    3. Un constructeur
    4. Méthodes: 
        1. accesseur pour chaque attibuts
        2. mutateur pour chaque attibuts
    5. ***La classe Utilisateur est parent de deux classes***
        1. Camion
            1. Attributs:
                - Constante STATUS = 'Camion';
                - Status (public)
            2. Une **fonction static** pour compter le nombre d'objet camion instancié.
            3. Un constructeur 
                - Incremetation du nombre d'object camion
                - Constructeur parent
                - Incrémentation du nombre d'objet vehicule. 
        2. Voiture
            1. Attributs:
                - Constante STATUS = 'Voiture';
                - Status (public)
            2. Une **fonction static** pour compter le nombre d'objet voiture instancié.
            3. Un constructeur 
                - Incremetation du nombre d'object voiture
                - Constructeur parent
                - Incrémentation du nombre d'objet vehicule. 
                
#### Information à afficher 
1. Utilisateur
    - Nom 
    - Prenom
    - Matricule
    - Status
2. Vehicule
    - Utilisateur
    - Matricule
    - Status 