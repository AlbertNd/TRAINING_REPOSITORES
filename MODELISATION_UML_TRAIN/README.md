# Objet et modèl relationnel 

### Outils de modélisation 
- **UML** :
    - [Papyrus](https://www.eclipse.org/papyrus/)
- **Base de données**:
    - [PostgreSql](https://www.postgresql.org/)
        - [Ubuntu](https://doc.ubuntu-fr.org/postgresql)
- **MPD**
    - [SQL Power Architect](http://www.bestofbi.com/page/architect_download_os)
- **Requete SQL vers DB**
    - [SQuirrel SQL](http://www.squirrelsql.org/#installation).
        - [Guide d'installation](https://orangletrik.wordpress.com/2012/05/01/install-squirrel-sql-client-in-ubuntu-12-04-precise-pangolin/).
- **PostgreSQL & pgAdmin**
    - [Guide d'installation](https://codingpub.dev/ubuntu-install-postgresql-and-pgadmin/)
- **PostgreSQL & Squirrel SQL**
    - [configuration](https://community.jaspersoft.com/blog/squirrel-sql-client-installation-cent-os-65-and-connecting-postgresql-foodmart-database)




[Références OpenClassroom](https://openclassrooms.com/fr/courses/4055451-modelisez-et-implementez-une-base-de-donnees-relationnelle-avec-uml/4457193-apprehendez-les-objets-et-le-modele-relationnel)

#### 1. Notions essentielles: 


---
- ##### Domaine fonctionnel du projet : 
    - Represente ce qui sera enregistrer. Autrment dit, suivant une approche orienté objet, et un objet etant un concept ou une entité du monde réel, le domaine fonctionnel est vu comme une composiion de cet objets).

**NB** : pour modéliser la composition d'objet du domaine fonctionnel, on utilise un langage adapté : **UML** (Unified Modeling Language). 
En d'autre terme, il permet de définir ce que va stocker la base de données et ceci grace au diagramme de classes UML

- ##### Les notions manipulées en objet 

|Notions|description|
|--|--|
|**Objet**|Element autonome, physique ou abstrait ou conceptuel (Ex: un crayon, une voitur, un ensemble, une liste...) Il possède plusieurs caracteristiques (**un nom**: voiture, **des attributs** : les propriétés de l'objet : couleur kilomettre, ...|
|**Classe**|Modèle abstrait d'un objet,elle définit les attributs et les opérations de l'objet. C'est à partir de ce modèle que seront créés les objets possédant des valeurs particulières pour leurs attributs. Elle définit donc les caracteristique des tousles objets de cette classe (nom, liste des attributs)|
|**Instance**|L'instanciation est l'action de création d'un objet à partir d'une classe. Le résultat de cette création est une instance de la classe. Les instances d'une classe sont les occurrences d'objets correspondant à cette classe (ex. : la voiture de mon voisin).|

**NB** Dans la pratique, les termes d'objet et d'instance sont souvent équivalents.

- ##### Les notions manipulées par la base de données
Une base de données relationnelle et un ensemble de tableaux appelés **tables**

###### Les coorespondance entre le model UML et la base de données : 

|Base de données|Modèle relationnel|
|--|--|
|**Tables**|**Classes**|
|**Colonne**|**Attributs**|
|**Ligne** (appelée **tuple** ou **n-uplet**)|**Instance**|

**NB**: Une base de données relationnelle est donc composée d'un ensemble de tables, pouvant être liées entre elles. Cette manière d'organiser les éléments s'appuie sur ce que l'on appelle un modèle relationnel.

---
- ##### PAssage du diagramme de classe au modèle physique de données (MPD). 
    1. Identification des concepts ou entités du domaine fonctionnel. : Listes de **classes** 
    2. Identification des informations à enregistrer, et leur type, pour cahque classe. : **Diagramme de classes et leur attributs**
    3. Création du modèle physique des données à partir du diagramme de classes:
        3. 1. Création de **table** pour cahque classe
        3. 2. Création, dans chaque table, d'une **colonne** pour chaque **attribut** de la classe correspondante.

- ##### Convention de nommage : 
    - **UML**:
        - Pour les nom de **classes**: 
            - au singulier
            - avec des lettres nom accentuées
            - commencant par une majuscule
            - utilisant le Pascal Case (ex: **P**ierre**P**recieuse)
        - Pour les **attributs**:
            - au singulier
            - avec des lettre non accentuées
            - commencant par une minuscule
            - utilisant le Camel Case (ex: couleur**Y**eux)
    - **MPD**:
        - Pour le nom des **tables** et des **attributs**:
            - au singulier
            - avec des lettre non accentuées
            - en minuscule
            - utilisant Underscore Case (ex: pierr**e_p**recieuse)
---

#### 2. Les relations 

En UML la relation entre deux classes s'appelle une **association**

- Les association sont classées en trois catégories en fonction des **multiplicités** apposées sur celle-ci : 
    1. **un à un(one-to-one)**:
        - Un conducteur conduit une et une seule voiture à la fois 
        - Une voiture est conduite par un seul conducteur à la fois 
    2. **un à plusieurs (one-to-many) ou plusieurs à un (many-to-one)**
        - Un journal contient zéro, un ou pllusieurs articles 
        - Un article est contenu dans aucun ou un seul journal 
    3. **Plusieur à plusieurs (many-to-many)**
        - Un musicien fait partie de zéro, un ou plusieurs groupes 
        - Un groupe est constitué de deux ou plusieurs musiciens.

- ###### Récapitulatif des multiplicité

|Multiplicité|Abréviation|Cardinalités|
|--|--|--| 
|0..0|0|Aucune instance|
|0..1||Aucune ou une seule instance|
|1..1|1|Exactement une instance|
|0..* | * |Aucune, une ou plusieurs instances (aucune limite)
|1..*| |Au moins une instance (aucune limite maximum)|
|x..x| x| Exactement x instance(s)|
|m..n||Au moins m et au plus n instances|

---

#### 3 . Les clef primaires 

- Afin de pouvoir identijfier un tuple de manière unique, il y a deux solutions :
    
    1. Prendre un attributs qui serait unique à chaque instance  
    2. Une clef primaire composite : Identification du tuple par le nom et le prénom
    3. Ajouter un attribut réservé à accueillir un identifiant unique.

**NB**: Afin d'assurer la cohérence du modèle relationnel, la clef primaire doit etre **unique** et **constante** (nejamais changer) 

---

#### 4 . Les clef étrangère

- C'est le principe général de mise en oeuvre d'une relation. Elle permet de faire une rférence vers le tuple lié dans un attribut bien precis (déstné précisement à un usage preci "ad hoc").
Autrement dit:
    - La valeur de la **clef étrangère** dans un tuple n'est rien d'autre que la valeur de la **clef primaire** du tiple lié.

---

#### 5 . Mise en oeuvre des relations 

- **Association un à un (one-to-one)**:
    - On choisit dans quel sens on veut matérialiser la relation (en général on prend le sens priviligié dans le domaine foncitonnel).
    On met la clef étrangère dans la table que l'on veut. 
- **Association un à plusieurs (one-to-many)**:
    - On crée la clef étrangère dan sla table correspondant à la cardinalité maximum (cardinalité multiple).
- **Association plusieurs à plusieurs (many-to-many)**:
    - On crée une association  qui matérialise les liens multiples en creant une clef primaire composée des clefs étrangères pointant vers les tables respectives.
     - **NB** Il s'agit d'une table d'association, autrement dit une **classe d'association**
---
#### 6 . Classe d'association 

- Une classe d'association se traduit dans le MPD comme une association plusieurs à plusieurs (many-to-many) : en créant une **table** du nom de la **classe d'association** avec une **clé primaire composée et contenant les attributs de la classe d'association** :

    - Imaginez une association représentant les concerts donnés par un groupe de musique dans des lieux de spectacle : à chaque fois que j'ai un lien entre un Groupe et un Lieu, cela représente un **Concert**. 
    En créant la classe d'association Concert, je peux ajouter, par exemple, un **attribut date** qui spécifie la date du concert.

    - **NB** :
        - Il n'y a pas de notion d'historique dans les associations. Le lien entre deux instances existe ou n'existe pas.
        Cependant, avec une classe d'association, il est possible de simuler une sorte d'historique en ajoutant des attributs comme `dateDebut` et `dateFin` par exemple. Le lien existera toujours, mais on va désormais pouvoir interpréter son « effectivité » en se basant sur cette plage de dates.

---

#### 7 . Etapes d'élaboration du modele physiques des données (MPD):
    
- Dans un premier temps il est important de s'impregner du domaine fonctionnel, en reperant les principaux concepts et entités de celui-ci, afin d'obtenir ne representation générale et macroscopique du domaine servant de support. 
    - un diagramme avec les classes et les associations (avec les multiplicités nécessaires à la compréhension) permettant d'avoir une vision globale du domaine

    - un diagramme contenant tous les attributs, les types, les multiplicités... donnant la représentation précise des informations manipulées.  
- L'élaboration :
    1. Création d'une table par classe, hors classe d'association.
    2. Ajout des attributs des classes en tant que colonnes dans les tables du MPD.
    3. Ajout des clefs primaires dans les tables 
        - Soit en créant une colonne dédiée créée de toute pièce `(ex. : id)`
        - Soit en utilisant un attribut étant explicitement une référence unique 
    4. Création des relations correspondant aux classes d'association.

--- 

#### 8 . Optimisation du model relationnel avec les formes normales 

Les formes normales sont des niveaux de qualité qui définissent les regles à respecter.
Elle permettent la vérification de la robustesse de la conception du modèle en évitant la redondance des données et les problemes de mise à jour et de cohérence qui en découlent

- Les trois forme normale essentielles :
    1. Chaque attributs doit etre **atomique**. Autrement dit, aucun attribut ne doit etre multivalué(liste de valeurs) ou composé (si on le décompose, on obtient des informations supplémentaires).
        - solution : transformation des attributs multivalués en une table séparée, liée à la table d'origine par une relation de type un à plusieurs.
    2. **(elle ne concerne que les tabmes avec une clef primaire composite)** :
        - Aucun attribut ne faisant pas partie de la clef primaire ne doit dépendre que d'une partie de la clef primaire . 
        - **NB** Pour être en deuxième forme normale (2FN), il faut déjà être en 1FN.
    3. **(elle concerne la dépendance entre attributs non clef)**:
        - Aucun attribut ne faisant pas partie de la clef primaire ne doit dépendre d'une partie des autres attributs ne faisant pas non plus partie de la clef primaire 
        - Pour être en troisième forme normale (3FN), il faut déjà être en 2FN.

**NB : Le respect absolu de la 3FN n'est pas obligatoire**

---

#### 9 . Amélioration de la modélisation 

- ##### Agrégation et composition:
    - **Agregation** : 
    Quand une classe a un rôle qui correspond à un ensemble ou un regroupement d'objets, il peut être intéressant de mettre en valeur cet aspect.
    En effet, cela permet de voir au premier coup d'œil qu'il s'agit d'un ensemble, sans avoir à se pencher sur les multiplicités de l'association (qui sont bien évidemment dans ce cas de type **un à plusieurs** ou **plusieurs à plusieurs**).
    Cet aspect d'ensemble est modélisé par une association appelée agrégation et est **matérialisée par un losange du côté de la classe jouant le rôle d'ensemble**.
        - Exemple :
            - Classe - Élève : dans l'association Classe/Elève, la classe joue un rôle de regroupement d'élèves.
            - Équipe - Joueur : une équipe est un ensemble de joueurs.

        - **NB** :
            - Une agrégation sera traduite dans le MPD comme une association classique de type **un-à-plusieurs** ou plusieurs à plusieurs. Il n'y a pas de formalisme particulier.
            - Toutes les associations de type un à plusieurs ou plusieurs à plusieurs ne sont pas des agrégations !
                - Par exemple : dans l'association entre une classe Personne et une classe Email : une personne ne joue pas vraiment le rôle de regroupement d'adresse email !

    - **Composite** :
    Une composition est une sorte d'agrégation plus « forte ».
    **Une composition est matérialisée par un losange plein du côté de la classe jouant le rôle de composite.**
    Elle s'emploie lorsque :
        - une classe (composite) est "composée" de plusieurs autres classes (composant)
        - une instance de la classe composant ne peut pas être liée à plusieurs instances de la classe composite (association obligatoirement un à plusieurs et non pas plusieurs à plusieurs) ;
        - si on détruit une instance de la classe composite, ses composants devrait "normalement" être détruits.
        - Exemple : 
            - Répertoire - Fichier : un répertoire est composé de fichiers. Un fichier ne peut pas être dans plusieurs répertoires. Si on supprime le répertoire, les fichiers sont supprimés.
            - Immeuble - Appartement : un immeuble est composé d'un ensemble d'appartements. Un appartement ne se situe que dans un seul immeuble et si on détruit l'immeuble, les appartements sont détruits aussi !

**NB** : De même que pour l'agrégation, la composition sera traduite dans le MPD comme une association classique de type un à plusieurs. Il n'y a pas de formalisme particulier.

**L'héritage** :
En approche orientée objet, il est possible de généraliser des comportements grâce à l'héritage.
- Il permet entre autre :
    - placer des attributs communs (dans la super-classe), qui seront « automatiquement » repris dans les sous-classes ;
    - créer des associations communes au niveau de la super-classe, qui, de même, seront « automatiquement » reprises dans les sous-classes.

[information complémentaires](https://openclassrooms.com/fr/courses/4055451-modelisez-et-implementez-une-base-de-donnees-relationnelle-avec-uml/4458523-ameliorez-votre-modelisation-objet)