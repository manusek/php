<?php
$fruits = ["banana", "apple", "strawberry", "grape", "orange", "watermelon", "blueberry"];

//Wyświetlenie owoców z pętlą foreach z { }
// foreach($fruits as $element){
//     echo $element.", ";
// }



//Wyświetlenie owoców z pętlą foreach z endforeach
foreach($fruits as $element):
    echo $element.PHP_EOL;
endforeach;


?>