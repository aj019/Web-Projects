<?php
  
  
  $maps_url = 'https://'.
  'maps.googleapis.com/'.
  'maps/api/directions/json'.
  '?origin=' . urlencode($_GET['start']).'&destination='.urlencode($_GET['end']).'&key=AIzaSyDZHm5scp6fTMllP86VM7Jt5mbujCbiPlo';

  $maps_json = file_get_contents($maps_url);
  $maps_array = json_decode($maps_json, true);
  $dist = $maps_array['routes'][0]['legs'][0]['distance']['text'];
  $time = $maps_array['routes'][0]['legs'][0]['duration']['text'];
  echo "distance = ".$dist."time = ".$time;

  $arr = array('dist' => $dist, 'time' => $time);

  echo json_encode($arr);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>geogram</title>
  </head>
  <body>
  <form action="" method="get">
    <input type="text" name="start"/>
    <input type="text" name="end">
    <button type="submit">Submit</button>
  </form>
    
  </body>
</html>