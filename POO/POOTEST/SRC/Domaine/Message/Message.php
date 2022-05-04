<?php

declare(strict_types=1);

namespace App\Domaine\Message;

use App\Domaine\User\User;

class Message 
{
    private  $autheur; 
    private  $contenu; 

    public function __construct( User $autheur, string $contenu)
    {
        $this ->autheur=$autheur;
        $this ->contenu=$contenu;
    }
}