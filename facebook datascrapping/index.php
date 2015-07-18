<?php
function getHTML($url,$timeout)
{
	   // $proxy = '10.31.0.1:8080'; //proxy
       $ch = curl_init($url); // initialize curl with given url
       curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]); // set  useragent
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects if any
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); // max. seconds to execute
       curl_setopt($ch, CURLOPT_FAILONERROR, 1); // stop when it encounters an error
       // curl_setopt($ch, CURLOPT_PROXY, $proxy);
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       $res = curl_exec($ch);
       	if($res === false){
		    echo 'Curl error #'.curl_errno($ch).': ' . curl_error($ch);
		}
       return $res;
}
function scrape_between($data, $start, $end){
	        $data = stristr($data, $start); // Stripping all data from before $start
	        $data = substr($data, strlen($start));  // Stripping $start
	        $stop = stripos($data, $end);   // Getting the position of the $end of the data to scrape
	        $data = substr($data, 0, $stop);    // Stripping all data from after and including the $end of the data to scrape
	        return $data;   // Returning the scraped data from the function
}

$result = getHTML("https://www.facebook.com/raysoflovearpan", 0);

$id = scrape_between($result, "r.php?profile_id=", "&");

echo $id;

?>