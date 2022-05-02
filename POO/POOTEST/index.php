<?php

declare(strict_types=1);

spl_autoload_register(static function (string $fqcn){
    $path = str_replace(['App','\\'],['SRC','/'],$fqcn).'.php';
    require_once $path;
});