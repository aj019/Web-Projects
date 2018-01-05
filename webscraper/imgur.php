<?php
    // Defining the basic cURL function
    function curl($url) {
          // Assigning cURL options to an array
        $options = Array(
            CURLOPT_RETURNTRANSFER => TRUE,  // Setting cURL's option to return the webpage data
            CURLOPT_FOLLOWLOCATION => TRUE,  // Setting cURL to follow 'location' HTTP headers
            CURLOPT_AUTOREFERER => TRUE, // Automatically set the referer where following 'location' HTTP headers
            CURLOPT_CONNECTTIMEOUT => 180,   // Setting the amount of time (in seconds) before the request times out
            CURLOPT_TIMEOUT => 180,  // Setting the maximum amount of time for cURL to execute queries
            CURLOPT_MAXREDIRS => 20, // Setting the maximum number of redirections to follow
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

 /*

 //--------------------------------MemeCenter.com------------------------  
//for($i=0;$i<10;$i++){
    $url = 'http://www.memecenter.com/';    // Assigning the URL we want to scrape to the variable $url
    $results_page = curl($url); // Downloading the results page using our curl() funtion
    $results_page = scrape_between($results_page, "<div class=\"main-left-container\">", "<div class=\"main-right-container\">"); 
    //echo $results_page;
    $separate_results = explode("<div class=\"content  \" ", $results_page);

    //print_r($separate_results);
    foreach ($separate_results as $separate_result) {
        
        if ($separate_result != "") {
        $array[] = array('url' => scrape_between($separate_result, "href=\"", "\"") ,'image' => scrape_between($separate_result, "src=\""  , "\""),'title' => scrape_between($separate_result, "data-message=\""  , "\""));
           
        }
    }

   
   foreach ($array as $key) {
    
    if($key['image']){        
   echo "<h1>".$key['title']."</h1>";
    echo "<a href='".$key['url']."'><img src='".$key['image']."' ></a>";
        echo "<br>";
    }
}
   //}*/


//--------------Memes.com-------------
/*for($i=600000;$i<600020;$i++){
    $url = 'http://www.memes.com/meme/'.$i;    // Assigning the URL we want to scrape to the variable $url
    $results_page = curl($url); // Downloading the results page using our curl() funtion
    $results_page = scrape_between($results_page, "<div class=\"image_contain\"", "<div class=\"views_likes\""); 
    //echo $results_page;
    $title = scrape_between($results_page, "title=\"", "\"");
    echo "<h1>".$title."</h1><br>";
    $results_page1 = scrape_between($results_page, "src=\"", "\"");
    echo "<img src='".$results_page1."'><br>";
   
   }
*/  
    //--------------------------------Pickcross.com------------------------  


    for($i=40;$i<45;$i++){
    $url = 'http://www.pickcross.com/That-feeling-'.$i;    // Assigning the URL we want to scrape to the variable $url
    $results_page = curl($url); // Downloading the results page using our curl() funtion
    $results_page = scrape_between($results_page, "<div class=\"container contentContainer\">", "<div class=\"container-fluid bottom-bar\""); 
    $results_page1 = scrape_between($results_page, "src=\"", "\"");//image url is in $results
    echo "<img src='".$results_page1."'><br>";
    
   
   }

?>

