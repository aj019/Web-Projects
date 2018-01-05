<!DOCTYPE html>
<html>
<head>
 <title></title>
 <script src="ammap/jquery.js" type="text/javascript"></script>
 <script src="ammap/ammap.js" type="text/javascript"></script>
 <script src="alert.js" type="text/javascript"></script>
 <script src="ammap/maps/js/indiaLow.js" type="text/javascript"></script>
 <link rel="stylesheet" href="ammap/ammap.css" type="text/css" media="all" />

<script type="text/javascript">
//from view source



//till here

    // add all your code to this method, as this will ensure that page is loaded
    AmCharts.ready(function() {
        // create AmMap object
        var map = new AmCharts.AmMap();
        // set path to images
        map.pathToImages = "ammap/images/";

        /* create data provider object
         map property is usually the same as the name of the map file.

         getAreasFromMap indicates that amMap should read all the areas available
         in the map data and treat them as they are included in your data provider.
         in case you don't set it to true, all the areas except listed in data
         provider will be treated as unlisted.
        */
        var dataProvider = {
            map: "indiaLow",
            
            areas:[{id:"IN-RJ", color:"#CC0000",zoomLevel:5,description:'<div class=memberWrapper><div class=memberInPopup data-memberid=215 >Paul Amar</div><select><option>Anuj<option></select><br><!DOCTYPE html><html><head></head><body></body></html>',descriptionWindowHeight: 200}/*'<div class=memberWrapper><div class=memberInPopup district_id=215 >district_name</div></div><br><!DOCTYPE html><html><head></head><body></body></html>'}*/,{id:"IN-PB", color:"#0C0C00"},{id:"IN-UP", color:"#0000CC"},{id:"IN-AP", color:"#00CC00"}]                    
        }; 
        // pass data provider to the map object
        map.dataProvider = dataProvider;

        /* create areas settings
         * autoZoom set to true means that the map will zoom-in when clicked on the area
         * selectedColor indicates color of the clicked area.
         */
        map.areasSettings = {
            autoZoom: true,
            selectedColor: "#CC0000"
        };

        // let's say we want a small map to be displayed, so let's create it
        map.smallMap = new AmCharts.SmallMap();

        // write the map to container div
        map.write("mapdiv");
    

         map.addListener("clickMapObject", function (event) {
       
           state_code =event.mapObject.id;

           $.ajax({

            url:"state.php",
            data:"state_code="+state_code,
            type:"POST",
            success:function(response){

                $('#result').html(response);

            }

           });
                
        });

    });

</script>
</head>

<body>
<div id="mapdiv" style="float:left; width: 900px; height:700px;"></div>
<div id="result" style="width:300px; float:left;"></div>
<div id="result1" style="width:86%"></div>

</body>
<script type="text/javascript">

	function myFunction(){

		alert("hello");

	}


	function getdistrict(district_id) {
    
    $.ajax({

    	url:"district.php",
    	type:"POST",
    	data:"district_id="+district_id,
    	success:function(response){
    		
    		$('#result1').html(response);
    	}
    });

   
 }
</script>
</html>