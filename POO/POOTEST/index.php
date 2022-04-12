<?php

declare(strict_types=1);
class Utilisateur
{
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';
    public string $Username;
    public string $Status;

    public function __construct(string $username, string $status = self::STATUS_ACTIVE)
    {
        $this->Username = $username;
        $this->Status = $status;
    }

    public function setUsername(string $username): void
    {
        $this->Username = $username;
    }

    public function getUsername(): string
    {
        return $this->Username;
    }

    public function setStatus(string $status): void
    {
        $this->Status = $status;
    }

    public function getStatus(): string
    {
        return $this->Status;
    }
}
class Administrateur extends Utilisateur
{
    private array $Role = [];

    public function __construct(string $username, string $status = self::STATUS_ACTIVE, array $role = [])
    {
        $this->Role = $role;
    }

    public function ajoutRole(string $role)
    {
        $this->Role[] = $role;
        $this->Role = array_filter($this->Role);
    }

    public function setRole(string $role): void
    {
        $this->Role = $role;
    }

    public function getRole(): array
    {
        $role = $this->Role;
        $role[] = 'ADMIN';

        return $role;
    }
}
$Albert_Uti = new Utilisateur('albert_Uti');
$Albert_Uti->setStatus('inactive');
$Albert_Adm = new Administrateur('albert_Adm');
$Albert_Adm->ajoutRole('Administrateur');
$Albert_Adm->setStatus('inactive');
var_dump($Albert_Uti);
var_dump($Albert_Adm);
