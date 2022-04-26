<?php

declare(strict_types=1);

namespace App\Domaine\Forem;

use App\Domaine\User\User;

class Message
{
    private $author;
    private $content;

    public function __construct(User $author, string $content)
    {
        $this->author=$author;
        $this->content=$content;
    }
}