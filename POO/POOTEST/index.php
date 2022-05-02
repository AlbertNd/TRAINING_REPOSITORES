<?php

declare(strict_types=1);

spl_autoload_register(static function(string $fcqn){
    $path = str_replace(['App','\\'],['SRC','/'],$fcqn).'.php';
    require_once $path;
});

use App\Domaine\Message\Message;
use App\Domaine\User\User; 

$user = new User;
$user->name='Albert';

$Message = new Message($user,'voila le message');

var_dump($Message);