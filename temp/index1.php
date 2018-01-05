<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <h1>Index 1</h1>
</body>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
var idleTime = 0;
$(document).ready(function () {
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 1000); // 1 minute

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
});

function timerIncrement() {
    idleTime = idleTime + 1;
    if (idleTime > 5) { // 20 minutes
        window.location ="index.php";
    }
}
</script>
</html>