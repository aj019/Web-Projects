<?php

require_once("init.php");

$articlesquery=$conn->query("

    SELECT *
    FROM votes

    ");

  while ($row= $articlesquery->fetch_object()) {
    
    $articles[]= $row;

  }



?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  
  <style type="text/css">
    
.wrap {
  width: 300px;
  min-width: 250px;
  height: 60px;
  margin: 50px auto;
  position: relative;
  display: table;
}
.wrap .votes {
  border-radius: 3px 0 0 3px;
  display: table-cell;
  min-width: 30px;
  min-height: 60px;
  background: #2980b9;
  text-align: center;
  color: #fff;
  line-height: 60px;
  font-weight: 700;
}
.wrap .button {
  -webkit-transition: 0.3s;
  transition: 0.3s;
  border-radius: 0 3px 3px 0;
  display: table-cell;
  text-align: center;
  color: #fff;
  line-height: 60px;
  margin-right: 20px;
  min-height: 60px;
  background: #3498db;
  text-transform: uppercase;
  font-weight: 700;
  cursor: pointer;
  border-left: 1px solid #3498db;
}
.wrap .button i {
  -webkit-transition: 0.3s;
  transition: 0.3s;
  -webkit-transition: all 800ms cubic-bezier(1, 0, 0, 1);
          transition: all 800ms cubic-bezier(1, 0, 0, 1);
  -webkit-transition-timing-function: cubic-bezier(1, 0, 0, 1);
          transition-timing-function: cubic-bezier(1, 0, 0, 1);
  margin: 0 10px 0 0;
}
.wrap .button:hover {
  background: #2980b9;
}
.wrap .button:hover i {
  -webkit-transition: 0.3s;
  transition: 0.3s;
  -webkit-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
          transform: rotate(-90deg);
  -webkit-transition: all 800ms cubic-bezier(1, 0, 0, 1);
          transition: all 800ms cubic-bezier(1, 0, 0, 1);
  -webkit-transition-timing-function: cubic-bezier(1, 0, 0, 1);
          transition-timing-function: cubic-bezier(1, 0, 0, 1);
}

.wrap .button1 {
  -webkit-transition: 0.3s;
  transition: 0.3s;
  border-radius: 0 3px 3px 0;
  margin-left: 10px;
  text-align: center;
  color: #fff;
  line-height: 60px;
  margin-right: 20px;
  min-height: 60px;
  background: #3498db;
  text-transform: uppercase;
  font-weight: 700;
  cursor: pointer;
  border-left: 1px solid #3498db;
}
.wrap .button1 i {
  -webkit-transition: 0.3s;
  transition: 0.3s;
  -webkit-transition: all 800ms cubic-bezier(1, 0, 0, 1);
          transition: all 800ms cubic-bezier(1, 0, 0, 1);
  -webkit-transition-timing-function: cubic-bezier(1, 0, 0, 1);
          transition-timing-function: cubic-bezier(1, 0, 0, 1);
  margin: 0 10px 0 0;
}
.wrap .button1:hover {
  background: #2980b9;
}
.wrap .button1:hover i {
  -webkit-transition: 0.3s;
  transition: 0.3s;
  -webkit-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
          transform: rotate(-90deg);
  -webkit-transition: all 800ms cubic-bezier(1, 0, 0, 1);
          transition: all 800ms cubic-bezier(1, 0, 0, 1);
  -webkit-transition-timing-function: cubic-bezier(1, 0, 0, 1);
          transition-timing-function: cubic-bezier(1, 0, 0, 1);
}
body {
  font-family: 'Lato', sans-serif;
}
</style>

<script type="text/javascript"></script>
<script src="jquery.js"></script>
<script src="vote.js" type="text/javascript"></script>
<script>

      var main=function()
      {
        var upvoted=false;
        var downvoted=false;
      $(".up").click(function(){
        if(!upvoted){
          if(!downvoted)
            { 
              addVote('1','1');
            
            upvoted=true;
          }
          else
          {
            addVote('1','2');
            
            upvoted=true;
          }
        }
        else
        {
          addVote('1','0.1');
          
        upvoted=false;
        }
      });

        $(".down").click(function(){
        if(!downvoted){

            if(upvoted)
            { 
               addVote('1','-2');
            
              downvoted=true;
              upvoted=false;
          }
          else{
            addVote('1','-1');
            
              downvoted=true;
           
          }
        }
        else
        {
           addVote('1','0.2');
        
         downvoted=false;
        }
      });

    };
    
    $(document).ready(main);  
  
</script>
</head>
<body>
  <div class="wrap">
  <div class="votes">138</div>
  <div class="button"><i class="fa fa-arrow-up"></i>Upvote </div>
  <div class="button1"><i class="fa fa-arrow-up"></i>Downvote</div>
</div>
  <br><br><br><br><br><br>
  <?php foreach ($articles as $articles):?>
  <div>
    <?php
          $articlesquery1="

              SELECT *
               FROM articles
               WHERE article_id='1'
              
              ";

            $result = mysqli_query($conn, $articlesquery1);
            $row1 = mysqli_fetch_assoc($result);
            
            ?>
    <img class="up" src="resources/up<?php echo $row1['status']; ?>.png">
    <p class="upvotes"><?php echo $articles->upvotes ?></p>
    <img class="down" src="resources/down<?php echo $row1['status']; ?>.png">
  </div>
<?php endforeach; ?>

</body>

</html>