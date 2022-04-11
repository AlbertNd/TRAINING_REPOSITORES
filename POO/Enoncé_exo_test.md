# Enoncés des exercisse de test de comprehension. 

1. #### Etapes
    - Création d'une classe voiture
        -  Proprietes: 
            1. Couleur(Public, string)
            2. Longeur(Public, float)
            3. Largeur(public, float)
            4. Unité de mesure (Privé,string) : m²
        - Méthodes 
            1. Calcule de la surface (Public, float)
    - Afficher au moins deux objets **Voiture** differents avec leur couleur, la surface et l'unite de mesure. 

2. #### Etapes ( Les propriétés privés )
    - Création d'une classe voiture 
        - Propriétés:
            1. Couleur(Privé, string)
            2. Longeur(Privé, float)
            3. Largeur(privé, float)
            4. Unité de mesure (Constante) : m²
        - Méthodes :
            1. setter (Public,void)
                - Qui prend une argument ***longeur*** de type ***float***
                - Ayant une condition d'alerte en cas de valeur négative
                - Qui est assigné à la propriété ***longueur*** 
            2. getter (Public,float)
                - Permettant d'obtenir la propriété ***longeur***
            
            3. setter (Public,void)
                - Qui prend une argument ***largeur*** de type ***float***
                - Ayant une condition d'alerte en cas de valeur négative
                - Qui est assigné à la propriété ***largeur*** 
            4. getter (Public,float)
                - Permettant d'obtenir la propriété ***longeur***
            5. setter (Public,void)
                - Qui prend une argument ***couleur*** de type ***string***
                - Ayant une condition d'alerte en cas de valeur négative
                - Qui est assigné à la propriété ***couleur*** 
            6. getter (Public,float)
                - Permettant d'obtenir la propriété ***couleur***
            7. Calcul de la surface 
    - Afficher au moins deux objets **Voiture** differents avec leur couleur, la surface et l'unite de mesure.

3. #### Etape (Les propriétés statique)

    - Création d'une classe Voiture 
        - Propriétés: 
            1. Longeur(Privé, float)
            2. Largeur(Privé, float)
        - Méthodes 
            1. Evaluation de la taille des mesures (public, statique)
                - Si la mesure de la longueur/largeur est plus petit que 20m³ afficher un message d'erreur
            3. setter
                - Avec la condition de la méthodes precedente (évalutation ...). 
            4. getter
            2. Calcul de la surface (Public, float)
    - Afficher le resultats de la surface. 
            