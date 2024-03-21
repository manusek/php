<?php

use function PHPSTORM_META\type;

function division($a, $b) : float{
    if($b == 0){
        throw new UnexpectedValueException("dzielenie przez 0 niedozwolone"); //nieoczekiwana wartość
    }
    if (is_int($a) != true || is_int($b) != true){
        throw new InvalidArgumentException("jedna z liczb nie jest typu INT");  //zły argument przekazany do funkcji
    }
    return $a / $b;
}

try{
    print division(1, 2.5);
}catch(Exception $e){
    // print "blad, ".$e -> getMessage();
    echo 'Wystąpił wyjątek nr '.$e->getCode().', jego komunikat to: '.$e->getMessage().', ścieżka do pliku w którym 
    wystąpił wyjątek: '.$e->getFile();
}