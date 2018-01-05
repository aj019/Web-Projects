<style type="text/css">

#var{
	display:none;
}
</style>

<?php

$variable ="Myvalue";
echo "<div id='var'> $variable </div>";
?>

<script type="text/javascript">

element = document.getElementById('var')
alert(element.innerHTML);
</script>