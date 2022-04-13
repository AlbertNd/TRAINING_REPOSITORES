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