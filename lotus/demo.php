<?php

class demo

{

private $first=1000;

public $second=500;

function add( )

{   
$first=1000;

$second=500;
$add=$first + $second;

echo "addition=".$add."<br/>";	

}

function sub( )
{

$sub=$this->first - $this->second;

echo "subtraction=".$sub;	

}

}

$obj= new demo();

$obj->add();

$obj->sub();

?>