<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form enctype="multipart/form-data" method="post">
  <h2>Regular file upload</h2>
  <input type="file"></input>
  
  <h2>capture=camera</h2>
  <input type="file" accept="image/*;capture=camera"></input>
  
  <h2>capture=camcorder</h2>
  <input type="file" accept="video/*;capture=camcorder"></input>
  
  <h2>capture=microphone</h2>
  <input type="file" accept="audio/*;capture=microphone"></input>
</form>
</body>
</html>