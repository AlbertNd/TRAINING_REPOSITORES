<?php
                    declare(strict_types=1);
                    abstract class Utilisateur
                    {
                        protected const STATUS_ACTIVE='ACTIVE';
                        protected const STATUS_INACTIVE='INACTIVE';

                        protected string $Mail;
                        protected string $Status; 

                        Public static $nombreUtilisateur = 0;

                        public function __construct(string $mail, string $status=self::STATUS_ACTIVE){
                            $this->Mail=$mail;
                            $this->Status=$status;
                        }
                         public function setMail(string $mail):void{
                             $this->Mail = $mail;
                         }
                        // la methodes abstrait 

                        abstract public function getUsername():string;

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

                                public static $nombreAdm=0;

                                public function __construct(string $mail, string $status=self::STATUS_ACTIVE, array $role=[]){
                                    parent::__construct($mail,$status);
                                    $this->Role=$role;
                                    parent::$nombreUtilisateur++;
                                    self::$nombreAdm++;
                                }
                                public function ajoutRole(string $role){
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

                                // la méthode relier à labstrait parent 

                                public function getUsername():string{
                                    return $this->Mail;
                                }
                            }
                             class Joueur extends Utilisateur
                            {
                                protected const Role='JOUEUR';
                                protected string $Role;

                                private string $Username;

                                public static $nombreJe = 0;

                                public function __construct(string $username, string $mail, string $status=self::STATUS_ACTIVE, string $role=self::Role){
                                    parent::__construct($mail,$status);
                                    $this->Role=$role;
                                    $this->Mail = $mail;
                                    $this->Username=$username;
                                    parent::$nombreUtilisateur++;
                                    self::$nombreJe++;
                                }
                                
                                public function setRole(string $role):void{
                                    $this->Role=$role;
                                }

                                public function getRole(){
                                    return $this->Role;
                                }

                                // la méthode relier à labstrait parent 

                                public function getUsername():string{
                                    return $this->Username;
                                }
                            }
                            $Adm = new Administrateur('Albert@gmail.com');
                            $Adm-> ajoutRole('Role NV');
                            $Adm ->getRole();
                            $Adm -> setStatus('STATUS NV');
                            $Joueur = new Joueur('Albert_jeu','Albert@gmail.com');
                            $Joueur -> setStatus('INACTIVE');
                            var_dump($Adm,$Joueur,Joueur::$nombreJe, Administrateur::$nombreAdm, Utilisateur::$nombreUtilisateur);
                            echo $Joueur->getUsername()."\n";
                            echo $Adm->getUsername();
