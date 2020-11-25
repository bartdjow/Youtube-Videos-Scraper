
<?php
include("db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<div class="container">
	<div class="row justify-content-md-center">
<?php
$array = array("https://www.youtube.com/feeds/videos.xml?channel_id=UC5ClMRHFl8o_MAaO4w7ZYug",
				"https://www.youtube.com/feeds/videos.xml?channel_id=UCU5JicSrEM5A63jkJ2QvGYw",
				"https://www.youtube.com/feeds/videos.xml?channel_id=UCib793mnUOhWymCh2VJKplQ",
				"https://www.youtube.com/feeds/videos.xml?channel_id=UC70YG2WHVxlOJRng4v-CIFQ",
				"https://www.youtube.com/feeds/videos.xml?channel_id=UC5KejskaVsfsIyXqbgqPRvg",
				"https://www.youtube.com/feeds/videos.xml?channel_id=UCEf5U1dB5a2e2S-XUlnhxSA",
				"https://www.youtube.com/feeds/videos.xml?channel_id=UC-tBOOUXK8YjTQ6k6IPN9Lg",
				"https://www.youtube.com/feeds/videos.xml?channel_id=UCFuIUoyHB12qpYa8Jpxoxow",
				"https://www.youtube.com/feeds/videos.xml?channel_id=UCrdgeUeCll2QKmqmihIgKBQ",
				"https://www.youtube.com/feeds/videos.xml?channel_id=UCBWbWViVqDHckknir8PIIdg",
				"https://www.youtube.com/feeds/videos.xml?channel_id=UCf_kacKyoRRUP0nM3obzFbg",
				"https://www.youtube.com/feeds/videos.xml?channel_id=UCetRsdZxDQDcgVDJd6erz6g");
foreach ($array as $value) {

$url = $value;
$xml = simplexml_load_file($url);
$ns = $xml->getDocNamespaces(true);
$xml->registerXPathNamespace('a', 'http://www.w3.org/2005/Atom');
$elements = $xml->xpath('//a:entry');
$e_cnt = count($elements);
for($i = 0; $i < $e_cnt; $i++) {
$content = $elements[$i];
$yt = $content->children('http://www.youtube.com/xml/schemas/2015');
$media = $content->children('http://search.yahoo.com/mrss/');

$videoID = $yt->videoId; 
$canalID = $yt->channelId;
$autor = $content->author->name;
$title = $content->title;
$descricao = $media->group->description;
$thumb = $media->group->thumbnail->attributes();
$views = $media->group->community->statistics->attributes();
$data = $content->published;
echo $videoID;


$post = "INSERT INTO post (id, videoID, canalID, autor, title, descricao, thumb, views, data) VALUES ('','$videoID','$canalID', '$autor', '$title', '$descricao', '$thumb', '$views', '$data')";


$gravar_post = mysqli_query($conn, $post);



}
}
?>











</body>

</html>