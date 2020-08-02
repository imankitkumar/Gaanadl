<?php
set_time_limit(0);

include('decrypt_url.php');
include('download.php');

$title = $_REQUEST['song'];
$name = $_REQUEST['name'];

if(isset($title,$name)){

$header = array('cookie: _col_uuid=2e4fcba4-4cb3-4415-acbb-d28c9fcc7334-10u54; connect.sid=s%3AJz_umSj4UuhqLvVY-Yq0GOshhgbOLZZj.cPG66DvJyGHOgmBI1BVfNbHrKCwbFW7ZYV6R4W1k9y0; _fbp=fb.1.1596117998758.908446859; __cfduid=d1765eebb75f81ed1f2e014da1688c8951596118013; _ga=GA1.2.1068446006.1596118053; _gid=GA1.2.244383443.1596118053; G_ENABLED_IDPS=google; _gat=1; deviceid=Jz_umSj4UuhqLvVY-Yq0GOshhgbOLZZj','user-agent: Mozilla/5.0 (Linux; Android 10;TXY567) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/8399.0.9993.96 Mobile Safari/599.36');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://gaana.com/apiv2?seokey=$name&type=songdetails&isChrome=1");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);    
    $rspns = curl_exec($ch);
    $data = json_decode($rspns, true);
    $cipher = $data['tracks'][0]['urls']['auto']['message'];
    
if(isset($cipher)){

$dec_url = decryptUrl($cipher);
   $list_ts = file_get_contents($dec_url);
       preg_match_all('#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#iS', $list_ts, $match);
         $ts = $match[0];
           $filelist = $ts[1];
             downloadChunk($filelist,$title);
}
else   {

    echo "Decryption Failed.."; 
}
}
  else {

    echo "Provide SEO Query";
}

?>
