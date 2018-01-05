<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
	
	@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro);
*{
  margin:0px;
  padding:0px;
}
html{
  background: #497dd0;
}
.wrapper {
  margin: 100px 0;
}

.toggle_radio{
  position: relative;
  background: rgba(255,255,255,.1);
  margin: 4px auto;
  overflow: auto;
  padding: 0 !important;
  -webkit-border-radius: 50px;
  -moz-border-radius: 50px;
  border-radius: 50px;
  position: relative;
  height: 126px;
  width: 100%;
}
.toggle_radio > * {
  float: left;
}
.toggle_radio input[type=radio]{
  display: none;
  /*position: fixed;*/
}
.toggle_radio label{
  font: 90%/1.618 "Source Sans Pro";
  color: rgba(255,255,255,.9);
  z-index: 0;
  display: block;
  width: 100px;
  height: 20px;
  margin: 3px 3px;
  -webkit-border-radius: 50px;
  -moz-border-radius: 50px;
  border-radius: 50px;
  cursor: pointer;
  z-index: 1;
  /*background: rgba(0,0,0,.1);*/
  text-align: center;
  /*margin: 0 2px;*/
  /*background: blue;*/ /*make it blue*/
}
.toggle_option_slider{
  /*display: none;*/
  /*background: red;*/
  width: 100px;
  height: 20px;
  position: absolute;
  top: 3px;
  -webkit-border-radius: 50px;
  -moz-border-radius: 50px;
  border-radius: 50px;
  -webkit-transition: all .4s ease;
  -moz-transition: all .4s ease;
  -o-transition: all .4s ease;
  -ms-transition: all .4s ease;
  transition: all .4s ease;
}

#first_toggle:checked ~ .toggle_option_slider{
  background: rgba(255,255,255,.3);
  left: 3px;
}
#second_toggle:checked ~ .toggle_option_slider{
  background: rgba(255,255,255,.3);
  left: 109px;
}
#third_toggle:checked ~ .toggle_option_slider{
  background: rgba(255,255,255,.3);
  left: 215px;
}
#fourth_toggle:checked ~ .toggle_option_slider{
  background: rgba(255,255,255,.3);
  left: 321px;
  
}
#fifth_toggle:checked ~ .toggle_option_slider{
  background: rgba(255,255,255,.3);
  left: 428px;
 
}
#sixth_toggle:checked ~ .toggle_option_slider{
  background: rgba(255,255,255,.3);
  left: 534px; 
}
#seventh_toggle:checked ~ .toggle_option_slider{
  background: rgba(255,255,255,.3);
  left: 638px;

}
#eighth_toggle:checked ~ .toggle_option_slider{
  background: rgba(255,255,255,.3);
  left: 746px;
}

#ninth_toggle:checked ~ .toggle_option_slider{
  background: rgba(255,255,255,.3);
  left: 859px;
  top: 
}

#tenth_toggle:checked ~ .toggle_option_slider{
  background: rgba(255,255,255,.3);
  left: 965px;
}

</style>
</head>
<body>
	<div class="wrapper">
  <div class="toggle_radio">
    <input type="radio" class="toggle_option" id="first_toggle" name="toggle_option">
    <input type="radio" checked class="toggle_option" id="second_toggle" name="toggle_option">
    <input type="radio" class="toggle_option" id="third_toggle" name="toggle_option">
    <input type="radio" class="toggle_option" id="fourth_toggle" name="toggle_option">
    <input type="radio" class="toggle_option" id="fifth_toggle" name="toggle_option">
    <input type="radio" class="toggle_option" id="sixth_toggle" name="toggle_option">
    <input type="radio" class="toggle_option" id="seventh_toggle" name="toggle_option">
    <input type="radio" class="toggle_option" id="eighth_toggle" name="toggle_option">
    <input type="radio" class="toggle_option" id="ninth_toggle" name="toggle_option">
    <input type="radio" class="toggle_option" id="tenth_toggle" name="toggle_option">
    <label for="first_toggle"><p>First Button</p></label>
    <label for="second_toggle"><p>Second Button</p></label>
    <label for="third_toggle"><p>Third Button</p></label>
     <label for="fourth_toggle"><p>Four Button</p></label>
    <label for="fifth_toggle"><p>Five Button</p></label>
    <label for="sixth_toggle"><p>Six Button</p></label>
     <label for="seventh_toggle"><p>Seven Button</p></label>
    <label for="eighth_toggle"><p>Eight Button</p></label>
    <label for="ninth_toggle"><p>Nine Button</p></label>
    <label for="tenth_toggle"><p>Ten Button</p></label>
    <div class="toggle_option_slider">
    </div>
  </div>
</body>
</html>