<?php

declare(strict_types=0);

class A { 
    public function __construct(int $peugeot = 33) { } 
    public function dites33() { echo $this->peugeot; }
}

(new A)->dites33('806'); 