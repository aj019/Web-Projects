<?php 

//WEBSITE name japastragram 100 pages curled 
    require_once('main/init.php');
    ini_set('max_execution_time', 360);
    function curl($url) {
          // Assigning cURL options to an array
        $options = Array(
            CURLOPT_RETURNTRANSFER => TRUE,  // Setting cURL's option to return the webpage data
            CURLOPT_FOLLOWLOCATION => TRUE,  // Setting cURL to follow 'location' HTTP headers
            CURLOPT_AUTOREFERER => TRUE, // Automatically set the referer where following 'location' HTTP headers
            CURLOPT_CONNECTTIMEOUT => 120,   // Setting the amount of time (in seconds) before the request times out
            CURLOPT_TIMEOUT => 120,  // Setting the maximum amount of time for cURL to execute queries
            CURLOPT_MAXREDIRS => 10, // Setting the maximum number of redirections to follow
            CURLOPT_USERAGENT => "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8",  // Setting the useragent
            CURLOPT_URL => $url, // Setting cURL's URL option with the $url variable passed into the function
        );
         
        $ch = curl_init();  // Initialising cURL 
        curl_setopt_array($ch, $options);   // Setting cURL's options using the previously assigned array data in $options
        $data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
        curl_close($ch);    // Closing cURL 
        return $data;
    }

     function scrape_between($data, $start, $end){
        $data = stristr($data, $start); // Stripping all data from before $start
        $data = substr($data, strlen($start));  // Stripping $start
        $stop = stripos($data, $end);   // Getting the position of the $end of the data to scrape
        $data = substr($data, 0, $stop);    // Stripping all data from after and including the $end of the data to scrape
        return $data;   // Returning the scraped data from the function
    }

    /*$url = 'http://www.picturegr.am/tag/8factapp' ;    // Assigning the URL we want to scrape to the variable $url
    $results_page = curl($url); // Downloading the results page using our curl() funtion
    //echo $results_page;
    $results_page = scrape_between($results_page, "<div class=\"row\" id=\"imageContainer\">", "<div id=\"loadmore-container\" class=\"container\">"); 
    
    $separate_results = explode("<div class=\"col-xs-12 col-sm-6 col-md-3\">", $results_page);
    //print_r($separate_results);

    foreach ($separate_results as $separate_result) {
        
        if ($separate_result != "") {
        $array[] = array('url' => scrape_between($separate_result, "src=\"", "\""));
           
        }
    }

    foreach ($array as $array) {
        
        echo "<img src='".$array['url']."' >";
    }
    */
    $next = 'http://japastagram.com/u/?q=8factapp';
    for ($i=0;$i<100;$i++)
    {
        $url = $next ;    // Assigning the URL we want to scrape to the variable $url
        $results_page = curl($url); // Downloading the results page using our curl() funtion
        //echo $results_page;
        $next = scrape_between($results_page, "<div class=\"next\"", "</div");
        $next = scrape_between($next, "<a href=\"", "\">next");

        $results_page = scrape_between($results_page, "<ul class=\"listCover\">", "</div>"); 
        //echo $results_page; 

        $separate_results = explode("<li", $results_page);
        //print_r($separate_results);

        foreach ($separate_results as $separate_result) {
            
            if ($separate_result != "") {
            $array[] = array('url' => scrape_between($separate_result, "src=\"", "\""));
               
            }
        }

        foreach ($array as $array) {
            if($array['url'] != "h" && $array['url'] != ""){
              $image = $array['url'];
              echo "<img src='".$image."' >";
                $query= "INSERT INTO `8fact` (id,image) VALUES ('', '".$image."' )";

                $status = $conn->query($query);

                if(!$status){

                    die("Insertion error".mysqli_error($conn));
                    }


            }
        }
    }       
    
?>