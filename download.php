<?php



$user_agent  =   $_SERVER['HTTP_USER_AGENT'];

function getOS() { 

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
        '/windows nt 10.0/i'    =>  'windows',//'Windows 10',
        '/windows nt 6.2/i'     =>  'windows',//'Windows 8',
        '/windows nt 6.1/i'     =>  'windows',//'Windows 7',
        '/windows nt 6.0/i'     =>  'windows',//'Windows Vista',
        '/windows nt 5.2/i'     =>  'windows',//'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     =>  'windows',//'Windows XP',
        '/windows xp/i'         =>  'windows',//'Windows XP',
        '/windows nt 5.0/i'     =>  'windows',//'Windows 2000',
        '/windows me/i'         =>  'windows',//'Windows ME',
        '/win98/i'              =>  'windows',//'Windows 98',
        '/win95/i'              =>  'windows',//'Windows 95',
        '/win16/i'              =>  'windows',//'Windows 3.11',
        '/macintosh|mac os x/i' =>  'Mac OS X',
        '/mac_powerpc/i'        =>  'Mac OS 9',
        '/linux/i'              =>  'Linux',
        '/ubuntu/i'             =>  'Ubuntu',
        '/iphone/i'             =>  'iPhone',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPad',
        '/android/i'            =>  'Android',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile'
    );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

function downloadChunk($dataList,$fileName){

$files = file_get_contents($dataList);
preg_match_all('#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#iS', $files, $match);
$ts = $match[0];


$fileExtension = '.mp3';

if(getOS() == 'windows') {
   $fileExtension = '.webm';
}

foreach ($ts as $key){

    header('Content-Description: File Transfer');
    header('Content-Type: octet/stream'); 
    header('Content-Transfer-Encoding: Binary');
    header('Content-Disposition: attachment; filename="'.$fileName. $fileExtension);

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
