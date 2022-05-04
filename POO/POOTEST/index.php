<?php

declare(strict_types=1);

spl_autoload_register(static function ( string $fqcn){
    $path = str_replace(['App','\\'],['SRC','/'],$fqcn).'.php';
    require_once $path;
});

use App\Domaine\User\User;
use App\Domaine\Message\Message;

$user = new User; 
$user->lastname='Ndizeye';
$user->name='Albert'; 

$Message = new Message($user,'c\'est le contenu');

var_dump($Message);