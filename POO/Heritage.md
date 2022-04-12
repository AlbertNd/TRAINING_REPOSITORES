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
        - #### (Les propriété de la classe parent doivent etre public)
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

