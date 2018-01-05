<?php


///Max No of comics -1500

//Comics stored 1 to 400

    require_once('main/init.php');    
    ini_set('max_execution_time',720);
    // Defining the basic cURL function
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

   
for($i=200;$i<400;$i++){
    $url = 'http://xkcd.com/'.$i.'/';    // Assigning the URL we want to scrape to the variable $url
    $results_page = curl($url); // Downloading the results page using our curl() funtion
    $title = scrape_between($results_page,"<div id=\"ctitle\">","</div>");
    $results_page = scrape_between($results_page, "<div id=\"comic\">", "</div>"); // Scraping out only the middle 
    $results_page1 = scrape_between($results_page, "src=\"", "\"");
    echo "<h2>".$title."</h2>";
    
        
        $title = str_replace("'","\'",$title);
        $title = str_replace('"','\"',$title);
 
        $query="INSERT INTO `xkcd` (id,title,image) VALUES ('', '".$title."' , '$results_page1' )";
        $status = $conn->query($query);

        if(!$status){

            die("Insertion Errror".mysqli_error($conn));//Inserted from starting to 195
        }
}

?>

