<?php

/**
* 
*/
class classname 
{
	public $name;
	public $age;
	public $batch;
	protected $data = array();
	
	function __construct($n,$a,$b){    //magic methos
    $this->name=$n;
     $this->age=$a;
      $this->batch=$b;

    echo "object conbs";                                //autoload,get ,set-other exam
	}


	function __destruct(){

echo "object destr";
	}

	function __set($property,$value)
	{
		$this->data[$property] =$value;

	}

	function __get($property){

        return $this->data[$property];
	}
}

$object= new classname("praveer","21","C123");
echo "<br>";
echo $object->name;
$object->gender="male";
echo"<br>";
echo $object->gender;
//$object->gender;
//echo $object->gender;
echo "<br>";



?>