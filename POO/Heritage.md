# Heritage 

1. #### Le concepte d'hiritage. 
    - L'heritage permet d'acceder aux propriétés et méthodes d'une **classe parent** depuis les **enfants**
2. #### Le mécanisme de l'heritage   
    - **Note**:
        - Imaginons que l'on souhaite céer 
            1. classe **Utilisateur**
                1. Nom
                2. Prenom
                3. Mot de passe
            2. classe **Salarié CDI**
                1. Nom
                2. Prenom
                3. Mot de passe 
                4. Intitulé de poste
            3. classe **Salarié CDD**
                1. Nom
                2. Prenom
                3. Mot de passe 
                4. Intitulé de poste
                5. Date de fin de contrat
        - Pour chaque classe, on aura ***les propriétés, les accesseur, les mutateurs*** il y aura donc beaucoup de choses qui se repetent et il faut donc trouver un moyen de mutualiser le code :**Heritage**. 

3. #### En pratique 
    - Définisson un utilisateur ***(ayant deux option de status 'Active' et 'Inactive')**: 
        -   ```
                declare(strict_types=1);
                class Utilisateur
                {
                    private const STATUS_ACTIVE = 'active';
                    private const STATUS_INACTIVE = 'inactive';
                    private string $Username;
                    private string $Status;
                    
                    public function __construct(string $Username, string $Status = self::STATUS_ACTIVE){
                        $this->Username=$Username;
                        $this->Status=$Status;
                    }
                    public function setStatus(string $status):void{
                        $this->Status=$status;
                    }
                    public function getStatus():string{
                        return $this->Status;
                    }
                 
                }
                $User1= new Utilisateur('Albert');
                var_dump($User1);
            ``` 
    - Définition un administrateur ***(ayant deux option de status 'Active' et 'Inactive' et en plus un role)**
        -   ```
                declare(strict_types=1);
                class Administrateur
                {
                    private const STATUS_ACTIVE = 'active';
                    private const STATUS_INACTIVE= 'inactive';
                    private string $Username;
                    private string $Status;
                    private array $Role = [];

                    public function __contsruct(string $username, string $status = self::STATUS_ACTIVE, array $role){
                        $this->Username=$username;
                        $this->Status=$status;
                        $this->Role=$role;
                    }

                    public function setUsername(string $username):void{
                        $this->Username=$username;
                    }
                    public function getUsername():string{
                        return $this->Username;
                    }

                    public function setStatus(string $status):void{
                        $this->Status=$status;
                    }
                    public function getStatus():string{
                        return $this->Status;
                    }

                    public function setRole(string $role):void{
                        $this->Role=$role;
                    }
                    // on definis le role ADMIN par defaut 
                    public function getRole():array{
                        $role=$this->Role;
                        $role[]='ADMIN';
                        return $role;
                    }
                    
                    // la méthode permet de rajouter un role 
                    // array_filter permet de suprimer les doublons

                    public function ajoutRole(string $role):void{
                        $this->Role[]=$role;
                        $this->Role = array_filter($this->Role);
                    }
                }
                $Admin1=new Administrateur('Ndizeye');
                $Admin1->ajoutRole('ADMIN');
                var_dump($Admin1);
            ```
            - Documentation PHP [array_filter()](https://www.php.net/manual/fr/function.array-filter.php)
    
    - # Extention d'une classe 
        - L'héritage permets à une classe d'hériter des propriétés, ainsi que des méthodes des classes **parentes**
            - ***Et donc d'utiliser une classe qui servira de base commune avec le mot clé extends (Qui peut se lire par "est un"***.
        - Lorsque l'on souhaite que la classe ***Administrateur** hérite de la classe ***Utilisateur***
            -   **Administrateur extends Utilisateur**
                - ***Ici les administrateurs beneficieront des toutes les propriétés et méthodes de la classe Utilisateur*** : Un administrateur **est un** utilisateur avec des droits spécifiques.
        - #### (On crée d'abord la classe parent et ensuite les enfents et petits enfants).
        - #### (Les propriétés de la classe parent doivent etre public)
        -   ```
            <?php
                declare(strict_types=1);
                class Utilisateur 
                {
                    public const STATUS_ACTIVE = 'active';
                    public const STATUS_INACTIVE='inactive';
                    public string $Username;
                    public string $Status;

                    public function __construct(string $username, string $status=self::STATUS_ACTIVE){
                        $this->Username=$username;
                        $this->Status=$status;
                    }

                    public function setUsername(string $username):void{
                        $this->Username=$username;
                    }

                    public function getUsername():string{
                        return $this->Username;
                    }

                    Public function setStatus(string $status):void{
                        $this->Status=$status;
                    }

                    public function getStatus():string{
                        return $this->Status;
                    }
                }
                class Administrateur extends Utilisateur
                {
                    private array $Role=[];

                    public function __construct(string $username, string $status=self::STATUS_ACTIVE, array $role=[]){
                        $this->Username=$username;
                        $this-Status=$status;
                        $this->Role=$role;

                    }

                    public function ajoutRole(string $role){
                        $this->Role[]=$role;
                        $this->Role = array_filter($this->Role);
                    }

                    Public function setRole(string $role):void{
                        $this->Role=$role;
                    }

                    public function getRole():array{
                        $role =$this->Role;
                        $role[]='ADMIN';

                        return $role;
                    }
                }
            $Albert_Uti = new Utilisateur('albert_Uti');
            $Albert_Uti->setStatus('inactive');
            $Albert_Adm =new Administrateur('albert_Adm');
            $Albert_Adm->ajoutRole('Administrateur');
            $Albert_Adm->setStatus('inactive');
            var_dump($Albert_Uti);
            var_dump($Albert_Adm);
            ```

4. #### Les propriétés statiques 
    - Dépuis la classe enfant, on peut faire référence aux memes propriétés statiques que les parent. 
    Ceci fonctionne en **cascade**: 
        - On ne peut pas faire référence aux propriétés statiques de l'enfant depuis le parent. 
    - Pour faire référence à un parent on utilise le mot clef **parent**
        -  ***NB: Lorsqu'une classe hérite d'une classe , qui elle mmeme hérite d'une classe ... il est impossible de cibler la classe parente désirée avec lemot clef "parent". on remonte l'arbre généalogique jusqu'à trouver l'élément parent auuel on fait référence***
    -   ```
        <?php
            declare(strict_types=1);
            class Utilisateur
            {
            public const STATUS_ACTIVE ='ACTIVE';
            public const STATUS_INACTIVE ='INACTIVE';
            public string $Username;
            public string $Status; 

            public static $nombreUtilisateur = 0;

            public function __construct(string $username, string $status = self::STATUS_ACTIVE){
                $this->Username = $username; 
                $this->Status = $status;
                self::$nombreUtilisateur++;
            }

            public function setUsername(string $username):void{
                $this->Username=$username;
            }
            public function getUsernema():string{
                return $this->Username;
            }
            public function setStatus(string $status):void{
                $this->Status=$status;
            }
            public function getStatus():string{
                return $this->Status;
            }
            }
            class Administrateur extends Utilisateur
            {
                private array $Role=[];

                public static $nombreAdministrateur =0;

                public function __construct(string $username, string $status=self::STATUS_ACTIVE, array $role=[]){
                    $this->Username=$username;
                    $this->Status=$status;
                    $this->Role=$role;
                    parent::$nombreUtilisateur++;
                    self::$nombreAdministrateur++;
                }

                public function ajoutRole(string $role):void{
                    $this->Role[]=$role;
                    $this->Role = array_filter($this->Role);
                }

                public function setRole(string $role):void{
                    $this->Role=$role;
                }
                public function getRole():array{
                    $role=$this->Role;
                    $role[]='ADMINISTRATEUR';
                    
                    return $role; 
                }
            }
            $Utilisateur = new Utilisateur('Albert_UTI');
            $Utilisateur -> setStatus('INACTIVE');
            var_dump($Utilisateur,Utilisateur::$nombreUtilisateur);
            $Administrateur = new Administrateur('Albert_ADM');
            $Administrateur -> setStatus('INATIVE');
            $Administrateur -> ajoutRole('VOILA');
            var_dump($Administrateur, Administrateur::$nombreAdministrateur,Utilisateur::$nombreUtilisateur);
        ```
    - ***NB: Les propriété statique sont PUBLIC***
5. #### Autorisation d'accès aux propiétes et methodes (uniquement aux enfants)
    - Cette autorisation s'applique par le biais du mot clé **protected**
        - **note:**
            1. **public** accès à tous
            2. **private** fermer à tous
            3. **protected** permet de fermer à l'extérieur, mais ouvrir à l'héritage.
    - Ce qui est declarer en protected:
        - ***Les constantes***
        - ***Les propriétés***
    - ***Les mutateurs et les accesseurs doivent rester en public***
    
        ```
        <?php
            declare(strict_types=1);
            class Utilisateur
            {
            protected const STATUS_ACTIVE ='ACTIVE';
            protected const STATUS_INACTIVE ='INACTIVE';
            protected string $Username;
            protected string $Status; 

            public static $nombreUtilisateur = 0;

            public function __construct(string $username, string $status = self::STATUS_ACTIVE){
                $this->Username = $username; 
                $this->Status = $status;
                self::$nombreUtilisateur++;
            }

            public function setUsername(string $username):void{
                $this->Username=$username;
            }
            public function getUsernema():string{
                return $this->Username;
            }
            public function setStatus(string $status):void{
                $this->Status=$status;
            }
            public function getStatus():string{
                return $this->Status;
            }
            }
            class Administrateur extends Utilisateur
            {
                private array $Role=[];

                public static $nombreAdministrateur =0;

                public function __construct(string $username, string $status=self::STATUS_ACTIVE, array $role=[]){
                    $this->Username=$username;
                    $this->Status=$status;
                    $this->Role=$role;
                    parent::$nombreUtilisateur++;
                    self::$nombreAdministrateur++;
                }

                public function ajoutRole(string $role):void{
                    $this->Role[]=$role;
                    $this->Role = array_filter($this->Role);
                }

                public function setRole(string $role):void{
                    $this->Role=$role;
                }
                public function getRole():array{
                    $role=$this->Role;
                    $role[]='ADMINISTRATEUR';
                    
                    return $role; 
                }
            }
            $Utilisateur = new Utilisateur('Albert_UTI');
            $Utilisateur -> setStatus('INACTIVE');
            var_dump($Utilisateur,Utilisateur::$nombreUtilisateur);
            $Administrateur = new Administrateur('Albert_ADM');
            $Administrateur -> setStatus('INATIVE');
            $Administrateur -> ajoutRole('VOILA');
            var_dump($Administrateur, Administrateur::$nombreAdministrateur,Utilisateur::$nombreUtilisateur);

        ```
6. #### L'abstraction.
    - Supposons que nous avons des **Utilisateaur** qui sont soit **Administrateur** soit **Joueur**. et que l'idée serait de ne pas instancier la classe ***Utilisateur*** seule et par conséquent de forcer son héritage.
    - Supposons que l'on souhaite garantir un usage particulier, mais laisser les classes enfants decider de la maniére dont le code doit fonctionner. 