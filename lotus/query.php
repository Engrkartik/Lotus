<?php

// If you are using composer, include the class
use ourcodeworld\NameThatColor\ColorInterpreter;

$instance = new ColorInterpreter();

$result = $instance->name("#008559");

// 1. Print the human name e.g "Deep Sea"
echo $result["name"] . "\n";

// 2. Print the hex code of the closest color with a name e.g "#01826B"
echo $result["hex"] . "\n";

// 3. Print wheter the given hex code is exact as a color with a name
//    or if it has been derived
if($result["exact"]){
    echo "The given hex code is exact as the name";
}else{
    echo "A similar color with a name has been picked";
}
?>