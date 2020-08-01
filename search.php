<!DOCTYPE html>
<html>
<head>
<link rel="canonical" href="http://tuliv.in"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src=<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="lib.css">
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap">   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.column {
  float: left;
  width: 20%;
  padding: 8px;}
  body {
  background: rgba(0, 0, 0, 1.0);
background-repeat: no-repeat;
height: 100%;
}
a{color: white}
</style>
</head>
<body>
<?php
$q = $_GET['q'];
$qu = urlencode($q);
//$str = preg_replace('/\s/', '', $qu);
$file = file_get_contents('https://gsearch.gaana.com/gaanasearch-api/mobilesuggest/autosuggest-lite-vltr-ro?geoLocation=IN&query='.$qu.'&content_filter=2&include=track&isRegSrch=0%20&webVersion=mix&rType=web&usrLang=All&isChrome=');
$de = json_decode($file, true);
$tracks = $de['gr'][0]['gd'];
foreach ($tracks as $key => $value){
$title = $value['ti'];
$thumb = $value['aw'];
$id = $value['seo'];
$thumbnail = '<a href="main.php?song='.$title.'&name='.$id.'"><img src="'.$thumb.'" alt="image" width="60px" height="60px"></a>';
echo "<div class='column'>";
echo "$thumbnail<br>";
echo "<a href='main.php?song=$title&name=$id'>$title</a>";
echo "</div>";
}
?>
</body>
</html>
