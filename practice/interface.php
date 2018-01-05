<?php

interface Area{
	function area();

}


class triangle implements Area{
     
    public $h,$b,$area;

     function __construct(){


     }

     function area(){

     	$this->area=0.5* ($this->h)*($this->b);
     	echo $this->area;
     }


}

class rectangle implements Area{

	public $l,$b,$area;
	function __construct(){

	}

	function area(){

		$this->area * ($this->l)*($this->b);
		echo $this->area;

	}
}




?>