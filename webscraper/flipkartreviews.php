<?php
    // Defining the basic cURL function
ini_set('max_execution_time', 180);
    require_once('main/init.php');

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

    $url = 'http://www.flipkart.com/moto-g-3rd-generation/p/itme9ysjfazgqyqz?pid=MOBE6KK9HGWQ6ZAZ&ref=L%3A-1563939325241045464&srno=p_1&query=moto+g3&otracker=from-search';    // Assigning the URL we want to scrape to the variable $url
    $results_page = curl($url);

    $results_page = scrape_between($results_page, "<div class=\"helpfulReviews\">", "<div class=\"ugcFeedbackTooltip-container\""); 
    //echo $results_page;
    $link = scrape_between($results_page,"<a href=\"","\"");
    $newpage = "http://www.flipkart.com".$link;
//    echo $newpage;

    
    //-------------Second Page-------------

    for($i=0;$i<4;$i++){

    $results_page = curl($newpage);

    $next_page = scrape_between($results_page,"<div class=\"fk-navigation fk-text-center tmargin10\">","<div class=\"review-section");
    
    $next_page = scrape_between($results_page,"<a class=\"nav_bar_next_prev\" href=\"","\"");
    
    $results_page = scrape_between($results_page, "<div class=\"review-list\">", "<div class=\"fk-navigation fk-text-center tmargin10\">");
  
    $separate_results = explode("<div class=\"fclear", $results_page);  
//    print_r($separate_results)  

    
     foreach ($separate_results as $separate_results) {
        
        if ($separate_results != "") {
        $array[] = array('text' => scrape_between($separate_results, "<span class=\"review-text\">", "</span>"));
           
        }
    }

    foreach ($array as $key ) {
        
        echo $key['text']."<br><br><br>";
    }

    echo "-------------------".$i."----------------------------";
    $newpage = $next_page;

   } 
?>