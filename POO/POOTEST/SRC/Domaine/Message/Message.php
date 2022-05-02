<?php

declare(strict_types=1);

namespace App\Domaine\Message;

use App\Domaine\User\User;

class Message
{
    private string $auteur; 
    private string $contenu; 

    public function __construct( User $auteur, string $contenu )
    {
        $this->auteur=$auteur;
        $this->contenu=$contenu;
    }
}