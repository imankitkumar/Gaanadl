<?php
set_time_limit(0);

include('decrypt_url.php');
include('download.php');

$title = $_REQUEST['song'];

$name = $_REQUEST['name'];

if(isset($title,$name)){

$header = array('user-agent: Mozilla/5.0 (Linux; Android 10;TXY567) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/8399.0.9993.96 Mobile Safari/599.36');

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://gaana.com/apiv2?seokey=$name&type=songdetails&isChrome=1");

    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   

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
