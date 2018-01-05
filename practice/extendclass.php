<?php

class baseclass{

public $name;
public $age;
function __construct($n,$a){
   $this->name=$n;
   $this->age=$a;
   

     }
}
class extendclass extends baseclass{
public $batch;
function __construct($n,$a,$b){

parent::__construct($n,$a);
$this->$batch=$b;
print_r($this);
echo "mine";
}

}
?>