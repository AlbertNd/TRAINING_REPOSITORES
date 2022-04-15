<?php
                    declare(strict_types=1);
                    abstract class Utilisateur
                    {
                        protected const STATUS_ACTIVE='ACTIVE';
                        protected const STATUS_INACTIVE='INACTIVE';

                        protected string $Username;
                        protected string $Status; 

                        Public static $nombreUtilisateur = 0;

                        public function __construct(string $username, string $status=self::STATUS_ACTIVE){
                            $this->Username=$username;
                            $this->Status=$status;
                        }
                         public function setUsername(string $username):void{
                             $this->Username = $username;
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
                    }
                         class Administrateur extends Utilisateur
                            {
                                private array $Role=[];

                                public static $nombreAdm=0;

                                public function __construct(string $username, string $status=self::STATUS_ACTIVE, array $role=[]){
                                    parent::__construct($username,$status);
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
                            }
                             class Joueur extends Utilisateur
                            {
                                protected const Role='JOUEUR';
                                protected string $Role;

                                public static $nombreJe = 0;

                                public function __construct(string $username, string $status=self::STATUS_ACTIVE, string $role=self::Role){
                                    parent::__construct($username,$status);
                                    $this->Role=$role;
                                    parent::$nombreUtilisateur++;
                                    self::$nombreJe++;
                                }
                                
                                public function setRole(string $role):void{
                                    $this->Role=$role;
                                }

                                public function getRole(){
                                    return $this->Role;
                                }
                            }
                            $Adm = new Administrateur('Albert_ADM');
                            $Adm-> ajoutRole('Role NV');
                            $Adm ->getRole();
                            $Adm -> setStatus('STATUS NV');
                            $Joueur = new Joueur('Albert_JEU');
                            $Joueur -> setStatus('INACTIVE');
                            var_dump($Adm,$Joueur,Joueur::$nombreJe, Administrateur::$nombreAdm, Utilisateur::$nombreUtilisateur);