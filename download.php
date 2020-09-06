<?php

function downloadChunk($dataList,$fileName){

$files = file_get_contents($dataList);

preg_match_all('#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#iS', $files, $match);

$ts = $match[0];

foreach ($ts as $key){

    header('Content-Description: File Transfer');

    header('Content-Type: octet/stream'); 

    header('Content-Transfer-Encoding: Binary');

    header('Content-Disposition: attachment; filename="'.$fileName.'.mp3"');

$chunk=fopen($key, 'rb');

while (!feof($chunk))

{

  echo fread($chunk, 8192);

    flush();

}

   fclose($chunk);

}

   echo "Download Started";

}


?>
