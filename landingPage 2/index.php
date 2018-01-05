<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>JEETeacher</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
  </head>
  <body>

    <!--top first section start-->
    <section id="first">
      <div id="first-content" class="container">
        <div class="row">
          <div id="logo" class="col-md-10 col-md-offset-1 text-left">
            <a href="index.php"><h1>JEE<span style="color:rgb(130,153,170);">Teacher<sup>alpha</sup></span></h1></a>
            <div class="text-center">
              <h1 id="title">Clear all your JEE concepts<br> in a flash.</h1>
              <a href="#what-do-we-offer"><span id="chevron-auto" class="glyphicon glyphicon-chevron-down"></span></a>
            </div>
          </div>
      </div>
    </section>
    <!--top first section end-->

    <!--what do we offer start-->
    <section id="what-do-we-offer">
      <div id="what-do-we-offer-content" class="container text-center">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h1 style="padding-bottom:25px ; ">WHAT DO WE OFFER?</h1>
            <p class="text">
              We offer a truly mind blowing learning experience in all JEE related subjects and topics.
              We'll make you understand anything through our live tutoring classes.
            </p><br>
            <p class="text">
              Just try us out and you'll know what happens when a teacher really cares about the student.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!--what do we offer end-->

    <!--who we are start-->
    <section id="who-are-we">
      <div id="who-are-we-content" class="container-fluid text-center">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <h1 id="title-second" style="">Who are we?</h1>
            <p class="text-second">
              We're bunch of IITians who wish to make a difference in<br>
              student's life by making them easily understand the parts<br>
              they find difficult during their preparation.
            </p>
            <div class="row text-center">
              <div class="col-md-2 col-md-offset-5">
                <div class="border"></div>
              </div>
            </div>
            <p class="text-third">
              We truly believe that science and mathematics are beautiful.<br>
              We wish to transfer these insights onto the young minds of tomorrow
              through our teaching!
            </p>
            <p style="padding:0px;" class="text-third">
              We are just absolutely honest when it comes to understanding a concept
              and know exactly where the student struggles.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!--who we are end-->

    <!--how doest it work start-->
    <section id="how-does-it-work">
      <div  id="how-does-it-work-content" class="container text-center">
        <div class="row">
          <h1 style="padding-bottom:50px;" class="title-second">HOW DOES IT WORK?</h1>

          <div class="col-md-4 text-left">
            <h1>1.</h1>
            <div class="row text-left">
              <div class="col-md-3 col-md-offset-0">
                <div class="border"></div>
              </div>
            </div>
            <p style="padding-top:15px;" class="text text-left">
              Submit a Teaching Assignment.<br>
              It can be anything, a concept you're struggling<br>
              with or a full chapter etc.
            </p>
          </div>

          <div class="col-md-4 col-md-offset-3 text-left">
            <h1>2.</h1>
            <div class="row text-left">
              <div class="col-md-3 col-md-offset-0">
                <div class="border"></div>
              </div>
            </div>
            <p style="padding-top:15px;" class="text text-left">
              The teacher checks out your assignment and<br>
              prepares a lesson plan according to it, just for you.
            </p>
          </div>
          <div style="padding:50px;" class="visible-md"></div>
          <div class="col-md-4 col-md-offset-4 text-left">
            <h1>3.</h1>
            <div class="row text-left">
              <div class="col-md-3 col-md-offset-0">
                <div class="border"></div>
              </div>
            </div>
            <p style="padding-top:15px;" class="text text-left">
              He contacts you and both of you get on Skype<br>
              for a live tutoring lession.
            </p>
          </div>
        </div>
    </section>
    <!--how doest it work end-->

    <!--how much does it cost start-->
    <section id="how-much-does-it-cost">
      <div id="how-much-does-it-cost-content" class="container text-center">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h1 style="color:#FFFFFF;">HOW MUCH DOES IT COST?</h1>
            <div id="content-box">
              <p style="padding:0px; color:#FFFFFF;" class="text-second">
                Rs.0 if you don't understand the concept!
              </p>
              <p style="padding:0px; color:#FFFFFF;" class="text-second">
                You pay us only after the lesson is through and you think you really
              </p>
              <p style="padding:0px; color:#FFFFFF;" class="text-second">
                understood what you asked.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--how much does it cost end-->

    <!--form start-->
    <section id="submit-assignment">
      <div id="submit-assignment-content" class="container text-center">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h1 style="padding-bottom:50px" class="title-second">Submit a Teaching Assignment</h1>
            <form id="assignment-form" onsubmit="return validateAssignment()" class="form-inline" action="" method="post">
              <div class="form-group">
                <input class="form-control" title="Your Name" type="text" name="name" value="" placeholder="Your Name" >
              </div>
              <div class="form-group">
                <input class="form-control" title="Your Email" type="email" name="email" value="" placeholder="Your Email">
              </div><br><br>
              <div class="form-group">
                <textarea class="form-control" name="description" rows="6" cols="63" placeholder="Describe what you want the teacher to explain, what you already know etc."></textarea>
              </div><br><br>
              <input class="form-control" type="submit" name="assignment-submit" value="Submit">
            </form>
			<div id="loader" style="margin-top:25px;"><img src="data/loading.gif"  width="25" height="25" /></div>
            <div id="assignment-append" style="margin-top:25px;"></div>
          </div>
        </div>
      </div>
    </section>
    <!--form end-->
    <hr>
    <!--footer start-->
    <footer class="text-center">
      <p>
        &copy SecretProject, 2015
        <img src="data/facebook.png" alt="facebook" width="30" height="30" />
        <img src="data/twitter.png" alt="twitter" width="30" height="30"/>
        <img class="round" src="data/linkedin.png" alt="linkedin" width="30" height="30"/>
      </p>
    </footer>
    <!--footer end-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
