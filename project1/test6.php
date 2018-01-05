<style type="text/css">
	
	#var{

		display: none;
	}
</style>


<?php

$variable="myvalue";
echo "<div id='var'>$variable</div>";
?>

<script>
element=document.getElementById('var');
alert(element.innerHTML);
</script>