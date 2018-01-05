<?php

echo "my first program <br/>";
$f="mine is one of";
$b="is the lost";
echo "$f . $b <br/>";

$empty = array('title' => 'sample' ,'date'=>'mine','author'=>'jason' );
$entry = array('1','2','3' );
echo "her title track {$empty['title']} is {$empty['date']}";
echo "<br>";
echo "$entry[0] <br/>";
$foo=5;
$foo++;
echo '$foo <br>';

$person = array('name' =>'anuj' ,'age'=>'23','sex'=>'male' );

foreach ($person as $key => $value) {
	echo "his $key is $value <br>";
}

function sayhello()
{
	echo "hello <br>";
}

for ($i=0; $i <5 ; $i++) { 
 sayhello();
}
sayhello();

?>