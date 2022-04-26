<?php
declare(strict_types=1);

spl_autoload_register( static function($fqcn){
    $path = str_replace(['App','\\'],['SRC','/'],$fqcn).'.php';
    require_once($path);
} );

use App\Domaine\User\User;
use App\Domaine\Forem\Message;


$user = new User;
$user->name ='Albert';

$message = new Message($user,'is my name');

var_dump($message);

