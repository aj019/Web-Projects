<?php
    // Defining the basic cURL function
ini_set('max_execution_time', 1000);
    


    $url = $_POST['url'];

    if(isset($url)){

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

    function scrape($url){

        
        //$url = 'http://www.memes.com/meme/'.$i;    // Assigning the URL we want to scrape to the variable $url
        $results_page = curl($url); // Downloading the results page using our curl() funtion
        //echo $results_page;
        $image = scrape_between($results_page, "<div class=\"badge-post-container badge-entry-content post-container \">", "<div class=\"post-text-container badge-item-description\">");
        $image = scrape_between($image, "src=\"", "\"");
        
        $title = scrape_between($results_page, "<h2 class=\"badge-item-title\">","</h2>"); 
        $results_page = scrape_between($results_page, "class=\"post-nav\"", "class=\"clearfix\""); 
        $results_page = scrape_between($results_page, "class=\"badge-fast-entry badge-next-post-entry next \"", "rel=\"nofollow\""); 
        $next = scrape_between($results_page, "href=\"", "\"");
        // echo "<h1>".$title."</h1><br>";
        // $results_page1 = scrape_between($results_page, "src=\"", "\"");  
        if(strpos($image,'.mp4') == false){
        $source = "http://9gag.com/";    
        echo "<h1>".$title."</h1>";    
        echo "<img src='".$image."' /><br>";
        echo "<a href='http://9gag.com/".$next."' >Next</a><br>";
        echo "<a href='".$source."'>9GAG</a>";
        $conn=new mysqli('localhost','root','','webscraper');

        if(!$conn){

            die("Connection error:".mysqli_connect_error());
        }

        $query = "SELECT * FROM `dailymemes` WHERE image='$image' AND title='$title' ";
        
        $res = mysqli_query($conn,$query);    
        if(mysqli_num_rows($res)){
            echo "Already Exist";
        }else{
                $title = str_replace("'","\'",$title);
                $title = str_replace('"','\"',$title);
                $title = str_replace('&#039;',"\'",$title);
                $title = str_replace('&quot;','\"',$title);
                
                $query3="INSERT INTO `dailymemes` (id,title,image,source) VALUES ('', '".$title."' , '".$image."','".$source."' )";
                $status = $conn->query($query3);

                if(!$status){

                    die("Insertion Errror".mysqli_error($conn));//Inserted from starting to 195
                }   
            }
        }
        scrape('http://9gag.com/'.$next);
    }

    
    scrape($url);
    }else{
?>   

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form action="9gag.php" method="post">
        <input type='text' name="url" placeholder="Enter URL of Top Pick"/>
        <input type="Submit" value="submit">
    </form>
</body>
</html>

<?php } ?>