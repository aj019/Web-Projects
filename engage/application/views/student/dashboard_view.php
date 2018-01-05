    <!-- Intro Header -->
    <div id="search">
      <div class="container">
        <div class="row">
          <h2>Mentor Search</h2>
          <form method="POST" action="<?=base_url()?>student/search_mentor">
          <div id="custom-search-input">
            <div class="input-group col-md-12">
              <input type="text" class="  search-query form-control" placeholder="Search" name="search" />
              <span class="input-group-btn">
                <button class="btn btn-danger" type="button" onclick="search_mentor()">
                  <span class=" glyphicon glyphicon-search"></span>
                </button>
              </span>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="container" id="pro">
      <div class="col-md-4 profile-card">

        <header>
          <a href="">
            <img src="<?=$student->photo?>">
          </a>
          <h1><?=$student->first_name ?></h1>
          <hr class="small">
          <!-- and role or location -->
          <h2><?=$student->one_line_info?></h2>
        </header>

        <!-- bit of a bio; who are you? -->
        <div class="profile-bio">
          <p><?=$student->bio?></p>
        </div>

        <ul class="profile-social-links">

          <li>
            <a href="<?=$student->github_profile?>">
              <i class="fa fa-github fa-2x"></i>
            </a>
          </li>
          <li>
            <a href="<?=$student->website?>">
              <i class="fa fa-user fa-2x"></i>
            </a>
          </li>
          <li>
            <a href="<?=$student->linkedin_profile?>">
              <i class="fa fa-linkedin fa-2x"></i>
            </a>
          </li>

        </ul>


      </div>

      <div class = "col-md-offset-1 col-md-7">

        <div id="pd"class="personal-details row">
          <h1>On Going Mentorship</h1>
          <p><i class="fa fa-users"></i>Raghav Khurana - PHP</p>
          <p><i class="fa fa-users"></i>Kushan - HTML5 , CSS3</p>
          
        </div>

        <br>

        <div class="skillset row" style="padding-bottom:1em;">
              <h1>Skillset</h1>
              <?php 
              $skillset = array("$student->skill1", "$student->skill2", "$student->skill3","$student->skill4","$student->skill5");
              for($i=0 ; $i<5 ; $i++){
                if($skillset[$i]){?>
                  <button class="btn btn-success"><?=$skillset[$i]?></button>
                <?php
                }
              }?>
            </div>

        <br>

        <div class="projects row">
          <h1>Projects Taken</h1>
        </div>
      </div>
    </div>

  </div>

  <script type="text/javascript">
    function search_mentor(){
      if($('input[name=search]').val()){
        $('form').submit();
      }
      else{
        alert('Complete the field');
      }

    }

  </script>