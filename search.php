<?php

$q = $_GET['q'];

$search_query = urlencode($q);

$file = file_get_contents('https://gsearch.gaana.com/gaanasearch-api/mobilesuggest/autosuggest-lite-vltr-ro?geoLocation=IN&query='.$search_query.'&content_filter=2&include=track&isRegSrch=0%20&webVersion=mix&rType=web&usrLang=All&isChrome=');

$json = json_decode($file, true);

$tracks = $json['gr'][0]['gd'];

$arr = array();

foreach ($tracks as $key => $value){

$title = $value['ti'];

$thumb = $value['aw'];

$id = $value['seo'];

$data = array("Title"=>"$title", "Pic_URL"=>"$thumb", "Main_URL"=>"main.php?song=$title&name=$id");

$re[] = $data;

}

header('Content-Type: application/json');

echo json_encode($re,JSON_PRETTY_PRINT);

?>
