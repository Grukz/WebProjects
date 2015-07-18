<?php

set_time_limit(0);
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

		$result = getHTML("http://www.snapdeal.com/product/hp-stream-8-windows-tablet/672158959721?", 0);
		function getTitle($result){
			preg_match('/(.*)<\/h1>/i', $result, $title);
			$ret = scrape_between($title[0], '<h1 itemprop="name" class=\'font20\'>', "</h1>");
			return $ret;
		}

		function getImg($result, $title){
			preg_match_all('/<img title=(.*) itemprop="image" (.*)>/i', $result, $img);
			$img_url = scrape_between($img[0][0], 'src="', '"');
			return $img_url;	
		}

		function getMRP($result){
			preg_match_all('/original-price-id">(.*)</i', $result, $MRP);
			$ret = scrape_between($MRP[0][0], 'original-price-id">', '</span><');
			return $ret;
		}

		function getOfferPrice($result){
			preg_match_all('/"selling-price-id" itemprop="price">(.*)</i', $result, $offer);
			$ret = scrape_between($offer[0][0], '"selling-price-id" itemprop="price">', '</span><');
			return $ret;
		}



		function getFeatures($result){
			$html = new DOMDocument();
			$html->loadHTML($result);
			$xpath = new DOMXPath($html);
			$features = $xpath->query("//ul[@class='key-features']");
			$ret = "";
			foreach ($features as $value) {
				$ret=$value->nodeValue;
			}
			return $ret;
		}

		function getDetails($result){
			$html = new DOMDocument();
			$html->loadHTML($result);
			$xpath = new DOMXPath($html);

			$details = $xpath->query("//div[@class='detailssubbox']");
			$i=0;
			$ret="";
			foreach ($details as $value) {
				$i++;
				if ($i==3) {
					$ret=$value->nodeValue;
				}
			}
			return $ret;
		}

		$title = getTitle($result);
		$img = getImg($result, $title[0]);
		$MRP = getMRP($result);
		$offer = getOfferPrice($result);
		$features = getFeatures($result);
		$details = getDetails($result);
		$myfile = fopen("results.txt", "w") or die("Unable to open file!");
		$write = $img."~".$title."~".$MRP."~".$offer."~".$features."~".$details;
		echo $write;
		fwrite($myfile, $write);
		fclose($myfile);

?>